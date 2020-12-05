<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addUsers = Permission::getBySlug('user-add');
        $manageUsers = Permission::getBySlug('user-manage');
        $viewDashboard = Permission::getBySlug('dashboard');

        $admin = new Role();
        $admin->name = 'Admin';
        $admin->slug = 'admin';
        $admin->save();

        $admin->permissions()->attach($addUsers);
        $admin->permissions()->attach($manageUsers);
        $admin->permissions()->attach($viewDashboard);

        $user = new Role();
        $user->name = 'User';
        $user->slug = 'user';
        $user->save();

        $user->permissions()->attach($viewDashboard);
    }
}
