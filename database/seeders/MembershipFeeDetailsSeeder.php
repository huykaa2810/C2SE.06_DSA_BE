<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipFeeDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('membership_fee_details')->delete();
        DB::table('membership_fee_details')->insert([
            [
                'amount_id' => 1,
                'member_id' => 1,
                'status' => 'active',
                'amount' => 1000000,
            ],
            [
                'amount_id' => 2,
                'member_id' => 2,
                'status' => 'pending',
                'amount' => 2000000,
            ],
            [
                'amount_id' => 3,
                'member_id' => 3,
                'status' => 'peding',
                'amount' => 1500000,
            ],
        ]);
    }
}
