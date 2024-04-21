<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use App\Models\UserDetailBankAccount;
use App\Models\UserDetailBpjs;
use App\Models\UserDetailDocumentType;
use App\Models\UserDetailExperience;
use App\Models\UserDetailFamily;
use App\Models\UserDetailLanguage;
use App\Models\UserDetailLicense;
use App\Models\UserDetailPilotRate;
use App\Models\UserDetailSocialMedia;
use App\Models\UserDetailTraining;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserDetailSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::userDetailBankAccountSeeder();
        self::userDetailInformationSeeder();
        self::userDetailBpjsSeeder();
        self::userDetailFamilySeeder();
        self::userDetailLicenseSeeder();
        self::userDetailEducationSeeder();
        self::userDetailExperienceSeeder();
        self::userDetailLanguageSeeder();
        self::userDetailTrainingSeeder();
        self::userDetailPilotRateSeeder();
        self::userDetailSocialMediaSeeder();
        self::userDetailDocumentTypeSeeder();
    }

    public function userDetailBankAccountSeeder()
    {
        UserDetailBankAccount::insert([
            [
                'name_bank_account' => 'Bank Mandiri',
                'id_user' => 1,
                'name_account' => 'farhan',
                'bank_account_number' => '1234567890',
                'tax_identification_number' => '123456789',
            ],
            [
                'name_bank_account' => 'Bank BCA',
                'id_user' => 2,
                'name_account' => 'cynthia',
                'bank_account_number' => '9876543210',
                'tax_identification_number' => '123456789',
            ],
        ]);
    }

    public function userDetailInformationSeeder()
    {
        $faker = Faker::create('id_ID');

        for ($userId = 1; $userId <= 60; $userId++) {
            DB::table('user_details')->insert([
                'id_user' => $userId,
                'nik' => $faker->unique()->numerify('##############'),
                'gender' => $faker->randomElement(['M', 'F']),
                'phone_number' => $faker->unique()->numerify('##############'),
                'id_religion' => $faker->numberBetween(1, 5),
                'place_of_birth' => $faker->numberBetween(1, 5),
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '1990-01-01'),
                'height' => $faker->numberBetween(150, 200),
                'weight' => $faker->numberBetween(50, 100),
                'blood' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'id_nationality' => 1,
                'marital_status' => $faker->randomElement(['Single', 'Married']),
                'id_city' => $faker->numberBetween(1, 5),
                'address' => $faker->address,
                'post_code' => $faker->unique()->numerify('######'),
                'id_city_permanent' => $faker->numberBetween(1, 5),
                'address_permanent' => $faker->address,
                'post_code_permanent' => $faker->unique()->numerify('######'),
                'emergency_contact' => $faker->phoneNumber,
                'emergency_name' => $faker->name,
                'emergency_relationship' => $faker->randomElement(['Keluarga', 'Teman', 'Saudara', 'Kerabat']),
            ]);
        }
    }

    public function userDetailBpjsSeeder()
    {
        UserDetailBpjs::create([
            'bpjs_number_id' => 'BPJS123',
            'bpjs_type' => 'BPJS_TK',
            'id_user' => 1,
        ]);

        UserDetailBpjs::create([
            'bpjs_number_id' => 'BPJS456',
            'bpjs_type' => 'BPJS_K',
            'id_user' => 1,
        ]);
    }

    public function userDetailFamilySeeder()
    {
        UserDetailFamily::insert([
            [
                'id_user' => 1,
                'relationship' => 'Ayah',
                'full_name' => 'John Doe',
                'phone_number' => '123456789',
                'address' => '123 Main St',
            ],
            [
                'id_user' => 1,
                'relationship' => 'Ibu',
                'full_name' => 'Jane Doe',
                'phone_number' => '987654321',
                'address' => '456 Oak St',
            ],
        ]);
    }

    public function userDetailLicenseSeeder()
    {
        UserDetailLicense::insert([
            [
                'id_user' => 1,
                'type_license' => 'airbus a320',
                'number_license' => '123456789',
                'issue_country' => 1,
                'date_of_issues' => '2024-01-01'
            ],
            [
                'id_user' => 1,
                'type_license' => 'boeing 737',
                'number_license' => '987654321',
                'issue_country' => 1,
                'date_of_issues' => '2024-01-01'
            ],
        ]);
    }

    public function userDetailEducationSeeder()
    {
        $faker = Faker::create('id_ID');

        for ($userId = 1; $userId <= 60; $userId++) {

            DB::table('user_detail_education')->insert([
                'id_user' => $userId,
                'name_school' => 'Universitas ' . $faker->city,
                'id_major' => $faker->numberBetween(1, 50),
                'id_degree' => $faker->numberBetween(2, 3),
                'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'end_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'currentlystudent' => $faker->boolean,
                'GPA' => $faker->randomFloat(2, 2, 4),
                'achievement' => $faker->sentence,
                'membership_ongoing' => $faker->boolean,
                'organization_name' => 'Organisasi ' . $faker->city,
                'start_date_organization' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'end_date_organization' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'description' => $faker->paragraph,
            ]);

            // Seeder for the second education record
            DB::table('user_detail_education')->insert([
                'id_user' => $userId,
                'name_school' => 'Sekolah Tinggi ' . $faker->city,
                'id_major' => $faker->numberBetween(1, 50),
                'id_degree' => $faker->numberBetween(1, 2),
                'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'end_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'currentlystudent' => $faker->boolean,
                'GPA' => $faker->randomFloat(2, 2, 4),
                'achievement' => $faker->sentence,
                'membership_ongoing' => $faker->boolean,
                'organization_name' => 'Organisasi ' . $faker->city,
                'start_date_organization' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'end_date_organization' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'description' => $faker->sentence,
            ]);
        }
    }

    public function userDetailExperienceSeeder()
    {
        UserDetailExperience::insert([
            [
                'id_user' => 1,
                'job_title' => 'Fullstack Developer',
                'company' => 'Garuda indonesia',
                'start_date' => '2021-01-01',
                'end_date' => '2022-01-01',
                'id_employment_status' => 4,
                'id_country' => 1
            ],
            [
                'id_user' => 1,
                'job_title' => 'Fullstack Developer',
                'company' => 'Telkom Indonesia',
                'start_date' => '2022-01-01',
                'end_date' => '2023-01-01',
                'id_employment_status' => 3,
                'id_country' => 1
            ]
        ]);
    }

    public function userDetailLanguageSeeder()
    {
        for ($idUser = 1; $idUser <= 60; $idUser++) {
            $skills = ['Writing', 'Reading', 'Speaking'];
            $skillLevels = ['Beginner', 'Intermediate'];
            UserDetailLanguage::insert([
                [
                    'id_user' => $idUser,
                    'id_language' => mt_rand(1, 4),
                    'skill' => $skills[array_rand($skills)],
                    'skill_level' => $skillLevels[array_rand($skillLevels)],
                ],
                [
                    'id_user' => $idUser,
                    'id_language' => mt_rand(1, 4),
                    'skill' => $skills[array_rand($skills)],
                    'skill_level' => $skillLevels[array_rand($skillLevels)],
                ],
            ]);
        }
    }

    public function userDetailTrainingSeeder()
    {
        UserDetailTraining::insert([
            [
                'id_user' => 1,
                'position_training' => 'pilot-fa', // or general-employee
                'type_training' => 'Type training',
                'facility_training' => 'Facility training',
                'id_country' => 1,
                'start_date' => '2024-01-01',
                'end_date' => '2024-02-01',
            ],
        ]);
    }

    public function userDetailPilotRateSeeder()
    {
        for ($i = 1; $i <= 60; $i++) {
            $aircraftModels = ['Airbus a320 neo', 'Airbus a330-900 Neo', 'ATR 72-600'];

            foreach ($aircraftModels as $aircraftModel) {
                $pilotRateData = [
                    'id_user' => $i,
                    'aircraft' => $aircraftModel,
                    'pic_hour' => rand(1, 20),
                    'pic_us' => 2,
                    'FO_hour' => rand(1, 20),
                    'instrument_hours' => rand(1, 20),
                    'night_hours' => rand(1, 20),
                    'simulator_hours' => 6,
                    'total_hours' => rand(1, 100),
                    'date_last_flown' => '2024-01-01',
                ];
                UserDetailPilotRate::insert([$pilotRateData]);
            }
        }
    }

    public function userDetailSocialMediaSeeder()
    {
        UserDetailSocialMedia::insert([
            [
                'id_user' => 1,
                'instagram_link' => 'link instagram'
            ]
        ]);
    }

    public function userDetailDocumentTypeSeeder()
    {
        $documents = [
            ['priority' => 1, 'name_document_type' => 'Curriculum_Vitae', 'is_multiple' => false, 'description' => 'Curriculum Vitae'],
            ['priority' => 1, 'name_document_type' => 'Surat_Lamaran', 'is_multiple' => false, 'description' => 'Surat Lamaran'],
            ['priority' => 1, 'name_document_type' => 'SKCK', 'is_multiple' => false, 'description' => 'Surat Keterangan Catatan Kepolisian'],
            ['priority' => 1, 'name_document_type' => 'KTP_Pribadi', 'is_multiple' => false, 'description' => 'Kartu Tanda Penduduk Pribadi'],
            ['priority' => 1, 'name_document_type' => 'Akta_Kelahiran', 'is_multiple' => false, 'description' => 'Akta Kelahiran'],
            ['priority' => 1, 'name_document_type' => 'Kartu_Keluarga', 'is_multiple' => false, 'description' => 'Kartu Keluarga'],
            ['priority' => 1, 'name_document_type' => 'Buku_Menikah', 'is_multiple' => false, 'description' => 'Buku Menikah'],
            ['priority' => 1, 'name_document_type' => 'Ijazah', 'is_multiple' => true, 'description' => 'Ijazah'],
            ['priority' => 1, 'name_document_type' => 'Portofolio', 'is_multiple' => false, 'description' => 'Portofolio'],
            ['priority' => 1, 'name_document_type' => 'Tanda_Tangan', 'is_multiple' => false, 'description' => 'Tanda Tangan'],
            ['priority' => 1, 'name_document_type' => 'Portfolio', 'is_multiple' => false, 'description' => 'Portfolio'],

            // dibawah ini tambahan untuk fulltime dan lain-lain
            ['priority' => 2, 'name_document_type' => 'Surat_Keterangan_Bebas_Narkoba', 'is_multiple' => false, 'description' => 'Surat Keterangan Bebas Narkoba'],
            ['priority' => 2, 'name_document_type' => 'Sertifikat_Keahlian', 'is_multiple' => false, 'description' => 'Sertifikat Keahlian'],
            ['priority' => 2, 'name_document_type' => 'License', 'is_multiple' => false, 'description' => 'License'],
            ['priority' => 2, 'name_document_type' => 'Pas_Foto_Tampak_Depan', 'is_multiple' => false, 'description' => 'Pas Foto Tampak Depan'],
            ['priority' => 2, 'name_document_type' => 'Pas_Foto_Tampak_Samping', 'is_multiple' => false, 'description' => 'Pas Foto Tampak Samping'],
            ['priority' => 2, 'name_document_type' => 'NPWP', 'is_multiple' => false, 'description' => 'Nomor Pokok Wajib Pajak'],
            ['priority' => 2, 'name_document_type' => 'Passport', 'is_multiple' => false, 'description' => 'Passport'],
            ['priority' => 2, 'name_document_type' => 'Training_Certificate', 'is_multiple' => true, 'description' => 'Training Certificate'],

            // dibawah ini tambahan untuk FA
            ['priority' => 3, 'name_document_type' => 'License_Verification', 'is_multiple' => false, 'description' => 'License Verification'],
            ['priority' => 3, 'name_document_type' => 'Surat_Keterangan_Lolos_Butuh', 'is_multiple' => false, 'description' => 'Surat Keterangan Lolos Butuh'],

            // dibawah ini tambahan untuk Pilot
            ['priority' => 4, 'name_document_type' => 'Logbook', 'is_multiple' => false, 'description' => 'Logbook'],
            ['priority' => 4, 'name_document_type' => 'Last_Pilot_Proficiency_Check', 'is_multiple' => false, 'description' => 'Last Pilot Proficiency Check'],

            // dibawah ini tambahan lagi untuk tipe FA dan Intern
            ['priority' => 5, 'name_document_type' => 'Surat_Izin_Orang_Tua', 'is_multiple' => false, 'description' => 'Surat Izin Orang Tua'],

        ];

        $documents1 = [
            ['name_document_type' => 'Curriculum_Vitae', 'is_multiple' => false, 'description' => 'Curriculum Vitae'],
            ['name_document_type' => 'Surat_Lamaran', 'is_multiple' => false, 'description' => 'Surat Lamaran'],
            ['name_document_type' => 'SKCK', 'is_multiple' => false, 'description' => 'Surat Keterangan Catatan Kepolisian'],
            ['name_document_type' => 'KTP_Pribadi', 'is_multiple' => false, 'description' => 'Kartu Tanda Penduduk Pribadi'],
            ['name_document_type' => 'KTP_Wali', 'is_multiple' => false, 'description' => 'Kartu Tanda Penduduk Wali'],
            ['name_document_type' => 'Akta_Kelahiran', 'is_multiple' => false, 'description' => 'Akta Kelahiran'],
            ['name_document_type' => 'Kartu_Keluarga', 'is_multiple' => false, 'description' => 'Kartu Keluarga'],
            ['name_document_type' => 'Buku_Menikah', 'is_multiple' => false, 'description' => 'Buku Menikah'],
            ['name_document_type' => 'Surat_Menikah', 'is_multiple' => false, 'description' => 'Surat Menikah'],
            ['name_document_type' => 'Ijazah', 'is_multiple' => true, 'description' => 'Ijazah'],
            ['name_document_type' => 'Sertifikat_Keahlian', 'is_multiple' => false, 'description' => 'Sertifikat Keahlian'],
            ['name_document_type' => 'License', 'is_multiple' => false, 'description' => 'License'],
            ['name_document_type' => 'Pilot_License', 'is_multiple' => true, 'description' => 'Pilot License'],
            ['name_document_type' => 'Surat_Keterangan_Lolos_Butuh', 'is_multiple' => false, 'description' => 'Surat Keterangan Lolos Butuh'],
            ['name_document_type' => 'Pas_Foto_Tampak_Depan', 'is_multiple' => false, 'description' => 'Pas Foto Tampak Depan'],
            ['name_document_type' => 'Pas_Foto_Tampak_Samping', 'is_multiple' => false, 'description' => 'Pas Foto Tampak Samping'],
            ['name_document_type' => 'Specimen', 'is_multiple' => false, 'description' => 'Specimen'],
            ['name_document_type' => 'Buku_Tabungan', 'is_multiple' => false, 'description' => 'Buku Tabungan'],
            ['name_document_type' => 'NPWP', 'is_multiple' => false, 'description' => 'Nomor Pokok Wajib Pajak'],
            ['name_document_type' => 'Passport', 'is_multiple' => false, 'description' => 'Passport'],
            ['name_document_type' => 'Surat_Keterangan_Bebas_Narkoba', 'is_multiple' => false, 'description' => 'Surat Keterangan Bebas Narkoba'],
            ['name_document_type' => 'Indonesian_Medical_Certificate', 'is_multiple' => false, 'description' => 'Indonesian Medical Certificate'],
            ['name_document_type' => 'Last_Pilot_Proficiency_Check', 'is_multiple' => false, 'description' => 'Last Pilot Proficiency Check'],
            ['name_document_type' => 'Logbook', 'is_multiple' => false, 'description' => 'Logbook'],
            ['name_document_type' => 'Training_Certificate', 'is_multiple' => true, 'description' => 'Training Certificate'],
            ['name_document_type' => 'Surat_Izin_Orang_Tua', 'is_multiple' => false, 'description' => 'Surat Izin Orang Tua'],
            ['name_document_type' => 'Portofolio', 'is_multiple' => false, 'description' => 'Portofolio'],
            ['name_document_type' => 'License_Verification', 'is_multiple' => false, 'description' => 'License Verification'],
            ['name_document_type' => 'Home_Country_Medical', 'is_multiple' => false, 'description' => 'Home Country Medical'],
            ['name_document_type' => 'Portofolio', 'is_multiple' => false, 'description' => 'Portofolio'],
        ];

        foreach ($documents as $document) {
            UserDetailDocumentType::create($document);
        }
    }
}
