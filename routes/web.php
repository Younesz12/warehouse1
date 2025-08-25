<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RawProductController;
use App\Http\Controllers\FinishedProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ProductionLogController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
})->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth', 'verified', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('finished-products/{finishedProduct}/sell', [FinishedProductController::class, 'sell'])
    ->name('finished-products.sell');
    
    // Custom route for updating purchase order status
    Route::post('purchase-orders/{purchaseOrder}/update-status', [PurchaseOrderController::class, 'updateStatus'])
        ->name('purchase-orders.update-status');

    // Resourceful Routes
    Route::resource('raw-products', RawProductController::class);
    Route::resource('finished-products', FinishedProductController::class);
    Route::resource('purchase-orders', PurchaseOrderController::class);
    Route::resource('production-logs', ProductionLogController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile.edit');
});