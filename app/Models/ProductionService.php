<?php

namespace App\Services;

use App\Models\ProductionLog;
use App\Models\FinishedProduct;
use App\Models\RawProduct;

class ProductionService
{
    public function produce(array $data)
    {
        $finished = FinishedProduct::findOrFail($data['finished_product_id']);

        $log = ProductionLog::create([
            'finished_product_id' => $finished->id,
            'quantity_produced' => $data['quantity_produced'],
        ]);

        foreach ($data['raw_products'] as $rawId => $qty) {
            if ($qty > 0) {
                $raw = RawProduct::findOrFail($rawId);
                $raw->decrement('stock_quantity', $qty);
                $log->rawProducts()->attach($rawId, ['quantity_used' => $qty]);
            }
        }

        $finished->increment('stock_quantity', $data['quantity_produced']);
    }
}
