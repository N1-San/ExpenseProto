<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Support\Str;

class TransactionsSeeder extends Seeder
{
    public function run()
    {
        $accounts = Account::all();

        foreach ($accounts as $account) {
            for ($i = 0; $i < 5; $i++) {
                $transactionType = rand(0, 1) ? 'credit' : 'debit';
                $amount = rand(100, 5000); // Keep it reasonable

                // Adjust balance
                if ($transactionType == 'debit' && $account->amount < $amount) {
                    // Skip if insufficient balance
                    continue;
                }

                $transaction = new Transaction([
                    'amount' => $amount,
                    'transaction_type' => $transactionType,
                    'note' => Str::random(10),
                    'transaction_date' => now()->subDays(rand(0, 30)),
                ]);

                $transaction->transactionable()->associate($account);
                $transaction->save();

                // Update account balance
                if ($transactionType == 'credit') {
                    $account->amount += $amount;
                } else {
                    $account->amount -= $amount;
                }

                $account->save();
            }
        }
    }
}
