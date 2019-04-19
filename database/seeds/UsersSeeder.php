<?php

use App\User;
use App\Address;
use App\PhoneNumber;
use App\Helpers\User\Roles;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 25)->create()->each(function ($user) {
            $user->address()->save(factory(Address::class)->make());
            $user->phoneNumber()->save(factory(PhoneNumber::class)->make());
            $user->assignRole(collect(Roles::ROLE_LIST)->random());
        });
    }
}
