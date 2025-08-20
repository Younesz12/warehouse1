<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinishedProduct;

class FinishedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FinishedProduct::all();
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
        return  FinishedProduct::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(FinishedProduct $finishedProduct)
    {
        return $finishedProduct;
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
    public function update(Request $request, FinishedProduct $finishedProduct)
    {
        $finishedProduct->update($request->all());
        return $finishedProduct;
    
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinishedProduct $finishedProduct)
    {
        $finishedProduct->delete();
        return response()->noContent();
    }
} 