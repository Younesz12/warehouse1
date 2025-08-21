<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawProduct extends Model
{
    protected $fillable = ['name', 'sku', 'unit', 'stock_quantity'];

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

    

    public function productionLogs()
    {
        return $this->belongsToMany(ProductionLog::class, 'production_log_materials')
                    ->withPivot('quantity_used')
                    ->withTimestamps();
    }
}