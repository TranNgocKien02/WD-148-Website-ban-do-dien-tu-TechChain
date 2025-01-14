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
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đặt hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    {{-- <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <form action="{{ route('donhangs.store') }}" method="POST">
                @csrf
            <div class="row">
              
                <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap">
                        <h5 class="checkout-title">Chi tiết thanh toán</h5>
                        <div class="billing-form-wrap">
                        
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="single-input-item">
                                    <label for="ten_nguoi_nhan" class="required">Tên người nhận</label>
                                    <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" placeholder="Nhập tên người nhận" value="{{ Auth::user()->name }}"/>
                                    @error('ten_nguoi_nhan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="single-input-item">
                                    <label for="email_nguoi_nhan">Email người nhận</label>
                                    <input type="text" id="email_nguoi_nhan" name="email_nguoi_nhan" placeholder="Email người nhận" value="{{ Auth::user()->email }}"/>
                                    @error('email_nguoi_nhan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="single-input-item">
                                    <label for="so_dien_thoai_nguoi_nhan">Số điện thoại người nhận</label>
                                    <input type="text" id="so_dien_thoai_nguoi_nhan" name="so_dien_thoai_nguoi_nhan" placeholder="Số điện thoại người nhận" value="{{ Auth::user()->phone }}"/>
                                    @error('so_dien_thoai_nguoi_nhan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                              
                                <div class="single-input-item">
                                    <label for="dia_chi_nguoi_nhan">Địa chỉ người nhận</label>
                                    <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" placeholder="Địa chỉ người nhận" value="{{ Auth::user()->address }}"/>
                                    @error('dia_chi_nguoi_nhan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                             
                                <div class="single-input-item">
                                    <label for="ghi_chu">Ghi chú</label>
                                    <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3" placeholder="Nhập ghi chú"></textarea>
                                </div>
                         
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="order-summary-details">
                        <h5 class="checkout-title">Đơn hàng của bạn</h5>
                        <div class="order-summary-content">
                            <div class="order-summary-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $key => $item)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('product-detail', $key) }}">
                                                        {{ $item['ten_san_pham'] }} <strong>x [{{ $item['so_luong'] }}]
                                                            ({{ $item['dung_luong'] }},{{ $item['mau_sac'] }})
                                                        </strong>
                                                    </a>
                                                </td>
                                                <td>
                                                    @php
                                                        $gia_hien_thi = isset($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] > 0 ? $item['gia_khuyen_mai'] : $item['gia'];
                                                        $tong_gia = $gia_hien_thi * $item['so_luong'];
                                                    @endphp
                                                    {{ number_format($gia_hien_thi, 0, '', '.') }}đ
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody> 
                                    <tfoot>
                                        <tr>
                                            <td>Tổng sản phẩm</td>
                                            <td>
                                                <strong>{{ number_format($subtotal, 0, '', '.') }}đ</strong>
                                                <input type="hidden" name="tien_hang" value="{{$subtotal}}">
                                                <input type="hidden" name="dung_luong" value="{{$item['dung_luong']}}">
                                                <input type="hidden" name="mau_sac" value="{{ $item['mau_sac']}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phí vận chuyển</td>
                                            <td><strong>{{ number_format($shipping, 0, '', '.') }}đ</strong>
                                                <input type="hidden" name="tien_ship" value="{{$shipping}}">
                                            
                                            </td>
                                        </tr>
                                        @if ($coupon > 0)
                                        <tr>
                                            <td>Phiếu giảm giá</td>
                                            <td><strong>-{{ number_format($coupon, 0, '', '.') }}đ</strong>
                                                <input type="hidden" name="tien_khuyen_mai" value="{{$coupon}}">
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td>Tổng đơn hàng</td>
                                            <td><strong>{{ number_format($total, 0, '', '.') }}đ</strong>
                                                <input type="hidden" name="tong_tien" value="{{$coupon}}">
                                            </td>
                                        </tr>
                                    </tfoot>

                                    
                                    
                                    
                                    
                                </table>
                            </div>
                                <div class="order-payment-method">
                                    <div class="form-group">
                                        <label for="payment-method">Phương thức thanh toán</label>
                                        <select id="payment-method" class="form-control">
                                            <option value="cod">Thanh toán khi giao hàng (COD)</option>
                                            <option value="paypal">Thanh toán Online PayPal</option>
                                        </select>
                                    </div>
                                    
                                    <div id="cod-details" class="payment-method-details summary-footer-area">
                                        <p>Thanh toán bằng tiền mặt khi giao hàng.</p>
                                        <button type="submit" class="btn btn-warning mt-2">Đặt hàng</button>
                                    </div>
                                    
                                    <div id="paypal-details" class="payment-method-details" style="display: none;">
                                        <p>Thanh toán bằng PayPal. Vui lòng nhập thông tin để tiếp tục.</p>
                                        <div id="paypal-box">
                                        </div>
                                        <button type="submit" id="place-order-btn" class="btn btn-sqr mt-2" style="display: none;">Đặt hàng</button>

                                    </div>
                                </div>
                           
                            
                        </div>
                    </div>
                </div>
           
            </div>
        </form>
        </div>
   
    </div> --}}
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
                                        <input placeholder="" type="text" name="ten_nguoi_nhan"
                                            value="{{ old('ten_nguoi_nhan', Auth::user()->name) }}">
                                        @error('ten_nguoi_nhan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input placeholder="" type="email" name="email_nguoi_nhan"
                                            value="{{ old('email_nguoi_nhan', Auth::user()->email) }}">
                                        @error('email_nguoi_nhan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Số Điện Thoại <span class="required">*</span></label>
                                        <input type="text" name="so_dien_thoai_nguoi_nhan"
                                            value="{{ old('so_dien_thoai_nguoi_nhan', Auth::user()->phone) }}">
                                        @error('so_dien_thoai_nguoi_nhan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa Chỉ <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="dia_chi_nguoi_nhan"
                                            value="{{ old('dia_chi_nguoi_nhan', Auth::user()->address) }}">
                                        @error('dia_chi_nguoi_nhan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Ghi Chú </label>
                                        <input placeholder="" name="ghi_chu" type="text" value="{{ old('ghi_chu') }}">
                                        @error('ghi_chu')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
                                        @foreach ($cart as $key => $item)
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    {{ $item['ten_san_pham'] }}({{ $item['dung_luong'] }},
                                                    {{ $item['mau_sac'] }}) <br><strong class="product-quantity"> ×
                                                        {{ $item['so_luong'] }}</strong></td>

                                                @php
                                                    $gia_hien_thi =
                                                        isset($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] > 0
                                                            ? $item['gia_khuyen_mai']
                                                            : $item['gia'];
                                                    $tong_gia = $gia_hien_thi * $item['so_luong'];
                                                @endphp
                                                <td class="cart-product-total"><span
                                                        class="amount">{{ number_format($tong_gia, 0, '', '.') }}
                                                        VND</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Tổng Phụ</th>
                                            <td><span class="amount">{{ number_format($tong_gia, 0, '', '.') }} VND</span>
                                                <input type="hidden" name="tien_hang" value="{{ $tong_gia }}">
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Voucher</th>
                                            <td><span class="amount">
                                                    @if ($coupon > 0)
                                                        -{{ number_format($coupon, 0, '', '.') }} VND
                                                        <input type="hidden" name="tien_khuyen_mai"
                                                            value="{{ $coupon }}">
                                                    @else
                                                        -0 VND
                                                        <input type="hidden" name="tien_khuyen_mai" value="0">
                                                    @endif


                                                </span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Phí Vận Chuyển</th>
                                            <td><span class="amount">{{ number_format($shipping, 0, '', '.') }} VND</span>
                                                <input type="hidden" name="tien_ship" value="{{ $shipping }}">
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng Đơn Hàng</th>
                                            <td><strong><span class="amount">
                                                        @if (session('total'))
                                                            {{ number_format(session('total'), 0, '', '.') }} VND
                                                            <input type="hidden" name="tong_tien"
                                                                value="{{ session('total') }}">
                                                        @else
                                                            {{ number_format($toTal, 0, '', '.') }} VND
                                                            <input type="hidden" name="tong_tien"
                                                                value="{{ $toTal }}">
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
    <!-- checkout main wrapper end -->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
@endsection

@section('js')
    <!-- Thêm PayPal SDK -->
    <script
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
    </script>
@endsection
