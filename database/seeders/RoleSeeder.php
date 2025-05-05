<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    // public function run(): void
    // {
    // }
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);
        $admin = Role::where('name', 'admin')->first();
        $user = Role::where('name', 'user')->first();

        // Assign ALL permissions to admin
        $admin->syncPermissions(Permission::all());

        // Assign limited permissions to user
        $user->syncPermissions([
            'view dashboard',
            'view accounts',
            'view transactions',
            'create transactions',
        ]);
    }
}
