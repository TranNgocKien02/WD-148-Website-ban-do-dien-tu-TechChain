<!-- Begin Slider With Banner Area -->
            <div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Slider Area -->
                        <div class="col-lg-8 col-md-8">
                            <div class="slider-area">
                                <div class="slider-active owl-carousel">
                                    <!-- Begin Single Slide Area -->
                                     @foreach ($bannerMain as $banner)
                                    <div class="single-slide align-center-left  animation-style-01 bg" style="background-image: url('{{ Storage::url($banner->anh) }}');">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>{{$banner->mo_ta}}</h5>
                                            <h2>{{$banner->tieu_de}}</h2>
                                            <h3>Starting at <span>$1209.00</span></h3>
                                            <div class="default-btn slide-btn">
                                                <a class="links" href="{{$banner->link}}">Shopping Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Slider Area End Here -->
                        <!-- Begin Li Banner Area -->
                        <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                            @foreach ($bannerSale as $banner)
                                <div class="li-banner {{ $loop->iteration == 2 ? 'mt-15 mt-sm-30 mt-xs-30' : '' }}">
                                    <a href="{{$banner->link}}">
                                        <img src="{{ Storage::url($banner->anh) }}" alt="">
                                    </a>
                                </div>
                            @endforeach

                            {{-- <div class="li-banner">
                                <a href="#">
                                    <img src="{{asset('lib/images/banner/1_2.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                                <a href="#">
                                    <img src="{{asset('lib/images/banner/1_1.jpg')}}" alt="">
                                </a>
                            </div> --}}
                        </div>
                        <!-- Li Banner Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Slider With Banner Area End Here -->