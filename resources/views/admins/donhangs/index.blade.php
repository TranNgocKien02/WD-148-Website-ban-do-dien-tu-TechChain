@extends('layouts.admin')

@section('title')
    {{ $title }}
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
                            <h5 class="card-title mb-0 align-content-center "> {{ $title }}</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form method="GET" action="{{ route('admins.donhangs.index') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2 mb-2">
                                        <select name="trang_thai" class="form-select">
                                            <option value="">All - Trạng thái</option>
                                            @foreach ($trangThaiDonHang as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ request('trang_thai') == $key ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-2">
                                        <select name="ngay_dat_hang" class="form-select">
                                            <option value="">All - Thời gian</option>
                                            <option value="today"
                                                {{ request('ngay_dat_hang') == 'today' ? 'selected' : '' }}>Hôm nay</option>
                                            <option value="week"
                                                {{ request('ngay_dat_hang') == 'week' ? 'selected' : '' }}>Tuần</option>
                                            <option value="month"
                                                {{ request('ngay_dat_hang') == 'month' ? 'selected' : '' }}>Tháng</option>
                                            <option value="quarter"
                                                {{ request('ngay_dat_hang') == 'quarter' ? 'selected' : '' }}>Quý</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-2">
                                        <input type="date" name="ngay" class="form-control" value="{{ request('ngay') }}">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <button type="submit" class="btn btn-primary">Lọc</button>
                                        <a href="{{ route('admins.donhangs.index') }}" class="btn btn-secondary">Clear</a>
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
                                    
                                @elseif(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>{{ session('error') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <table id="table" class="datatable table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col"><input class="form-check-input" type="checkbox"
                                                    id="checkAll" value="option"></th>
                                            <th scope="col">Mã đơn hàng</th>
                                            <th scope="col">Tên khách hàng</th>
                                            <th scope="col">Ngày đặt</th>
                                            <th scope="col">Thành tiền</th>
                                            <th scope="col">Phương thức thanh toán</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listDonHang as $index => $item)
                                            <tr>
                                                <td class="align-middle"><input class="form-check-input" type="checkbox"
                                                        value="option"></td>


                                                <th class="align-middle">
                                                    <a href="{{ route('admins.donhangs.show', $item->id) }}">
                                                        {{ $item->ma_don_hang }}
                                                    </a>
                                                </th>
                                                <td class="align-middle">{{ $item->user->name }}</td>
                                                <td class="align-middle">{{ $item->created_at->format('d/m/Y') }}
                                                    <small
                                                        style="color: #878A99;">{{ $item->created_at->format('H:i A') }}</small>
                                                </td>
                                                <td class="align-middle">
                                                    {{ number_format($item->tong_tien, 0, ',', '.') }}VND
                                                </td>
                                                <td class="align-middle">{{ $item->phuong_thuc_thanh_toan }}</td>
                                                <td class="align-middle">
                                                    <form action="{{ route('admins.donhangs.update', $item) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('Put')
                                                        <select name="trang_thai_don_hang" class="form-select w-100"
                                                            onchange="confirmSubmit(this)"
                                                            data-default-value="{{ $item->trang_thai_don_hang }}">
                                                            @foreach ($trangThaiDonHang as $key => $value)
                                                                <option value="{{ $key }}"
                                                                    {{ $key == $item->trang_thai_don_hang ? 'selected' : '' }}
                                                                    {{ $key == 'huy_don_hang' ? 'disabled' : '' }}>
                                                                    {{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>

                                                </td>
                                                <td>
                                                    <a href="{{ route('admins.donhangs.show', $item) }}">
                                                        <i
                                                            class="mdi mdi-eye text-muted fs-18 rounded-2 border p-1 me-1"></i>
                                                    </a>
                                                    <a class=" border-0 bg-white" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#removeItemModal" data-id="{{ $item->id }}"
                                                        data-action="{{ route('admins.donhangs.destroy', $item) }}">
                                                        <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
                                                    </a>
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

            <!-- Modal Confirm Delete -->
            <div class="modal fade" id="removeItemModal" tabindex="-1" aria-labelledby="removeItemModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="removeItemModalLabel">Xác nhận xóa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xóa đơn hàng này không? Hành động này không thể hoàn tác.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <!-- Form gửi yêu cầu xóa -->
                            <form id="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
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

        $(document).on('click', '[data-bs-toggle="modal"]', function() {
            var actionUrl = $(this).data('action');
            var itemId = $(this).data('id');

            $('#removeItemModal #deleteForm').attr('action', actionUrl);

        });
    </script>
@endsection
