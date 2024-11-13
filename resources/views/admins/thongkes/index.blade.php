@extends('layouts.admin')

@section('title', 'Thống Kê')

@section('css')

@endsection

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Thống Kê</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Thông tin thống kê</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Tổng Đơn Hàng</th>
                                        <th>Tổng Sản Phẩm</th>
                                        <th>Đơn Hàng Đã Giao</th>
                                        <th>Đơn Hàng Đã Hủy</th>
                                        <th>Doanh Thu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $data['tongDonHang'] }}</td>
                                        <td>{{ $data['tongSanPham'] }}</td>
                                        <td>{{ $data['donHangDaGiao'] }}</td>
                                        <td>{{ $data['donHangDaHuy'] }}</td>
                                        <td>{{ number_format($data['doanhThu'], 0, ',', '.') }} VNĐ</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Nút chuyển sang biểu đồ -->
                            <a 
                            href="{{ route('admins.thongkes.bao-cao') }}" 
                            class="btn btn-primary mt-2">Xem Biểu Đồ</a>

                            <!-- Nút chi tiết thống kê -->
                            <a 
                            href="{{ route('admins.thongkes.chiTietThongKe') }}" 
                            class="btn btn-info mt-2">Chi Tiết Thống Kê</a>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')

@endsection
