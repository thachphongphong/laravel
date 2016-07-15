@section('footer_section')
    <footer class="mg-footer">
        <div class="mg-footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h2 class="mg-widget-title">{{$constants['footer']['contact']}}</h2>
                            <address>
                                {{--<strong>{{$constants['footer']['address']}}</strong><br>--}}
                                <strong>{{$contact->name}}</strong><br>
                                {{$contact->address}}
                            </address>

                            <p>
                               Phone : {{$contact->telephone}}<br>
                               Mobile : {{$contact->phone}}<br>
                               Fax : {{$contact->fax}}<br>
                            </p>

                            <p>
                                <a href="mailto:{{$contact->email_to}}">{{$contact->email_to}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h2 class="mg-widget-title">{{$constants['footer']['social']}}</h2>
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
                            <h2 class="mg-widget-title">{{$constants['footer']['newsletter']}}</h2>

                            <p>{{$constants['footer']['newsletter_desc']}}</p>

                            <form>
                                <p>
                                    <input type="email" class="form-control" placeholder="Email">
                                </p>
                                <input type="submit" class="btn btn-main" value="{{$constants['footer']['subscribe']}}">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h2 class="mg-widget-title">{{$constants['footer']['social_media']}}</h2>

                            <p>{{$constants['footer']['social_media_desc']}}</p>
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
