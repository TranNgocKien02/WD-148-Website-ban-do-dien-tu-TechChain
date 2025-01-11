@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection
@section('css')
@endsection



@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý đơn hàng</h4>
                </div>
            </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Order {{ $donHang->ma_don_hang }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-nowrap align-middle table-borderless mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">Chi Tiết Sản Phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Giá khuyến mãi</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col" class="text-end">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donHang->chiTietDonHangs as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                        <img src="{{ Storage::url($item->anh_san_pham) }}" alt=""
                                                            class="img-fluid d-block">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="fs-15 fw-bold"><a
                                                                href="{{ route('admins.sanphams.show', $item->productVariant->san_pham_id) }}"
                                                                class="link-dark">{{ $item->ten_san_pham }}</a></h5>
                                                        <p class="text-muted mb-0">Dung lượng: <span
                                                                class="fw-medium">{{ $item->dung_luong }}</span>
                                                        </p>
                                                        <p class="text-muted mb-0">Màu sắc:<span
                                                                class="fw-medium">{{ $item->mau_sac }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ number_format($item->don_gia, 0, ',', '.') }} VND</td>
                                            <td>{{ number_format($item->gia_khuyen_mai, 0, ',', '.') }} VND</td>

                                            <td>{{ $item->so_luong }}</td>
                                            <td class="fw-medium text-end">
                                                {{ number_format($item->so_luong * $item->gia_khuyen_mai, 0, ',', '.') }}
                                                VND
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr class="border-top border-top-dashed">
                                        <td colspan="3"></td>
                                        <td colspan="2" class="fw-medium p-0">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Tổng phụ :</td>
                                                        <td class="text-end">{{ number_format($tongPhu, 0, ',', '.') }} VND
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Giảm giá từ Voucher:</td>
                                                        <td class="text-end">{{ number_format($giamGia, 0, ',', '.') }} VND
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phị vận chuyển :</td>
                                                        <td class="text-end">
                                                            {{ number_format($phiVanChuyen, 0, ',', '.') }} VND</td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed">
                                                        <th scope="row">Tổng (VND) :</th>
                                                        <th class="text-end">
                                                            {{ number_format($donHang->tong_tien, 0, ',', '.') }} VND</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Order Status</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="profile-timeline">
                            @if ($donHang->trang_thai_don_hang === "huy_don_hang")
                                <div class="alert alert-danger mb-0">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-danger rounded-circle material-shadow">
                                                <i class="mdi mdi-cancel"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-15 mb-0 fw-bold text-danger">Đơn Hàng Đã Bị Hủy</h6>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="accordion accordion-flush" id="accordionFlushExample">

                                    <!-- Đặt Hàng -->
                                    <div class="accordion-item border-0">
                                        <div class="accordion-header" id="headingOne">
                                            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                                href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle material-shadow">
                                                            <i class="mdi mdi-shopping"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6
                                                            class="fs-15 mb-0 fw-bold">
                                                            Đặt Hàng - <span
                                                                class="fw-normal">{{ \Carbon\Carbon::parse($donHang->created_at)->format('d/m/Y, g:iA') }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Người Bán Xác Nhận -->
                                    <div class="accordion-item border-0">
                                        <div class="accordion-header" id="headingTwo">
                                            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                                href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle material-shadow">
                                                            <i class="mdi mdi-gift-outline"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6
                                                            class="fs-15 mb-1 {{ in_array($donHang->trang_thai_don_hang, ['da_xac_nhan','dang_chuan_bi', 'dang_van_chuyen', 'da_giao_hang']) ? 'fw-bold' : 'fw-normal' }}">
                                                            Người Bán Xác Nhận</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Đang Chuẩn Bị Hàng -->
                                    <div class="accordion-item border-0">
                                        <div class="accordion-header" id="headingThree">
                                            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                                href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle material-shadow">
                                                            <i class="mdi mdi-package"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6
                                                            class="fs-15 mb-1 {{ in_array($donHang->trang_thai_don_hang, ['dang_chuan_bi', '_dang_van_chuyen', 'da_giao_hang']) ? 'fw-bold' : 'fw-normal' }}">
                                                            Đang Chuẩn Bị Hàng</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Đang Vận Chuyển -->
                                    <div class="accordion-item border-0">
                                        <div class="accordion-header" id="headingFour">
                                            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                                href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle material-shadow">
                                                            <i class="mdi mdi-truck"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6
                                                            class="fs-15 mb-1 {{ in_array($donHang->trang_thai_don_hang, ['dang_van_chuyen', 'da_giao_hang']) ? 'fw-bold' : 'fw-normal' }}">
                                                            Đang Vận Chuyển</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Đã Giao Hàng -->
                                    <div class="accordion-item border-0">
                                        <div class="accordion-header" id="headingFour">
                                            <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                                href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle material-shadow">
                                                            <i class="mdi mdi-truck"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6
                                                            class="fs-15 mb-1 {{ in_array($donHang->trang_thai_don_hang, ['da_giao_hang']) ? 'fw-bold' : 'fw-normal' }}">
                                                            Đã Giao Hàng</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!--end accordion-->
                        </div>
                    </div>
                </div>

                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0"><i
                                    class="mdi mdi-truck-fast-outline align-middle me-1 text-muted"></i> Chi tiết thanh toán
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <p class="text-muted mb-0">Phương thức thanh toán : {{$donHang->phuong_thuc_thanh_toan}}</p>
                        </div>
                    </div>
                </div>
                <!--end card-->

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">Chi Tiết Khách Hàng</h5>
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="link-secondary">Xem</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 vstack gap-3">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ Storage::url($donHang->user->anh) }}" alt="" class="avatar-sm rounded material-shadow">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="fs-14 mb-1 fw-bold">{{ $donHang->user->name }}</h6>
                                        <p class="text-muted mb-0"></p>
                                    </div>
                                </div>
                            </li>
                            <li><i class="mdi mdi-email-outline me-2 align-middle text-muted fs-16"></i>{{ $donHang->user->email }}
                            </li>
                            <li><i class="mdi mdi-phone-outline me-2 align-middle text-muted fs-16"></i>{{ $donHang->user->phone }}
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="mdi mdi-map-marker-outline align-middle me-1 text-muted"></i>  Địa Chỉ
                            Giao Hàng</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                            <li class="fw-bold fs-14">{{ $donHang->ten_nguoi_nhan }}</li>
                            <li>{{ $donHang->so_dien_thoai_nguoi_nhan }}</li>
                            <li>{{ $donHang->dia_chi_nguoi_nhan }}</li>
                        </ul>
                    </div>
                </div>
                <!--end card-->

                {{-- <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i>
                            Chi Tiết Thanh Toán</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Transactions:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">#VLZ124561278124</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Phương thức:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">Debit Card</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Card Holder Name:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">Joseph Parker</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Card Number:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">xxxx xxxx xxxx 2456</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Total Amount:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">$415.96</h6>
                            </div>
                        </div>
                    </div>

                </div> --}}
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
@endsection
