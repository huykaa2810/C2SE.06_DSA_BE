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
                'image' => 'image1',
                'priority' => 1,
                'is_open' => true,
            ],
            [
                'image' => 'image2',
                'priority' => 2,
                'is_open' => false,
            ],
            [
                'image' => 'image3',
                'priority' => 3,
                'is_open' => true,
            ],
            [
                'image' => 'image4',
                'priority' => 0,
                'is_open' => true,
            ],
        ]);
    }
}
