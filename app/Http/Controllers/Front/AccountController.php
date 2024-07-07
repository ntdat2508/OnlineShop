<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $userService;
    private $orderService;

    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function login() {
        return view('front.account.login');
    }

    public function checkLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => Constant::user_role_client,
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('');
        } else {
            return back()->with('notification', 'ERROR: Email hoặc mật khẩu không chính xác');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('front.account.login');
    }

    public function register() {
        return view('front.account.register');
    }

    public function postRegister(Request $request) {
        if($request->password != $request->password_confirmation) {
            return back()->with('notification', 'Error: Confirm password does not match');
        }

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => Constant::user_role_client,
        ];

        $this->userService->create($data);

        return redirect('account/login')->with('notification', 'Register success! Please login');
    }

    public function myOrderIndex() {
        $orders = $this->orderService->getOrderByUserId(Auth::id());

        return view('front.account.my-order.index', compact('orders'));
    }

    public function myOrderShow($id) {
        $order = $this->orderService->find($id);
        return view('front.account.my-order.show', compact('order'));
    }
}