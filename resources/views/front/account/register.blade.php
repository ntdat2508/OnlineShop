@extends('front.layout.master')

@section('title', 'Login')

@section('body')

    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Đăng ký tài khoản</h2>

                        @if (session('notification'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('notification') }}
                            </div>
                        @endif

                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" id="email" name="name">
                            </div>
                            <div class="group-input">
                                <label for="username">Địa chỉ email</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu</label>
                                <input type="password" id="pass" name="password">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Xác nhận mật khẩu</label>
                                <input type="password" id="con-pass" name="password_confirmation">
                            </div>
                            <button class="site-btn register-btn" type="submit">Đăng ký</button>
                        </form>
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">hoặc Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection