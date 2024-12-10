<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoLibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('photo_libraries')->delete();
        DB::table('photo_libraries')->insert([
            [
                'image' => 'https://example.com/image1.jpg',
                'title' => 'Hình ảnh 1',
                'is_open' => 1,
            ],
            [
                'image' => 'https://example.com/image2.jpg',
                'title' => 'Hình ảnh 2',
                'is_open' => 2,
            ],
            [
                'image' => 'https://example.com/image3.jpg',
                'title' => 'Hình ảnh 3',
                'is_open' => 1,
            ],
        ]);
    }
}
