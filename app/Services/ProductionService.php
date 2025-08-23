<?php

// In app/Services/ProductionService.php

namespace App\Services;

use App\Models\ProductionLog;
use App\Models\FinishedProduct;
use App\Models\RawProduct;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ProductionService
{
    public function produce(array $data)
    {
        DB::transaction(function () use ($data) {
            $finishedProduct = FinishedProduct::find($data['finished_product_id']);

            if (!$finishedProduct) {
                throw new InvalidArgumentException('Finished product not found.');
            }

            // Create the production log first
            $log = ProductionLog::create([
                'finished_product_id' => $data['finished_product_id'],
                'quantity_produced' => $data['quantity_produced'],
            ]);

            // Now, process each raw material used
            foreach ($data['raw_products'] as $rawProductId => $quantityUsed) {
                if ($quantityUsed > 0) {
                    $rawProduct = RawProduct::find($rawProductId);

                    if (!$rawProduct) {
                        throw new InvalidArgumentException("Raw product with ID {$rawProductId} not found.");
                    }

                    // Attach raw product to the production log with the pivot data
                    $log->rawProducts()->attach($rawProduct->id, ['quantity_used' => $quantityUsed]);
                    
                    // Decrease the stock quantity of the raw product
                    $rawProduct->decrement('stock_quantity', $quantityUsed);
                }
            }

            // Increase the stock quantity of the finished product
            $finishedProduct->increment('stock_quantity', $data['quantity_produced']);
        });
    }
}