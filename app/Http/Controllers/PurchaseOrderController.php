<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\RawProduct;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
   

    public function index()
    {
        $orders = PurchaseOrder::with('rawProduct')->get();
        return view('purchase_orders.index', compact('orders'));
    }

    public function create()
    {
        $rawProducts = RawProduct::all();
        return view('purchase_orders.create', compact('rawProducts'));
    }

    // In PurchaseOrderController.php

public function store(Request $request)
{
    $data = $request->validate([
        'raw_product_id' => 'required|exists:raw_products,id',
        'quantity' => 'required|numeric|min:1'
    ]);

    $order = PurchaseOrder::create($data);

    // update stock automatically
    $order->rawProduct->increment('stock_quantity', $data['quantity']);
    $order->update(['status' => 'completed']);

    return redirect()->route('purchase-orders.index')
                     ->with('success', 'Purchase order created successfully.');
}

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();

        return redirect()->route('purchase-orders.index')
                     ->with('success', 'Purchase order deleted successfully.');
    }
}
