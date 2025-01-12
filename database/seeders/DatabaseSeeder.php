<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ChiTietDonHang;
use App\Models\DanhMuc;
use App\Models\DonHang;
use App\Models\Hang;
use App\Models\ProductVariant;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    



    public function run(): void
    {

        Schema::disableForeignKeyConstraints();

        DanhMuc::query()->truncate();
        User::query()->truncate();
        Hang::query()->truncate();
        SanPham::query()->truncate();
        DonHang::query()->truncate();
        ProductVariant::query()->truncate();
        ChiTietDonHang::query()->truncate();


        for ($i = 0; $i < 5; $i++) {
            $tenDanhMuc = fake()->words(2, true);
            $hinhAnh = 'https://picsum.photos/750/530?random=' . rand(1, 1000); 
            DanhMuc::query()->create([
                'hinh_anh' => $hinhAnh,
                'ten_danh_muc' => $tenDanhMuc,
                'trang_thai' => 1,
            ]);
        }

            User::query()->create([
                'name' => fake()->name(),
                'email' => 'admin@gmail.com',
                'phone' => '0' . fake()->numerify('##########'), // Tạo số điện thoại 10 chữ số
                'address' => fake()->address(),
                'password' => '12345678', // Mật khẩu mặc định
                'role' => 1, // role ngẫu nhiên
            ]);

        // Tạo dữ liệu mẫu cho bảng hang
        for ($i = 0; $i < 5; $i++) {
            Hang::query()->create([
                'ten_hang' => fake()->company(),
                'mo_ta' => fake()->text(50),
                'danh_muc_id' => rand(1, 4), // Giả sử danh_muc_id có từ 1 đến 8
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            $tenSanPham = fake()->words(3, true);
            $maSanPham = Str::upper(Str::random(8));
            $hinhAnh = 'https://picsum.photos/750/530?random=' . rand(1, 1000); 

            SanPham::query()->create([
                'ma_san_pham' => $maSanPham,
                'ten_san_pham' => $tenSanPham,
                'hinh_anh' => $hinhAnh,
                'gia_san_pham' => rand(100000, 1000000),
                'gia_khuyen_mai' => rand(50000, 900000),
                'mo_ta_ngan' => fake()->sentence(2),
                'noi_dung' => fake()->paragraph(1),
                'so_luong' => rand(10, 100),
                'luot_xem' => rand(0, 1000),
                'ngay_dang_ban' => fake()->dateTimeThisYear(),
                'danh_muc_id' => rand(1, 4), // Giả định có 8 danh mục
                'hang_id' => rand(1, 4),     // Giả định có 5 hãng
                'trang_thai' => rand(0, 1),
                'is_type' => rand(0, 2), // Loại ngẫu nhiên (0, 1 hoặc 2)
                'is_new' => rand(0, 1),
                'is_hot' => rand(0, 1),
                'is_hot_deal' => rand(0, 1),
                'is_show_home' => rand(0, 1),
                'is_active' => rand(0, 1),
            ]);
        }

        for ($i = 1; $i < 20; $i++) {
            for ($j = 0; $j < 2; $j++) {  // Tạo 2 biến thể cho mỗi sản phẩm
                ProductVariant::query()->create([
                    'san_pham_id' => $i,
                    'dung_luong' =>rand(1, 10) . 'GB',  // Dung lượng ngẫu nhiên
                    'mau_sac' => ['Đỏ', 'Xanh', 'Vàng', 'Đen'][rand(0, 3)],  // Màu sắc ngẫu nhiên
                    'gia' => rand(100000, 1000000),  // Giá ngẫu nhiên
                    'so_luong' => rand(1, 100),  // Số lượng ngẫu nhiên
                ]);
            }
        }

        for ($i = 0; $i < 10; $i++) {
            DonHang::query()->create([
                'ma_don_hang' => 'DH' . Str::upper(Str::random(6)),
                'user_id' => 1, // Giả định có 5 user
                'ten_nguoi_nhan' => fake()->name(),
                'email_nguoi_nhan' => fake()->email(),
                'so_dien_thoai_nguoi_nhan' => '0' . fake()->numerify('##########'),
                'dia_chi_nguoi_nhan' => fake()->address(),
                'ghi_chu' => fake()->sentence(),
                'trang_thai_don_hang' => 'dang_chuan_bi',
                'trang_thai_thanh_toan' => 'chua_thanh_toan',
                'phuong_thuc_thanh_toan' => 'COD',
                'tien_hang' => $tienHang = rand(100000, 1000000),
                'tien_khuyen_mai' => $tienKhuyenMai = rand(10000, $tienHang / 2),
                'tien_ship' => $tienShip = rand(20000, 50000),
                'tong_tien' => $tienHang - $tienKhuyenMai + $tienShip,
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            for ($j = 0; $j < 2; $j++) { 
                ChiTietDonHang::query()->create([
                    'don_hang_id'        => $i,              // ID của đơn hàng
                    'product_variant_id' => rand(0, 20),    // ID biến thể sản phẩm ngẫu nhiên
                    'ten_san_pham'       => 'Sản phẩm ' . $i,
                    'ma_san_pham'        => 'SP' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'anh_san_pham'       => '',
                    'don_gia'            => rand(100, 500) * 1000,  // Giá bán ngẫu nhiên
                    'gia_khuyen_mai'     => rand(80, 400) * 1000,   // Giá khuyến mãi ngẫu nhiên
                    'dung_luong'         => rand(64, 512) . 'GB',   // Dung lượng ngẫu nhiên
                    'mau_sac'            => ['Đỏ', 'Xanh', 'Vàng', 'Đen'][rand(0, 3)], // Màu sắc ngẫu nhiên
                    'so_luong'           => rand(1, 10),            // Số lượng ngẫu nhiên
                ]);
            }
        }








        Schema::enableForeignKeyConstraints();
    }
}
