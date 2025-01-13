{{-- @extends('layouts.app') --}}
@extends('layouts.auth')
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
                            <a href="/" class="d-block">
                                <img src="assets/images/logo-light.png" alt="" height="18">
                            </a>
                        </div>
                        <div class="mt-auto">
                            <div class="mb-3">
                                <i class="ri-double-quotes-l display-4 text-success"></i>
                            </div>

                            <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
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
                            <!-- end carousel -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-6">
                <div class="p-lg-5 p-4">
                    <div>
                        <h5 class="text-primary">ĐẶT LẠI MẬT KHẨU</h5>
                        <p class="text-muted">Điền thông tin bên dưới để đặt lại mật khẩu của bạn.</p>
                    </div>

                    <div class="mt-4">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <p class="text-danger fs-12 m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu mới</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <p class="text-danger fs-12 m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Xác nhận mật khẩu</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Đặt lại mật khẩu</button>
                            </div>
                        </form>
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
