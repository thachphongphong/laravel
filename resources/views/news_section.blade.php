@section('news_section')
    <div class="mg-news-gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="mg-sec-left-title">{{$constants['recentnews']['news']}}</h2>
                    <ul class="mg-recnt-posts">
                        @foreach($news as $new)

                            <li>
                                <div class="mg-recnt-post">
                                    <div class="mg-rp-date">{{ date('F d, Y', strtotime($new->created_date)) }}
                                        {{--<div class="mg-rp-month">{{ date('F d, Y', strtotime($new->created_date)) }}</div>--}}
                                    </div>
                                    <h3><a href="./news/{{$new->id}}">{{$new->title}}</a></h3>
                                    {{--{{ Request::path() }}--}}
                                    <p>{!! $new ->introtext !!}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-7">
                    <h2 class="mg-sec-left-title">{{$constants['recentnews']['gallery']}}</h2>

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
