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
        Schema::create('countries', function (Blueprint $table) {
            $table->id('id_country');
            $table->string('name_country', 100);
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->id('id_province');
            $table->integer('id_country');
            $table->string('name_province', 50);
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id('id_city');
            $table->integer('id_province');
            $table->string('name_city', 50);
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('religions', function (Blueprint $table) {
            $table->id('id_religion');
            $table->string('name_religion', 50);
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('degrees', function (Blueprint $table) {
            $table->id('id_degree');
            $table->string('name_degree');
            $table->text('desc');
            $table->timestamps();
        });

        Schema::create('majors', function (Blueprint $table) {
            $table->id('id_major');
            $table->string('name_major', 100);
            $table->timestamps();
        });

        Schema::create('employment_statuses', function (Blueprint $table) {
            $table->id('id_employment_status');
            $table->string('name_status', 50);
            $table->timestamps();
        });

        Schema::create('languages', function (Blueprint $table) {
            $table->id('id_language');
            $table->string('name_language', 50);
            $table->timestamps();
        });

        Schema::create('competencies', function (Blueprint $table) {
            $table->id('id_competency');
            $table->string('name_competency', 50);
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('religions');
        Schema::dropIfExists('degrees');
        Schema::dropIfExists('majors');
        Schema::dropIfExists('employment_statuses');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('competencies');
    }
};
