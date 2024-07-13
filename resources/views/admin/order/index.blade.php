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
                            Danh sách đơn hàng.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th>Sản phẩm</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="text-center text-muted">#{{ $order->id }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img style="height: 60px;"
                                                                data-toggle="tooltip" title="Hình ảnh"
                                                                data-placement="bottom"
                                                                src="{{ $order->orderDetails[0]->product->productImages[0]->path }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $order->name }}</div>
                                                        <div class="widget-subheading opacity-7">
                                                            {{ $order->orderDetails[0]->product->name }} ({{ displayColor($order->orderDetails[0]->product->color) }}, {{ $order->orderDetails[0]->product->size }})
                                                            @if (count($order->orderDetails) > 1)
                                                                (và {{ count($order->orderDetails) }} sản phẩm khác)
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $order->address }}
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-dark">
                                                {{ \App\Utilities\Constant::$order_status[$order->status] }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="./admin/order/{{ $order->id }}"
                                                class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                Chi tiết
                                            </a>
                                            <a href="./admin/order/{{ $order->id }}/edit" title="Cập nhật"
                                                class="btn btn-outline-warning border-0 btn-sm">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        {{$orders->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection