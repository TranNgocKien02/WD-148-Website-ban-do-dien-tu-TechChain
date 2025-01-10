<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DonHang;
use App\Mail\OrderConfirm;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->shareCartData(); 
        $donHangs = Auth::user()->donHang;

        $trangThaiDonhang = DonHang::TRANG_THAI_DON_HANG;
        $type_cho_xac_nhan = DonHang::CHO_XAC_NHAN;
        $type_dang_van_chuyen = DonHang::DANG_VAN_CHUYEN;

        return view('clients.donhangs.index',compact('donHangs', 'trangThaiDonhang','type_cho_xac_nhan','type_dang_van_chuyen'));
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $this->shareCartData(); 
    $cart = session()->get('cart', []); // Lấy dữ liệu giỏ hàng từ session

    if (!empty($cart)) {
        // Tính tổng tiền và các giá trị liên quan (subTotal, shipping, coupon)
        $subtotal = 0;
        $shipping = 20000; // Phí vận chuyển mặc định
        $coupon = session()->get('coupon', 0); // Kiểm tra coupon có trong session không

        foreach ($cart as $key => $item) {
            // Ưu tiên giá khuyến mãi nếu có, nếu không thì lấy giá gốc
            $giaHienThi =  isset($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] > 0 ? $item['gia_khuyen_mai'] : $item['gia'];
            $subtotal += $giaHienThi * $item['so_luong'];
        }

        // Tính tổng tiền, trừ đi nếu có coupon
        $total = $subtotal + $shipping - $coupon;

        // Lưu lại giá trị subTotal, shipping và coupon vào session
        session()->put('subtotal', $subtotal);
        session()->put('shipping', $shipping);
        session()->put('coupon', $coupon);
        // Trả dữ liệu cho view
        return view('clients.donhangs.create', compact('cart', 'subtotal', 'shipping', 'coupon', 'total'));
    }

    // Nếu giỏ hàng rỗng, chuyển hướng về trang giỏ hàng
    return redirect()->route('cart.list')->with('message', 'Giỏ hàng của bạn đang trống.');
}
public function createFullCart()
{
    $this->shareCartData(); 
    $userId = Auth::id();
    $cart = Cart::with('sanPham')->where('user_id', $userId)->get();

    if (!empty($cart)) {
        // Tính tổng tiền và các giá trị liên quan (subTotal, shipping, coupon)
        $subtotal = 0;
        $shipping = 20000; // Phí vận chuyển mặc định
        $coupon = session()->get('coupon', 0); // Kiểm tra coupon có trong session không

        foreach ($cart as $key => $item) {
            // Ưu tiên giá khuyến mãi nếu có, nếu không thì lấy giá gốc
            $giaHienThi =  isset($item->sanPham->gia_khuyen_mai) && $item->sanPham->gia_khuyen_mai > 0 ? $item->sanPham->gia_khuyen_mai : $item->sanPham->gia_san_pham;
            $subtotal += $giaHienThi * $item->so_luong;
        }

        // Tính tổng tiền, trừ đi nếu có coupon
        $total = $subtotal + $shipping - $coupon;

        // Trả dữ liệu cho view
        return view('clients.donhangs.createfull', compact('cart', 'subtotal', 'shipping', 'coupon', 'total'));
    }

    // Nếu giỏ hàng rỗng, chuyển hướng về trang giỏ hàng
    return redirect()->route('cart.list')->with('message', 'Giỏ hàng của bạn đang trống.');
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->shareCartData(); 

        // Kiểm tra xem yêu cầu có phải là phương thức POST không
        if ($request->isMethod('POST')) {
            // Bắt đầu giao dịch
            DB::beginTransaction();
            try {
                // Lấy tất cả dữ liệu từ request trừ _token
                $param = $request->except('_token');
                
                // Tạo mã đơn hàng duy nhất
                $param['ma_don_hang'] = $this->generateUniqueOrderCode();
    
                // Lấy thông tin khuyến mãi (coupon) từ session
                $tienKhuyenMai = session()->get('coupon', 0);
    
                // Tính tổng tiền (subTotal + shipping - coupon)
                $subTotal = session()->get('subTotal', 0); // Tổng tiền trước khi trừ khuyến mãi
                $shipping = session()->get('shipping', 20000); // Phí vận chuyển (giả sử đã lưu trong session)
                $total = $subTotal + $shipping - $tienKhuyenMai; // Tổng tiền sau khi trừ khuyến mãi
    
                // Thêm thông tin khuyến mãi và tổng tiền vào param
                $param['tien_khuyen_mai'] = $tienKhuyenMai;
                $param['tong_tien'] = $total;
    
                // Lưu thông tin đơn hàng vào cơ sở dữ liệu
                $donHang = DonHang::create($param); // Tạo đơn hàng mới
                $don_hang_id = $donHang->id; // Lấy ID của đơn hàng đã lưu
    
                // Lấy giỏ hàng từ session
                $carts = session()->get('cart', []);
    
                // Lưu chi tiết đơn hàng
                foreach ($carts as $productId => $item) {
                    $thanhTien = $item['gia'] * $item['so_luong']; // Tính thành tiền của mỗi sản phẩm
                    $dung_luong = $item['dung_luong']; // Lấy dung lượng của sản phẩm
                    $mau_sac = $item['mau_sac']; // Lấy dung lượng của sản phẩm
                    // Lưu chi tiết đơn hàng vào bảng chi tiết
                    $donHang->chiTietDonHang()->create([
                        'don_hang_id' => $don_hang_id,
                        'san_pham_id' => $productId,
                        'don_gia' => $item['gia'],
                        'so_luong' => $item['so_luong'],
                        'thanh_tien' => $thanhTien,
                        'dung_luong' => $dung_luong,
                        'mau_sac' => $mau_sac,
                    ]);
                }
    
                // Commit giao dịch nếu không có lỗi
                DB::commit();
    
                // Gửi email xác nhận đơn hàng (bạn có thể bật lại nếu cần thiết)
                // Mail::to($donHang->email_nguoi_nhan)->queue(new OrderConfirm($donHang));
    
                // Xóa giỏ hàng sau khi tạo đơn hàng thành công
                session()->forget('cart');
    
                // Chuyển hướng đến trang chi tiết đơn hàng
                return redirect()->route('donhangs.show', ['id' => $don_hang_id])
                    ->with('success', 'Đơn hàng đã được thêm thành công');
            } catch (\Exception $e) {
                // Rollback nếu có lỗi trong quá trình lưu trữ
                DB::rollBack();
    
                // Quay lại trang giỏ hàng và hiển thị thông báo lỗi
                return redirect()->route('cart.list')->with('error', 'Có lỗi khi tạo đơn hàng. Vui lòng thử lại sau.');
            }
        }
    
        // Nếu không phải là phương thức POST, chuyển hướng về trang giỏ hàng
        return redirect()->route('cart.list')->with('error', 'Có lỗi khi tạo đơn hàng. Vui lòng thử lại sau.');
    }
    



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $this->shareCartData(); 

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
            }else if ($request->has('da_giao_hang')) {
                $donHang->update(['trang_thai_don_hang' => DonHang::DA_GIAO_HANG]);
            }

            DB::commit();
            return redirect()->route('donhangs.index')->with('success','Đơn hàng đã được thêm thành công');
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

    public function generateUniqueOrderCode(){
        do {
            $orderCode = 'ORD-' . Auth::id() . '-' . now()->timestamp;
        } while (DonHang::where('ma_don_hang',$orderCode)->exists());
        return $orderCode;
    }


    
}
