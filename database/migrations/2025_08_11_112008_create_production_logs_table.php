<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('production_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('finished_product_id')->constrained()->cascadeOnDelete();
             $table->decimal('quantity_produced', 15, 3);

            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('production_logs');
    }
};
