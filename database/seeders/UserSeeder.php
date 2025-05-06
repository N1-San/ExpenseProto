<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );
        $admin->assignRole('admin');

        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'User', 'password' => bcrypt('password')]
        );
        $user->assignRole('user');

        $david = User::firstOrCreate(
            ['email' => 'david@example.com'],
            ['name' => 'David', 'password' => bcrypt('Pass@123')]
        );
        $david->assignRole('admin');
    }
}
