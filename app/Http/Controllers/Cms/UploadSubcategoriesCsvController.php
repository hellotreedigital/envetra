<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductsFiltersSubcategory;

class UploadSubcategoriesCsvController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!\Auth::user()->can('add', ProductsFiltersSubcategory::first())) abort(403);
            return $next($request);
        });
    }
    
    public function index()
    {
        return view('cms/upload-subcategories');
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
                $inserts[] = [
                    'slug' => $data[0],
                    'title' => $data[1],
                ];
            }
            $row++;
        }
        
        ProductsFiltersSubcategory::insert($inserts);
        
        return redirect(url('admin/products-filters-subcategories'));
    }
}
