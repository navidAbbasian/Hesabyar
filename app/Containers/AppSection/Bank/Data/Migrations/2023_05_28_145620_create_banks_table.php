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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('branch');
            $table->string('account_number', 18)->nullable();
            $table->string('cart_number', 16);
            $table->string('shaba_number', 26);
            $table->string('pos_number', 16)->nullable();
            $table->string('account_owner');
            $table->bigInteger('inventory')->nullable();
            $table->boolean('status')->default('0');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
