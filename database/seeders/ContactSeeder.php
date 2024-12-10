<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->delete();
        DB::table('contacts')->insert([
            [
                'title' => 'Thông báo 1',
                'content' => 'Nội dung thông báo 1.',
                'sender_name' => 'Người Gửi 1',
                'email_sender' => 'sender1@gmail.com',
                'status' => 'pending',
            ],
            [
                'title' => 'Thông báo 2',
                'content' => 'Nội dung thông báo 2.',
                'sender_name' => 'Người Gửi 2',
                'email_sender' => 'sender2@gmail.com',
                'status' => 'inactive',
            ],
            [
                'title' => 'Thông báo 3',
                'content' => 'Nội dung thông báo 3.',
                'sender_name' => 'Người Gửi 3',
                'email_sender' => 'sender3@gmail.com',
                'status' => 'active',
            ],
        ]);
    }
}
