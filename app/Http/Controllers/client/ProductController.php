<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function chiTietSanPham(string $id){
        // Fetch all products
        $products = SanPham::findOrFail($id);
        $collection = SanPham::get();
        return view('clients.sanphams.chitiet', compact('products','collection'));
    }
}
