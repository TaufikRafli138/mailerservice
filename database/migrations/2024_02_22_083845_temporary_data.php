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
        Schema::create('master_div', function (Blueprint $table) {
            $table->string('div_code');
            $table->string('div_name');
            $table->timestamps();
        });

        Schema::create('master_orgunit', function (Blueprint $table) {
            $table->string('org_unit');
            $table->string('short');
            $table->string('stext');
            $table->timestamps();
        });

        Schema::create('master_position', function (Blueprint $table) {
            $table->integer('position_key');
            $table->string('position_code');
            $table->string('position_name');
            $table->string('direktorat');
            $table->string('div');
            $table->string('dept');
            $table->string('unit');
            $table->integer('status_vacan');
            $table->integer('status_avail');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('job_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_div');
        Schema::dropIfExists('master_orgunit');
        Schema::dropIfExists('master_position');
    }
};
