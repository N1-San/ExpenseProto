<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    
    public function getCollection(){
        $accounts = Account::all()->toArray();
        
        return $accounts;
    }
    
    public function index()
    {
        $accounts = $this->getCollection();
        // dd($accounts);
        return view('pages.accounts.index',[
            'accounts' => $accounts,
        ]);
    }

    public function create()
    {
        return view('pages.accounts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'is_active' => 'required|boolean',
        ]);

        Account::create([
            'name' => $validatedData['name'],
            'amount' => $validatedData['amount'],
            'is_active' => $validatedData['is_active'],
        ]);

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }
    
    public function destroy(Account $account)
    {
        Account::destroy($account->id);

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
    public function edit(Account $account)
    {
        return view('pages.accounts.edit', [
            'account' => $account,
            'is_active' => $account->is_active,
        ]);
    }
    public function update(Request $request, Account $account)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:accounts,id',
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'is_active' => 'required|boolean',
        ]);

        $account = Account::findOrFail($validatedData['id']);
        $account->update([
            'name' => $validatedData['name'],
            'amount' => $validatedData['amount'],
            'is_active' => $validatedData['is_active'],
        ]);

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }
    public function toggleActive(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:accounts,id',
            'is_active' => 'required|boolean',
        ]);

        $account = Account::findOrFail($validatedData['id']);
        $account->is_active = !$account->is_active;
        $account->save();

        return redirect()->route('accounts.index')->with('success', 'Account status toggled successfully.');
        // dd($request->all());
    }

}
