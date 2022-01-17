<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'superAdmin',
            'email' => 'superadmin@cdd.edu.ph',
            'password' => Hash::make('arcreactor2021'),
        ]);

        $role = Role::create([
            'name' => 'superadmin'
        ]);

        $user->assignRole($role);
    }
}
