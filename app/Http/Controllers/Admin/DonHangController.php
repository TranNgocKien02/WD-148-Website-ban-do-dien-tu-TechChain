<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $title = "Danh mục đơn hàng";
    //     $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
    //     $type_huy_don_hang = DonHang::HUY_DON_HANG;
    //     $listDonHang = DonHang::query()->orderByDesc('id')->get();
    //     return view('admins.donhangs.index',compact('title','listDonHang','trangThaiDonHang','type_huy_don_hang'));
    // }
    public function index()
{
    $title = "Danh mục đơn hàng";
    $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
    $type_huy_don_hang = DonHang::HUY_DON_HANG;
    $listDonHang = DonHang::query()->orderByDesc('id')->get();

    // Tính subTotal (tổng phụ của tất cả đơn hàng)
    $subTotal = $listDonHang->sum('tong_tien');

    // Giả sử phí vận chuyển
    $shipping = 50000; 

    // Tính tổng toàn bộ
    $total = $subTotal + $shipping;

    return view('admins.donhangs.index', compact('title', 'listDonHang', 'trangThaiDonHang', 'type_huy_don_hang', 'subTotal', 'shipping', 'total'));
}


    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Thông tin chi tiết đơn hàng";
        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;

        return view('admins.donhangs.show',compact('title','donHang','trangThaiDonHang','trangThaiThanhToan'));
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
//     public function update(Request $request, string $id)
// {
//     $donHang = DonHang::query()->findOrFail($id);

//     $currenTrangThai = $donHang->trang_thai_don_hang;
//     $newTrangThai = $request->input('trang_thai_don_hang');

//     $trangThais = array_keys(DonHang::TRANG_THAI_DON_HANG);

//     // Kiểm tra trạng thái
//     if ($currenTrangThai == DonHang::HUY_DON_HANG) {
//         return redirect()->route('admins.donhangs.index')
//             ->with('error', 'Đơn hàng đã hủy không thể thay đổi trạng thái.');
//     }

//     if (array_search($newTrangThai, $trangThais) < array_search($currenTrangThai, $trangThais)) {
//         return redirect()->route('admins.donhangs.index')
//             ->with('error', 'Không thể cập nhật lại ngược trạng thái.');
//     }

//     // Cập nhật trạng thái
//     $donHang->trang_thai_don_hang = $newTrangThai;
//     $donHang->save();

//     return redirect()->route('admins.donhangs.index')
//         ->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
// }

public function update(Request $request, string $id)
{
    $donHang = DonHang::query()->findOrFail($id);

    $currenTrangThai = $donHang->trang_thai_don_hang;
    $newTrangThai = $request->input('trang_thai_don_hang');

    $trangThais = array_keys(DonHang::TRANG_THAI_DON_HANG);

    // Kiểm tra trạng thái đã hủy
    if ($currenTrangThai == DonHang::HUY_DON_HANG) {
        return redirect()->route('admins.donhangs.index')
            ->with('error', 'Đơn hàng đã hủy không thể thay đổi trạng thái.');
    }

    // Kiểm tra trạng thái không được thay đổi ngược
    if (array_search($newTrangThai, $trangThais) < array_search($currenTrangThai, $trangThais)) {
        return redirect()->route('admins.donhangs.index')
            ->with('error', 'Không thể cập nhật lại ngược trạng thái.');
    }
    // Cập nhật trạng thái nếu không phải "Đã giao hàng"
    $donHang->trang_thai_don_hang = $newTrangThai;
    $donHang->save();

    return redirect()->route('admins.donhangs.index')
        ->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $donHang = DonHang::query()->findOrFail($id);

    // Kiểm tra trạng thái đơn hàng trước khi xóa
    if ($donHang && ($donHang->trang_thai_don_hang == DonHang::HUY_DON_HANG || $donHang->trang_thai_don_hang == DonHang::DA_GIAO_HANG)) {
        $donHang->chiTietDonHang()->delete(); // Xóa chi tiết đơn hàng nếu có
        $donHang->delete(); // Xóa đơn hàng
        return redirect()->back()->with('success','Xóa đơn hàng thành công');
    }

    return redirect()->back()->with('error','Không thể xóa đơn hàng này vì trạng thái không hợp lệ');
}

public function updatePaymentStatus(Request $request)
    {
        // Validate dữ liệu gửi lên
        $request->validate([
            'orderId' => 'required|string',
            'paymentStatus' => 'required|string',
        ]);

        // Tìm đơn hàng từ mã đơn hàng
        $donHang = DonHang::where('ma_don_hang', $request->orderId)->first();

        if ($donHang) {
            // Cập nhật trạng thái thanh toán
            $donHang->trang_thai_thanh_toan = $request->paymentStatus;
            $donHang->save();

            return response()->json(['success' => true]);
        }

        // Nếu không tìm thấy đơn hàng
        return response()->json(['success' => false, 'message' => 'Đơn hàng không tồn tại']);
    }
    
}
