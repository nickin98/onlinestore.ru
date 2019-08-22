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

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'phone' => '+7(343) ' . $faker->regexify('[0-9]{3}-[0-9]{2}-[0-9]{2}'),
        'email' => $faker->unique()->safeEmail
    ];
});

