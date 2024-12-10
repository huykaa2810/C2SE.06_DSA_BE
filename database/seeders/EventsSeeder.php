<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->delete();
        DB::table('events')->insert([
            [
                'title' => 'Sự kiện 1',
                'image' => 'https://example.com/image1.jpg',
                'content' => 'Nội dung của sự kiện 1.',
                'event_date' => now()->addDays(5),
                'location' => 'Hà Nội',
                'end_date' => now()->addDays(6),
                'organizer_id' => 1,
                'status' => 'active',
            ],
            [
                'title' => 'Sự kiện 2',
                'image' => 'https://example.com/image2.jpg',
                'content' => 'Nội dung của sự kiện 2.',
                'event_date' => now()->addDays(10),
                'location' => 'TP. Hồ Chí Minh',
                'end_date' => now()->addDays(11),
                'organizer_id' => 2,
                'status' => 'active',
            ],
            [
                'title' => 'Sự kiện 3',
                'image' => 'https://example.com/image3.jpg',
                'content' => 'Nội dung của sự kiện 3.',
                'event_date' => now()->subDays(3),
                'location' => 'Đà Nẵng',
                'end_date' => now()->subDays(2),
                'organizer_id' => 3,
                'status' => 'pending',
            ],
        ]);
    }
}
