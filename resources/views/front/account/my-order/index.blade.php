@extends('front.layout.master')

@section('title', 'Đơn hàng')

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
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Tổng giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $order )     
                                <tr>
                                    <td class="cart-pic first-row">
                                        <img src="{{ $order->orderDetails[0]->product->productImages[0]->path }}" alt="" style="height: 170px;">
                                    </td>
                                    <td class="cart-title first-row">
                                        <h5>
                                            {{ $order->orderDetails[0]->product->name }}

                                            @if (count($order->orderDetails) > 1)
                                                (và {{ count($order->orderDetails) }} sản phẩm khác)</h5>
                                            @endif
                                    </td>
                                    <td class="total-price first-row">{{ number_format(array_sum(array_column($order->orderDetails->toArray(), 'total_price')), 0, '', ',') }}₫</td>
                                    <td class="first-row">
                                        <a href="./account/my-order/{{ $order->id }}" class="btn">Chi tiết</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection