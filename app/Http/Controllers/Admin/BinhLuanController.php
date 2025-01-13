<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\SanPham;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách bình luận';
        $binhLuans = BinhLuan::with(['sanPham', 'user'])->get();
        return view('admins.binhluans.index', compact('binhLuans','title'));
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
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');

            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (!auth()->check()) {
                // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
                return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để gửi đánh giá.');
            }

            // Lưu bình luận (đánh giá) vào cơ sở dữ liệu
            $binhLuan = BinhLuan::create($param);

            // Tính toán điểm trung bình của sản phẩm
            $averageRating = SanPham::find($binhLuan->san_pham_id)
                ->binhLuans()  // Quan hệ với bảng BinhLuan
                ->avg('sao'); // Tính trung bình điểm đánh giá

            // Cập nhật điểm trung bình vào bảng san_phams
            SanPham::where('id', $binhLuan->san_pham_id)
                ->update(['danh_gia_trung_binh' => $averageRating]);

            // Quay lại trang trước
            return redirect()->back()->with('success', 'Đánh giá đã được gửi thành công.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
