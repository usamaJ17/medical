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
        Schema::create('user_immunization', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('vaccine')->nullable();
            $table->date('date')->nullable();
            $table->text('vac_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_immunization');
    }
};
