<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('associations')->delete();
        DB::table('associations')->insert([
            [
                'user_name' => 'Duytan123@gmail.com',
                'password' => bcrypt('123456'),
                'company_email' => 'Duytan123@gmail.com',
                'registrant_name' => 'Huỳnh Lê Quang Huy',
                'subscriber_email' => 'Huy281002@gmail.com',
                'phone_number' => '0123456789',
                'registered_phone_number' => '0987654321',
                'address' => '137 Nguyễn Văn Linh, TP Đà Nẵng',
                'website' => 'http://vkcjbkvcbc.com',
                'is_active' => 1,
                'is_open' => 1,
                'company_name' => 'Đại Học Duy Tân',
                'is_master' => 1,
            ],
            [
                'username' => 'admin1@gmail.com',
                'password' => bcrypt('123456'),
                'company_email' => 'admin1@gmail.com',
                'registrant_name' => 'Huỳnh Lê Quang Huy',
                'subscriber_email' => 'Huy281002@gmail.com',
                'phone_number' => '0123456789',
                'registered_phone_number' => '0987654321',
                'address' => 'TP Đà Nẵng',
                'website' => 'http://vkcjbkvcbc.com',
                'is_active' => 1,
                'is_open' => 1,
                'company_name' => 'C2SE06',
                'is_master' => 0,
            ],
        ]);
    }
}
