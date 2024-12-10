<?php

namespace Database\Seeders;

use App\Models\ConfigBanners;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            CategoriesSeeder::class,
            MemberSeeder::class,
            AssociationSeeder::class,
            ConfigBannersSeeder::class,
            DocumentSeeder::class,
            EventsSeeder::class,
            MembershipFeeSeeder::class,
            MembershipFeeDetailsSeeder::class,
            PhotoLibrarySeeder::class,
            PostSeeder::class,
            ContactSeeder::class,

        ]);
    }
}
