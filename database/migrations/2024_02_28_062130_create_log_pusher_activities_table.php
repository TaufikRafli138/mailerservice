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
        Schema::create('log_pusher_activities', function (Blueprint $table) {
            $table->id('id_log_pusher_activity');
            $table->string('id_user')->nullable();
            $table->text('subject')->nullable();
            $table->text('message')->nullable();
            $table->boolean('is_read')->nullable();
            $table->string('type_notification', 100)->nullable();
            $table->string('type_role', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_pusher_activities');
    }
};
