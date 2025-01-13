<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->shareCartData();
    }

    protected function shareCartData()
    {
        $cartItemCount = 0;
        $subTotal = 0;
        $shipping = 0;
        $total = 0;

        if (Auth::check()) {
            $userId = Auth::id();
            $cart = Cart::with('sanPham')->where('user_id', $userId)->get();
            $cartToDisplay = $cart->take(2);
            $cartItemCount = $cart->count();

            foreach ($cart as $item) {
                $price = isset($item->sanPham->gia_khuyen_mai) && $item->sanPham->gia_khuyen_mai > 0
                    ? $item->sanPham->gia_khuyen_mai
                    : $item->sanPham->gia_san_pham;

                $subTotal += $price * $item->so_luong;
            }

            $shipping = 20000; // Shipping cost
            $total = $subTotal + $shipping;
        }else {
            // Nếu không có người dùng đăng nhập, không hiển thị dữ liệu
            $cart = collect(); // Trả về một collection rỗng
            $cartItemCount = 0;
            $shipping = 0; // Nếu không có người dùng đăng nhập, số lượng = 0
        }

        // Chia sẻ dữ liệu với tất cả view
        view()->share([
            'cartItemCount' => $cartItemCount,
            'cartToDisplay' => $cartToDisplay ?? collect(),
            'subTotal' => $subTotal,
            'shipping' => $shipping,
            'total' => $total,
        ]);
    }
}
