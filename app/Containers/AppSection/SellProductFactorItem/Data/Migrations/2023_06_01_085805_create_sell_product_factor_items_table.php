<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sell_product_factor_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('factor_id');
            $table->timestamps();
            //$table->softDeletes();

            $table->index([
                'product_id',
                'factor_id'
            ]);

            $table->foreign('factor_id')->references('id')->on('sell_product_factors');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_product_factor_items');
    }
};
