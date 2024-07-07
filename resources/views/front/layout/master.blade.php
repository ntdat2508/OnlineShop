<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css">
    <link rel="stylesheet" href="front/css/themify-icons.css">
    <link rel="stylesheet" href="front/css/elegant-icons.css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="front/css/nice-select.css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css">
    <link rel="stylesheet" href="front/css/slicknav.min.css">
    <link rel="stylesheet" href="front/css/app.css">
</head>

<body>
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope"></i>
                        admin@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i>
                        0989483343
                    </div>
                </div>
                <div class="ht-right">

                    @if (Auth::check())
                        <a href="#" class="login-panel" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-user"></i>
                            {{ Auth::user()->name }} - Đăng xuất
                        </a>

                        <form id="logout-form" action="./account/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="./account/login" class="login-panel">
                            <i class="fa fa-user"></i>
                            Đăng nhập
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <img src="front/img/logo1.png" style="height:50px;" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <form action="shop">
                            <div class="advanced-search relative">
                                <div class="category-btn">Tên sản phẩm</div>
                                <div class="input-group">
                                    <input name="search" type="text" placeholder="Tìm kiếm...">
                                    <button class="pointer-event-none"><i class="ti-search"></i></button>
                                </div>
                            </div>

                            <div class="search-result">
                                <ul>
                                    <li class="">Sản phẩm 1</li>
                                    <li class="">Sản phẩm 2</li>
                                    <li class="">Sản phẩm 3</li>
                                    <li class="">Sản phẩm 4</li>
                                    <li class="">Sản phẩm 5</li>
                                    <li class="hidden">Sản phẩm tìm kiếm không tồn tại</li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="./cart">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count">{{ Cart::count() }}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach (Cart::content() as $cart)
                                                    <tr data-rowId="{{ $cart->rowId }}">
                                                        <td class="si-pic">
                                                            <img style="height: 70px;"
                                                                src="{{ $cart->options->images[0]->path }}"
                                                                alt="">
                                                        </td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>{{ $cart->price }} vnđ x {{ $cart->quantity }}</p>
                                                                <h6>{{ $cart->name }}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i onclick="removeCart('{{ $cart->rowId }}')"
                                                                class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>Tổng tiền:</span>
                                        <h5>{{ Cart::total() }} vnđ</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="./cart" class="primary-btn view-card">Giỏ hàng</a>
                                        <a href="./checkout" class="primary-btn check-out">Thanh toán</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                    </div>
                </div>
                <nav class="nav-menu">
                    <ul>
                        <li class="{{ request()->segment(1) == '' ? 'active' : '' }}"><a href="./">Trang chủ</a></li>
                        <li class="{{ request()->segment(1) == 'shop' ? 'active' : '' }}"><a
                                href="{{ route('shop') }}">Sản phẩm</a></li>
                        <li>
                            <a href="">Danh mục</a>
                            <ul class="dropdown">
                                <li><a href="">Thời trang nam</a></li>
                                <li><a href="">Thời trang nữ</a></li>
                                <li><a href="">Thời trang trẻ em</a></li>
                            </ul>
                        </li>
                        <li><a href="./account/my-order">Đơn hàng</a></li>
                        <li><a href="contact.html">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    @yield('body')

    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <ul>
                            <li>Hà Đông - Hà Nội</li>
                            <li>Số điện thoại: 0322452411</li>
                            <li>Email: admin@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Checkout</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Checkout</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join our newsletter now</h5>
                        <p>Get email updates about our latest shop</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="enter your mail">
                            <button>Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="front/js/jquery-3.3.1.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery-ui.min.js"></script>
    <script src="front/js/jquery.countdown.min.js"></script>
    <script src="front/js/jquery.nice-select.min.js"></script>
    <script src="front/js/jquery.zoom.min.js"></script>
    <script src="front/js/jquery.dd.min.js"></script>
    <script src="front/js/jquery.slicknav.js"></script>
    <script src="front/js/owl.carousel.min.js"></script>
    <script src="front/js/owlcarousel2-filter.min.js"></script>
    <script src="front/js/app.js"></script>
</body>

</html>
