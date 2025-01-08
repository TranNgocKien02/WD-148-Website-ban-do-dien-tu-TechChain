@extends('layouts.client')

@section('css')
@endsection
@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li class="active">Sản phẩm chi tiết</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            @foreach ($bienThes as $bienThe)
                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="{{ Storage::url($bienThe->anh) }}"
                                        data-gall="myGallery">
                                        <img src="{{ Storage::url($bienThe->anh) }}" alt="product image">
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            @foreach ($bienThes as $bienThe)
                                <div class="sm-image"><img src="{{ Storage::url($bienThe->anh) }}"
                                        alt="product image thumb"></div>
                            @endforeach
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2>{{ $product->ten_san_pham }}</h2>
                            {{-- <span class="product-details-ref">Reference: demo_15</span> --}}
                            <div class="rating-box pt-20">
                                <ul class="rating rating-with-review-item">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="review-item"><a href="#">Đọc bình luận</a></li>
                                    <li class="review-item"><a href="#">Bình luận</a></li>
                                </ul>
                            </div>
                            <div class="price-box pt-20">
                                <span
                                    class="new-price new-price-2">{{ number_format($product->gia_san_pham, 0, '', '.') }}đ</span>
                            </div>
                            <div class="product-desc">
                                <p>
                                    <span>{{ $product->mo_ta_ngan }}
                                    </span>
                                </p>
                            </div>
                            <div class="product-variants">
                                <div class="product-variants-1">
                                    <div class="produt-variants-size">
                                        <label>Dung lượng</label>
                                        <select class="nice-select">
                                            @foreach ($bienThes as $bienThe)
                                                <option value="{{ $bienThe->id }}" title="M">
                                                    {{ $bienThe->dung_luong }}Mb</option>
                                            @endforeach
                                            {{-- <option value="1" title="S" selected="selected">40x60cm</option>
                                                <option value="2" title="M">60x90cm</option>
                                                <option value="3" title="L">80x120cm</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="product-variants-2">
                                    <div class="produt-variants-size">
                                        <label>Màu sắc</label>
                                        <select class="nice-select">
                                            @foreach ($bienThes as $bienThe)
                                                <option value="{{ $bienThe->id }}" title="M">{{ $bienThe->mau_sac }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="single-add-to-cart">
                                <form action="{{ route('cart.list') }}" class="cart-quantity" method="get">
                                    @csrf
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                            <div class="product-additional-info pt-25">
                                <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Thêm vào danh sách
                                    yêu thích</a>
                                <div class="product-social-sharing pt-25">
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                        </li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google
                                                +</a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                            <p>Chính sách bảo mật (sửa với module Đảm bảo với khách hàng)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-truck"></i>
                                            </div>
                                            <p>Chính sách giao hàng (sửa với module Đảm bảo với khách hàng)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-exchange"></i>
                                            </div>
                                            <p> Chính sách hoàn trả (sửa với module Đảm bảo với khách hàng)</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    <!-- Begin Product Area -->
    <div class="product-area pt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a class="active" data-toggle="tab" href="#description"><span>Mô tả</span></a></li>
                            <li><a data-toggle="tab" href="#product-details"><span>Sản phẩm chi tiết</span></a></li>
                            <li><a data-toggle="tab" href="#reviews"><span>Bình luận</span></a></li>
                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="description" class="tab-pane active show" role="tabpanel">
                    <div class="product-description">
                        <span>The best is yet to come! Give your walls a voice with a framed poster. This aesthethic,
                            optimistic poster will look great in your desk or in an open-space office. Painted wooden frame
                            with passe-partout for more depth.</span>
                    </div>
                </div>
                <div id="product-details" class="tab-pane" role="tabpanel">
                    <div class="product-details-manufacturer">
                        <a href="#">
                            <img src="images/product-details/1.jpg" alt="Product Manufacturer Image">
                        </a>
                        <p><span>Reference</span> demo_7</p>
                        <p><span>Reference</span> demo_7</p>
                    </div>
                </div>
                <div id="reviews" class="tab-pane" role="tabpanel">
                    <div class="product-reviews">
                        <div class="product-details-comment-block">

                            @foreach ($binhLuans as $binhluan)
                                <div class="comment-author-infos pt-25">
                                    <span>Tên người dùng : {{ $binhluan->user->name }}</span>
                                    <em>Ngày bình luận : {{ $binhluan->created_at->format('d/m/Y') }}</em>
                                    <em>Nội dung : {{ $binhluan->noi_dung }}</em>
                                    <div class="comment-review">
                                        <span>Đánh giá sao</span>
                                        <ul class="rating">
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                            <div class="review-btn" style="margin-top: 20px">
                                <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Viết
                                    bình luận của bạn!</a>
                            </div>
                            <!-- Begin Quick View | Modal Area -->
                            <div class="modal fade modal-wrapper" id="mymodal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3 class="review-page-title">Viết bình luận của bạn</h3>
                                            <div class="modal-inner-area row">
                                                <div class="col-lg-6">
                                                    <div class="li-review-product">
                                                        <img src="{{ Storage::url($product->hinh_anh) }}"
                                                            alt="Li's Product" width="50px">
                                                        {{-- <div class="li-review-product-desc">
                                                               <p class="li-product-name">Today is a good day Framed poster</p>
                                                               <p>
                                                                   <span>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite Sound via Ring Radiator Technology. Stream And Control R3 Speakers Wirelessly With Your Smartphone. Sophisticated, Modern Design </span>
                                                               </p>
                                                           </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="li-review-content">
                                                        <!-- Begin Feedback Area -->
                                                        <div class="feedback-area">
                                                            @if (auth()->check())
                                                                <form action="{{ route('binh-luan.store') }}" method="post">
                                                                    @csrf
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">Phản hồi với chúng tôi</h3>
                                                                        <form action="#">
                                                                            <p class="your-opinion">
                                                                                <label>Đánh giá</label>
                                                                                <span>
                                                                                    <select class="star-rating"
                                                                                        name="sao">
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                        <option value="4">4</option>
                                                                                        <option value="5">5</option>
                                                                                    </select>
                                                                                </span>
                                                                            </p>
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Bình luận của bạn</label>
                                                                                <textarea id="feedback" name="noi_dung" cols="45" rows="8" aria-required="true"></textarea>
                                                                            </p>
                                                                            <input type="hidden" name="san_pham_id"
                                                                                value="{{ $product->id }}">
                                                                                @if (auth()->check())
                                                                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                                            @else
                                                                                <p>Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để gửi bình luận.</p>
                                                                            @endif
                                                                            <div class="feedback-input">
                                                                                <div class="feedback-btn pb-15">
                                                                                    {{-- <a href="#" class="close" data-dismiss="modal" aria-label="Close">Thoát</a> --}}
                                                                                    <button type="submit"
                                                                                        class="btn btn-dark">Gửi bình
                                                                                        luận</button>
                                                                                    {{-- <a href="#">Bình luận</a> --}}
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            @else
                                                                <p>Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để gửi bình luận.</p>
                                                            @endif
                                                        </div>
                                                        <!-- Feedback Area End Here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Quick View | Modal Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->
    <!-- Begin Li's Laptop Product Area -->
    <section class="product-area li-laptop-product pt-30 pb-50">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>15 sản phẩm khác cùng danh mục :</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="images/product/large-size/1.jpg" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="single-product.html">Accusantium
                                                    dolorem1</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$46.80</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn"
                                                        data-toggle="modal" data-target="#exampleModalCenter"><i
                                                            class="fa fa-eye"></i></a></li>
                                                <li><a class="links-details" href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="images/product/large-size/2.jpg" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Studio Design</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                    day</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$71.80</span>
                                                <span class="old-price">$77.22</span>
                                                <span class="discount-percentage">-7%</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn"
                                                        data-toggle="modal" data-target="#exampleModalCenter"><i
                                                            class="fa fa-eye"></i></a></li>
                                                <li><a class="links-details" href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="images/product/large-size/3.jpg" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="single-product.html">Accusantium
                                                    dolorem1</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$46.80</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn"
                                                        data-toggle="modal" data-target="#exampleModalCenter"><i
                                                            class="fa fa-eye"></i></a></li>
                                                <li><a class="links-details" href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="images/product/large-size/4.jpg" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Studio Design</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                    day</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$71.80</span>
                                                <span class="old-price">$77.22</span>
                                                <span class="discount-percentage">-7%</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn"
                                                        data-toggle="modal" data-target="#exampleModalCenter"><i
                                                            class="fa fa-eye"></i></a></li>
                                                <li><a class="links-details" href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="images/product/large-size/5.jpg" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="single-product.html">Accusantium
                                                    dolorem1</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$46.80</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn"
                                                        data-toggle="modal" data-target="#exampleModalCenter"><i
                                                            class="fa fa-eye"></i></a></li>
                                                <li><a class="links-details" href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="images/product/large-size/6.jpg" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Studio Design</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good
                                                    day</a></h4>
                                            <div class="price-box">
                                                <span class="new-price new-price-2">$71.80</span>
                                                <span class="old-price">$77.22</span>
                                                <span class="discount-percentage">-7%</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn"
                                                        data-toggle="modal" data-target="#exampleModalCenter"><i
                                                            class="fa fa-eye"></i></a></li>
                                                <li><a class="links-details" href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Laptop Product Area End Here -->



    <!-- breadcrumb area start -->
    {{-- <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}"><i
                                                class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">product details</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    {{-- <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row"> --}}
    <!-- product details wrapper start -->
    {{-- <div class="col-lg-12 order-1 order-lg-2"> --}}
    <!-- product details inner end -->
    {{-- <div class="product-details-inner">
                            <div class="row"> --}}
    {{-- <div class="col-lg-5">
                                    <div class="duong1">
                                        <img class="img-fluid" src="{{ Storage::url($product->hinh_anh) }}" alt="product"
                                            style="object-fit: cover; width: 100%; height: 100%;">
                                    </div>
                                </div> --}}
    {{-- <div class="col-lg-5 col-md-6">
                                    <!-- Product Details Left -->
                                     <div class="product-details-left">
                                         <div class="product-details-images slider-navigation-1">
                                             <div class="lg-image">
                                                 <a class="popup-img venobox vbox-item" href="images/product/large-size/1.jpg" data-gall="myGallery">
                                                    <img class="img-fluid" src="{{ Storage::url($product->hinh_anh) }}" alt="product"
                                                    style="object-fit: cover; width: 100%; height: 100%;">
                                                 </a>
                                             </div>
                                          
                                         </div>
                                         <div class="product-details-thumbs slider-thumbs-1">
                                            @foreach ($bienThes as $bienThe) 
                                                <div class="sm-image"><img src="{{ Storage::url($bienThe->anh) }}" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/3.jpg" alt="product image thumb"></div>
                                             <div class="sm-image"><img src="images/product/small-size/4.jpg" alt="product image thumb"></div>
                                             <div class="sm-image"><img src="images/product/small-size/5.jpg" alt="product image thumb"></div>
                                            @endforeach
                                         </div>
                                     </div>
                                     <!--// Product Details Left -->
                                 </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <div class="manufacturer-name">
                                            <a href="product-details.html">HasTech</a>
                                        </div>
                                        <h3 class="product-name">{{ $product->ten_san_pham }}</h3>
                                        <div class="ratings d-flex">
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span>{{ $product->luot_xem }} lượt xem</span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            @if ($product->gia_khuyen_mai > 0)
                                                <!-- Hiển thị giá khuyến mãi nếu có -->
                                                <span
                                                    class="price-regular">{{ number_format($product->gia_khuyen_mai, 0, '', '.') }}đ</span>
                                                <span
                                                    class="price-old"><del>{{ number_format($product->gia_san_pham, 0, '', '.') }}đ</del></span>
                                            @else
                                                <!-- Nếu không có giá khuyến mãi, hiển thị giá gốc -->
                                                <span
                                                    class="price-regular">{{ number_format($product->gia_san_pham, 0, '', '.') }}đ</span>
                                            @endif
                                        </div>
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span>Số lượng: {{ $product->so_luong }}</span>
                                        </div>
                                        <p class="pro-desc">
                                            Mô tả ngắn: {{ $product->mo_ta_ngan }}
                                        </p>
                                        <form action="{{ route('cart.add') }}" method="post">
                                            @csrf
                                            <div class="quantity-cart-box d-flex align-items-center">
                                                <h6 class="option-title">qty:</h6>
                                                <div class="quantity">
                                                    <div class="pro-qty d-flex align-items-center">
                                                        <input type="text" value="1" class="pro-qty" name="quantity"
                                                            id="quantityInput" min="1">
                                                    </div>
                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                </div>
                                                <div class="action_link">
                                                    <button type="submit" class="btn btn-cart2">Add to cart</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="useful-links">
                                            <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                    class="pe-7s-refresh-2"></i>compare</a>
                                            <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                    class="pe-7s-like"></i>wishlist</a>
                                        </div>
                                        <div class="like-icon">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

    <!-- product details inner end -->
    {{-- </div> --}}
    <!-- product details reviews start -->
    {{-- <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_one">description</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_two">information</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_three">reviews (1)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p>{!! $product->noi_dung !!}</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>color</td>
                                                            <td>black, blue, red</td>
                                                        </tr>
                                                        <tr>
                                                            <td>size</td>
                                                            <td>L, M, S</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="tab_three">
                                                <form action="#" class="review-form">
                                                    <h5>1 review for <span>Chaz Kangeroo</span></h5>
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="{{ asset('assets/client/img/about/avatar.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span><i class="fa fa-star"></i></span>
                                                            </div>
                                                            <div class="post-author">
                                                                <p><span>admin -</span> 30 Mar, 2019</p>
                                                            </div>
                                                            <p>Aliquam fringilla euismod risus ac bibendum. Sed sit
                                                                amet sem varius ante feugiat lacinia. Nunc ipsum nulla,
                                                                vulputate ut venenatis vitae, malesuada ut mi. Quisque
                                                                iaculis, dui congue placerat pretium, augue erat
                                                                accumsan lacus</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span
                                                                    class="text-danger">*</span>
                                                                Your Name</label>
                                                            <input type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span
                                                                    class="text-danger">*</span>
                                                                Your Email</label>
                                                            <input type="email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span
                                                                    class="text-danger">*</span>
                                                                Your Review</label>
                                                            <textarea class="form-control" required></textarea>
                                                            <div class="help-block pt-10"><span
                                                                    class="text-danger">Note:</span>
                                                                HTML is not translated!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span
                                                                    class="text-danger">*</span>
                                                                Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="2" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="rating" checked>
                                                            &nbsp;Good
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Continue</button>
                                                    </div>
                                                </form> <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
    <!-- product details reviews end -->
    {{-- </div> --}}
    <!-- product details wrapper end -->
    {{-- </div>
        </div> --}}
    {{-- </div> --}}
    <!-- page main wrapper end -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
            $('.pro-qty').append('<span class="inc qtybtn">+</span>');

            function updateTotals() {
                var subTotal = 0;
                $('.quantityInput').each(function() {
                    var input = $(this);
                    var price = parseFloat(input.closest('tr').find('.pro-price').text().replace(/\./g, '')
                        .replace('đ', ''));
                    var quantity = parseFloat(input.val());
                    subTotal += price * quantity;
                });

                // Get shipping cost 
                var shipping = parseFloat($('.shipping').text().replace(/\./g, '').replace('đ', ''));
                var total = subTotal + shipping;

                // Update values
                $('#cartSubtotal').text(subTotal.toLocaleString('vi-VN') + ' đ');
                $('#cartTotal').text(total.toLocaleString('vi-VN') + ' đ');
            }

            $('.qtybtn').on('click', function() {
                var $button = $(this);
                var $input = $button.parent().find('input');
                var oldValue = parseFloat($input.val());

                if ($button.hasClass('inc')) {
                    var newVal = oldValue + 1;
                } else {
                    if (oldValue > 1) {
                        var newVal = oldValue - 1;
                    } else {
                        var newVal = 1;
                    }
                }
                $input.val(newVal);
                var price = parseFloat($input.closest('tr').find('.pro-price').text().replace(/\./g, '')
                    .replace('đ', ''));
                var subtotalElement = $input.closest('tr').find('.pro-subtotal .subtotal');
                var newSubtotal = newVal * price;

                subtotalElement.text(newSubtotal.toLocaleString('vi-VN') + ' đ');

                updateTotals();
            });

            $('.quantityInput').on('change', function() {
                var value = parseInt($(this).val(), 10);

                if (isNaN(value) || value < 1) {
                    alert('Số lượng phải lớn hơn 1.');
                    $(this).val(1);
                }
                updateTotals();
            });

            $('.tm-cart-removeproduct').on('click', function() {
                var $row = $(this).closest('tr');
                $row.remove(); // Remove row
                updateTotals(); // Update totals
            });

            updateTotals();
        });
    </script>
@endsection
