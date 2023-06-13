<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);


        // create roles and assign existing permissions
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('create user');
        $roleAdmin->givePermissionTo('edit user');
        $roleAdmin->givePermissionTo('delete user');

        $roleMember = Role::create(['name' => 'member']);
        $roleMember->givePermissionTo('edit user');

        $roleHR = Role::create(['name' => 'hr']);
        $roleHR->givePermissionTo('delete user');
    }
}
