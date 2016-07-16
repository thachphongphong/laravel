@section('hotel_facilities_section')
    <div class="mg-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mg-sec-title">
                        <h2>{{$constants['facilities']['title']}}</h2>
                        <p>{{$constants['facilities']['desc']}}</p>
                    </div>
                    @foreach ($room_services as $room_service)
                        @if(count($room_service->bestRoomServiceDetail))
                            <div class="row">
                                @foreach ($room_service->bestRoomServiceDetail as $detail)
                                    <div class="col-sm-4">
                                        <div class="mg-feature">
                                            <div class="mg-feature-icon-title">
                                                <i class="{{$detail->css_class}}"></i>
                                                <h3>{{$detail->name}}</h3>
                                            </div>
                                            <p>{{$detail->description}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@show
