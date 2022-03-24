<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductsFiltersCategory;
use App\ProductsFiltersTag;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {

        $filter_categories = ProductsFiltersCategory::orderBy('ht_pos')->get();
        $filter_tags = ProductsFiltersTag::orderBy('ht_pos')->get();
        $products = Product::select()
            ->when(request('filters_category'), function ($query) {
                $subcategories = [];
                foreach (request('filters_category') as $subcategory_id) if ($subcategory_id) $subcategories[] = $subcategory_id;
                if (count($subcategories)) {
                    $query->whereHas('subcategories', function ($subcategories_query) use ($subcategories) {
                        $subcategories_query->whereIn('products_filters_subcategories.id', $subcategories);
                    }, '>=', count($subcategories));
                }
            })
            ->when(request('filters_tags'), function ($query) {
                $query->whereHas('tags', function ($tags_query) {
                    $tags_query->whereIn('products_filters_tags.id', request('filters_tags'));
                });
            })
            ->when(request('search'), function ($query) {
                $query->search(request('search'));
            })
            ->paginate(9);

        return view(request()->ajax() ? 'components/products-grid' : 'products', compact(
            'filter_categories',
            'filter_tags',
            'products'
        ));
    }

    public function show($product_slug)
    {
        $filter_categories = ProductsFiltersCategory::orderBy('ht_pos')->get();
        $filter_tags = ProductsFiltersTag::orderBy('ht_pos')->get();
        $product = Product::where('slug', $product_slug)->firstOrFail();

        $prev_product = Product::select()
            ->when(request('filters_category'), function ($query) {
                $subcategories = [];
                foreach (request('filters_category') as $subcategory_id) if ($subcategory_id) $subcategories[] = $subcategory_id;
                if (count($subcategories)) {
                    $query->whereHas('subcategories', function ($subcategories_query) use ($subcategories) {
                        $subcategories_query->whereIn('products_filters_subcategories.id', $subcategories);
                    }, '>=', count($subcategories));
                }
            })
            ->when(request('filters_tags'), function ($query) {
                $query->whereHas('tags', function ($tags_query) {
                    $tags_query->whereIn('products_filters_tags.id', request('filters_tags'));
                });
            })
            ->when(request('search'), function ($query) {
                $query->search(request('search'));
            })
            ->where('id', '<', $product->id)
            ->orderBy('id', 'DESC')
            ->first();

        $next_product = Product::select()
            ->when(request('filters_category'), function ($query) {
                $subcategories = [];
                foreach (request('filters_category') as $subcategory_id) if ($subcategory_id) $subcategories[] = $subcategory_id;
                if (count($subcategories)) {
                    $query->whereHas('subcategories', function ($subcategories_query) use ($subcategories) {
                        $subcategories_query->whereIn('products_filters_subcategories.id', $subcategories);
                    }, '>=', count($subcategories));
                }
            })
            ->when(request('filters_tags'), function ($query) {
                $query->whereHas('tags', function ($tags_query) {
                    $tags_query->whereIn('products_filters_tags.id', request('filters_tags'));
                });
            })
            ->when(request('search'), function ($query) {
                $query->search(request('search'));
            })
            ->where('id', '>', $product->id)
            ->first();

        return view('products-single', compact(
            'filter_categories',
            'filter_tags',
            'product',
            'prev_product',
            'next_product'
        ));
    }
}
