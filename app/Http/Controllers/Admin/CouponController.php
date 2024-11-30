<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $title = 'Danh sách khuyến mãi';
        $listCoupons = Coupon::all();
        return view('admins.coupons.index', compact('listCoupons','title'));
    }

    public function create()
    {
        $title = 'Thêm khuyến mãi';

        return view('admins.coupons.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:coupons',
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric',
            'expiration_date' => 'required|date|after:today',
        ]);

        Coupon::create($request->all());
        return redirect()->route('admins.coupons.index')->with('success', 'Thêm mã giảm giá thành công.');
    }

    public function edit(Coupon $coupon)
    {
        $title = 'Sửa khuyến mãi';
        return view('admins.coupons.edit', compact('coupon','title'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'name' => 'required|unique:coupons,name,' . $coupon->id,
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric',
            'expiration_date' => 'required|date|after:today',
        ]);

        $coupon->update($request->all());
        return redirect()->route('admins.coupons.index')->with('success', 'Sửa mã giảm giá thành công.');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admins.coupons.index')->with('errors', 'Xóa mã giảm giá thành công.');
    }
}
