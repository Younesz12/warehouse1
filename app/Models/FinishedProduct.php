<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinishedProduct extends Model
{
    protected $fillable = ['name', 'sku', 'stock_quantity'];

    public function stockEntries()
    {
        return $this->morphMany(StockEntry::class, 'source');
    }

    public function productionLogs()
    {
        return $this->hasMany(ProductionLog::class);
    }
}