@section('about_section')
    <div class="mg-about parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="mg-sec-left-title">{{$abouts ->title}}</h2>

                    <p>{{$abouts ->short_content}}</p>
                </div>
                <div class="col-md-5">
                    <div class="video-responsive">
                        <img width="500" src="{{asset($abouts ->image_url)}}" alt="hotel image">
                    </div>
                </div>
            </div>
        </div>
    </div>
@show
