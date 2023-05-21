<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'impersonate' => ['create'],
            'roles' => ['index', 'create', 'edit', 'destroy'],
            'admins' => ['index', 'create', 'edit', 'destroy'],
            'language' => ['index', 'edit', 'sync'],
        ];

        foreach ($permissions as $key => $value) {
            foreach ($value as $permission) {
                Permission::create(['name' => 'dashboard.' . $key . '.' . $permission]);
            }
        }
    }
}
