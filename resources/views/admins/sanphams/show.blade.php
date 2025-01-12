@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/swiper-bundle.min.css') }}" />
    <style>
        input[type="radio"]:checked+.form-check-label {
            background-color: #4a5a6b;
            color: white;
        }

        /* Optionally, style for the unselected radio buttons */
        .form-check-label {
            transition: background-color 0.3s ease;
            /* Smooth transition effect */
        }
    </style>
@endsection



@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-lg-5">
                        <div class="col-xl-4 col-md-8 mx-auto">
                            <div class="product-img-slider sticky-side-div">
                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ Storage::url($sanPham->hinh_anh) }}" alt=""
                                                class="img-fluid d-block rounded-1" />
                                        </div>
                                        @foreach ($img_gallery as $item)
                                            <div class="swiper-slide">
                                                <img src="{{ Storage::url($item->hinh_anh) }}" alt=""
                                                    class="img-fluid d-block rounded-1" />
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next material-shadow"></div>
                                    <div class="swiper-button-prev material-shadow"></div>
                                </div>
                                <!-- end swiper thumbnail slide -->
                                <div class="swiper product-nav-slider mt-2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="nav-slide-item  d-flex justify-content-center align-items-center bg-light p-1 rounded-1"
                                                style="width:78px; height: 78px">
                                                <img src="{{ Storage::url($sanPham->hinh_anh) }}" alt=""
                                                    class="img-fluid d-block mw-100 rounded-1" />
                                            </div>
                                        </div>
                                        @foreach ($img_gallery as $item)
                                            <div class="swiper-slide">
                                                <div class="nav-slide-item d-flex justify-content-center align-items-center bg-light p-1 rounded-1"
                                                    style="width:78px; height: 78px">
                                                    <img src="{{ Storage::url($item->hinh_anh) }}" alt=""
                                                        class="img-fluid d-block mw-100 rounded-1" />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- end swiper nav slide -->
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4>{{ $sanPham->ten_san_pham }}</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div><a href="#" class="text-primary d-block">Tommy Hilfiger</a></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Hãng : <span
                                                    class="text-body fw-medium">{{ $sanPham->hang->ten_hang }}</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Ngày đăng bán: <span
                                                    class="text-body fw-medium">{{ \Carbon\Carbon::parse($sanPham->ngay_dang_ban)->format('d/m/Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div>
                                            <a href="{{ route('admins.sanphams.edit', $sanPham) }}" class="btn btn-light"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                                    <div class="text-muted fs-16">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $sanPham->danh_gia_trung_binh)
                                                <span class="mdi mdi-star"></span> <!-- Sao đầy -->
                                            @else
                                                <span class="mdi mdi-star-outline"></span> <!-- Sao rỗng -->
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="text-muted">( {{ $totalReviews }} Người Đánh Giá )</div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="mdi mdi-currency-usd"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Giá :</p>
                                                    <h5 class="mb-0">
                                                        {{ number_format($sanPham->gia_san_pham, 0, ',', '.') }} VND</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    {{-- <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-file-copy-2-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">No. of Orders :</p>
                                                    <h5 class="mb-0">2,234</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col --> --}}
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="mdi mdi-cube"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Số lượng :</p>
                                                    <h5 class="mb-0">{{ number_format($sanPham->so_luong, 0, '.', ',') }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    {{-- <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-inbox-archive-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Total Revenue :</p>
                                                    <h5 class="mb-0">$60,645</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col --> --}}
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mt-4">
                                            <h5 class="fs-14">Dung lượng:</h5>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach ($variants as $item)
                                                    <div class="" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        data-bs-placement="top"
                                                        title="{{ $item->so_luong > 0 ? 'Có ' . $item->so_luong . ' sản phẩm' : 'Hết hàng' }}">
                                                        <input class="form-check-input visually-hidden" type="radio"
                                                            name="dung_luong" id="dung_luong_{{ $loop->index }}"
                                                            value="{{ $item->dung_luong }}"
                                                            @if ($item->so_luong == 0) disabled @endif>
                                                        <label
                                                            class="form-check-label border p-2 rounded text-center cursor-pointer"
                                                            for="dung_luong_{{ $loop->index }}">
                                                            {{ $item->dung_luong }}
                                                        </label>

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>



                                    <!-- end col -->

                                    <div class="col-xl-6">
                                        <div class=" mt-4">
                                            <h5 class="fs-14">Màu sắc :</h5>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach ($variants as $item)
                                                    <div class="" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                        data-bs-placement="top"
                                                        title="{{ $item->so_luong > 0 ? 'Có ' . $item->so_luong . ' sản phẩm' : 'Hết hàng' }}">

                                                        <input class="form-check-input visually-hidden" type="radio"
                                                            name="mau_sac" id="mau_sac_{{ $loop->index }}"
                                                            value="{{ $item->mau_sac }}"
                                                            @if ($item->so_luong == 0) disabled @endif>
                                                        <label
                                                            class="form-check-label border p-2 rounded text-center cursor-pointer"
                                                            for="mau_sac_{{ $loop->index }}">
                                                            {{ $item->mau_sac }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="mt-4 text-muted">
                                    <h5 class="fs-14">Nội dung :</h5>
                                    <p>{{ $sanPham->mo_ta_ngan }}</p>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mt-3">
                                            <h5 class="fs-14">Features :</h5>
                                            <ul class="list-unstyled">
                                                <li class="py-1"><i
                                                        class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                                    Full Sleeve</li>
                                                <li class="py-1"><i
                                                        class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                                    Cotton</li>
                                                <li class="py-1"><i
                                                        class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> All
                                                    Sizes available</li>
                                                <li class="py-1"><i
                                                        class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> 4
                                                    Different Color</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mt-3">
                                            <h5 class="fs-14">Services :</h5>
                                            <ul class="list-unstyled product-desc-list">
                                                <li class="py-1">10 Days Replacement</li>
                                                <li class="py-1">Cash on Delivery available</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="product-content mt-5">
                                    <h5 class="fs-14 mb-3">Thông tin sản phẩm:</h5>
                                    <nav>
                                        <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab"
                                                    href="#nav-speci" role="tab" aria-controls="nav-speci"
                                                    aria-selected="true">Thông tin</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab"
                                                    href="#nav-detail" role="tab" aria-controls="nav-detail"
                                                    aria-selected="false">Chi tiết</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-speci" role="tabpanel"
                                            aria-labelledby="nav-speci-tab">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" style="width: 200px;">Danh mục</th>
                                                            <td>{{ $sanPham->danhMuc->ten_danh_muc }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Hãng</th>
                                                            <td>{{ $sanPham->hang->ten_hang }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Dung lượng</th>
                                                            <td>
                                                                @foreach ($variants as $index => $item)
                                                                    {{ $item->dung_luong }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Màu</th>
                                                            <td>
                                                                @foreach ($variants as $index => $item)
                                                                    {{ $item->mau_sac }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <th scope="row">Weight</th>
                                                            <td>140 Gram</td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-detail" role="tabpanel"
                                            aria-labelledby="nav-detail-tab">
                                            <div>
                                                <h5 class="font-size-16 mb-3">{{ $sanPham->ten_san_pham }}</h5>
                                                <p>{{ $sanPham->noi_dung }}</p>
                                                {{-- <div>
                                                    <p class="mb-2"><i
                                                            class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                                        Machine Wash</p>
                                                    <p class="mb-2"><i
                                                            class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                                        Fit Type: Regular</p>
                                                    <p class="mb-2"><i
                                                            class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                                        100% Cotton</p>
                                                    <p class="mb-0"><i
                                                            class="mdi mdi-circle-medium me-1 text-muted align-middle"></i>
                                                        Long sleeve</p>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-content -->

                                <div class="mt-5">
                                    <div>
                                        <h5 class="fs-14 mb-3">Đánh giá & Phản hồi</h5>
                                    </div>
                                    <div class="row gy-4 gx-0">
                                        <div class="col-lg-4">
                                            <div>
                                                <div class="pb-3">
                                                    <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">
                                                                <div class="fs-16 align-middle text-warning">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= $sanPham->danh_gia_trung_binh)
                                                                            <i class="mdi mdi-star"></i> <!-- Sao đầy -->
                                                                        @else
                                                                            <i class="mdi mdi-star-outline"></i>
                                                                            <!-- Sao rỗng -->
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <h6 class="mb-0">{{ $sanPham->danh_gia_trung_binh }} out
                                                                    of 5</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <div class="text-muted">Tổng cộng <span
                                                                class="fw-medium">{{ $totalReviews }}</span>
                                                            đánh giá
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-lg-8">
                                            <div class="ps-lg-4">
                                                <div class="d-flex flex-wrap align-items-start gap-3">
                                                    <h5 class="fs-14">Đánh Giá: </h5>
                                                </div>

                                                <div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">
                                                    <ul class="list-unstyled mb-0">
                                                        @foreach ($sanPham->binhLuans as $item)
                                                            <li class="py-2">
                                                                <div class="border border-dashed rounded p-3">
                                                                    <div class="d-flex align-items-start mb-3">
                                                                        <div class="hstack gap-3">
                                                                            <div
                                                                                class="badge rounded-pill bg-success mb-0">
                                                                                <i class="mdi mdi-star"></i> {{$item->sao}}
                                                                            </div>
                                                                            <div class="vr"></div>
                                                                            <div class="flex-grow-1">
                                                                                <p class="text-muted mb-0">
                                                                                    {{ $item->noi_dung }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex align-items-end">
                                                                        <div class="flex-grow-1">
                                                                            <h5 class="fs-14 mb-0">{{ $item->user->name }}
                                                                            </h5>
                                                                        </div>

                                                                        <div class="flex-shrink-0">
                                                                            <p class="text-muted fs-13 mb-0">
                                                                                {{ $item->created_at->format('d/m/Y') }}
                                                                                <small style="color: #878A99;">{{ $item->created_at->format('H:i A') }}</small>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end Ratings & Reviews -->
                                </div>
                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('js')
    <script src="{{ asset('assets/admin/js/swiper-bundle.min.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Thumbnail slider (small images)
            const navSlider = new Swiper('.product-nav-slider', {
                slidesPerView: 4,
                spaceBetween: 10,
                slideToClickedSlide: true, // Allows clicking on thumbnails
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                slideClass: 'swiper-slide',
                slideActiveClass: 'active-thumbnail', // Add active class on clicked thumbnail
            });

            // Main slider (large images)
            const thumbnailSlider = new Swiper('.product-thumbnail-slider', {
                slidesPerView: 1,
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                loop: true,
                thumbs: {
                    swiper: navSlider, // Link main slider to thumbnails
                },
            });

            // Lắng nghe sự kiện thay đổi slide và thay đổi màu nền của nav-slide-item
            navSlider.on('slideChange', function() {
                // Lấy tất cả các phần tử nav-slide-item
                const allNavSlideItems = document.querySelectorAll('.nav-slide-item');

                // Reset màu nền của tất cả các nav-slide-item
                allNavSlideItems.forEach(item => {
                    item.style.backgroundColor = ''; // Xóa màu nền
                });

                // Thêm màu nền cho nav-slide-item của slide đang được chọn
                const activeNavSlideItem = document.querySelector(
                    '.swiper-slide.swiper-slide-active .nav-slide-item');
                if (activeNavSlideItem) {
                    activeNavSlideItem.style.backgroundColor = 'red'; // Màu nền khi thumbnail được chọn
                }
            });

            // Khi load trang, xác định nav-slide-item đầu tiên có màu nền
            navSlider.emit('slideChange');
        });
    </script>
@endsection
