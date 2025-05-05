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
                $amount = rand(100, 5000);

                if ($transactionType == 'debit' && $account->amount < $amount) {
                    continue;
                }

                $transaction = new Transaction([
                    'account_id' => $account->id,
                    'amount' => $amount,
                    'transaction_type' => $transactionType,
                    'note' => Str::random(10),
                    'transaction_date' => now()->subDays(rand(0, 30)),
                ]);

                $transaction->save();

                // Update account balance
                $account->amount += ($transactionType == 'credit') ? $amount : -$amount;
                $account->save();
            }
        }
    }

}
