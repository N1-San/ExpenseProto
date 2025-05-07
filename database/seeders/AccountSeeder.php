<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\User;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Make sure at least 5 users exist
        \App\Models\User::factory()->count(5)->create();

        // Create 20 sample accounts
        Account::factory()->count(20)->create();

        // $accounts = [
        //     ['user_id'=>1,'account_name' => 'Salary', 'balance' => 50000, 'account_type' => 'bank', 'is_active' => 1],
        //     ['user_id'=>1,'account_name' => 'Side', 'balance' => 25000, 'account_type' => 'cash', 'is_active' => 1],
        //     ['user_id'=>1,'account_name' => 'Part-Time', 'balance' => 25000, 'account_type' => 'bank', 'is_active' => 1],
        //     ['user_id'=>1,'account_name' => 'Business 1', 'balance' => 15000, 'account_type' => 'private', 'is_active' => 0],
        //     ['user_id'=>1,'account_name' => 'Business 2', 'balance' => 15000, 'account_type' => 'govt', 'is_active' => 0],
        // ];

        // foreach ($accounts as $account) {
        //     Account::create($account);
        // }
    }
}
