<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('membership_fees')->delete();
        DB::table('membership_fees')->insert([
            [
                'fee_type' => 'Phí dịch vụ',
                'amount' => 500000,
                'is_open' => 1,
            ],
            [
                'fee_type' => 'Phí đăng ký',
                'amount' => 1000000,
                'is_open' => 1,
            ],
            [
                'fee_type' => 'Phí thanh toán',
                'amount' => 2000000,
                'is_open' => 0,
            ],
        ]);
    }
}
