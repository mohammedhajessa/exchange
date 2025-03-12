<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\FinanceBoxController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxTransitionController;
use App\Http\Controllers\ExchangeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware(['auth','admin'])->group(function () {
    Route::resource('/branches', BranchController::class);
    Route::resource('/finance-boxes', FinanceBoxController::class);
});
// Route::middleware(['auth','user'])->group(function () {
    Route::resource('/transfers', TransferController::class)->middleware('auth');
    Route::resource('/currencies', CurrencyController::class)->middleware('auth');
    Route::resource('/exchanges', ExchangeController::class)->middleware('auth');


    Route::get('/transfers-incoming', [TransferController::class, 'incoming'])->name('transfers.incoming')->middleware('auth');
    Route::put('/transfers/{transfer}/update-status/{status}', [TransferController::class, 'updateStatus'])->name('transfers.updateStatus')->middleware('auth');
    Route::get('/box-transition/exchange', [BoxTransitionController::class, 'exchange'])->name('box-transition.exchange')->middleware('auth');
    Route::get('/box-transition/transfer', [BoxTransitionController::class, 'index'])->name('box-transition.transfer')->middleware('auth');
// });
