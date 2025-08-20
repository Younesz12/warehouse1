<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PurchaseOrder::with('rawProduct')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request) {
    $order = PurchaseOrder::create($request->all());
     if ($order->status === 'completed') {
                  $order->rawProduct->increment('stock_quantity', $order->quantity);
                  $order->rawProduct->stockEntries()->create([
                     'quantity' => $order->quantity,
                        ' type' => 'in',
                     'note' => 'Purchase Order #' . $order->id,
                ]);
 }
      return $order;
 }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->update ($request->all());
        return $purchaseOrder;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();
        return response()->noContent();
    }
}
