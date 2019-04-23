<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Room;

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

$factory->define(Room::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'hotel_id' => rand(1, 15),
        'adult_capacity' => rand(1, 15),
        'child_capacity' => rand(1, 10),
        'price_per_night' => rand(1, 10),
        'apartment_description' => rand(1, 5) . " bedroom; ". rand(1, 7) . " bed; " . rand(1, 5). " bath",
        'check_in_process' => 'Self check in at any time',
        'description' => $faker->text(300),
        'other_info' => json_encode(['Amenities' => config('room.amenities')]),
        'contact_person' => $faker->name,
        'contact_number' => $faker->phoneNumber,
        'contact_email' => $faker->email,
    ];
});
