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
        Schema::create('user_lifestyle', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('smokingHabits')->nullable();
            $table->string('alcoholConsumptions')->nullable();
            $table->string('physicalActivityLevel')->nullable();
            $table->string('preferences')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_lifestyle');
    }
};
