@extends('layouts.client')
@section('css')
    {{-- <style>
    .qtybtn {
    cursor: pointer;
    padding: 5px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    display: inline-block;
}

</style> --}}
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
                                    <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('cart.updateBuy') }}" method="post">
                                @csrf
                                <!-- Cart Table Area -->
                                <div class="cart-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-thumbnail">Ảnh</th>
                                                <th class="cart-product-name">Sản Phẩm</th>
                                                <th class="li-product-price">Đơn Giá</th>
                                                <th class="li-product-quantity">Số Lượng</th>
                                                <th class="li-product-subtotal">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $key => $item)
                                                <tr>
                                                    <td class="li-product-thumbnail">
                                                        <img class="img-fluid" src="{{ Storage::url($item['hinh_anh']) }}"
                                                            alt="Product" />
                                                        <input type="hidden" name="cart[{{ $key }}][hinh_anh]"
                                                            value="{{ $item['hinh_anh'] }}">
                                                    </td>
                                                    <td class="li-product-name ">
                                                        <a href="{{ route('product-detail', $key) }}"
                                                            class="tm-cart-productname">{{ $item['ten_san_pham'] }}</a><br>
                                                        <a href="{{ route('product-detail', $key) }}"
                                                            class="tm-cart-productname">{{ $item['dung_luong'] }},{{ $item['mau_sac'] }}</a>
                                                        <input type="hidden"
                                                            name="cart[{{ $key }}][ten_san_pham]"
                                                            value="{{ $item['ten_san_pham'] }}">
                                                        <input type="hidden" name="cart[{{ $key }}][dung_luong]"
                                                            value="{{ $item['dung_luong'] }}">
                                                        <input type="hidden" name="cart[{{ $key }}][mau_sac]"
                                                            value="{{ $item['mau_sac'] }}">
                                                    </td>
                                                    <td class="li-product-price">
                                                        @if (isset($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] > 0)
                                                            <span class="amount text-danger">
                                                                {{ number_format($item['gia_khuyen_mai'], 0, '', '.') }}
                                                                VND
                                                            </span>
                                                            <input type="hidden"
                                                                name="cart[{{ $key }}][gia_khuyen_mai]"
                                                                value="{{ $item['gia_khuyen_mai'] }}">
                                                            <del class="text-muted small" style="margin-left: 5px;">
                                                                {{ number_format($item['gia'], 0, '', '.') }}
                                                                VND
                                                            </del>
                                                            <input type="hidden" name="cart[{{ $key }}][gia]"
                                                                value="{{ $item['gia'] }}">
                                                        @else
                                                            <span class="amount text-danger">
                                                                {{ number_format($item['gia'], 0, '', '.') }}
                                                                VND
                                                            </span>
                                                            <input type="hidden" name="cart[{{ $key }}][gia]"
                                                                value="{{ $item['gia'] }}">
                                                        @endif
                                                    </td>

                                                    <td class="quantity">
                                                        <label>Số lượng</label>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="{{ $item['so_luong'] }}"
                                                                data-price="{{ $item['gia'] }}"
                                                                class="cart-plus-minus-box"
                                                                name="cart[{{ $key }}][so_luong]" />
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i>
                                                            </div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    @php
                                                        $price =
                                                            isset($item['gia_khuyen_mai']) &&
                                                            $item['gia_khuyen_mai'] > 0
                                                                ? $item['gia_khuyen_mai']
                                                                : $item['gia'];
                                                        $subtotal = $price * $item['so_luong'];
                                                    @endphp
                                                    <td class="product-subtotal">
                                                        <span class="amount">{{ number_format($subtotal, 0, '', '.') }}
                                                            VND</span>

                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Cập Nhật Giỏ Hàng"
                                                    type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <form action="{{ route('client.apply_coupon') }}" method="POST">
                                            @csrf
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code"
                                                    placeholder="Mã Giảm Giá" type="text" value="">
                                                <input class="button" name="apply_coupon" value="Áp Mã Giảm Giá"
                                                    type="submit">
                                            </div>
                                        </form>
                                        @if (session('coupon'))
                                            <form action="{{ route('client.remove_coupon') }}" method="POST">
                                                @csrf
                                                <input type="submit" class="button" value="Xóa Mã Giảm Giá">
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Thành tiền</h2>

                                <ul>
                                    <li>Tổng Phụ <span>{{ number_format($subtotal, 0, '', '.') }} VND</span></li>
                                    <li>Voucher <span>
                                            @if ($coupon > 0)
                                                -{{ number_format($coupon, 0, '', '.') }} VND
                                            @else
                                                0 VND
                                            @endif
                                        </span></li>
                                    <li>Phí Vận Chuyển <span>{{ number_format($shipping, 0, '', '.') }} VND</span></li>
                                    <li>Tổng <span>
                                            @if (session('total'))
                                                {{ number_format(session('total'), 0, '', '.') }} VND
                                            @else
                                                {{ number_format($toTal, 0, '', '.') }} VND
                                            @endif
                                        </span></li>
                                </ul>
                                <a href="{{ route('donhangs.create') }}">Tiến Hành Thanh Toán</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Add the increment and decrement buttons only once
            $('.pro-qty').each(function() {
                var $this = $(this);
                if ($this.find('.qtybtn').length === 0) {
                    $this.prepend('<span class="dec qtybtn">-</span>');
                    $this.append('<span class="inc qtybtn">+</span>');
                }
            });

            function updateTotals() {
                var subTotal = 0;
                $('.quantityInput').each(function() {
                    var input = $(this);
                    var price = parseFloat(input.data('price'));
                    var quantity = parseFloat(input.val());
                    subTotal += price * quantity;
                });

                // Get shipping cost 
                var shipping = parseFloat($('.shipping').text().replace(/\./g, '').replace(' đ', ''));
                var total = subTotal + shipping;

                // Update values
                $('.sub-total').text(subTotal.toLocaleString('vi-VN') + ' đ');
                $('.total-amount').text(total.toLocaleString('vi-VN') + ' đ');
            }

            $(document).on('click', '.qtybtn', function() {
                console.log("Button clicked!"); // Kiểm tra xem có bấm vào nút không
                var $button = $(this);
                var $input = $button.siblings('input');
                var oldValue = parseFloat($input.val());
                var newVal;

                if ($button.hasClass('inc')) {
                    newVal = oldValue + 1;
                } else {
                    if (oldValue > 1) {
                        newVal = oldValue - 1;
                    } else {
                        newVal = 1;
                    }
                }

                $input.val(newVal);
                var price = parseFloat($input.data('price'));
                var subtotalElement = $input.closest('tr').find('.subtotal');
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

            // xóa - má k xóa được điên quá trời
            $('.pro-remove').on('click', function(event) {
                event.preventDefault();
                var $row = $(this).closest('tr');
                $row.remove(); // Remove row
                updateTotals(); // Update totals
            });

            updateTotals();
        });
    </script>
@endsection
