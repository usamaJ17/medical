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
            $table->string('emergency_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('relation')->nullable();
            $table->string('email')->nullable();
            $table->string('medi_ai_id')->nullable();
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
