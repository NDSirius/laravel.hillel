<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'description' => $faker->sentences(12, true),
        'short_description' => $faker->sentences(2, true),
        'sku' => $faker->text(10),
        'price' => $faker->randomFloat(2, 1, 10000),
        'in_stock' => $faker->numberBetween(0, 15),
        'thumbnail' => $faker->image('public/storage/images/product', 400, 400, null, true),
    ];
});
