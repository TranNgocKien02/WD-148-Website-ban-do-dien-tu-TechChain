<!-- Begin Li's Static Banner Area -->
            <div class="li-static-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Single Banner Area -->
                        @foreach ($bannerProduct as $item)
                            <div class="col-lg-4 col-md-4 text-center">
                                <div class="single-banner">
                                    <a href="#">
                                        <img style="height: 226px;" class="object-fit-cover" src="{{Storage::url($item->anh)}}" alt="Li's Static Banner">
                                    </a>
                                </div>
                            </div>
                            <!-- Single Banner Area End Here -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Li's Static Banner Area End Here -->