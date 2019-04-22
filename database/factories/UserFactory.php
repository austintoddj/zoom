<?php

use App\User;
use App\Helpers\Gender;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    $social = [
        'twitter'   => $faker->userName,
        'facebook'  => $faker->userName,
        'instagram' => $faker->userName,
    ];

    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'dob'               => $faker->date(),
        'gender'            => collect(Gender::GENDER_LIST)->random(),
        'bio'               => $faker->realText(),
        'social'            => $social,
        'remember_token'    => Str::random(10),
    ];
});
