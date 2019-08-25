<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Order;

class OrderProduct extends Model
{
    public $timestamps = false;
    protected $table = 'orders_products';
    protected $fillable = ['order_id', 'products_id'];

    public function products()
    {
        return $this->morphedByMany('App\Product');
    }

    public function orders()
    {
        return $this->morphedByMany('App\Order');
    }
}