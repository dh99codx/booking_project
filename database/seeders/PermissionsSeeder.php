<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list allfamilydetails']);
        Permission::create(['name' => 'view allfamilydetails']);
        Permission::create(['name' => 'create allfamilydetails']);
        Permission::create(['name' => 'update allfamilydetails']);
        Permission::create(['name' => 'delete allfamilydetails']);

        Permission::create(['name' => 'list frequencies']);
        Permission::create(['name' => 'view frequencies']);
        Permission::create(['name' => 'create frequencies']);
        Permission::create(['name' => 'update frequencies']);
        Permission::create(['name' => 'delete frequencies']);

        Permission::create(['name' => 'list subscribers']);
        Permission::create(['name' => 'view subscribers']);
        Permission::create(['name' => 'create subscribers']);
        Permission::create(['name' => 'update subscribers']);
        Permission::create(['name' => 'delete subscribers']);

        Permission::create(['name' => 'list subscribertypes']);
        Permission::create(['name' => 'view subscribertypes']);
        Permission::create(['name' => 'create subscribertypes']);
        Permission::create(['name' => 'update subscribertypes']);
        Permission::create(['name' => 'delete subscribertypes']);

        Permission::create(['name' => 'list userprofiles']);
        Permission::create(['name' => 'view userprofiles']);
        Permission::create(['name' => 'create userprofiles']);
        Permission::create(['name' => 'update userprofiles']);
        Permission::create(['name' => 'delete userprofiles']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
