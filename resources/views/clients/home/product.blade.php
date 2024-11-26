<!-- Begin Product Area -->
            <div class="product-area pt-60 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Sản phẩm mới</span></a></li>
                                   <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bán chạy nhất</span></a></li>
                                   <li><a data-toggle="tab" href="#li-featured-product"><span>Sản phẩm nổi bật</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach ($sanPhamMois as $sanPham )
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
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
                                            <!-- single-product-wrap end -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach ($sanPhamBanChays as $sanPham )
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
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
                                        <!-- single-product-wrap end -->
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="li-featured-product" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach ($sanPhamNoiBats as $sanPham )
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
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
                                        <!-- single-product-wrap end -->
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->