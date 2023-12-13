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
        Schema::create('user_emergency', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('nameOfEmergencyContact')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('relationship')->nullable();
            $table->string('email')->nullable();
            $table->string('mediaiId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_emergency');
    }
};
