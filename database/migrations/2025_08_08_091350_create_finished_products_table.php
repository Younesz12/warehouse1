<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Change 'finished-products' to 'finished_products'
        Schema::create('finished_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->unique();
            $table->string('unit');
            $table->decimal('stock_quantity', 15, 3)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Change 'finished-products' to 'finished_products'
        Schema::dropIfExists('finished_products');
    }
};