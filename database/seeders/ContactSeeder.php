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
                'title' => 'Tham gia hội thảo về khởi nghiệp',
                'content' => 'Chúng tôi tổ chức hội thảo về khởi nghiệp vào ngày 15 tháng 12. Hãy đăng ký tham gia để gặp gỡ các chuyên gia trong ngành và mở rộng mạng lưới của bạn!',
                'sender_name' => 'Trung tâm Đào tạo Doanh nhân',
                'email_sender' => 'info@doanhnhan.edu.vn',
                'status' => 'pending',
            ],
            [
                'title' => 'Tham gia hội thảo về khởi nghiệp',
                'content' => 'Chúng tôi tổ chức hội thảo về khởi nghiệp vào ngày 15 tháng 12. Hãy đăng ký tham gia để gặp gỡ các chuyên gia trong ngành và mở rộng mạng lưới của bạn!',
                'sender_name' => 'Trung tâm Đào tạo Doanh nhân',
                'email_sender' => 'info@doanhnhan.edu.vn',
                'status' => 'pending',
            ],
            [
                'title' => 'Khai trương cửa hàng mới tại Hà Nội',
                'content' => 'Chúng tôi hân hạnh thông báo khai trương cửa hàng mới tại số 123, Phố Huế, Hà Nội. Mời các bạn đến tham quan và nhận nhiều ưu đãi hấp dẫn!',
                'sender_name' => 'Công ty ABC',
                'email_sender' => 'info@abc.com',
                'status' => 'active',
            ],
            [
                'title' => 'Giảm giá 50% cho sản phẩm mùa đông',
                'content' => 'Chỉ trong tuần này, chúng tôi áp dụng chương trình giảm giá 50% cho tất cả các sản phẩm mùa đông. Nhanh tay đặt hàng ngay hôm nay!',
                'sender_name' => 'Cửa hàng XYZ',
                'email_sender' => 'sales@xyz.com',
                'status' => 'active',
            ],
            [
                'title' => 'Tham gia hội thảo về khởi nghiệp',
                'content' => 'Chúng tôi tổ chức hội thảo về khởi nghiệp vào ngày 15 tháng 12. Hãy đăng ký tham gia để gặp gỡ các chuyên gia trong ngành và mở rộng mạng lưới của bạn!',
                'sender_name' => 'Trung tâm Đào tạo Doanh nhân',
                'email_sender' => 'info@doanhnhan.edu.vn',
                'status' => 'pending',
            ],
            [
                'title' => 'Cập nhật chính sách bảo mật thông tin',
                'content' => 'Chúng tôi đã cập nhật chính sách bảo mật thông tin. Vui lòng xem chi tiết trên website của chúng tôi để bảo vệ quyền lợi của bạn.',
                'sender_name' => 'Công ty DEF',
                'email_sender' => 'support@def.com',
                'status' => 'inactive',
            ],
            [
                'title' => 'Chương trình tri ân khách hàng',
                'content' => 'Chúng tôi tổ chức chương trình tri ân khách hàng vào ngày 20 tháng 12. Tham gia để nhận quà tặng và ưu đãi đặc biệt!',
                'sender_name' => 'Công ty GHI',
                'email_sender' => 'customer.service@ghi.com',
                'status' => 'active',
            ],
        ]);
    }
}
