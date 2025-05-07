<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccountType;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = ['Savings', 'Salary', 'Demat', 'Cash', 'Investment', 'Business'];

        foreach ($types as $type) {
            AccountType::firstOrCreate(['name' => $type]);
        }
    }
}
