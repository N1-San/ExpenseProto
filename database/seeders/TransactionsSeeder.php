<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\User;
use Faker\Factory as Faker;

class TransactionsSeeder extends Seeder
{

    public function run()
    {
        // Create an instance of Faker for generating random data
        $faker = Faker::create();

        // Fetch a random user (assuming users exist in your database)
        // Fetch a random user
        $user = User::inRandomOrder()->first();

        // Fetch the user's accounts
        $accounts = Account::where('user_id', $user->id)->get();

        // Ensure there are accounts before proceeding
        if ($accounts->isEmpty()) {
            // Create dummy accounts for this user if none exist
            $accounts = collect([ // We wrap the single account in a collection
                Account::create([
                    'user_id' => $user->id,
                    'account_name' => 'Default Checking',
                    'balance' => 500.00,
                    'account_type' => 'bank',
                    'is_active' => true,
                ]),
                Account::create([
                    'user_id' => $user->id,
                    'account_name' => 'Default Savings',
                    'balance' => 1000.00,
                    'account_type' => 'savings',
                    'is_active' => true,
                ])
            ]);
        }

        // Generate transactions for the user
        for ($i = 0; $i < 10; $i++) {
            // Pick random source and destination accounts from the collection
            $sourceAccount = $accounts->random(); // This works as $accounts is now a collection
            $destinationAccount = $accounts->random();

            // Skip if source and destination accounts are the same
            if ($sourceAccount->id == $destinationAccount->id) {
                continue;
            }

            // Create the transaction
            Transaction::create([
                'user_id' => $user->id,
                'amount' => $faker->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
                'transaction_type' => $faker->randomElement(['credit', 'debit']), // 'credit' or 'debit'
                'note' => $faker->sentence(), // Random sentence as the note
                'source_account_id' => $sourceAccount->id,
                'destination_account_id' => $destinationAccount->id,
                'external_account_name' => $faker->company(), // Optional external account name
                'related_module' => $faker->randomElement(['loan', 'savings', 'expense']), // Optional related module
            ]);
        }

    }

    // public function run()
    // {
    //     $faker = Faker::create();

    //     // Fetch a random user (assuming users exist in your database)
    //     $user = User::inRandomOrder()->first();

    //     // Fetch a few accounts for the user (assuming user has at least one account)
    //     $accounts = Account::where('user_id', $user->id)->get();

    //     // Seed transactions for this user
    //     for ($i = 0; $i < 10; $i++) {
    //         Transaction::create([
    //             'user_id' => $user->id,
    //             'amount' => $faker->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
    //             'transaction_type' => $faker->randomElement(['credit', 'debit']), // Randomly choose between 'credit' or 'debit'
    //             'note' => $faker->sentence(), // Random sentence as the note
    //             'source_account_id' => $accounts->random()->id, // Random source account from the user’s accounts
    //             'destination_account_id' => $accounts->random()->id, // Random destination account from the user’s accounts
    //             'external_account_name' => $faker->company(), // Random external account name
    //             'related_module' => $faker->randomElement(['loan', 'savings', 'expense']), // Random related module
    //         ]);
    //     }

    // $accounts = Account::all();

    // foreach ($accounts as $account) {
    //     for ($i = 0; $i < 5; $i++) {
    //         $transactionType = rand(0, 1) ? 'credit' : 'debit';
    //         $amount = rand(100, 5000);

    //         if ($transactionType == 'debit' && $account->amount < $amount) {
    //             continue;
    //         }

    //         $transaction = new Transaction([
    //             'account_id' => $account->id,
    //             'amount' => $amount,
    //             'transaction_type' => $transactionType,
    //             'note' => Str::random(10),
    //             'transaction_date' => now()->subDays(rand(0, 30)),
    //         ]);

    //         $transaction->save();

    //         // Update account balance
    //         $account->amount += ($transactionType == 'credit') ? $amount : -$amount;
    //         $account->save();
    //     }
    // }
    // }

}
