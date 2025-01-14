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
        $danhMuc = DanhMuc::query()->where('trang_thai', true)->get();
        $sanPham = SanPham::query()->where('ngay_dang_ban', '<=', now())->take(10)->get();
        $sanPhamMoi = SanPham::query()->where('ngay_dang_ban', '<=', now()) ->orderBy('created_at', 'desc') ->take(10)->get();
        $sanPhamHot = SanPham::query()->get();
        $sanPhamHotDeal = SanPham::query()->take(10)->get();
        $sanPhamTrending = SanPham::query()->take(10)->get();
        // $banners = Banner::query()->where('is_active', true)->get();
        $currentDate = now(); // Lấy ngày giờ hiện tại

        $bannerMain = Banner::query()
        ->where('loai', 'main')
        ->where('is_active', true)
        ->where('ngay_bat_dau', '<=', $currentDate) // Kiểm tra ngày đăng phải trước hoặc bằng hiện tại
        ->where('ngay_ket_thuc', '>=', $currentDate) // Kiểm tra ngày kết thúc phải sau hoặc bằng hiện tại
        ->get();

        $bannerSale = Banner::query()
        ->where('loai', 'sale')
        ->where('is_active', true)
        ->where('ngay_bat_dau', '<=', $currentDate) // Kiểm tra ngày đăng phải trước hoặc bằng hiện tại
        ->where('ngay_ket_thuc', '>=', $currentDate) // Kiểm tra ngày kết thúc phải sau hoặc bằng hiện tại
        ->take(2)
        ->get();

        $bannerProduct = Banner::query()
        ->where('loai', 'product')
        ->where('is_active', true)
        ->where('ngay_bat_dau', '<=', $currentDate) // Kiểm tra ngày đăng phải trước hoặc bằng hiện tại
        ->where('ngay_ket_thuc', '>=', $currentDate)->take(3) // Kiểm tra ngày kết thúc phải sau hoặc bằng hiện tại
        ->get();

        // dd($bannerMain->anh);  
        
        //  dd($subTotal);
        return view('clients.home.index', compact('danhMuc', 'sanPham', 'sanPhamMoi', 'sanPhamHot', 'sanPhamHotDeal',
         'sanPhamTrending', 'bannerMain',
         'bannerSale', 'bannerProduct'));
    }
}
