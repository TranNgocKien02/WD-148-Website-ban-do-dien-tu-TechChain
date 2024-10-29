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
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh </th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col">Giá khuyến mãi</th>
                            <th scope="col">Mô tả ngắn</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Lượt xem</th>
                            <th scope="col">Ngày nhập</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listSanPham as $index => $item)
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $item->ma_san_pham}}</td>
                            <td>{{ $item->ten_san_pham}}</td>
                            <td>
                                <img src="{{ Storage::url($item->hinh_anh) }}" alt="Hình ảnh sản phẩm" width="100px">
                               </td>
                            <td>{{ $item->gia_san_pham}}</td>
                            <td>{{ $item->gia_khuyen_mai}}</td>
                            <td>{{ $item->mo_ta_ngan}}</td>
                            <td>{{ $item->noi_dung}}</td>
                            <td>{{ $item->so_luong}}</td>
                            <td>{{ $item->luot_xem}}</td>
                            <td>{{ $item->ngay_nhap}}</td>
                            <td>{{ $item->danh_muc_id == 1 ? 'Đồ nam mùa hè' : 'Đồ nam mùa đông'}}</td>
                            
                            <td >
                                <div class="d-flex">
                                    <a href="{{ route('admins.sanphams.edit',$item->id) }}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>

                                    <form action="{{ route('admins.sanphams.destroy',$item->id) }}" method="post" class="" onsubmit="return confirm('Bạn có đồng ý xóa không ?')">
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

@endsection
