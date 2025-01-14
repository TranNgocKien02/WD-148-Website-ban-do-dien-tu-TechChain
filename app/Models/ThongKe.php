<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongKe extends Model
{
    use HasFactory;
    public function tongDonHang()
    {
        return DonHang::count();
    }

    public function tongSanPham()
    {
        return SanPham::count();
    }

    public function donHangDaGiao()
    {
        return DonHang::where('trang_thai_don_hang', DonHang::DA_GIAO_HANG)->count();
    }

    public function donHangDaHuy()
    {
        return DonHang::where('trang_thai_don_hang', DonHang::HUY_DON_HANG)->count();
    }

    public function doanhThu()
    {
        return DonHang::sum('tong_tien');
    }
    public function doanhThuHangThang()
    {
        return DonHang::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, SUM(tong_tien) as total_revenue')
            ->groupBy('month', 'year')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
    }
}
