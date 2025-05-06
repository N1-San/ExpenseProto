<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Savings;

class DashboardController extends Controller
{
    public function getAccounts()
    {
        $accounts = Account::all()->toArray();

        return $accounts;
    }

    public function getTransactions()
    {
        $transactions = Transaction::all()->toArray();
        return $transactions;
    }
    public function getTotalBalance()
    {
        $activeAccounts = Account::where('is_active', true)->get();
        $totalAccountBalance = $activeAccounts->sum('balance');
        return $totalAccountBalance;
    }
    public function getSavingBalance()
    {
        $savingsAccount = Savings::first();
        $totalSavingsBalance = $savingsAccount?->amount ?? 0;
        return $totalSavingsBalance;
    }

    public function dashboard()
    {
        $totalBalance = $this->getTotalBalance();
        $accounts = $this->getAccounts();
        $transactions = $this->getTransactions();
        $savingBalance = $this->getSavingBalance();
        // dd($transactions);
        return view('pages.dashboard', [
            'accounts' => $accounts,
            'transactions' => $transactions,
            'totalBalance' => $totalBalance,
            'savingBalance'=> $savingBalance
        ]);
    }
}
