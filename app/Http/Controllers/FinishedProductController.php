<?php

namespace App\Http\Controllers;

use App\Models\FinishedProduct;
use Illuminate\Http\Request;

class FinishedProductController extends Controller
{
   

    public function index()
    {
        $finishedProducts = FinishedProduct::all();
        return view('finished_products.index', compact('finishedProducts'));
    }

    public function create()
    {
        return view('finished_products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:finished_products,sku',
            'unit' => 'required|string|max:50',
            'stock_quantity' => 'nullable|numeric|min:0'
        ]);

        FinishedProduct::create($data);

        return redirect()->route('finished_products.index')
                         ->with('success', 'Finished product created successfully.');
    }

    public function edit(FinishedProduct $finishedProduct)
    {
        return view('finished_products.edit', compact('finishedProduct'));
    }

    public function update(Request $request, FinishedProduct $finishedProduct)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:finished_products,sku,' . $finishedProduct->id,
            'unit' => 'required|string|max:50',
            'stock_quantity' => 'nullable|numeric|min:0'
        ]);

        $finishedProduct->update($data);

        return redirect()->route('finished_products.index')
                         ->with('success', 'Finished product updated successfully.');
    }

    public function destroy(FinishedProduct $finishedProduct)
    {
        $finishedProduct->delete();

        return redirect()->route('finished_products.index')
                         ->with('success', 'Finished product deleted successfully.');
    }
}
