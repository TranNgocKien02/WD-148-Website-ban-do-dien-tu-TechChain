

</html>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>E-Smart || Đồ điện tử thông minh</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('lib/images/favicon.png')}}">

        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{asset('lib/css/material-design-iconic-font.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('lib/css/font-awesome.min.css')}}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{asset('lib/css/fontawesome-stars.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/meanmenu.css')}}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/owl.carousel.min.css')}}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/slick.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/animate.css')}}">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/jquery-ui.min.css')}}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/venobox.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/nice-select.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/magnific-popup.css')}}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/bootstrap.min.css')}}">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/helper.css')}}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('lib/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('lib/css/responsive.css')}}">
        {{-- <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}"> --}}
    {{-- <script src="{{ asset('assets/client/js/main.js') }}"></script> --}}
        <script src="{{asset('lib/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    {{-- <script src="{{asset('lib/js/main.js')}}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AbwlofImYY9g_g3EKi4Hx5ela-htKEt2Q9ZXXOcng8O3xteVQ_RM94T9axkKHesAQtcayGfz2eus3x_l&currency=USD&components=buttons"></script>




    {{-- @yield('css') --}}
        <!-- Modernizr js -->
</head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            @include('clients.blocks.header');

            @yield('content')

            @include('clients.blocks.footer');
        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        {{-- <script src="{{asset('lib/js/vendor/modernizr-2.8.3.min.js')}}"></script> --}}

        <script src="{{asset('lib/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('lib/js/vendor/popper.min.js')}}"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{asset('lib/js/bootstrap.min.js')}}"></script>
        <!-- Ajax Mail js -->
        <script src="{{asset('lib/js/ajax-mail.js')}}"></script>
        <!-- Meanmenu js -->
        <script src="{{asset('lib/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Wow.min js -->
        <script src="{{asset('lib/js/wow.min.js')}}"></script>
        <!-- Slick Carousel js -->
        <script src="{{asset('lib/js/slick.min.js')}}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{asset('lib/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific popup js -->
        <script src="{{asset('lib/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{asset('lib/js/isotope.pkgd.min.js')}}"></script>
        <!-- Imagesloaded js -->
        <script src="{{asset('lib/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- Mixitup js -->
        <script src="{{asset('lib/js/jquery.mixitup.min.js')}}"></script>
        <!-- Countdown -->
        <script src="{{asset('lib/js/jquery.countdown.min.js')}}"></script>
        <!-- Counterup -->
        <script src="{{asset('lib/js/jquery.counterup.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('lib/js/waypoints.min.js')}}"></script>
        <!-- Barrating -->
        <script src="{{asset('lib/js/jquery.barrating.min.js')}}"></script>
        <!-- Jquery-ui -->
        <script src="{{asset('lib/js/jquery-ui.min.js')}}"></script>
        <!-- Venobox -->
        <script src="{{asset('lib/js/venobox.min.js')}}"></script>
        <!-- Nice Select js -->
        <script src="{{asset('lib/js/jquery.nice-select.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{asset('lib/js/scrollUp.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{asset('lib/js/main.js')}}"></script>
    </body>

    @yield('js')
<!-- index30:23-->
</html>
