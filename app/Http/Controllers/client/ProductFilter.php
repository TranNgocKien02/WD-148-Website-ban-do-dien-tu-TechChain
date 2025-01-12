<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\BaseController;
use App\Models\SanPham;
use App\Models\BienTheSanPham;
use App\Models\DanhMuc;
use App\Models\Hang;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;

class ProductFilter extends BaseController
{
    /**
     * Hàm lọc sản phẩm theo nhiều tiêu chí.
     */
    public function filter(Request $request)
    {

        $this->shareCartData(); // Gọi phương thức chia sẻ dữ liệu giỏ hàng
        // Lấy dữ liệu bộ lọc từ request
        $filters = $request->input('filters', []);

        $query = SanPham::query()
        ->distinct()
        ->leftJoin('bien_the_san_pham', 'san_phams.id', '=', 'bien_the_san_pham.san_pham_id')
        ->select('san_phams.*');

        // Lọc theo hãng
        if (!empty($filters['brands'])) {
            $query->whereIn('san_phams.hang_id', $filters['brands']);
        }

        // Lọc theo danh mục
        if (!empty($filters['categories'])) {
            $query->whereIn('san_phams.danh_muc_id', $filters['categories']);
        }

        // Lọc theo màu sắc
        if (!empty($filters['colors'])) {
            $query->whereIn('bien_the_san_pham.mau_sac', $filters['colors']);
        }

        // Lọc theo dung lượng
        if (!empty($filters['capacities'])) {
            $query->whereIn('bien_the_san_pham.dung_luong', $filters['capacities']);
        }
        // Lọc theo khoảng giá
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
        $banners = Banner::query()->where('is_active', true)->get();
        $bannerMain = Banner::query()->where('loai', 'main')->where('is_active', true)->get();
        $bannerSale = Banner::query()->where('loai', 'sale')->where('is_active', true)->take(2)->get();
        $bannerProduct = Banner::query()->where('loai', 'product')->where('is_active', true)->get();
        $bienTheSanPhams = ProductVariant::query()
            ->select('mau_sac', 'dung_luong')
            ->distinct()
            ->get();
        $hang = Hang::query()->get();
        // Trả về view với biến $sanPhamHot (danh sách sản phẩm đã lọc hoặc tất cả sản phẩm nếu không có bộ lọc)
        return view('clients.sanphams.locsanpham', compact('sanPhamHot', 'danhMuc', 'sanPhamMoi', 'sanPhamHotDeal', 'sanPhamTrending', 'banners', 'bannerMain', 'bannerSale', 'bannerProduct', 'bienTheSanPhams', 'hang'));
    }
}
