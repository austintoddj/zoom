<?php

use App\PhoneNumber;
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

$factory->define(PhoneNumber::class, function (Faker $faker) {
    return [
//        'user_id'      => $faker->id,
        'phone_number' => substr(\App\Helpers\Data\PhoneNumber::clean($faker->phoneNumber), 0, 10),
    ];
});
