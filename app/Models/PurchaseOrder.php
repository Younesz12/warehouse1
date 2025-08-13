<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = ['raw_product_id', 'quantity', 'status', 'executed_at'];

    public function rawProduct()
    {
        return $this->belongsTo(RawProduct::class);
    }
}