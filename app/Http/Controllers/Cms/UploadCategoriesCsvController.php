<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductsFiltersCategory;

class UploadCategoriesCsvController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!\Auth::user()->can('add', ProductsFiltersCategory::first())) abort(403);
            return $next($request);
        });
    }
    
    public function index()
    {
        return view('cms/upload-categories');
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
                    'title' => $data[0],
                ];
            }
            $row++;
        }
        
        ProductsFiltersCategory::insert($inserts);
        
        return redirect(url('admin/products-filters-categories'));
    }
}
