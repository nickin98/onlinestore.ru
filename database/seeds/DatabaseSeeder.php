<?php

use App\Customer;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create()->each(function($user) {
            if (random_int(0,2)) {
                Customer::create([
                    'user_id' => $user->id,
                    'phone' => $user->phone,
                    'email' => $user->email
                ]);
            } else {
                factory(App\Customer::class, 2)->create();
            }
        });

        factory(App\Category::class, 5)->create()->each(function ($category){
           $category->products()->saveMany(factory(App\Product::class, random_int(10,20))->make());
        });

        $this->call(OrderTableSeeder::class);
        $this->call(OrdersProductsTableSeeder::class);
    }
}
