<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Hãng sản phẩm";

        $listHang = Hang::with('danhMuc')->get();

        return view('admins.hangs.index',compact('title','listHang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm Hãng";
        $listHang = Hang::with('danhMuc')->get();

        return view('admins.hangs.create',compact('title','listHang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            if ($request->hasFile('hinh_anh')) {
               $filepath = $request->file('hinh_anh')->store('uploads/Hangs','public');
            }else{
                $filepath = null ;
            }
            $param['hinh_anh'] = $filepath ;

            Hang::create($param);

            return redirect()->route('admins.hangs.index')->with('success','Thêm hãng thành công');
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
        $hang = Hang::findOrFail($id);
        $listHang = Hang::get();
        return view('admins.hangs.edit', compact('title','hang','listHang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token','_method');

            $Hang = Hang::findOrFail($id) ;

            if ($request->hasFile('anh_san_pham')) {
                if ($Hang->anh_san_pham && Storage::disk('public')->exists($Hang->anh_san_pham)) {
                    Storage::disk('public')->delete($Hang->anh_san_pham);
                }
                $filepath = $request->file('anh_san_pham')->store('uploads/Hangs','public');
            }else{
                $filepath = $Hang->anh_san_pham ;
            }
            $param['anh_san_pham'] = $filepath ;

            $Hang->update($param) ;
            return redirect()->route('admins.hangs.index')->with('success', 'Sửa sản phẩm thành công');


            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Hang = Hang::findOrFail($id);

        if ($Hang->anh_san_pham && Storage::disk('public')->exists($Hang->anh_san_pham)) {
            Storage::disk('public')->delete($Hang->anh_san_pham);
        }
            $Hang->delete();
            return redirect()->route('admins.hangs.index')->with('success','Xóa sản phẩm thành công');

        }
}
