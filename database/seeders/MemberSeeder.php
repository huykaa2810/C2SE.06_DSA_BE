<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->delete();
        DB::table('members')->insert([
            [
                'user_name' => 'Duytan123@gmail.com',
                'password' => bcrypt('12345678'),
                'avatar' => 'http://avatar1.jpg',
                'full_name' => 'Huỳnh Lê Quang Huy',
                'subscriber_email' => 'huy281002@gmail.com',
                'phone_number' => '0123456789',
                'address' => '137 Nguyễn Văn Linh, TP Đà Nẵng',
                'is_open' => 1,
            ],
            [
                'user_name' => 'DongA123@gmail.com',
                'password' => bcrypt('12345678'),
                'avatar' => 'http://avatar2.jpg',
                'full_name' => 'Trần Đoàn Đình Long',
                'subscriber_email' => 'dinhlong123@gmai.com',
                'phone_number' => '0123456790',
                'address' => '10 Xô Viết Nghệ Tĩnh, TP Đà Nẵng',
                'is_open' => 1,
            ],
        ]);
    }
}
