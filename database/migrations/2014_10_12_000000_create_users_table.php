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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('dateOfBirth')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('passportNumber')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('city')->nullable();
            $table->string('bloodType')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
