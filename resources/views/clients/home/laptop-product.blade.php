    <section class="product-area li-laptop-product pt-60 pb-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Laptop</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                    <li class="active"><a href="shop-left-sidebar.html">Prime Video</a></li>
                                    <li><a href="shop-left-sidebar.html">Computers</a></li>
                                    <li><a href="shop-left-sidebar.html">Electronics</a></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach ($sanPham as $item)
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="{{ route('product-detail', $item->id) }}">
                                                        <img src="{{Storage::url($item->hinh_anh)}}" alt="Li's Product Image">
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
                                                        <h4><a class="product_name" href="{{ route('product-detail', $item->id) }}">Accusantium dolorem1</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">$46.80</span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                            <li><a href="{{ route('product-detail', $item->id) }}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
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
<!-- Li's Laptop Product Area End Here -->
