<?php

use App\Product;
use App\ProductImage;
use App\Category;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductImage::class, 10)->create();
        factory(App\Product::class, 10)->create()->each(function($product) {
            $product->galleryImages()->attach(App\ProductImage::all()->random(3));
            $product->categories()->attach(App\Category::all()->random(2));
        });
    }
}
