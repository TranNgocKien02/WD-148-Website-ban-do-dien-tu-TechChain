@extends('layouts.admin')

@section('title')
    Quản Lý Tài Khoản
@endsection

@section('css')

<style>
        .dataTables_length {
            display: none;
        }
        
    </style>

@endsection

@section('content')
    <div class="content">
        <div class="container-xxl">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý tài khoản</h4>
                </div>
                <div class="ms-sm-auto d-flex">
                    <a href="{{ route('admins.taikhoans.create') }}" class="btn btn-primary">Thêm tài khoản</a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Danh sách tài khoản</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            


                            {{-- <div class="col-md-2 mb-2">
                                <select name="role" class="form-select">
                                    <option value="">All - Vai Trò</option>
                                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </div> --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="table" class="datatable table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Vai trò</th>
                                            <th scope="col" class="text-end">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td class="text-end">
                                                    <a href="{{ route('admins.taikhoans.edit', $user->id) }}"><i
                                                            class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                                    <form action="{{ route('admins.taikhoans.destroy', $user->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">
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
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- container-xxl -->
    </div><!-- content -->
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
