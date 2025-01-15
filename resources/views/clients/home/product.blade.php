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
                        @foreach ($sanPhamMoi as $item)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ route('product-detail', $item->slug) }}">
                                            <img src="{{ Storage::url($item->hinh_anh) }}" style="width:206px; height: 206px; object-fit: cover;"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="">{{$item->hang->ten_hang}}</a>
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
                                            <h4><a class="product_name"
                                                    href="{{ route('product-detail', $item->slug) }}">{{ $item->ten_san_pham }}</a>
                                            </h4>
                                            <div class="price-box">
                                                    @if ($item->gia_khuyen_mai)
                                                        <span
                                                            class="new-price new-price-2">{{ number_format($item->gia_khuyen_mai, 0, '', '.') }}
                                                            VND</span>
                                                        <span
                                                            class="old-price">{{ number_format($item->gia_san_pham, 0, '', '.') }}
                                                            VND</span>
                                                        <span
                                                            class="discount-percentage">-{{ $item->discount_percentage }}%</span>
                                                    @else
                                                        <span
                                                            class="new-price new-price-2">{{ number_format($item->gia_san_pham, 0, '', '.') }}
                                                            VND</span>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li>
                                                    <form id="wishlist-form-{{ $item->id }}"
                                                        action="{{ route('wishlist.add', $item->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <a class="links-details" href="javascript:void(0);"
                                                        onclick="document.getElementById('wishlist-form-{{ $item->id }}').submit();">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </li>
                                                <li><a href="{{ route('product-detail', $item->slug) }}"
                                                        title="quick view" class="quick-view-btn"><i
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
            <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($sanPhamHot as $item)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ route('product-detail', $item->slug) }}">
                                            <img src="{{ Storage::url($item->hinh_anh) }}" style="width:206px; height: 206px; object-fit: cover;"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="">{{$item->hang->ten_hang}}</a>
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
                                            <h4><a class="product_name"
                                                    href="{{ route('product-detail', $item->slug) }}">{{ $item->ten_san_pham }}</a>
                                            </h4>
                                            <div class="price-box">
                                                    @if ($item->gia_khuyen_mai)
                                                        <span
                                                            class="new-price new-price-2">{{ number_format($item->gia_khuyen_mai, 0, '', '.') }}
                                                            VND</span>
                                                        <span
                                                            class="old-price">{{ number_format($item->gia_san_pham, 0, '', '.') }}
                                                            VND</span>
                                                        <span
                                                            class="discount-percentage">-{{ $item->discount_percentage }}%</span>
                                                    @else
                                                        <span
                                                            class="new-price new-price-2">{{ number_format($item->gia_san_pham, 0, '', '.') }}
                                                            VND</span>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li>
                                                    <form id="wishlist-form-{{ $item->id }}"
                                                        action="{{ route('wishlist.add', $item->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <a class="links-details" href="javascript:void(0);"
                                                        onclick="document.getElementById('wishlist-form-{{ $item->id }}').submit();">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </li>
                                                <li><a href="{{ route('product-detail', $item->slug) }}"
                                                        title="quick view" class="quick-view-btn"><i
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
            <div id="li-featured-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($sanPhamHotDeal as $item)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ route('product-detail', $item->slug) }}">
                                            <img src="{{ Storage::url($item->hinh_anh) }}" style="width:206px; height: 206px; object-fit: cover;"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="">{{$item->hang->ten_hang}}</a>
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
                                            <h4><a class="product_name"
                                                    href="{{ route('product-detail', $item->slug) }}">{{ $item->ten_san_pham }}</a>
                                            </h4>
                                            <div class="price-box">
                                                    @if ($item->gia_khuyen_mai)
                                                        <span
                                                            class="new-price new-price-2">{{ number_format($item->gia_khuyen_mai, 0, '', '.') }}
                                                            VND</span>
                                                        <span
                                                            class="old-price">{{ number_format($item->gia_san_pham, 0, '', '.') }}
                                                            VND</span>
                                                        <span
                                                            class="discount-percentage">-{{ $item->discount_percentage }}%</span>
                                                    @else
                                                        <span
                                                            class="new-price new-price-2">{{ number_format($item->gia_san_pham, 0, '', '.') }}
                                                            VND</span>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li>
                                                    <form id="wishlist-form-{{ $item->id }}"
                                                        action="{{ route('wishlist.add', $item->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <a class="links-details" href="javascript:void(0);"
                                                        onclick="document.getElementById('wishlist-form-{{ $item->id }}').submit();">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </li>
                                                <li><a href="{{ route('product-detail', $item->slug) }}"
                                                        title="quick view" class="quick-view-btn"><i
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
        </div>
    </div>
</div>
<!-- Product Area End Here -->
