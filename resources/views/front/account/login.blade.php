@extends('front.layout.master')

@section('title', 'Login')

@section('body')

    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Đăng nhập</h2>

                        @if(session('notification'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('notification') }}
                            </div>
                        @endif

                        <form action="" method="POST">
                            @csrf
                            <div class="group-input">
                                <label for="email">Địa chỉ email</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu</label>
                                <input type="password" id="pass" name="password">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <a href="#" class="forget-pass">Quên mật khẩu ?</a>
                                </div>
                            </div>
                            <button class="site-btn login-btn" type="submit">Đăng nhập</button>
                        </form>
                        <div class="switch-login">
                            <a href="./account/register" class="or-login">hoặc đăng ký tài khoản</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection