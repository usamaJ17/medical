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
        Schema::create('hospital_data', function (Blueprint $table) {
            $table->id();
            $table->id('user_id')->nullable();
            $table->text('working_hours')->nullable();
            $table->text('availableDoctors')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_data');
    }
};
