<?php

use Illuminate\Database\Seeder;
use App\Interfaces\Meta\RoleInterface;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $roleContract = resolve(RoleInterface::class);

        $roleContract->create(['name' => 'User']);
        $roleContract->create(['name' => 'Admin']);
        $roleContract->create(['name' => 'Super Admin']);
    }
}
