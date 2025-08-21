<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RawProductController;
use App\Http\Controllers\FinishedProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ProductionLogController;
use App\Http\Controllers\StockEntryController;

// صفحة البداية
Route::get('/', function () {
    return view('welcome');
});

// المواد الخام
Route::resource('raw-products', RawProductController::class);

// المنتجات النهائية
Route::resource('finished-products', FinishedProductController::class);

// أوامر الشراء
Route::resource('purchase-orders', PurchaseOrderController::class);

// عمليات التصنيع
Route::resource('production-logs', ProductionLogController::class);

// حركات المخزون (قراءة فقط)
