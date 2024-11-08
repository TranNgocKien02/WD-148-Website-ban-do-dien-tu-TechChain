<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\CheckRoleAdminMiddleware;
use App\Http\Controllers\client\ProductController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\OrderController;

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




route::get('login', [AuthController::class, 'showFromLogin']);
route::post('login', [AuthController::class, 'login'])->name('login');

route::get('register', [AuthController::class, 'showFromRegister']);
route::post('register', [AuthController::class, 'register'])->name('register');
route::post('logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth');
// route::get('/admin',function () {
//     return 'Đây là trang admin';
// })->middleware(['auth','auth.admin']);


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product-detail/{id}', [ProductController::class, 'chiTietSanPham'])->name('product-detail');
Route::post('/cart/add', [CartController::class, 'addCart'])->name('cart.add');
Route::get('/cart/list', [CartController::class, 'listCart'])->name('cart.list');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');



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
                Route::get('/show/{id}', [SanPhamController::class, 'show'])->name('show');
                Route::get('{id}/edit', [SanPhamController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [SanPhamController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [SanPhamController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('donhangs')
        ->as('donhangs.')
        ->group(function () {
            Route::get('/', [DonHangController::class, 'index'])->name('index');
            Route::get('/show/{id}', [DonHangController::class, 'show'])->name('show');
            Route::put('{id}/update', [DonHangController::class, 'update'])->name('update');
            Route::delete('{id}/destroy', [DonHangController::class, 'destroy'])->name('destroy');
    });
    });
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
