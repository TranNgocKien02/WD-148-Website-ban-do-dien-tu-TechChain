<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //đăng nhập 
    // public function showFromLogin()
    // {
    //     return view('auth.login');
    // }

<<<<<<< HEAD
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

=======
    //đăng nhập 

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
>>>>>>> fa8bc58be730b9a963dbfba373eb40bf1b6720d0

    //đăng ký
    public function showFromRegister()
    {
        return view('auth.register');
    }

<<<<<<< HEAD
     //đăng ký 
    //  public function register(Request $request){
    //     $data = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255',
    //         'password' => 'required|string|min:8|',
    //     ]);

    //     $user = User::query()->create($data) ;
        
    //     Auth::login($user);

    //     return redirect()->intended('home') ;
    //     #

    //  }
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
        'password' => $data['password'], // Không sử dụng Hash::make()
    ]);

    Auth::login($user);

    return redirect()->intended('home');
}


      //đăng xuất 
    public function logout(Request $request){
        // Xóa giỏ hàng khỏi session khi đăng xuất
    session()->forget('cart');
        Auth::logout() ;
        return redirect('/login');

=======
    //đăng ký 
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
            'password' => $data['password'], // Không sử dụng Hash::make()
        ]);


        $user = User::query()->create($data);

        Auth::login($user);

        return redirect()->intended('home');
        return redirect()->intended('home');
        #

>>>>>>> fa8bc58be730b9a963dbfba373eb40bf1b6720d0
    }
    //đăng xuất 
<<<<<<< HEAD
=======

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
>>>>>>> fa8bc58be730b9a963dbfba373eb40bf1b6720d0
}
