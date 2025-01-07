@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection
@section('css')
    <style>
        input.is-invalid::placeholder {
            color: #dc3545;
        }
    </style>
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
                                        <input type="text" class="form-control @error('ten_san_pham') is-invalid @elseif(old('ten_san_pham')) is-valid @enderror" name="ten_san_pham" id="product-title-input">
                                        @error('ten_san_pham')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between gap-3">
                                        <div class="mb-3 w-100">
                                            <label for="product-title-input" class="form-label">Giá gốc</label>
                                            <input type="text" class="form-control @error('gia_san_pham') is-invalid @elseif(old('gia_san_pham')) is-valid @enderror" name="gia_san_pham" value="{{ old('gia_san_pham') }}">
                                            @error('gia_san_pham')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 w-100">
                                            <label for="product-title-input" class="form-label">Giá khuyến mãi</label>
                                            <input type="text" class="form-control @error('gia_khuyen_mai') is-invalid @elseif(old('gia_khuyen_mai')) is-valid @enderror" name="gia_khuyen_mai"  value="{{ old('gia_khuyen_mai') }}">
                                            @error('gia_khuyen_mai')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 w-100">
                                            <label for="product-title-input" class="form-label">Số lượng</label>
                                            <input type="number" class="form-control @error('so_luong') is-invalid @elseif(old('so_luong')) is-valid @enderror" name="so_luong" value="{{ old('so_luong') }}">
                                            @error('so_luong')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả ngắn</label>
                                        <textarea name="mo_ta_ngan" cols="30" rows="5" class="form-control" >{{ old('mo_ta_ngan')}}</textarea>
                                        @error('mo_ta_ngan')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nội dung</label>
                                        <textarea name="noi_dung" cols="30" rows="5" class="form-control" >{{ old('noi_dung')}}</textarea>
                                        @error('noi_dung')
                                            <span class="invalid-feedback">{{$message}}</span>
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
                                        <p class="text-muted">Add Product Images.</p>
                                        <div class="text-center">
                                            <div class="position-relative d-inline-block">
                                                <div class="position-absolute top-100 start-100 translate-middle">
                                                    <label for="imagePreviewInput" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Select Image" data-bs-original-title="Select Image">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                <i class="mdi mdi-image text-muted fs-16 p-1"></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <input class="form-control d-none" name="hinh_anh" value="" id="imagePreviewInput" type="file" accept="image/png, image/gif, image/jpeg" onchange="previewImage(event)">
                                                </div>
                                                <div class="avatar-xl">
                                                    <div class="avatar-title bg-light rounded">
                                                        <img src="" id="imagePreview" class="avatar-xl h-auto" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="fs-14 mb-1">Thư viện ảnh</h5>
                                        <p class="text-muted">Add Product Gallery Images.</p>

                                        <!-- Khu vực tải ảnh lên -->
                                        <div class="border border-2 border-muted p-4 text-center rounded">
                                            <div>
                                                <div class="mb-3">
                                                    <input type="file" id="fileInput" multiple class="form-control d-none" name="hinh_anh_san_phams[]" />
                                                    <a class="btn btn-primary mt-3" onclick="document.getElementById('fileInput').click()">Select Files</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Danh sách ảnh đã tải lên -->
                                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                                            <!-- Các mục <li> sẽ được thêm tại đây -->
                                        </ul>

                                        
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
                                            <th>#</th>
                                            <th>Ảnh</th>
                                            <th>Dung lượng</th>
                                            <th>Màu sắc</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="variantsContainer">
                                        <div class="alert alert-info">
                                            <h4 class="alert-heading">Lưu ý khi tạo biến thể</h4>
                                            <ul>
                                                <li><strong>Số lượng:</strong> Số lượng của mỗi biến thể phải lớn hơn hoặc bằng 0.</li>
                                                <li><strong>Giá:</strong> Giá của mỗi biến thể phải là một số và không được âm.</li>
                                                <li><strong>Dung lượng:</strong> Dung lượng của biến thể có thể để trống, nếu có thì nên điền thông tin hợp lệ (tối đa 50 ký tự).</li>
                                                <li><strong>Màu sắc:</strong> Màu sắc của biến thể có thể để trống, nếu có thì nên điền thông tin hợp lệ (tối đa 50 ký tự).</li>
                                                <li><strong>Hình ảnh:</strong> Mỗi biến thể có thể có hình ảnh riêng biệt. Hình ảnh phải ở định dạng jpeg, png hoặc jpg.</li>
                                                <li><strong>Biến thể:</strong>
                                                    <ul>
                                                        <li>Không được để cả dung lượng và màu sắc cùng trống. Cần có ít nhất một trong hai.</li>
                                                        <li>Không được lặp biến thể.</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <p>Vui lòng kiểm tra kỹ thông tin trước khi lưu các biến thể.</p>
                                        </div>

                                        @php $lastIndex = -1; @endphp
                                        @if (old('variants'))
                                            @foreach (old('variants', []) as $index => $variant)
                                                @php $lastIndex = $index; @endphp
                                                <tr class="variant">
                                                    <td class="align-middle"><small>#{{$index+1}}</small></td>
                                                     <td>
                                                        <div class="position-relative d-inline-block">
                                                            <div class="position-absolute top-100 start-100 translate-middle">
                                                                <label for="imagePreviewVariantInput_{{ $index }}" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Select Image" data-bs-original-title="Select Image">
                                                                    <div class="avatar-xs">
                                                                        <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                            <i class="mdi mdi-image text-muted fs-16 p-1"></i>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                                <input class="form-control d-none" name="variants[{{ $index }}][anh]" id="imagePreviewVariantInput_{{ $index }}" type="file" accept="image/png, image/gif, image/jpeg" onchange="previewImageVariant(event, {{ $index }})">
                                                            </div>
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-light rounded">
                                                                    <img src="" id="imagePreviewVariant_{{ $index }}" class="avatar-sm h-auto" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                        <input class="form-control error-variant @error("variants.$index.dung_luong") is-invalid @enderror" type="text" name="variants[{{ $index }}][dung_luong]" placeholder="Dung lượng" value="{{ $variant['dung_luong'] }}">
                                                    </td>

                                                    <td>
                                                        <input class="form-control error-variant @error("variants.$index.mau_sac") is-invalid @enderror" type="text" name="variants[{{ $index }}][mau_sac]" placeholder="Màu sắc" value="{{ $variant['mau_sac'] }}">
                                                    </td>

                                                    <td>
                                                        <input class="form-control error-variant @error("variants.$index.so_luong") is-invalid @enderror" type="text" name="variants[{{ $index }}][so_luong]" placeholder="Số lượng" value="{{ $variant['so_luong'] }}">
                                                    </td>

                                                    <td>
                                                        <input class="form-control error-variant @error("variants.$index.so_luong") is-invalid @enderror" type="text" name="variants[{{ $index }}][gia]" placeholder="Giá" value="{{ $variant['gia'] }}">
                                                    </td>

                                                    

                                                    <td>
                                                        <div class="btn btn-danger removeVariant">X</div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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
                                            Ẩn
                                        </label>
                                    </div>
                                </div>

                            </div>

                            {{-- @php
                                $types = [
                                    'is_best_sale' => 'Bán chạy',
                                    'is_40_sale' => 'Giảm 40%',
                                    'is_hot_online' => 'Hot online'
                                ];
                            @endphp --}}

                            {{-- <label for="choices-publish-type-input" class="form-label">Product Type</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Product type options here -->
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <a href="#collapsePublishSchedule" class="d-block card-header py-3" data-bs-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapsePublishSchedule">
                        <h6 class="m-0 text-primary fw-bold">Lịch xuất bản</h6>
                    </a>
                    <div class="collapse show" id="collapsePublishSchedule">
                        <div class="card-body">
                            <div class="mb-2">
                                <input type="hidden" name="trang_thai">
                                <label for="" class="form-label">Ngày & Giờ</label>
                                <input class="form-control" type="datetime-local" name="ngay_dang_ban" id="">
                            </div>
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
        function previewImage(event) {
            const file = event.target.files[0]; // Lấy file được chọn
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imagePreview = document.getElementById('imagePreview'); // Thẻ img sẽ hiển thị ảnh
                    imagePreview.src = e.target.result; // Đặt ảnh mới vào thẻ img
                };
                reader.readAsDataURL(file); // Đọc file dưới dạng URL để hiển thị ảnh
            }
        }
        function previewImageVariant(event, index) {
            const input = event.target;
            const imagePreview = document.getElementById(`imagePreviewVariant_${index}`);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('fileInput').addEventListener('change', function (event) {
            const fileInput = event.target;
            const files = fileInput.files;
            const previewList = document.getElementById('dropzone-preview');

            // Duyệt qua danh sách file và thêm vào danh sách
            Array.from(files).forEach(file => {
                const listItem = document.createElement('li');
                listItem.className = 'mt-2 dz-processing dz-image-preview dz-success dz-complete';
                listItem.innerHTML = `
                    <div class="border rounded p-2 d-flex align-items-center">                                                
                        <!-- Hình ảnh thu nhỏ -->
                        <div class="flex-shrink-0 me-3">    
                            <div class="avatar-sm bg-light rounded">
                                <img class="img-fluid rounded d-block h-100" src="${URL.createObjectURL(file)}" alt="${file.name}"> 
                            </div>
                        </div>                                                            
                        <!-- Thông tin ảnh -->
                        <div class="flex-grow-1">                                                                
                            <div class="pt-1">                                                                    
                                <h5 class="fs-14 mb-1">${file.name}</h5>                                                                    
                                <p class="fs-13 text-muted mb-0"><strong>${(file.size / 1024 / 1024).toFixed(2)}</strong> MB</p>                                                                    
                            </div>                                                            
                        </div>                                                            
                        <!-- Nút xóa -->
                        <div class="flex-shrink-0 ms-3">                                                                
                            <a class="btn btn-sm btn-danger" onclick="confirmAndRemove(this)">Delete</a>                                                            
                        </div>                                                        
                    </div>
                `;
                previewList.appendChild(listItem);
            });
        });

        // Hàm xác nhận và xóa
        function confirmAndRemove(element) {
            if (confirm('Bạn có chắc muốn xóa không?')) {
                element.closest('li').remove();
            }
        }


        let variantIndex = {{ $lastIndex + 1 }};
        let variants = @json(old('variants', []));
        $('#addMoreVariant').click(function () {
            let newVariant = `
                <tr class="variant">
                    <td class="align-middle"><small>#${variantIndex + 1}</small></td>
                    <td>
                        <div class="position-relative d-inline-block">
                            <div class="position-absolute top-100 start-100 translate-middle">
                                <label for="imagePreviewVariantInput_${variantIndex}" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Select Image" data-bs-original-title="Select Image">
                                    <div class="avatar-xs">
                                        <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                            <i class="mdi mdi-image text-muted fs-16 p-1"></i>
                                        </div>
                                    </div>
                                </label>
                                <input class="form-control d-none" name="variants[${variantIndex}][anh]" id="imagePreviewVariantInput_${variantIndex}" type="file" accept="image/png, image/gif, image/jpeg" onchange="previewImageVariant(event, ${variantIndex})">
                            </div>
                            <div class="avatar-sm">
                                <div class="avatar-title bg-light rounded">
                                    <img src="" id="imagePreviewVariant_${variantIndex}" class="avatar-sm h-auto" alt="">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input class="form-control " type="text" name="variants[${variantIndex}][dung_luong]" placeholder="Dung lượng" value="{{ old('variants.${variantIndex}.dung_luong') }}">
                    </td>
                    <td>
                        <input class="form-control " type="text" name="variants[${variantIndex}][mau_sac]" placeholder="Màu sắc" value="{{ old('variants.${variantIndex}.mau_sac') }}">               
                    </td>
                    <td>
                        <input class="form-control " type="text" name="variants[${variantIndex}][so_luong]" placeholder="Số lượng" value="{{ old('variants.${variantIndex}.so_luong') }}">
                    </td>
                    <td>
                        <input class="form-control " type="text" name="variants[${variantIndex}][gia]" placeholder="Giá" value="{{ old('variants.${variantIndex}.gia') }}">
                    </td>
                    <td><div class="btn btn-danger removeVariant">X</div></td>
                </tr>`;
            $('#variantsContainer').append(newVariant);
            variantIndex++;
        });
         $('#variantsContainer').on('click', '.removeVariant', function () {
            if (confirm('Bạn có chắc chắn muốn xóa biến thể này?')) {
                $(this).closest('tr').remove();
            }
        });

        



    </script>
@endsection
