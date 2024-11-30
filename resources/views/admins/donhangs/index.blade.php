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
                <h4 class="fs-18 fw-semibold m-0">Quản lý đơn hàng</h4>
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
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listDonHang as $item)
                        <tr>
                            <th>
                                <a href="{{ route('admins.donhangs.show',$item->id)}}">
                                    {{ $item->ma_don_hang}}
                                </a>
                            </th>
                            <td>
                                @if ($item->created_at)
                                {{ $item->created_at->format('d-m-Y') }}
                                @else
                                    No Date
                                @endif
                            </td>
                            <td>
                                {{ number_format($item->tong_tien, 0, '', '.') }}đ
                            </td>
                            <td>
                                <form action="{{ route('admins.donhangs.update',$item->id) }}" method="post">
                                    @csrf
                                    @method('Put')
                                    <select name="trang_thai_don_hang" class="form-select w-75" 
                                        onchange="confirmSubmit(this)" data-default-value="{{ $item->trang_thai_don_hang }}">
                                        @foreach ($trangThaiDonHang as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $key == $item->trang_thai_don_hang ? 'selected' : '' }}
                                                {{ $key == 'huy_don_hang' ? 'disabled' : '' }}
                                                >
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>

                            </td>

                            {{-- <td class="{{ $item->trang_thai == true ? 'text-success' : 'text-danger'}}">
                                {{ $item->trang_thai == true ? 'Hiển thị' : 'Ẩn'}}
                            </td> --}}
                            <td>
                                <a href="{{ route('admins.donhangs.show',$item->id) }}">
                                    <i class="mdi mdi-eye text-muted fs-18 rounded-2 border p-1 me-1"></i>
                                </a>
                            
                                {{-- Kiểm tra trạng thái đơn hàng là HỦY hoặc ĐÃ GIAO HÀNG --}}
                                @if ($item->trang_thai_don_hang === $type_huy_don_hang || $item->trang_thai_don_hang === 'da_giao_hang')
                                <form action="{{ route('admins.donhangs.destroy',$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Bạn có đồng ý xóa không ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-white">
                                        <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
                                    </button>
                                </form>
                                @endif
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
            var selectedOption = element.options[element.selectedIndex].text ;
            var defaultVal = element.getAttribute('data-default-value');
            if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái đơn hàng này thành"' + selectedOption +'" không?')) {
                form.submit();
            }else{
                element.value = defaultVal ;
            }
        }
    </script>
@endsection
