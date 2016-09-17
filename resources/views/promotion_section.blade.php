@section('promotion_section')
<div class="btn-main mg-promotion">
    <div class="container">
        <div class="row">
            @foreach ($promotions as $pro)
                <h2 class="mg-sec-left-title">{{$pro->description}} : {{$pro->sale_off}}</h2>
                <p>{{$constants['room']['promotion_app']}} {{$constants['room']['promotion_from']}} :  {{ date('d-m-Y', strtotime($pro->apply_time_from)) }} {{$constants['room']['promotion_to']}} :  {{ date('d-m-Y', strtotime($pro->apply_time_to)) }}</p>
            @endforeach
        </div>
    </div>
</div>
@show