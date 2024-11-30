<?php

namespace App\Http\Controllers\Admin;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Danh Sách Tài Khoản";

        $listKhachHang = KhachHang::get();
        return view('admins.khachhangs.index',compact('title','listKhachHang'));
    }

    public function create()
    {
        $title = "Thêm Tài Khoản Khách Hàng";
        return view('admins.khachhangs.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email_verified_at' => 'boolean',
            'role' => 'required|in:user,admin', // Thêm validation cho trường role
        ]);

        KhachHang::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Mã hóa mật khẩu
            'phone' => $request->phone,
            'address' => $request->address,
            'email_verified_at' => $request->email_verified_at ? now() : null,
            'role' => $request->role, // Thêm trường role vào cơ sở dữ liệu
        ]);

        return redirect()->route('admins.khachhangs.index')->with('success', 'Tài khoản khách hàng đã được thêm thành công.');
    }




    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
{
    $title = "Chỉnh Sửa Tài Khoản Khách Hàng";
    $khachHang = KhachHang::findOrFail($id);
    return view('admins.khachhangs.edit', compact('title', 'khachHang'));
}
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8', // Mật khẩu tùy chọn
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email_verified_at' => 'boolean',
            'role' => 'required|in:User,Admin', // Kiểm tra role phải là User hoặc Admin
        ]);

        $khachHang = KhachHang::findOrFail($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'email_verified_at' => $request->email_verified_at ? now() : null,
            'role' => $request->role, // Thêm trường role vào dữ liệu

        ];
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }


        if ($khachHang->update($data)) {
            return redirect()->route('admins.khachhangs.index')->with('success', 'Tài khoản khách hàng đã được cập nhật thành công.');
        } else {
            return redirect()->back()->with('error', 'Cập nhật không thành công. Vui lòng thử lại.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

            $khachHang = KhachHang::findOrFail($id);
            $khachHang->delete();

            return redirect()->route('admins.khachhangs.index')->with('success', 'Tài khoản khách hàng đã được xóa thành công.');

    }
}
