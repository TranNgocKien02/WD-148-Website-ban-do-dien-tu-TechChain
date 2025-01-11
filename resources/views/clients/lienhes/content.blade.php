<div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
                <div class="container mb-60">
                    {{-- <div id="google-map"></div> --}}
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                            <div class="contact-page-side-content">
                                <h3 class="contact-page-title">Liên Hệ Chúng Tôi</h3>
                                <p class="contact-page-message mb-25">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.</p>
                                <div class="single-contact-block">
                                    <h4><i class="fa fa-fax"></i> Địa Chỉ</h4>
                                    <p>123 Main Street, Anytown, CA 12345 – USA</p>
                                </div>
                                <div class="single-contact-block">
                                    <h4><i class="fa fa-phone"></i> Điện Thoại</h4>
                                    <p>Mobile: (08) 123 456 789</p>
                                    <p>Hotline: 1009 678 456</p>
                                </div>
                                <div class="single-contact-block last-child">
                                    <h4><i class="fa fa-envelope-o"></i> Email</h4>
                                    <p>yourmail@domain.com</p>
                                    <p>support@hastech.company</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                            <div class="contact-form-content pt-sm-55 pt-xs-55">
                                <h3 class="contact-page-title">Gửi Cho Chúng Tôi</h3>
                                <div class="contact-form">
                                    <form  id="contact-form" action="{{route('contact.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên Của Bạn<span class="required">*</span></label>
                                            <input type="text" name="ten_khach_hang" id="customername" >
                                            @error('ten_khach_hang')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Email Của Bạn <span class="required">*</span></label>
                                            <input type="email" name="email_khach_hang" id="customerEmail" >
                                            @error('email_khach_hang')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Chủ Đề</label>
                                            <input type="text" name="chu_de" id="contactSubject">
                                            @error('chu_de')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-30">
                                            <label>Nội Dung</label>
                                            <textarea name="noi_dung" id="contactMessage" ></textarea>
                                            @error('noi_dung')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" value="submit" id="submit" class="li-btn-3" name="submit">Gửi</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- <p class="form-messege"></p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Main Page Area End Here -->