<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::getBySlug('admin');
        $user = Role::getBySlug('user');

        $userAdmin = new User();
        $userAdmin->name = 'default-admin';
        $userAdmin->email = 'admin@gmail.com';
        $userAdmin->password = Hash::make('default-admin');
        $userAdmin->save();
        $userAdmin->roles()->attach($admin);

        $userDefault = new User();
        $userDefault->name = 'default-user';
        $userDefault->email = 'user@gmail.com';
        $userDefault->password = Hash::make('default-user');
        $userDefault->save();
        $userDefault->roles()->attach($user);
    }
}
