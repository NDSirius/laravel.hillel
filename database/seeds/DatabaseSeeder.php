<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
        $this->call(CategoriesProductsSeeder::class);
        $this->call(RolesTableSeeder::class);

    }
}
