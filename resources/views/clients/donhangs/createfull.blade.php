@extends('layouts.client')

@section('css')
<style>
    #paypal-box {
    display: block !important;
    width: 100%; /* Điều chỉnh kích thước nếu cần */
}

</style>
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
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <form action="{{ route('donhangs.store') }}" method="POST">
                @csrf
            <div class="row">
              
                <!-- Checkout Billing Details -->
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

                <!-- Order Summary Details -->
                <div class="col-lg-6">
                    <div class="order-summary-details">
                        <h5 class="checkout-title">Đơn hàng của bạn</h5>
                        <div class="order-summary-content">
                            <!-- Order Summary Table -->
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
                                                        {{ $item->sanpham->ten_san_pham }} <strong>x [{{ $item->so_luong }}]
                                                            ({{ $item->dung_luong }},{{ $item->mau_sac }})
                                                        </strong>
                                                    </a>
                                                </td>
                                                <td>
                                                    @php
                                                        $gia_hien_thi = isset($item->sanpham->gia_khuyen_mai) && $item->sanpham->gia_khuyen_mai > 0 ? $item->sanpham->gia_khuyen_mai : $item->sanpham->gia_san_pham;
                                                        $tong_gia = $gia_hien_thi * $item->so_luong;
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phí vận chuyển</td>
                                            <td><strong>{{ number_format($shipping, 0, '', '.') }}đ</strong>
                                                <input type="hidden" name="tien_ship" value="{{$shipping}}">
                                            
                                            </td>
                                        </tr>
                                        @if($coupon > 0)
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
                            <!-- Order Payment Method -->
                           
                                {{-- <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="phuong_thuc_thanh_toan" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Thanh toán khi giao hàng</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Thanh toán bằng tiền mặt khi giao hàng.</p>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="order-payment-method">
                                    <div class="form-group">
                                        <label for="payment-method">Phương thức thanh toán</label>
                                        <select id="payment-method" class="form-control">
                                            <option value="cod">Thanh toán khi giao hàng (COD)</option>
                                            <option value="paypal">Thanh toán Online PayPal</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Chi tiết khi chọn COD -->
                                    <div id="cod-details" class="payment-method-details summary-footer-area">
                                        <p>Thanh toán bằng tiền mặt khi giao hàng.</p>
                                        <button type="submit" class="btn btn-warning mt-2">Đặt hàng</button>
                                    </div>
                                    
                                    <!-- Chi tiết khi chọn PayPal -->
                                    <div id="paypal-details" class="payment-method-details" style="display: none;">
                                        <p>Thanh toán bằng PayPal. Vui lòng nhập thông tin để tiếp tục.</p>
                                        <div id="paypal-box">
                                            <!-- PayPal button sẽ được tích hợp vào đây -->
                                        </div>
                                        <!-- Nút Đặt hàng, ban đầu sẽ bị ẩn -->
                                        <button type="submit" id="place-order-btn" class="btn btn-sqr mt-2" style="display: none;">Đặt hàng</button>

                                    </div>
                                </div>
                                {{-- <div class="summary-footer-area">
                                    <button type="submit" class="btn btn-sqr">Place Order</button>
                                </div>  --}}
                           
                            
                        </div>
                    </div>
                </div>
           
            </div>
        </form>
        </div>
   
    </div>
    <!-- checkout main wrapper end -->
</main>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
@endsection

@section('js')
<!-- Thêm PayPal SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=AbwlofImYY9g_g3EKi4Hx5ela-htKEt2Q9ZXXOcng8O3xteVQ_RM94T9axkKHesAQtcayGfz2eus3x_l&components=buttons"></script>
<script>
 document.getElementById('payment-method').addEventListener('change', function () {
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
                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '100.00'  // Giá trị thanh toán, có thể thay đổi theo đơn hàng
                            }
                        }]
                    });
                },
                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (details) {
                        alert('Thanh toán thành công bởi ' + details.payer.name.given_name);
                        
                        // Hiển thị nút Đặt hàng sau khi thanh toán thành công
                        placeOrderButton.style.display = 'inline-block';
                    });
                },
                onError: function (err) {
                    alert('Đã xảy ra lỗi trong quá trình thanh toán.');
                }
            }).render('#paypal-box'); // Hiển thị nút PayPal trong div #paypal-box
        }
    }
});



</script>


@endsection
