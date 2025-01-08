<?php

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
