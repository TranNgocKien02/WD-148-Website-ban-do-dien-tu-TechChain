<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $cartItemCount = 0;
            $subTotal = 0;
            $shipping = 0;
            $total = 0;
            $cartToDisplay = collect();

            if (Auth::check()) {
                $userId = Auth::id();
                $cart = Cart::query()->where('user_id', $userId)->get();
                $cartToDisplay = $cart->take(2);
                $cartItemCount = $cart->count();

                foreach ($cart as $item) {
                    $price = isset($item->productVariant->sanpham->gia_khuyen_mai) && $item->productVariant->sanpham->gia_khuyen_mai > 0
                        ? $item->productVariant->sanpham->gia_khuyen_mai
                        : $item->productVariant->sanpham->gia_san_pham;
                    $subTotal += $price * $item->so_luong;
                }

                $shipping = 20000;
                $total = $subTotal + $shipping;
            }

            $view->with([
                'cartItemCount' => $cartItemCount,
                'cartToDisplay' => $cartToDisplay,
                'subTotal' => $subTotal,
                'shipping' => $shipping,
                'total' => $total,
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
