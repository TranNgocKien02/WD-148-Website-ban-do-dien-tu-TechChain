<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Gọi mua hàng:</span><a href="#">(+84) 961 215 069</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        {{-- <ul class="ht-menu">
                            <li>
                                <div class="ht-setting-trigger"><span>Cài đặt</span></div>
                                <div class="setting ht-setting">
                                    <ul class="ht-setting-list">
                                        <li><a href="login-register.html">My Account</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="{{route('login')}}">Sign In</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <span class="language-selector-wrapper">Ngôn ngữ :</span>
                                <div class="ht-language-trigger"><span>Tiếng việt</span></div>
                                <div class="language ht-language">
                                    <ul class="ht-setting-list">
                                        <li class="active"><a href="#"><img src="{{asset('lib/images/menu/flag-icon/1.jpg')}}"
                                                    alt="">English</a></li>
                                        <li><a href="#"><img src="{{asset('lib/images/menu/flag-icon/2.jpg')}}"
                                                    alt="">Tiếng việt</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul> --}}
                        <ul class="ht-setting-list">
                            @if(auth()->check())
                                <!-- Hiển thị tên người dùng nếu đã đăng nhập -->
                                <li>
                                    <a href="{{ route('profile') }}">
                                        {{ auth()->user()->name }}
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('logout') }}">Logout</a>
                                </li> --}}
                            @else
                                <!-- Hiển thị "Sign In" nếu chưa đăng nhập -->
                                <li><a href="{{ route('login') }}">Sign In</a></li>
                            @endif
                        </ul>
                        
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->

    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav>
                            <ul>
                                <li class="logo-nav">
                                    E-SMART
                                    <!-- Begin Header Logo Area -->
                                    {{-- <div class="logo pb-sm-30 pb-xs-30">
                                                        <a href="index.html">
                                                            
                                                            <img src="images/menu/logo/1.jpg" alt="">
                                                        </a>
                                                    </div> --}}
                                    <!-- Header Logo Area End Here -->
                                </li>
                                <li class="logo-nav"><a href="{{route('clients.index')}}">Trang chủ</a>
                                </li>


                                <li class="menu-link megamenu-static-holder pages logo-nav">
                                    <a href="index.html">Danh mục</a>
                                    <ul class="dropdown">
                                        <!-- Vòng lặp qua các danh mục chính -->
                                        @foreach ($listDanhMuc as $danhMuc)
                                        <li class="dropdown-item">
                                            <a class="megamenu-blog" href="blog-left-sidebar.html">{{ $danhMuc->ten_danh_muc }}</a>
                                            <!-- Danh mục con -->
                                            <ul class="sub-dropdown">
                                                <li>{{ $danhMuc->ten_danh_muc }}</li>
                                                @foreach ($danhMuc->hangs as $hang)
                                                <li><a href="blog-2-column.html">{{ $hang->ten_hang }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                
                                        <!-- Thông tin -->
                                        <li class="dropdown-item">
                                            <a href="#">Thông tin</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="blog-2-column.html">Tư vấn chọn mua</a></li>
                                                <li><a href="blog-2-column.html">Khuyến mãi</a></li>
                                                <li><a href="blog-2-column.html">Tìm địa chỉ cửa hàng</a></li>
                                                <li><a href="blog-2-column.html">Tìm hiểu về mua trả góp</a></li>
                                                <li><a href="blog-2-column.html">Tra cứu bảo hành</a></li>
                                            </ul>
                                        </li>
                                
                                        <!-- Dịch vụ tiện ích -->
                                        <li class="dropdown-item">
                                            <a href="#">Dịch vụ tiện ích</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="blog-2-column.html">Vệ sinh điều hòa</a></li>
                                                <li><a href="blog-2-column.html">Sim số, thẻ cào</a></li>
                                                <li><a href="blog-2-column.html">Đóng tiền trả góp</a></li>
                                                <li><a href="blog-2-column.html">Vay tiền mặt CAKE</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                

                                <li>
                                    <!-- Begin Header Middle Right Area -->
                                    <form action="#" class="hm-searchbox">
                                        <div>
                                            <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                        <input class="hm-searchbox-text" type="text" placeholder="Bạn cần tìm gì? ">
                                    </form>
                                    <!-- Header Middle Searchbox Area End Here -->
                                </li>
                                <li>
                                    <!-- Begin Header Middle Right Area -->
                                    <div class="header-middle-right">
                                        <ul class="hm-menu">
                                            <!-- Begin Header Middle Wishlist Area -->
                                            <li class="hm-wishlist">
                                                <a href="wishlist.html">
                                                    <span class="cart-item-count wishlist-item-count">0</span>
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            </li>
                                            <!-- Header Middle Wishlist Area End Here -->

                                            <!-- Begin Header Mini Cart Area -->
                                            <li class="hm-minicart">
                                                    <div class="hm-minicart-trigger">
                                                        <span class="item-icon"></span>
                                                        <span class="item-text">£80.00
                                                            <span href="{{route('cart.list')}}" class="cart-item-count">{{ session('cart') ? count(session('cart')) : '0' }}</span>
                                                        </span>
                                                    </div>
                                                <span></span>
                                                <div class="minicart">
                                                    <ul class="minicart-product-list">
                                                        <li>
                                                            <a href="single-product.html"
                                                                class="minicart-product-image">
                                                                <img src="{{asset('lib/images/product/small-size/5.jpg')}}"
                                                                    alt="cart products">
                                                            </a>
                                                            <div class="minicart-product-details">
                                                                <h6><a href="single-product.html">Aenean eu
                                                                        tristique</a></h6>
                                                                <span>£40 x 1</span>
                                                            </div>
                                                            <button class="close" title="Remove">

                                                                <i class="fa fa-close"></i>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <a href="single-product.html"
                                                                class="minicart-product-image">
                                                                <img src="{{asset('lib/images/product/small-size/6.jpg')}}"
                                                                    alt="cart products">
                                                            </a>
                                                            <div class="minicart-product-details">
                                                                <h6><a href="single-product.html">Aenean eu
                                                                        tristique</a></h6>
                                                                <span>£40 x 1</span>
                                                            </div>
                                                            <button class="close" title="Remove">
                                                                <i class="fa fa-close"></i>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                    <p class="minicart-total">SUBTOTAL: <span>£80.00</span></p>
                                                    <div class="minicart-button">
                                                        <a href="{{route('cart.list')}}"
                                                            class="li-button li-button-fullwidth li-button-dark">
                                                            <span>View Full Cart</span>
                                                        </a>
                                                        <a href="{{route('donhangs.index')}}" class="li-button li-button-fullwidth">
                                                            <span>Checkout</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- Header Mini Cart Area End Here -->
                                </li>

                            </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                    <!-- Header Middle Right Area End Here -->
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
<!-- Header Area End Here -->
