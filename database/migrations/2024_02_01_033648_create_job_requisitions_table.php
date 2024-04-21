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
        Schema::create('job_requisition_categories', function (Blueprint $table) {
            $table->id('id_job_requisition_category');
            $table->string('name_category', 50);
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('job_requisitions', function (Blueprint $table) {
            $table->id('id_job_requisition');
            $table->string('id_hiring_manager');
            $table->string('id_recruiter');
            $table->integer('id_employment_status');
            $table->integer('id_job_requisition_category');
            $table->string('div');
            $table->string('unit');
            $table->string('group_job');
            $table->string('jobs_name', 150);
            $table->longText('jobs_description');
            $table->longText('job_requisition_file');
            $table->string('doc_number', 50);
            $table->string('gender', 3);
            $table->integer('age_start');
            $table->integer('age_end');
            $table->integer('pilot_hours_start')->nullable();
            $table->integer('pilot_hours_end')->nullable();
            $table->string('marital_status', 50);
            $table->integer('major_education');
            $table->float('gpa_start', 1, 2);
            $table->float('gpa_end', 1, 2);
            $table->longText('portofolio');
            $table->string('status', 50);
            $table->integer('failed_job');
            $table->integer('created_by');
            $table->text('noted')->nullable();
            $table->timestamp('hired_date')->nullable();
            $table->integer('id_city');
            $table->timestamps();
        });

        Schema::create('competency_job_requisitions', function (Blueprint $table) {
            $table->id('id_competency_job_requisition');
            $table->integer('id_competency');
            $table->integer('id_job_requisition');
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('job_requisition_nationalities', function (Blueprint $table) {
            $table->id('id_job_requisition_nationality');
            $table->integer('id_job_requisition');
            $table->integer('id_nationality');
            $table->timestamps();
        });

        Schema::create('job_requisition_religions', function (Blueprint $table) {
            $table->id('id_job_requisition_religion');
            $table->integer('id_job_requisition');
            $table->integer('id_religion');
            $table->timestamps();
        });

        Schema::create('job_requisition_languages', function (Blueprint $table) {
            $table->id('id_job_requisition_language');
            $table->integer('id_job_requisition');
            $table->integer('id_language');
            $table->string('skill', 50);
            $table->string('skill_level', 50);
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('job_requisition_questions', function (Blueprint $table) {
            $table->id('id_job_requisition_question');
            $table->integer('id_job_requisition');
            $table->longText('question');
            $table->boolean('answer');
            $table->boolean('must_correct');
            $table->timestamps();
        });

        Schema::create('job_requisition_majors', function (Blueprint $table) {
            $table->id('id_job_requisition_major');
            $table->integer('id_job_requisition');
            $table->integer('id_major');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_requisition_categories');
        Schema::dropIfExists('job_requisitions');
        Schema::dropIfExists('competency_job_requisitions');
        Schema::dropIfExists('job_requisition_nationalities');
        Schema::dropIfExists('job_requisition_religions');
        Schema::dropIfExists('job_requisition_languages');
        Schema::dropIfExists('job_requisition_questions');
        Schema::dropIfExists('job_requisition_majors');
    }
};
