<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Sản phẩm";

        $listSanPham = SanPham::get();
        return view('admins.sanphams.index',compact('title','listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Thêm sản phẩm";
        $listDanhMuc = DanhMuc::get();

        return view('admins.sanphams.create',compact('title','listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            if ($request->hasFile('hinh_anh')) {
               $filepath = $request->file('hinh_anh')->store('uploads/sanphams','public');
            }else{
                $filepath = null ;
            }
            $param['hinh_anh'] = $filepath ;

            SanPham::create($param);

            return redirect()->route('admins.sanphams.index')->with('success','Thêm sản phẩm thành công');
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
        $title = "Sửa sản phẩm";
        $sanPham = SanPham::findOrFail($id);
        $listDanhMuc = DanhMuc::get();
        return view('admins.sanphams.edit', compact('title','sanPham','listDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token','_method');

            $sanPham = SanPham::findOrFail($id) ;

            if ($request->hasFile('anh_san_pham')) {
                if ($sanPham->anh_san_pham && Storage::disk('public')->exists($sanPham->anh_san_pham)) {
                    Storage::disk('public')->delete($sanPham->anh_san_pham);
                }
                $filepath = $request->file('anh_san_pham')->store('uploads/sanphams','public');
            }else{
                $filepath = $sanPham->anh_san_pham ;
            }
            $param['anh_san_pham'] = $filepath ;

            $sanPham->update($param) ;
            return redirect()->route('admins.sanphams.index')->with('success', 'Sửa sản phẩm thành công');


            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = SanPham::findOrFail($id);

        if ($sanPham->anh_san_pham && Storage::disk('public')->exists($sanPham->anh_san_pham)) {
            Storage::disk('public')->delete($sanPham->anh_san_pham);
        }
            $sanPham->delete();
            return redirect()->route('admins.sanphams.index')->with('success','Xóa sản phẩm thành công');

        }
     
    }   
