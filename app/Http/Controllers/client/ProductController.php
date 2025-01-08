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
    public function chiTietSanPham(string $id){
        // Fetch all products
        $product = SanPham::findOrFail($id);
        $listDanhMuc = DanhMuc::with('sanPhams')->get();
        $collection = SanPham::get();
        $bienThes = ProductVariant::where('san_pham_id', $id)->get();
        $binhLuans = BinhLuan::with(['sanPham', 'user'])->get();
        // dd($bienThes);
        return view('clients.sanphams.chitiet', compact('bienThes','product','collection','listDanhMuc','binhLuans'));
    }
}
