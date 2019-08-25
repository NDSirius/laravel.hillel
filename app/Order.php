<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function user()
    {
      return $this->belongsTo(App\User::class);
    }

    public function product()
    {
        return $this->hasMany(App\Product::class);
    }

    public function order_status()
    {
        return $this->hasOne(App\OrderStatus::class);
    }
}

