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
                    <h4 class="fs-18 fw-semibold m-0">Quản lý sản phẩm</h4>
                </div>
            </div>
            <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0 align-content-center "> {{ $title }}</h5>


                            <a href="{{ route('admins.sanphams.create') }}" class="btn btn-success"><i
                                    data-feather="plus-square"></i> Thêm sản phẩm </a>
                        </div><!-- end card header -->

                        <div class="card-body">

                             <form method="GET" action="{{ route('admins.sanphams.index') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2 mb-2">
                                        <select name="danh_muc" class="form-select">
                                            <option value="">All - Danh Mục</option>
                                            @foreach ($listDanhMuc as $item)
                                                <option value="{{ $item->id }}" {{ request('danh_muc') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->ten_danh_muc }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-2 mb-2">
                                        <select name="ngay_tao" class="form-select">
                                            <option value="">All - Thời gian</option>
                                            <option value="today"
                                                {{ request('ngay_tao') == 'today' ? 'selected' : '' }}>Hôm nay</option>
                                            <option value="week"
                                                {{ request('ngay_tao') == 'week' ? 'selected' : '' }}>Tuần</option>
                                            <option value="month"
                                                {{ request('ngay_tao') == 'month' ? 'selected' : '' }}>Tháng</option>
                                            <option value="quarter"
                                                {{ request('ngay_tao') == 'quarter' ? 'selected' : '' }}>Quý</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-2">
                                        <input class="form-range" type="range" name="gia_max" id="gia_max" min="0" max="1000000" step="10000" 
                                            value="{{ request('gia_max', 1000000) }}" 
                                            oninput="document.getElementById('gia_max_val').innerText = this.value">
                                        <span id="gia_max_val">{{ request('gia_max', 1000000) }}</span> VND
                                    </div>

                                    <div class="col-md-2 mb-2">
                                        <input type="date" name="ngay" class="form-control" value="{{ request('ngay') }}">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <button type="submit" class="btn btn-primary">Lọc</button>
                                        <a href="{{ route('admins.sanphams.index') }}" class="btn btn-secondary">Clear</a>
                                    </div>
                                </div>
                            </form>

                            <!-- Tabs -->
                            <ul class="nav nav-tabs mb-2" id="productTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab"
                                        data-bs-target="#all" type="button" role="tab">All</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="scheduled-tab" data-bs-toggle="tab"
                                        data-bs-target="#scheduled" type="button" role="tab">Scheduled</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="published-tab" data-bs-toggle="tab"
                                        data-bs-target="#published" type="button" role="tab">Published</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="draft-tab" data-bs-toggle="tab" data-bs-target="#draft"
                                        type="button" role="tab">Draft</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="productTabsContent">
                                <div class=" table-responsive tab-pane fade show active" id="all" role="tabpanel">
                                    <table id="allTable" class="datatable table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Giá khuyến mãi</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Ngày nhập</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listSanPham as $index => $item)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td class="gridjs-td">
                                                        <span>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class=" bg-light rounded p-1"><img
                                                                            src="{{ Storage::url($item->hinh_anh) }}"
                                                                            alt="Hình ảnh sản phẩm" width="100px"
                                                                            class="d-block"></div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-14 mb-1"><a
                                                                            href="apps-ecommerce-product-details.html"
                                                                            class="text-body fw-bold">{{ $item->ten_san_pham }}</a>
                                                                    </h5>
                                                                    <p class="text-muted mb-0">Danh mục: <span
                                                                            class="fw-medium">{{ $item->danhMuc->ten_danh_muc }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td class="align-middle">{{ $item->gia_san_pham }}</td>
                                                    <td class="align-middle">{{ $item->gia_khuyen_mai }}</td>
                                                    <td class="align-middle">{{ $item->so_luong }}</td>
                                                    <td class="align-middle">{{ $item->created_at->format('d/m/Y') }}
                                                        <small
                                                            style="color: #878A99;">{{ $item->created_at->format('H:i A') }}</small>
                                                    </td>
                                                    <td class="align-middle">
                                                        @if ($item->trang_thai === 'da_len_lich')
                                                            <span class="badge bg-warning">Đã lên lịch</span>
                                                        @elseif ($item->trang_thai === 'ban_nhap')
                                                            <span class="badge bg-secondary">Bản nháp</span>
                                                        @elseif ($item->trang_thai === 'dang_ban')
                                                            <span class="badge bg-success">Đang bán</span>
                                                        @else
                                                            <span class="badge bg-dark">Không xác định</span>
                                                        @endif
                                                    </td>

                                                    <td class="align-middle">
                                                        <div class="dropdown">
                                                            <a class="btn btn-soft-secondary btn-sm dropdown"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i
                                                                    class="mdi mdi-dots-horizontal text-muted fs-18 rounded-2 border p-1 "></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <!-- View Option -->
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admins.sanphams.show', $item) }}">
                                                                        <i class="mdi mdi-eye text-muted fs-16 p-1"></i>
                                                                        View
                                                                    </a>
                                                                </li>
                                                                <!-- Edit Option -->
                                                                <li>
                                                                    <a class="dropdown-item edit-list" data-edit-id="1"
                                                                        href="{{ route('admins.sanphams.edit', $item) }}">
                                                                        <i class="mdi mdi-pencil text-muted fs-16 p-1"></i>
                                                                        Edit
                                                                    </a>
                                                                </li>
                                                                <!-- Divider -->
                                                                <li class="dropdown-divider"></li>
                                                                <!-- Delete Option -->
                                                                <li>
                                                                    <a class="dropdown-item" href="#"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#removeItemModal"
                                                                        data-id="{{ $item->id }}"
                                                                        data-action="{{ route('admins.sanphams.destroy', $item) }}">
                                                                        <i class="mdi mdi-delete text-muted fs-16 p-1"></i>
                                                                        Delete
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive tab-pane fade show" id="scheduled" role="tabpanel">
                                    <table id="scheduledTable" class="datatable table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Giá khuyến mãi</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Ngày nhập</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listSanPham->where('trang_thai', 'da_len_lich') as $index => $item)
                                                <tr>
                                                    <th class="align-middle"  scope="row">{{ $index + 1 }}</th>
                                                    <td class="gridjs-td">
                                                        <span>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class=" bg-light rounded p-1"><img
                                                                            src="{{ Storage::url($item->hinh_anh) }}"
                                                                            alt="Hình ảnh sản phẩm" width="100px"
                                                                            class="d-block"></div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-14 mb-1"><a
                                                                            href="apps-ecommerce-product-details.html"
                                                                            class="text-body">{{ $item->ten_san_pham }}</a>
                                                                    </h5>
                                                                    <p class="text-muted mb-0">Danh mục: <span
                                                                            class="fw-medium">{{ $item->danhMuc->ten_danh_muc }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td  class="align-middle">{{ $item->gia_san_pham }}</td>
                                                    <td  class="align-middle">{{ $item->gia_khuyen_mai }}</td>
                                                    <td  class="align-middle">{{ $item->so_luong }}</td>
                                                    <td  class="align-middle">{{ $item->created_at->format('d/m/Y') }}
                                                        <small
                                                            style="color: #878A99;">{{ $item->created_at->format('H:i A') }}</small>
                                                    </td>
                                                    <td  class="align-middle">
                                                        @if ($item->trang_thai === 'da_len_lich')
                                                            <span class="badge bg-warning">Đã lên lịch</span>
                                                        @elseif ($item->trang_thai === 'ban_nhap')
                                                            <span class="badge bg-secondary">Bản nháp</span>
                                                        @elseif ($item->trang_thai === 'dang_ban')
                                                            <span class="badge bg-success">Đang bán</span>
                                                        @else
                                                            <span class="badge bg-dark">Không xác định</span>
                                                        @endif
                                                    </td>

                                                    <td  class="align-middle">
                                                        <div class="dropdown">
                                                            <a class="btn btn-soft-secondary btn-sm dropdown"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i
                                                                    class="mdi mdi-dots-horizontal text-muted fs-18 rounded-2 border p-1 "></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <!-- View Option -->
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admins.sanphams.show', $item) }}">
                                                                        <i class="mdi mdi-eye text-muted fs-16 p-1"></i>
                                                                        View
                                                                    </a>
                                                                </li>
                                                                <!-- Edit Option -->
                                                                <li>
                                                                    <a class="dropdown-item edit-list" data-edit-id="1"
                                                                        href="{{ route('admins.sanphams.edit', $item) }}">
                                                                        <i class="mdi mdi-pencil text-muted fs-16 p-1"></i>
                                                                        Edit
                                                                    </a>
                                                                </li>
                                                                <!-- Divider -->
                                                                <li class="dropdown-divider"></li>
                                                                <!-- Delete Option -->
                                                                <li>
                                                                    <a class="dropdown-item" href="#"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#removeItemModal"
                                                                        data-id="{{ $item->id }}"
                                                                        data-action="{{ route('admins.sanphams.destroy', $item) }}">
                                                                        <i class="mdi mdi-delete text-muted fs-16 p-1"></i>
                                                                        Delete
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive tab-pane fade show " id="published" role="tabpanel">
                                    <table id="publishedTable" class="datatable table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Giá khuyến mãi</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Ngày nhập</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listSanPham->where('trang_thai', 'dang_ban') as $index => $item)
                                                <tr>
                                                    <th  class="align-middle" scope="row">{{ $index + 1 }}</th>
                                                    <td class="gridjs-td">
                                                        <span>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class=" bg-light rounded p-1"><img
                                                                            src="{{ Storage::url($item->hinh_anh) }}"
                                                                            alt="Hình ảnh sản phẩm" width="100px"
                                                                            class="d-block"></div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-14 mb-1"><a
                                                                            href="apps-ecommerce-product-details.html"
                                                                            class="text-body">{{ $item->ten_san_pham }}</a>
                                                                    </h5>
                                                                    <p class="text-muted mb-0">Danh mục: <span
                                                                            class="fw-medium">{{ $item->danhMuc->ten_danh_muc }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td  class="align-middle">{{ $item->gia_san_pham }}</td>
                                                    <td  class="align-middle">{{ $item->gia_khuyen_mai }}</td>
                                                    <td  class="align-middle">{{ $item->so_luong }}</td>
                                                    <td  class="align-middle">{{ $item->created_at->format('d/m/Y') }}
                                                        <small
                                                            style="color: #878A99;">{{ $item->created_at->format('H:i A') }}</small>
                                                    </td>
                                                    <td  class="align-middle">
                                                        @if ($item->trang_thai === 'da_len_lich')
                                                            <span class="badge bg-warning">Đã lên lịch</span>
                                                        @elseif ($item->trang_thai === 'ban_nhap')
                                                            <span class="badge bg-secondary">Bản nháp</span>
                                                        @elseif ($item->trang_thai === 'dang_ban')
                                                            <span class="badge bg-success">Đang bán</span>
                                                        @else
                                                            <span class="badge bg-dark">Không xác định</span>
                                                        @endif
                                                    </td>

                                                    <td class="align-middle">
                                                        <div class="dropdown">
                                                            <a class="btn btn-soft-secondary btn-sm dropdown"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i
                                                                    class="mdi mdi-dots-horizontal text-muted fs-18 rounded-2 border p-1 "></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <!-- View Option -->
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admins.sanphams.show', $item) }}">
                                                                        <i class="mdi mdi-eye text-muted fs-16 p-1"></i>
                                                                        View
                                                                    </a>
                                                                </li>
                                                                <!-- Edit Option -->
                                                                <li>
                                                                    <a class="dropdown-item edit-list" data-edit-id="1"
                                                                        href="{{ route('admins.sanphams.edit', $item) }}">
                                                                        <i class="mdi mdi-pencil text-muted fs-16 p-1"></i>
                                                                        Edit
                                                                    </a>
                                                                </li>
                                                                <!-- Divider -->
                                                                <li class="dropdown-divider"></li>
                                                                <!-- Delete Option -->
                                                                <li>
                                                                    <a class="dropdown-item" href="#"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#removeItemModal"
                                                                        data-id="{{ $item->id }}"
                                                                        data-action="{{ route('admins.sanphams.destroy', $item) }}">
                                                                        <i class="mdi mdi-delete text-muted fs-16 p-1"></i>
                                                                        Delete
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive tab-pane fade show" id="draft" role="tabpanel">
                                    <table id="draftTable" class="datatable table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Giá khuyến mãi</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Ngày nhập</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listSanPham->where('trang_thai', 'ban_nhap') as $index => $item)
                                                <tr>
                                                    <th  class="align-middle" scope="row">{{ $index + 1 }}</th>
                                                    <td class="gridjs-td">
                                                        <span>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class=" bg-light rounded p-1"><img
                                                                            src="{{ Storage::url($item->hinh_anh) }}"
                                                                            alt="Hình ảnh sản phẩm" width="100px"
                                                                            class="d-block"></div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-14 mb-1"><a
                                                                            href="apps-ecommerce-product-details.html"
                                                                            class="text-body">{{ $item->ten_san_pham }}</a>
                                                                    </h5>
                                                                    <p class="text-muted mb-0">Danh mục: <span
                                                                            class="fw-medium">{{ $item->danhMuc->ten_danh_muc }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </td>
                                                    <td  class="align-middle">{{ $item->gia_san_pham }}</td>
                                                    <td  class="align-middle">{{ $item->gia_khuyen_mai }}</td>
                                                    <td  class="align-middle">{{ $item->so_luong }}</td>
                                                    <td  class="align-middle">{{ $item->created_at->format('d/m/Y') }}
                                                        <small
                                                            style="color: #878A99;">{{ $item->created_at->format('H:i A') }}</small>
                                                    </td>
                                                    <td  class="align-middle">
                                                        @if ($item->trang_thai === 'da_len_lich')
                                                            <span class="badge bg-warning">Đã lên lịch</span>
                                                        @elseif ($item->trang_thai === 'ban_nhap')
                                                            <span class="badge bg-secondary">Bản nháp</span>
                                                        @elseif ($item->trang_thai === 'dang_ban')
                                                            <span class="badge bg-success">Đang bán</span>
                                                        @else
                                                            <span class="badge bg-dark">Không xác định</span>
                                                        @endif
                                                    </td>

                                                    <td class="align-middle">
                                                        <div class="dropdown">
                                                            <a class="btn btn-soft-secondary btn-sm dropdown"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i
                                                                    class="mdi mdi-dots-horizontal text-muted fs-18 rounded-2 border p-1 "></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <!-- View Option -->
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admins.sanphams.show', $item) }}">
                                                                        <i class="mdi mdi-eye text-muted fs-16 p-1"></i>
                                                                        View
                                                                    </a>
                                                                </li>
                                                                <!-- Edit Option -->
                                                                <li>
                                                                    <a class="dropdown-item edit-list" data-edit-id="1"
                                                                        href="{{ route('admins.sanphams.edit', $item) }}">
                                                                        <i class="mdi mdi-pencil text-muted fs-16 p-1"></i>
                                                                        Edit
                                                                    </a>
                                                                </li>
                                                                <!-- Divider -->
                                                                <li class="dropdown-divider"></li>
                                                                <!-- Delete Option -->
                                                                <li>
                                                                    <a class="dropdown-item" href="#"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#removeItemModal"
                                                                        data-id="{{ $item->id }}"
                                                                        data-action="{{ route('admins.sanphams.destroy', $item) }}">
                                                                        <i class="mdi mdi-delete text-muted fs-16 p-1"></i>
                                                                        Delete
                                                                    </a>
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
            </div>

            <!-- Modal Confirm Delete -->
            <div class="modal fade" id="removeItemModal" tabindex="-1" aria-labelledby="removeItemModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="removeItemModalLabel">Xác nhận xóa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xóa sản phẩm này?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <form id="deleteForm" method="POST" action="">
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
