<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $users = User::all(); // Fetch all users
    return view('admins.taikhoans.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.taikhoans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // if ($request->isMethod('POST')) {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email|unique:users,email', // Kiểm tra email duy nhất
    //         'name' => 'required|string|max:255',
    //         'password' => 'required|min:8|confirmed',
    //         'phone' => 'nullable|string|max:15',
    //         'address' => 'nullable|string|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $params = $request->only(['name', 'email', 'password', 'role', 'phone', 'address']);
        
    //     $params['password'] = Hash::make($request->password);  // Hash password before saving

    //     // Tạo bản ghi mới trong bảng users
    //     User::create($params);

    //     // Redirect về trang index với thông báo thành công
    //     return redirect()->route('admins.taikhoans.index')->with('success', 'ADD NEW OK');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admins.taikhoans.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed', // Password is optional for update, but if present, validate
            'role' => 'required|in:admin,user',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admins.taikhoans.edit', $user->id)
                             ->withErrors($validator)
                             ->withInput();
        }

        // Update the user
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password); // Update password if provided
        }

        $user->role = $request->role;
        $user->save();

        // Log out the user if they downgrade their own role
        if ($user->role !== User::ROLE_ADMIN && auth()->id() === $user->id) {
            auth()->logout(); // Log out the user if they downgrade their own role
            return redirect()->route('login')->with('error', 'Your role has been changed. You need to log in again.');
        }

        return redirect()->route('admins.taikhoans.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admins.taikhoans.index')->with('success', 'User deleted successfully.');
    }
}
