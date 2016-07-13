@section('about_section')
    <div class="mg-about parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="mg-sec-left-title">{{$abouts ->title}}</h2>
                    <p>{{$abouts ->short_content}}</p>
                </div>
                <div class="col-md-5">
                    <img src="{{$abouts ->image_url}}" alt="hotel image">
                </div>
            </div>
        </div>
    </div>
@show