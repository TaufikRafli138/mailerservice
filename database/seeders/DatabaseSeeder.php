<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use HasFactory;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(MasterLookupSeeder::class);
        $this->call(UserDetailSeeder::class);
        $this->call(JobRequisitionSeeder::class);
        $this->call(JobRequisitionUserAppliedSeeder::class);
        // $this->call(TemporaryDataSeeder::class);
    }
}
