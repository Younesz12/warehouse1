<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionLog extends Model
{
    protected $fillable = ['finished_product_id', 'quantity_produced'];

    public function finishedProduct()
    {
        return $this->belongsTo(FinishedProduct::class);
    }

    public function rawProduct()
    {
        return $this->belongsToMany(RawProduct::class, 'production_log_materials')
                    ->withPivot('quantity_used')
                    ->withTimestamps();
    }
}   