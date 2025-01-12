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
                    <h4 class="fs-18 fw-semibold m-0">Phản hồi người dùng</h4>
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
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex justify-content-between gap-3">
                                        <div class="mb-3 w-50">
                                            <label for="ma_lien_he" class="form-label">Mã</label>
                                            <input type="text" id="ma_lien_he" name="ma_lien_he" class="form-control"
                                                value="{{ $lienHe->ma_lien_he }}" disabled>
                                        </div>

                                        <div class="mb-3 w-50">
                                            <label for="ngay_lien_he" class="form-label">Thời gian liên hệ</label>
                                            <input type="text" id="ngay_lien_he" name="ngay_lien_he" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($lienHe->created_at)->format('H:i:s - d/m/Y') }}"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ten_khach_hang" class="form-label">Tên người dùng</label>
                                        <input type="text" id="ten_khach_hang" name="ten_khach_hang" class="form-control"
                                            value="{{ $lienHe->ten_khach_hang }}" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email_khach_hang" class="form-label">Email</label>
                                        <input type="text" id="email_khach_hang" name="email_khach_hang"
                                            class="form-control" value="{{ $lienHe->email_khach_hang }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">


                                    <div class="mb-3">
                                        <label for="chu_de" class="form-label">Chủ đề</label>
                                        <input type="text" id="chu_de" name="chu_de" class="form-control"
                                            value="{{ $lienHe->chu_de }}" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="noi_dung" class="form-label">Nội dung</label>
                                        <textarea type="text" id="noi_dung" rows="5" name="noi_dung" class="form-control" disabled>{{ $lienHe->noi_dung }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->
                    </div>
                </div>
            </div>



        </div> <!-- container-fluid -->
        <div class="d-flex">
            <div class="container-xxl">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Lịch sử phản hồi</h4>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped Rows -->
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Lịch sử</h5>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="row">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Thời gian phản hồi</th>
                                                <th scope="col">Người phản hồi</th>
                                                <th scope="col">Nội dung</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($responseHistory as $index => $item)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s - d/m/Y') }}
                                                    </td>
                                                    <td>{{ $item->nguoi_phan_hoi }}</td>
                                                    <td> <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#responseModal"
                                                            onclick="showResponseDetails({{ $item->id }})">
                                                            Xem
                                                        </button></td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="responseModal" tabindex="-1"
                                                    aria-labelledby="responseModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="responseModalLabel">Chi Tiết
                                                                    Phản Hồi</h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Nội dung chi tiết phản hồi sẽ được tải ở đây -->
                                                                <p><strong>Nội dung phản hồi:</strong> <span
                                                                        id="response-content">{{$item->noi_dung}}</span>
                                                                </p>
                                                                <p><strong>Người phản hồi:</strong> <span
                                                                        id="response-user">{{$item->nguoi_phan_hoi}} </span></p>
                                                                <p><strong>Thời gian:</strong> <span
                                                                        id="response-time">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s - d/m/Y') }}</span></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end card header -->

                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->



            <div class="container-xxl">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Thêm phản hồi</h4>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped Rows -->
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Thêm</h5>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <form action="{{ route('admins.lienhes.respond') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="lien_he_id" id=""
                                            value="{{ $lienHe->id }}">
                                        <input type="hidden" name="email_khach_hang" id=""
                                            value="{{ $lienHe->email_khach_hang }}">
                                        <input type="hidden" name="ten_khach_hang" id=""
                                            value="{{ $lienHe->ten_khach_hang }}">
                                        <input type="hidden" name="created_at" id=""
                                            value="{{ $lienHe->created_at }}">
                                        <div class="mb-3">
                                            <label for="tieu_de" class="form-label">Nội dung</label>
                                            @error('noi_dung')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                            <textarea type="text" id="noi_dung" rows="5" name="noi_dung" class="form-control"> </textarea>
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
    </div>


    </div> <!-- content -->
@endsection
