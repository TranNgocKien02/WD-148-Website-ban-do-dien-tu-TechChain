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

<div class="fxt-content">
    <h2>Login into your account</h2>
    <div class="fxt-form">
      <form method="POST" action="{{ route('login')}}">
        @csrf
        <div class="form-group">
          <div class="fxt-transformY-50 fxt-transition-delay-1">
            <input
              type="email"
              id="email"
              class="form-control 
                @error('email')
              is-invalid
              @enderror
              "
              name="email"
              placeholder="Email"
              required="required"
              value="{{ old('email') }}"
              autocomplete="email"
            />
            @error('email')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <div class="fxt-transformY-50 fxt-transition-delay-2">
            <input
              id="password"
              type="password"
              class="form-control"
              name="password"
              placeholder="********"
              required="required"
               {{-- value="{{ old('password') }}" --}}
            />
            <i
              toggle="#password"
              class="fa fa-fw fa-eye toggle-password field-icon"
            ></i>
          </div>
        </div>

        {{-- <div class="row mb-3">
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
        </div> --}}

        <div class="form-group">
          <div class="fxt-transformY-50 fxt-transition-delay-3">
            <div class="fxt-checkbox-area">
              <div class="checkbox">
                <input id="checkbox1" type="checkbox" />
                <label for="checkbox1">Keep me logged in</label>
              </div>
              <a href="forgot-password-9.html" class="switcher-text"
                >Forgot Password</a
              >
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="fxt-transformY-50 fxt-transition-delay-4">
            <button type="submit" class="fxt-btn-fill">Log in</button>
          </div>
        </div>
      </form>
    </div>
    <div class="fxt-footer">
      <div class="fxt-transformY-50 fxt-transition-delay-9">
        <p>
          Don't have an account?<a
            href="{{ route('register') }}"
            class="switcher-text2 inline-text"
            >Register</a
          >
        </p>
      </div>
    </div>
  </div>
</div>

@endsection
