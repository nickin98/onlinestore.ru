<?php

use App\User;
use App\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function ($user) {
            Customer::create([
                'user_id' => $user->id,
                'phone' => $user->phone,
                'email' => $user->email
            ]);
        });
    }
}
