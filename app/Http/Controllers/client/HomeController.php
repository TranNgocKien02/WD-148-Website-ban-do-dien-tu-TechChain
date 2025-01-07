<?php

namespace App\Http\Controllers\Client;

<<<<<<< HEAD
use App\Models\Banner;
=======
>>>>>>> fc5807a59d65c29f01def7a0693c838480361fc6
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
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
<<<<<<< HEAD

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
        return view('clients.home.index', compact('danhMuc', 'sanPham', 'sanPhamMoi', 'sanPhamHot', 'sanPhamHotDeal', 'sanPhamTrending', 'banners', 'bannerMain', 'bannerSale', 'bannerProduct'));
=======
        // Lấy tất cả danh mục cùng với sản phẩm của từng danh mục
        $listDanhMuc = DanhMuc::with('sanPhams')->get();
        $sanPhamMois = Sanpham::where('created_at', '>=', now()->subDays(30))
        ->orderBy('created_at', 'desc')
        ->get();

        // $sanPhamBanChays = Sanpham::select('san_phams.*', DB::raw('SUM(chi_tiet_don_hangs.so_luong) as tong_so_luong'))
        // ->join('chi_tiet_don_hangs', 'san_phams.id', '=', 'chi_tiet_don_hangs.san_pham_id')
        // ->groupBy('san_phams.id')
        // ->orderByDesc('tong_so_luong')
        // ->take(10) // Lấy top 10 sản phẩm bán chạy nhất
        // ->get();
        $sanPhamBanChays = Sanpham::select('san_phams.id', 'san_phams.ten_san_pham', 'san_phams.gia_san_pham', DB::raw('SUM(chi_tiet_don_hangs.so_luong) as tong_so_luong'))
        ->join('chi_tiet_don_hangs', 'san_phams.id', '=', 'chi_tiet_don_hangs.san_pham_id')
        ->groupBy('san_phams.id', 'san_phams.ten_san_pham', 'san_phams.gia_san_pham')
        ->orderByDesc('tong_so_luong')
        ->take(10)
        ->get();

        $sanPhamNoiBats = Sanpham::orderBy('luot_xem', 'desc')->take(10)->get();

        // dd($sanPhamNoiBats);
        return view('clients.home.index', compact('listDanhMuc','sanPhamMois','sanPhamBanChays','sanPhamNoiBats'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
>>>>>>> fc5807a59d65c29f01def7a0693c838480361fc6
    }
}
