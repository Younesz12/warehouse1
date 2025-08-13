<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('production_log_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_log_id')->constrained()->cascadeOnDelete();
            $table->foreignId('raw_product_id')->constrained()->cascadeOnDelete();
            $table->decimal('quantity_used', 15, 3);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('production_log_materials');
    }
};