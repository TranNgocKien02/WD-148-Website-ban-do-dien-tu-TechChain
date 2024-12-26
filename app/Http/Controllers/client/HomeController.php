<?php

namespace App\Http\Controllers\client;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy tất cả danh mục cùng với sản phẩm của từng danh mục
        $listDanhMuc = DanhMuc::with('sanPhams')->get();
        // dd($listDanhMuc);
        $sanPhamMois = Sanpham::where('created_at', '>=', now()->subDays(30))
        ->orderBy('created_at', 'desc')
        ->get();

        // $sanPhamBanChays = Sanpham::select('san_phams.*', DB::raw('SUM(chi_tiet_don_hangs.so_luong) as tong_so_luong'))
        // ->join('chi_tiet_don_hangs', 'san_phams.id', '=', 'chi_tiet_don_hangs.san_pham_id')
        // ->groupBy('san_phams.id')
        // ->orderByDesc('tong_so_luong')
        // ->take(10) // Lấy top 10 sản phẩm bán chạy nhất
        // ->get();

        // $banners = Banner::query()->where('is_active', true)->get();
        // $bannerMain = Banner::query()->where('loai', 'main')->where('is_active', true)->get();
        // $bannerSale = Banner::query()->where('loai', 'sale')->where('is_active', true)->take(2)->get();
        // $bannerProduct = Banner::query()->where('loai', 'product')->where('is_active', true)->get();
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
    }
}
