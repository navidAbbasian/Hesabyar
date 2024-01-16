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
        Schema::create('cheque_payments', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->bigInteger('amount');
            $table->string('description')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('cheque_payments');
    }
};
