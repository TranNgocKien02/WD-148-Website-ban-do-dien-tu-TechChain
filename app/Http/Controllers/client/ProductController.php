<?php

namespace App\Http\Controllers\client;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\BinhLuan;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{
    //
    public function chiTietSanPham(string $slug){
        // Fetch all products
        $product = SanPham::query()->where('slug', $slug)->first();
        $listDanhMuc = DanhMuc::with('sanPhams')->get();
        $collection = SanPham::get();
        $bienThes = ProductVariant::where('san_pham_id', $product->id)->get();
        $binhLuans = BinhLuan::with(['sanPham', 'user'])
        ->where('san_pham_id', $product->id)
        ->get();
        session()->forget('cart'); 
         // Lấy 15 sản phẩm khác cùng danh mục, ngoại trừ sản phẩm hiện tại
        $relatedProducts = SanPham::where('danh_muc_id', $product->danh_muc_id)
            ->where('id', '!=', $product->id)
            ->paginate(15);
        // dd($relatedProducts);
        return view('clients.sanphams.chiTiet', compact('bienThes','product','collection','listDanhMuc','binhLuans','relatedProducts'));
    }
}
