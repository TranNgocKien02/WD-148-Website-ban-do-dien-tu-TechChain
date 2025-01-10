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
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $title }}</h5>
                </div><!-- end card header -->

                <div class="card-body">
                        <form action="{{ route('admins.banners.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">
                            
                                <div class="mb-3">
                                    <label for="tieu_de" class="form-label">Tiêu đề</label>
                                    <input type="text" id="tieu_de" name="tieu_de" class="form-control 
                                    @error('tieu_de') is-invalid @enderror" value="{{ old('tieu_de') }}"
                                    placeholder="Tiêu đề">

                                    @error('tieu_de')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="mo_ta" class="form-label">Mô tả</label>
                                    <input type="text" id="mo_ta" name="mo_ta" class="form-control 
                                    @error('mo_ta') is-invalid @enderror" value="{{ old('mo_ta') }}"
                                    placeholder="Mô tả">

                                    @error('mo_ta')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="link" class="form-label">Đường dẫn </label>
                                    <input name="link" id="link" class="form-control 
                                    @error('link') is-invalid @enderror" value="{{ old('link') }}"
                                    placeholder="Đường dẫn"></input>
                                    @error('link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="loai" class="form-label">Loại Banner</label>
                                    <select name="loai" id="loai" class="form-control @error('loai') is-invalid @enderror" value="{{ old('loai') }}">
                                        <option value="" disabled selected>Chọn loại banner</option>
                                        <option value="main" {{ old('loai') == 'main' ? 'selected' : '' }}>Main Banner</option>
                                        <option value="sale" {{ old('loai') == 'sale' ? 'selected' : '' }}>Sale Banner</option>
                                        <option value="product" {{ old('loai') == 'product' ? 'selected' : '' }}>Product Banner</option>
                                    </select>
                                    @error('loai')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>

                                    <label for="is_active" class="form-label">Trạng thái</label>
                                    <div class="col-sm-10 mb-3 d-flex gap-2 ">
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_active" id="gridRadios1" value="1" checked>
                                            <label class="form-check-label text-success" for="gridRadios1">
                                                Hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_active" id="gridRadios2" value="0">
                                            <label class="form-check-label text-danger" for="gridRadios2">
                                                Ẩn
                                            </label>
                                        </div>
                                       
                                  </div>
                                </div>
                               
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu</label>
                                <input type="datetime-local" id="ngay_bat_dau" name="ngay_bat_dau" class="form-control 
                                @error('ngay_bat_dau') is-invalid @enderror" value="{{ old('ngay_bat_dau') }}"
                                placeholder="Ngày bắt đầu">

                                @error('ngay_bat_dau')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc</label>
                                <input type="datetime-local" id="ngay_ket_thuc" name="ngay_ket_thuc" class="form-control 
                                @error('ngay_ket_thuc') is-invalid @enderror" value="{{ old('ngay_ket_thuc') }}"
                                placeholder="Ngày két thúc">

                                @error('ngay_ket_thuc')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                          
                                <div class="mb-3">
                                    <label for="anh-select" class="form-label">Hình ảnh </label>
                                    <input type="file" id="anh" name="anh" class="form-control @error('anh') is-invalid @enderror" onchange="showImage(event)">
                                    <img src="" id="anh_banner" alt="Ảnh Banner" style="width: 150px; display:none ;" class="mt-2">
                                    @error('anh')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
            const banner = document.getElementById('anh_banner');


            const file = event.target.files[0];

            const reader = new FileReader();


            reader.onload = function () {
                banner.src = reader.result ;
                banner.style.display = "block" ;
            }

            if (file) {
               reader.readAsDataURL(file) ; 
            }
        }
    </script>
@endsection
