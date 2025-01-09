<?php
namespace App\Http\Controllers\Client;

use App\Models\Banner;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $danhMuc = DanhMuc::query()->where('trang_thai', true)->get();
        $sanPham = SanPham::query()->take(10)->get();
        $sanPhamMoi = SanPham::query()->take(10)->get();
        $sanPhamHot = SanPham::query()->get();
        $sanPhamHotDeal = SanPham::query()->take(10)->get();
        $sanPhamTrending = SanPham::query()->take(10)->get();
        $banners = Banner::query()->where('is_active', true)->get();
        $bannerMain = Banner::query()->where('loai', 'main')->where('is_active', true)->get();
        $bannerSale = Banner::query()->where('loai', 'sale')->where('is_active', true)->take(2)->get();
        $bannerProduct = Banner::query()->where('loai', 'product')->where('is_active', true)->get();
        // dd($bannerMain->anh);  
         // Get the cart from the session
         $cart = session()->get('cart', []);
    
         // If the cart is empty, forget the coupon
         if (empty($cart)) {
             session()->forget('coupon');
         }
     
         $total = 0;
         $subTotal = 0;
         $coupon = session()->get('coupon', 0); // Get the coupon value
     
         // Calculate subtotal
         foreach ($cart as $item) {
             // Use the promotional price if it exists, otherwise use the regular price
             $price = isset($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] > 0 ? $item['gia_khuyen_mai'] : $item['gia'];
             $subTotal += $price * $item['so_luong'];
         }
     
         // Set shipping cost
         $shipping = 20000;
     
         // Calculate the total price
         $total = $subTotal + $shipping - $coupon;  
        return view('clients.home.index', compact('danhMuc', 'sanPham', 'sanPhamMoi', 'sanPhamHot', 'sanPhamHotDeal',
         'sanPhamTrending', 'banners', 'bannerMain',
         'bannerSale', 'bannerProduct','cart', 'total', 'shipping', 'subTotal', 'coupon'));
    }
}
