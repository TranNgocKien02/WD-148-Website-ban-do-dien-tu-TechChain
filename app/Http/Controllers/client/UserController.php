<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function showProfile()
    {
        // Trả về view hiển thị thông tin người dùng
        $this->shareCartData(); // Gọi phương thức chia sẻ dữ liệu giỏ hàng

        return view('clients.user.profile', [
            'user' => auth()->user(), // Lấy thông tin người dùng đang đăng nhập
        ]);
    }
     // Show Edit Profile Page
     public function editProfile()
     {
         $user = Auth::user(); // Get logged-in user's information
         return view('clients.user.edit_profile', compact('user'));
     }
 
     // Update Profile Information
     public function update(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15',  // Optional phone validation
            'address' => 'required|string|max:255',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');

        // Save the updated user information
        $user->save();

        // Redirect back with a success message
        return redirect()->route('profile')->with('success', 'Thông tin cá nhân đã được cập nhật');
    }
}
