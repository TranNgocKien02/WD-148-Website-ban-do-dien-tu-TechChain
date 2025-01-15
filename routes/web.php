<?php

use App\Http\Controllers\Admin\BinhLuanController;
use App\Http\Controllers\Client\LienHeController;
use App\Http\Controllers\client\UserController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ProductController;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\client\ProductFilter;
use App\Http\Controllers\MomoController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\WishlistController;
use App\Models\ThongTinTrangWeb;
use Laravel\Socialite\Facades\Socialite;


/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// Auth Routes
Route::get('login', [AuthController::class, 'showFromLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFromRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Profile Routes (requires authentication)
Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('/', [UserController::class, 'showProfile'])->name('profile');
    Route::get('/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/update', [UserController::class, 'update'])->name('profile.update');
});

// Product Routes
Route::middleware('auth')->prefix('product-detail')->group(function () {

    Route::get('/{slug}', [ProductController::class, 'chiTietSanPham'])->name('product-detail');
});


// Cart Routes (requires authentication)
// Route::middleware('auth')->prefix('cart')->group(function () {
//     Route::post('/add', [CartController::class, 'addCart'])->name('cart.add');
//     Route::get('/list', [CartController::class, 'listCart'])->name('cart.list');
//     Route::post('/update', [CartController::class, 'updateCart'])->name('cart.update');
//     Route::delete('/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
//     Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.apply_coupon');
// });

// Order Routes (requires authentication)
Route::middleware('auth')->prefix('orders')->name('orders.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::post('/store', [OrderController::class, 'store'])->name('store');
    Route::get('/show/{id}', [OrderController::class, 'show'])->name('show');
    Route::put('/{id}/update', [OrderController::class, 'update'])->name('update');
});

// Client Routes
Route::get('/', [HomeController::class, 'index'])->name('index');
route::get('register', [AuthController::class, 'showFromRegister']);
route::post('register', [AuthController::class, 'register'])->name('register');
route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');

// lấy lại mật khẩu
Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');



// Route::get('/product-detail/{id}',  [ProductController::class, 'chiTietSanPham'])->name('product-detail');

Route::middleware('auth')->group(function () {
    Route::post('/cart/add',            [CartController::class, 'addCart'])->name('cart.add');
    Route::post('/cart/store',            [CartController::class, 'storeCart'])->name('cart.store');
    Route::get('/cart/list',            [CartController::class, 'listCart'])->name('cart.list');
    Route::get('/cart-full/list',            [CartController::class, 'listFullCart'])->name('cart-full.list');
    Route::get('/cart-full/create',            [OrderController::class, 'createFullCart'])->name('fulldonhangs.create');
    Route::post('/cart/updateFull',         [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/update',         [CartController::class, 'updateCartBuy'])->name('cart.updateBuy');
    Route::delete('{cart}/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/binh-luan', [BinhLuanController::class, 'store'])->middleware('auth')->name('binh-luan.store');
    Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('client.apply_coupon');
    Route::post('/remove-coupon', [CartController::class, 'removeCoupon'])->name('client.remove_coupon');
    Route::get('/cart', [CartController::class, 'listCart'])->name('client.cart');
});


// wishlist
Route::middleware('auth')->group(function () {
    Route::post('/wishlist/add/{productId}', [WishlistController::class, 'addTowishlist'])->name('wishlist.add');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.remove');
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

});

Route::middleware('auth')->prefix('donhangs')
    ->as('donhangs.')
    ->group(function () {
        Route::get('/',             [OrderController::class, 'index'])->name('index');
        Route::get('/create',       [OrderController::class, 'create'])->name('create');
        Route::post('/store',       [OrderController::class, 'store'])->name('store');
        Route::get('/show/{id}',    [OrderController::class, 'show'])->name('show');
        Route::put('{id}/update',   [OrderController::class, 'update'])->name('update');
    });



Route::controller(LienHeController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact', 'store')->name('contact.store');
});


Route::get('/product/filter', [ProductFilter::class, 'filter'])->name('filter');


// route up khuyến mãi


Route::get(
    '/about-us',
    function () {
        return view('clients.aboutUs.index');
    }
);

// Đăng nhập với Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');



// Callback sau khi người dùng đăng nhập thành công với Google
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
