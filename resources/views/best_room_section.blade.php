@section('best_room_section')
    <div class="mg-best-rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mg-sec-title">
                        <h2>Những phòng tốt nhất</h2>

                        <p>Được chọn bởi khách hàng</p>
                    </div>
                    <div class="row">
                        @foreach ($rooms as $room)
                            <div class="col-sm-4">
                                <figure class="mg-room">
                                    <img src="{{asset($room->image_url)}}" alt="img11" class="img-responsive">
                                    <figcaption>
                                        <h2>{{$room->name}}</h2>

                                        <div class="mg-room-rating"><i class="fa fa-star"></i> 5.00</div>
                                        <div class="mg-room-price">{{$room->price}}</div>
                                        <p>{{$room->description}}</p>
                                        <a href="#" class="btn btn-link">Xem chi tiết <i class="fa fa-angle-double-right"></i></a>
                                        <a href="#" class="btn btn-main">Book</a>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@show
