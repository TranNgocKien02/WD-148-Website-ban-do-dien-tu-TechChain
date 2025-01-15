@extends('layouts.client')

@section('content')
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li class="active">About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- about wrapper start -->
            <div class="about-us-wrapper pt-60 pb-40">
                <div class="container">
                    <div class="row">
                        <!-- About Text Start -->
                        <div class="col-lg-6 order-last order-lg-first">
                            <div class="about-text-wrap">
                                <h2><span>Cung cấp tốt nhất</span>Sản phẩm dành cho bạn</h2>
                                <p>Chúng tôi cung cấp dầu dưỡng râu tốt nhất trên toàn thế giới. Chúng tôi là cửa hàng tốt nhất thế giới tại Việt Nam về sản phẩm công nghệ. Bạn có thể mua sản phẩm của chúng tôi mà không cần phải đắn đo vì họ tin tưởng chúng tôi và mua sản phẩm của chúng tôi mà không cần phải đắn đo vì họ tin tưởng và luôn vui vẻ khi mua sản phẩm của chúng tôi.</p>
                                <p>Một số khách hàng nói rằng họ tin tưởng chúng tôi và mua sản phẩm của chúng tôi mà không cần suy nghĩ gì cả vì họ tin chúng tôi và luôn vui vẻ khi mua sản phẩm của chúng tôi.</p>
                                <p>Chúng tôi cung cấp sản phẩm tốt nhất mà họ đã tin tưởng và mua mà không cần đắn đo vì họ tin tưởng chúng tôi và luôn vui vẻ mua hàng.</p>
                            </div>
                        </div>
                        <!-- About Text End -->
                        <!-- About Image Start -->
                        <div class="col-lg-5 col-md-10">
                            <div class="about-image-wrap">
                                <img class="img-full" src="http://127.0.0.1:5500/images/product/large-size/13.jpg" alt="About Us" />
                            </div>
                        </div>
                        <!-- About Image End -->
                    </div>
                </div>
            </div>

            <div class="team-area pt-60 pt-sm-44">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="li-section-title capitalize mb-25">
                                <h2><span>Đội Ngũ Phát Triển </span></h2>
                            </div>
                        </div>
                    </div> <!-- section title end -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                                <div class="team-thumb">
                                    <img src="https://scontent.fhan14-5.fna.fbcdn.net/v/t39.30808-6/473570364_122200113662198729_3045901533034461235_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=833d8c&_nc_ohc=8TP5cO6E-CkQ7kNvgFdGKSt&_nc_oc=AdigHYSAAFqTW2fgzxPSsxTnIOvhTPU8qV8AijlQCpGi9eQHl-oA2pvumEXkIPvfZhBRH75TxAEBe-ARINpMmo7O&_nc_zt=23&_nc_ht=scontent.fhan14-5.fna&_nc_gid=ApwmZqipFfxZp7AL3evWqBW&oh=00_AYCp9_OKVQHwqzunUjNmspu--1eYRpb3pJCKybt-ZXqD6g&oe=678D49E3" alt="Our Team Member">
                                </div>
                                <div class="team-content text-center">
                                    <h3>Trần Ngọc Kiên</h3>
                                    <p>Web Developer</p>
                                    <a href="#">info@example.com</a>

                                </div>
                            </div>
                        </div> <!-- end single team member -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                                <div class="team-thumb">
                                    <img src="https://scontent.fhan14-3.fna.fbcdn.net/v/t39.30808-6/473570274_122200113740198729_6998741497363082182_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_ohc=hNOoW_Uc1fgQ7kNvgEaSE8f&_nc_oc=AdgX9uGHDbTvoHMMfOFgCX86U3PvQBVaqkezsmE390B_btdxnB5Lu8cWWc_KtJkSzHvM_Ol5EefXjWoPOmc0OSzr&_nc_zt=23&_nc_ht=scontent.fhan14-3.fna&_nc_gid=AswU9MwQMs1rxRv4MkDre9W&oh=00_AYBHSs_sgl09LBPuBp1ZPFvQY-BszVOQHC6wBD9_Tg2Suw&oe=678D3F6A" alt="Our Team Member">
                                </div>
                                <div class="team-content text-center">
                                    <h3>Lương Minh Dương</h3>
                                    <p>Web Developer</p>
                                    <a href="#">info@example.com</a>

                                </div>
                            </div>
                        </div> <!-- end single team member -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="team-member mb-30 mb-sm-60">
                                <div class="team-thumb">
                                    <img src="https://scontent.fhan14-5.fna.fbcdn.net/v/t39.30808-6/473582981_122200113710198729_1448585458029976637_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_ohc=zMuRVqNdhDcQ7kNvgEyGFj0&_nc_oc=AdixYRX7AHUoTSfPnM-t7AycxVZ9kDrMsExckmndM_pKBtZIToW2_xBhXypE4C43JyMjhUPvfzCpveSSjPM_l_oC&_nc_zt=23&_nc_ht=scontent.fhan14-5.fna&_nc_gid=A7mVCOVtuuxPrpMVmXGp7gA&oh=00_AYBuLvXbkz37jxWbJKqw72_X7mqWbbjQ7kk9txRnGrkuSA&oe=678D4EF2" alt="Our Team Member">
                                </div>
                                <div class="team-content text-center">
                                    <h3>Lê Công Minh</h3>
                                    <p>Web Developer</p>
                                    <a href="#">info@example.com</a>

                                </div>
                            </div>
                        </div> <!-- end single team member -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="team-member mb-30 mb-sm-60 mb-xs-60">
                                <div class="team-thumb">
                                    <img src="https://scontent.fhan14-1.fna.fbcdn.net/v/t39.30808-6/473355406_122200113788198729_4634751038686184790_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_ohc=NjJfp1ZUVlcQ7kNvgHOiBt1&_nc_oc=AdgzuIM5GlaGZr0NXHY4lN7RWUL_w7V59xzfUaGeFrk-uwFqY1c9-FpcTvdsFTz60lcRdw62E0WDqEjlPx6mPttU&_nc_zt=23&_nc_ht=scontent.fhan14-1.fna&_nc_gid=A2uobPnn3QrTjTlV-fQvUTr&oh=00_AYA7h_tpvj6dYPtC4K_odZW_Wbp1B1YlkiSeo7SL_w-EGw&oe=678D536F" alt="Our Team Member">
                                </div>
                                <div class="team-content text-center">
                                    <h3> Đỗ Duy Hậu</h3>
                                    <p>Web Developer</p>
                                    <a href="#">info@example.com</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<style>
    .team-thumb img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
}
</style>
     @endsection
