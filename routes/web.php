<?php

use App\Http\Controllers\Admin\BinhLuanController;
use App\Http\Controllers\Client\LienHeController;
use App\Http\Controllers\client\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ProductController;

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
Route::get('/product-detail/{id}', [ProductController::class, 'chiTietSanPham'])->name('product-detail');

// Cart Routes (requires authentication)
Route::middleware('auth')->prefix('cart')->group(function () {
    Route::post('/add', [CartController::class, 'addCart'])->name('cart.add');
    Route::get('/list', [CartController::class, 'listCart'])->name('cart.list');
    Route::post('/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.apply_coupon');
});

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
// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth');
// route::get('/admin',function () {
//     return 'Đây là trang admin';
// })->middleware(['auth','auth.admin']);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product-detail/{id}',  [ProductController::class, 'chiTietSanPham'])->name('product-detail');
Route::post('/cart/add',            [CartController::class, 'addCart'])->name('cart.add');
Route::post('/cart/store',            [CartController::class, 'storeCart'])->name('cart.store');
Route::get('/cart/list',            [CartController::class, 'listCart'])->name('cart.list');
Route::get('/cart-full/list',            [CartController::class, 'listFullCart'])->name('cart-full.list');
Route::get('/cart-full/create',            [OrderController::class, 'createFullCart'])->name('fulldonhangs.create');
Route::post('/cart/update',         [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('{cart}/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/binh-luan', [BinhLuanController::class, 'store'])->middleware('auth')->name('binh-luan.store');


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





// route up khuyến mãi
Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('client.apply_coupon');
Route::get('/cart', [CartController::class, 'listCart'])->name('client.cart');

// });



