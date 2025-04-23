<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::insert([
            ['name' => 'Salary', 'amount' => 26800],
            ['name' => 'Side', 'amount' => 11670],
            ['name' => 'Part-Time', 'amount' => 13470],
            ['name' => 'Business 1', 'amount' => 2800],
            ['name' => 'Business 2', 'amount' => 1670],
        ]);
    }
}
