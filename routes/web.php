<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RawProductController;
use App\Http\Controllers\FinishedProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ProductionLogController;

Route::apiResource('raw-products', RawProductController::class);
Route::apiResource('finished-products', FinishedProductController::class);
Route::apiResource('purchase-orders', PurchaseOrderController::class)->only(['index','store','update','destroy','show']);
Route::apiResource('production-logs', ProductionLogController::class)->only(['index','store','show','destroy']);
