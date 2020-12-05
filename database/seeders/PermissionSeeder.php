<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUsers = new Permission();
        $manageUsers->name = 'Manage users';
        $manageUsers->slug = 'user-manage';
        $manageUsers->save();

        $addUsers = new Permission();
        $addUsers->name = 'Add user';
        $addUsers->slug = 'user-add';
        $addUsers->save();

        $viewDashboard = new Permission();
        $viewDashboard->name = 'View dashboard';
        $viewDashboard->slug = 'dashboard';
        $viewDashboard->save();
    }
}
