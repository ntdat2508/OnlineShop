@extends('front.layout.master')

@section('title', 'Trang chủ')

@section('body')
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1>Black friday</h1>
                            <p>Siêu sale black friday với những ưu đãi bất ngờ</p>
                            <a href="#" class="primary-btn">Mua hàng ngay</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>58%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1>Black friday</h1>
                            <p>Siêu sale black friday với những ưu đãi bất ngờ</p>
                            <a href="#" class="primary-btn">Mua hàng ngay</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>58%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                @foreach ($featureProducts->take(3) as $category)
                    <div class="col-lg-4">
                        <div class="single-banner">
                            <img src="front/img/banner-2.jpg" alt="">
                            <div class="inner-text">
                                <h4>{{ $category->name }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @foreach ($featureProducts as $category)
        <section class="women-banner spad">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="product-large set-bg" data-setbg="front/img/products/women-large.jpg">
                            <h2>{{ $category->name }}</h2>
                            <a href="#">Khám phá thêm</a>
                        </div>
                    </div>
                    <div class="col-lg-8 offset-lg-1">
                        <div class="product-slider owl-carousel women">
                            @foreach ($category->products as $product)
                                @include('front.components.product-item')
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Bài đăng nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="front/img/blog/blog-1.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    29 tháng 5, 2024
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="">
                                <h4>Phong cách thời trang đẹp nhất tuần lễ Luân Đôn</h4>
                            </a>
                            <p>Phong cách thời trang đẹp nhất tuần lễ Luân Đôn</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="front/img/blog/blog-1.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    29 tháng 5, 2024
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="">
                                <h4>Phong cách thời trang đẹp nhất tuần lễ Luân Đôn</h4>
                            </a>
                            <p>Phong cách thời trang đẹp nhất tuần lễ Luân Đôn</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="front/img/blog/blog-1.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    29 tháng 5, 2024
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="">
                                <h4>Phong cách thời trang đẹp nhất tuần lễ Luân Đôn</h4>
                            </a>
                            <p>Phong cách thời trang đẹp nhất tuần lễ Luân Đôn</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Ship</h6>
                                <p>Free Ship cho tất cả đơn hàng của khách hàng mới</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Giao hàng đúng hạn</h6>
                                <p>Đơn hàng luôn được giao đúng hạn</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Thanh toán bảo mật</h6>
                                <p>Thông tin thanh toán sẽ được bảo mật</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
    