<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductionLog;
use App\Models\RawProduct;
use App\Models\FinishedProduct;     

class ProductionLogController extends Controller
{
 public function index()
  {
    return ProductionLog::with('rawProducts', 'finishedProduct')->get();
 }
 public function store(Request $request) 
 {
   $log = ProductionLog::create([
     'finished_product_id' => $request->finished_product_id,
     'quantity_produced' => $request->quantity_produced,
 ]);
 foreach ($request->raw_products as $raw) {
     $log->rawProducts()->attach($raw['id'], ['quantity_used' => $raw['quantity_used']]);
     $rawProduct = RawProduct::find($raw['id']);
     $rawProduct->decrement('stock_quantity', $raw['quantity_used']);
     $rawProduct->stockEntries()->create([
         'quantity' => $raw['quantity_used'],
         'type' => 'out',
         'note' => 'Used in ProductionLog #' . $log->id,
 ]);
 }
 $finished = FinishedProduct::find($request->finished_product_id);
 $finished->increment('stock_quantity', $request->quantity_produced);
 $finished->stockEntries()->create([
     'quantity' => $request->quantity_produced,
     'type' => 'in',
     'note' => 'Produced in ProductionLog #' . $log->id,
 ]);
 return $log->load('rawProducts', 'finishedProduct');
 }
}