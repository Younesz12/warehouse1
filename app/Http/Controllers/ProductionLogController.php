<?php

namespace App\Http\Controllers;

use App\Models\ProductionLog;
use App\Models\FinishedProduct;
use App\Models\RawProduct;
use App\Services\ProductionService;
use Illuminate\Http\Request;

class ProductionLogController extends Controller
{
    protected $service;

    

    public function index()
    {
        $logs = ProductionLog::with('finishedProduct','rawProducts')->get();
        return view('production-logs.index', compact('logs'));
    }

    public function create()
    {
        $finishedProducts = FinishedProduct::all();
        $rawProducts = RawProduct::all();
        return view('production-logs.create', compact('finishedProducts','rawProducts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'finished_product_id' => 'required|exists:finished_products,id',
            'quantity_produced' => 'required|numeric|min:1',
            'raw_products' => 'required|array',
            'raw_products.*' => 'numeric|min:0'
        ]);

 $service = new ProductionService();
        $service->produce($data);
        return redirect()->route('production-logs.index')
                         ->with('success', 'Production log created successfully.');
    }

    public function destroy(ProductionLog $productionLog)
    {
        $productionLog->delete();
        return redirect()->route('production-logs.index')
                         ->with('success', 'Production log deleted successfully.');
    }
}
