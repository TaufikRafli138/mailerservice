<?php

namespace Database\Seeders;

use App\Models\UserDetailDocument;
use App\Models\UserDetailDocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OneUserDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 24; $i++) {
            UserDetailDocument::create([
                'id_user' => 1,
                'data_path' => 'dummy.jpg',
                'id_user_detail_document_type' => $i,
            ]);
        }

    }
}
