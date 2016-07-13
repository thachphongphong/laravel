@section('best_room_section')
    <div class="mg-best-rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mg-sec-title">
                        <h2>Our Best Rooms</h2>

                        <p>These best rooms chosen by our customers</p>
                    </div>
                    <div class="row">
                        @for ($i = 0; $i < 3; $i++)
                        <div class="col-sm-4">
                            <figure class="mg-room">
                                <img src="{{$rooms[$i]->image_url}}" alt="img11" class="img-responsive">
                                <figcaption>
                                    <h2>{{$rooms[$i]->name}}</h2>

                                    <div class="mg-room-rating"><i class="fa fa-star"></i> 5.00</div>
                                    <div class="mg-room-price">{{$rooms[$i]->price}}</div>
                                    <p>{{$rooms[$i]->description}}</p>
                                    <a href="#" class="btn btn-link">View Details <i class="fa fa-angle-double-right"></i></a>
                                    <a href="#" class="btn btn-main">Book</a>
                                </figcaption>
                            </figure>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@show
