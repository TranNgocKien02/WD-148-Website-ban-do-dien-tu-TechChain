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
                <h4 class="fs-18 fw-semibold m-0">Quản lý khuyến mãi</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0 align-content-center">{{ $title }}</h5>
                        <a href="{{ route('admins.khuyenmais.create') }}" class="btn btn-primary">Thêm khuyến mãi</a>
                    </div>

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
                                        <th scope="col">#</th>
                                        <th scope="col">Tên khuyến mãi</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Loại khuyến mãi</th>
                                        <th scope="col">Giá trị</th>
                                        <th scope="col">Ngày bắt đầu</th>
                                        <th scope="col">Ngày kết thúc</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($khuyenMais as $item)
                                    {{-- Mảng ánh xạ ($discountTypes) giúp chuyển giá trị giam_gia, giam_theo_phan_tram,
                                     tang_qua thành tên bạn muốn hiển thị. --}}

                                     {{-- hiển thị ánh xạ so với cơ sở dlieu - đừng xóa này đi nhé --}}
                                    @php
                                        $discountTypes = [
                                            'giam_gia' => 'Giảm giá',
                                            'giam_theo_phan_tram' => 'Giảm theo phần trăm',
                                            'tang_qua' => 'Tặng quà'
                                        ];
                                        $loaiKhuyenMai = $discountTypes[$item->loai_khuyen_mai] ?? 'Không xác định';
                                    @endphp
                                    <tr>
                                        
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->ten_khuyen_mai }}</td>
                                        <td>{{ $item->mo_ta }}</td>
                                        <td>{{ $loaiKhuyenMai }}</td>
                                        <td>{{ number_format($item->gia_tri_khuyen_mai, 0, '', '.') }}%</td>
                                        <td>{{ $item->ngay_bat_dau->format('d-m-Y') }}</td>
                                        <td>{{ $item->ngay_ket_thuc->format('d-m-Y') }}</td>
                                        <td class="{{ $item->trang_thai ? 'text-success' : 'text-danger' }}">
                                            {{ $item->trang_thai ? 'Kích hoạt' : 'Không kích hoạt' }}
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('admins.khuyenmais.show', $item->id) }}"><i class="mdi mdi-eye text-muted fs-18 rounded-2 border p-1 me-1"></i></a> --}}
                                            <a href="{{ route('admins.khuyenmais.edit', $item->id) }}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                            <form action="{{ route('admins.khuyenmais.destroy', $item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-white">
                                                    <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
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
    // Custom JS if needed
</script>
@endsection
