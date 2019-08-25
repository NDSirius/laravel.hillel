<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Order;
use App\User;
use App\OrderStatus;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $user_id = User::all('id')->random(1)->toArray();
    $status_id = OrderStatus::all('id')->random(1)->toArray();
    return [
        'user_id' => $user_id[0]['id'],
        'status_id' => $status_id[0]['id'],
        'shipping_data_country' => $faker->sentence(2),
        'shipping_data_city' => $faker->sentence(2),
        'shipping_data_address' => $faker->sentence(2),
        'total_price' => $faker->randomFloat(2, 10,3000),
    ];
});


