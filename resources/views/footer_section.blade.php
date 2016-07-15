@section('footer_section')
    <footer class="mg-footer">
        <div class="mg-footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h2 class="mg-widget-title">Liên hệ</h2>
                            <address>
                                <strong>Địa chỉ</strong><br>
                                Biển Mỹ Khê, Lô B2-09-10, đường Loseby,<br>
                                An Cư 3, Quận Sơn Trà, TP Đà Nẵng
                            </address>

                            <p>
                                (+84) 0905875759 - 0935989845<br>
                                (+84 511) 3927999 - 3917555<br>
                                (+84 511) 33917555<br>
                            </p>

                            <p>
                                <a href="mailto:pearlseahotel@gmail.com">pearlseahotel@gmail.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h2 class="mg-widget-title">Facebook</h2>
                            <ul class="mg-instagram">
                                <li><a href="#"><img height="70" src="{{asset('images/facebook/fb-01.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img height="70" src="{{asset('images/facebook/fb-02.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img height="70" src="{{asset('images/facebook/fb-03.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img height="70" src="{{asset('images/facebook/fb-04.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img height="70" src="{{asset('images/facebook/fb-05.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img height="70" src="{{asset('images/facebook/fb-06.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img height="70" src="{{asset('images/facebook/fb-07.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img height="70" src="{{asset('images/facebook/fb-08.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img height="70" src="{{asset('images/facebook/fb-09.jpg')}}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h2 class="mg-widget-title">Nhận tin</h2>

                            <p>Để đăng ký nhận các bản tin mới nhất của Khách sạn Biển Ngọc, xin vui lòng điền email của bạn. Xin trân trọng cảm ơn.</p>

                            <form>
                                <p>
                                    <input type="email" class="form-control" placeholder="Email">
                                </p>
                                <input type="submit" class="btn btn-main" value="Subscribe">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h2 class="mg-widget-title">Social Media</h2>

                            <p>Các trang mạng xã hội của khách sạn Biển Ngọc.</p>
                            <ul class="mg-footer-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mg-copyright">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <ul class="mg-footer-nav">
                            @foreach ($menus as $menu)
                                    <li><a href="{{asset($menu ->url)}}">{{$menu ->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@show
