<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaoCao;
use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\ThongKe;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function index()
{
    $thongKe = new ThongKe();
    $data = [
        'tongDonHang' => $thongKe->tongDonHang(),
        'tongSanPham' => $thongKe->tongSanPham(),
        'donHangDaGiao' => $thongKe->donHangDaGiao(),
        'donHangDaHuy' => $thongKe->donHangDaHuy(),
        'doanhThu' => $thongKe->doanhThu(),
    ];
    
    return view('admins.thongkes.index', compact('data')); // Chỉ truyền biến $data vào view
}

    public function chiTietThongKe()
{
    // Lấy dữ liệu chi tiết về sản phẩm và đơn hàng
    $listSanPham = SanPham::all(); // Lấy tất cả sản phẩm
    $listDonHang = DonHang::with('user')->get(); // Lấy tất cả đơn hàng với thông tin người dùng

    // return view('admins.thongkes.chiTietThongKe', compact('listSanPham', 'listDonHang'));

    // $listSanPham = SanPham::all(); // Retrieve all products
    // $listDonHang = DonHang::all(); // Retrieve all orders
    $deliveredOrders = DonHang::where('trang_thai_don_hang', 'delivered_status_id')->get(); // Replace with your delivered status ID
    $cancelledOrders = DonHang::where('trang_thai_don_hang', 'cancelled_status_id')->get(); // Replace with your cancelled status ID

    return view('admins.thongkes.chiTietThongKe', compact('listSanPham', 'listDonHang', 'deliveredOrders', 'cancelledOrders'));
}
public function baoCao()
{
    $thongKe = new ThongKe();
    $data = [
        'donHangDaGiao' => $thongKe->donHangDaGiao(),
        'donHangDaHuy' => $thongKe->donHangDaHuy(),
    ];

    return view('admins.thongkes.bao_cao', compact('data')); // Truyền dữ liệu cho view biểu đồ
}


}
