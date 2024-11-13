@extends('layouts.admin')

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản Lý Tài Khoản</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Danh Sách Tài Khoản</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        {{-- <a href="{{ route('admins.taikhoans.create') }}" class="btn btn-primary mb-3">Thêm Tài Khoản Mới</a> --}}
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Vai Trò</th>
                                        <th class="text-end" style="padding-right: 100px;">Hành Động</th> <!-- Apply text-end here -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td class="text-end" style="padding-right: 80px;">
                                            <a href="{{ route('admins.taikhoans.edit', $user->id) }}" class="btn btn-sm btn-warning">Chỉnh Sửa</a>
                                            <form action="{{ route('admins.taikhoans.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
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
    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')

@endsection
