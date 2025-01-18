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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('image_treatments')->nullable();
            $table->string('treatment_code')->unique();
            $table->string('treatment_name');
            $table->text('treatment_desc');
            $table->foreignId('therapist_id')->constrained('therapist');
            $table->decimal('treatment_price',19,2)->default(0);
            $table->enum('treatment_recomend',['0','1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
