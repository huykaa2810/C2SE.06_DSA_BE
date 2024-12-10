<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['id' => '1' ,'category_name' => 'Giới Thiệu',          'parent_category_id' => '0', 'is_open' => '1'],
            ['id' => '2' ,'category_name ' => 'Hoạt Động',          'parent_category_id' => '0', 'is_open' => '1'],
            ['id' => '3' ,'category_name' => 'Tin Tức',             'parent_category_id' => '0', 'is_open' => '1'],
            ['id' => '4' ,'category_name' => 'Dành Cho Member',     'parent_category_id' => '0', 'is_open' => '1'],
            ['id' => '5' ,'category_name' => 'Thư Ngõ',             'parent_category_id' => '1', 'is_open' => '1'],
            ['id' => '6' ,'category_name' => 'Lịch Sử',             'parent_category_id' => '1', 'is_open' => '1'],
            ['id' => '7' ,'category_name' => 'Mục Đích - Tôn Chỉ',  'parent_category_id' => '1 ', 'is_open' => '1'],
            ['id' => '8' ,'category_name' => 'Điều Lệ',             'parent_category_id' => '1', 'is_open' => '1'],
            ['id' => '9' ,'category_name' => 'Đào Tạo',             'parent_category_id' => '2', 'is_open' => '1'],
            ['id' => '10' ,'category_name' => 'Hỗ Trợ Danh Nghiệp', 'parent_category_id' => '2', 'is_open' => '1'],
            ['id' => '11' ,'category_name' => 'Xã Hội',             'parent_category_id' => '2', 'is_open' => '1'],
            ['id' => '12' ,'category_name' => 'Tin Doanh Nghiệp',   'parent_category_id' => '3', 'is_open' => '1'],
            ['id' => '13' ,'category_name' => 'Tin Trong Ngành',    'parent_category_id' => '3', 'is_open' => '1'],
            ['id' => '14' ,'category_name' => 'Sự Kiện',            'parent_category_id' => '4', 'is_open' => '1'],
            ['id' => '15' ,'category_name' => 'Thư Viện Ảnh',       'parent_category_id' => '4', 'is_open' => '1'],
        ]);
    }
}
