@extends('front.layout.master')

@section('title', 'Shop')

@section('body')

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html">
                            <i class="fa ha-home"></i>
                            Trang chủ
                        </a>
                        <span>Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 products-sidebar-filter">
                    @include('front.shop.components.products-sidebar-filter')
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                    <div class="select-option">
                                        <select name="sort_by" onchange="this.form.submit();" class="sorting">
                                            <option {{ request('sort_by') == 'lastest' ? 'selected' : '' }} value="lastest">
                                                Sắp xếp: Mới nhất
                                            </option>
                                            <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">
                                                Sắp xếp: Cũ nhất
                                            </option>
                                            <option {{ request('sort_by') == 'name-ascending' ? 'selected' : '' }} value="name-ascending">
                                                Sắp xếp: Tên A-Z
                                            </option>
                                            <option {{ request('sort_by') == 'name-descending' ? 'selected' : '' }} value="name-descending">
                                                Sắp xếp: Tên Z-A
                                            </option>
                                            <option {{ request('sort_by') == 'price-ascending' ? 'selected' : '' }} value="price-ascending">
                                                Sắp xếp: Giá tăng dần
                                            </option>
                                            <option {{ request('sort_by') == 'price-descending' ? 'selected' : '' }} value="price-descending">
                                                Sắp xếp: Giá giảm dần
                                            </option>
                                        </select>
                                        <select name="show" onchange="this.form.submit();" class="p-show">
                                            <option {{ request('show') == '3' ? 'selected' : '' }} value="3">Hiển thị: 3</option>
                                            <option {{ request('show') == '9' ? 'selected' : '' }} value="9">Hiển thị: 9</option>
                                            <option {{ request('show') == '15' ? 'selected' : '' }} value="15">Hiển thị: 15</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">

                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">

                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    @include('front.components.product-item')
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
