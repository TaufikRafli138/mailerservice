<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('email', 100);
            $table->string('name', 100);
            $table->string('password', 255);
            $table->longText('photo_profile')->nullable();
            $table->boolean('is_subscribe')->nullable();
            $table->string('role')->default('candidate');
            $table->string('referral_name')->nullable();
            $table->string('otp', 4)->nullable();
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
