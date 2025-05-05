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
        $accounts = [
            ['name' => 'Salary', 'amount' => 50000, 'is_active' => 1],
            ['name' => 'Side', 'amount' => 25000, 'is_active' => 1],
            ['name' => 'Part-Time', 'amount' => 25000, 'is_active' => 1],
            ['name' => 'Business 1', 'amount' => 15000, 'is_active' => 0],
            ['name' => 'Business 2', 'amount' => 15000, 'is_active' => 0],
        ];

        foreach ($accounts as $account) {
            Account::create($account);
        }
    }
}
