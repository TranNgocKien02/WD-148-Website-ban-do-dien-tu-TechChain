@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection
@section('css')
<style>
        .dataTables_length {
            display: none;
            /* Ẩn phần 'Show entries' */
        }
    </style>  
@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý danh mục khuyến mãi</h4>
            </div>
        </div>
        <div class="row">
            <!-- Striped Rows -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0 align-content-center">{{ $title }}</h5>
                        <a href="{{ route('admins.coupons.create') }}" class="btn btn-success"><i data-feather="plus-square"></i> Thêm khuyến mãi</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <table id="table" class="datatable table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên mã</th>
                                        <th>Loại</th>
                                        <th>Giá trị</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listCoupons as $index => $coupon)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $coupon->name }}</td>
                                        <td>{{ $coupon->type == 'percentage' ? 'Phần trăm' : 'Cố định' }}</td>
                                        <td>{{ $coupon->value }}</td>
                                        <td>{{ $coupon->expiration_date }}</td>
                                        <td>
                                            <a href="{{ route('admins.coupons.edit', $coupon->id) }}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                            <form action="{{ route('admins.coupons.destroy', $coupon->id) }}" method="post" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-white">
                                                    <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
                                                </button>
                                            </form>
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

@section('js')
<script>
        $(document).ready(function() {
            // Áp dụng DataTable cho tất cả các bảng có class 'datatable'
            $('table.datatable').each(function() {
                $(this).DataTable({
                    "paging": true, // Hiển thị phân trang
                    "searching": true, // Tìm kiếm
                    "ordering": true, // Sắp xếp
                    "info": true, // Hiển thị thông tin
                    "pageLength": 8 // Số dòng mỗi trang
                });
            });
        });
    </script>
@endsection
