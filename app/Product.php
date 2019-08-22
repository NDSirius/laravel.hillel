<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany(App\Category::class);
    }

    public function galleryImages()
    {
        return $this->belongsToMany(App\ProductImage::class);
    }

    public function order()
    {
        return $this->hasMany(App\Order::class);
    }
}
