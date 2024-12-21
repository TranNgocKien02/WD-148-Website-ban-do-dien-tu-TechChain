@extends('layouts.admin')

@section('title', 'Quản lý Thông Tin Trang Web')

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-center">
            <h4 class="fs-18 fw-semibold m-0">Quản lý Thông Tin Trang Web</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Thông Tin Trang Web</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admins.thongtintrangwebs.update', $thongTin->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="tieu_de" class="form-label">Tiêu Đề</label>
                                <input type="text" name="tieu_de" class="form-control" value="{{ $thongTin->tieu_de ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="mo_ta" class="form-label">Mô Tả</label>
                                <textarea name="mo_ta" class="form-control" rows="4">{{ $thongTin->mo_ta ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="so_dien_thoai" class="form-label">Số Điện Thoại</label>
                                <input type="text" name="so_dien_thoai" class="form-control" value="{{ $thongTin->so_dien_thoai ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="email_ho_tro" class="form-label">Email Hỗ Trợ</label>
                                <input type="email" name="email_ho_tro" class="form-control" value="{{ $thongTin->email_ho_tro ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="dia_chi" class="form-label">Địa Chỉ</label>
                                <input type="text" name="dia_chi" class="form-control" value="{{ $thongTin->dia_chi ?? '' }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        </form>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div> <!-- container-fluid -->
</div> 
@endsection
