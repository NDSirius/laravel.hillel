<?php

namespace App;

use App\User;
use App\Product;
use App\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class,
            'orders_products',
            'products_id',
            'order_id');
    }

    public function order_status()
    {
        return $this->hasOne(OrderStatus::class);
    }
}

