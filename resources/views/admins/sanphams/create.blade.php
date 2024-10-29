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
                <h4 class="fs-18 fw-semibold m-0">Quản lý danh mục sản phẩm</h4>
            </div>
        </div>
        <div class="row">
        <!-- Striped Rows -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $title }}</h5>
                </div><!-- end card header -->

                <div class="card-body">
                        <form action="{{ route('admins.sanphams.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="ma_san_pham" class="form-label">Mã sản phẩm</label>
                                    <input type="text" id="ma_san_pham" name="ma_san_pham" class="form-control 
                                    @error('ma_san_pham') is-invalid @enderror" value="{{ old('ma_san_pham') }}"
                                    placeholder="Mã sản phẩm">

                                    @error('ma_san_pham')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                                    <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control 
                                    @error('ten_san_pham') is-invalid @enderror" value="{{ old('ten_san_pham') }}"
                                    placeholder="Tên sản phẩm">

                                    @error('ten_san_pham')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="danh_muc_id" class="form-label">Danh mục</label>
                                    <select name="danh_muc_id" id="danh_muc_id" class="form-control 
                                    @error('danh_muc_id') is-invalid @enderror" value="{{ old('danh_muc_id') }}"
                                    placeholder="Danh mục" >
                                        @foreach($listDanhMuc as $index => $danh_muc)
                                            <option value="{{ $danh_muc->id }}">{{ $danh_muc->ten_danh_muc }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" id="danh_muc_id" name="danh_muc_id" class="form-control 
                                    @error('danh_muc_id') is-invalid @enderror" value="{{ old('danh_muc_id') }}"
                                    placeholder="Danh mục"> --}}

                                    @error('danh_muc_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="gia_san_pham" class="form-label">Giá sản phẩm</label>
                                    <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control 
                                    @error('gia_san_pham') is-invalid @enderror" value="{{ old('gia_san_pham') }}"
                                    placeholder="Giá sản phẩm">

                                    @error('gia_san_pham')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gia_khuyen_mai" class="form-label">Giá khuyến mại</label>
                                    <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control 
                                    @error('gia_khuyen_mai') is-invalid @enderror" value="{{ old('gia_khuyen_mai') }}"
                                    placeholder="Giá khuyến">
    
                                    @error('gia_khuyen_mai')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="noi_dung" class="form-label">Nội dung</label>
                                    <textarea name="noi_dung" id="noi_dung" cols="30" rows="10" class="form-control 
                                    @error('noi_dung') is-invalid @enderror" value="{{ old('noi_dung') }}"
                                    placeholder="Nội dung"></textarea>
                                    {{-- <input type="text" id="noi_dung" name="noi_dung" class="form-control 
                                    @error('noi_dung') is-invalid @enderror" value="{{ old('noi_dung') }}"
                                    placeholder="Nội dung"> --}}

                                    @error('noi_dung')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                                
                                {{-- <div>

                                    <label for="trang_thai" class="form-label">Trạng thái</label>
                                    <div class="col-sm-10 mb-3 d-flex gap-2 ">
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="gridRadios1" value="1" checked>
                                            <label class="form-check-label text-success" for="gridRadios1">
                                                Hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trang_thai" id="gridRadios2" value="0">
                                            <label class="form-check-label text-danger" for="gridRadios2">
                                                Ẩn
                                            </label>
                                        </div>
                                       
                                  </div>
                                </div> --}}
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="so_luong" class="form-label">Số lượng</label>
                                <input type="number" id="so_luong" name="so_luong" class="form-control 
                                @error('so_luong') is-invalid @enderror" value="{{ old('so_luong') }}"
                                placeholder="Số lượng">

                                @error('so_luong')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="luot_xem" class="form-label">Lượt xem</label>
                                <input type="number" id="luot_xem" name="luot_xem" class="form-control 
                                @error('luot_xem') is-invalid @enderror" value="{{ old('luot_xem') }}"
                                placeholder="Lượt xem">

                                @error('luot_xem')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control 
                                @error('ngay_nhap') is-invalid @enderror" value="{{ old('ngay_nhap') }}"
                                placeholder="Ngày nhập">

                                @error('ngay_nhap')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                          
                            <div class="mb-3">
                                <label for="mo_ta_ngan" class="form-label">Mô tả ngắn</label>
                                <input type="text" id="mo_ta_ngan" name="mo_ta_ngan" class="form-control 
                                @error('mo_ta_ngan') is-invalid @enderror" value="{{ old('mo_ta_ngan') }}"
                                placeholder="Mô tả ngắn">

                                @error('mo_ta_ngan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                                <div class="mb-3">
                                    <label for="hinh_anh-select" class="form-label">Hình ảnh </label>
                                    <input type="file" id="hinh_anh" name="hinh_anh" class="form-control" onchange="showImage(event)">
                                    <img src="" id="img_danh_muc" alt="Hình ảnh sản phẩm" style="width: 150px; display:none ;">
                                </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div><!-- end card header -->

            </div>
        </div>
        </div>
                           
     

    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')
    <script>
        function showImage(event){
            const img_danh_muc = document.getElementById('img_danh_muc');


            const file = event.target.files[0];

            const reader = new FileReader();


            reader.onload = function () {
                img_danh_muc.src = reader.result ;
                img_danh_muc.style.display = "block" ;
            }

            if (file) {
               reader.readAsDataURL(file) ; 
            }
        }
    </script>
@endsection
