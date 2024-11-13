<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

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
        $sanPhamMoi = SanPham::query()->where('is_new', true)->orderBy('ngay_nhap', 'desc')->take(10)->get();
        $sanPhamHot = SanPham::query()->where('is_hot', true)->take(20)->get();
        $sanPhamHotDeal = SanPham::query()->where('is_hot_deal', true)->take(10)->get();
        $sanPhamTrending = SanPham::query()->orderBy('luot_xem', 'desc')->take(10)->get();
        $banners = Banner::query()->where('is_active', true)->get();
        $bannerMain = Banner::query()->where('loai', 'main')->where('is_active', true)->get();
        $bannerSale = Banner::query()->where('loai', 'sale')->where('is_active', true)->take(2)->get();
        $bannerProduct = Banner::query()->where('loai', 'product')->where('is_active', true)->get();
        // dd($bannerMain);
        return view('clients.home.index', compact('danhMuc', 'sanPham', 'sanPhamMoi', 'sanPhamHot', 'sanPhamHotDeal', 'sanPhamTrending','banners', 'bannerMain', 'bannerSale', 'bannerProduct'));
    }
    
}
