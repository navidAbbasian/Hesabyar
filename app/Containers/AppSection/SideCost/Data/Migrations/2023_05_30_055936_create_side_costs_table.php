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
        Schema::create('side_costs', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');
            $table->tinyInteger('payment_method')->nullable();
            $table->string('title');
            $table->bigInteger('amount');
            $table->string('description')->nullable();
            $table->timestamp('date');
            $table->unsignedBigInteger('side_cost_category_id')->nullable();
            $table->unsignedBigInteger('person_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('fund_id')->nullable();
            $table->unsignedBigInteger('cheque_payment_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index([
//                'side_cost_category_id',
                'person_id',
                'user_id',
                'bank_id',
                'fund_id',
//                'cheque_payment_id'
            ]);

            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('fund_id')->references('id')->on('funds');
            $table->foreign('cheque_payment_id')->references('id')->on('cheque_payments');
            $table->foreign('side_cost_category_id')->references('id')->on('side_cost_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('side_costs');
    }
};
