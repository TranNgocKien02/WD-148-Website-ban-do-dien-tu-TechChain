<?php

namespace App\Http\Controllers\client;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function chiTietSanPham(string $id){
        // Fetch all products
        $product = SanPham::findOrFail($id);
        $listDanhMuc = DanhMuc::with('sanPhams')->get();
        $collection = SanPham::get();
        return view('clients.sanphams.chitiet', compact('product','collection','listDanhMuc'));
    }
}
