<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-light' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a class='logo logo-dark' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Quản trị </li>

                <li>
                    <a class='tp-link' href='{{ route('admins.dashboard') }}'>
                        <i data-feather="home"></i>
                            <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a class='tp-link' href='{{ route('admins.khachhangs.index') }}'>

                        <i data-feather="users"></i>
                            <span> Quản lý tài khoản </span>
                    </a>

                </li>

                <li>
                    <a class='tp-link' href='{{ route('admins.thongtintrangwebs.index') }}'>
                        <i data-feather="users"></i>
                            <span> Quản lý thông tin </span>
                    </a>

                </li>
    
                <li class="menu-title">Kinh doanh </li>

                <li>
                    <a class='tp-link' href='{{ route('admins.danhmucs.index') }}'>
                        <i data-feather="align-center"></i>
                            <span> Doanh mục sản phẩm </span>
                    </a>
                </li>

                <li>
                    <a class='tp-link' href='{{ route('admins.sanphams.index') }}'>
                        <i data-feather="package"></i>
                            <span> Sản phẩm </span>
                    </a>

                </li>
                <li>
                    <a class='tp-link' href='{{ route('admins.donhangs.index') }}'>
                        <i data-feather="package"></i>
                            <span>Đơn hàng</span>
                    </a>

                </li>
                <li>
                    <a class='tp-link' href='{{ route('admins.thongkes.index') }}'>
                        <i data-feather="package"></i>
                            <span>Thống kê</span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href='{{ route('admins.coupons.index') }}'>
                        <i data-feather="package"></i>
                            <span>Khuyến mãi</span>
                    </a>

                </li>
                <li>
                    <a class='tp-link' href='{{ route('admins.hangs.index') }}'>
                        <i data-feather="package"></i>
                            <span>Hãng Sản Phẩm</span>
                    </a>

                </li>
                <li>
                    <a class='tp-link' href='{{ route('admins.banners.index') }}'>
                        <i data-feather="users"></i>
                            <span> Quản lý Banner </span>
                    </a>

                </li>
                <li>
                    <a class='tp-link' href='{{ route('admins.lienhes.index') }}'>
                        <i data-feather="package"></i>
                            <span>Liên Hệ</span>
                    </a>

                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>

