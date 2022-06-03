<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'GeneralController@homePage');
Route::get('/home', 'GeneralController@homePage');
Route::post('/contact/store', 'GeneralController@storeMessage')->name('contact-store')->middleware('throttle:20,1');

/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/products', 'ProductsController@index')->name('products');
    Route::get('/products/{slug}', 'ProductsController@show')->name('products-single');

});

Route::middleware('auth')->group(function () {
    Route::get('/admin/upload-categories-csv', 'Cms\UploadCategoriesCsvController@index');
    Route::post('/admin/upload-categories-csv', 'Cms\UploadCategoriesCsvController@store');
    
    Route::get('/admin/upload-subcategories-csv', 'Cms\UploadSubcategoriesCsvController@index');
    Route::post('/admin/upload-subcategories-csv', 'Cms\UploadSubcategoriesCsvController@store');
    
    Route::get('/admin/upload-products-csv', 'Cms\UploadProductsCsvController@index');
    Route::post('/admin/upload-products-csv', 'Cms\UploadProductsCsvController@store');

    Route::get('/admin/upload-composition-csv', 'Cms\UploadCompositionCsvController@index');
    Route::post('/admin/upload-composition-csv', 'Cms\UploadCompositionCsvController@store');
    
    
    Route::get('/admin/upload-analytical-component-csv', 'Cms\UploadAnalyticalComponentCsvController@index');
    Route::post('/admin/upload-analytical-component-csv', 'Cms\UploadAnalyticalComponentCsvController@store');
});

// Route::get('generate/slug', function () {
//     $products = App\Product::get();
//     foreach ($products as $product) {
//         $product->slug = Illuminate\Support\Str::slug($product->title, '-');
//         $product->save();
//     }
// });

