<?php

namespace App\Http\Controllers\Client;

use App\Models\Cart;
use App\Models\Banner;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentDate = now();

        // Lấy danh mục
        $danhMuc = DanhMuc::query()
            ->where('trang_thai', true)
            ->get();

        // Lấy sản phẩm đang bán và đang active
        $sanPham = SanPham::query()
            ->where('ngay_dang_ban', '<=', $currentDate)
            ->where('is_active', true)
            ->where('so_luong', '>', 0)  
            ->selectRaw('*, 
            CASE 
                WHEN gia_khuyen_mai > 0 THEN ((gia_san_pham - gia_khuyen_mai) / gia_san_pham) * 100 
                ELSE 0 
            END as discount_percentage')
            ->take(10)
            ->get();

        // Sản phẩm mới
        $sanPhamMoi = SanPham::query()
            ->where('ngay_dang_ban', '<=', $currentDate)
            ->where('is_active', true)
            ->where('so_luong', '>', 0)  
            ->orderBy('created_at', 'desc')
            ->selectRaw('*, 
            CASE 
                WHEN gia_khuyen_mai > 0 THEN ((gia_san_pham - gia_khuyen_mai) / gia_san_pham) * 100 
                ELSE 0 
            END as discount_percentage')
            ->take(10)
            ->get();

        // Sản phẩm hot (bán chạy)
        $sanPhamHot = SanPham::query()
            ->where('ngay_dang_ban', '<=', $currentDate)
            ->where('is_active', true)
            ->where('so_luong', '>', 0)  
            ->orderBy('so_luong_da_ban', 'desc')
            ->selectRaw('*, 
            CASE 
                WHEN gia_khuyen_mai > 0 THEN ((gia_san_pham - gia_khuyen_mai) / gia_san_pham) * 100 
                ELSE 0 
            END as discount_percentage')
            ->take(10)
            ->get();

        // Sản phẩm hot deal (giảm giá cao nhất)
        $sanPhamHotDeal = SanPham::query()
            ->where('ngay_dang_ban', '<=', $currentDate)
            ->where('is_active', true)
            ->where('so_luong', '>', 0)  
            ->where('gia_khuyen_mai', '>', 0)
            ->whereColumn('gia_san_pham', '>=', 'gia_khuyen_mai') // Đảm bảo giá khuyến mãi nhỏ hơn giá gốc
            ->selectRaw('*, ((gia_san_pham - gia_khuyen_mai) / gia_san_pham) * 100 as discount_percentage')
            ->orderByDesc('discount_percentage') // Sắp xếp theo % giảm giá giảm dần
            ->take(10)
            ->get();

        // Sản phẩm trending (sắp xếp theo lượt xem)
        $sanPhamTrending = SanPham::query()
            ->where('ngay_dang_ban', '<=', $currentDate)
            ->where('is_active', true)
            ->where('so_luong', '>', 0)  
            ->orderByDesc('luot_xem')
            ->selectRaw('*, 
            CASE 
                WHEN gia_khuyen_mai > 0 THEN ((gia_san_pham - gia_khuyen_mai) / gia_san_pham) * 100 
                ELSE 0 
            END as discount_percentage')
            ->take(10)
            ->get();

        // Banner chính
        $bannerMain = Banner::query()
            ->where('loai', 'main')
            ->where('is_active', true)
            ->where('ngay_bat_dau', '<=', $currentDate)
            ->where('ngay_ket_thuc', '>=', $currentDate)
            ->get();

        // Banner sale
        $bannerSale = Banner::query()
            ->where('loai', 'sale')
            ->where('is_active', true)
            ->where('ngay_bat_dau', '<=', $currentDate)
            ->where('ngay_ket_thuc', '>=', $currentDate)
            ->take(2)
            ->get();

        // Banner sản phẩm
        $bannerProduct = Banner::query()
            ->where('loai', 'product')
            ->where('is_active', true)
            ->where('ngay_bat_dau', '<=', $currentDate)
            ->where('ngay_ket_thuc', '>=', $currentDate)
            ->take(3)
            ->get();

        // Truyền dữ liệu vào view
        return view('clients.home.index', compact(
            'danhMuc',
            'sanPham',
            'sanPhamMoi',
            'sanPhamHot',
            'sanPhamHotDeal',
            'sanPhamTrending',
            'bannerMain',
            'bannerSale',
            'bannerProduct'
        ));
    }

}
