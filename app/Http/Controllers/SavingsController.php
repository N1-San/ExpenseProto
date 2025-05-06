<?php

namespace App\Http\Controllers;

use App\Services\TransferToSavingsService;
use App\Models\Account;
use App\Models\Savings;

use App\Models\SavingsAccount;
use Illuminate\Http\Request;

class SavingsController extends Controller
{

    public function getCollection()
    {
        $savings = Savings::with('account')->latest()->get();

        return $savings;
    }
    public function index()
    {
        $savings = $this->getCollection();

        return view('pages.savings.index', [
            'savings' => $savings,
        ]);
    }

    public function create()
    {
        // $accounts = Account::where('is_active', true)->get(); 
        // $savingsAccounts = Savings::all();
        $accounts = Account::all();
        $savings = SavingsAccount::all();

        // return view('pages.savings.create', compact('accounts', 'savingsAccounts'));
        return view('pages.savings.create', compact('accounts', 'savings'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'from_type' => 'required|in:account,savings',
            'from_id' => 'required|integer',
            'to_id' => 'required|integer',
            'amount' => 'required|numeric|min:0.01',
        ]);

        try {
            TransferToSavingsService::transfer(
                $request->from_type,
                $request->from_id,
                $request->to_id,
                $request->amount
            );

            return redirect()->back()->with('success', 'Transfer successful!');
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
