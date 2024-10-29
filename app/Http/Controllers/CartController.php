<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function listCart(Request $request){
        // Fetch all products
        $cart =  session()->get('cart');
        $total = 0 ;
        $subTotal = 0 ;
        if (!is_array($cart)) {
            $cart = [];
        }
        foreach($cart as $item){
            $subTotal += $item['gia'] * $item['so_luong'];
        }
        $shipping = 20 ;
        $total = $subTotal + $shipping;

        return view('clients.giohang',compact('cart', 'total', 'shipping', 'subTotal'));
    }
    public function addCart(Request $request) {
        // Fetch all products
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $sanPham = SanPham::query()->findOrFail($productId);
        $cart = session()->get('cart', []);
    
        if (isset($cart[$productId])) {
            // Check if 'so_luong' key exists and is set
            if (isset($cart[$productId]['so_luong'])) {
                $cart[$productId]['so_luong'] += $quantity;
            } else {
                $cart[$productId]['so_luong'] = $quantity;
            }
        } else {
            $cart[$productId] = [
                'ten_san_pham' => $sanPham->ten_san_pham,
                'so_luong' => $quantity,
                'gia' => isset($sanPham->gia_khuyen_mai) ? $sanPham->gia_khuyen_mai : $sanPham->gia_san_pham,
                'hinh_anh' => $sanPham->hinh_anh,
            ];
        }
    
        session()->put('cart', $cart);
    
        return redirect()->back(); // Adjust this according to your route
    }
    
    public function updateCart(Request $request){
        $cartNew = $request->input('cart',[]);

        session()->put('cart', $cartNew);
        return redirect()->back();
    
    }
}
