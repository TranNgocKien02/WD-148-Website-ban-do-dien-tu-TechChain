@extends('layouts.client')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li class="active">Filter products</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Content Wraper Area -->
    <div class="content-wraper pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- Begin Li's Banner Area -->
                    <div class="single-banner shop-page-banner">
                        <a href="#">
                            {{-- <img src="{{ asset('assets/client/img/banner/2.jpg') }}" alt="Li's Static Banner"> --}}
                        </a>
                    </div>
                    <!-- Li's Banner Area End Here -->
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-30">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active" role="presentation"><a class="active show" data-toggle="tab"
                                            role="tab" aria-controls="grid-view" href="#grid-view"><i
                                                class="fa fa-th"></i></a></li>
                                    <li role="presentation"><a aria-selected="true" data-toggle="tab" role="tab"
                                            aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a>
                                    </li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                            <div class="toolbar-amount">
                                <span>Showing {{ $sanPhamHot->firstItem() }} to {{ $sanPhamHot->lastItem() }} of
                                    {{ $sanPhamHot->total() }} item(s)</span>
                            </div>

                        </div>

                    </div>
                    <!-- shop-top-bar end -->
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="product-area shop-product-area">
                                    <div class="row">
                                        @foreach ($sanPhamHot as $sanPham)
                                            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                <!-- single-product-wrap start -->

                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="{{ route('product-detail', $sanPham->id) }}">
                                                            <!-- Đổi src từ link tĩnh thành động từ sản phẩm -->
                                                            <img src="{{ Storage::url($sanPham->hinh_anh) }}"
                                                                alt="{{ $sanPham->ten_san_pham }}">
                                                        </a>
                                                        <!-- Nếu sản phẩm mới, có thể thêm điều kiện kiểm tra -->
                                                        @if ($sanPham->is_new)
                                                            <span class="sticker">New</span>
                                                        @endif
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <!-- Thông tin nhà sản xuất -->
                                                                <h5 class="manufacturer">
                                                                    <a href="">{{ $sanPham->hang->ten_hang }}</a>
                                                                </h5>
                                                                <div class="rating-box">
                                                                    <ul class="rating">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= $sanPham->danh_gia_trung_binh)
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <!-- Sao đầy -->
                                                                            @else
                                                                                <li><i class="fa fa-star-o"></i>
                                                                                </li> <!-- Sao rỗng -->
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name"
                                                                    href="{{ route('product-detail', $sanPham->id) }}">{{ $sanPham->ten_san_pham }}</a>
                                                            </h4>
                                                            <div class="price-box">
                                                                <!-- Hiển thị giá sản phẩm -->
                                                                <span
                                                                    class="new-price">${{ $sanPham->gia_khuyen_mai > 0 ? $sanPham->gia_khuyen_mai : $sanPham->gia_san_pham }}</span>
                                                                <!-- Nếu có giá khuyến mãi, có thể hiển thị giá gốc -->
                                                                @if ($sanPham->gia_khuyen_mai > 0)
                                                                    <span
                                                                        class="old-price">${{ $sanPham->gia_san_pham }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                                <li><a href="{{ route('product-detail', $sanPham->id) }}" title="quick view" class="quick-view-btn"><i
                                                                            class="fa fa-eye"></i></a></li>
                                                                <li><a class="links-details" href=""><i
                                                                            class="fa fa-heart-o"></i></a></li>
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
                            <div id="list-view" class="tab-pane fade product-list-view " role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        <div class="row product-layout-list">
                                            @foreach ($sanPhamHot as $sanPham)
                                                <div class="col-lg-3 col-md-5">
                                                    <div class="product-image">
                                                        <a href="{{ route('product-detail', $sanPham->id) }}">
                                                            <!-- Đổi hình ảnh động -->
                                                            <img src="{{ Storage::url($sanPham->hinh_anh) }}"
                                                                alt="{{ $sanPham->ten_san_pham }}">
                                                        </a>
                                                        <!-- Nếu sản phẩm mới -->
                                                        @if ($sanPham->is_new)
                                                            <span class="sticker">New</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-7">
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <a href="">{{ $sanPham->hang->ten_hang }}</a>
                                                                </h5>
                                                                <div class="rating-box">
                                                                    <ul class="rating">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= $sanPham->danh_gia_trung_binh)
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <!-- Sao đầy -->
                                                                            @else
                                                                                <li><i class="fa fa-star-o"></i>
                                                                                </li> <!-- Sao rỗng -->
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name"
                                                                    href="{{ route('product-detail', $sanPham->id) }}">{{ $sanPham->ten_san_pham }}</a>
                                                            </h4>
                                                            <div class="price-box">
                                                                <span
                                                                    class="new-price">${{ $sanPham->gia_khuyen_mai > 0 ? $sanPham->gia_khuyen_mai : $sanPham->gia_san_pham }}</span>
                                                                <!-- Hiển thị giá gốc nếu có khuyến mãi -->
                                                                @if ($sanPham->gia_khuyen_mai > 0)
                                                                    <span
                                                                        class="old-price">${{ $sanPham->gia_san_pham }}</span>
                                                                @endif
                                                            </div>
                                                            <p>{{ $sanPham->mo_ta_ngan }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="shop-add-action mb-xs-30">
                                                        <ul class="add-actions-link">
                                                            <!-- Thêm vào danh sách yêu thích -->
                                                            <li class="wishlist">
                                                                <a href="">
                                                                    <i class="fa fa-heart-o"></i>Add to wishlist
                                                                </a>
                                                            </li>
                                                            <!-- Xem nhanh -->
                                                            <li>
                                                                <a class="quick-view"  href="{{ route('product-detail', $sanPham->id) }}">
                                                                    <i class="fa fa-eye"></i>Quick view
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <!-- Hiển thị thông tin tổng số sản phẩm -->
                                        <p>Showing {{ $sanPhamHot->firstItem() }}-{{ $sanPhamHot->lastItem() }} of
                                            {{ $sanPhamHot->total() }} item(s)</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box">
                                            <!-- Previous button -->
                                            <li>
                                                <a href="{{ $sanPhamHot->previousPageUrl() }}" class="Previous">
                                                    <i class="fa fa-chevron-left"></i> Previous
                                                </a>
                                            </li>

                                            <!-- Pagination links -->
                                            @foreach ($sanPhamHot->getUrlRange(1, $sanPhamHot->lastPage()) as $page => $url)
                                                <li class="{{ $page == $sanPhamHot->currentPage() ? 'active' : '' }}">
                                                    <a href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            <!-- Next button -->
                                            <li>
                                                <a href="{{ $sanPhamHot->nextPageUrl() }}" class="Next">
                                                    Next <i class="fa fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
                <div class="col-lg-3 order-2 order-lg-1">

                    <div class="sidebar-categores-box">
                        <div class="sidebar-title">
                            <h2>Filter By</h2>
                        </div>
                        <!-- btn-clear-all start -->

                        <!-- btn-clear-all end -->

                        <!-- filter-sub-area start -->
                        <form action="{{ route('filter') }}" method="GET">
                            <button class="btn-clear-all mb-sm-30 mb-xs-30" type="reset"><a
                                    href="{{ route('filter') }}">Clear all</a></button>
                            <!-- Filter by Brand -->
                            <div class="filter-sub-area">
                                <h5 class="filter-sub-titel">Brand</h5>
                                <div class="categori-checkbox">
                                    <ul>
                                        @foreach ($hang as $brand)
                                            <li>
                                                <input type="checkbox" name="filters[brands][]"
                                                    value="{{ $brand->id }}"
                                                    {{ in_array($brand->id, request('filters.brands', [])) ? 'checked' : '' }}>
                                                <a href="#">{{ $brand->ten_hang }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Filter by Category -->
                            <div class="filter-sub-area">
                                <h5 class="filter-sub-titel">Categories</h5>
                                <div class="categori-checkbox">
                                    <ul>
                                        @foreach ($danhMuc as $category)
                                            <li>
                                                <input type="checkbox" name="filters[categories][]"
                                                    value="{{ $category->id }}"
                                                    {{ in_array($category->id, request('filters.categories', [])) ? 'checked' : '' }}>
                                                <a href="#">{{ $category->ten_danh_muc }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- filter-sub-area start -->
                            <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                <h5 class="filter-sub-titel">Price Range</h5>
                                <div class="price-range-filter">
                                    <label for="min-price">From:</label>
                                    <input type="number" id="min-price" name="filters[min_price]"
                                        value="{{ request('filters.min_price', 0) }}" placeholder="Min Price">

                                    <label for="max-price">To:</label>
                                    <input type="number" id="max-price" name="filters[max_price]"
                                        value="{{ request('filters.max_price', 10000000) }}" placeholder="Max Price">
                                </div>
                            </div>
                            <!-- filter-sub-area end -->




                            <!-- Filter by Color -->
                            <div class="filter-sub-area">
                                <h5 class="filter-sub-titel">Color</h5>
                                <div class="categori-checkbox">
                                    <ul>
                                        @foreach ($bienTheSanPhams->unique('mau_sac') as $variant)
                                            <li>
                                                <input type="checkbox" name="filters[colors][]"
                                                    value="{{ $variant->mau_sac }}"
                                                    {{ in_array($variant->mau_sac, request('filters.colors', [])) ? 'checked' : '' }}>

                                                <a href="#">{{ $variant->mau_sac }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                            <!-- Filter by Capacity -->
                            <div class="filter-sub-area">
                                <h5 class="filter-sub-titel">Capacity</h5>
                                <div class="categori-checkbox">
                                    <ul>
                                        @foreach ($bienTheSanPhams->unique('dung_luong') as $variant)
                                            <li>
                                                <input type="checkbox" name="filters[capacities][]"
                                                    value="{{ $variant->dung_luong }}"
                                                    {{ in_array($variant->dung_luong, request('filters.capacities', [])) ? 'checked' : '' }}>
                                                <a href="#">{{ $variant->dung_luong }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Submit filter button -->
                            <button type="submit" class="btn btn-filter">Filter</button>
                        </form>
                    </div>

                    <!--sidebar-categores-box end  -->
                    <!-- category-sub-menu start -->

                </div>
            </div>
        </div>
    </div>
@endsection
