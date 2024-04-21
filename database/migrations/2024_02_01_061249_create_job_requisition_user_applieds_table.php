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
        Schema::create('job_requisition_user_applieds', function (Blueprint $table) {
            $table->id('id_job_requisition_user_applied');
            $table->integer('id_job_requisition');
            $table->integer('id_user');
            $table->integer('id_job_requisition_category');
            $table->integer('id_job_requisition_user_applied_process_step_active')->nullable();
            $table->timestamps();
        });

        Schema::create('job_requisition_user_applied_process_steps', function (Blueprint $table) {
            $table->id('id_job_requisition_user_applied_process_step');
            $table->string('name_process', 30);
            $table->integer('id_job_requisition_category');
            $table->timestamps();
        });

        Schema::create('job_requisition_user_applied_processes', function (Blueprint $table) {
            $table->id('id_job_requisition_user_applied_process');
            $table->integer('id_job_requisition_user_applied');
            $table->integer('id_job_requisition_user_applied_process_step');
            $table->boolean('status')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('job_requisition_user_applied_process_questions', function (Blueprint $table) {
            $table->id('id_job_requisition_user_applied_process_questions');
            $table->integer('id_job_requisition_user_applied');
            $table->integer('id_job_requisition_question');
            $table->boolean('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_requisition_user_applieds');
        Schema::dropIfExists('job_requisition_user_applied_process_steps');
        Schema::dropIfExists('job_requisition_user_applied_processes');
        Schema::dropIfExists('job_requisition_user_applied_process_questions');
    }
};
