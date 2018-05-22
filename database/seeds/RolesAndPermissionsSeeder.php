<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// doc https://github.com/spatie/laravel-permission
//https://github.com/rappasoft/laravel-5-boilerplate
class RolesAndPermissionsSeeder extends Seeder
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

        // Create Roles
        Role::create(['name' => config('auth.access.users.roles.public')]);
        $user = Role::create(['name' => config('auth.access.users.roles.user')]);
        Role::create(['name' => config('auth.access.users.roles.author')]);
        Role::create(['name' => config('auth.access.users.roles.editor')]);
        Role::create(['name' => config('auth.access.users.roles.publisher')]);
        Role::create(['name' => config('auth.access.users.roles.manager')]);
        $admin = Role::create(['name' => config('auth.access.users.roles.admin')]);
        $superUser = Role::create(['name' => config('auth.access.users.roles.super-admin')]);
        Role::create(['name' => config('auth.access.users.roles.guest')]);

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);
        Permission::create(['name' => 'view articles']);

        // Associate roles with permissions
        $admin->givePermissionTo('edit articles');
        $superUser->givePermissionTo(Role::all());
        $user->givePermissionTo('view articles');


    }
}
