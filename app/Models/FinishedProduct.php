<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinishedProduct extends Model
{
    protected $fillable = ['name', 'sku','unit','stock_quantity'];

    

    public function productionLogs()
    {
        return $this->hasMany(ProductionLog::class);
    }
}