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
                <h4 class="fs-18 fw-semibold m-0">Quản lý Liên Hệ</h4>
            </div>
        </div>
        <div class="row">
 <!-- Striped Rows -->
 <div class="col-xl-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0 align-content-center " > {{ $title }}</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="datatable table table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã liên hệ</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Email khách hàng</th>
                            <th scope="col">Chủ đề</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $item->ma_lien_he}}</td>
                            <td>{{ $item->ten_khach_hang}}</td>
                            <td>{{ $item->email_khach_hang}}</td>
                            <td>{{ $item->chu_de}}</td>

                            <td class="{{ $item->is_respond == true ? 'text-success' : 'text-danger'}}">
                                {{ $item->is_respond == true ? 'Đã phản hồi' : 'Chưa phản hồi'}}
                            </td>
                            
                            <td >
                                <div class="d-flex">
                                    <a href="{{ route('admins.lienhes.show',$item) }}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>

                                    <form action="{{ route('admins.lienhes.destroy',$item) }}" method="post" class="" onsubmit="return confirm('Bạn có đồng ý xóa không ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-white d-inline">
                                            <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1 "></i>
                                        </button>
                                    </form>

                                </div>                                                       
                              
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
                           
     

    </div> <!-- container-fluid -->
</div> <!-- content -->
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

        $(document).on('click', '.dropdown-item[data-bs-toggle="modal"]', function() {
            var actionUrl = $(this).data('action');
            $('#deleteForm').attr('action', actionUrl); // Cập nhật action cho form
        });
    </script>
@endsection
