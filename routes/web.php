<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::view('/accounts', 'pages.accounts')->name('accounts');
Route::view('/monthlyLedger', 'pages.monthlyLedger')->name('monthlyLedger');
Route::view('/budget', 'pages.budget')->name('budget');
Route::view('/expenses', 'pages.expenses')->name('expenses');
Route::view('/transactions', 'pages.transactions')->name('transactions');
Route::view('/emergencySavings', 'pages.emergencySavings')->name('emergencySavings');
Route::view('/exportData', 'pages.exportData')->name('exportData');
Route::view('/user', 'pages.user')->name('user');