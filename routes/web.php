<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\JournalController;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/cache-clear', [DashboardController::class, 'cacheClear'])->name('cache-clear');

        Route::resource('products', ProductController::class)->except(['show']);
        Route::resource('sales', SaleController::class)->except(['show']);
        Route::resource('payments', PaymentController::class)->only(['index']);
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::resource('journals', JournalController::class)->only(['index']);
    });


});

require __DIR__.'/auth.php';
