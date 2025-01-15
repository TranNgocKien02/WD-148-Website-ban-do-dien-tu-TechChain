@extends('layouts.client')

@section('css')
    <style>
        /* #paypal-box {
            display: block !important;
            width: 100%;
        } */
    </style>
@endsection
@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đặt hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!--Checkout Area Strat-->
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <form action="{{ route('donhangs.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="checkbox-form">
                            <h3>Thông Tin Người Mua</h3>
                            <div class="row">
                                <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Tên Người Nhận <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="ten_nguoi_nhan" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input placeholder="" type="email" name="email_nguoi_nhan" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Số Điện Thoại <span class="required">*</span></label>
                                        <input type="text" name="so_dien_thoai_nguoi_nhan" value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa Chỉ <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="dia_chi_nguoi_nhan" value="{{ Auth::user()->address }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Ghi Chú </label>
                                        <input placeholder="" name="ghi_chu" type="text">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Đơn Của Bạn</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Sản Phẩm</th>
                                            <th class="cart-product-total">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $item)
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    {{ $item->productVariant->sanpham->ten_san_pham }}({{ $item->dung_luong }},
                                                    {{ $item->mau_sac }}) <br><strong class="product-quantity"> ×
                                                        {{ $item->so_luong }}</strong></td>
                                                @php
                                                    $price =
                                                        isset($item->productVariant->sanpham->gia_khuyen_mai) &&
                                                        $item->productVariant->sanpham->gia_khuyen_mai > 0
                                                            ? $item->productVariant->sanpham->gia_khuyen_mai
                                                            : $item->productVariant->sanpham->gia_san_pham;
                                                    $subtotal = $price * $item->so_luong;
                                                @endphp
                                                <td class="cart-product-total"><span
                                                        class="amount">{{ number_format($subtotal, 0, '', '.') }}
                                                        VND</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Tổng Phụ</th>
                                            <td><span class="amount">{{ number_format($tongPhu, 0, '', '.') }} VND</span>
                                                <input type="hidden" name="tien_hang" value="{{$tongPhu}}">
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Voucher</th>
                                            <td><span  class="amount" >
                                                    @if ($coupon > 0)
                                                        -{{ number_format($coupon, 0, '', '.') }} VND
                                                        <input type="hidden" name="tien_khuyen_mai" value="{{$coupon}}">
                                                    @else
                                                        -0 VND
                                                        <input type="hidden" name="tien_khuyen_mai" value="0">
                                                    @endif


                                                </span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Phí Vận Chuyển</th>
                                            <td><span class="amount">{{ number_format($shipping, 0, '', '.') }} VND</span>
                                                <input type="hidden" name="tien_ship" value="{{$shipping}}">
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng Đơn Hàng</th>
                                            <td><strong><span class="amount">
                                                        @if (session('total'))
                                                            {{ number_format(session('total'), 0, '', '.') }} VND
                                                <input type="hidden" name="tong_tien" value="{{session('total')}}">

                                                        @else
                                                            {{ number_format($total, 0, '', '.') }} VND
                                                <input type="hidden" name="tong_tien" value="{{$total}}">

                                                        @endif
                                                    </span></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="form-group">
                                        <label for="payment-method">Phương thức thanh toán</label>
                                        <select id="payment-method" name="phuong_thuc_thanh_toan" class="form-control">
                                            <option value="cod">Thanh toán khi giao hàng (COD)</option>
                                            <option value="paypal">Thanh toán Online PayPal</option>
                                        </select>
                                    </div>
                                <div class="order-button-payment">
                                    <input value="Đặt Hàng" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Checkout Area End-->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
@endsection

@section('js')
    <!-- Thêm PayPal SDK -->
    {{-- <script
        src="https://www.paypal.com/sdk/js?client-id=AbwlofImYY9g_g3EKi4Hx5ela-htKEt2Q9ZXXOcng8O3xteVQ_RM94T9axkKHesAQtcayGfz2eus3x_l&components=buttons">
    </script>
    <script>
        document.getElementById('payment-method').addEventListener('change', function() {
            const selectedMethod = this.value;
            const codDetails = document.getElementById('cod-details');
            const paypalDetails = document.getElementById('paypal-details');
            const placeOrderButton = document.getElementById('place-order-btn'); // Nút Đặt hàng
            const paypalBox = document.getElementById('paypal-box'); // Div chứa nút PayPal

            // Kiểm tra xem nút PayPal đã được khởi tạo chưa
            const paypalButtonInitialized = paypalBox.querySelector('.paypal-button-container') !== null;

            if (selectedMethod === 'cod') {
                // Hiển thị chi tiết COD, ẩn PayPal và nút Đặt hàng
                codDetails.style.display = 'block';
                paypalDetails.style.display = 'none';
                placeOrderButton.style.display = 'none'; // Ẩn nút đặt hàng khi chọn COD
            } else if (selectedMethod === 'paypal') {
                // Hiển thị chi tiết PayPal, ẩn COD và nút Đặt hàng
                codDetails.style.display = 'none';
                paypalDetails.style.display = 'block';
                placeOrderButton.style.display = 'none'; // Ẩn nút đặt hàng khi chọn PayPal

                // Chỉ khởi tạo nút PayPal nếu chưa được khởi tạo
                if (!paypalButtonInitialized) {
                    paypal.Buttons({
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: '100.00' // Giá trị thanh toán, có thể thay đổi theo đơn hàng
                                    }
                                }]
                            });
                        },
                        onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                                alert('Thanh toán thành công bởi ' + details.payer.name
                                    .given_name);

                                // Hiển thị nút Đặt hàng sau khi thanh toán thành công
                                placeOrderButton.style.display = 'inline-block';
                            });
                        },
                        onError: function(err) {
                            alert('Đã xảy ra lỗi trong quá trình thanh toán.');
                        }
                    }).render('#paypal-box'); // Hiển thị nút PayPal trong div #paypal-box
                }
            }
        });
    </script> --}}
@endsection
