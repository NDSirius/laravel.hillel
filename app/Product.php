<?php

namespace App;

use App\User;
use App\Order;
use App\ProductImage;
use App\Category;
use App\Pivots\WishList;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Product extends Model
{
    use Rateable;

    protected $fillable = [
        'id',
        'title',
        'sku',
        'description',
        'short_description',
        'in_stock',
        'thumbnail',
        'discount',
        'price'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,
            'products_categories',
            'product_id',
            'categories_id');
    }

    public function galleryImages()
    {
        return $this->belongsToMany(ProductImage::class,
            'product_gallery',
            'id',
            'path'
        );
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

    public function getRatingProduct()
    {
        $this->ratings();
    }
}
