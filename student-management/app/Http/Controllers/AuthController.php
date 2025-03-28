<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // form dang nhap
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // kiem tra thong tin dang nhap voi db
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // tao lai session
            return redirect()->intended(route('students.index')); // cho phep vao trang quan ly thong tin sinh vien sau khi dang nhap thanh cong
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không đúng.',
        ])->onlyInput('email');
    }

    // dang xuat
    public function logout(Request $request)
    {
        Auth::logout(); // xoa thong tin xac thuc
        $request->session()->invalidate(); // huy session 
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
