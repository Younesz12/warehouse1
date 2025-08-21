<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RawProduct;

class RawProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $rawProducts = RawProduct::all();
    return view('raw_products.index', compact('rawProducts'));
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
    public function store(Request $request)
    {
       return RawProduct::create($request->all());
    }

    /**
     * Display the specified resource.
     */
   public function show(RawProduct $rawProduct)
     {
      return $rawProduct;
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
    public function update(Request $request, RawProduct $rawProduct)
    {
    $rawProduct->update($request->all());
     return $rawProduct;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RawProduct $rawProduct)
      {
        $rawProduct->delete();
         return response()->noContent();
      }
}
