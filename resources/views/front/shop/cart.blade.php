@extends('front.layout.master')

@section('title', 'Giỏ hàng')

@section('body')

    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr data-rowid="{{ $cart->rowId }}">
                                        <td class="cart-pic first-row"><img style="height: 170px;"
                                                src="{{ $cart->options->images[0]->path }}"
                                                alt="">
                                        </td>
                                        <td class="cart-title first-row">
                                            <h5>{{ $cart->name }}</h5>
                                        </td>
                                        <td class="p-price first-row">{{ number_format($cart->price, 0, '', ',') }}₫</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input data-rowId="{{ $cart->rowId }}" type="text"
                                                        value="{{ $cart->quantity }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">
                                            {{ number_format($cart->price * $cart->quantity, 0, '', ',') }}₫</td>
                                        <td class="close-td first-row"><i onclick="removeCart('{{ $cart->rowId }}')"
                                                class="ti-close"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    @php
                                        $formattedTotal = strpos($total, '.') !== false ? rtrim(rtrim($total, '0'), '.') : $total;
                                    @endphp

                                    <li class="cart-total">Tổng tiền <span id="total">{{ $formattedTotal }}₫</span></li>
                                </ul>
                                <a href="./checkout" class="proceed-btn uppercase">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
