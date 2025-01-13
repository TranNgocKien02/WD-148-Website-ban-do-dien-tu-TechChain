<?php

namespace App\Http\Controllers\Admin;

use App\Models\DonHang;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonHangRequest;
use App\Http\Requests\UpdateDonHangRequest;
use Carbon\Carbon;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Danh mục đơn hàng";
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $type_huy_don_hang = DonHang::HUY_DON_HANG;

        $ngayDatHang = request('ngay_dat_hang');
        $trangThai = request('trang_thai'); // Hoặc dùng $_GET['trang_thai'] nếu cần
        $ngay = request('ngay'); 
        // Tạo query để lọc đơn hàng
        $query = DonHang::query();

        // Nếu có tham số 'trang_thai', lọc theo trạng thái
        if ($trangThai) {
            $query->where('trang_thai_don_hang', $trangThai);
        }


        // Lọc theo thời gian đặt hàng
        switch ($ngayDatHang) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'week':
                $query->whereBetween('created_at', [
                    Carbon::now()->startOfWeek(), // Ngày đầu tuần
                    Carbon::now()->endOfWeek()    // Ngày cuối tuần
                ]);
                break;
            case 'month':
                $query->whereMonth('created_at', Carbon::now()->month); // Tháng hiện tại
                break;
            case 'quarter':
                $query->whereBetween('created_at', [
                    Carbon::now()->startOfQuarter(), // Ngày bắt đầu quý
                    Carbon::now()->endOfQuarter()    // Ngày kết thúc quý
                ]);
                break;
        }

        if ($ngay) {
            $query->whereDate('created_at', Carbon::parse($ngay)); // Lọc theo ngày người dùng chọn
        }

        // Lấy danh sách đơn hàng theo query đã lọc và sắp xếp theo ID giảm dần
        $listDonHang = $query->orderByDesc('id')->get();

        // Tính tổng số tiền
        $subTotal = $listDonHang->sum('tong_tien');
        $shipping = 50000; // Phí vận chuyển cố định
        $total = $subTotal + $shipping;

        // Trả về view với dữ liệu
        return view('admins.donhangs.index', compact('title', 'listDonHang', 'trangThaiDonHang', 'type_huy_don_hang', 'subTotal', 'shipping', 'total'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonHangRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(DonHang $donHang)
    {
        $title = "Thông tin chi tiết đơn hàng";
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;

        // Lấy danh sách chi tiết đơn hàng
        $chiTietDonHangs = $donHang->chiTietDonHangs;

        // Tính tổng phụ
        $tongPhu = $chiTietDonHangs->sum(function ($item) {
            return $item->so_luong * $item->gia_khuyen_mai;
        });

        $giamGia = $donHang->tien_khuyen_mai ?? 0;
        $phiVanChuyen = $donHang->phi_van_chuyen ?? 0;


        return view('admins.donhangs.show', compact('title', 'donHang', 'trangThaiDonHang', 'trangThaiThanhToan', 'tongPhu', 'phiVanChuyen', 'giamGia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonHang $donHang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonHangRequest $request, DonHang $donHang)
    {

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
    public function destroy(DonHang $donHang)
    {

        // Kiểm tra trạng thái đơn hàng trước khi xóa
        if ($donHang && ($donHang->trang_thai_don_hang == DonHang::HUY_DON_HANG || $donHang->trang_thai_don_hang == DonHang::DA_GIAO_HANG)) {
            $donHang->chiTietDonHang()->delete(); // Xóa chi tiết đơn hàng nếu có
            $donHang->delete(); // Xóa đơn hàng
            return redirect()->back()->with('success', 'Xóa đơn hàng thành công');
        }

        return redirect()->back()->with('error', 'Không thể xóa đơn hàng này vì trạng thái không hợp lệ');
    }

    public function updatePaymentStatus(UpdateDonHangRequest $request, DonHang $donHang)
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

    public function bulkDelete()
    {
        // Lấy danh sách ID từ POST (hoặc GET nếu bạn gửi qua URL)
        $ids = $_POST['ids'] ?? []; // Hoặc $_GET nếu bạn sử dụng GET

        if (!empty($ids)) {
            // Xóa các đơn hàng dựa trên ID đã chọn
            DonHang::whereIn('id', $ids)->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Không có đơn hàng nào được chọn']);
    }


}
