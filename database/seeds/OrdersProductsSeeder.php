<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Product;
use App\OrderProduct;

class OrdersProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\OrderProduct::class, 15)->create()->each(function ($products_id, $order_id){
            $products_id->products()->attach(factory(App\Product::class)->make());
            $order_id->orders()->attach(factory(App\Order::class)->make());
        });
    }

}*/
        $products_id = Product::all('id')->toArray();
        $order_id = Order::all('id')->toArray();
        foreach ($products_id as $index => $item) {
            shuffle($order_id);
            $maxCategory = mt_rand(2, count($order_id) - 1);
            for ($i = 0; $i < $maxCategory; $i++) {
                factory(OrderProduct::class)
                    ->create([
                        'products_id' => $item['id'],
                        'order_id' => $order_id[$i]['id']
                    ]);
            }
        }
    }
}


