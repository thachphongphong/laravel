@section('slider_section')
    <div id="mega-slider" class="carousel slide " data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#mega-slider" data-slide-to="0" class="active"></li>
            <li data-target="#mega-slider" data-slide-to="1"></li>
            <li data-target="#mega-slider" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @for ($i = 0; $i < count($sliders); $i++)
                <div class="item @if($i == 0)active beactive @endif">
                    <img src="{{asset($sliders[$i]->image_url)}}" alt="Biển Ngọc Đà Nẵng">

                    <div class="carousel-caption">
                        <img src="{{asset('images/stars.png')}}" alt="Biển Ngọc Đà Nẵng">
                        <div class="offers-box">
                            <h2>{{$sliders[$i]->h_info}}</h2>

                            <p>{{$sliders[$i]->p_info}}</p>
                        </div>
                    </div>
                </div>
            @endfor

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev">
        </a>
        <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next">
        </a>
    </div>
@show

