<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // Chuyển hướng người dùng đến Google để đăng nhập
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
//     public function redirectToGoogle()
// {
//     try {
//         return Socialite::driver('google')->redirect();
//     } catch (\Exception $e) {
//         // Ghi log lỗi để kiểm tra thông báo cụ thể
//         \log::error('Google login error: ' . $e->getMessage());

//         // Hoặc trả về một thông báo lỗi cho người dùng
//         return redirect()->route('login')->with('error', 'Không thể kết nối với Google.');
//     }
// }


    // Xử lý callback từ Google sau khi người dùng đăng nhập thành công
    // public function handleGoogleCallback()
    // {
    //     $googleUser = Socialite::driver('google')->user();

    //     // Kiểm tra nếu người dùng đã đăng nhập thành công và có thông tin
    //     if ($googleUser) {
    //         // Lưu thông tin người dùng vào session hoặc xử lý tiếp theo
    //         session(['user' => [
    //             'name' => $googleUser->getName(),
    //             'email' => $googleUser->getEmail(),
    //             'avatar' => $googleUser->getAvatar(),
    //         ]]);

    //         return redirect('/home'); // Hoặc trang bạn muốn chuyển đến sau khi đăng nhập
    //     } else {
    //         return redirect('/login')->withErrors(['msg' => 'Không thể đăng nhập bằng Google']);
    //     }
    // }
    public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();
        if ($googleUser) {
            session(['user' => [
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
            ]]);
            return redirect('/clients');
        } else {
            return redirect('/login')->withErrors(['msg' => 'Không thể đăng nhập bằng Google']);
        }
    } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
        // Ghi log lỗi để dễ dàng kiểm tra
        \Log::error('Socialite InvalidStateException: ' . $e->getMessage());
        return redirect('/login')->withErrors(['msg' => 'Lỗi kết nối với Google. Vui lòng thử lại sau.']);
    }
}

}
