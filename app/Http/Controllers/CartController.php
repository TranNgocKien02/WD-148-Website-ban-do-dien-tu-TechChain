<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\SanPham;
use App\Models\KhuyenMai;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class CartController extends Controller
{

    public function listCart(Request $request)
    {


        $cart = session()->get('cart', []);

        if (empty($cart)) {
            session()->forget('coupon');
        }

        $toTal = 0;
        $subTotal = 0;
        $coupon = session()->get('coupon', 0); 

        foreach ($cart as $item) {
            $price = isset($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] > 0 ? $item['gia_khuyen_mai'] : $item['gia'];
            $subTotal += $price * $item['so_luong'];
        }

        

        $shipping = 20000;

        $toTal = $subTotal + $shipping - $coupon;

        return view('clients.sanphams.giohang', compact('cart', 'toTal', 'shipping', 'subTotal', 'coupon'));
    }

    public function listFullCart(Request $request)
    {

        $userId = Auth::id();
        $cart = Cart::query()->where('user_id', $userId)->get();
        
        $tongPhu = 0;
        $subtotal = 0;
        $coupon = session()->get('coupon', 0);

        foreach ($cart as $item) {
            $price =
                isset($item->productVariant->sanpham->gia_khuyen_mai) &&
                $item->productVariant->sanpham->gia_khuyen_mai > 0
                ? $item->productVariant->sanpham->gia_khuyen_mai
                : $item->productVariant->sanpham->gia_san_pham;
            $tongPhu += $price * $item->so_luong;
        }

        $shipping = 20000;

        $total = $subtotal + $shipping - $coupon;
        return view('clients.carts.giohang', compact('cart', 'total', 'shipping', 'subtotal', 'coupon', 'tongPhu'));
    }

    
    public function addCart(Request $request)
    {


        $productId = $request->input('product_id');
        $so_luong = $request->input('so_luong_value');
        $dung_luong = $request->input('dung_luong_value');
        $mau_sac = $request->input('mau_sac_value');


        $productVariant = ProductVariant::query()->where('san_pham_id', $productId)->where('dung_luong', $dung_luong)->where('mau_sac', $mau_sac)->first();

        $sanPham = SanPham::findOrFail($productId);

        $cart = session()->get('cart', []);


        $cart[$productId] = [
            'productVariant' => $productVariant->id,
            'ten_san_pham' => $sanPham->ten_san_pham,
            'ma_san_pham' => $sanPham->ma_san_pham,
            'so_luong' => $so_luong,
            'gia' => $sanPham->gia_san_pham, 
            'gia_khuyen_mai' => $sanPham->gia_khuyen_mai ?? 0, // Giá khuyến mãi (nếu có)
            'hinh_anh' => $sanPham->hinh_anh,
            'dung_luong' => $dung_luong,
            'mau_sac' => $mau_sac,
        ];

        // dd($cart);




        session()->put('cart', $cart);
        return redirect()->route('cart.list');

    }


    public function updateCartBuy(Request $request)
    {
        $cartNew = $request->input('cart', []);

        session()->put('cart', $cartNew);
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $soLuongs = $request->input('so_luong');

        foreach ($soLuongs as $cartId => $soLuong) {
            $cartItem = Cart::find($cartId);
            if ($cartItem) {
                $cartItem->so_luong = $soLuong;
                $cartItem->save();
            }
        }

        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công!');
    }


    public function destroy(Cart $cart)
    {
        try {
            DB::beginTransaction();
            $cart->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            dd($exception);
            return back()->with('error', 'Lỗi');
        }
        return back()->with('success', 'Xóa thành công');
    }

    public function applyCoupon(Request $request)
    {
        $userId = Auth::id();
        $sessionCart = session()->get('cart', []);

        // Lấy giỏ hàng từ CSDL nếu người dùng đã đăng nhập
        $cartItems = Cart::where('user_id', $userId)->with('productVariant.sanpham')->get();

        // Nếu cả giỏ hàng trong CSDL và session đều trống, trả về lỗi
        if ($cartItems->isEmpty() && empty($sessionCart)) {
            return redirect()->back()->withErrors(['error' => 'Giỏ hàng trống!']);
        }

        $couponCode = $request->input('coupon_code');

        // Kiểm tra mã giảm giá
        $coupon = Coupon::where('name', $couponCode)
            ->where('expiration_date', '>=', now()) // Chỉ lấy mã giảm giá còn hiệu lực
            ->first();
        if (!$coupon) {
            return redirect()->back()->withErrors(['error' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn!']);
        }

        // Tính tổng tiền hàng (subtotal)
        if (!empty($sessionCart)) {
            // Nếu có giỏ hàng trong session, tính tổng từ session
            $subTotal = collect($sessionCart)->sum(function ($item) {
                $price = ($item['gia_khuyen_mai'] > 0) ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                return $price * $item['so_luong'];
            });
        } else {
            // Nếu không có giỏ hàng trong session, tính tổng từ CSDL
            $subTotal = $cartItems->sum(function ($item) {
                $price = ($item->productVariant->sanpham->gia_khuyen_mai > 0)
                    ? $item->productVariant->sanpham->gia_khuyen_mai
                    : $item->productVariant->sanpham->gia_san_pham;
                return $price * $item->so_luong;
            });
        }

        // Tính giá trị mã giảm giá
        $couponValue = 0;
        if ($coupon->type === 'fixed') {
            $couponValue = $coupon->value;
        } elseif ($coupon->type === 'percentage') {
            $couponValue = ($subTotal * $coupon->value) / 100;
        }

        $total = max(0, $subTotal - $couponValue);

        $shipping = 20000; // 20,000 VND phí vận chuyển
        $total += $shipping;

        // Lưu dữ liệu vào session
        session()->put('subTotal', $subTotal);
        session()->put('coupon', $couponValue);
        session()->put('total', $total);
        session()->put('shipping', $shipping);

        return redirect()->back()->with('success', 'Mã giảm giá đã được áp dụng!');
    }


    public function removeCoupon(Request $request)
    {
        // Xóa mã giảm giá và các giá trị liên quan khỏi session
        session()->forget('coupon');
        session()->forget('total');
        session()->forget('subTotal');
        session()->forget('shipping');

        // Quay lại trang giỏ hàng với thông báo xóa mã giảm giá thành công
        return redirect()->back()->with('success', 'Đã xóa mã giảm giá!');
    }



    public function storeCart(Request $request)
    {
        // dd($request->all());
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            $productId = $param['san_pham_id'];
            $dungLuong = $param['dung_luong'];
            $mauSac = $param['mau_sac'];
            $soLuong = $param['so_luong'];

            $variant = ProductVariant::where('san_pham_id', $productId)
                ->where('dung_luong', $dungLuong)
                ->where('mau_sac', $mauSac)
                ->first();
            // dd($variant);    
            if (!$variant) {
                return redirect()->back()->with('error', 'Không tìm thấy biến thể sản phẩm.');
            }

            if ($soLuong > $variant->so_luong) {
                return redirect()->back()->with('error', 'Số lượng yêu cầu vượt quá số lượng tồn kho.');
            }


            $data = [
                'user_id' => $param['user_id'],
                'product_variant_id' => $variant->id,
                'so_luong' => $soLuong,
                'mau_sac' => $mauSac,
                'dung_luong' => $dungLuong,
            ];

            // dd($data['product_variant_id']);


            $cartItem = Cart::query()->where('product_variant_id', $variant->id)
                ->where('user_id', auth()->id())
                ->first();

            try {
                DB::beginTransaction();

                if (empty($cartItem)) {
                    Cart::create($data);
                } else {
                    $data['so_luong'] += $cartItem->so_luong;
                    $cartItem->update(['so_luong' => $data['so_luong']]);
                }

                DB::commit();
                return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
            } catch (\Exception $exception) {
                DB::rollBack();
                dd($exception);
                return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng!');
            }
        }
    }

}
