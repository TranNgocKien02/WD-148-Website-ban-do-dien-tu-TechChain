@extends('layouts.client')

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
                                <li class="breadcrumb-item active" aria-current="page">Order detail</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="myaccount-content">
                            <h5>Thông tin đơn hàng: <span class="text-danger"> {{ $donHang->ma_don_hang }}</span> </h5>
                            <div class="welcome">
                                <p>Tên người nhận: <strong>{{ $donHang->ten_nguoi_nhan }}</strong></p>
                                <p>Email người nhận: <strong>{{ $donHang->email_nguoi_nhan }}</strong></p>
                                <p>Số điện thoại người nhận: <strong>{{ $donHang->so_dien_thoai_nguoi_nhan }}</strong></p>
                                <p>Địa chỉ người nhận: <strong>{{ $donHang->dia_chi_nguoi_nhan }}</strong></p>
                                <p>Ngày đặt hàng : <strong>
                                        @if ($donHang->created_at)
                                            {{ $donHang->created_at->format('d-m-Y') }}
                                        @else
                                            No Date
                                        @endif
                                    </strong></p>
                                <p>Ghi chú nhận hàng: <strong>{{ $donHang->ghi_chu }}</strong></p>
                                <p>Trạng thái đơn hàng: <strong>{{ $donHang->trang_thai_don_hang }}</strong></p>
                                <p>Trạng thái thanh toán: <strong>{{ $donHang->trang_thai_thanh_toan }}</strong></p>
                                <p>Tổng tiền hàng: <strong>{{ number_format($donHang->tien_hang, 0, '', '.') }}đ</strong>
                                </p>
                                <p>Tổng tiền khuyến mãi:
                                    <strong>{{ number_format($donHang->tien_khuyen_mai, 0, '', '.') }}đ</strong></p>
                                <p>Tổng tiền ship: <strong>{{ number_format($donHang->tien_ship, 0, '', '.') }}đ</strong>
                                </p>
                                <p>Tổng tiền đơn hàng:
                                    <strong>{{ number_format($donHang->tong_tien, 0, '', '.') }}đ</strong></p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="myaccount-content">
                            <h5>Sản phẩm</h5>
                            <div class="myaccount-table table-responsive text-center">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-thumbnail">Ảnh</th>
                                        <th class="cart-product-name">Mã Sản Phẩm</th>
                                        <th class="cart-product-name">Sản Phẩm</th>
                                        <th class="li-product-price">Đơn Giá</th>
                                        <th class="li-product-quantity">Số Lượng</th>
                                        <th class="li-product-subtotal">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donHang->chiTietDonHangs as $item)
                                        <tr>
                                            <td class="li-product-thumbnail"><a href="#"><img
                                                        src="{{ Storage::url($item->anh_san_pham) }}"
                                                        alt="{{ $item->anh_san_pham }}"></a></td>
                                            <td>{{$item->ma_san_pham}}</td>                                                            
                                            <td class=" ">
                                                <a
                                                    href="{{ route('product-detail', $item->productVariant->san_pham_id) }}">{{ $item->productVariant->sanPham->ten_san_pham }}</a>
                                                <div class="">
                                                    <small class="text-secondary">Dung lượng:
                                                        {{ $item->dung_luong }}</small>
                                                    <small class="text-secondary">Màu sắc: {{ $item->mau_sac }}</small>
                                                </div>
                                            </td>
                                            <td class="li-product-price">
                                                @if ($item->gia_khuyen_mai > 0)
                                                    <span class="amount text-danger">
                                                        {{ number_format($item->gia_khuyen_mai, 0, '', '.') }}
                                                        VND
                                                    </span>
                                                    <del class="text-muted small" style="margin-left: 5px;">
                                                        {{ number_format($item->don_gia, 0, '', '.') }}
                                                        VND
                                                    </del>
                                                @else
                                                    <span class="amount text-danger">
                                                        {{ number_format($item->don_gia, 0, '', '.') }}
                                                        VND
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="quantity">
                                                {{$item->so_luong}}
                                            </td>
                                            @php
                                                $price =
                                                    isset($item->productVariant->sanpham->gia_khuyen_mai) &&
                                                    $item->productVariant->sanpham->gia_khuyen_mai > 0
                                                        ? $item->productVariant->sanpham->gia_khuyen_mai
                                                        : $item->productVariant->sanpham->don_gia;
                                                $subtotal = $price * $item->so_luong;
                                            @endphp
                                            <td class="product-subtotal"><span
                                                    class="amount">{{ number_format($subtotal, 0, '', '.') }} VND</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
