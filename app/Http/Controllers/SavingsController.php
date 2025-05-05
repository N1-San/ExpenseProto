<?php

namespace App\Http\Controllers;

use App\Models\Savings;
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

    // public function create()
    // {
    //     $accounts = Account::where('is_active', true)->get();
    //     return view('pages.savings.create', [
    //         'accounts' => $accounts
    //     ]);

    // }

    public function create()
    {
        $accounts = Account::where('is_active', true)->get(); 
        $savingsAccounts = Savings::all();

        return view('pages.savings.create', compact('accounts', 'savingsAccounts'));
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'from_type' => 'required|in:account,savings',
            'from_id' => 'required|integer',
            'to_type' => 'required|in:account,savings',
            'to_id' => 'required|integer',
            'amount' => 'required|numeric|min:0.01',
            'note' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {
            $amount = $request->amount;
            $note = $request->note;

            // Resolve models
            $from = $request->from_type === 'account'
                ? Account::findOrFail($request->from_id)
                : Savings::findOrFail($request->from_id);

            $to = $request->to_type === 'account'
                ? Account::findOrFail($request->to_id)
                : Savings::findOrFail($request->to_id);

            // Check sufficient balance
            if ($from->amount < $amount) {
                throw ValidationException::withMessages(['amount' => 'Insufficient balance.']);
            }

            // Debit from source
            $from->amount -= $amount;
            $from->save();

            $from->transactions()->create([
                'amount' => $amount,
                'transaction_type' => 'debit',
                'note' => $note ?: 'Transfer to ' . class_basename($to) . ' #' . $to->id,
                'transaction_date' => now(),
            ]);

            // Credit to destination
            $to->amount += $amount;
            $to->save();

            $to->transactions()->create([
                'amount' => $amount,
                'transaction_type' => 'credit',
                'note' => $note ?: 'Transfer from ' . class_basename($from) . ' #' . $from->id,
                'transaction_date' => now(),
            ]);
        });

        return redirect()->back()->with('success', 'Transfer completed.');
    }

    // public function transferToSavings(Request $request)
    // {
    //     dd($request->all());
    //     $request->validate([
    //         'from_account_id' => 'required|exists:accounts,id',
    //         'amount' => 'required|numeric|min:0.01',
    //     ]);

    //     $fromAccount = Account::findOrFail($request->from_account_id);
    //     $savingsAccount = Savings::firstOrFail(); // Assumes one savings account for now

    //     if ($fromAccount->amount < $request->amount) {
    //         return back()->with('error', 'Insufficient balance.');
    //     }

    //     DB::transaction(function () use ($fromAccount, $savingsAccount, $request) {
    //         // Debit from regular account
    //         $fromAccount->transactions()->create([
    //             'transaction_type' => 'debit',
    //             'amount' => $request->amount,
    //             'note' => 'Transferred to Savings',
    //             'transaction_date' => now(),
    //         ]);
    //         $fromAccount->decrement('amount', $request->amount);

    //         // Credit to savings
    //         $savingsAccount->transactions()->create([
    //             'transaction_type' => 'credit',
    //             'amount' => $request->amount,
    //             'note' => 'Received from ' . $fromAccount->name,
    //             'transaction_date' => now(),
    //         ]);
    //         $savingsAccount->increment('amount', $request->amount);
    //     });

    //     return redirect()->route('savings.index')->with('success', 'Transfer successful');
    // }

    public function show(Savings $savings)
    {
        //
    }

    public function edit(Savings $savings)
    {
        //
    }

    public function update(Request $request, Savings $savings)
    {
        //
    }

    public function destroy(Savings $savings)
    {
        //
    }
}
