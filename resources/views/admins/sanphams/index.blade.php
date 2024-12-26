@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection
@section('css')

@endsection



@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý sản phẩm</h4>
            </div>
        </div>
        <div class="row">
 <!-- Striped Rows -->
 <div class="col-xl-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0 align-content-center " > {{ $title }}</h5>
            <a href="{{ route('admins.sanphams.create') }}" class="btn btn-success"><i data-feather="plus-square"></i> Thêm sản phẩm </a>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hình ảnh </th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col">Giá khuyến mãi</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Ngày nhập</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listSanPham as $index => $item)
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>
                                <img src="{{ Storage::url($item->hinh_anh) }}" alt="Hình ảnh sản phẩm" width="100px">
                            </td>
                            <td>{{ $item->ma_san_pham}}</td>
                            <td>{{ $item->ten_san_pham}}</td>
                            <td>{{ $item->gia_san_pham}}</td>
                            <td>{{ $item->gia_khuyen_mai}}</td>
                            <td>{{ $item->so_luong}}</td>
                            <td>{{ $item->created_at->format('d/m/Y')}}
                                <small style="color: #878A99;">{{$item->created_at->format('H:i A')}}</small>
                            </td>
                            <td>{{ $item->danhMuc->ten_danh_muc}}</td>
                            
                            {{-- <td >
                                <div class="d-flex">
                                    <a href="{{ route('admins.sanphams.edit',$item) }}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>

                                    <form action="{{ route('admins.sanphams.destroy',$item) }}" method="post" class="" onsubmit="return confirm('Bạn có đồng ý xóa không ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-white d-inline">
                                            <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1 "></i>
    
                                        </button>
                                    </form>

                                </div>                                                       
                            </td> --}}
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-soft-secondary btn-sm dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal text-muted fs-18 rounded-2 border p-1 "></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <!-- View Option -->
                                        <li>
                                            <a class="dropdown-item" href="">
                                                <i class="mdi mdi-eye text-muted fs-16 p-1"></i> View
                                            </a>
                                        </li>
                                        <!-- Edit Option -->
                                        <li>
                                            <a class="dropdown-item edit-list" data-edit-id="1" href="{{ route('admins.sanphams.edit',$item) }}">
                                                <i class="mdi mdi-pencil text-muted fs-16 p-1"></i> Edit
                                            </a>
                                        </li>
                                        <!-- Divider -->
                                        <li class="dropdown-divider"></li>
                                        <!-- Delete Option -->
                                        <li>
                                            
                                            <form action="{{ route('admins.sanphams.destroy',$item) }}" method="post" class="" onsubmit="return confirm('Bạn có đồng ý xóa không ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item remove-list border-0 bg-white d-inline" data-id="1" data-bs-toggle="modal" data-bs-target="#removeItemModal">
                                                    <i class="mdi mdi-delete text-muted fs-16 p-1"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
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

@endsection
