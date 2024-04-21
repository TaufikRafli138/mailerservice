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
        Schema::table('job_requisitions', function (Blueprint $table) {
            $table->foreign('id_employment_status')->references('id_employment_status')->on('employment_statuses');
            $table->foreign('id_job_requisition_category')->references('id_job_requisition_category')->on('job_requisition_categories');
        });

        Schema::table('job_requisition_languages', function (Blueprint $table) {
            $table->foreign('id_language')->references('id_language')->on('languages');
            $table->foreign('id_job_requisition')->references('id_job_requisition')->on('job_requisitions');
        });

        Schema::table('competency_job_requisitions', function (Blueprint $table) {
            $table->foreign('id_competency')->references('id_competency')->on('competencies');
            $table->foreign('id_job_requisition')->references('id_job_requisition')->on('job_requisitions');
        });

        Schema::table('job_requisition_questions', function (Blueprint $table) {
            $table->foreign('id_job_requisition')->references('id_job_requisition')->on('job_requisitions');
        });

        Schema::table('job_requisition_nationalities', function (Blueprint $table) {
            $table->foreign('id_nationality')->references('id_country')->on('countries');
            $table->foreign('id_job_requisition')->references('id_job_requisition')->on('job_requisitions');
        });

        Schema::table('job_requisition_religions', function (Blueprint $table) {
            $table->foreign('id_religion')->references('id_religion')->on('religions');
            $table->foreign('id_job_requisition')->references('id_job_requisition')->on('job_requisitions');
        });

        Schema::table('job_requisition_user_applied_processes', function (Blueprint $table) {
            $table->foreign('id_job_requisition_user_applied_process_step')->references('id_job_requisition_user_applied_process_step')->on('job_requisition_user_applied_process_steps');
        });

        Schema::table('job_requisition_user_applieds', function (Blueprint $table) {
            $table->foreign('id_job_requisition')->references('id_job_requisition')->on('job_requisitions');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_job_requisition_category')->references('id_job_requisition_category')->on('job_requisition_categories');
        });

        Schema::table('user_detail_license_pilots', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
        });

        Schema::table('user_detail_experiences', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_employment_status')->references('id_employment_status')->on('employment_statuses');
            $table->foreign('id_country')->references('id_country')->on('countries');
        });

        Schema::table('user_detail_trainings', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_country')->references('id_country')->on('countries');
        });

        Schema::table('provinces', function (Blueprint $table) {
            $table->foreign('id_country')->references('id_country')->on('countries');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('id_province')->references('id_province')->on('provinces');
        });

        Schema::table('user_detail_education', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_major')->references('id_major')->on('majors');
            $table->foreign('id_degree')->references('id_degree')->on('degrees');
        });

        Schema::table('user_detail_social_media', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
        });

        Schema::table('user_detail_families', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
        });

        Schema::table('user_detail_pilot_rates', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
        });

        Schema::table('user_details', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_religion')->references('id_religion')->on('religions');
            $table->foreign('id_nationality')->references('id_country')->on('countries');
            $table->foreign('id_city')->references('id_city')->on('cities');
        });

        Schema::table('user_detail_documents', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_user_detail_document_type')->references('id_user_detail_document_type')->on('user_detail_document_types');
        });

        Schema::table('user_detail_languages', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_language')->references('id_language')->on('languages');
        });

        Schema::table('user_detail_bpjs', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
  public function down(): void
{
    Schema::table('job_requisitions', function (Blueprint $table) {
        $table->dropForeign(['id_employment_status']);
        $table->dropForeign(['id_job_requisition_category']);
        $table->dropColumn('id_employment_status');
        $table->dropColumn('id_job_requisition_category');
    });

    Schema::table('job_requisition_languages', function (Blueprint $table) {
        $table->dropForeign(['id_language']);
        $table->dropForeign(['id_job_requisition']);
        $table->dropColumn('id_language');
        $table->dropColumn('id_job_requisition');
    });

    Schema::table('competency_job_requisitions', function (Blueprint $table) {
        $table->dropForeign(['id_competency']);
        $table->dropForeign(['id_job_requisition']);
        $table->dropColumn('id_competency');
        $table->dropColumn('id_job_requisition');
    });

    Schema::table('job_requisition_questions', function (Blueprint $table) {
        $table->dropForeign(['id_job_requisition']);
        $table->dropColumn('id_job_requisition');
    });

    Schema::table('job_requisition_nationalities', function (Blueprint $table) {
        $table->dropForeign(['id_nationality']);
        $table->dropForeign(['id_job_requisition']);
        $table->dropColumn('id_nationality');
        $table->dropColumn('id_job_requisition');
    });

    Schema::table('job_requisition_religions', function (Blueprint $table) {
        $table->dropForeign(['id_religion']);
        $table->dropForeign(['id_job_requisition']);
        $table->dropColumn('id_religion');
        $table->dropColumn('id_job_requisition');
    });

    Schema::table('job_requisition_user_applied_processes', function (Blueprint $table) {
        $table->dropForeign(['id_job_requisition_user_applied_process_step']);
        $table->dropColumn('id_job_requisition_user_applied_process_step');
        
    });

    Schema::table('job_requisition_user_applieds', function (Blueprint $table) {
        $table->dropForeign(['id_job_requisition']);
        $table->dropForeign(['id_user']);
        $table->dropForeign(['id_job_requisition_category']);
        $table->dropColumn('id_job_requisition');
        $table->dropColumn('id_user');
        $table->dropColumn('id_job_requisition_category');
    });

    Schema::table('user_detail_license_pilots', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropColumn('id_user');
    });

    Schema::table('user_detail_experiences', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropForeign(['id_employment_status']);
        $table->dropForeign(['id_country']);
        $table->dropColumn('id_user');
        $table->dropColumn('id_employment_status');
        $table->dropColumn('id_country');
    });

    Schema::table('user_detail_trainings', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropForeign(['id_country']);
        $table->dropColumn('id_user');
        $table->dropColumn('id_country');
    });

    Schema::table('provinces', function (Blueprint $table) {
        $table->dropForeign(['id_country']);
        $table->dropColumn('id_country');
    });

    Schema::table('cities', function (Blueprint $table) {
        $table->dropForeign(['id_province']);
        $table->dropColumn('id_province');
    });

    Schema::table('user_detail_education', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropForeign(['id_major']);
        $table->dropForeign(['id_degree']);
        $table->dropColumn('id_user');
        $table->dropColumn('id_major');
        $table->dropColumn('id_degree');
    });

    Schema::table('user_detail_social_media', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropColumn('id_user');
    });

    Schema::table('user_detail_families', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropColumn('id_user');
    });

    Schema::table('user_detail_pilot_rates', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropColumn('id_user');
    });

    Schema::table('user_details', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropForeign(['id_religion']);
        $table->dropForeign(['id_nationality']);
        $table->dropForeign(['id_city']);
        $table->dropColumn('id_user');
        $table->dropColumn('id_religion');
        $table->dropColumn('id_nationality');
        $table->dropColumn('id_city');
    });

    Schema::table('user_detail_documents', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropForeign(['id_user_detail_document_type']);
        $table->dropColumn('id_user');
        $table->dropColumn('id_user_detail_document_type');
    });

    Schema::table('user_detail_languages', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropForeign(['id_language']);
        $table->dropColumn('id_user');
        $table->dropColumn('id_language');
    });

    Schema::table('user_detail_bpjs', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
        $table->dropColumn('id_user');
    });
}

};
