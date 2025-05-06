<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function getCollection()
    {
        // $transactions = Transaction::with('user')->latest()->get()->toArray();
        $transactions = Transaction::with(['sourceAccount', 'destinationAccount', 'user'])->get();

        // dd($transactions);
        return $transactions;
    }
    public function index()
    {
        $transactions = $this->getCollection();

        return view('pages.transactions.index', [
            'transactions' => $transactions,
        ]);
    }

    public function create()
    {
        $accounts = Account::where('is_active', true)->get();
        return view('pages.transactions.create', compact('accounts'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'amount' => 'required|numeric',
            'transaction_type' => 'required|in:credit,debit',
            'note' => 'nullable|string',
        ]);


        try {
            DB::transaction(function () use ($request) {
                $account = Account::findOrFail($request->account_id);


                if ($request->transaction_type === 'debit' && $account->amount < $request->amount) {
                    throw new \Exception('Not enough balance.');
                }


                if ($request->transaction_type === 'credit') {
                    $account->amount += $request->amount;
                } else {
                    $account->amount -= $request->amount;
                }

                $account->save();


                Transaction::create([
                    'account_id' => $request->account_id,
                    'amount' => $request->amount,
                    'transaction_type' => $request->transaction_type,
                    'note' => $request->note,
                    'transaction_date' => now(),
                ]);
            });

            return redirect()->route('transactions.index')->with('success', 'Transaction recorded.');
        } catch (Exception $e) {
            dd($e->getMessage());
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
