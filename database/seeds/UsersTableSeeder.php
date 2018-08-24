<?php

use App\Entities\Users\User;
use Illuminate\Database\Seeder;
use App\Interfaces\Users\UserInterface;

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
        $userContract->create([
            'name'           => 'Todd Austin',
            'email'          => 'austin.todd.j@gmail.com',
            'password'       => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        factory(User::class, 10)->create();
    }
}
