<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DummyUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin Demo',
            'email' => 'admin@demo.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User Demo',
            'email' => 'user@demo.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');

        $store = User::create([
            'name' => 'Toko Demo',
            'email' => 'toko@demo.com',
            'password' => Hash::make('password'),
        ]);
        $store->assignRole('toko');

        $warehouse = User::create([
            'name' => 'Gudang Demo',
            'email' => 'gudang@demo.com',
            'password' => Hash::make('password'),
        ]);
        $warehouse->assignRole('gudang');
    }
}
