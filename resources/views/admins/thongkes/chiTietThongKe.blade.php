@extends('layouts.admin')

@section('title', 'Chi Tiết Thống Kê')

@section('css')

@endsection

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Chi Tiết Thống Kê</h4>
            </div>
        </div>

        <!-- Products Section -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Danh Sách Sản Phẩm</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã Sản Phẩm</th>
                                        <th>Hình ảnh Sản Phẩm</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listSanPham as $index => $sanPham)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $sanPham->ma_san_pham }}</td>
                                        <td>
                                            <img src="{{ Storage::url($sanPham->hinh_anh) }}" alt="Hình ảnh sản phẩm" width="100px">
                                        </td>
                                        <td>{{ $sanPham->ten_san_pham }}</td>
                                        <td>{{ number_format($sanPham->gia_san_pham, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $sanPham->so_luong }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

        <!-- Orders Section -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Danh Sách Đơn Hàng</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listDonHang as $index => $donHang)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $donHang->ma_don_hang }}</td>
                                        <td>{{ $donHang->user->name }}</td>
                                        <td>{{ number_format($donHang->tong_tien, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $donHang->trang_thai_thanh_toan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

        <!-- Delivered Orders Section -->
        {{-- <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Đơn Hàng Đã Giao</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deliveredOrders as $index => $donHang)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $donHang->ma_don_hang }}</td>
                                        <td>{{ $donHang->user->name }}</td>
                                        <td>{{ number_format($donHang->tong_tien, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $donHang->trangThai->ten_trang_thai }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

        <!-- Cancelled Orders Section -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Đơn Hàng Đã Hủy</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cancelledOrders as $index => $donHang)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $donHang->ma_don_hang }}</td>
                                        <td>{{ $donHang->user->name }}</td>
                                        <td>{{ number_format($donHang->tong_tien, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $donHang->trangThai->ten_trang_thai }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row --> --}}

        <div class="table-responsive">
            <a 
            href="{{ route('admins.thongkes.index') }}" 
            class="btn btn-info mt-2">BACK</a>
        </div>

    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')

@endsection
