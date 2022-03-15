<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductsFiltersTag;
use App\ProductsFiltersSubcategory;

class UploadProductsCsvController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!\Auth::user()->can('add', Product::first())) abort(403);
            return $next($request);
        });
    }
    
    public function index()
    {
        return view('cms/upload-products');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'csv' => 'required|file|mimes:csv,txt',
            'images' => 'required|file|mimes:zip',
        ]);
        
        DB::beginTransaction();
        
        $row = 0;
        $file = fopen($request->file('csv')->getPathName(), "r");
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($row) {
                $product = new Product();
                $product->sku = $data[0];
                $product->slug = $data[1];
                $product->title = $data[2];
                $product->price = $data[3];
                $product->image = 'products/' . $data[4];
                $product->small_description = $data[5];
                $product->description = $data[6];
                $product->save();
                
                // Tags
                $tags_ids = [];
                foreach(explode(',', $data[7]) as $tag_name) {
                    $tag = ProductsFiltersTag::where('title', $tag_name)->first();
                    if (!$tag) return redirect()->back()->withErrors(['Tag ' . $tag_name . ' not found']);
                    $tags_ids[] = $tag->id;
                }
                $product->tags()->sync($tags_ids);
                
                // Subcategories
                $subcats_ids = [];
                foreach(explode(',', $data[8]) as $subcat_slug) {
                    $subcat = ProductsFiltersSubcategory::where('slug', $subcat_slug)->first();
                    if (!$subcat) return redirect()->back()->withErrors(['Subcategory slug ' . $subcat_slug . ' not found']);
                    $subcats_ids[] = $subcat->id;
                }
                $product->subcategories()->sync($subcats_ids);
            }
            $row++;
        }
        
        $zip = new \ZipArchive;
        $res = $zip->open($request->file('images')->getPathName());
        if (!$res) return redirect()->back()->withErrors(['Could not open zip']);
        $zip->extractTo(storage_path('app/public/products'));
        $zip->close();
        
        DB::commit();
        
        return redirect(url('admin/products'));
    }
}
