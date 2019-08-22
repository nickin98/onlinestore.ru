<?php

use App\Product;
use App\Order;
use App\OrderProduct;
use Illuminate\Database\Seeder;

class OrdersProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productIds = Product::all()->pluck('id')->toArray();

        Order::all()->each(function ($order) use ($productIds) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = array_random($productIds);
            $orderProduct->amount = rand(1,10);
            $orderProduct->save();
        });
    }
}
