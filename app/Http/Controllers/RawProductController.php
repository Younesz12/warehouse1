<?php

namespace App\Http\Controllers;

use App\Models\RawProduct;
use Illuminate\Http\Request;

class RawProductController extends Controller
{
   

    public function index()
    {
        $rawProducts = RawProduct::all();
        return view('raw_products.index', compact('rawProducts'));
    }

    public function create()
    {
        return view('raw_products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:raw_products,sku',
            'unit' => 'required|string|max:50',
            'stock_quantity' => 'nullable|numeric|min:0'
        ]);

        RawProduct::create($data);

        return redirect()->route('raw_products.index')
                         ->with('success', 'Raw product created successfully.');
    }

    public function edit(RawProduct $rawProduct)
    {
        return view('raw_products.edit', compact('rawProduct'));
    }

    public function update(Request $request, RawProduct $rawProduct)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:raw_products,sku,' . $rawProduct->id,
            'unit' => 'required|string|max:50',
            'stock_quantity' => 'nullable|numeric|min:0'
        ]);

        $rawProduct->update($data);

        return redirect()->route('raw_products.index')
                         ->with('success', 'Raw product updated successfully.');
    }

    public function destroy(RawProduct $rawProduct)
    {
        $rawProduct->delete();

        return redirect()->route('raw_products.index')
                         ->with('success', 'Raw product deleted successfully.');
    }
}
