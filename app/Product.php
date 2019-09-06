<?php

namespace App;

use App\User;
use App\Pivots\WishList;
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
        return $this->belongsToMany(App\Order::class);
    }

    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'wishlist',
            'product_id',
            'user_id'
        );
    }

    public function getPrice()
    {
        return
            $price = is_null($this->discount)
                ? $this->price
                : ($this->price - $this->discount);

    }
}
