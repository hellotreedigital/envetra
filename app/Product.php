<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\ProductsFiltersTag');
    }

    public function subcategories()
    {
        return $this->belongsToMany('App\ProductsFiltersSubcategory');
    }

    public function composition()
    {
        return $this->hasMany('App\ProductsComposition');
    }
}
