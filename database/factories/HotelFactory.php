<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Hotel;

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

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'city_id' => rand(14, 21),
        'address' => $faker->address,
        'type' => rand(1, 2),
    ];
});
