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
                'image' => 'https://dsa.org.vn/wp-content/uploads/2017/10/NewDSA-Member1.jpg',
                'title' => 'Hình ảnh 1',
                'is_open' => 1,
            ],
            [
                'image' => 'https://dsa.org.vn/wp-content/uploads/2017/10/8CAC7F79-480x300.jpg',
                'title' => 'Hình ảnh 2',
                'is_open' => 2,
            ],
            [
                'image' => 'https://dsa.org.vn/wp-content/uploads/2017/10/DSC_0062-480x300.jpg',
                'title' => 'Hình ảnh 3',
                'is_open' => 1,
            ],
            [
                'image' => 'https://dsa.org.vn/wp-content/uploads/2017/10/DSC01040-480x300.jpg',
                'title' => 'Hình ảnh 4',
                'is_open' => 1,
            ],
            [
                'image' => 'https://dsa.org.vn/wp-content/uploads/2017/10/DSC00698-480x300.jpg',
                'title' => 'Hình ảnh 5',
                'is_open' => 1,
            ],
            [
                'image' => 'https://dsa.org.vn/wp-content/uploads/2017/10/IMG_0071-480x300.jpg',
                'title' => 'Hình ảnh 6',
                'is_open' => 2,
            ],
            [
                'image' => 'https://dsa.org.vn/wp-content/uploads/2017/10/25-01-2010-480x300.jpg',
                'title' => 'Hình ảnh 7',
                'is_open' => 1,
            ],
            [
                'image' => 'https://dsa.org.vn/wp-content/uploads/2017/10/HH1-480x300.jpg',
                'title' => 'Hình ảnh 8',
                'is_open' => 1,
            ],
            [
                'image' => 'https://dsa.org.vn/wp-content/uploads/2017/10/DSC02479-480x300.jpg',
                'title' => 'Hình ảnh 9',
                'is_open' => 1,
            ],
            [
                'image' => 'https://dsa.org.vn/wp-content/uploads/2017/10/DSC_9372-480x300.jpg',
                'title' => 'Hình ảnh 10',
                'is_open' => 1,
            ],
        ]);
    }
}
