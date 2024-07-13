@extends('front.layout.master')

@section('title', 'Chi tiết đơn hàng')

@section('body')

    {{-- Breadcrumb section  --}}
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href=""><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- My order section --}}
    <div class="checkout-section spad">
        <div class="container">
            <form class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">
                                Mã đặt hàng:
                                <b>#{{ $order->id }}</b>
                            </a>
                        </div>
                        <h4>Chi tiết đơn hàng</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="first">Họ và tên</label>
                                <input type="text" id="first" disabled value="{{ $order->fullname }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Địa chỉ</label>
                                <input type="text" id="street" class="street-first" disabled
                                    value="{{ $order->address }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email</label>
                                <input type="text" id="email" disabled value="{{ $order->email }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" id="phone" disabled value="{{ $order->phone }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">
                                Trạng thái:
                                <b>{{ \App\Utilities\Constant::$order_status[$order->status] }}</b>
                            </a>
                        </div>
                        <div class="place-order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Sản phẩm <span>Tổng giá</span></li>

                                    @foreach ($order->orderDetails as $orderDetail)
                                        <li class="fw-normal">
                                            {{ $orderDetail->product->name }} X {{ $orderDetail->quantity }}
                                            <span>{{ number_format($orderDetail->total_price, 0, '', ',') }}₫</span>
                                        </li>
                                    @endforeach

                                    <li class="total-price">Tổng tiền
                                        <span>{{ number_format(array_sum(array_column($order->orderDetails->toArray(), 'total_price')), 0, '', ',') }}₫</span>
                                    </li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Thanh toán khi nhận hàng
                                            <input disabled type="radio" name="payment_type" value="Thanh toán khi nhận hàng"
                                                id="pc-check" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
