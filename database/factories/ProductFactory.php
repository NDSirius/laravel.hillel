<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text,
        'short_description' => $faker->text(15),
        'sku' => $faker->text(10),
        'price' => $faker->randomFloat(2, 0, 10000),
        'discount' => $faker->randomFloat(2,0,300)
    ];
});
