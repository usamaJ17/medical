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
        Schema::create('user_travel', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('travelReason')->nullable();
            $table->date('dateOfTravel')->nullable();
            $table->string('travelLocation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_travel');
    }
};
