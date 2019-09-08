<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function products()
    {
        return $this->belongsToMany(Product::class,
            'products_categories',
            'product_id',
            'categories_id');
    }
}
