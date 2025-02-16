<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
    <meta name="author" content="Zoyothemes"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Bootstrap CSS (CDN) -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

    <!--Table-->
    <link rel="stylesheet" href="{{asset('assets/admin/css/jquery.dataTables.min.css')}}">
    
    <!-- App css -->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('css')
</head>

<body data-menu-color="light" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">
        <!-- Topbar Start -->
        @include('admins.blocks.header')
        <!-- end Topbar -->

        @include('admins.blocks.sidebar')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            @yield('content')

            <!-- Footer Start -->
            @include('admins.blocks.footer')
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Vendor JS -->
    <script src="{{ asset('assets/admin/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/feather-icons/feather.min.js') }}"></script>

    <!-- CDN jQuery -->
    <script src="{{asset('assets/admin/js/jquery-3.6.0.min.js')}}"></script>
    <!-- CDN JS DataTables -->
    <script src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>

    <!-- Apexcharts JS -->
    <script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- for basic area chart -->
    <script src="{{ asset('assets/admin/stock-prices.js') }}"></script>

    @yield('js')

    <!-- App js -->
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
</body>
</html>
