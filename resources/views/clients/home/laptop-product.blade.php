@foreach ($listDanhMuc as $danhMuc)
    <section class="product-area li-laptop-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>{{ $danhMuc->ten_danh_muc }}</span>
                        </h2>
                        <ul class="li-sub-category-list">
                            @foreach ($danhMuc->hangs as $hang)
                                <li><a href="shop-left-sidebar.html">{{ $hang->ten_hang }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach ($danhMuc->sanPhams as $sanPham)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="{{ route('product-detail', ['id' => $sanPham->id]) }}">
                                                <img style="width: 300px; height: 200px; overflow: hidden;"
                                                    src="{{ Storage::url($sanPham->hinh_anh) }}" alt="product">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
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
                                                <h4><a class="product_name"
                                                        href="single-product.html">{{ $sanPham->ten_san_pham }}</a></h4>
                                                <div class="price-box">
                                                    @if ($sanPham->gia_khuyen_mai > 0)
                                                        <!-- Hiển thị giá khuyến mãi nếu có -->
                                                        <span
                                                            class="new-price">{{ number_format($sanPham->gia_khuyen_mai, 0, '', '.') }}đ</span>
                                                    @else
                                                        <!-- Nếu không có giá khuyến mãi, hiển thị giá gốc -->
                                                        <span
                                                            class="new-price">{{ number_format($sanPham->gia_san_pham, 0, '', '.') }}đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    {{-- <li class="add-cart active"> --}}
                                                    <form action="{{ route('cart.add') }}" method="post">
                                                        @csrf
                                                        <div class="quantity-cart-box d-flex align-items-center">
                                                            {{-- <h6 class="option-title">qty:</h6> --}}
                                                            <div class="quantity">
                                                                <div class="pro-qty d-flex align-items-center">
                                                                    <input type="hidden" value="1" class="pro-qty"
                                                                        name="quantity" id="quantityInput"
                                                                        min="1">
                                                                </div>
                                                                <input type="hidden" value="{{ $sanPham->id }}"
                                                                    name="product_id">
                                                            </div>
                                                            <div class="action_link">
                                                                <button type="submit" class="btn btn-cart2">Add to
                                                                    cart</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    {{-- </li> --}}
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Li's Section Area End Here -->

            </div>


        </div>

    </section>
@endforeach
<!-- Li's Laptop Product Area End Here -->
