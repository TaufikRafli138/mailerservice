<?php

namespace Database\Seeders;

use App\Models\CompetencyJobRequisition;
use App\Models\JobRequisition;
use App\Models\JobRequisitionCategory;
use App\Models\JobRequisitionLanguage;
use App\Models\JobRequisitionMajorEducation;
use App\Models\JobRequisitionNationality;
use App\Models\JobRequisitionQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class JobRequisitionSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::jobRequisitionCategorySeeder();
        self::jobRequisitionSeeder();
        self::competencyJobRequisitionSeeder();
        self::jobRequisitionLanguageSeeder();
        self::jobRequisitionQuestionSeeder();
        self::jobRequisitionNationalitySeeder();
        self::jobRequisitionMajors();
    }

    public function jobRequisitionCategorySeeder()
    {
        JobRequisitionCategory::insert([
            [
                'name_category' => 'Pilot',
                'description' => 'Jobs related to developing websites and web applications.',
            ],
            [
                'name_category' => 'Flight Attendant',
                'description' => 'Jobs focused on creating visual designs and graphics.',
            ],
            [
                'name_category' => 'Employee',
                'description' => 'Jobs involving the management and maintenance of computer networks.',
            ]
        ]);
    }

    public function jobRequisitionSeeder()
    {
        JobRequisition::insert([
            [
                'id_hiring_manager' => '303092',
                'id_recruiter' => '303092',
                'id_employment_status' => 1,
                'id_job_requisition_category' => 1,
                'div' => 'JKTOFQG',
                'unit' => 'JKTOFAQG',
                'group_job' => 'FO',
                'jobs_name' => 'FO - Pilot A320 NEO',
                'jobs_description' => '<h2>Jobs Description</h2>
                    <p>Job Description for FO Pilot A320</p>
                ',
                'job_requisition_file' => 'Link of file job requisition',
                'doc_number' => 'JD456',
                'gender' => 'F',
                'age_start' => 28,
                'age_end' => 40,
                'marital_status' => 'All',
                'major_education' => 2,
                'gpa_start' => 3.5,
                'gpa_end' => 4.0,
                'portofolio' => 'Include a link to your GitHub profile or relevant coding samples.',
                'status' => 'published',
                'failed_job' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'id_city' => 1
            ],
            [
                'id_hiring_manager' => '303092',
                'id_recruiter' => '303092',
                'id_employment_status' => 2,
                'id_job_requisition_category' => 3,
                'div' => 'JKTOCQG',
                'unit' => 'JKTOCA1QG',
                'group_job' => 'JRFA',
                'jobs_name' => 'Junior Flight Attendant for Airbus A330 Neo',
                'jobs_description' => '<h2>Jobs Description</h2>
                    <p>Junior Flight Attendant for Airbus A330 Neo</p>
                ',
                'job_requisition_file' => 'Link of file job requisition',
                'doc_number' => 'JD456',
                'gender' => 'F',
                'age_start' => 28,
                'age_end' => 40,
                'marital_status' => 'Single',
                'major_education' => 5,
                'gpa_start' => 3.5,
                'gpa_end' => 4.0,
                'portofolio' => 'Include a link to your GitHub profile or relevant coding samples.',
                'status' => 'published',
                'failed_job' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'id_city' => 1
            ],
            [
                'id_hiring_manager' => '303092',
                'id_recruiter' => '303092',
                'id_employment_status' => 3,
                'id_job_requisition_category' => 1,
                'div' => 'JKTIXQG',
                'unit' => 'JKTIXSQG',
                'group_job' => 'ASSC',
                'jobs_name' => 'Human Capital Associate Head Office Jakarta',
                'jobs_description' => '<h2>Jobs Description</h2>
                    <p>Job Description for Human Capital Associate Head Office Jakarta</p>
                ',
                'job_requisition_file' => 'Link of file job requisition',
                'doc_number' => 'JD456',
                'gender' => 'F',
                'age_start' => 28,
                'age_end' => 40,
                'marital_status' => 'Married',
                'major_education' => 6,
                'gpa_start' => 3.5,
                'gpa_end' => 4.0,
                'portofolio' => 'Include a link to your GitHub profile or relevant coding samples.',
                'status' => 'published',
                'failed_job' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'id_city' => 1
            ]
        ]);
    }
    public function jobRequisitionMajors()
    {
        JobRequisitionMajorEducation::insert([
            [
                'id_job_requisition' => 1,
                'id_major' => 2,
            ],
            [
                'id_job_requisition' => 1,
                'id_major' => 3,
            ],
            [
                'id_job_requisition' => 1,
                'id_major' => 4,
            ],
            [
                'id_job_requisition' => 2,
                'id_major' => 2,
            ],
            [
                'id_job_requisition' => 2,
                'id_major' => 3,
            ],
            [
                'id_job_requisition' => 2,
                'id_major' => 4,
            ],
            [
                'id_job_requisition' => 3,
                'id_major' => 2,
            ],
            [
                'id_job_requisition' => 3,
                'id_major' => 3,
            ],
            [
                'id_job_requisition' => 3,
                'id_major' => 4,
            ]

        ]);
    }
    public function competencyJobRequisitionSeeder()
    {
        CompetencyJobRequisition::insert([
            [
                'id_competency' => 1,
                'id_job_requisition' => 1,
            ],
            [
                'id_competency' => 2,
                'id_job_requisition' => 1,
            ],
            [
                'id_competency' => 3,
                'id_job_requisition' => 1,
            ],
            [
                'id_competency' => 4,
                'id_job_requisition' => 1,
            ],
            [
                'id_competency' => 1,
                'id_job_requisition' => 2,
            ],
            [
                'id_competency' => 1,
                'id_job_requisition' => 2,
            ],
        ]);
    }

    public function jobRequisitionQuestionSeeder()
    {
        JobRequisitionQuestion::insert([
            [
                'id_job_requisition' => 1,
                'question' => 'Apakah Anda memiliki pengalaman kerja dalam bidang IT?',
                'answer' => true,
                'must_correct' => true,
            ],
            [
                'id_job_requisition' => 2,
                'question' => 'Apakah Anda memiliki keahlian teknis dalam pengembangan web menggunakan PHP, JavaScript, dan Framework Laravel?',
                'answer' => false,
                'must_correct' => true,
            ],
            [
                'id_job_requisition' => 3,
                'question' => 'Apakah Anda memiliki gelar Sarjana Teknik Informatika dari Universitas XYZ?',
                'answer' => true,
                'must_correct' => false,
            ],
            [
                'id_job_requisition' => 1,
                'question' => 'Apakah Anda dapat mengelola tekanan dalam pekerjaan dengan merencanakan tugas dan memprioritaskan pekerjaan sesuai kebutuhan?',
                'answer' => false,
                'must_correct' => false,
            ],
            [
                'id_job_requisition' => 2,
                'question' => 'Apakah Anda pernah berkontribusi pada proyek open-source di GitHub terkait pengembangan aplikasi e-commerce?',
                'answer' => true,
                'must_correct' => true,
            ],
            [
                'id_job_requisition' => 3,
                'question' => 'Apakah Anda memiliki motivasi untuk terus belajar dan tumbuh dalam karir, serta memberikan kontribusi positif pada tim?',
                'answer' => false,
                'must_correct' => false,
            ],
            [
                'id_job_requisition' => 1,
                'question' => 'Apakah Anda dapat berkomunikasi dengan baik dan mencari solusi bersama untuk menyelesaikan konflik di tempat kerja?',
                'answer' => true,
                'must_correct' => true,
            ],
            [
                'id_job_requisition' => 2,
                'question' => 'Apakah Anda pernah bekerja pada proyek implementasi sistem ERP yang kompleks dan berhasil menyelesaikannya dengan sukses?',
                'answer' => false,
                'must_correct' => false,
            ],
            [
                'id_job_requisition' => 3,
                'question' => 'Apakah Anda mengukur keberhasilan berdasarkan pencapaian target, umpan balik positif dari pelanggan, dan perkembangan pribadi dalam keterampilan teknis?',
                'answer' => true,
                'must_correct' => true,
            ],
        ]);
    }

    public function jobRequisitionLanguageSeeder()
    {
        for ($i = 1; $i <= 10; $i++) {

            $idku = rand(1, 3);
            JobRequisitionLanguage::insert([
                'id_job_requisition' => $idku,
                'id_language' => rand(1, 4),
                'skill' => 'Skill ' . $i,
                'skill_level' => 'Intermediate',
                'description' => 'Description for Skill ' . $i,
            ], [
                'id_job_requisition' => $idku,
                'id_language' => rand(1, 4),
                'skill' => 'Skill ' . $i,
                'skill_level' => 'Intermediate',
                'description' => 'Description for Skill ' . $i,
            ]);
        }
    }

    public function jobRequisitionNationalitySeeder()
    {
        for ($i = 1; $i <= 3; $i++) {

            JobRequisitionNationality::insert([
                'id_job_requisition' => $i,
                'id_nationality' => rand(1, 17),
            ], [
                'id_job_requisition' => $i,
                'id_nationality' => rand(1, 17),
            ]);
        }
    }
}
