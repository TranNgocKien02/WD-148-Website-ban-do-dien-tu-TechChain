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
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
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
                            <form action="{{ route('cart.update')}}" method="post">
                                @csrf
                                <!-- Cart Table Area -->
                                <div class="cart-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                                <th class="pro-title">Sản phẩm</th>
                                                <th class="pro-price">Giá</th>
                                                <th class="pro-quantity">Số lượng</th>
                                                <th class="pro-subtotal">Tổng</th>
                                                <th class="pro-remove">Xóa sản phẩm</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $key => $item)
                                                <tr>
                                                    <td class="pro-thumbnail">
                                                        <a href="#">
                                                            <img class="img-fluid" src="{{ Storage::url($item->sanPham->hinh_anh) }}" alt="Product" width="100px" />
                                                        </a>
                                                        <input type="hidden" name="hinh_anh" value="{{ $item->sanPham->hinh_anh }}">
                                                    </td>
                                                    <td class="pro-title">
                                                        <a href="{{ route('product-detail', $key) }}" class="tm-cart-productname">{{ $item->sanPham->ten_san_pham }}</a><br>
                                                        <a href="{{ route('product-detail', $key) }}" class="tm-cart-productname">{{ $item->dung_luong }},{{ $item->mau_sac }}</a>
                                                        <input type="hidden" name="ten_san_pham" value="{{ $item->sanPham->ten_san_pham }}">
                                                    </td>
                                        
                                                    <td class="pro-price">
                                                        @if (isset($item->sanPham->gia_khuyen_mai) && $item->sanPham->gia_khuyen_mai > 0)
                                                            <del><span class="text-decoration-line-through">{{ number_format($item->sanpham->gia_san_pham, 0, '', '.') }}đ</span></del>
                                                            <br>
                                                            <span class="text-success">{{ number_format($item->sanPham->gia_khuyen_mai, 0, '', '.') }}đ</span>
                                                        @else
                                                            {{ number_format($item->sanpham->gia_san_pham, 0, '', '.') }}đ
                                                        @endif
                                                    </td>
                                        
                                                    <input type="hidden" name="gia" value="{{ isset($item->sanPham->gia_khuyen_mai) && $item->sanPham->gia_khuyen_mai > 0 ? $item->sanPham->gia_khuyen_mai : $item->sanpham->gia_san_pham }}">
                                        
                                                    <td class="pro-quantity">
                                                        <div class="pro-qty">
                                                            <span class="dec qtybtn">-</span>
                                                            <input type="text" value="{{ $item->so_luong }}" data-price="{{ $item->sanpham->gia_san_pham }}" class="quantityInput" name="so_luong" />
                                                            <span class="inc qtybtn">+</span>
                                                        </div>
                                                    </td>
                                        
                                                    <td class="pro-subtotal">
                                                        @php
                                                            $price = isset($item->sanPham->gia_khuyen_mai) && $item->sanPham->gia_khuyen_mai > 0 ? $item->sanPham->gia_khuyen_mai : $item->sanpham->gia_san_pham;
                                                            $subtotal = $price * $item->so_luong;
                                                        @endphp
                                                        <span class="subtotal">{{ number_format($subtotal, 0, '', '.') }}đ</span>
                                                    </td>
                                              
                                                    <!-- Delete Option -->
                                                    <td>
                                                        <a class="dropdown-item" href="#"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#removeItemModal"
                                                           data-id="{{ $item->id }}"
                                                           data-action="{{ route('cart.destroy', $item) }}">
                                                           <i class="mdi mdi-delete text-muted fs-16 p-1"></i>
                                                           Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                              
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                                <!-- Cart Update Option -->
                                <div class="cart-update-option d-block d-md-flex justify-content-between">
                                    <div></div>

                                    
                                    <div class="cart-update">
                                        <button type="submit" class="btn btn-sqr">Cập nhật giỏ hàng</button>
                                    </div>
                                </div>
                            </form>
                            <div style="display: flex; justify-content: flex-end;">
                                <div>
                                    <form action="{{ route('client.apply_coupon') }}" method="POST">
                                        @csrf
                                        <div class="apply-coupon-wrapper">
                                            <div class="coupon-all">
                                                <div class="coupon">
                                                    <input id="coupon_code" class="input-text" name="coupon_code" placeholder="mã giảm giá" type="text">
                                                    <input class="button" name="apply_coupon" value="Thêm voucher" type="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            
                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                            
                                    @if(session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                </div>
                            </div>
                            

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Tổng đơn hàng</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Tổng sản phẩm</td>
                                                <td>
                                                    {{ number_format($subtotal, 0, '', '.') }}đ
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Vận chuyển</td>
                                                <td>
                                                    {{ number_format($shipping,  0, '', '.') }}đ
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Voucher</td>
                                                <td>
                                                    @if($coupon > 0)
                                                        <p>Giảm: -{{ number_format($coupon,  0, '', '.') }}đ</p>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="total">
                                                <td>Tổng</td>
                                                <td>
                                                    {{ number_format($total,  0, '', '.') }}đ
                                                </td>
                                            </tr>
                                            
                                            {{-- <p>Subtotal: ${{ number_format($subTotal, 2) }}</p>
                                            <p>Shipping: ${{ number_format($shipping, 2) }}</p>

                                            @if($coupon > 0)
                                                <p>Discount: -${{ number_format($coupon, 2) }}</p>
                                            @endif


                                            <p>Total: ${{ number_format($total, 2) }}</p> --}}

                                        </table>
                                    </div>
                                </div>
                                <a href="{{ route('fulldonhangs.create') }}" class="btn btn-warning ">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

<!-- Modal Xác nhận xóa -->
<div class="modal fade" id="removeItemModal" tabindex="-1" aria-labelledby="removeItemModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeItemModalLabel">Xác nhận xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa sản phẩm này?
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
    // Đảm bảo jQuery được tải và sẵn sàng sử dụng
    $(document).ready(function () {
            $(document).on('click', '.dropdown-item[data-bs-toggle="modal"]', function () {
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
    console.log("Button clicked!");  // Kiểm tra xem có bấm vào nút không
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


</script>

@endsection
