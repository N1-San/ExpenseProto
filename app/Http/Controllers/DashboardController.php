<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function getAccounts(){
        $accounts = Account::all()->toArray();
        
        return $accounts;
    }

    public function getTransactions(){
        $transactions = Transaction::all()->toArray();
        return $transactions;
    }

    public function dashboard(){
        $accounts = $this->getAccounts();
        $transactions = $this->getTransactions();
        // dd($transactions);
        return view('pages.dashboard',[
            'accounts' => $accounts,
            'transactions'=> $transactions
        ]);
    }
}
