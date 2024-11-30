@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')

@endsection

@section('content')
<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Thêm mới mã khuyến mãi</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="{{ route('admins.coupons.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên mã</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên mã" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Loại</label>
                                        <select class="form-select" id="type" name="type" required>
                                            <option value="percentage">Phần trăm</option>
                                            <option value="fixed">Cố định</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="value" class="form-label">Giá trị</label>
                                        <input type="number" id="value" name="value" class="form-control" placeholder="Nhập giá trị" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="expiration_date" class="form-label">Ngày hết hạn</label>
                                        <input type="datetime-local" id="expiration_date" name="expiration_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
        </div>
    </div> <!-- container-xxl -->
</div> <!-- content -->
@endsection

@section('js')

@endsection
