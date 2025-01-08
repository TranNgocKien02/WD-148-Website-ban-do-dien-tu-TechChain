{{-- <!DOCTYPE html>
<html class="no-js" lang="">
  <!-- Mirrored from affixtheme.com/html/xmee/demo/login-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 15:02:46 GMT -->
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title> @yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/auth/img/favicon.png') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/bootstrap.min.css') }}" />
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/fontawesome-all.min.css') }}"/>
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/font/flaticon.css') }}" />
    <!-- Google Web Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap"
      rel="stylesheet"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/style.css') }}" />
  </head>

  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="http://browsehappy.com/">upgrade your browser</a> to improve
        your experience.
      </p>
    <![endif]-->
    <div id="preloader" class="preloader">
      <div class="inner">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </div>
    <section
      class="fxt-template-animation fxt-template-layout9"
      data-bg-image="{{ asset('assets/auth/img/figure/bg9-l.jpg ') }} "
    >
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-3">
            <div class="fxt-header">
              <a href="login-9.html" class="fxt-logo"
                ><img src="{{ asset('assets/auth/img/logo-9.png') }} " alt="Logo"
              /></a>
            </div>
          </div>
          <div class="col-lg-6">
            @yield('content')
          </div>
        </div>
      </div>
    </section>
    <!-- jquery-->
    <script src="{{ asset('assets/auth/js/jquery.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/auth/js/bootstrap.min.js') }}"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('assets/auth/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Validator js -->
    <script src="{{ asset('assets/auth/js/validator.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/auth/js/main.js') }}"></script>
  </body>

  <!-- Mirrored from affixtheme.com/html/xmee/demo/login-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 15:02:47 GMT -->
</html> --}}

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signin-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2024 07:46:58 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Sign In | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">


    <!-- Layout config Js -->
    <script src="{{ asset('assets/auth//js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/auth/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/auth/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/auth/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('assets/auth/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                   @yield('content')
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer galaxy-border-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>document.write(new Date().getFullYear())</script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/auth/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/auth/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/auth/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('assets/auth/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/auth/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('assets/auth/js/plugins.js')}}"></script>

    <!-- password-addon init -->
    <script src="{{asset('assets/auth/js/pages/password-addon.init.js')}}"></script>
</body>
