@extends('layouts.client')
@section('css')
@endsection
@section('content')
    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>

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
    <!-- Li's Breadcrumb Area End Here -->
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-thumbnail">Ảnh</th>
                                        <th class="cart-product-name">Sản Phẩm</th>
                                        <th class="li-product-price">Đơn Giá</th>
                                        <th class="li-product-quantity">Số Lượng</th>
                                        <th class="li-product-subtotal">Tổng</th>
                                        <th class="li-product-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                        <tr>
                                            <td class="li-product-thumbnail"><a href="{{ route('product-detail', $item->productVariant->sanpham->slug) }}"><img
                                                        src="{{ Storage::url($item->productVariant->sanpham->hinh_anh) }}" style="width: 150px; height: 150px; object-fit: cover"
                                                        alt="{{ $item->productVariant->sanpham->hinh_anh }}"></a></td>
                                            <td class="li-product-name ">
                                                <a
                                                    href="{{ route('product-detail', $item->productVariant->sanpham->slug) }}">{{ $item->productVariant->sanPham->ten_san_pham }}</a>
                                                <div class="">
                                                    <small class="text-secondary">Dung lượng:
                                                        {{ $item->dung_luong }}</small>
                                                    <small class="text-secondary">Màu sắc: {{ $item->mau_sac }}</small>
                                                </div>
                                            </td>
                                            <td class="li-product-price">
                                                @if ($item->productVariant->sanPham->gia_khuyen_mai > 0)
                                                    <span class="amount text-danger">
                                                        {{ number_format($item->productVariant->sanPham->gia_khuyen_mai, 0, '', '.') }}
                                                        VND
                                                    </span>
                                                    <del class="text-muted small" style="margin-left: 5px;">
                                                        {{ number_format($item->productVariant->sanPham->gia_san_pham, 0, '', '.') }}
                                                        VND
                                                    </del>
                                                @else
                                                    <span class="amount text-danger">
                                                        {{ number_format($item->productVariant->sanPham->gia_san_pham, 0, '', '.') }}
                                                        VND
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="quantity">
                                                <label>Số lượng</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="{{ $item->so_luong }}"
                                                        name="so_luong[{{ $item->id }}]" type="number" min="1">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            @php
                                                $price =
                                                    isset($item->productVariant->sanpham->gia_khuyen_mai) &&
                                                    $item->productVariant->sanpham->gia_khuyen_mai > 0
                                                        ? $item->productVariant->sanpham->gia_khuyen_mai
                                                        : $item->productVariant->sanpham->gia_san_pham;
                                                $subtotal = $price * $item->so_luong;
                                            @endphp
                                            <td class="product-subtotal"><span
                                                    class="amount">{{ number_format($subtotal, 0, '', '.') }} VND</span>
                                            </td>
                                            <td class="li-product-remove">
                                                <a class="" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#removeItemModal" data-id="{{ $item->id }}"
                                                    data-action="{{ route('cart.destroy', $item) }}">
                                                    <i class="fa fa-times"></i>
                                                </a>
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
                                        <input class="button" name="update_cart" value="Cập Nhật Giỏ Hàng" type="submit">
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
                                        <input class="button" name="apply_coupon" value="Áp Mã Giảm Giá" type="submit">
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
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Thành tiền</h2>

                                <ul>
                                    <li>Tổng Phụ <span>{{ number_format($tongPhu, 0, '', '.') }} VND</span></li>
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
                                                {{ number_format($total, 0, '', '.') }} VND
                                            @endif
                                        </span></li>
                                </ul>
                                <a href="{{ route('fulldonhangs.create') }}">Tiến Hành Thanh Toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xác nhận Xóa -->
    <div class="modal fade" id="removeItemModal" tabindex="-1" aria-labelledby="removeItemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeItemModalLabel">Xác nhận xóa sản phẩm</h5>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Shopping Cart Area End-->
@endsection

@section('js')
    {{-- <script>
        // Đảm bảo jQuery được tải và sẵn sàng sử dụng
        $(document).ready(function() {
            $(document).on('click', '.dropdown-item[data-bs-toggle="modal"]', function() {
                var actionUrl = $(this).data('action');
                $('#deleteForm').attr('action', actionUrl); // Cập nhật action của form với URL chính xác
            });
        });



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
                var subtotal = 0;
                $('.quantityInput').each(function() {
                    var input = $(this);
                    var price = parseFloat(input.data('price'));
                    var quantity = parseFloat(input.val());
                    subtotal += price * quantity;
                });

                // Get shipping cost 
                var shipping = parseFloat($('.shipping').text().replace(/\./g, '').replace(' đ', ''));
                var total = subtotal + shipping;

                // Update values
                $('.sub-total').text(subtotal.toLocaleString('vi-VN') + ' đ');
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

            // xóa
            // $('.pro-remove').on('click', function(event) {
            //     event.preventDefault();
            //     var $row = $(this).closest('tr');
            //     $row.remove(); // Remove row
            //     updateTotals(); // Update totals
            // });

            updateTotals();
        });
    </script> --}}
    <script>
        $(document).on('click', '[data-bs-toggle="modal"]', function() {
            var actionUrl = $(this).data('action');
            var itemId = $(this).data('id');

            $('#removeItemModal #deleteForm').attr('action', actionUrl);

        });
    </script>
@endsection
