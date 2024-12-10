<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('documents')->delete();
        DB::table('documents')->insert([
            [
                'title' => 'Tài liệu 1',
                'url_file' => 'https://example.com/file1.pdf',
                'member_id' => 1,
            ],
            [
                'title' => 'Tài liệu 2',
                'url_file' => 'https://example.com/file2.pdf',
                'member_id' => 2,
            ],
            [
                'title' => 'Tài liệu 3',
                'url_file' => 'https://example.com/file3.pdf',
                'member_id' => 3,
            ],
        ]);
    }
}
