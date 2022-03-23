<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.title' => 10,
            'products.small_description' => 8,
        ],
        'joins' => [
        ],
    ];

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
