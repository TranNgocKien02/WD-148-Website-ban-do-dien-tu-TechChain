@extends('layouts.admin')

@section('title', 'Chỉnh sửa khuyến mãi')

@section('content')
<div class="container">
    <h1 style="margin-top: 20px">Chỉnh sửa khuyến mãi: {{ $khuyenMai->ten_khuyen_mai }}</h1>
    <form action="{{ route('admins.khuyenmais.update', $khuyenMai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="ten_khuyen_mai" class="form-label">Tên khuyến mãi</label>
            <input type="text" class="form-control @error('ten_khuyen_mai') is-invalid @enderror" id="ten_khuyen_mai" name="ten_khuyen_mai" value="{{ old('ten_khuyen_mai', $khuyenMai->ten_khuyen_mai) }}">
            @error('ten_khuyen_mai')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="mo_ta" class="form-label">Mô tả</label>
            <textarea class="form-control @error('mo_ta') is-invalid @enderror" id="mo_ta" name="mo_ta" rows="3">{{ old('mo_ta', $khuyenMai->mo_ta) }}</textarea>
            @error('mo_ta')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="loai_khuyen_mai" class="form-label">Loại khuyến mãi</label>
            <select class="form-control @error('loai_khuyen_mai') is-invalid @enderror" id="loai_khuyen_mai" name="loai_khuyen_mai">
                <option value="giam_gia" {{ old('loai_khuyen_mai', $khuyenMai->loai_khuyen_mai) == 'giam_gia' ? 'selected' : '' }}>Giảm giá</option>
                <option value="giam_theo_phan_tram" {{ old('loai_khuyen_mai', $khuyenMai->loai_khuyen_mai) == 'giam_theo_phan_tram' ? 'selected' : '' }}>Giảm theo phần trăm</option>
                <option value="tang_qua" {{ old('loai_khuyen_mai', $khuyenMai->loai_khuyen_mai) == 'tang_qua' ? 'selected' : '' }}>Tặng quà</option>
            </select>
            @error('loai_khuyen_mai')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gia_tri_khuyen_mai" class="form-label">Giá trị khuyến mãi</label>
            <input type="number" class="form-control @error('gia_tri_khuyen_mai') is-invalid @enderror" id="gia_tri_khuyen_mai" name="gia_tri_khuyen_mai" value="{{ old('gia_tri_khuyen_mai', $khuyenMai->gia_tri_khuyen_mai) }}">
            @error('gia_tri_khuyen_mai')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
            <input type="date" class="form-control @error('ngay_bat_dau') is-invalid @enderror" id="ngay_bat_dau" name="ngay_bat_dau" value="{{$khuyenMai->ngay_bat_dau->format('Y-m-d') }}">
            @error('ngay_bat_dau')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
            <input type="date" class="form-control @error('ngay_ket_thuc') is-invalid @enderror" id="ngay_ket_thuc" name="ngay_ket_thuc" value="{{$khuyenMai->ngay_ket_thuc->format('Y-m-d') }}">
            @error('ngay_ket_thuc')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="trang_thai" class="form-label">Trạng thái</label>
            <select class="form-control @error('trang_thai') is-invalid @enderror" id="trang_thai" name="trang_thai">
                <option value="1" {{ old('trang_thai', $khuyenMai->trang_thai) == 1 ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ old('trang_thai', $khuyenMai->trang_thai) == 0 ? 'selected' : '' }}>Ẩn</option>
            </select>
            @error('trang_thai')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
