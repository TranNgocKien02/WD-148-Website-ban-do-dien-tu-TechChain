<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
// <<<<<<< HEAD
//     // Hiển thị form đăng nhập
//     public function showFromLogin()
//     {
//         return view('auth.login');
//     }

//     // Xử lý đăng nhập
//     public function login(Request $request)
//     {
//         $credentials = $request->validate([
//             'email' => 'required|string|email|max:255',
//             'password' => 'required|string',
//         ]);

//         if (Auth::attempt($credentials)) {
//             return redirect()->intended('home'); // Điều hướng tới trang đích
//         }

//         return redirect()->back()->withErrors([
//             'email' => 'Thông tin đăng nhập không đúng.',
//         ]);
//     }

//     // Hiển thị form đăng ký
// =======
    //đăng nhập 

    public function showFromLogin()
    {
        return view('auth.login');
    }

     //đăng nhập 
    //  public function login(Request $request){
    //     $user = $request->
    //     // only('email','password');
    //     validate([
    //         'email' => 'required|string|email|max:255',
    //         'password' => 'required|string'
    //     ]);
    //     // dd($user);
    //     if (Auth::attempt($user)) {
    //         return redirect()->intended('home');
    //     }

    //     return redirect()->back()->withErrors([
    //         'email' => 'Thông tin sai đăng nhập ' 
    //     ]);
    //  }
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
        return redirect()->intended('clients');  // Chuyển đến trang đích 'clients'
    }

    return redirect()->back()->withErrors([
        'email' => 'Thông tin sai đăng nhập'
    ]);
}

    //đăng nhập 

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|string|email|max:255',
    //         'password' => 'required|string'
    //     ]);
    //     // $user = $request->
    //     //     // only('email','password');
    //     //     validate([
    //     //         'email' => 'required|string|email|max:255',
    //     //         'password' => 'required|string'
    //     //     ]);
    //     // // dd($user);
    //     // if (Auth::attempt($user)) {
    //     //     return redirect()->intended('home');
    //     // }
    //     // only('email','password');
    //     // validate([
    //     //     'email' => 'required|string|email|max:255',
    //     //     'password' => 'required|string'
    //     // ]);

    //     // Kiểm tra nếu người dùng tồn tại và mật khẩu khớp
    //     $user = User::where('email', $credentials['email'])->first();

    //     if ($user && $user->password === $credentials['password']) {
    //         // Đăng nhập người dùng
    //         Auth::login($user);
    //         return redirect()->intended('clients');  // Chuyển đến trang đích 'clients'
    //     }

    //     return redirect()->back()->withErrors([

    //         'email' => 'Thông tin sai đăng nhập '
    //     ]);
    // }
   
    //đăng nhập 
    // public function login(Request $request)
    // {
    //     $user = $request->
    //         // only('email','password');
    //         // dd($user);
    //         // if (Auth::attempt($user)) {
    //         //     return redirect()->intended('home');
    //         // }
    //         // only('email','password');
    //         validate([
    //             'email' => 'required|string|email|max:255',
    //             'password' => 'required|string'
    //         ]);

    //     return redirect()->intended('home');


    //     return redirect()->back()->withErrors([
    //         'email' => 'Thông tin sai đăng nhập '
    //     ]);
    // }

    // đăng ký
    public function showFromRegister()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), // Mã hóa mật khẩu
        ]);

        Auth::login($user);

        return redirect()->intended('home');
    }

    // // Đăng xuất
    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('/login');
    // }
// }
// =======
    
//     public function register(Request $request)
// {
//     $data = $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255',
//         'password' => 'required|string|min:8',
//     ]);

//     // Lưu mật khẩu trực tiếp mà không mã hóa
//     $user = User::create([
//         'name' => $data['name'],
//         'email' => $data['email'],
//         'password' => $data['password'], // Không sử dụng Hash::make()
//     ]);

//     Auth::login($user);

//     return redirect()->intended('home');
// }


      //đăng xuất 
    public function logout(Request $request){
        // Xóa giỏ hàng khỏi session khi đăng xuất
        session()->forget('cart');
        Auth::logout() ;
        return redirect('/login');
    }
}
// >>>>>>> main
