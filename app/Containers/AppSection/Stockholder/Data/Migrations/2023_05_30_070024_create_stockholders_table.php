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
        Schema::create('stockholders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family');
            $table->string('image')->nullable();
            $table->string('alias')->nullable();
            $table->string('national_id')->nullable();
            $table->string('economic_code')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('description')->nullable();
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('postal_code');
            $table->bigInteger('phone_number');
            $table->bigInteger('telephone_number');
            $table->bigInteger('fax_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
//            $table->unsignedBigInteger('company_id')->nullable();
//            $table->foreign('company_id')->references('id')->on('companies');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockholders');
    }
};
