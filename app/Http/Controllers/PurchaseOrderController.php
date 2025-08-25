<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\RawProduct;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the purchase orders.
     */
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with('rawProduct')->get();
        return view('purchase-orders.index', compact('purchaseOrders'));
    }

    /**
     * Show the form for creating a new purchase order.
     */
    public function create()
    {
        $rawProducts = RawProduct::all();
        return view('purchase-orders.create', compact('rawProducts'));
    }

    /**
     * Store a newly created purchase order in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'raw_product_id' => 'required|exists:raw_products,id',
            'quantity' => 'required|numeric|min:0',
        ]);
        PurchaseOrder::create($data);
        return redirect()->route('purchase-orders.index')->with('success', 'Purchase order created successfully.');
    }

    /**
     * Display the specified purchase order.
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        return view('purchase-orders.show', compact('purchaseOrder'));
    }

    /**
     * Show the form for editing the specified purchase order.
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        $rawProducts = RawProduct::all();
        return view('purchase-orders.edit', compact('purchaseOrder', 'rawProducts'));
    }

    /**
     * Update the specified purchase order in storage.
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $data = $request->validate([
            'raw_product_id' => 'required|exists:raw_products,id',
            'quantity' => 'required|numeric|min:0',
            'status' => 'in:pending,completed,cancelled'
        ]);
        $purchaseOrder->update($data);
        return redirect()->route('purchase-orders.index')->with('success', 'Purchase order updated successfully.');
    }

    /**
     * Remove the specified purchase order from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();
        return redirect()->route('purchase-orders.index')->with('success', 'Purchase order deleted successfully.');
    }

    /**
     * Update the status of a specific purchase order.
     */
    public function updateStatus(Request $request, PurchaseOrder $purchaseOrder)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        // Check if the new status is 'completed'
        if ($request->status === 'completed' && $purchaseOrder->status !== 'completed') {
            // Find the associated raw product using the relationship
            $rawProduct = $purchaseOrder->rawProduct;
            
            // Increment the raw product's stock quantity by the order quantity
            $rawProduct->stock_quantity += $purchaseOrder->quantity;
            
            // Save the updated raw product to the database
            $rawProduct->save();
        }

        // Update the purchase order's status
        $purchaseOrder->update(['status' => $request->status]);

        return redirect()->route('purchase-orders.index')
                         ->with('success', 'Purchase order status updated successfully.');
    }
}