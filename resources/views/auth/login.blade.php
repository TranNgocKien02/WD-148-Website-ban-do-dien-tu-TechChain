{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.auth')

@section('title')
    Login
@endsection


@section('content')
{{-- @if(session('user'))
    <div>
        <h3>Chào mừng, {{ session('user.name') }}</h3>
        <p>Email: {{ session('user.email') }}</p>
        <img src="{{ session('user.avatar') }}" alt="Avatar" style="width: 50px; height: 50px;">
        <a href="{{ route('logout') }}" class="btn btn-danger">Đăng xuất</a>
    </div>
@else
    <p>Bạn chưa đăng nhập. <a href="{{ route('google.login') }}">Đăng nhập ngay</a></p>
@endif --}}


                      <div class="col-lg-12">
                        <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="index.html" class="d-block">
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
                                            <h5 class="text-primary">CHÀO MỪNG BẠN !</h5>
                                            <p class="text-muted">Đăng nhập để tiếp tục đến E-Smart.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form method="POST" action="{{ route('login')}}">
                                              @csrf
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" name="email" class="form-control" id="email" placeholder="Nhập email" value="{{old('email')}}">
                                                    @error('email')
                                                    <p class="text-danger fs-12 m-0">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="{{route('password.request')}}" class="text-muted">Quên mật khẩu?</a>
                                                    </div>
                                                    <label class="form-label" for="password-input">Mật khẩu </label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" name="password" class="form-control pe-5 password-input" placeholder="Nhập mật khẩu" id="password-input">
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                                    <label class="form-check-label" for="auth-remember-check">Ghi nhớ đăng nhập</label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Đăng nhập</button>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <div class="signin-other-title">
                                                        <h5 class="fs-13 mb-4 title">Đăng nhập bằng</h5>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('google.login') }}" class="btn btn-danger">
                                                            <i class="ri-google-fill fs-16"></i> Đăng nhập bằng Google
                                                        </a>
                                                    </div>
                                                    {{-- <div>
                                                        <a href="{{ route('google.login') }}" class="btn btn-primary">
                                                            <i class="ri-facebook-fill fs-16"></i> Đăng nhập bằng Google
                                                        </a>
                                                    </div> --}}

                                                    {{-- <div>
                                                        <button href="{{ route('google.login') }}" type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                                        <button href="{{ route('google.login') }}" type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                                        <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                                        <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                                    </div> --}}
                                                </div>

                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Bạn chưa có tài khoản? <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline"> Đăng ký</a> </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
@endsection
