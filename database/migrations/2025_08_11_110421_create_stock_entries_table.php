<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;
use function Laravel\Prompts\text;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('stock_entries', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['in','out']);
            $table->morphs('source'); 
            $table->decimal('quantity',8 , 2);
            $table -> text('description')->nullable();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('stock_entries');
    }
};
