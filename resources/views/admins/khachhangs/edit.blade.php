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
                <h4 class="fs-18 fw-semibold m-0">Sửa thông tin khách hàng</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admins.khachhangs.update', $khachHang->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên khách hàng</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $khachHang->name }}" placeholder="Tên khách hàng">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $khachHang->email }}" placeholder="Email khách hàng">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Số điện thoại</label>
                                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ $khachHang->phone }}" placeholder="Số điện thoại khách hàng">
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Địa chỉ</label>
                                        <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                                        value="{{ $khachHang->address }}" placeholder="Địa chỉ khách hàng">
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">Vai trò</label>
                                        <select id="role" name="role" class="form-select @error('role') is-invalid @enderror">
                                            <option value="User" {{ $khachHang->role === 'User' ? 'selected' : '' }}>Người Dùng</option>
                                            <option value="Admin" {{ $khachHang->role === 'Admin' ? 'selected' : '' }}>Quản Trị Viên</option>
                                        </select>
                                        @error('role')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Nhập mật khẩu mới (để trống nếu không thay đổi)" >
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email_verified_at" class="form-label">Trạng thái xác minh email</label>
                                        <div class="col-sm-10 mb-3 d-flex gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="email_verified_at" id="emailVerifiedYes" value="1"
                                                {{ $khachHang->email_verified_at ? 'checked' : '' }}>
                                                <label class="form-check-label text-success" for="emailVerifiedYes">
                                                    Đã xác minh
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="email_verified_at" id="emailVerifiedNo" value="0"
                                                {{ !$khachHang->email_verified_at ? 'checked' : '' }}>
                                                <label class="form-check-label text-danger" for="emailVerifiedNo">
                                                    Chưa xác minh
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- Bạn có thể thêm mã JavaScript tùy chỉnh ở đây nếu cần -->
@endsection
