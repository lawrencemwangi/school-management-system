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
        Schema::create('feestructures', function (Blueprint $table) {
            $table->id();
            $table->string('academic_year');
            $table->string('term');
            $table->unsignedBigInteger('form_id');
            $table->json('fees_categories');
            $table->decimal('total_amount');
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feestructures');
    }
};
