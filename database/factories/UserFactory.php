<?php

use App\Entities\Users\User;
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
    return [
        'name' => 'Todd Austin',
        'email' => 'austin.todd.j@gmail.com',
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});
