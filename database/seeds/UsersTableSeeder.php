<?php

use App\Interfaces\Users\UserInterface;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userContract = resolve(UserInterface::class);
        $faker = resolve(Faker::class);

        $user = $userContract->create([
            'name'           => $faker->name,
            'email'          => $faker->safeEmail,
            'password'       => bcrypt('password'),
            'remember_token' => str_random(60),
        ]);
        $user->assignRole('User');

        $admin = $userContract->create([
            'name'           => $faker->name,
            'email'          => $faker->safeEmail,
            'password'       => bcrypt('password'),
            'remember_token' => str_random(60),
        ]);
        $admin->assignRole('Admin');

        $super_admin = $userContract->create([
            'name'           => 'Todd Austin',
            'email'          => 'austin.todd.j@gmail.com',
            'password'       => bcrypt('password'),
            'remember_token' => str_random(60),
        ]);
        $super_admin->assignRole('Super Admin');
    }
}
