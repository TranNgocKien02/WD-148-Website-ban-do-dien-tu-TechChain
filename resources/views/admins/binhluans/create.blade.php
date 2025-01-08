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
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $title }}</h5>
                </div><!-- end card header -->

                <div class="card-body">
                        <form action="{{ route('admins.hangs.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="ten_hang" class="form-label">Tên hãng sản phẩm</label>
                                    <input type="text" id="ten_hang" name="ten_hang" class="form-control 
                                    @error('ten_hang') is-invalid @enderror" value="{{ old('ten_hang') }}"
                                    placeholder="Mã sản phẩm">

                                    @error('ten_hang')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mo_ta" class="form-label">Nội dung</label>
                                    <textarea name="mo_ta" id="mo_ta" cols="30" rows="10" class="form-control 
                                    @error('mo_ta') is-invalid @enderror" value="{{ old('mo_ta') }}"
                                    placeholder="Nội dung"></textarea>
                                    {{-- <input type="text" id="mo_ta" name="mo_ta" class="form-control 
                                    @error('mo_ta') is-invalid @enderror" value="{{ old('mo_ta') }}"
                                    placeholder="Nội dung"> --}}

                                    @error('mo_ta')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="danh_muc_id" class="form-label">Danh mục</label>
                                <select name="danh_muc_id" id="danh_muc_id" class="form-control 
                                @error('danh_muc_id') is-invalid @enderror" value="{{ old('danh_muc_id') }}"
                                placeholder="Danh mục" >
                                    @foreach($listDanhMuc as $index => $danhMuc)
                                        <option value="{{ $danhMuc->id }}">{{ $danhMuc->ten_danh_muc }}</option>
                                    @endforeach
                                </select>
                                @error('danh_muc_id')
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
            const img_hang = document.getElementById('img_hang');


            const file = event.target.files[0];

            const reader = new FileReader();


            reader.onload = function () {
                img_hang.src = reader.result ;
                img_hang.style.display = "block" ;
            }

            if (file) {
               reader.readAsDataURL(file) ; 
            }
        }
    </script>
@endsection
