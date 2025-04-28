<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class DashboardController extends Controller
{
    public function getAccounts(){
        $accounts = Account::all()->toArray();
        
        return $accounts;
    }

    public function getTransactions(Request $request){
        $transactions = Transaction::all()->toArray();
        return $transactions;
    }

    public function dashboard(){
        $accounts = $this->getAccounts();
        $transactions = $this->getTransactions();

        return view('pages.dashboard',[
            'accounts' => $accounts,
            'transactions'=> $transactions
        ]);
    }
}
