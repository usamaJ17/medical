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
        Schema::create('medical_history', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('medication')->nullable();
            $table->text('sicknessHistory')->nullable();
            $table->string('medicalCondition')->nullable();
            $table->string('surgicalHistory')->nullable();
            $table->string('allergy')->nullable();
            $table->text('medicationTypes')->nullable();
            $table->text('customInputMedications')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_history');
    }
};
