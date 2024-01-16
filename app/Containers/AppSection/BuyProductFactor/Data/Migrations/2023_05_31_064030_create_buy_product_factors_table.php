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
        Schema::create('buy_product_factors', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('reverse')->default(0);
            $table->bigInteger('factor_number');
//            $table->string('title');
            $table->date('date');
            $table->tinyInteger('discount_type');
            $table->integer('discount');
            $table->integer('tax');
            $table->string('description')->nullable();
            $table->bigInteger('sum_total_factor')->default(0);
            $table->unsignedBigInteger('person_id');
            $table->timestamps();
            $table->softDeletes();


            $table->index('person_id');
            $table->foreign('person_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_product_factors');
    }
};
