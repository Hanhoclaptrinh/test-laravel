<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('auth.register'); // chuyển hướng sang form đăng ký
    }

    // form đăng ký
    public function register(Request $request)
    {
        // kiểm tra giá trị người dùng nhập vào
        $request->validate([
            'username' => 'required|unique:users', // đảm bảo giá trị field này là duy nhất
            'email' => 'required|email|unique:users', // đảm bảo giá trị field này là duy nhất
            'password' => 'required|min:6' // đảm bảo pass ít nhất 6 kí tự
        ]);

        // tạo 1 bảng ghi mới trong bảng users với giá trị ở các trường vừa nhập
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password) // mã hóa pass
        ]);

        return redirect('/login')->with('success', 'Đăng ký thành công!'); // đăng ký thành công chuyển hướng sang trang login
    }

    // hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login'); // chuyển hướng sang trang đăng nhập
    }

    // form đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credentials)) { // phương thức Auth::attempt() sẽ kiểm tra xem thông tin đăng nhập (email và password) có đúng với bất kỳ người dùng nào trong cơ sở dữ liệu hay không
            return redirect('/'); // nếu true chuyển hướng người dùng đến trang chủ (/)
        }

        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // chuyển hướng trở về login
    }
}

