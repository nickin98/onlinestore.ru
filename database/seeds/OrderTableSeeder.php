<?php

use App\Customer;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::all()->each(function ($customer) {
            $customer->order()->save(factory(App\Order::class)->make());
        });
    }
}
