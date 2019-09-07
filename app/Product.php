<?php

namespace App;

use App\User;
use App\Order;
use App\ProductImage;
use App\Category;
use App\Pivots\WishList;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function categories()
    {
        return $this->belongsToMany(Category::class,
            'products_categories',
            'product_id',
            'categories_id');
    }

    public function galleryImages()
    {
        return $this->belongsToMany(ProductImage::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class,
            'orders_products',
            'products_id',
            'order_id');
    }

    public function setThumbnailAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['thumbnail'] =
                str_replace('public/storage/', '', $value);
        }
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
