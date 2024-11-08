@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <!-- Thêm CSS tùy chỉnh nếu cần -->
@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý Khuyến Mãi</h4>
            </div>
        </div>
        <div class="row">
        <!-- Striped Rows -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $title }}</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="{{ route('admins.khuyenmais.store') }}" method="post">
                        @csrf
                        <div class="row">

                            <!-- Tên khuyến mãi -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="ten_khuyen_mai" class="form-label">Tên khuyến mãi</label>
                                    <input type="text" id="ten_khuyen_mai" name="ten_khuyen_mai" class="form-control @error('ten_khuyen_mai') is-invalid @enderror" value="{{ old('ten_khuyen_mai') }}" placeholder="Tên khuyến mãi">
                                    @error('ten_khuyen_mai')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mô tả khuyến mãi -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="mo_ta" class="form-label">Mô tả</label>
                                    <input type="text" id="mo_ta" name="mo_ta" class="form-control @error('mo_ta') is-invalid @enderror" value="{{ old('mo_ta') }}" placeholder="Mô tả khuyến mãi">
                                    @error('mo_ta')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Loại khuyến mãi -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="loai_khuyen_mai" class="form-label">Loại khuyến mãi</label>
                                    <select id="loai_khuyen_mai" name="loai_khuyen_mai" class="form-control @error('loai_khuyen_mai') is-invalid @enderror">
                                        <option value="">Chọn loại khuyến mãi</option>
                                        <option value="giam_gia" {{ old('loai_khuyen_mai') == 'giam_gia' ? 'selected' : '' }}>Giảm giá</option>
                                        <option value="tang_qua" {{ old('loai_khuyen_mai') == 'tang_qua' ? 'selected' : '' }}>Tặng quà</option>
                                        <option value="mien_phi" {{ old('loai_khuyen_mai') == 'mien_phi' ? 'selected' : '' }}>Miễn phí</option>
                                        <!-- Thêm các lựa chọn khác nếu cần -->
                                    </select>
                                    @error('loai_khuyen_mai')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <!-- Giá trị khuyến mãi -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="gia_tri_khuyen_mai" class="form-label">Giá trị khuyến mãi</label>
                                    <input type="number" id="gia_tri_khuyen_mai" name="gia_tri_khuyen_mai" class="form-control @error('gia_tri_khuyen_mai') is-invalid @enderror" value="{{ old('gia_tri_khuyen_mai') }}" step="0.01" placeholder="Giá trị khuyến mãi">
                                    @error('gia_tri_khuyen_mai')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Ngày bắt đầu -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                                    <input type="date" id="ngay_bat_dau" name="ngay_bat_dau" class="form-control @error('ngay_bat_dau') is-invalid @enderror" value="{{ old('ngay_bat_dau') }}">
                                    @error('ngay_bat_dau')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Ngày kết thúc -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                                    <input type="date" id="ngay_ket_thuc" name="ngay_ket_thuc" class="form-control @error('ngay_ket_thuc') is-invalid @enderror" value="{{ old('ngay_ket_thuc') }}">
                                    @error('ngay_ket_thuc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Trạng thái -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="trang_thai" class="form-label">Trạng thái</label>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai_1" value="1" checked>
                                            <label class="form-check-label" for="trang_thai_1">
                                                Kích hoạt
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai_0" value="0">
                                            <label class="form-check-label" for="trang_thai_0">
                                                Chưa kích hoạt
                                            </label>
                                        </div>
                                    </div>
                                    @error('trang_thai')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <!-- Submit button -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div><!-- end card body -->
        </div>
        </div>
        </div>

    </div> <!-- container-fluid -->
</div> <!-- content -->

@endsection

@section('js')
    <script>
        // Nếu cần có sự kiện JS để xử lý, bạn có thể viết ở đây
    </script>
@endsection
