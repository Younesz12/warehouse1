<?php

namespace App\Http\Controllers;

use App\Models\RawProduct;
use App\Models\FinishedProduct;
use App\Models\ProductionLog;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Define all the variables needed for the dashboard view
        $totalRawProducts = RawProduct::count();
        $totalFinishedProducts = FinishedProduct::count();
        $totalStock = RawProduct::sum('stock_quantity') + FinishedProduct::sum('stock_quantity');
        $totalProductionLogs = ProductionLog::count();
        $totalPurchaseOrders = PurchaseOrder::count();

        // Count purchase orders by their status
        $pendingOrders = PurchaseOrder::where('status', 'pending')->count();
        $completedOrders = PurchaseOrder::where('status', 'completed')->count();
        $cancelledOrders = PurchaseOrder::where('status', 'cancelled')->count();

        // Pass all variables to the dashboard view using compact()
        return view('dashboard', compact(
            'totalRawProducts',
            'totalFinishedProducts',
            'totalStock',
            'totalProductionLogs',
            'totalPurchaseOrders',
            'pendingOrders',
            'completedOrders',
            'cancelledOrders'
        ));
    }
    // In app/Http/Controllers/DashboardController.php
public function showRegistrationForm()
{
    return view('auth.register');
}
}