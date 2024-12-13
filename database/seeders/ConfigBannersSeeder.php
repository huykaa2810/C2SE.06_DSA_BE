<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigBannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('config_banners')->delete();
        DB::table('config_banners')->insert([
            [
                'image' => 'https://minhduongads.com/wp-content/uploads/2019/03/truyen-thong-minh-duong.jpg',
                'priority' => 1,
                'is_open' => true,
            ],
            [
                'image' => 'https://insieutoc.vn/wp-content/uploads/2021/02/mau-banner-dep.jpg',
                'priority' => 2,
                'is_open' => false,
            ],
            [
                'image' => 'https://i.pinimg.com/736x/98/cf/09/98cf094d756707002760dacf3d575ae4.jpg',
                'priority' => 3,
                'is_open' => true,
            ],
            [
                'image' => 'https://chiasefilethietke.com/uploads/202312/chiasefilethietkecom-000822.jpg',
                'priority' => 0,
                'is_open' => true,
            ],
        ]);
    }
}
