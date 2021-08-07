<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Team::factory(10)->create();

        $admin = User::first();
        // create permissions
        Permission::create(['name' => 'manage-roles', 'title' => 'Manage roles']);
        Permission::create(['name' => 'manage-users', 'title' => 'Manage users']);
        Permission::create(['name' => 'manage-teams', 'title' => 'Manage teams']);
        Permission::create(['name' => 'index-transactions', 'title' => 'Browse and search transactions']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('manage-roles');
        $role1->givePermissionTo('manage-users');
        $role1->givePermissionTo('manage-teams');
        $role1->givePermissionTo('index-transactions');


        //$admin->givePermissionTo('manage-permissions');
        $admin->assignRole('admin');

        /*
        https://spatie.be/docs/laravel-permission/v4/basic-usage/middleware
        */
    }
}
