<?php
namespace App\Services;

use App\Models\Account;
use App\Models\SavingsAccount;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransferToSavingsService
{
    public static function transfer($fromType, $fromId, $toId, $amount)
    {
        DB::transaction(function () use ($fromType, $fromId, $toId, $amount) {
            if ($fromType === 'account') {
                $from = Account::findOrFail($fromId);
                $to = SavingsAccount::findOrFail($toId);

                if ($from->amount < $amount) {
                    throw new \Exception('Insufficient funds in account');
                }

                $from->decrement('amount', $amount);
                $to->increment('amount', $amount);

                Transaction::create([
                    'account_id' => $from->id,
                    'amount' => $amount,
                    'transaction_type' => 'debit',
                    'transactionable_type' => SavingsAccount::class,
                    'transactionable_id' => $to->id,
                    'note' => 'Transfer to savings'
                ]);

                Transaction::create([
                    'account_id' => null,
                    'amount' => $amount,
                    'transaction_type' => 'credit',
                    'transactionable_type' => SavingsAccount::class,
                    'transactionable_id' => $to->id,
                    'note' => 'Received from account'
                ]);
            } elseif ($fromType === 'savings') {
                $from = SavingsAccount::findOrFail($fromId);
                $to = Account::findOrFail($toId);

                if ($from->amount < $amount) {
                    throw new \Exception('Insufficient funds in savings');
                }

                $from->decrement('amount', $amount);
                $to->increment('amount', $amount);

                Transaction::create([
                    'account_id' => null,
                    'amount' => $amount,
                    'transaction_type' => 'debit',
                    'transactionable_type' => SavingsAccount::class,
                    'transactionable_id' => $from->id,
                    'note' => 'Transfer from savings'
                ]);

                Transaction::create([
                    'account_id' => $to->id,
                    'amount' => $amount,
                    'transaction_type' => 'credit',
                    'transactionable_type' => SavingsAccount::class,
                    'transactionable_id' => $from->id,
                    'note' => 'Received from savings'
                ]);
            }
        });
    }
}
