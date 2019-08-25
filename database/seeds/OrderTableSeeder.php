<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\User;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Order::class, 10)->create();
    }
}
