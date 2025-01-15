<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Thêm sản phẩm vào wishlist
    public function addToWishlist($productId)
    {
        $user = auth()->user();

        // Kiểm tra xem sản phẩm đã có trong wishlist chưa
        $existingProduct = WishList::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if (!$existingProduct) {
            // Nếu chưa có, thêm sản phẩm vào WishList
            WishList::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
        }

        return redirect()->back()->with('success', 'Thêm sản phẩm vào WishList thành công');
    }


    public function destroy($id)
    {
        $wishlist = Wishlist::find($id); // Tìm bản ghi theo id

        if ($wishlist) {
            $wishlist->delete(); // Xóa bản ghi
            return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích');
        } else {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
    }


    public function index()
    {
        $user = auth()->user();

        $wishlist = Wishlist::query()->where('user_id', $user->id)->get();

        return view('clients.wishlist.index', compact('wishlist'));
    }
}
