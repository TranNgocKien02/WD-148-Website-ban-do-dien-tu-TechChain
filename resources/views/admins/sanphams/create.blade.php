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
                <h4 class="fs-18 fw-semibold m-0">Thêm sản phẩm</h4>
            </div>
        </div>
        <form action="{{ route('admins.sanphams.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                            <a href="#collapseProductInfo" class="d-block card-header py-3" data-bs-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseProductInfo">
                                <h6 class="m-0 text-primary fw-bold">Thông tin chính</h6>
                            </a>
                            <div class="collapse show" id="collapseProductInfo">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="product-title-input" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="ten_san_pham" id="product-title-input" placeholder="Tên sản phẩm" value="{{ old('ten_san_pham')}}">
                                        @error('ten_san_pham')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between gap-3">
                                        <div class="mb-3 w-100">
                                            <label for="product-title-input" class="form-label">Giá gốc</label>
                                            <input type="text" class="form-control" name="gia_san_pham" placeholder="Giá gốc" value="{{ old('gia_san_pham') }}">
                                            @error('gia_san_pham')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 w-100">
                                            <label for="product-title-input" class="form-label">Giá khuyến mãi</label>
                                            <input type="text" class="form-control" name="gia_khuyen_mai" placeholder="Giá khuyến mãi" value="{{ old('gia_khuyen_mai') }}">
                                            @error('gia_khuyen_mai')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 w-100">
                                            <label for="product-title-input" class="form-label">Số lượng</label>
                                            <input type="number" class="form-control" name="so_luong" placeholder="Số lượng" value="{{ old('so_luong') }}">
                                            @error('so_luong')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả ngắn</label>
                                        <textarea name="mo_ta_ngan" cols="30" rows="5" class="form-control">{{ old('mo_ta_ngan')}} </textarea>
                                        @error('mo_ta_ngan')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nội dung</label>
                                        <textarea name="noi_dung" cols="30" rows="5" class="form-control">{{ old('noi_dung')}}</textarea>
                                        @error('noi_dung')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                </div>

                <div class="card shadow mb-4">
                            <a href="#collapseProductGallery" class="d-block card-header py-3" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="collapseProductGallery">
                                <h6 class="m-0 text-primary fw-bold">Ảnh</h6>
                            </a>
                            <div class="collapse show" id="collapseProductGallery">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h5 class="fs-14 mb-1">Ảnh sản phẩm</h5>
                                        {{-- <p class="text-muted">Add Product main Image.</p> --}}
                                        <input type="file" class="form-control" name="hinh_anh">
                                        
                                    </div>
                                    <div>
                                        <h5 class="fs-14 mb-1">Thư viện ảnh</h5>
                                        {{-- <p class="text-muted">Add Product Gallery Images.</p> --}}
                                        <input type="file" class="form-control" name="hinh_anh_san_phams[]" multiple>
                                        
                                    </div>
                                </div>
                            </div>
                </div>

                <div class="card shadow mb-4">
                    <a href="#collapseProductVariants" class="d-block card-header py-3" data-bs-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="collapseProductVariants">
                        <h6 class="m-0 text-primary fw-bold">Biến thể</h6>
                    </a>
                    <div class="collapse show" id="collapseProductVariants">
                        <div class="card-body">
                            <div class="mb-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Dung lượng</th>
                                            <th>Màu sắc</th>
                                            <th>Ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="variantsContainer">
                                        <tr class="variant" data-index="0">
                                            <td>
                                                @error('variants.*.dung_luong')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <input class="form-control" type="text" name="variants[0][dung_luong]">
                                            </td>
                                            <td>
                                                @error('variants.*.mau_sac')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <input class="form-control" type="text" name="variants[0][mau_sac]">
                                            </td>
                                            <td>
                                                <input class="form-control" type="file" name="variants[0][anh]">
                                            </td>
                                            <td>
                                                @error('variants.*.so_luong')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <input class="form-control" type="text" name="variants[0][so_luong]">
                                            </td>
                                            <td>
                                                @error("variants.*.gia")
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <input class="form-control" type="text" name="variants[0][gia]">
                                            </td>
                                            <td>
                                                <div class="btn btn-danger removeVariant">X</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="btn btn-info" id="addMoreVariant">Add more variant</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn btn-success w-sm">Submit</button>
                </div>
            </div>

            <!-- Right content -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <a href="#collapseStatus" class="d-block card-header py-3" data-bs-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseStatus">
                        <h6 class="m-0 text-primary fw-bold">Thông tin khác</h6>
                    </a>
                    <div class="collapse show" id="collapseStatus">
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="choices-category-input" class="form-label">Danh mục</label>
                                <select class="form-control" id="choices-category-input" name="danh_muc_id">
                                    <!-- Add category options here -->
                                    @foreach($listDanhMuc as $index => $danh_muc)
                                        <option value="{{ $danh_muc->id }}">{{ $danh_muc->ten_danh_muc }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="choices-hang-input" class="form-label">Hãng</label>
                                <select class="form-control" id="choices-hang-input" name="hang_id">
                                    <!-- Add category options here -->
                                    @foreach($listHang as $index => $hang)
                                        <option value="{{ $hang->id }}">{{ $hang->ten_hang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                <div id="choices-publish-status-input" class="d-flex gap-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_active" id="status-active" value="1" checked>
                                        <label class="form-check-label text-success" for="status-active">
                                            Bán
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_active" id="status-inactive" value="0">
                                        <label class="form-check-label text-danger" for="status-inactive">
                                            Hủy bán
                                        </label>
                                    </div>
                                </div>

                            </div>

                            @php
                                $types = [
                                    'is_best_sale' => 'Bán chạy',
                                    'is_40_sale' => 'Giảm 40%',
                                    'is_hot_online' => 'Hot online'
                                ];
                            @endphp

                            {{-- <label for="choices-publish-type-input" class="form-label">Product Type</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Product type options here -->
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div> <!-- container-fluid -->
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

   let variantIndex = 1;

    $('#addMoreVariant').click(function() {
        let newVariant = `<tr class="variant">
            <td>
                <input class="form-control" type="text"  name="variants[${variantIndex}][dung_luong]">
            </td>
            <td>
                <input class="form-control" type="text"  name="variants[${variantIndex}][mau_sac]">               
            </td>
            <td>
                <input class="form-control" type="file" name="variants[${variantIndex}][anh]">
            </td>
            <td>
                <input class="form-control" type="text" name="variants[${variantIndex}][so_luong]" value="">
            </td>
            <td>
                <input class="form-control" type="text" name="variants[${variantIndex}][gia]" value="">
            </td>
            <td><div class="btn btn-danger removeVariant">X</div></td>
            >`;
        $('#variantsContainer').append(newVariant);
        variantIndex++;
    });

    $('#variantsContainer').on('click', '.removeVariant', function() {
        $(this).closest('tr').remove();
    });

    $(document).ready(function() {
        $('#variantsContainer .variant:first-child .removeVariant').hide();
    });
    </script>
@endsection
