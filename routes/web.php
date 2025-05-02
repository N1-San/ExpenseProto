<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

// Public welcome page
Route::get('/', function () {
    return view('welcome');
});

// Protected routes - only for authenticated users
Route::middleware(['auth'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Accounts
    Route::middleware(['auth', 'can:view accounts'])->get('/accounts', [AccountController::class, 'index'])->name('accounts');
    Route::get('/accounts/create', [AccountController::class,'create'])->name('accounts.create');
    Route::post('/accounts/store', [AccountController::class,'store'])->name('accounts.store');
    Route::delete('/accounts/delete/{account}', [AccountController::class,'destroy'])->name('accounts.destroy');
    Route::get('/accounts/edit/{account}', [AccountController::class,'edit'])->name('accounts.edit');
    Route::put('/accounts/update', [AccountController::class,'update'])->name('accounts.update');
    Route::post('/accounts/toggleActive/{account}', [AccountController::class,'toggleActive'])->name('accounts.toggleActive');
    
    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/transactions/create', [TransactionController::class,'create'])->name('transactions.create');
    Route::post('/transactions/store', [TransactionController::class,'store'])->name('transactions.store');
});


Route::view('/savings', 'pages.savings.index')->name('savings');
Route::view('/loans', 'pages.loans.index')->name('loans');
Route::view('/monthlyLedger', 'pages.monthlyLedger')->name('monthlyLedger');
Route::view('/budget', 'pages.budget')->name('budget');
Route::view('/expenses', 'pages.expenses')->name('expenses');
Route::view('/emergencySavings', 'pages.emergencySavings')->name('emergencySavings');
Route::view('/exportData', 'pages.exportData')->name('exportData');
Route::view('/user', 'pages.user')->name('user');



// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    
    // Route::get('/', function () {
        //     return view('pages.dashboard');
        // })->name('dashboard');
        
// Route::view('/accounts', 'pages.accounts')->name('accounts');