/*
Route::get('import', function () {
    $file = fopen("products.csv", "r");
    while (($data = fgetcsv($file)) !== FALSE) {
        $check_product = App\Product::where('sku', $data[0])->first();
        $product = $check_product ? $check_product : new App\Product();
        $product->sku = $data[0];
        $product->title = $data[1];
        $product->save();

        $subcategories = [];

        if ($data[4]) {
            $check_brand = App\ProductsFiltersSubcategory::where('products_filters_category_id', 1)->where('title', $data[4])->first();
            $brand = $check_brand ? $check_brand : new App\ProductsFiltersSubcategory();
            $brand->products_filters_category_id = 1;
            $brand->title = $data[4];
            $brand->save();

            $subcategories[] = $brand->id;
        }

        if ($data[5]) {
            $check_category = App\ProductsFiltersSubcategory::where('products_filters_category_id', 2)->where('title', $data[5])->first();
            $category = $check_category ? $check_category : new App\ProductsFiltersSubcategory();
            $category->products_filters_category_id = 2;
            $category->title = $data[5];
            $category->save();

            $subcategories[] = $category->id;
        }
        if ($data[6]) {
            $check_subcategory = App\ProductsFiltersSubcategory::where('products_filters_category_id', 3)->where('title', $data[6])->first();
            $subcategory = $check_subcategory ? $check_subcategory : new App\ProductsFiltersSubcategory();
            $subcategory->products_filters_category_id = 3;
            $subcategory->title = $data[6];
            $subcategory->save();

            $subcategories[] = $subcategory->id;
        }

        if ($data[8]) {
            $check_country = App\ProductsFiltersSubcategory::where('products_filters_category_id', 4)->where('title', $data[8])->first();
            $country = $check_country ? $check_country : new App\ProductsFiltersSubcategory();
            $country->products_filters_category_id = 4;
            $country->title = $data[8];
            $country->save();

            $subcategories[] = $country->id;
        }

        if ($data[7]) {
            $check_form = App\ProductsFiltersSubcategory::where('products_filters_category_id', 5)->where('title', $data[7])->first();
            $form = $check_form ? $check_form : new App\ProductsFiltersSubcategory();
            $form->products_filters_category_id = 5;
            $form->title = $data[7];
            $form->save();

            $subcategories[] = $form->id;
        }

        $tags = [];
        if ($data[10]) $tags[] = 1;
        if ($data[11]) $tags[] = 2;
        if ($data[12]) $tags[] = 3;
        if ($data[13]) $tags[] = 4;
        if ($data[14]) $tags[] = 5;
        if ($data[15]) $tags[] = 6;
        if ($data[16]) $tags[] = 7;
        if ($data[17]) $tags[] = 8;
        if ($data[18]) $tags[] = 9;
        if ($data[19]) $tags[] = 10;
        if ($data[20]) $tags[] = 11;
        if ($data[21]) $tags[] = 12;
        if ($data[22]) $tags[] = 13;
        if ($data[23]) $tags[] = 14;
        if ($data[24]) $tags[] = 15;
        if ($data[25]) $tags[] = 16;
        if ($data[26]) $tags[] = 17;
        if ($data[27]) $tags[] = 18;

        $product->tags()->sync($tags);
        $product->subcategories()->sync($subcategories);
    }
});

Route::get('import-2', function () {
    $file = fopen("products-2.csv", "r");
    while (($data = fgetcsv($file)) !== FALSE) {
        $check_product = App\Product::where('sku', $data[0])->first();
        $product = $check_product ? $check_product : new App\Product();
        $product->sku = $data[0];
        $product->title = $data[1];
        $product->save();

        $subcategories = [];

        if ($data[3]) {
            $check_brand = App\ProductsFiltersSubcategory::where('products_filters_category_id', 1)->where('title', $data[3])->first();
            $brand = $check_brand ? $check_brand : new App\ProductsFiltersSubcategory();
            $brand->products_filters_category_id = 1;
            $brand->title = $data[3];
            $brand->save();

            $subcategories[] = $brand->id;
        }

        if ($data[4]) {
            $check_category = App\ProductsFiltersSubcategory::where('products_filters_category_id', 2)->where('title', $data[4])->first();
            $category = $check_category ? $check_category : new App\ProductsFiltersSubcategory();
            $category->products_filters_category_id = 2;
            $category->title = $data[4];
            $category->save();

            $subcategories[] = $category->id;
        }
        if ($data[5]) {
            $check_subcategory = App\ProductsFiltersSubcategory::where('products_filters_category_id', 3)->where('title', $data[5])->first();
            $subcategory = $check_subcategory ? $check_subcategory : new App\ProductsFiltersSubcategory();
            $subcategory->products_filters_category_id = 3;
            $subcategory->title = $data[5];
            $subcategory->save();

            $subcategories[] = $subcategory->id;
        }

        if ($data[6]) {
            $check_classification = App\ProductsFiltersSubcategory::where('products_filters_category_id', 6)->where('title', $data[6])->first();
            $classification = $check_classification ? $check_classification : new App\ProductsFiltersSubcategory();
            $classification->products_filters_category_id = 6;
            $classification->title = $data[6];
            $classification->save();

            $subcategories[] = $classification->id;
        }

        if ($data[7]) {
            $check_country = App\ProductsFiltersSubcategory::where('products_filters_category_id', 4)->where('title', $data[7])->first();
            $country = $check_country ? $check_country : new App\ProductsFiltersSubcategory();
            $country->products_filters_category_id = 4;
            $country->title = $data[7];
            $country->save();

            $subcategories[] = $country->id;
        }

        if ($data[8]) {
            $check_primary_agent = App\ProductsFiltersSubcategory::where('products_filters_category_id', 7)->where('title', $data[8])->first();
            $primary_agent = $check_primary_agent ? $check_primary_agent : new App\ProductsFiltersSubcategory();
            $primary_agent->products_filters_category_id = 7;
            $primary_agent->title = $data[8];
            $primary_agent->save();

            $subcategories[] = $primary_agent->id;
        }

        $tags = [];
        if ($data[9]) $tags[] = 1;
        if ($data[10]) $tags[] = 2;

        $product->tags()->sync($tags);
        $product->subcategories()->sync($subcategories);
    }
});
*/
