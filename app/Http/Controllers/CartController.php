<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\SanPham;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class CartController extends BaseController
{
    
    public function listCart(Request $request)
    {

        $this->shareCartData(); 
        // Get the cart from the session
        $cart = session()->get('cart', []);
    
        // If the cart is empty, forget the coupon
        if (empty($cart)) {
            session()->forget('coupon');
            // Xóa 2 mảng khỏi session
            // session()->forget($cart);
        }
    
        $total = 0;
        $subTotal = 0;
        $coupon = session()->get('coupon', 0); // Get the coupon value
    
        // Calculate subtotal
        foreach ($cart as $item) {
            // Use the promotional price if it exists, otherwise use the regular price
            $price = isset($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] > 0 ? $item['gia_khuyen_mai'] : $item['gia'];
            $subTotal += $price * $item['so_luong'];
        }
        // dd($cart);
        // Set shipping cost
        $shipping = 20000;
    
        // Calculate the total price
        $total = $subTotal + $shipping - $coupon;
    
        // Return the view with all necessary variables
        return view('clients.sanphams.giohang', compact('cart', 'total', 'shipping', 'subTotal', 'coupon'));
    }
    public function listFullCart(Request $request)
    {

        $this->shareCartData(); 
        $userId = Auth::id();
        // Get the cart from the session
        $cart = Cart::with('sanPham')->where('user_id', $userId)->get();
    
        // If the cart is empty, forget the coupon
        // if (empty($cart)) {
        //     session()->forget('coupon');
        //     // Xóa 2 mảng khỏi session
        //     // session()->forget($cart);
        // }
    
        $total = 0;
        $subtotal = 0;
        $coupon = session()->get('coupon', 0); // Get the coupon value
    
        // Calculate subtotal
        foreach ($cart as $item) {
            // Use the promotional price if it exists, otherwise use the regular price
            $price = isset($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] > 0 ? $item['gia_khuyen_mai'] : $item['gia'];
            $subtotal += $price * $item['so_luong'];
        }
        // Set shipping cost
        $shipping = 20000;
    
        // Calculate the total price
        $total = $subtotal + $shipping - $coupon;
    
        // Return the view with all necessary variables
        return view('clients.carts.giohang', compact('cart', 'total', 'shipping', 'subtotal', 'coupon'));
    }
    public function addCart(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('alert', 'Vui lòng đăng nhập để mua sản phẩm vào giỏ hàng.');
    }
    $this->shareCartData(); 

    $productId = $request->input('product_id');
    $so_luong = $request->input('so_luong_value');
    $dung_luong = $request->input('dung_luong_value');
    $mau_sac = $request->input('mau_sac_value');
    // dd($productId,$so_luong,$dung_luong,$mau_sac);
    // Lấy sản phẩm từ database
    $sanPham = SanPham::findOrFail($productId);
    
    // Lấy giỏ hàng hiện tại từ session
    $cart = session()->get('cart', []);

    // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ, tăng số lượng
    // if (isset($cart[$productId])) {
    //     $cart[$productId]['so_luong'] += $quantity;
    // } else {
        // Nếu sản phẩm chưa có trong giỏ, thêm mới
        $cart[$productId] = [
            'ten_san_pham' => $sanPham->ten_san_pham,
            'so_luong' => $so_luong,
            'gia' => $sanPham->gia_san_pham, // Sử dụng 'gia' thay vì 'gia_goc'
            'gia_khuyen_mai' => $sanPham->gia_khuyen_mai ?? 0, // Giá khuyến mãi (nếu có)
            'hinh_anh' => $sanPham->hinh_anh,
            'dung_luong' => $dung_luong,
            'mau_sac' => $mau_sac,
        ];
    // }
    
    // Cập nhật lại giỏ hàng vào session
    session()->put('cart', $cart);
    return redirect()->route('cart.list');
    
    // return view('clients.sanphams.giohang', compact('cart', 'total', 'shipping', 'subTotal', 'coupon'));
}



    
    public function updateCart(Request $request){
    $this->shareCartData(); 

        $cartNew = $request->input('cart',[]);

        session()->put('cart', $cartNew);
        return redirect()->back();
    
    }
    public function destroy(Cart $cart)
    {
        // $product->delete();
        try {
            DB::beginTransaction();
            $cart->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            dd($exception);
            return back()->with('message', 'Lỗi');
        }
        return back()->with('message', 'Xóa thành công');
    }

    public function applyCoupon(Request $request) {
        // Giả sử bạn có giỏ hàng trong session
        $cart = session()->get('cart', []); // Lấy giỏ hàng từ session
    
        // Kiểm tra nếu giỏ hàng trống
        if (empty($cart)) {
            return redirect()->back()->withErrors(['error' => 'Giỏ hàng trống!']);
        }
    
        // Lấy mã giảm giá từ request
        $coupon_code = $request->input('coupon_code');
    
        // Kiểm tra xem mã giảm giá có tồn tại trong cơ sở dữ liệu không
        $coupon = Coupon::where('name', $coupon_code)
                        ->where('expiration_date', '>=', now()) // Kiểm tra ngày hết hạn
                        ->first();
    
        // Nếu không có mã giảm giá hợp lệ
        if (!$coupon) {
            return redirect()->back()->withErrors(['error' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn!']);
        }
    
        // Tính subtotal (tổng giá trị của giỏ hàng)
        $subTotal = array_sum(array_map(function ($item) {
            return $item['so_luong'] * ($item['gia_khuyen_mai'] ?? $item['gia']);
        }, $cart));
    
        // Áp dụng giảm giá từ coupon
        $couponValue = 0;
        if ($coupon->type == 'fixed') {
            $couponValue = $coupon->value; // Giảm giá cố định
        } elseif ($coupon->type == 'percentage') {
            $couponValue = ($subTotal * $coupon->value) / 100; // Giảm giá theo tỷ lệ phần trăm
        }
    
        // Tính tổng tiền sau khi áp dụng giảm giá
        $total = $subTotal - $couponValue;
    
        // Giả sử phí vận chuyển cố định
        $shipping = 20;
    
        // Tính tổng tiền cuối cùng sau khi cộng phí vận chuyển
        $total += $shipping;
    
        // Lưu các giá trị vào session
        session()->put('subTotal', $subTotal);
        session()->put('coupon', $couponValue);
        session()->put('total', $total);
        session()->put('shipping', $shipping);
        // dd(session()->all());
        // Trả về hoặc chuyển hướng với thông báo
        return redirect()->back()->with('success', 'Mã giảm giá đã được áp dụng!');
    }
    public function storeCart(Request $request)
    {
    $this->shareCartData(); 
       
        if ($request->isMethod('POST')) {
            if (!auth()->check()) {
                return redirect()->route('login')->with('alert', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
            }
            $param = $request->except('_token');
            Cart::create($param);
            return redirect()->back()->with('alert', 'Thêm vào giỏ hàng thành công!');
        }
    }
}

    
    
