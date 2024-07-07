@extends('front.layout.master')

@section('title', 'Checkout')

@section('body')

    <div class="checkout-section spad">
        <div class="container">
            <form action="" method="POST" class="checkout-form">
                @csrf
                <div class="row">
                    @if (Cart::count() > 0)
                        <div class="col-lg-6">
                            <h4>Chi tiết đơn hàng</h4>
                            <div class="row">
                                
                                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? '' }}">

                                <div class="col-lg-12">
                                    <label for="first">Họ và tên <span style="color: red;">*</span></label>
                                    <input type="text" id="first" name="fullname" value="{{ Auth::user()->name ?? '' }}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="street">Địa chỉ <span style="color: red;">*</span></label>
                                    <input type="text" id="street" class="street-first" name="address" value="{{ Auth::user()->address ?? '' }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Email <span style="color: red;">*</span></label>
                                    <input type="text" id="email" name="email" value="{{ Auth::user()->email ?? '' }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone">Số điện thoại <span style="color: red;">*</span></label>
                                    <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="place-order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Sản phẩm <span>Tổng giá</span></li>

                                        @foreach ($carts as $cart)
                                            <li class="fw-normal">
                                                {{ $cart->name }} X {{ $cart->quantity }}
                                                <span>{{ $cart->price * $cart->quantity }} vnđ</span>
                                            </li>
                                        @endforeach

                                        <li class="total-price">Tổng tiền <span>{{ $total }} vnđ</span></li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Thanh toán khi nhận hàng
                                                <input type="radio" name="payment_type" value="Thanh toán khi nhận hàng" id="pc-check"
                                                    checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="order-btn">
                                        <button type="submit" class="site-btn place-btn">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12">
                            <h4>Đơn hàng của bạn đang trống</h4>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

@endsection
