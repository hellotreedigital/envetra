<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductsFiltersCategory extends Model
{
    public function subcategories()
    {
        return $this->hasMany('App\ProductsFiltersSubcategory');
    }
}
