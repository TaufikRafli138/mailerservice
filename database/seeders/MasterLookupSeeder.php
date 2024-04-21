<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Competency;
use App\Models\Country;
use App\Models\Degree;
use App\Models\EmploymentStatus;
use App\Models\Language;
use App\Models\Major;
use App\Models\Province;
use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class MasterLookupSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::countrySeeder();
        self::provinceSeeder();
        self::citySeeder();
        self::religionSeeder();
        self::degreeSeeder();
        self::majorSeeder();
        self::employmentSeeder();
        self::languageSeeder();
        self::competencySeeder();
    }

    public function citySeeder()
    {
        City::insert([
            ['id_province' => 1, 'name_city' => 'Surabaya'],
            ['id_province' => 1, 'name_city' => 'Malang'],
            ['id_province' => 1, 'name_city' => 'Magetan'],
            ['id_province' => 2, 'name_city' => 'Solo'],
            ['id_province' => 2, 'name_city' => 'Semarang'],
            ['id_province' => 3, 'name_city' => 'Bandung'],
            ['id_province' => 3, 'name_city' => 'Bekasi'],
            ['id_province' => 3, 'name_city' => 'Bogor'],
        ]);
    }

    public function countrySeeder()
    {
        Country::insert([
            ['name_country' => 'Indonesia'],
            ['name_country' => 'USA'],
            ['name_country' => 'Brazil'],
            ['name_country' => 'India'],
            ['name_country' => 'China'],
            ['name_country' => 'Canada'],
            ['name_country' => 'Australia'],
            ['name_country' => 'Germany'],
            ['name_country' => 'France'],
            ['name_country' => 'Japan'],
            ['name_country' => 'South Korea'],
            ['name_country' => 'Mexico'],
            ['name_country' => 'Russia'],
            ['name_country' => 'United Kingdom'],
            ['name_country' => 'Italy'],
            ['name_country' => 'Spain'],
            ['name_country' => 'Malaysia'],
            ['name_country' => 'Singapore'],
        ]);
    }

    public function provinceSeeder()
    {
        Province::insert([
            ['id_country' => 1, 'name_province' => 'Jawa Timur'],
            ['id_country' => 1, 'name_province' => 'Jawa Tengah'],
            ['id_country' => 1, 'name_province' => 'Jawa Barat'],
            ['id_country' => 2, 'name_province' => 'Province New York'],
        ]);
    }

    public function languageSeeder()
    {
        Language::insert([
            ['name_language' => 'English'],
            ['name_language' => 'Indonesia'],
            ['name_language' => 'Chinese'],
            ['name_language' => 'Jawa'],
        ]);
    }

    public function employmentSeeder()
    {
        EmploymentStatus::insert([
            ['name_status' => 'Full-time'],
            ['name_status' => 'Part-time'],
            ['name_status' => 'Contract'],
            ['name_status' => 'Internship'],
            ['name_status' => 'Freelance'],
        ]);
    }

    public function religionSeeder()
    {
        Religion::insert([
            ['name_religion' => 'Islam'],
            ['name_religion' => 'Protestan'],
            ['name_religion' => 'Katolik'],
            ['name_religion' => 'Hindu'],
            ['name_religion' => 'Konghucu'],
            ['name_religion' => 'Budha'],
        ]);
    }

    public function degreeSeeder()
    {
        Degree::insert([
            ['name_degree' => 'SMA/K', 'desc' => 'Senior High School (S1)'],
            ['name_degree' => 'D1', 'desc' => 'Diploma 1 (D1)'],
            ['name_degree' => 'D2', 'desc' => 'Diploma 2 (D2)'],
            ['name_degree' => 'D3', 'desc' => 'Diploma 3 (D3)'],
            ['name_degree' => 'D4', 'desc' => 'Diploma 4 (D4)'],
            ['name_degree' => 'S1', 'desc' => 'Bachelor Degree (S1)'],
            ['name_degree' => 'S2', 'desc' => 'Master Degree (S2)'],
            ['name_degree' => 'S3', 'desc' => 'Doctoral Degree (S2)'],
        ]);
    }

    public function majorSeeder()
    {
        Major::insert([
            ['name_major' => 'Computer Science'],
            ['name_major' => 'Information System'],
            ['name_major' => 'Design Visual'],
            ['name_major' => 'Accounting'],
            ['name_major' => 'Marketing'],
            ['name_major' => 'Tax Leadership'],
            ['name_major' => 'Civil Engineering'],
            ['name_major' => 'Electrical Engineering'],
            ['name_major' => 'Mechanical Engineering'],
            ['name_major' => 'Industrial Engineering'],
            ['name_major' => 'Environmental Engineering'],
            ['name_major' => 'Economics'],
            ['name_major' => 'Business Administration'],
            ['name_major' => 'Law'],
            ['name_major' => 'International Relations'],
            ['name_major' => 'Psychology'],
            ['name_major' => 'Communication'],
            ['name_major' => 'Public Health'],
            ['name_major' => 'Medicine'],
            ['name_major' => 'Nursing'],
            ['name_major' => 'Dentistry'],
            ['name_major' => 'Pharmacy'],
            ['name_major' => 'Architecture'],
            ['name_major' => 'Interior Design'],
            ['name_major' => 'Agricultural Science'],
            ['name_major' => 'Fisheries and Marine Science'],
            ['name_major' => 'Environmental Science'],
            ['name_major' => 'Mathematics'],
            ['name_major' => 'Physics'],
            ['name_major' => 'Chemistry'],
            ['name_major' => 'Biology'],
            ['name_major' => 'English Literature'],
            ['name_major' => 'History'],
            ['name_major' => 'Sociology'],
            ['name_major' => 'Anthropology'],
            ['name_major' => 'Music'],
            ['name_major' => 'Dance'],
            ['name_major' => 'Film and Television'],
            ['name_major' => 'Tourism and Hospitality'],
            ['name_major' => 'Culinary Arts'],
            ['name_major' => 'Fashion Design'],
            ['name_major' => 'Sports Science'],
            ['name_major' => 'Education'],
            ['name_major' => 'Library and Information Science'],
            ['name_major' => 'Islamic Studies'],
            ['name_major' => 'Christian Theology'],
            ['name_major' => 'Hindu Theology'],
            ['name_major' => 'Buddhist Studies'],
            ['name_major' => 'Social Work'],
            ['name_major' => 'Nutrition Science'],
        ]);
    }

    public function competencySeeder()
    {
        Competency::insert([
            [
                'name_competency' => 'Web Development',
                'description' => 'Building websites and web applications using various technologies.',
            ],
            [
                'name_competency' => 'Mobile App Development',
                'description' => 'Creating mobile applications for iOS and Android platforms.',
            ],
            [
                'name_competency' => 'Data Analysis',
                'description' => 'Analyzing and interpreting complex data sets to provide insights.',
            ],
            [
                'name_competency' => 'Project Management',
                'description' => 'Planning, executing, and closing projects to achieve specific goals.',
            ],
            [
                'name_competency' => 'User Experience Design',
                'description' => 'Designing intuitive and user-friendly interfaces for digital products.',
            ],
            [
                'name_competency' => 'Machine Learning',
                'description' => 'Implementing algorithms and models for machine learning applications.',
            ],
            [
                'name_competency' => 'Cybersecurity',
                'description' => 'Securing systems, networks, and applications from cyber threats.',
            ],
        ]);
    }
}
