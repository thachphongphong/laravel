@extends('master')
@section('content_section')
    @include('title_section')
    @include('book_now_section')
    <div class="mg-page mg-available-rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($rooms as $room)
                        <div class="mg-avl-room">
                            <div class="row">
                                <div class="col-sm-5">
                                    <a href="#"><img src="{{asset($room->image_url)}}" alt=""
                                                     class="img-responsive"></a>
                                </div>
                                <div class="col-sm-7">
                                    <h3 class="mg-avl-room-title"><a href="#">{{$room->name}}</a>
                                        <span>{{number_format($room->price, 0)}} {{$constants['room']['currency']}}</span></h3>

                                    <p><span>{{$room->description}}</span> - <span>{{$room->total_person}} {{$constants['room']['person']}}</span></p>

                                    <div class="row mg-room-fecilities">
                                        <div class="col-sm-6">
                                            <ul>
                                                @for ($i = 0; $i < count($room->roomdetails)/2; $i++)
                                                    <li>@if($room->roomdetails[$i]->id <= 3|| ($room->roomdetails[$i]->id >12 && $room->roomdetails[$i]->id <16))
                                                            <i class="fp-ht-bed"></i>
                                                        @elseif($room->roomdetails[$i]->id == 4 || $room->roomdetails[$i]->id == 16)
                                                            <i class="fa fa-sun-o"></i>
                                                        @elseif($room->roomdetails[$i]->id ==5 || $room->roomdetails[$i]->id == 17)
                                                            <i class="fp-ht-tv"></i>
                                                        @elseif($room->roomdetails[$i]->id ==6 || $room->roomdetails[$i]->id == 18)
                                                            <i class="fp-ht-telephone"></i>
                                                        @elseif($room->roomdetails[$i]->id ==7 || $room->roomdetails[$i]->id == 19)
                                                            <i class="fp-ht-computer"></i>
                                                        @elseif($room->roomdetails[$i]->id ==8 || $room->roomdetails[$i]->id == 20)
                                                            <i class="fp-ht-bathtub"></i>
                                                        @elseif($room->roomdetails[$i]->id ==9 || $room->roomdetails[$i]->id == 21)
                                                            <i class="fp-ht-icecream"></i>
                                                        @elseif($room->roomdetails[$i]->id ==10 || $room->roomdetails[$i]->id == 22)
                                                            <i class="fp-ht-hairdryer"></i>
                                                        @elseif($room->roomdetails[$i]->id ==11 || $room->roomdetails[$i]->id == 23)
                                                            <i class="fp-ht-semicircle"></i>
                                                        @elseif($room->roomdetails[$i]->id ==12 || $room->roomdetails[$i]->id == 24)
                                                            <i class="fp-ht-pool"></i>
                                                        @endif
                                                        {{$room->roomdetails[$i]->name}}</li>
                                                @endfor
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul>
                                                @for ($i = count($room->roomdetails)/2; $i < count($room->roomdetails); $i++)
                                                    <li>@if($room->roomdetails[$i]->id <= 3|| ($room->roomdetails[$i]->id >12 && $room->roomdetails[$i]->id <16))
                                                            <i class="fp-ht-bed"></i>
                                                        @elseif($room->roomdetails[$i]->id == 4 || $room->roomdetails[$i]->id == 16)
                                                            <i class="fa fa-sun-o"></i>
                                                        @elseif($room->roomdetails[$i]->id ==5 || $room->roomdetails[$i]->id == 17)
                                                            <i class="fp-ht-tv"></i>
                                                        @elseif($room->roomdetails[$i]->id ==6 || $room->roomdetails[$i]->id == 18)
                                                            <i class="fp-ht-telephone"></i>
                                                        @elseif($room->roomdetails[$i]->id ==7 || $room->roomdetails[$i]->id == 19)
                                                            <i class="fp-ht-computer"></i>
                                                        @elseif($room->roomdetails[$i]->id ==8 || $room->roomdetails[$i]->id == 20)
                                                            <i class="fp-ht-bathtub"></i>
                                                        @elseif($room->roomdetails[$i]->id ==9 || $room->roomdetails[$i]->id == 21)
                                                            <i class="fp-ht-icecream"></i>
                                                        @elseif($room->roomdetails[$i]->id ==10 || $room->roomdetails[$i]->id == 22)
                                                            <i class="fp-ht-hairdryer"></i>
                                                        @elseif($room->roomdetails[$i]->id ==11 || $room->roomdetails[$i]->id == 23)
                                                            <i class="fp-ht-semicircle"></i>
                                                        @elseif($room->roomdetails[$i]->id ==12 || $room->roomdetails[$i]->id == 24)
                                                            <i class="fp-ht-pool"></i>
                                                        @endif
                                                    {{$room->roomdetails[$i]->name}}</li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>

                                    <a href=" {{ action("RoomDetailController@load", [(!Session::has('lang'))? Session::get('lang'): 'vi', $room->id]) }}" class="btn btn-dark "> <i
                                                class="fa fa-angle-double-right">{{$constants['room']['detail']}}</i></a>
                                    <a href="{{ URL::to( '/'.Session::get('lang').'/booking', [$room->id]) }}" class="btn btn-main pull-right">{{$constants['room']['book']}}</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection