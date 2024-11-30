@extends('layouts.client')

@section('css')
    
@endsection
@section('content')
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
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
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="duong1">
                                        <img class="img-fluid" src="{{ Storage::url($products->hinh_anh) }}" alt="product"
                                            style="object-fit: cover; width: 100%; height: 100%;">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <div class="manufacturer-name">
                                            <a href="product-details.html">HasTech</a>
                                        </div>
                                        <h3 class="product-name">{{ $products->ten_san_pham }}</h3>
                                        <div class="ratings d-flex">
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span>{{ $products->luot_xem }} lượt xem</span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            @if ($products->gia_khuyen_mai > 0)
                                                <!-- Hiển thị giá khuyến mãi nếu có -->
                                                <span
                                                    class="price-regular">{{ number_format($products->gia_khuyen_mai, 0, '', '.') }}đ</span>
                                                <span
                                                    class="price-old"><del>{{ number_format($products->gia_san_pham, 0, '', '.') }}đ</del></span>
                                            @else
                                                <!-- Nếu không có giá khuyến mãi, hiển thị giá gốc -->
                                                <span
                                                    class="price-regular">{{ number_format($products->gia_san_pham, 0, '', '.') }}đ</span>
                                            @endif
                                        </div>
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span>Số lượng: {{ $products->so_luong }}</span>
                                        </div>
                                        <p class="pro-desc">
                                            Mô tả ngắn: {{ $products->mo_ta_ngan }}
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
                                                    <input type="hidden" value="{{ $products->id }}" name="product_id">
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
                        </div>

                        <!-- product details inner end -->
                        {{-- </div> --}}
                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
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
                                                    <p>{!! $products->noi_dung !!}</p>
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
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
        {{-- </div> --}}
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Related Products</h2>
                            <p class="sub-title">Add related products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            @foreach ($collection as $item)
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="{{ route('product-detail', ['id' => $item->id]) }}">
                                            <img style="width: 200px; height: 200px; overflow: hidden;" class="pri-img"
                                                src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                            <img style="width: 200px; height: 200px; overflow: hidden;" class="sec-img"
                                                src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                            <!-- Begin Li's Breadcrumb Area -->
                            @endforeach
                                            <!-- Product Area End Here -->
                                            <!-- Begin Li's Laptop Product Area -->
                                            <section class="product-area li-laptop-product pt-30 pb-50">
                                                <div class="container">
                                                    <div class="row">
                                                        <!-- Begin Li's Section Area -->
                                                        <div class="col-lg-12">
                                                            <div class="li-section-title">
                                                                <h2>
                                                                    <span>15 other products in the same category:</span>
                                                                </h2>
                                                            </div>
                                                            <div class="row">
                                                                <div class="product-active owl-carousel">
                                                                    <div class="col-lg-12">
                                                                        <!-- single-product-wrap start -->
                                                                        <div class="single-product-wrap">
                                                                            <div class="product-image">
                                                                                <a href="single-product.html">
                                                                                    <img src="{{ asset('lib/images/product/large-size/1.jpg') }}"
                                                                                        alt="Li's Product Image">
                                                                                </a>
                                                                                <span class="sticker">New</span>
                                                                            </div>
                                                                            <div class="product_desc">
                                                                                <div class="product_desc_info">
                                                                                    <div class="product-review">
                                                                                        <h5 class="manufacturer">
                                                                                            <a href="product-details.html">Graphic
                                                                                                Corner</a>
                                                                                        </h5>
                                                                                        <div class="rating-box">
                                                                                            <ul class="rating">
                                                                                                <li><i
                                                                                                        class="fa fa-star-o"></i>
                                                                                                </li>
                                                                                                <li><i
                                                                                                        class="fa fa-star-o"></i>
                                                                                                </li>
                                                                                                <li><i
                                                                                                        class="fa fa-star-o"></i>
                                                                                                </li>
                                                                                                <li class="no-star"><i
                                                                                                        class="fa fa-star-o"></i>
                                                                                                </li>
                                                                                                <li class="no-star"><i
                                                                                                        class="fa fa-star-o"></i>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    <h4><a class="product_name"
                                                                                            href="single-product.html">Accusantium
                                                                                            dolorem1</a></h4>
                                                                                    <div class="price-box">
                                                                                        <span
                                                                                            class="new-price">$46.80</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="add-actions">
                                                                                    <ul class="add-actions-link">
                                                                                        <li class="add-cart active"><a
                                                                                                href="#">Add to
                                                                                                cart</a></li>
                                                                                        <li><a href="#"
                                                                                                title="quick view"
                                                                                                class="quick-view-btn"
                                                                                                data-toggle="modal"
                                                                                                data-target="#exampleModalCenter"><i
                                                                                                    class="fa fa-eye"></i></a>
                                                                                        </li>
                                                                                        <li><a class="links-details"
                                                                                                href="wishlist.html"><i
                                                                                                    class="fa fa-heart-o"></i></a>
                                                                                        </li>
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
    </main>                        
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
