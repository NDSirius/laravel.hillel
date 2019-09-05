<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieProduct extends Model
{

    protected $fillable = ['product_id', 'category_id'];

    protected $table = 'products_categories';

    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
