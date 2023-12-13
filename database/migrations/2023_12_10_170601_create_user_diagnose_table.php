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
        Schema::create('user_diagnose', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('condition')->nullable();
            $table->text('diagnose_json')->nullable();
            $table->string('history')->nullable();
            $table->string('allergy')->nullable();
            $table->string('medication')->nullable();
            $table->text('medication_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_diagnose');
    }
};
