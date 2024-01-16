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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('postal_code');
            $table->bigInteger('phone_number')->nullable();
            $table->bigInteger('telephone_number')->nullable();
            $table->bigInteger('fax_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('person_category_id');
            $table->timestamps();
            $table->softDeletes();


            $table->index([
                'company_id',
                'person_category_id',
                'name'
            ]);

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('person_category_id')->references('id')->on('person_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
