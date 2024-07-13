@extends('admin.layout.master')

@section('title', 'Đơn hàng')

@section('body')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Đơn hàng
                        <div class="page-title-subheading">
                            Cập nhật trạng thái.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="table-responsive">
                            <h2 class="text-center">Danh sách sản phẩm</h2>
                            <hr>
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Giá</th>
                                        <th class="text-center">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderDetails as $orderDetail)
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img style="height: 60px;"
                                                                    data-toggle="tooltip" title="Hình ảnh"
                                                                    data-placement="bottom"
                                                                    src="{{ $orderDetail->product->productImages[0]->path }}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{ $orderDetail->product->name }} ({{ displayColor($orderDetail->product->color) }}, {{ $orderDetail->product->size }})</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $orderDetail->quantity }}
                                            </td>
                                            <td class="text-center">{{ number_format($orderDetail->amount, 0, '', ',') }}₫</td>
                                            <td class="text-center">{{ number_format($orderDetail->total_price, 0, '', ',') }}₫</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <form action="/admin/order/{{ $order->id }}" method="POST">
                            @csrf
                            @method('PUT')

                            @include('admin.components.notification')

                            <h2 class="text-center mt-5">Thông tin đơn hàng</h2>
                            <hr>
                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">
                                    Họ và tên
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{ $order->name }}</p>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{ $order->email }}</p>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="phone" class="col-md-3 text-md-right col-form-label">Số điện thoại</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{ $order->phone }}</p>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="address" class="col-md-3 text-md-right col-form-label">
                                    Địa chỉ</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{ $order->address }}</p>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="payment_type" class="col-md-3 text-md-right col-form-label">Thanh toán</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{ $order->payment_type }}</p>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="status" class="col-md-3 text-md-right col-form-label">Trạng thái</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="status" id="status" class="form-control">
                                        <option value="">-- Trạng thái --</option>
                                        @foreach (\App\Utilities\Constant::$order_status as $key => $value)
                                            <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="./admin/order" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Huỷ</span>
                                    </a>

                                    <button type="submit"
                                        class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Lưu</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection