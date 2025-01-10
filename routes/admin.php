<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ThongTinTrangWebController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\HangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\ThongKeController;
use App\Http\Controllers\Admin\TaiKhoanController;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\LienHeController;
use App\Http\Controllers\Admin\DanhMucController;

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


Route::middleware(['auth', 'auth.admin'])->prefix('admins')
    ->as('admins.')
    ->group(function () {
        Route::get('/', function () {
            return view('admins.dashboard');
        })->name('dashboard');

        Route::resource('coupons', CouponController::class);


        Route::prefix('danhmucs')
            ->as('danhmucs.')
            ->group(function () {
                Route::get('/', [DanhMucController::class, 'index'])->name('index');
                Route::get('/create', [DanhMucController::class, 'create'])->name('create');
                Route::post('/store', [DanhMucController::class, 'store'])->name('store');
                Route::get('{danhMuc}/edit', [DanhMucController::class, 'edit'])->name('edit');
                Route::put('{danhMuc}/update', [DanhMucController::class, 'update'])->name('update');
                Route::delete('{danhMuc}/destroy', [DanhMucController::class, 'destroy'])->name('destroy');
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
        Route::prefix('hangs')
            ->as('hangs.')
            ->group(function () {
                Route::get('/', [HangController::class, 'index'])->name('index');
                Route::get('/create', [HangController::class, 'create'])->name('create');
                Route::post('/store', [HangController::class, 'store'])->name('store');
                Route::get('{hang}/edit', [HangController::class, 'edit'])->name('edit');
                Route::put('{hang}/update', [HangController::class, 'update'])->name('update');
                Route::delete('{hang}/destroy', [HangController::class, 'destroy'])->name('destroy');
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

        Route::prefix('lien-he')
            ->as('lienhes.')
            ->group(function () {
                Route::get('/', [LienHeController::class, 'index'])->name('index');
                Route::get('{lienHe}/', [LienHeController::class, 'show'])->name('show');
                Route::post('/respond', [LienHeController::class, 'respond'])->name('respond');
                Route::delete('{lienHe}/destroy', [LienHeController::class, 'destroy'])->name('destroy');
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

        // route tài khoản
        Route::prefix('taikhoans')
            ->as('taikhoans.')
            ->group(function () {
                Route::get('/', [TaiKhoanController::class, 'index'])->name('index'); // List all accounts
                Route::get('/create', [TaiKhoanController::class, 'create'])->name('create'); // Show create form
                Route::post('/store', [TaiKhoanController::class, 'store'])->name('store'); // Store new account
                Route::get('/show/{id}', [TaiKhoanController::class, 'show'])->name('show'); // Show specific account
                Route::get('{id}/edit', [TaiKhoanController::class, 'edit'])->name('edit'); // Edit account
                Route::put('{id}/update', [TaiKhoanController::class, 'update'])->name('update'); // Update account
                Route::delete('{id}/destroy', [TaiKhoanController::class, 'destroy'])->name('destroy'); // Delete account
            });    

        // Route::get('/', [ThongTinTrangWebController::class, 'index'])->name('index'); // Display info
        // Route::post('/update', [ThongTinTrangWebController::class, 'update'])->name('update'); // Update info
    });