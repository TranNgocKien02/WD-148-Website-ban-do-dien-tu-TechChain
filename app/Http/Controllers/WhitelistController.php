<?php

namespace App\Http\Controllers;

use App\Models\Whitelist;
use Illuminate\Http\Request;

class WhitelistController extends Controller
{
    // Thêm sản phẩm vào whitelist
    public function addToWhitelist($productId)
    {
        $user = auth()->user();
        
        // Kiểm tra xem sản phẩm đã có trong whitelist chưa
        $existingProduct = Whitelist::where('user_id', $user->id)
                                    ->where('product_id', $productId)
                                    ->first();

        if (!$existingProduct) {
            // Nếu chưa có, thêm sản phẩm vào whitelist
            Whitelist::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
        }

        return redirect()->back(); 
    }

//     public function destroy($id)
// {
//     $user = auth()->user();
//     $whitelist = Whitelist::where('user_id', $user->id)->where('product_id', $id)->first();

//     if ($whitelist) {
//         $whitelist->delete();
//         return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích');
//     } else {
//         return redirect()->back()->with('error', 'Sản phẩm không tồn tại trong danh sách yêu thích');
//     }
// }
public function destroy($id)
{
    $whitelist = Whitelist::find($id); // Tìm bản ghi theo id

    if ($whitelist) {
        $whitelist->delete(); // Xóa bản ghi
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích');
    } else {
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }
}



    // Xóa tất cả sản phẩm yêu thích
    public function removeAllFromWhitelist()
    {
        $user = auth()->user();
        
        // Xóa tất cả sản phẩm yêu thích của người dùng
        Whitelist::where('user_id', $user->id)->delete();

        return redirect()->route('whitelist.index')->with('success', 'Đã xóa tất cả sản phẩm yêu thích.');
    }


    public function index()
    {
        $user = auth()->user();
        
        // Lấy sản phẩm yêu thích của người dùng với thông tin sản phẩm
        $whitelistedProducts = $user->whitelist()->with('product')->get();
    
        // Tính tổng số tiền của các sản phẩm yêu thích (subTotal)
        $subTotal = $whitelistedProducts->sum(function ($whitelist) {
            $product = $whitelist->product;
            if ($product) {
                $price = $product->gia_khuyen_mai > 0 ? $product->gia_khuyen_mai : $product->gia_san_pham;
                return $price * 1; // Giả sử số lượng là 1 cho mỗi sản phẩm
            }
            return 0; // Trả về 0 nếu không có sản phẩm
        });
    
        // Tính số lượng sản phẩm yêu thích
        $cartItemCount = $whitelistedProducts->count();
    
        // Truyền biến vào view
        return view('clients.whitelist.index', compact('whitelistedProducts', 'subTotal', 'cartItemCount'));
    }
    

}

