<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderStatus;
use Faker\Generator as Faker;

$factory->define(OrderStatus::class, function (Faker $faker) {
    return [
    'shipping_data_country' => $faker,
    'shipping_data_city' => $faker ,
    'shipping_data_address' => $faker ,
    'total_price' => $faker->randomFloat(2, 10,3000),
    ];
});
