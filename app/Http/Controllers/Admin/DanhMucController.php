<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Http\Requests\StoreDanhMucRequest;
use App\Http\Requests\UpdateDanhMucRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const PATH_UPLOAD = 'danhmucs';

    public function index()
    {
        $title = "Danh mục sản phẩm";

        $listDanhMuc = DanhMuc::orderByDESC('trang_thai')->get();
        return view('admins.danhmucs.index', compact('title', 'listDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm danh mục sản phẩm";
        return view('admins.danhmucs.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDanhMucRequest $request)
    {

        $data = $request->except('hinh_anh');
        $data['is_active'] ??= 0;
        if ($request->hasFile('hinh_anh')) {
            $data['hinh_anh'] = Storage::put(self::PATH_UPLOAD, $request->file('hinh_anh'));
        } else {
            $data['hinh_anh'] = '';
        }

        try {
            DB::beginTransaction();

            DanhMuc::query()->create($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return back()->with('message', 'Lỗi');
        }
        return redirect()->route('admins.danhmucs.index')->with('success', 'Create successful!');

    }

    /**
     * Display the specified resource.
     */
    public function show(DanhMuc $danhMuc)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DanhMuc $danhMuc)
    {
        $title = "Sửa danh mục sản phẩm";

        return view('admins.danhmucs.edit', compact('title', 'danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDanhMucRequest $request, DanhMuc $danhMuc)
    {
        $data = $request->except('hinh_anh');
        $data['is_active'] ??= 0;
        if ($request->hasFile('hinh_anh')) {
            $data['hinh_anh'] = Storage::put(self::PATH_UPLOAD, $request->file('hinh_anh'));
            if (!empty($danhMuc->hinh_anh) && Storage::exists($danhMuc->hinh_anh)) {
                Storage::delete($danhMuc->hinh_anh);
            }
        } else {
            $data['hinh_anh'] = $danhMuc->hinh_anh;
        }


        try {
            DB::beginTransaction();

            $danhMuc->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return back()->with('message', 'Lỗi');
        }
        return redirect()->route('admins.danhmucs.index')->with('success', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanhMuc $danhMuc)
    {

        try {
            DB::beginTransaction(); 
            $danhMucs = DanhMuc::orderBy('id')->get();


            $danhMuc->delete();
            // DELETE IMAGE in Storage
            if ($danhMuc->hinh_anh) {
                Storage::delete($danhMuc->hinh_anh);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            // return back()->with('message', 'Lỗi');
            return dd($exception);
        }
        return back()->with('success', 'Xóa thành công');
    }
}
