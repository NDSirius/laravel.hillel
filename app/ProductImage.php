<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_gallery';

    public function products()
    {
        return $this->belongsToMany(Product::class,
            'product_gallery',
            'id',
            'path'
        );
    }


}
