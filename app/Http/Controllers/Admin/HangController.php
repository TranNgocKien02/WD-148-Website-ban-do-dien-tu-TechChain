<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hang;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHangRequest;
use App\Http\Requests\UpdateHangRequest;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\DB;

class HangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Hãng sản phẩm";
        $listDanhMuc = DanhMuc::all();
        $danhMuc = request('danh_muc'); // Hoặc dùng $_GET['trang_thai'] nếu cần

        $query = Hang::query();

        if ($danhMuc) {
            $query->where('danh_muc_id', $danhMuc);
        }



        $listHang = $query->orderByDesc('id')->get();
        return view('admins.hangs.index', compact('title', 'listHang', 'listDanhMuc'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm Hãng";
        $listDanhMuc = DanhMuc::query()->get();

        return view('admins.hangs.create', compact('title', 'listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHangRequest $request)
    {
            $data = $request->all();
        try {
            DB::beginTransaction();

            Hang::query()->create($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return back()->with('message', 'Lỗi');
        }
        return redirect()->route('admins.hangs.index')->with('success', 'Thêm hãng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hang $hang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hang $hang)
    {

        $title = "Sửa sản phẩm";
        $listDanhMuc = DanhMuc::query()->get();

        return view('admins.hangs.edit', compact('title', 'hang', 'listDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHangRequest $request, Hang $hang)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();

            $hang->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return back()->with('message', 'Lỗi');
        }
            return redirect()->route('admins.hangs.index')->with('success', 'Sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hang $hang)
    {
        try {
            DB::beginTransaction();
            $hang->delete();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            // return back()->with('message', 'Lỗi');
            return dd($exception);
        }
        return redirect()->route('admins.hangs.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
