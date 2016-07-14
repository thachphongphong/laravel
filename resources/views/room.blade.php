@extends('master')
@section('content_section')
    <div class="mg-page mg-available-rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($rooms as $room)
                        <div class="mg-avl-room">
                            <div class="row">
                                <div class="col-sm-5">
                                    <a href="#"><img src="{{asset($room->image_url)}}" alt="" class="img-responsive"></a>
                                </div>
                                <div class="col-sm-7">
                                    <h3 class="mg-avl-room-title"><a href="#">{{$room->name}}</a>
                                        <span>{{$room->price}}</span></h3>

                                    <p>{{$room->description}}.</p>

                                    <div class="row mg-room-fecilities">
                                        <div class="col-sm-6">
                                            <ul>
                                                <li><i class="fp-ht-bed"></i> 2 King Beds</li>
                                                <li><i class="fp-ht-food"></i> Breakfast</li>
                                                <li><i class="fa fa-sun-o"></i> Air conditioning</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul>
                                                <li><i class="fp-ht-dumbbell"></i> GYM fecility</li>
                                                <li><i class="fp-ht-tv"></i> TV LCD</li>
                                                <li><i class="fp-ht-computer"></i> Wi-fi service</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-dark ">View Details <i class="fa fa-angle-double-right"></i></a>
                                    <a href="#" class="btn btn-main pull-right">Book Now</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection