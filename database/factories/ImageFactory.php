<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Room;
use App\Image;

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

$factory->define(Image::class, function (Faker $faker) {
    return [
        'imageable_type' => Room::class,
        'imageable_id' => rand(1, 150),
        'caption' => $faker->name,
        'path' => 'img/upload/room' . rand(1, 5) . '.jpg',
    ];
});
