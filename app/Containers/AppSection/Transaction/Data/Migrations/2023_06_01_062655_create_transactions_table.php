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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');
            $table->bigInteger('amount');
            $table->boolean('is_deposit');
            $table->unsignedBigInteger('person_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('fund_id')->nullable();
            $table->unsignedBigInteger('cheque_receive_id')->nullable();
            $table->unsignedBigInteger('cheque_payment_id')->nullable();
            $table->unsignedBigInteger('sell_product_factor_id')->nullable();
            $table->unsignedBigInteger('buy_product_factor_id')->nullable();
            $table->unsignedBigInteger('side_income_id')->nullable();
            $table->unsignedBigInteger('side_cost_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('fund_id')->references('id')->on('funds');
            $table->foreign('cheque_receive_id')->references('id')->on('cheque_receiveds');
            $table->foreign('cheque_payment_id')->references('id')->on('cheque_payments');
            $table->foreign('sell_product_factor_id')->references('id')->on('sell_product_factors');
            $table->foreign('buy_product_factor_id')->references('id')->on('buy_product_factors');
            $table->foreign('side_income_id')->references('id')->on('side_incomes');
            $table->foreign('side_cost_id')->references('id')->on('side_costs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
