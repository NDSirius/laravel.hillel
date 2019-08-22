<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Role;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $role = Role::where('name', '=',
        Config::get('constants.db.roles.customer'))->first();

    return [
        'name' => $faker->unique()->name,
        'role_id' => $role->id,
        'surname' => $faker->unique()->lastName,
        'email' => $faker->unique()->safeEmail,
        'birthday' => $faker->dateTimeBetween('-70 years', '-18 years')->format('Y-m-d'),
        'password' => $faker->password(8),
        'remember_token' => Str::random(10),
        'phone_number' => $faker->phoneNumber,
    ];
});
