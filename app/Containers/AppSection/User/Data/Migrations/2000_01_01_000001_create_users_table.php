<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->tinyInteger('type');
            $table->string('image')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('commission')->nullable();
            $table->string('sub_commission')->nullable();
            $table->text('description')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->index([
                'parent_id',
                'type',
            ]);

            $table->foreign('parent_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
