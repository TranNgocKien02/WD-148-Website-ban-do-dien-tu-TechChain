<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Core\Authentication\Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected function resetPassword($user, $password)
{
    $user->password = $password; // Gán trực tiếp mật khẩu
    $user->save(); // Lưu lại

    // Đăng nhập người dùng (nếu cần)
    // Auth::login($user);
}

}
