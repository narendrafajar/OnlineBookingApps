<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // Superadmin Permissions
            'create all location',
            'create all appointment',
            'create all therapist',
            'create all treatment',
            'view all location',
            'view all appointment',
            'view all therapist',
            'view all treatment',
            'view all menu',
            'edit location',
            'edit appointment',
            'edit therapist',
            'edit treatment',
            'delete all location',
            'delete all appointment',
            'delete all therapist',
            'delete all treatment',

            // User Permissions
            'create appointment',
            'view location',
            'view appointment',
            'view therapist',
            'view treatment',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        $roles = [
            'superadmin' => [
                'create all location',
                'create all appointment',
                'create all therapist',
                'create all treatment',
                'view all location',
                'view all appointment',
                'view all therapist',
                'view all treatment',
                'view all menu',
                'edit location',
                'edit appointment',
                'edit therapist',
                'edit treatment',
                'delete all location',
                'delete all appointment',
                'delete all therapist',
                'delete all treatment',
            ],
            'user' => [
                'create appointment',
                'view location',
                'view appointment',
                'view therapist',
                'view treatment',
            ],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }

        // Buat pengguna contoh
        $superadmin = \App\Models\User::firstOrCreate([
            'email' => 'superadmin@obs.com',
        ], [
            'name' => 'Super Admin',
            'role' => 'superadmin',
            'password' => bcrypt('123456'),
        ]);
        $superadmin->assignRole('superadmin');

        $user = \App\Models\User::firstOrCreate([
            'email' => 'baydowi@gmail.com',
        ], [
            'name' => 'Ahmad Baydowi',
            'role' => 'user',
            'password' => bcrypt('123456'),
            'phone' => '08213326542',
        ]);
        $user->assignRole('user');
    }
}
