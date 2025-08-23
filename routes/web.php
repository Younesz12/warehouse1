<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RawProductController;
use App\Http\Controllers\FinishedProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ProductionLogController;

// Home page
Route::get('/', function () {
    return view('dashboard');
})->middleware('auth')->name('home');

// Dashboard  
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Your warehouse routes
Route::middleware('auth')->group(function () {
    Route::resource('raw-products', RawProductController::class);
    Route::resource('finished-products', FinishedProductController::class);
    Route::resource('purchase-orders', PurchaseOrderController::class);
    Route::resource('production-logs', ProductionLogController::class);
    Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile.edit');

});

// Breeze auth routes
require __DIR__.'/auth.php';