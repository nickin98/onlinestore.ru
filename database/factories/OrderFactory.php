<?php

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

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'customer_name' => $faker->sentence(2),
        'street' => $faker->streetAddress,
        'house' => $faker->buildingNumber,
        'flat' => rand(1,80),
        'form_payment' => rand(1,3),
        'near_time_delivery' => rand(0,1),
        'exact_delivery_time' => $faker->dateTime,
        'comment' => $faker->sentence(15),
        'status' => rand(1,3),
        'total_price' => rand(20, 500),
    ];
});
