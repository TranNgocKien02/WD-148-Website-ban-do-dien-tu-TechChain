@extends('layouts.client')

@section('css')
@endsection
@section('content')

    <!-- Modal -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="container">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="container">
                {{ session('error') }}
            </div>
        </div>
    @endif
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{route('index')}}">Trang chủ</a></li>
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
                            <div class="lg-image">
                                <img src="{{ Storage::url($product->hinh_anh) }}" class="object-fit-cover"
                                    alt="product image">
                            </div>

                            @foreach ($bienThes as $item)
                                <div class="lg-image">
                                    <img src="{{ Storage::url($item->anh) }}" class="object-fit-cover" alt="product image">
                                </div>
                            @endforeach

                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            <div class="sm-image"><img src="{{ Storage::url($product->hinh_anh) }}" class="object-fit-cover"
                                    alt="product image thumb"></div>
                            @foreach ($bienThes as $bienThe)
                                <div class="sm-image"><img src="{{ Storage::url($bienThe->anh) }}" class="object-fit-cover"
                                        alt="product image thumb"></div>
                            @endforeach
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <form action="{{ route('cart.store') }}" class="cart-quantity" method="post">
                        @csrf
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2>{{ $product->ten_san_pham }}</h2>
                                <span class="product-details-ref">{{ $product->hang->ten_hang }}</span>
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $product->danh_gia_trung_binh)
                                                <li><i class="fa fa-star"></i></li> <!-- Sao đầy -->
                                            @else
                                                <li><i class="fa fa-star-o"></i></li> <!-- Sao rỗng -->
                                            @endif
                                        @endfor
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    @if ($product->gia_khuyen_mai > 0)
                                        <span
                                            class="new-price new-price-2 text-danger">{{ number_format($product->gia_khuyen_mai, 0, '', '.') }}đ</span>
                                        <span class="old-price text-muted" style="text-decoration: line-through;">
                                            {{ number_format($product->gia_san_pham, 0, '', '.') }}đ
                                        </span>
                                    @else
                                        <span
                                            class="new-price new-price-2">{{ number_format($product->gia_san_pham, 0, '', '.') }}đ</span>
                                    @endif
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
                                            <select name="dung_luong" class="nice-select" id="dung_luong_select">
                                                @foreach ($bienThes as $item)
                                                    <option value="{{ $item->dung_luong }}"
                                                        @if ($item->so_luong == 0) disabled @endif>
                                                        {{ $item->dung_luong }}
                                                        ({{ $item->so_luong > 0 ? 'Còn ' . $item->so_luong . ' sản phẩm' : 'Hết hàng' }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="product-variants-2">
                                        <div class="produt-variants-size">
                                            <label>Màu sắc</label>
                                            <select name="mau_sac" class="nice-select" id="mau_sac_select">>
                                                @foreach ($bienThes as $item)
                                                    <option value="{{ $item->mau_sac }}"
                                                        @if ($item->so_luong == 0) disabled @endif>
                                                        {{ $item->mau_sac }}
                                                        ({{ $item->so_luong > 0 ? 'Còn ' . $item->so_luong . ' sản phẩm' : 'Hết hàng' }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input class="" name="san_pham_id" value="{{ $product->id }}" type="hidden">
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <div class="single-add-to-cart">
                                    <div class="quantity">
                                        <label>Số lượng</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" name="so_luong" value="1" type="text"
                                                id="so_luong_select">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <!-- Form đăng nhập của bạn -->

                                    <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                    </form>


                    <form action="{{ route('cart.add') }}" method="post" id="form2" class="form2">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" id="dung_luong_input" name="dung_luong_value" value="">
                        <input type="hidden" id="mau_sac_input" name="mau_sac_value" value="">
                        <input type="hidden" id="so_luong_input" name="so_luong_value" value="">
                        <button class="add-to-cart " type="submit">Mua ngay</button>
                    </form>

                </div>
                <div class="product-additional-info pt-25">
                    <form id="wishlist-form-{{ $item->id }}" action="{{ route('wishlist.add', $item->id) }}"
                        method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="wishlist-btn" href="javascript:void(0);"
                        onclick="document.getElementById('wishlist-form-{{ $item->id }}').submit();"><i
                            class="fa fa-heart-o"></i>Thêm vào danh sách
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
                            @if ($binhLuans->isEmpty())
                                <p>Không có bình luận nào.</p>
                            @else
                                @foreach ($binhLuans as $binhluan)
                                    <div class="comment-author-infos pt-25">
                                        <span>Tên người dùng : {{ $binhluan->user->name }}</span>
                                        <em>Ngày bình luận : {{ $binhluan->created_at->format('d/m/Y') }}</em>
                                        <em>Nội dung : {{ $binhluan->noi_dung }}</em>

                                        <div class="comment-review">
                                            <span>Đánh giá sao</span>
                                            <ul class="rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $binhluan->sao)
                                                        <li><i class="fa fa-star"></i></li> <!-- Sao đầy -->
                                                    @else
                                                        <li><i class="fa fa-star-o"></i></li> <!-- Sao rỗng -->
                                                    @endif
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
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
                                                                <form action="{{ route('binh-luan.store') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">Phản hồi với chúng tôi
                                                                        </h3>
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
                                                                                <label for="feedback">Bình luận của
                                                                                    bạn</label>
                                                                                <textarea id="feedback" name="noi_dung" cols="45" rows="8" aria-required="true"></textarea>
                                                                            </p>
                                                                            <input type="hidden" name="san_pham_id"
                                                                                value="{{ $product->id }}">
                                                                            @if (auth()->check())
                                                                                <input type="hidden" name="user_id"
                                                                                    value="{{ auth()->id() }}">
                                                                            @else
                                                                                <p>Vui lòng <a
                                                                                        href="{{ route('login') }}">đăng
                                                                                        nhập</a> để gửi bình luận.</p>
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
                                                                <p>Vui lòng <a href="{{ route('login') }}">đăng nhập</a>
                                                                    để gửi bình luận.</p>
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
                            @foreach ($relatedProducts as $item)
                                <div class="col-lg-12 related-products">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="{{ route('product-detail', $item->slug) }}">
                                                <img src="{{ Storage::url($item->hinh_anh) }}" alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="{{ route('product-detail', $item->slug) }}">{{ $item->ten_san_pham }}</a>
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
                                                        href="single-product.html">{{ $item->ten_san_pham }}</a></h4>
                                                <div class="price-box">
                                                    <span
                                                        class="new-price">{{ number_format($item->gia_san_pham, 0, '', '.') }}đ</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
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
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            @endforeach

                            <!-- Hiển thị liên kết phân trang -->
                            <div class="pagination">
                                {{ $relatedProducts->links() }}
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>

    <!-- Li's Laptop Product Area End Here -->


@endsection

@section('js')
    <script>
        document.getElementById('form2').addEventListener('submit', function(event) {
            // Lấy giá trị của các trường dropdown và số lượng
            var selectedMauSac = document.getElementById('mau_sac_select').value;
            var selectedDungLuong = document.getElementById('dung_luong_select').value;
            var soLuong = document.getElementById('so_luong_select').value;

            // Kiểm tra xem người dùng có chọn giá trị hay không
            if (!selectedMauSac || !selectedDungLuong || soLuong <= 0) {
                alert('Vui lòng chọn đầy đủ màu sắc, dung lượng và số lượng hợp lệ.');
                event.preventDefault(); // Ngăn không cho form gửi đi
                return;
            }

            // Gán giá trị vào các input ẩn trước khi gửi form
            document.getElementById('mau_sac_input').value = selectedMauSac;
            document.getElementById('dung_luong_input').value = selectedDungLuong;
            document.getElementById('so_luong_input').value = soLuong;

            // Nếu cần, có thể xử lý thêm logic ở đây...
        });

        // $(document).ready(function() {
        //     $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
        //     $('.pro-qty').append('<span class="inc qtybtn">+</span>');

        //     function updateTotals() {
        //         var subTotal = 0;
        //         $('.quantityInput').each(function() {
        //             var input = $(this);
        //             var price = parseFloat(input.closest('tr').find('.pro-price').text().replace(/\./g, '')
        //                 .replace('đ', ''));
        //             var quantity = parseFloat(input.val());
        //             subTotal += price * quantity;
        //         });

        //         // Get shipping cost 
        //         var shipping = parseFloat($('.shipping').text().replace(/\./g, '').replace('đ', ''));
        //         var total = subTotal + shipping;

        //         // Update values
        //         $('#cartSubtotal').text(subTotal.toLocaleString('vi-VN') + ' đ');
        //         $('#cartTotal').text(total.toLocaleString('vi-VN') + ' đ');
        //     }

        //     $('.qtybtn').on('click', function() {
        //         var $button = $(this);
        //         var $input = $button.parent().find('input');
        //         var oldValue = parseFloat($input.val());

        //         if ($button.hasClass('inc')) {
        //             var newVal = oldValue + 1;
        //         } else {
        //             if (oldValue > 1) {
        //                 var newVal = oldValue - 1;
        //             } else {
        //                 var newVal = 1;
        //             }
        //         }
        //         $input.val(newVal);
        //         var price = parseFloat($input.closest('tr').find('.pro-price').text().replace(/\./g, '')
        //             .replace('đ', ''));
        //         var subtotalElement = $input.closest('tr').find('.pro-subtotal .subtotal');
        //         var newSubtotal = newVal * price;

        //         subtotalElement.text(newSubtotal.toLocaleString('vi-VN') + ' đ');

        //         updateTotals();
        //     });

        //     $('.quantityInput').on('change', function() {
        //         var value = parseInt($(this).val(), 10);

        //         if (isNaN(value) || value < 1) {
        //             alert('Số lượng phải lớn hơn 1.');
        //             $(this).val(1);
        //         }
        //         updateTotals();
        //     });

        //     $('.tm-cart-removeproduct').on('click', function() {
        //         var $row = $(this).closest('tr');
        //         $row.remove(); // Remove row
        //         updateTotals(); // Update totals
        //     });

        //     updateTotals();
        // });
    </script>
@endsection
