<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::create('production_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('finished_product_id')
          ->constrained('finished_products')
          ->onDelete('cascade');
    $table->decimal('quantity_produced', 15, 3);
    $table->timestamps();
});

    
}


    
    public function down(): void
    {
        Schema::dropIfExists('production-logs');
    }
};
