<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\BaseController;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\BinhLuan;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
class ProductController extends BaseController
{
    //
    public function chiTietSanPham(string $id){
        // Fetch all products
        $this->shareCartData(); // Gọi phương thức chia sẻ dữ liệu giỏ hàng
        $product = SanPham::findOrFail($id);
        $listDanhMuc = DanhMuc::with('sanPhams')->get();
        $collection = SanPham::get();
        $bienThes = ProductVariant::where('san_pham_id', $id)->get();
        $binhLuans = BinhLuan::with(['sanPham', 'user'])
        ->where('san_pham_id', $id)
        ->get();

         // Lấy 15 sản phẩm khác cùng danh mục, ngoại trừ sản phẩm hiện tại
        $relatedProducts = SanPham::where('danh_muc_id', $product->danh_muc_id)
            ->where('id', '!=', $product->id)
            ->paginate(15);
        // dd($relatedProducts);
        return view('clients.sanphams.chitiet', compact('bienThes','product','collection','listDanhMuc','binhLuans','relatedProducts'));
    }
}
