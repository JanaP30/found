<?php

use App\Http\Controllers\Admin\BalanceController as AdminBalanceController;
use App\Http\Controllers\Admin\DepositController as AdminDepositController;
use App\Http\Controllers\Admin\LoanController as AdminLoanController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [DashboardController::class, 'dashboard']);
Route::get('/', [HomeController::class, 'index'])->name('admin');

Auth::routes(['register' => false]);

Route::get('admin/users', [AdminUserController::class, 'index']);
Route::get('admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
Route::get('admin/users/edit/{id}', [AdminUserController::class, 'edit']);
Route::get('admin/users/show/{id}', [AdminUserController::class, 'show']);
Route::post('admin/users/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');;
Route::post('admin/users/store', [AdminUserController::class, 'store'])->name('admin.users.store');

Route::get('admin/balances', [AdminBalanceController::class, 'index']);

Route::get('admin/deposits', [AdminDepositController::class, 'index']);
Route::get('admin/deposits/create', [AdminDepositController::class, 'create'])->name('admin.deposits.create');
Route::post('admin/deposits/store', [AdminDepositController::class, 'store'])->name('admin.deposits.store');

Route::get('admin/transactions', [AdminTransactionController::class, 'index']);

Route::get('admin/loans', [AdminLoanController::class, 'index']);

Route::get('deposits', [DepositController::class, 'index']);

Route::get('transactions', [TransactionController::class, 'index']);

Route::get('loans', [LoanController::class, 'index']);
Route::get('loans/create', [LoanController::class, 'create']);
Route::post('loans/store', [LoanController::class, 'store'])->name('user.loans.store');