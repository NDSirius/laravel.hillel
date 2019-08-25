<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategorieProduct;
use Faker\Generator as Faker;

$factory->define(CategorieProduct::class, function ($product_id, $categories_id) {
    return [
        'product_id' => $product_id,
        'categories_id' => $categories_id
    ];
});
