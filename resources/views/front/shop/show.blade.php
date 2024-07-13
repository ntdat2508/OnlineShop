@extends('front.layout.master')

@section('title', 'Sản phẩm')

@section('body')
    <div class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('front.shop.components.products-sidebar-filter')
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{ $product->productImages[0]->path ?? '' }}"
                                    alt="">
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach ($product->productImages as $productImage)
                                        <div class="pt active" data-imgbigurl="{{ $productImage->path }}">
                                            <img src="{{ $productImage->path }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $product->tag }}</span>
                                    <h3>{{ $product->name }} 
                                        <span>({{ displayColor($product->color) }}, {{ $product->size }})
                                    </span>
                                </h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->avgRating)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                    <span>({{ count($product->productRatings) }})</span>
                                </div>
                                <div class="pd-desc">
                                    <h4>{{ number_format($product->price, 0, '', ',') }}₫</h4>
                                </div>
                                <div class="pd-color">
                                    <h6>Màu: </h6>
                                    <div class="pd-color-choose">
                                        <div class="cc-item">
                                            <input type="radio" id="cc-{{ $product->color }}">
                                            <label for="cc-{{ $product->color }}" class="cc-{{ $product->color }}"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    <h6>Size: </h6>
                                    <div class="sc-item">
                                        <input type="radio" id="sm-{{ $product->size }}">
                                        <label for="sm-{{ $product->size }}">{{ $product->size }}</label>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <div class="quantity">
                                        <a href="javascript:addCart({{ $product->id }})" class="primary-btn pd-cart">Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>Danh mục:</span> {{ $product->Category->name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li><a href="#tab-1" class="active" data-toggle="tab" role="tab">Mô tả</a></li>
                                <li><a href="#tab-2" data-toggle="tab" role="tab">Chi tiết</a></li>
                                <li><a href="#tab-3" data-toggle="tab" role="tab">Đánh giá
                                        ({{ count($product->productRatings) }})</a></li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Đánh giá</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $product->avgRating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor

                                                        <span>({{ count($product->productRatings) }})</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Giá</td>
                                                <td>
                                                    <div class="p-price">{{ number_format($product->price, 0, '', ',') }}₫</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Số lượng</td>
                                                <td>
                                                    <div class="p-stock">{{ $product->quantity }} sản phẩm</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">
                                                        @foreach (array_unique(array_column($product->toArray(), 'size')) as $productSize)
                                                            {{ $productSize }}
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Màu</td>
                                                <td>
                                                    @foreach (array_unique(array_column($product->toArray(), 'color')) as $productColor)
                                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 50%; background-color: {{ $productColor }};"></span>

                                                    @endforeach
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{ count($product->productRatings) }} Đánh giá</h4>
                                        <div class="comment-option">
                                            @foreach ($product->productRatings as $productRating)
                                                <div class="co-item">
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $productRating->rating)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star=o"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <h5>{{ $productRating->name }}
                                                            <span>{{ date('M d, Y', strtotime($productRating->created_at)) }}</span>
                                                        </h5>
                                                        <div class="at-reply">{{ $productRating->evaluate }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="leave-comment">
                                            <h4>Để lại đánh giá</h4>
                                            <form action="" method="POST" class="comment-form">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="user_id"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Họ và tên" name="name" value="{{ \Illuminate\Support\Facades\Auth::user()->name ?? null }}" required>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email" name="email" value="{{ \Illuminate\Support\Facades\Auth::user()->email ?? null }}" required>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Bình luận" name="evaluate" required></textarea>

                                                        <div class="personal-rating">
                                                            <h6>Đánh giá của bạn</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating"
                                                                    value="5">
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating"
                                                                    value="4">
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star4" name="rating"
                                                                    value="3">
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating"
                                                                    value="2">
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating"
                                                                    value="1">
                                                                <label for="star1" title="text">1 stars</label>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="site-btn">Gửi đánh giá</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($relatedProducts as $product)
                    <div class="col-lg-3 col-sm-6">
                        @include('front.components.product-item')
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
