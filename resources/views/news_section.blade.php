@section('news_section')
    <div class="mg-news-gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="mg-sec-left-title">Recent News</h2>
                    <ul class="mg-recnt-posts">
                        <li>
                            <div class="mg-recnt-post">
                                <div class="mg-rp-date">27
                                    <div class="mg-rp-month">may</div>
                                </div>
                                <h3><a href="#">A Standard Blog Post</a></h3>

                                <p>Nostram virtutem poterimus quoddam praesertim legendos libero exhorrescere saluti...</p>
                            </div>
                        </li>
                        <li>
                            <div class="mg-recnt-post">
                                <div class="mg-rp-date">27
                                    <div class="mg-rp-month">may</div>
                                </div>
                                <h3><a href="#">A Standard Blog Post</a></h3>

                                <p>Nostram virtutem poterimus quoddam praesertim legendos libero exhorrescere saluti...</p>
                            </div>
                        </li>
                        <li>
                            <div class="mg-recnt-post">
                                <div class="mg-rp-date">27
                                    <div class="mg-rp-month">may</div>
                                </div>
                                <h3><a href="#">A Standard Blog Post</a></h3>

                                <p>Nostram virtutem poterimus quoddam praesertim legendos libero exhorrescere saluti...</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7">
                    <h2 class="mg-sec-left-title">Our Gallery</h2>

                    <div class="mg-gallery-container">
                        <ul class="mg-gallery" id="mg-gallery">
                            <li><img src="{{asset('images/gallery-01.png')}}" alt="Partner Logo"></li>
                            <li><img src="{{asset('images/gallery-02.png')}}" alt="Partner Logo"></li>
                            <li><img src="{{asset('images/gallery-05.png')}}" alt="Partner Logo"></li>
                            <li><img src="{{asset('images/gallery-07.png')}}" alt="Partner Logo"></li>
                            <li><img src="{{asset('images/gallery-05.png')}}" alt="Partner Logo"></li>
                            <li><img src="{{asset('images/gallery-06.png')}}" alt="Partner Logo"></li>
                        </ul>
                        <ul class="mg-gallery-thumb" id="mg-gallery-thumb">
                            <li><img src="{{asset('images/gallery-thumb-01.png')}}" alt="Partner Logo"></li>
                            <li><img src="{{asset('images/gallery-thumb-02.png')}}" alt="Partner Logo"></li>
                            <li><img src="{{asset('images/gallery-thumb-05.png')}}" alt="Partner Logo"></li>
                            <li><img src="{{asset('images/gallery-thumb-06.png')}}" alt="Partner Logo"></li>
                            <li><img src="{{asset('images/gallery-thumb-07.png')}}" alt="Partner Logo"></li>
                            <li><img src="{{asset('images/gallery-thumb-05.png')}}" alt="Partner Logo"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@show
