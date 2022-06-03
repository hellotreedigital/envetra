<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AnalyticalComponent;
use App\Product;

class UploadAnalyticalComponentCsvController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!\Auth::user()->can('add', AnalyticalComponent::first())) abort(403);
            return $next($request);
        });
    }
    
    public function index()
    {
        return view('cms/upload-analytical-component');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'csv' => 'required|file|mimes:csv,txt'
        ]);
        
        $row = 0;
        $inserts = [];
        $file = fopen($request->file('csv')->getPathName(), "r");
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($row) {
                // Tags
                $product_ids = [];
                foreach(explode(',', $data[0]) as $product_name) {
                    $product = Product::select('id')->where('slug','=', $product_name)->first();
                    if (!$product) dd($product_name . ' not found');
                    $product_ids[] = $product->id;
                }

                foreach($product_ids as $productId){
                    $product = new AnalyticalComponent();
                    $product->product_id = $productId;
                    $product->title = $data[1];
                    $product->value = $data[2];
                    $product->save();
                }
            }
            $row++;
        }
      
        
        AnalyticalComponent::insert($inserts);
        
        return redirect(url('admin/analytical-components'));
    }
}
