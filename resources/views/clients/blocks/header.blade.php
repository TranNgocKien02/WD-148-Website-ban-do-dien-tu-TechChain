<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
                            <li>
                                <div class="ht-setting-trigger"><span>Setting</span></div>
                                <div class="setting ht-setting">
                                    <ul class="ht-setting-list">
                                        <li><a href="login-register.html">My Account</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="login-register.html">Sign In</a></li>
                                        <li><a href="{{ route('logout') }}">Log Out</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Setting Area End Here -->
                            <!-- Begin Currency Area -->
                            <li>
                                <span class="currency-selector-wrapper">Currency :</span>
                                <div class="ht-currency-trigger"><span>USD $</span></div>
                                <div class="currency ht-currency">
                                    <ul class="ht-setting-list">
                                        <li><a href="#">EUR €</a></li>
                                        <li class="active"><a href="#">USD $</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Currency Area End Here -->
                            <!-- Begin Language Area -->
                            <li>
                                <span class="language-selector-wrapper">Language :</span>
                                <div class="ht-language-trigger"><span>English</span></div>
                                <div class="language ht-language">
                                    <ul class="ht-setting-list">
                                        <li class="active"><a href="#"><img src="images/menu/flag-icon/1.jpg"
                                                    alt="">English</a></li>
                                        <li><a href="#"><img src="images/menu/flag-icon/2.jpg"
                                                    alt="">Français</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Language Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img src="images/menu/logo/1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="#" class="hm-searchbox">
                        <input type="text" placeholder="Enter your search key ...">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="">
                                    <span class="cart-item-count wishlist-item-count">0</span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                {{-- @php
                                                $price = isset($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] > 0 ? $item['gia_khuyen_mai'] : $item['gia'];
                                                $subtotal = $price * $item['so_luong'];
                                            @endphp --}}
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>

                                    <span class="item-text"> {{ number_format($subTotal, 0, '', '.') }}đ
                                        <span class="cart-item-count">{{ $cartItemCount }}</span>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">

                                        @if (isset($cartToDisplay))
                                            @foreach ($cartToDisplay as $item)
                                                <li>
                                                    <a href="single-product.html" class="minicart-product-image">
                                                        <img src="{{ Storage::url($item->sanPham->hinh_anh) }}"
                                                            alt="cart products">
                                                    </a>
                                                    <div class="minicart-product-details">

                                                        <h6><a
                                                                href="single-product.html">{{ $item->sanPham->ten_san_pham }}</a>
                                                        </h6>
                                                        <span>
                                                            @if (isset($item->sanPham->gia_khuyen_mai) && $item->sanPham->gia_khuyen_mai > 0)
                                                                <del><span
                                                                        class="text-decoration-line-through">{{ number_format($item->sanPham->gia_san_pham, 0, '', '.') }}đ</span></del>
                                                                <br>
                                                                <span
                                                                    class="text-success">{{ number_format($item->sanPham->gia_khuyen_mai, 0, '', '.') }}đ</span>
                                                            @else
                                                                {{ number_format($item->sanPham->gia_san_pham, 0, '', '.') }}đ
                                                            @endif x {{ $item->so_luong }}

                                                        </span>
                                                    </div>
                                                    <button class="close" title="Remove">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </li>
                                            @endforeach
                                        @else
                                            <p>Giỏ hàng của bạn đang trống.</p>
                                        @endif
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL:
                                        <span>{{ number_format($subTotal, 0, '', '.') }}đ</span>
                                    </p>
                                    <div class="minicart-button">
                                        <a href="{{ route('cart-full.list')}}"
                                            class="li-button li-button-fullwidth li-button-dark">
                                            <span>View Full Cart</span>
                                        </a>
                                        <a href="checkout.html" class="li-button li-button-fullwidth">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav style="display: block;">
                            <ul>
                                <li class="dropdown-holder"><a href="{{ route('clients.index') }}">Home</a>
                                </li>
                                <li class="megamenu-holder"><a href="shop-left-sidebar.html">Shop</a>
                                    <ul class="megamenu hb-megamenu">
                                        {{-- @foreach ($danhMuc as $item)
                                                        <li><a href="">{{$item->ten_danh_muc}}</a>
                                                            <ul>
                                                                @foreach ($item->hangs as $hang)
                                                                    <li><a href="">{{$hang->ten_hang}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach  --}}
                                    </ul>
                                </li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
