
<!-- Begin Li's Trending Product Area -->
            <section class="product-area li-trending-product pt-60 pb-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Tab Menu Area -->
                        <div class="col-lg-12">
                            <div class="li-product-tab li-trending-product-tab">
                                <h2>
                                    <span>SẢN PHẨM THỊNH HÀNH</span>
                                </h2>
                                <ul class="nav li-product-menu li-trending-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#home1"><span>Sanai</span></a></li>
                                   <li><a data-toggle="tab" href="#home2"><span>Camera Accessories</span></a></li>
                                   <li><a data-toggle="tab" href="#home3"><span>XailStation</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                            <div class="tab-content li-tab-content li-trending-product-content">
                                <div id="home1" class="tab-pane show fade in active">
                                    <div class="row">
                                        <div class="product-active owl-carousel">
                                            @foreach ($sanPhamTrending as $item)
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img src="{{Storage::url($item->hinh_anh) }}" alt="Li's Product Image">
                                                    </a>
                                                    <span class="sticker">New</span>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                                            </h5>
                                                            <div class="rating-box">
                                                                    <ul class="rating">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= $item->danh_gia_trung_binh)
                                                                                <li><i class="fa fa-star"></i></li> <!-- Sao đầy -->
                                                                            @else
                                                                                <li><i class="fa fa-star-o"></i></li> <!-- Sao rỗng -->
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                        </div>
                                                        <h4><a class="product_name" href="single-product.html">{{$item->ten_san_pham}}</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price new-price-2">${{$item->gia_khuyen_mai}}</span>
                                                            <span class="old-price">${{$item->gia_san_pham}}</span>
                                                            <span class="discount-percentage">-7%</span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
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
                                <div id="home2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="product-active owl-carousel">
                                            @foreach ($sanPham as $item)
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img src="{{Storage::url($item->hinh_anh) }}" alt="Li's Product Image">
                                                    </a>
                                                    <span class="sticker">New</span>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                                            </h5>
                                                            <div class="rating-box">
                                                                    <ul class="rating">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= $item->danh_gia_trung_binh)
                                                                                <li><i class="fa fa-star"></i></li> <!-- Sao đầy -->
                                                                            @else
                                                                                <li><i class="fa fa-star-o"></i></li> <!-- Sao rỗng -->
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                        </div>
                                                        <h4><a class="product_name" href="single-product.html">{{$item->ten_san_pham}}</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price new-price-2">${{$item->gia_khuyen_mai}}</span>
                                                            <span class="old-price">${{$item->gia_san_pham}}</span>
                                                            <span class="discount-percentage">-7%</span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
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
                                <div id="home3" class="tab-pane fade">
                                    <div class="row">
                                        <div class="product-active owl-carousel">
                                            @foreach ($sanPham as $item)
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img src="{{Storage::url($item->hinh_anh) }}" alt="Li's Product Image">
                                                    </a>
                                                    <span class="sticker">New</span>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                                            </h5>
                                                            <div class="rating-box">
                                                                    <ul class="rating">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= $item->danh_gia_trung_binh)
                                                                                <li><i class="fa fa-star"></i></li> <!-- Sao đầy -->
                                                                            @else
                                                                                <li><i class="fa fa-star-o"></i></li> <!-- Sao rỗng -->
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                        </div>
                                                        <h4><a class="product_name" href="single-product.html">{{$item->ten_san_pham}}</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price new-price-2">${{$item->gia_khuyen_mai}}</span>
                                                            <span class="old-price">${{$item->gia_san_pham}}</span>
                                                            <span class="discount-percentage">-7%</span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
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
                            </div>
                            <!-- Tab Menu Content Area End Here -->
                        </div>
                        <!-- Tab Menu Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's Trending Product Area End Here -->
            <!-- Begin Li's Trendding Products Area -->
            <section class="product-area li-laptop-product li-trendding-products best-sellers pb-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Bestsellers</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach ($sanPham as $item)
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img src="{{Storage::url($item->hinh_anh) }}" alt="Li's Product Image">
                                                    </a>
                                                    <span class="sticker">New</span>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="shop-left-sidebar.html">Studio Design</a>
                                                            </h5>
                                                            <div class="rating-box">
                                                                    <ul class="rating">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= $item->danh_gia_trung_binh)
                                                                                <li><i class="fa fa-star"></i></li> <!-- Sao đầy -->
                                                                            @else
                                                                                <li><i class="fa fa-star-o"></i></li> <!-- Sao rỗng -->
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                        </div>
                                                        <h4><a class="product_name" href="single-product.html">{{$item->ten_san_pham}}</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price new-price-2">${{$item->gia_khuyen_mai}}</span>
                                                            <span class="old-price">${{$item->gia_san_pham}}</span>
                                                            <span class="discount-percentage">-7%</span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
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
            <!-- Li's Trendding Products Area End Here -->
