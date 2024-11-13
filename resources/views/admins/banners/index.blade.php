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
                <h4 class="fs-18 fw-semibold m-0">Quản lý Banner</h4>
            </div>
        </div>
        <div class="row">
 <!-- Striped Rows -->
 <div class="col-xl-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0 align-content-center " > {{ $title }}</h5>
            <a href="{{ route('admins.banners.create') }}" class="btn btn-success"><i data-feather="plus-square"></i> Thêm Banner </a>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu để</th>
                            <th scope="col">Hình ảnh </th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Link </th>
                            <th scope="col">Ngày bắt đầu</th>
                            <th scope="col">Ngày kết thúc</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $item->tieu_de}}</td>
                            <td>
                                <img src="{{ Storage::url($item->anh) }}" alt="Hình ảnh banner" class="rounded-1" width="100px">
                            </td>
                            <td>{{ $item->mo_ta}}</td>
                            <td>{{ $item->link}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->ngay_bat_dau)->format('H:i:s - d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->ngay_ket_thuc)->format('H:i:s - d/m/Y') }}</td>

                            <td class="{{ $item->is_active == true ? 'text-success' : 'text-danger'}}">
                                {{ $item->is_active == true ? 'Hiển thị' : 'Ẩn'}}
                            </td>
                            
                            <td >
                                <div class="d-flex">
                                    <a href="{{ route('admins.banners.edit',$item) }}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>

                                    <form action="{{ route('admins.banners.destroy',$item) }}" method="post" class="" onsubmit="return confirm('Bạn có đồng ý xóa không ?')">
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
