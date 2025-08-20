<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
protected $fillable = ['source_id', 'source_type', 'quantity', 'type', 'note'];

    public function source()
    {
        return $this->morphTo();
    }
}