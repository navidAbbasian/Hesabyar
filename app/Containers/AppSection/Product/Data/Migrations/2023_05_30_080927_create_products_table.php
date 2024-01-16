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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->bigInteger('code');
            $table->bigInteger('buy_price');
            $table->bigInteger('sale_price');
            $table->bigInteger('quantity');
            $table->tinyInteger('type')->comment('0 => buy price 1 => Cost of production');
            $table->tinyInteger('status')->default(0);
            $table->mediumText('description')->nullable();
            $table->integer('total_working_hours')->nullable();
            $table->integer('direct_working_rate')->nullable();
            $table->integer('continuous_material_rate')->nullable();
            $table->integer('total_materials_used')->nullable();
            $table->integer('indirect_cost_of_work')->nullable();
            $table->integer('indirect_cost_of_material')->nullable();
            $table->integer('other_costs')->nullable();
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('unit_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index([
                'unit_id',
                'product_category_id',
            ]);

            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
