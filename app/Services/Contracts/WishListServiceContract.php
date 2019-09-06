<?php

namespace App\Services\Contracts;


use App\Product;

interface WishListServiceContract
{
    public function isUserFollowed(Product $product);
}