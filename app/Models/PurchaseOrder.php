<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseOrder extends Model
{
    // Define the columns that can be mass-assigned
    protected $fillable = [
        'raw_product_id', 
        'quantity', 
        'status', 
        'executed_at'
    ];

    /**
     * Get the raw product associated with the purchase order.
     */
    public function rawProduct(): BelongsTo
    {
        return $this->belongsTo(RawProduct::class);
    }
}