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
        Schema::create('appointments_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('app_id')->constrained('appointments');
            $table->foreignId('treatment_id')->constrained('treatments');
            $table->foreignId('therapist_id')->constrained('therapist');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments_details');
    }
};
