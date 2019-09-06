<?php

namespace App\Services;

use App\Product;
use App\Services\Contracts\WishListServiceContract;
use Illuminate\Support\Facades\Auth;

class WishListService implements WishListServiceContract
{
    public function isUserFollowed(Product $product)
    {
        $followers = $product->followers()->get()->pluck('id');
        return $followers->contains(Auth()->id());
    }
}