@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection
@section('css')
@endsection



@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Chi tiết đơn hàng</h4>
                </div>
            </div>
            {{-- <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $title }}</h5>
                        </div><!-- end card header -->

                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid --> --}}
            <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                      

                        <div class="card-body">
                            <table class="table table-striped mb-0">
                                <h3>Thôn tin người nhận </h3>
                                <thead>
                                    <th>Thông tin tài khoản đặt hàng</th>
                                    <th>Thông tin người nhận hàng</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <ul>
                                                <li>Tên tài khoản:<b>{{ $donHang->user->name }}</b></li>
                                                <li>Email:<b>{{ $donHang->user->email }}</b></li>
                                                <li>Số điện thoại:<b>{{ $donHang->user->phone }}</b></li>
                                                <li>Địa chỉ:<b>{{ $donHang->user->address }}</b></li>
                                                <li>Tài khoản :<b>{{ $donHang->user->role }}</b></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>Tên người nhận: <strong>{{ $donHang->ten_nguoi_nhan }}</strong></li>
                                                <li>Email người nhận: <strong>{{ $donHang->email_nguoi_nhan }}</strong></li>
                                                <li>Số điện thoại người nhận: <strong>{{ $donHang->so_dien_thoai_nguoi_nhan }}</strong></li>
                                                <li>Địa chỉ người nhận: <strong>{{ $donHang->dia_chi_nguoi_nhan }}</strong></li>
                                                <li>Ngày đặt hàng : <strong>
                                                        @if ($donHang->created_at)
                                                            {{ $donHang->created_at->format('d-m-Y') }}
                                                        @else
                                                            No Date
                                                        @endif
                                                    </strong></li>
                                                <li>Ghi chú nhận hàng: <strong>{{ $donHang->ghi_chu }}</strong></li>
                                                <li>Trạng thái đơn hàng: <strong>{{ $donHang->trang_thai_don_hang }}</strong></li>
                                                <li>Trạng thái thanh toán: <strong>{{ $donHang->trang_thai_thanh_toan }}</strong></li>
                                                <li>Tổng tiền hàng: <strong>{{ number_format($donHang->tien_hang, 0, '', '.') }}đ</strong></li>
                                                <li>Tổng tiền khuyến mãi: <strong>{{ number_format( $donHang->tien_khuyen_mai, 0, '', '.') }}đ</strong></li>
                                                <li>Tổng tiền ship: <strong>{{ number_format( $donHang->tien_ship, 0, '', '.') }}đ</strong></li>
                                                <li>Tổng tiền đơn hàng: <strong class="text-danger">{{ number_format($donHang->tong_tien, 0, '', '.') }}đ</strong></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header">
                            <h5 class="card-title mb-0">Sản phẩm của đơn hàng</h5>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="myaccount-content">
                                        <h5>Sản phẩm</h5>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Hình ảnh</th>
                                                        <th>Mã sản phẩm</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Đơn giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($donHang->chiTietDonHang as $item)
                                                    @php
                                                        $sanPham = $item->sanPham ;
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <img class="img-fluid" src=" {{ Storage::url($sanPham->hinh_anh) }}" alt="Sản phẩm" width="75px">
                                                        </td>
                                                        
                                                        <td>{{ $sanPham->ma_san_pham }}</td>
                                                        <td>{{ $sanPham->ten_san_pham }}</td>
                                                        <td>{{ number_format($item->don_gia, 0, '', '.') }}đ</td>
                                                        <td>{{ $item->so_luong }}</td>
                                                        <td>{{ number_format($item->thanh_tien, 0, '', '.') }}đ</td>
            
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                   
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
            
            
                                </div>
                            </div>
                        </div><!-- end card header -->
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div> <!-- content -->
    @endsection
