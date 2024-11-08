<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    // Hiển thị danh sách khuyến mãi
    public function index()
    {
        $title = 'Quản lý khuyến mãi'; // Đặt tiêu đề cho trang
        $khuyenMais = KhuyenMai::all();
        return view('admins.khuyenmais.index', compact('khuyenMais', 'title'));
    }

    // Hiển thị form tạo khuyến mãi mới
    public function create()
    {
        $title = 'Thêm khuyến mãi mới';
        return view('admins.khuyenmais.create', compact('title'));
    }

    // Lưu khuyến mãi mới
    public function store(Request $request)
    {
        $request->validate([
            'ten_khuyen_mai' => 'required',
            'loai_khuyen_mai' => 'required',
            'gia_tri_khuyen_mai' => 'required|numeric',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
        ]);

        KhuyenMai::create($request->all());

        return redirect()->route('admins.khuyenmais.index')->with('success', 'Tạo khuyến mãi thành công');
    }

    // Hiển thị form chỉnh sửa khuyến mãi
    public function edit($id)
    {
        $khuyenMai = KhuyenMai::findOrFail($id);
        return view('admins.khuyenmais.edit', compact('khuyenMai'));
    }

    // Cập nhật khuyến mãi
    public function update(Request $request, $id)
    {
        $khuyenMai = KhuyenMai::findOrFail($id);

        $request->validate([
            'ten_khuyen_mai' => 'required',
            'loai_khuyen_mai' => 'required',
            'gia_tri_khuyen_mai' => 'required|numeric',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
        ]);

        $khuyenMai->update($request->all());

        return redirect()->route('admins.khuyenmais.index')->with('success', 'Cập nhật khuyến mãi thành công');
    }

    // Xóa khuyến mãi
    public function destroy($id)
    {
        $khuyenMai = KhuyenMai::findOrFail($id);
        $khuyenMai->delete();

        return redirect()->route('admins.khuyenmais.index')->with('success', 'Xóa khuyến mãi thành công');
    }
}
