<?php

namespace App\Providers;

use App\Models\DanhMuc;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $danhMuc = DanhMuc::query()->where('trang_thai', true)->get();
        View::share('danhMuc', $danhMuc);


        // Chia sẻ tổng số lượng sản phẩm trong wishlist
        View::composer('*', function ($view) {
            $wishlistCount = 0;
            if (Auth::check()) {
                $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
            }
            $view->with('wishlistCount', $wishlistCount);
        });

    }
}
