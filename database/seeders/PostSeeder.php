<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->delete();
        DB::table('posts')->insert([
            [
                'category_id' => 1,
                'member_id' => 1,
                'title' => 'Bài viết 1',
                'content' => 'Nội dung bài viết 1.',
                'image' => 'https://example.com/image1.jpg',
                'is_open' => 1,
                'view' => 100,
            ],
            [
                'category_id' => 2,
                'member_id' => 2,
                'title' => 'Bài viết 2',
                'content' => 'Nội dung bài viết 2.',
                'image' => 'https://example.com/image2.jpg',
                'is_open' => 0,
                'view' => 2032,

            ],
            [
                'category_id' => 1,
                'member_id' => 3,
                'title' => 'Bài viết 3',
                'content' => 'Nội dung bài viết 3.',
                'image' => 'https://example.com/image3.jpg',
                'is_open' => 1,
                'view' => 123213,

            ],
        ]);
    }
}
