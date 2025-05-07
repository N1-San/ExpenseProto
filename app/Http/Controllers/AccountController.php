<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function getCollection()
    {
        $accounts = Account::get();
        return $accounts;
    }

    public function index()
    {
        $accounts = $this->getCollection();
        $activeAccounts = Account::with('accountType')
            ->where('user_id', auth()->id())
            ->where('is_active', true)
            ->get();

        $inactiveAccounts = Account::with('accountType')
            ->where('user_id', auth()->id())
            ->where('is_active', false)
            ->get();
        return view('pages.accounts.index', [
            'accounts' => $accounts,
            'activeAccounts' => $activeAccounts,
            'inactiveAccounts' => $inactiveAccounts,
        ]);
    }

    public function create()
    {
        $accountTypes = AccountType::all();
        return view('pages.accounts.create', compact('accountTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'balance' => 'required|numeric|min:0',
            'account_type_id' => 'required|exists:account_types,id',
            'is_active' => 'required|boolean',
        ]);

        $validated['user_id'] = Auth::id();

        Account::create($validated);

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
        //     dd($request->all());
        //     try {
        //         $validatedData = $request->validate([
        //             'account_name' => 'required|string|max:255',
        //             'balance' => 'required|numeric',
        //             'account_type' => 'required|string|max:255',
        //             'is_active' => 'required|boolean',
        //         ]);
    
        //         $userId = Auth::id();
    
        //         $account = new Account;
        //         $account->fill($validatedData);
        //         $account->user_id = $userId;
        //         $account->save();
    
        //     } catch (Exception $e) {
        //         // dd($e->getMessage());
        //         return back()->withErrors(['error' => $e->getMessage()]);
        //     }
    
        //     return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    public function destroy(Account $account)
    {
        $this->authorizeOwnership($account);

        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');

        // Account::destroy($account->id);

        // return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
    public function edit(Account $account)
    {
        // $this->authorizeOwnership($account);

        $accountTypes = AccountType::all();
        return view('pages.accounts.edit', compact('account', 'accountTypes'));
    }
    public function update(Request $request, Account $account)
    {
        // $this->authorizeOwnership($account);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'balance' => 'required|numeric|min:0',
            'account_type_id' => 'required|exists:account_types,id',
            'is_active' => 'required|boolean',
        ]);

        // dd($validated);
        $account->update($validated);

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');

        // dd($request->all());
        // dd($account->all()->toArray());
        // $validatedData = $request->validate([
        //     'id' => 'required|integer|exists:accounts,id',
        //     'account_name' => 'required|string|max:255',
        //     'balance' => 'required|numeric',
        //     'account_type' => 'required|string|max:255',
        //     'is_active' => 'required|boolean',
        // ]);

        // $userId = Auth::id();

        // $account = Account::findOrFail($validatedData['id']);
        // $account->user_id = $userId;
        // $account->update([
        //     'account_name' => $validatedData['account_name'],
        //     'balance' => $validatedData['balance'],
        //     'account_type' => $validatedData['account_type'],
        //     'is_active' => $validatedData['is_active'],
        // ]);

        // return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
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
    protected function authorizeOwnership(Account $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
    }

}
