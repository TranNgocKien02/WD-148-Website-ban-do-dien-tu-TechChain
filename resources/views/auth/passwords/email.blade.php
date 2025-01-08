{{-- @extends('layouts.app') --}}
@extends('layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="col-lg-12">
    <div class="card overflow-hidden card-bg-fill galaxy-border-none">
        <div class="row g-0">
            <div class="col-lg-6">
                <div class="p-lg-5 p-4 auth-one-bg h-100">
                    <div class="bg-overlay"></div>
                    <div class="position-relative h-100 d-flex flex-column">
                        <div class="mb-4">
                            <a href="{{ url('/') }}" class="d-block">
                                <img src="assets/images/logo-light.png" alt="" height="18">
                            </a>
                        </div>
                        <div class="mt-auto">
                            <div class="mb-3">
                                <i class="ri-double-quotes-l display-4 text-success"></i>
                            </div>

                            <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner text-center text-white-50 pb-5">
                                    <div class="carousel-item active">
                                        <p class="fs-15 fst-italic">" Chào buổi sáng! Khám phá những thiết bị công nghệ tuyệt vời nhất ngay hôm nay tại TechChain. "</p>
                                    </div>
                                    <div class="carousel-item">
                                        <p class="fs-15 fst-italic">" Thư giãn cùng TechChain - Đừng bỏ lỡ những ưu đãi đặc biệt chỉ có hôm nay!."</p>
                                    </div>
                                    <div class="carousel-item">
                                        <p class="fs-15 fst-italic">" Không gian yên tĩnh, thời điểm hoàn hảo để chọn sản phẩm ưng ý tại TechChain! "</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end col -->
            <div class="col-lg-6">
                <div class="p-lg-5 p-4">
                    <div>
                        <h5 class="text-primary">ĐẶT LẠI MẬT KHẨU</h5>
                        <p class="text-muted">Vui lòng nhập email của bạn để nhận liên kết đặt lại mật khẩu.</p>
                    </div>

                    <div class="mt-4">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger fs-12 m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Gửi liên kết đặt lại mật khẩu</button>
                            </div>
                        </form>
                    </div>

                    <div class="mt-5 text-center">
                        <p class="mb-0">Quay lại trang <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline">Đăng nhập</a> </p>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end card -->
</div>
@endsection
