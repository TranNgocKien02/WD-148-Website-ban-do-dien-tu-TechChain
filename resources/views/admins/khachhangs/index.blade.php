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
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý tài khoản khách hàng</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0 align-content-center">{{ $title }}</h5>
                            <a href="{{ route('admins.khachhangs.create') }}" class="btn btn-success"><i
                                    data-feather="plus-square"></i> Thêm khách hàng </a>
                        </div>

                        <div class="card-body">
                            <form method="GET" action="{{ route('admins.khachhangs.index') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2 mb-2">
                                        <select name="role" class="form-select">
                                            <option value="">All - Vai Trò</option>
                                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <button type="submit" class="btn btn-primary">Lọc</button>
                                        <a href="{{ route('admins.khachhangs.index') }}" class="btn btn-secondary">Clear</a>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <table id="table" class="datatable table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Trạng thái xác minh email</th>
                                            <th scope="col">Vai Trò</th>

                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listKhachHang as $index => $khachhang)
                                            <tr>
                                                <th scope="row">{{ $index + 1 }}</th>
                                                <td>{{ $khachhang->name }}</td>
                                                <td>{{ $khachhang->email }}</td>
                                                <td>{{ $khachhang->phone }}</td>
                                                <td>{{ $khachhang->address }}</td>
                                                <td
                                                    class="{{ $khachhang->email_verified_at ? 'text-success' : 'text-danger' }}">
                                                    {{ $khachhang->email_verified_at ? 'Đã xác minh' : 'Chưa xác minh' }}
                                                </td>

                                                <td class="{{ $khachhang->role === 'admin' ? 'Admin' : 'User' }}">
                                                    {{ $khachhang->role === 'Admin' ? 'Quản Trị Viên' : 'Người Dùng' }}
                                                </td>


                                                <td>
                                                    <a href="{{ route('admins.khachhangs.edit', $khachhang->id) }}"><i
                                                            class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                                    <form action="{{ route('admins.khachhangs.destroy', $khachhang->id) }}"
                                                        method="post" class="d-inline"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0 bg-white">
                                                            <i
                                                                class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
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
