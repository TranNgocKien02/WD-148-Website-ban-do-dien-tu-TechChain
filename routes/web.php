<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BaoCaoController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\KhuyenMaiController;
use App\Http\Controllers\Admin\ThongTinTrangWebController;
use App\Http\Controllers\client\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
<<<<<<< HEAD
// use App\Http\Controllers\CartController;
// use App\Http\Controllers\OderController;
=======
use App\Http\Controllers\CartController;
>>>>>>> fc5807a59d65c29f01def7a0693c838480361fc6
use App\Http\Controllers\OrderController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\HangController;
use App\Http\Controllers\Admin\SanPhamController;
<<<<<<< HEAD
use App\Http\Controllers\CartController;
=======
use App\Http\Controllers\Admin\ThongKeController;
>>>>>>> fc5807a59d65c29f01def7a0693c838480361fc6
use App\Http\Middleware\CheckRoleAdminMiddleware;
use App\Http\Controllers\Admin\TaiKhoanController;
use App\Http\Controllers\client\ProductController;
use App\Http\Controllers\Admin\KhachHangController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\ThongKeController;
use App\Http\Controllers\Admin\LienHeController;
use App\Http\Controllers\Client\LienHeController as ControllersLienHeController;
=======
use App\Http\Controllers\MomoController;
use App\Http\Controllers\PayPalController;
use App\Models\ThongTinTrangWeb;
>>>>>>> fc5807a59d65c29f01def7a0693c838480361fc6

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/danhmucs', function () {
//     return view('admins.danhmucs.index');
// });

Auth::routes();



route::get('login', [AuthController::class, 'showFromLogin']);
route::post('login', [AuthController::class, 'login'])->name('login');

route::get('register', [AuthController::class, 'showFromRegister']);
route::post('register', [AuthController::class, 'register'])->name('register');
route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
// lấy lại mật khẩu
// Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
// Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
// Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
// Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');


// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth');
// route::get('/admin',function () {
//     return 'Đây là trang admin';
// })->middleware(['auth','auth.admin']);


// Auth::routes();

