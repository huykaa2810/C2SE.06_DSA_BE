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
                'title' => 'Job Fair 2024 - Công ty ABC',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTklaWDMhxioLFxBAE7dAiCunTM7EkIJsD1zg&s',
                'content' => 'Tham gia Job Fair 2024 để gặp gỡ và phỏng vấn trực tiếp với các nhà tuyển dụng hàng đầu.',
                'event_date' => now()->addDays(1),
                'location' => 'Hà Nội',
                'end_date' => now()->addDays(1)->addHours(2),
                'organizer_id' => 1,
                'status' => 'active',
            ],
            [
                'title' => 'Ngày hội tuyển dụng - Công ty XYZ',
                'image' => 'https://iuh.edu.vn/Resource/Upload2/Image/2022/05/NHVL-01.jpg',
                'content' => 'Công ty XYZ tổ chức ngày hội tuyển dụng với nhiều vị trí hấp dẫn.',
                'event_date' => now()->subDays(2),
                'location' => 'Đà Nẵng',
                'end_date' => now()->addDays(1),
                'organizer_id' => 2,
                'status' => 'active',
            ],
            [
                'title' => 'Hội thảo nghề nghiệp - Công ty DEF',
                'image' => 'https://iuh.edu.vn/Resource/Upload2/Image/2023/11/nhvl-image013.jpg',
                'content' => 'Tìm hiểu về cơ hội nghề nghiệp tại công ty DEF trong hội thảo này.',
                'event_date' => now()->addDays(3),
                'location' => 'TP. Hồ Chí Minh',
                'end_date' => now()->addDays(3)->addHours(3),
                'organizer_id' => 3,
                'status' => 'active',
            ],
            [
                'title' => 'Gặp gỡ nhà tuyển dụng - Công ty GHI',
                'image' => 'https://hnivc.edu.vn/upload/images/2024/thang-5-2024/ngay-hoi-viec-lam-4.jpg',
                'content' => 'Công ty GHI tổ chức gặp gỡ nhà tuyển dụng cho sinh viên mới ra trường.',
                'event_date' => now()->subDays(1),
                'location' => 'Hà Nội',
                'end_date' => now()->addDays(1),
                'organizer_id' => 4,
                'status' => 'active',
            ],
            [
                'title' => 'Ngày hội nghề nghiệp - Công ty JKL',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsBP4ZaxLkkls6cUMrh-BCKL2ELE1yIcYrJg&s',
                'content' => 'Tham gia ngày hội nghề nghiệp với nhiều cơ hội việc làm hấp dẫn từ công ty JKL.',
                'event_date' => now()->addDays(5),
                'location' => 'TP. Hồ Chí Minh',
                'end_date' => now()->addDays(5)->addHours(2),
                'organizer_id' => 5,
                'status' => 'active',
            ],
            [
                'title' => 'Hội thảo tuyển dụng - Công ty MNO',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUFOmCqG-GBX6jzXjNM3k_kYFonNp4cvDogQ&s',
                'content' => 'Công ty MNO tổ chức hội thảo tuyển dụng cho các vị trí IT.',
                'event_date' => now()->addDays(4),
                'location' => 'Đà Nẵng',
                'end_date' => now()->addDays(4)->addHours(3),
                'organizer_id' => 6,
                'status' => 'active',
            ],
            [
                'title' => 'Chương trình tuyển dụng - Công ty PQR',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTh1nYr6g7G7unxvjWsFYnoEY_pzqIFrSWDbw&s',
                'content' => 'Tìm hiểu về chương trình tuyển dụng tại công ty PQR.',
                'event_date' => now()->addDays(10),
                'location' => 'Hà Nội',
                'end_date' => now()->addDays(10)->addHours(2),
                'organizer_id' => 7,
                'status' => 'active',
            ],
            [
                'title' => 'Ngày hội việc làm - Công ty STU',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYzvtn0PV3cgfAwwVbpasUozXM2oyc3X8p6g&s',
                'content' => 'Công ty STU tổ chức ngày hội việc làm với nhiều vị trí tuyển dụng.',
                'event_date' => now()->addDays(15),
                'location' => 'TP. Hồ Chí Minh',
                'end_date' => now()->addDays(15)->addHours(2),
                'organizer_id' => 8,
                'status' => 'active',
            ],
            [
                'title' => 'Hội chợ việc làm - Công ty VWX',
                'image' => 'https://www.ueh.edu.vn/images/upload/editer/ngay%20hoi%20thuc%20tap%202022_17.jpg',
                'content' => 'Tham gia hội chợ việc làm với nhiều cơ hội từ công ty VWX.',
                'event_date' => now()->addDays(30),
                'location' => 'Đà Nẵng',
                'end_date' => now()->addDays(30)->addHours(2),
                'organizer_id' => 9,
                'status' => 'active',
            ],
            [
                'title' => 'Gặp gỡ nhà tuyển dụng - Công ty YZ',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKI3OnS68Va3fFOgCxO91gqpzBLvNSxnJdfQ&s',
                'content' => 'Công ty YZ tổ chức buổi gặp gỡ nhà tuyển dụng cho sinh viên.',
                'event_date' => now()->addDays(2),
                'location' => 'Hà Nội',
                'end_date' => now()->addDays(2)->addHours(2),
                'organizer_id' => 10,
                'status' => 'active',
            ],
        ]);
    }
}
