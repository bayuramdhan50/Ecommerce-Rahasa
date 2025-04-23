<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Daftar role utama
        $roles = [
            'admin',
            'user',
            'toko',
            'gudang',
        ];

        // Daftar permission dasar (bisa dikembangkan sesuai kebutuhan)
        $permissions = [
            'manage users',
            'manage products',
            'manage orders',
            'manage expeditions',
            'checkout',
            'view dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        foreach ($roles as $role) {
            $roleModel = Role::firstOrCreate(['name' => $role]);
            // Assign permission sesuai role
            switch ($role) {
                case 'admin':
                    $roleModel->syncPermissions($permissions);
                    break;
                case 'user':
                    $roleModel->syncPermissions(['checkout', 'view dashboard']);
                    break;
                case 'toko':
                    $roleModel->syncPermissions(['manage products', 'manage orders', 'view dashboard']);
                    break;
                case 'gudang':
                    $roleModel->syncPermissions(['manage expeditions', 'view dashboard']);
                    break;
            }
        }
    }
}