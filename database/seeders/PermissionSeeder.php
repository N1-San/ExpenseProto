<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    // {
    //     Permission::firstOrCreate(['name' => 'view accounts']);
    //     Permission::firstOrCreate(['name' => 'edit accounts']);
    //     Permission::firstOrCreate(['name' => 'view transactions']);
    //     Permission::firstOrCreate(['name' => 'edit transactions']);
    //     // Add more as needed
    // }
    {
        $permissions = [
            'view dashboard',
            'view accounts',
            'create accounts',
            'edit accounts',
            'delete accounts',

            'view transactions',
            'create transactions',

            'view savings',
            'view monthly ledger',
            'view budget',
            'view expenses',
            'view emergency savings',
            'export data',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
