<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DanhMuc;
use App\Models\Hang;
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
                'mo_ta_ngan' => fake()->sentence(),
                'noi_dung' => fake()->paragraph(),
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






        Schema::enableForeignKeyConstraints();
    }
}
