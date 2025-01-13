<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFromLogin()
    {
        return view('auth.login');
    }



    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string'
        ]);

        // Kiểm tra nếu người dùng tồn tại và mật khẩu khớp
        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->password === $credentials['password']) {
            // Đăng nhập người dùng
            Auth::login($user);
            return redirect()->intended('/');  // Chuyển đến trang đích 'clients'
        }

        return redirect()->back()->withErrors([
            'email' => 'Thông tin sai đăng nhập'
        ]);
    }

    public function showFromRegister()
    {
        return view('auth.register');
    }


    public function register(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ]);

    // Lưu mật khẩu trực tiếp mà không mã hóa
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password'], // Lưu mật khẩu mà không sử dụng Hash::make()
    ]);

    Auth::login($user);

    return redirect()->intended('login');
}

    //đăng xuất 
    public function logout(Request $request)
    {
        // Xóa giỏ hàng khỏi session khi đăng xuất
        session()->forget('cart');
        Auth::logout();
        return redirect('/');
    }

}
