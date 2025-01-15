@extends('layouts.client')

@section('content')
<div class="body-wrapper">
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Tin tức công nghệ</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Begin Main Blog Page Area -->
    <div class="li-main-blog-page pt-60 pb-55">
        <div class="container">
            <div class="row">
                <!-- Begin Main Content Area -->
                <div class="col-lg-12">
                    <div class="row li-main-content">
                        <!-- Post 1 -->
                        <div class="col-lg-6 col-md-6">
                            <div class="li-blog-single-item pb-25">
                                <div class="li-blog-banner">
                                    <a href="blog-details-left-sidebar.html"><img class="img-full" src="http://127.0.0.1:5500/images/blog-banner/2.jpg" alt="Trí tuệ nhân tạo"></a>
                                </div>
                                <div class="li-blog-content">
                                    <div class="li-blog-details">
                                        <h3 class="li-blog-heading pt-25">
                                            <a href="blog-details-left-sidebar.html">Sự bùng nổ của Trí tuệ nhân tạo</a>
                                        </h3>
                                        <div class="li-blog-meta">
                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                            <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 bình luận</a>
                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 13 tháng 1, 2025</a>
                                        </div>
                                        <p>AI không chỉ hỗ trợ trong sản xuất mà còn tác động mạnh mẽ đến y tế, giáo dục và đời sống hàng ngày.</p>
                                        <a class="read-more" href="blog-details-left-sidebar.html">Xem thêm...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Post 2 -->
                        <div class="col-lg-6 col-md-6">
                            <div class="li-blog-single-item pb-25">
                                <div class="li-blog-gallery-slider slick-dot-style">
                                    <div class="li-blog-banner">
                                        <a href="blog-details-left-sidebar.html"><img class="img-full" src="http://127.0.0.1:5500/images/blog-banner/1.jpg" alt="5G"></a>
                                    </div>
                                    <div class="li-blog-banner">
                                        <a href="blog-details-left-sidebar.html"><img class="img-full" src="http://127.0.0.1:5500/images/blog-banner/3.jpg" alt="5G"></a>
                                    </div>
                                </div>
                                <div class="li-blog-content">
                                    <div class="li-blog-details">
                                        <h3 class="li-blog-heading pt-25">
                                            <a href="blog-details-left-sidebar.html">Công nghệ 5G</a>
                                        </h3>
                                        <div class="li-blog-meta">
                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                            <a class="comment" href="#"><i class="fa fa-comment-o"></i> 5 bình luận</a>
                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 12 tháng 1, 2025</a>
                                        </div>
                                        <p>5G đang là công nghệ được triển khai rộng rãi, hứa hẹn mang lại tốc độ truyền tải vượt bậc.</p>
                                        <a class="read-more" href="blog-details-left-sidebar.html">Xem thêm...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Post 3 -->
                        <div class="col-lg-6 col-md-6">
                            <div class="li-blog-single-item pb-25">
                                <div class="li-blog-banner embed-responsive embed-responsive-16by9">
                                    <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/300107209" allow="autoplay"></iframe>
                                </div>
                                <div class="li-blog-content">
                                    <div class="li-blog-details">
                                        <h3 class="li-blog-heading pt-25">
                                            <a href="blog-details-left-sidebar.html">Tương lai của âm thanh kỹ thuật số</a>
                                        </h3>
                                        <div class="li-blog-meta">
                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                            <a class="comment" href="#"><i class="fa fa-comment-o"></i> 4 bình luận</a>
                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 11 tháng 1, 2025</a>
                                        </div>
                                        <p>Âm thanh kỹ thuật số đang được nâng cấp nhờ vào các thuật toán thông minh và xử lý mạnh mẽ.</p>
                                        <a class="read-more" href="blog-details-left-sidebar.html">Xem thêm...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pagination -->
                        <div class="col-lg-12">
                            <div class="li-paginatoin-area text-center pt-25">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="li-pagination-box">
                                            <li><a class="Previous" href="#">Trước</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a class="Next" href="#">Tiếp theo</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pagination End -->
                    </div>
                </div>
                <!-- Main Content Area End -->
            </div>
        </div>
    </div>
</div>

    @endsection