<<<<<<< HEAD
Route::get('/home', [App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');

Route::get('/product-detail/{id}', [ProductController::class, 'chiTietSanPham'])->name('product-detail');
Route::post('/cart/add', [CartController::class, 'addCart'])->name('cart.add');
Route::get('/cart/list', [CartController::class, 'listCart'])->name('cart.list');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

Route::controller(ControllersLienHeController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact', 'store')->name('contact.store');
});
=======
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product-detail/{id}',  [ProductController::class, 'chiTietSanPham'])->name('product-detail');
Route::post('/cart/add',            [CartController::class, 'addCart'])->name('cart.add');
Route::get('/cart/list',            [CartController::class, 'listCart'])->name('cart.list');
Route::post('/cart/update',         [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{id}',         [CartController::class, 'destroy'])->name('cart.destroy');
>>>>>>> fc5807a59d65c29f01def7a0693c838480361fc6

// thanh toán PayPal
// Route::post('/paypal/capture', [PayPalController::class, 'capture'])->name('paypal.capture');
// Route::get('paypal/create',         [PayPalController::class, 'createPayment'])->name('paypal.create');
// Route::get('paypal/execute',        [PayPalController::class, 'executePayment'])->name('paypal.execute');
// Route::get('paypal/cancel',         [PayPalController::class, 'cancelPayment'])->name('paypal.cancel');

Route::middleware('auth')->prefix('donhangs')
    ->as('donhangs.')
    ->group(function () {
        Route::get('/',             [OrderController::class, 'index'])->name('index');
        Route::get('/create',       [OrderController::class, 'create'])->name('create');
        Route::post('/store',       [OrderController::class, 'store'])->name('store');
        Route::get('/show/{id}',    [OrderController::class, 'show'])->name('show');
        Route::put('{id}/update',   [OrderController::class, 'update'])->name('update');
    });



// route Admin
Route::middleware(['auth', 'auth.admin'])->prefix('admins')
    ->as('admins.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admins.dashboard');
        })->name('dashboard');

        // khuyến mai
        Route::resource('coupons', CouponController::class);


        Route::prefix('danhmucs')
            ->as('danhmucs.')
            ->group(function () {
                Route::get('/', [DanhMucController::class, 'index'])->name('index');
                Route::get('/create', [DanhMucController::class, 'create'])->name('create');
                Route::post('/store', [DanhMucController::class, 'store'])->name('store');
                Route::get('/show/{id}', [DanhMucController::class, 'show'])->name('show');
                Route::get('{id}/edit', [DanhMucController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [DanhMucController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [DanhMucController::class, 'destroy'])->name('destroy');
            });

        Route::prefix('sanphams')
            ->as('sanphams.')
            ->group(function () {
                Route::get('/', [SanPhamController::class, 'index'])->name('index');
                Route::get('/create', [SanPhamController::class, 'create'])->name('create');
                Route::post('/store', [SanPhamController::class, 'store'])->name('store');
                Route::get('{sanPham}/show', [SanPhamController::class, 'show'])->name('show');
                Route::get('{sanPham}/edit', [SanPhamController::class, 'edit'])->name('edit');
                Route::put('{sanPham}/update', [SanPhamController::class, 'update'])->name('update');
                Route::delete('{sanPham}/destroy', [SanPhamController::class, 'destroy'])->name('destroy');
            });

        Route::prefix('donhangs')
            ->as('donhangs.')
            ->group(function () {
                Route::get('/', [DonHangController::class, 'index'])->name('index');
                Route::get('/show/{id}', [DonHangController::class, 'show'])->name('show');
                Route::put('{id}/update', [DonHangController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [DonHangController::class, 'destroy'])->name('destroy');
            });

        // Route cho thống kê
        Route::prefix('thongkes')
            ->as('thongkes.')
            ->group(function () {
                Route::get('/', [ThongKeController::class, 'index'])->name('index'); // Xem báo cáo thống kê
                // Route::get('/show/{id}', [ThongKeController::class, 'show'])->name('show'); // Xem chi tiết báo cáo
                // Route::delete('{id}/destroy', [ThongKeController::class, 'destroy'])->name('destroy'); // Xóa báo cáo nếu cần
                Route::get('/chi-tiet-thong-ke', [ThongKeController::class, 'chiTietThongKe'])->name('chiTietThongKe');
                Route::get('/bao-cao', [ThongKeController::class, 'baoCao'])->name('bao-cao');

            });
<<<<<<< HEAD
=======
            Route::prefix('hangs')
            ->as('hangs.')
            ->group(function () {
                Route::get('/', [HangController::class, 'index'])->name('index');
                Route::get('/create', [HangController::class, 'create'])->name('create');
                Route::post('/store', [HangController::class, 'store'])->name('store');
                Route::get('/show/{id}', [HangController::class, 'show'])->name('show');
                Route::get('{id}/edit', [HangController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [HangController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [HangController::class, 'destroy'])->name('destroy');

            });
        // route quản lý trang web
            Route::prefix('thongtintrangwebs')
                ->as('thongtintrangwebs.')
                ->group(function () {
                    Route::get('/', [ThongTinTrangWebController::class, 'index'])->name('index');
                    Route::get('/show/{id}', [ThongTinTrangWebController::class, 'show'])->name('show');
                    Route::put('{id}/update', [ThongTinTrangWebController::class, 'update'])->name('update');
                    Route::delete('{id}/destroy', [ThongTinTrangWebController::class, 'destroy'])->name('destroy');
            });
    Route::prefix('khachangs')
        ->as('khachhangs.')
        ->group(function () {
            Route::get('/', [KhachHangController::class, 'index'])->name('index');
            Route::get('/create', [KhachHangController::class, 'create'])->name('create');
            Route::post('/store', [KhachHangController::class, 'store'])->name('store');
            Route::get('/show/{id}', [KhachHangController::class, 'show'])->name('show');
            Route::get('{id}/edit', [KhachHangController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [KhachHangController::class, 'update'])->name('update');
            Route::delete('{id}/destroy', [KhachHangController::class, 'destroy'])->name('destroy');
        });

            Route::get('/', [ThongTinTrangWebController::class, 'index'])->name('index'); // Display info
            Route::post('/update', [ThongTinTrangWebController::class, 'update'])->name('update'); // Update info
        });
>>>>>>> fc5807a59d65c29f01def7a0693c838480361fc6

        Route::prefix('banners')
            ->as('banners.')
            ->group(function () {
                Route::get('/', [BannerController::class, 'index'])->name('index');
                Route::get('{banner}/edit', [BannerController::class, 'edit'])->name('edit');
                Route::get('/create', [BannerController::class, 'create'])->name('create');
                Route::post('/store', [BannerController::class, 'store'])->name('store');
                Route::put('{banner}/update', [BannerController::class, 'update'])->name('update');
                Route::delete('{banner}/destroy', [BannerController::class, 'destroy'])->name('destroy');
            });
<<<<<<< HEAD
            
        // route quản lý trang web
        Route::prefix('thong-tin-trang-web')
            ->as('thongtintrangwebs.')
            ->group(function () {
                Route::get('/', [DonHangController::class, 'index'])->name('index');
                Route::get('/show/{id}', [DonHangController::class, 'show'])->name('show');
                Route::put('{id}/update', [DonHangController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [DonHangController::class, 'destroy'])->name('destroy');
            });

        // route quản lý lien he
        Route::prefix('lien-he')
            ->as('lienhes.')
            ->group(function () {
                Route::get('/', [LienHeController::class, 'index'])->name('index');
                Route::get('{lienHe}/', [LienHeController::class, 'show'])->name('show');
                Route::post('/respond', [LienHeController::class, 'respond'])->name('respond');
                Route::delete('{lienHe}/destroy', [LienHeController::class, 'destroy'])->name('destroy');
            });
    });
=======

            // Route::prefix('khuyenmais')
            // ->as('khuyenmais.')
            // ->group(function () {

            //     Route::get('/', [KhuyenMaiController::class, 'index'])->name('index'); // List all promotions
            //     Route::get('/create', [KhuyenMaiController::class, 'create'])->name('create'); // Show create form for promotions
            //     Route::post('/store', [KhuyenMaiController::class, 'store'])->name('store'); // Store new promotion
            //     Route::get('/show/{id}', [KhuyenMaiController::class, 'show'])->name('show'); // Show specific promotion
            //     Route::get('{id}/edit', [KhuyenMaiController::class, 'edit'])->name('edit'); // Edit promotion
            //     Route::put('{id}/update', [KhuyenMaiController::class, 'update'])->name('update'); // Update promotion
            //     Route::delete('{id}/destroy', [KhuyenMaiController::class, 'destroy'])->name('destroy'); // Delete promotion
            // });

            // route up khuyến mãi
            Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('client.apply_coupon');
            Route::get('/cart', [CartController::class, 'listCart'])->name('client.cart');
            
    // });
    
>>>>>>> fc5807a59d65c29f01def7a0693c838480361fc6
Route::prefix('clients')
    ->as('clients.')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');
        // Route::get('/create', [SanPhamController::class,'create'])->name('create');
        // Route::post('/store', [SanPhamController::class,'store'])->name('store');
        // Route::get('/show/{id}', [SanPhamController::class,'show'])->name('show');
        // Route::get('{id}/edit', [SanPhamController::class,'edit'])->name('edit');
        // Route::put('{id}/update', [SanPhamController::class,'update'])->name('update');
        // Route::delete('{id}/destroy', [SanPhamController::class,'destroy'])->name('destroy');

        // khuyến mãi
        // Route::post('/apply-coupon', [KhuyenMaiController::class, 'applyCoupon'])->name('apply.coupon');

        
    });





// Route::middleware('auth')->group(function (){
//     Route::get('/home', function () {
//         return view('home');
//     });
//     Route::get('/home2', function () {
//         return view('home');
//     });

//     Route::middleware('auth.admin')->group(function (){
//         route::get('/admin',function () {
//             return 'Đây là trang admin';
//         });
//     });
// });
