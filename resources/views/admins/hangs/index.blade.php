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
                    <h4 class="fs-18 fw-semibold m-0">Quản lý hãng sản phẩm</h4>
                </div>
            </div>
            <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0 align-content-center " > {{ $title }}</h5>
                            <a href="{{ route('admins.hangs.create') }}" class="btn btn-success"><i data-feather="plus-square"></i> Thêm hãng </a>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên hãng</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Danh mục</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listHang as $item)
                                            <tr>
                                                <th>
                                                    <a href="{{ route('admins.donhangs.show', $item->id) }}">
                                                        {{ $item->id }}
                                                    </a>
                                                </th>

                                                <td>
                                                    {{ $item->ten_hang }}
                                                </td>
                                                <td>
                                                    @if (empty($item->mo_ta))
                                                        Không có thông tin mô tả
                                                    @else
                                                        {{ $item->mo_ta }}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $item->danhMuc->ten_danh_muc }}
                                                </td>
                                                <td >
                                                    <div class="d-flex">
                                                        <a href="{{ route('admins.hangs.edit',$item->id) }}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                    
                                                        <form action="{{ route('admins.hangs.destroy',$item->id) }}" method="post" class="" onsubmit="return confirm('Bạn có đồng ý xóa không ?')">
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
        function confirmSubmit(element) {
            var form = element.form;
            var selectedOption = element.options[element.selectedIndex].text;
            var defaultVal = element.getAttribute('data-default-value');
            if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái đơn hàng này thành"' + selectedOption + '" không?')) {
                form.submit();
            } else {
                element.value = defaultVal;
            }
        }
    </script>
@endsection
