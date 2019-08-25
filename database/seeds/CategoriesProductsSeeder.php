<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
use App\CategorieProduct;

class CategoriesProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_id = Product::all('id')->toArray();
        $categories_id = Category::all('id')->toArray();
        foreach ($product_id as $index => $item) {
            shuffle($categories_id);
            $maxCategory = mt_rand(2, count($categories_id) - 1);
            for ($i = 0; $i < $maxCategory; $i++) {
                factory(CategorieProduct::class)
                    ->create([
                        'product_id' => $item['id'],
                        'categories_id' => $categories_id[$i]['id']
                    ]);
            }
        }
    }
}