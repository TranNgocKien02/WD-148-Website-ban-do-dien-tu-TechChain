<?php

namespace App\Http\Controllers\client;

use App\Models\SanPham;

use App\Models\DanhMuc;
use App\Models\Hang;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\ProductVariant;

class ProductFilter extends Controller
{
    public function filter(Request $request)
    {

        // Lấy dữ liệu bộ lọc từ request
        $filters = $request->input('filters', []);
        $searchTerm = $request->input('search', '');

        $query = SanPham::query()
            ->leftJoin('bien_the_san_pham', 'san_phams.id', '=', 'bien_the_san_pham.san_pham_id')
            ->select('san_phams.*');
            // ->groupBy('san_phams.id'); // Nhóm các sản phẩm theo id để tránh trùng lặp

        // Tìm kiếm theo tên sản phẩm, tên hãng, và tên danh mục
        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('san_phams.ten_san_pham', 'like', '%' . $searchTerm . '%')
                      ->orWhere('san_phams.ten_san_pham', 'like', '%' . $searchTerm . '%')
                      ->orWhereHas('danhMuc', function($query) use ($searchTerm) {
                          $query->where('ten_danh_muc', 'like', '%' . $searchTerm . '%');
                      })
                      ->orWhereHas('hang', function($query) use ($searchTerm) {
                          $query->where('ten_hang', 'like', '%' . $searchTerm . '%');
                      });
            });
        }
        if ($request->has('categories')) {
            $categoryId = $request->input('categories');
            $query->where('san_phams.danh_muc_id', $categoryId);
        }

        // Lọc theo hãng từ URL
        if ($request->has('brands')) {
            $brandId = $request->input('brands');
            $query->where('san_phams.hang_id', $brandId);
        }
        // Lọc theo danh mục từ URL
        if (!empty($filters['categories'])) {
            $query->whereIn('san_phams.danh_muc_id', $filters['categories']);
        }

        // Lọc theo các tiêu chí khác như hãng, màu sắc, dung lượng, giá, v.v...
        if (!empty($filters['brands'])) {
            $query->whereIn('san_phams.hang_id', $filters['brands']);
        }

        if (!empty($filters['colors'])) {
            $query->whereIn('bien_the_san_pham.mau_sac', $filters['colors']);
        }

        if (!empty($filters['capacities'])) {
            $query->whereIn('bien_the_san_pham.dung_luong', $filters['capacities']);
        }

        if (!empty($filters['min_price']) && !empty($filters['max_price'])) {
            $minPrice = (int) $filters['min_price'];
            $maxPrice = (int) $filters['max_price'];
            $query->whereBetween('san_phams.gia_san_pham', [$minPrice, $maxPrice]);
        } elseif (!empty($filters['min_price'])) {
            $minPrice = (int) $filters['min_price'];
            $query->where('san_phams.gia_san_pham', '>=', $minPrice);
        } elseif (!empty($filters['max_price'])) {
            $maxPrice = (int) $filters['max_price'];
            $query->where('san_phams.gia_san_pham', '<=', $maxPrice);
        }

        // Phân trang (hiển thị 12 sản phẩm mỗi trang)
        $sanPhamHot = $query->distinct()->paginate(12);

        // Các dữ liệu bổ sung
        $danhMuc = DanhMuc::query()->where('trang_thai', true)->get();
        $sanPhamMoi = SanPham::query()->take(10)->get();
        $sanPhamHotDeal = SanPham::query()->take(10)->get();
        $sanPhamTrending = SanPham::query()->take(10)->get();
        $bienTheSanPhams = ProductVariant::query()
            ->select('mau_sac', 'dung_luong')
            ->distinct()
            ->get();
        $hang = Hang::query()->get();

        // Trả về view với biến $sanPhamHot (danh sách sản phẩm đã lọc hoặc tất cả sản phẩm nếu không có bộ lọc)
        return view('clients.sanphams.locsanpham', compact('sanPhamHot', 'danhMuc', 'sanPhamMoi', 'sanPhamHotDeal', 'sanPhamTrending', 'bienTheSanPhams', 'hang'));
    }


}
