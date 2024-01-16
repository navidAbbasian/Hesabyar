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
        Schema::create('sell_product_factors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('factor_number');
            $table->tinyInteger('reverse')->default(0);
//            $table->string('title');
            $table->date('due_date')->nullable();
            $table->date('sell_date');
            $table->tinyInteger('discount_type');
            $table->integer('discount');
            $table->integer('tax');
            $table->string('description')->nullable();
            $table->bigInteger('profit')->default(0);
            $table->bigInteger('sum_total_factor')->default(0);
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index([
                'person_id',
                'user_id',
                'supplier_id',
                'bank_id',
            ]);

            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_product_factors');
    }
};
