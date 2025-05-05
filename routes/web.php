<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SavingsController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

// Public welcome page
Route::get('/', function () {
    return view('welcome');
});

// Protected routes - only for authenticated users
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Accounts
    Route::prefix('accounts')->name('accounts.')->group(function () {
        Route::middleware(['auth', 'can:view accounts'])->get('/', [AccountController::class, 'index'])->name('index');
        Route::get('/create', [AccountController::class, 'create'])->name('create');
        Route::post('/store', [AccountController::class, 'store'])->name('store');
        Route::delete('/delete/{account}', [AccountController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{account}', [AccountController::class, 'edit'])->name('edit');
        Route::put('/update', [AccountController::class, 'update'])->name('update');
        Route::post('/toggleActive/{account}', [AccountController::class, 'toggleActive'])->name('toggleActive');
    });

    //Transactions
    Route::prefix('transactions')->name('transactions.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/create', [TransactionController::class, 'create'])->name('create');
        Route::post('/store', [TransactionController::class, 'store'])->name('store');
    });
    
    Route::prefix('savings')->name('savings.')->group(function () {
        Route::get('/', [SavingsController::class, 'index'])->name('index');
        Route::get('/create', [SavingsController::class, 'create'])->name('create');
        Route::post('/store', [SavingsController::class, 'store'])->name('store');
    });
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class,'index'])->name('admin.index');
});

<<<<<<< HEAD
Route::view('/savings', 'pages.savings.index')->name('savings');
Route::view('/loans', 'pages.loans.index')->name('loans');
=======
>>>>>>> SavingsModule
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