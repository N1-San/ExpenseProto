<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

// Route::get('/', function () {
//     return view('pages.dashboard');
// })->name('dashboard');

// Route::view('/accounts', 'pages.accounts')->name('accounts');
Route::get('/', [AccountController::class, 'dashboard'])->name('dashboard');

Route::get('/accounts', [AccountController::class, 'index'])->name('accounts');
Route::get('/accounts/create', [AccountController::class,'create'])->name('accounts.create');
Route::post('/accounts/store', [AccountController::class,'store'])->name('accounts.store');
Route::delete('/accounts/delete/{account}', [AccountController::class,'destroy'])->name('accounts.destroy');
Route::get('/accounts/edit/{account}', [AccountController::class,'edit'])->name('accounts.edit');
Route::put('/accounts/update', [AccountController::class,'update'])->name('accounts.update');
Route::post('/accounts/toggleActive/{account}', [AccountController::class,'toggleActive'])->name('accounts.toggleActive');


Route::view('/savings', 'pages.savings')->name('savings');
Route::view('/monthlyLedger', 'pages.monthlyLedger')->name('monthlyLedger');
Route::view('/budget', 'pages.budget')->name('budget');
Route::view('/expenses', 'pages.expenses')->name('expenses');
Route::view('/transactions', 'pages.transactions')->name('transactions');
Route::view('/emergencySavings', 'pages.emergencySavings')->name('emergencySavings');
Route::view('/exportData', 'pages.exportData')->name('exportData');
Route::view('/user', 'pages.user')->name('user');