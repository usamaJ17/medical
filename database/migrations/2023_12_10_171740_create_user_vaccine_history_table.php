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
        Schema::create('vaccine_history', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('hasReceivedCovidVaccine')->nullable();
            $table->string('dosesReceived')->nullable();
            $table->date('timeSinceLastVaccination')->nullable();
            $table->text('immunizationHistory')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccine_history');
    }
};
