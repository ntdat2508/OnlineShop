<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getLogin() {
        return view('admin.login');
    }

    public function postLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => [Constant::user_role_admin, Constant::user_role_admin],
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('admin');
        } else {
            return back()->with('notification', 'ERROR: Email hoặc mật khẩu không chính xác');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }
}
