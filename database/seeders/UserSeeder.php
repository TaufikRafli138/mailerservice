<?php

namespace Database\Seeders;

use App\Enums\RoleUserTypes;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    use HasFactory;
    public function run(): void
    {
        User::insert([
            [
                'email' => 'candidate@example.com',
                'name' => 'Candidate',
                'password' => Hash::make('password'),
                'role' => RoleUserTypes::Candidate,
            ],
            [
                'email' => 'admin@example.com',
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => RoleUserTypes::Admin,
            ],
        ]);

        $names = [
            "Feni Fitriyanti",
            "Shani Indira Natio",
            "Shania Gracia",
            "Gita Sekar Andarini",
            "Angelina Christy",
            "Azizi Asadel",
            "Febriola Sinambela",
            "Freya Jayawardana",
            "Helisma Putri",
            "Jessica Chandra",
            "Mutiara Azzahra",
            "Yessica Tamara",
            "Cornelia Vanisa",
            "Fiony Alveria",
            "Flora Shafiq",
            "Lulu Salsabila",
            "Reva Fidela",
            "Adzana Shaliha",
            "Indah Cahya",
            "Kathrina Irene",
            "Marsha Lenathea",
            "Amanda Sukma",
            "Aurellia",
            "Callista Alifia",
            "Gabriela Abigail",
            "Indira Seruni",
            "Jesslyn Elly",
            "Raisha Syifa",
            "Alya Amanda",
            "Anindya Ramadhani",
            "Cathleen Nixie",
            "Celline Thefani",
            "Chelsea Davina",
            "Cynthia Yaputera",
            "Dena Natalia",
            "Desy Natalia",
            "Gendis Mayrannisa",
            "Grace Octaviani",
            "Greesella Adhalia",
            "Jeane Victoria",
            "Michelle Alexandra",
            "Abigail Rachel",
            "Adeline Wijaya",
            "Aisa Maharani",
            "Aurhel Alana",
            "Catherina Vallencia",
            "Fritzy Rosmerian",
            "Hillary Abigail",
            "Jazzlyn Trisha",
            "Letycia Moreen",
            "Michelle Levia",
            "Nayla Suji",
            "Nina Tutachia",
            "Oline Manuel",
            "Regina Wilian",
            "Ribka Budiman",
            "Shabilqis Naila",
            "Victoria Kimberly",
            "Aninditha Rahma C"
        ];

        foreach ($names as $name) {
            $randomNumber = rand(100, 999);
            $email = strtolower(str_replace(' ', '', $name)) . $randomNumber . '@example.com';

            DB::table('users')->insert([
                'email' => $email,
                'name' => $name,
                'password' => Hash::make('password'),
                'otp' => str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
