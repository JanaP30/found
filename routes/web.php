<?php

use App\Http\Controllers\CashRegisterController;
use App\Http\Controllers\MutualAidFundController;
use App\Http\Controllers\PublicController;
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

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::get('success', [PublicController::class, 'success'])->name('success');

Auth::routes();

Route::resource('admin/mutual_aid_fund', MutualAidFundController::class)->except(['update']);
Route::post('admin/mutual_aid_fund/{id}', [MutualAidFundController::class, 'update']);

Route::get('/cash_register',[CashRegisterController::class, 'index']);
Route::get('/cash_register/edit/{id}',[CashRegisterController::class, 'edit']);
Route::get('/cash_register/show/{id}',[CashRegisterController::class, 'show'])->name('cash-register-show');
Route::get('/cash_register/create',[CashRegisterController::class, 'create']);
Route::post('/cash_register/store',[CashRegisterController::class, 'store']);
Route::post('/cash_register/update/{id}', [CashRegisterController::class,'update'])->name('cash-register-update');
Route::get('/cash_register/destroy/{id}',[CashRegisterController::class, 'destroy']);




