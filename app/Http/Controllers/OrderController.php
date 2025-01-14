<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DonHang;
use App\Mail\OrderConfirm;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donHangs = Auth::user()->donHang;

        $trangThaiDonhang = DonHang::TRANG_THAI_DON_HANG;
        $type_cho_xac_nhan = DonHang::CHO_XAC_NHAN;
        $type_dang_van_chuyen = DonHang::DANG_VAN_CHUYEN;

        return view('clients.donhangs.index', compact('donHangs', 'trangThaiDonhang', 'type_cho_xac_nhan', 'type_dang_van_chuyen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $cart = session()->get('cart', []); 

        if (!empty($cart)) {
            $subTotal = 0;
            $shipping = 20000; // Phí vận chuyển mặc định
            $coupon = session()->get('coupon', 0); // Kiểm tra coupon có trong session không

            foreach ($cart as $key => $item) {
                // Ưu tiên giá khuyến mãi nếu có, nếu không thì lấy giá gốc
                $giaHienThi =  isset($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] > 0 ? $item['gia_khuyen_mai'] : $item['gia'];
                $subTotal += $giaHienThi * $item['so_luong'];
            }

            // Tính tổng tiền, trừ đi nếu có coupon
            $toTal = $subTotal + $shipping - $coupon;

            // Lưu lại giá trị subTotal, shipping và coupon vào session
            session()->put('subtotal', $subTotal);
            session()->put('shipping', $shipping);
            session()->put('coupon', $coupon);
            // Trả dữ liệu cho view
            return view('clients.donhangs.create', compact('cart', 'subTotal', 'shipping', 'coupon', 'toTal'));
        }

        // Nếu giỏ hàng rỗng, chuyển hướng về trang giỏ hàng
        return redirect()->route('cart.list')->with('message', 'Giỏ hàng của bạn đang trống.');
    }
    public function createFullCart()
    {
        $userId = Auth::id();
        $cart = Cart::query()->where('user_id', $userId)->get();

        if (!empty($cart)) {
            // Tính tổng tiền và các giá trị liên quan (subTotal, shipping, coupon)
            $subtotal = 0;
            $tongPhu = 0;
            $shipping = 20000; // Phí vận chuyển mặc định
            $coupon = session()->get('coupon', 0); // Kiểm tra coupon có trong session không

            foreach ($cart as $item) {
                $price =
                    isset($item->productVariant->sanpham->gia_khuyen_mai) &&
                    $item->productVariant->sanpham->gia_khuyen_mai > 0
                    ? $item->productVariant->sanpham->gia_khuyen_mai
                    : $item->productVariant->sanpham->gia_san_pham;
                $tongPhu += $price * $item->so_luong;
            }

            // Tính tổng tiền, trừ đi nếu có coupon
            $total = $subtotal + $shipping - $coupon;

            // Trả dữ liệu cho view
            return view('clients.donhangs.createfull', compact('cart', 'subtotal', 'shipping', 'coupon', 'total', 'tongPhu'));
        }

        // Nếu giỏ hàng rỗng, chuyển hướng về trang giỏ hàng
        return redirect()->route('cart.list')->with('message', 'Giỏ hàng của bạn đang trống.');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_nguoi_nhan' => 'required|string|max:255',
            'email_nguoi_nhan' => 'required|email|max:255',
            'so_dien_thoai_nguoi_nhan' => 'required|numeric|digits_between:10,15', // Kiểm tra số điện thoại
            'dia_chi_nguoi_nhan' => 'required|string|max:255',
            'ghi_chu' => 'nullable|string|max:255', // Ghi chú có thể để trống
        ], [
            'ten_nguoi_nhan.required' => 'Tên người nhận không được bỏ trống.',
            'ten_nguoi_nhan.string' => 'Tên người nhận phải là một chuỗi ký tự.',
            'ten_nguoi_nhan.max' => 'Tên người nhận không được vượt quá 255 ký tự.',

            'email_nguoi_nhan.required' => 'Email không được bỏ trống.',
            'email_nguoi_nhan.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email_nguoi_nhan.max' => 'Email không được vượt quá 255 ký tự.',

            'so_dien_thoai_nguoi_nhan.required' => 'Số điện thoại không được bỏ trống.',
            'so_dien_thoai_nguoi_nhan.numeric' => 'Số điện thoại phải là một số.',
            'so_dien_thoai_nguoi_nhan.digits_between' => 'Số điện thoại phải có từ 10 đến 15 chữ số.',

            'dia_chi_nguoi_nhan.required' => 'Địa chỉ không được bỏ trống.',
            'dia_chi_nguoi_nhan.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'dia_chi_nguoi_nhan.max' => 'Địa chỉ không được vượt quá 255 ký tự.',

            'ghi_chu.string' => 'Ghi chú phải là một chuỗi ký tự.',
            'ghi_chu.max' => 'Ghi chú không được vượt quá 255 ký tự.',
        ]);

        if ($request->isMethod('POST')) {
            DB::beginTransaction();
            try {
                $param = $request->except('_token');

                $param['ma_don_hang'] = $this->generateUniqueOrderCode();

             
                $donHang = DonHang::create($param); 
                $don_hang_id = $donHang->id; 

                $carts = session()->get('cart', []);
                
                if (empty($carts)) {
                    $carts = Cart::where('user_id', Auth::id())->get();
                    foreach ($carts as $item) {
                        $data = [
                            'don_hang_id' => $don_hang_id,
                            'product_variant_id' => $item->product_variant_id, 
                            'ten_san_pham' => $item->productVariant->sanpham->ten_san_pham, 
                            'ma_san_pham' => $item->productVariant->sanpham->ma_san_pham, 
                            'anh_san_pham' => $item->productVariant->sanpham->hinh_anh, 
                            'don_gia' => $item->productVariant->sanpham->gia_san_pham, 
                            'gia_khuyen_mai' => $item->productVariant->sanpham->gia_khuyen_mai ?? 0,
                            'dung_luong' => $item->dung_luong, 
                            'mau_sac' => $item->mau_sac, 
                            'so_luong' => $item->so_luong, 
                        ];
                        ChiTietDonHang::query()->create($data);
                        Cart::query()->where([
                            'cart.user_id' => Auth::id(),
                            'cart.product_variant_id' => $item->product_variant_id
                        ])->delete();
                    }
                }else{
                    foreach ($carts as $item) {
                        $data = [
                            'don_hang_id' => $don_hang_id,
                            'product_variant_id' => $item['productVariant'],
                            'ten_san_pham' => $item['ten_san_pham'],
                            'ma_san_pham' => $item['ma_san_pham'],
                            'anh_san_pham' => $item['hinh_anh'],
                            'don_gia' =>  $item['gia'],
                            'gia_khuyen_mai' => $item['gia_khuyen_mai'] ?? 0,
                            'dung_luong' => $item['dung_luong'],
                            'mau_sac' => $item['mau_sac'],
                            'so_luong' => $item['so_luong'],
                        ];
                        ChiTietDonHang::query()->create($data);
                        session()->forget('cart'); 
                    } 
                }
                DB::commit();

                

                return redirect()->route('donhangs.show', ['id' => $don_hang_id])
                    ->with('success', 'Đơn hàng đã được thêm thành công');
            } catch (\Exception $e) {
                DB::rollBack();

                dd($e);
                return redirect()->route('cart.list')->with('error', 'Có lỗi khi tạo đơn hàng. Vui lòng thử lại sau.');
            }
        }

        return redirect()->route('cart.list')->with('error', 'Có lỗi khi tạo đơn hàng. Vui lòng thử lại sau.');
    }






    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonhang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;

        return view('clients.donhangs.show', compact('donHang', 'trangThaiDonhang', 'trangThaiThanhToan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->shareCartData();

        $donHang = DonHang::query()->findOrFail($id);
        DB::beginTransaction();

        try {
            if ($request->has('huy_don_hang')) {
                $donHang->update(['trang_thai_don_hang' => DonHang::HUY_DON_HANG]);
            } else if ($request->has('da_giao_hang')) {
                $donHang->update(['trang_thai_don_hang' => DonHang::DA_GIAO_HANG]);
            }

            DB::commit();
            return redirect()->route('donhangs.index')->with('success', 'Đơn hàng đã được thêm thành công');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateUniqueOrderCode()
    {
        do {
            $orderCode = 'ORD-' . Auth::id() . '-' . now()->timestamp;
        } while (DonHang::where('ma_don_hang', $orderCode)->exists());
        return $orderCode;
    }
}
