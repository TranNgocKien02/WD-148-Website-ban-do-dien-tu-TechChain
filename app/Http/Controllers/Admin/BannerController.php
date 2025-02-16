<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admins.banners.';
    const PATH_UPLOAD = 'banners';

    public function index()
    {
        $title = "Banner";
        $data = Banner::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm Banner";
        return view(self::PATH_VIEW . __FUNCTION__, compact('title'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $data = $request->all();
        // dd($data);
        // if ($request->hasFile('anh')) {
        $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
        // } else {
            // $data['anh'] = '';
        // }

        try {
            DB::beginTransaction();
            // dd($data);
            Banner::create($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            // dd($exception);
            return back();
        }

        return redirect()->route(self::PATH_VIEW . 'index')->with('success', 'Thêm banner thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        $title = "Sửa banner";
        // dd($banner);
        return view('admins.banners.edit', compact('title', 'banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $data = $request->except('anh');
        // dd($data);
        if ($request->hasFile('anh')) {
            $data['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
            if (!empty($banner->anh) && Storage::exists($banner->anh)) {
                Storage::delete($banner->anh);
            }
        } else {
            $data['anh'] = $banner->anh;
        }

        try {
            DB::beginTransaction();

            $banner->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return back();
        }
        return redirect()->route(self::PATH_VIEW . 'index')->with('successs', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            DB::beginTransaction();
            $banner->delete();
            // DELETE IMAGE in Storage
            if ($banner->anh) {
                Storage::delete($banner->anh);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return back()->with('message', 'Error');
        }
        return back()->with('success', 'Xóa thành công');
    }
}
