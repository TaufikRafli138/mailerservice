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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id('id_user_detail');
            $table->integer('id_user');
            $table->string('nik', 16);
            $table->string('gender', 1);
            $table->string('phone_number', 15);
            $table->integer('id_religion');
            $table->string('place_of_birth', 50);
            $table->date('date_of_birth');
            $table->integer('height');
            $table->integer('weight');
            $table->string('blood', 2);
            $table->integer('id_nationality');
            $table->string('marital_status', 10);
            $table->string('place_of_marriage', 50)->nullable();
            $table->date('date_of_marriage')->nullable();
            $table->integer('id_city');
            $table->longText('address');
            $table->string('post_code', 6);
            $table->integer('id_city_permanent');
            $table->longText('address_permanent');
            $table->string('post_code_permanent', 6);
            $table->string('emergency_contact', 50);
            $table->string('emergency_name', 255);
            $table->string('emergency_relationship', 50);
            $table->timestamps();
        });

        Schema::create('user_detail_bank_accounts', function (Blueprint $table) {
            $table->id('id_user_detail_bank_account');
            $table->integer('id_user');
            $table->string('name_bank_account', 100);
            $table->string('name_account', 100);
            $table->string('bank_account_number', 20);
            $table->string('tax_identification_number', 20);
            $table->timestamps();
        });

        Schema::create('user_detail_bpjs', function (Blueprint $table) {
            $table->id('id_user_detail_bpjs');
            $table->string('bpjs_number_id', 50);
            $table->string('bpjs_type', 50);
            $table->integer('id_user');
            $table->timestamps();
        });

        Schema::create('user_detail_families', function (Blueprint $table) {
            $table->id('id_user_detail_family');
            $table->integer('id_user');
            $table->string('relationship', 50);
            $table->string('full_name', 255);
            $table->string('phone_number', 15)->nullable();
            $table->longText('address');
            $table->timestamps();
        });

        Schema::create('user_detail_licenses', function (Blueprint $table) {
            $table->id('id_user_detail_license');
            $table->integer('id_user');
            $table->string('type_license', 50);
            $table->string('number_license', 25);
            $table->integer('issue_country');
            $table->date('date_of_issues');
            $table->timestamps();
        });

        Schema::create('user_detail_license_pilots', function (Blueprint $table) {
            $table->id('id_user_detail_license_pilots');
            $table->integer('id_user');
            $table->string('document_number', 50);
            $table->string('license_company', 100);
            $table->string('license_name', 100);
            $table->string('organization', 100);
            $table->date('issue_date');
            $table->date('expired_date');
            $table->longText('link_license');
            $table->timestamps();
        });

        Schema::create('user_detail_education', function (Blueprint $table) {
            $table->id('id_user_detail_education');
            $table->integer('id_user');
            $table->string('name_school', 50);
            $table->integer('id_major');
            $table->integer('id_degree');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('currentlystudent');
            $table->float('GPA')->nullable();
            $table->longText('achievement')->nullable();
            $table->boolean('membership_ongoing')->nullable();
            $table->string('organization_name', 100)->nullable();
            $table->date('start_date_organization')->nullable();
            $table->date('end_date_organization')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('user_detail_experiences', function (Blueprint $table) {
            $table->id('id_user_detail_experience');
            $table->integer('id_user');
            $table->string('job_title', 50);
            $table->string('company', 100);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('id_employment_status');
            $table->integer('id_country');
            $table->timestamps();
        });

        Schema::create('user_detail_languages', function (Blueprint $table) {
            $table->id('id_user_detail_language');
            $table->integer('id_user');
            $table->integer('id_language');
            $table->string('skill', 50);
            $table->string('skill_level', 50);
            $table->longText('description')->nullable();
        });

        Schema::create('user_detail_trainings', function (Blueprint $table) {
            $table->id('id_user_detail_training');
            $table->integer('id_user');
            $table->string('position_training', 50);
            $table->string('type_training', 50)->nullable();
            $table->string('title_training', 50)->nullable();
            $table->string('facility_training', 100)->nullable();
            $table->string('organizer_training', 100)->nullable();
            $table->string('qualification', 50)->nullable();
            $table->integer('id_country');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        Schema::create('user_detail_pilot_rates', function (Blueprint $table) {
            $table->id('id_user_detail_pilot_rate');
            $table->integer('id_user');
            $table->string('aircraft', 100);
            $table->integer('pic_hour');
            $table->integer('pic_us');
            $table->string('FO_hour');
            $table->integer('instrument_hours');
            $table->integer('night_hours');
            $table->integer('simulator_hours');
            $table->integer('total_hours');
            $table->date('date_last_flown');
            $table->timestamps();
        });

        Schema::create('user_detail_social_media', function (Blueprint $table) {
            $table->id('id_user_detail_social_media');
            $table->integer('id_user');
            $table->longText('instagram_link')->nullable();
            $table->longText('facebook_link')->nullable();
            $table->longText('twitter_link')->nullable();
            $table->longText('dribble_link')->nullable();
            $table->longText('behance_link')->nullable();
            $table->longText('linkedin_link')->nullable();
            $table->timestamps();
        });

        Schema::create('user_detail_document_types', function (Blueprint $table) {
            $table->id('id_user_detail_document_type');
            $table->integer('priority');
            $table->string('name_document_type');
            $table->boolean('is_multiple');
            $table->longText('description');
            $table->timestamps();
        });

        Schema::create('user_detail_documents', function (Blueprint $table) {
            $table->id('id_user_detail_document');
            $table->integer('id_user');
            $table->longText('data_path')->nullable();
            $table->integer('id_user_detail_document_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
        Schema::dropIfExists('user_detail_bank_accounts');
        Schema::dropIfExists('user_detail_bpjs');
        Schema::dropIfExists('user_detail_families');
        Schema::dropIfExists('user_details');
        Schema::dropIfExists('user_detail_licenses');
        Schema::dropIfExists('user_detail_license_pilots');
        Schema::dropIfExists('user_detail_education');
        Schema::dropIfExists('user_detail_experiences');
        Schema::dropIfExists('user_detail_languages');
        Schema::dropIfExists('user_detail_trainings');
        Schema::dropIfExists('user_detail_pilot_rates');
        Schema::dropIfExists('user_detail_social_media');
        Schema::dropIfExists('user_detail_document_types');
        Schema::dropIfExists('user_detail_documents');
    }
};
