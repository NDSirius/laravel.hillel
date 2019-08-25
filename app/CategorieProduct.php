<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieProduct extends Model
{
    protected $table = 'products_categories';
    public $timestamps = false;

    public function categories()
    {
        return $this->morphedByMany('App\Category');
    }

    public function products()
    {
        return $this->morphedByMany('App\Product');
    }
}
