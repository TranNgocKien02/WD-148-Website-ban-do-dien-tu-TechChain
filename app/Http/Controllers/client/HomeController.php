<?php
namespace App\Http\Controllers\Client;

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
        $sanPham = SanPham::query()->take(10)->get();
        $sanPhamMoi = SanPham::query()->take(10)->get();
        $sanPhamHot = SanPham::query()->get();
        $sanPhamHotDeal = SanPham::query()->take(10)->get();
        $sanPhamTrending = SanPham::query()->take(10)->get();
        $banners = Banner::query()->where('is_active', true)->get();
        $bannerMain = Banner::query()->where('loai', 'main')->where('is_active', true)->get();
        $bannerSale = Banner::query()->where('loai', 'sale')->where('is_active', true)->take(2)->get();
        $bannerProduct = Banner::query()->where('loai', 'product')->where('is_active', true)->get();
        // dd($bannerMain->anh);    
        return view('clients.home.index', compact('danhMuc', 'sanPham', 'sanPhamMoi', 'sanPhamHot', 'sanPhamHotDeal', 'sanPhamTrending', 'banners', 'bannerMain', 'bannerSale', 'bannerProduct'));
    }
}
