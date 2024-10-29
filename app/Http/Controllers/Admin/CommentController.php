<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Sản phẩm";

        $listSanPham = SanPham::get();
        return view('admins.comments.index',compact('title','listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
   

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
            return redirect()->route('admins.coments.index')->with('success','Xóa sản phẩm thành công');

        }
     
    }   
