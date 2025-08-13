<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    protected $fillable = ['type', 'quantity', 'description'];

    public function source()
    {
        return $this->morphTo();
    }
}