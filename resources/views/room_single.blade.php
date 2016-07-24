@extends('master')
@section('content_section')
    @include('title_section')
    <div class="mg-single-room-price">
        <div class="mg-srp-inner">{{$room->price}}<span>đêm</span></div>
    </div>
    <div class="mg-single-room">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="mg-gallery-container">
                        <ul class="mg-gallery" id="mg-gallery">
                            @foreach ($images as $image)
                                <li><img height="350" width="670" src="{{asset($image -> url)}}" alt="{{$image -> alt}}"></li>
                            @endforeach
                        </ul>
                        <ul class="mg-gallery-thumb" id="mg-gallery-thumb">
                            @foreach ($images as $image)
                                <li><img height="60" width="101" src="{{asset($image -> thumb)}}" alt="{{$image -> alt}}"></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 mg-room-fecilities">
                    <h2 class="mg-sec-left-title">{{$constants['room']['facilities']}}</h2>

                    <div class="row">
                        <div class="col-xs-6">
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
                        <div class="col-xs-6">
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mg-single-room-txt">
                        <h2 class="mg-sec-left-title">{{$constants['room']['desc']}}</h2>

                        <p>Sẽ đc cập nhật</p>

                        <p>Đang phát triển.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mg-saerch-room pb70">
                    @include('book_now_section')
                </div>
            </div>

        </div>
    </div>

@endsection