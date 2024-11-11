<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    /**
     * Hiển thị danh sách bình luận.
     */
    public function index()
    {
        $title = "Quản lý bình luận";
        $comments = Comment::paginate(10); // Phân trang
        return view('admins.comments.index', compact('title', 'comments'));
    }

    /**
     * Hiển thị form tạo bình luận mới.
     */
    // public function create()
    // {
    //     $title = "Thêm bình luận mới";
    //     $listSanPham = SanPham::all();
    //     return view('admins.comments.create', compact('title', 'listSanPham'));
    // }

    /**
     * Lưu bình luận mới vào cơ sở dữ liệu.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'ma_san_pham' => 'required|string',
    //         'ten_san_pham' => 'required|string',
    //         'content' => 'required|string',
    //         'chấp nhận' => 'boolean',
    //     ]);

    //     Comment::create($request->all());
    //     return redirect()->route('admins.comments.index')->with('success', 'Thêm bình luận thành công');
    // }

    /**
     * Hiển thị chi tiết bình luận.
     */
    // public function show(string $id)
    // {
    //     $comment = Comment::findOrFail($id);
    //     $title = "Chi tiết bình luận";
    //     return view('admins.comments.show', compact('title', 'comment'));
    // }

    /**
     * Hiển thị form chỉnh sửa bình luận.
     */
    // public function edit(string $id)
    // {
    //     $comment = Comment::findOrFail($id);
    //     $title = "Chỉnh sửa bình luận";
    //     return view('admins.comments.edit', compact('title', 'comment'));
    // }

    /**
     * Cập nhật bình luận.
     */
    // public function update(Request $request, string $id)
    // {
    //     $request->validate([
    //         'ten_san_pham' => 'required|string',
    //         'content' => 'required|string',
    //         'chấp nhận' => 'boolean',
    //     ]);

    //     $comment = Comment::findOrFail($id);
    //     $comment->update($request->all());
    //     return redirect()->route('admins.comments.index')->with('success', 'Cập nhật bình luận thành công');
    // }

    /**
     * Xóa bình luận.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('admins.comments.index')->with('success', 'Xóa bình luận thành công');
    }
}
