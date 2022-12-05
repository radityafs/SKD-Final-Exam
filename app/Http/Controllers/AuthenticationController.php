<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:50',
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
            'is_active' => 0,
            'remember_token' => $request->_token,
        ]);

        return redirect('login')->with('success', 'Berhasil mendaftar');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:50',
            'g-recaptcha-response' => 'required|recaptchav3:login,0.5'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect("/admin/dashboard");
            } else {
                if (Auth::user()->isActive == 1) {
                    return redirect("/");
                } else {
                    // Auth::logout();
                    return redirect("/verify")->back()->withErrors(['error' => "Akun anda belum diaktifkan, silahkan aktivasi akun anda terlebih dahulu"]);
                }
            }
        }

        return back()->with('error', 'Password atau email salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
