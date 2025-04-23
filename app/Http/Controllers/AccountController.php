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

    public function dashboard(){
        $accounts = $this->getCollection();

        return view('pages.dashboard',[
            'accounts' => $accounts,
        ]);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
