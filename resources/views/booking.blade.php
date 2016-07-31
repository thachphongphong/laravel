@extends('master')
@section('content_section')
    @include('title_section')
    @if(! empty($booking))
        <div class="mg-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mg-booking-form">

                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#select-room" aria-controls="select-room" role="tab"
                                       data-toggle="tab"><span
                                                class="mg-bs-tab-num">1</span><span
                                                class="mg-bs-bar"></span>{{$constants['booking']['step1']}}</a>
                                </li>
                                <li role="presentation">
                                    <a href="#personal-info" aria-controls="personal-info" role="tab" data-toggle="tab"><span
                                                class="mg-bs-tab-num">2</span><span
                                                class="mg-bs-bar"></span>{{$constants['booking']['step2']}}</a>
                                </li>
                                <li role="presentation">
                                    <a href="#payment" aria-controls="payment" role="tab" data-toggle="tab"><span
                                                class="mg-bs-tab-num">3</span><span
                                                class="mg-bs-bar"></span>{{$constants['booking']['step3']}}</a>
                                </li>
                                <li role="presentation">
                                    <a href="#thank-you" aria-controls="thank-you" role="tab" data-toggle="tab"><span
                                                class="mg-bs-tab-num">4</span>{{$constants['booking']['step4']}}</a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane fade in active" id="select-room">
                                    <div class="mg-available-rooms">
                                        <h2 class="mg-sec-left-title">{{$constants['booking']['available']}}</h2>

                                        @foreach ($rooms as $room)
                                            <div class="mg-avl-room">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <a href="#"><img src="{{asset($room->image_url)}}" alt=""
                                                                         class="img-responsive"></a>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <h3 class="mg-avl-room-title"><a href="#">{{$room->name}}</a>
                                                            <span>{{$room->price}}</span></h3>

                                                        <p><span>{{$room->description}}</span> -
                                                            <span>{{$room->total_person}} {{$constants['room']['person']}}</span>
                                                        </p>

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
                                                        @if($booking->room_id == $room->id)
                                                            <a href="#personal-info" rid="{{$room->id}}" id="step1"
                                                            class="btn btn-success btn-next-tab">{{$constants['booking']['continue']}}</a>

                                                        @else
                                                            <a href="#personal-info" rid="{{$room->id}}" id="step1"
                                                               class="btn btn-main btn-next-tab">{{$constants['booking']['select']}}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="personal-info">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mg-book-form-personal">
                                                <h2 class="mg-sec-left-title">{{$constants['booking']['step2']}}</h2>

                                                <div class="row pb40">
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <label>{{$constants['booking']['firstname']}}</label>
                                                                <input id="firstname" name="firstname" type="text"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <label>{{$constants['booking']['lastname']}}</label>
                                                                <input id="lastname" name="lastname" type="text"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <label>{{$constants['booking']['email']}}</label>
                                                                <input id="email" name="email" type="text"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <label>{{$constants['booking']['email2']}}</label>
                                                                <input id="email2" name="email2" type="text"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <label>{{$constants['booking']['phone']}}</label>
                                                                <input id="phone" name="phone" type="text"
                                                                       class="form-control">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mg-cart-container">
                                                <aside class="mg-widget mt50" id="mg-room-cart">
                                                    <h2 class="mg-widget-title">{{$constants['booking']['detail']}}</h2>

                                                    <div class="mg-widget-cart">
                                                        <div class="mg-cart-room">
                                                            <img id="booking-room-url" src="123" alt="" class="img-responsive">
                                                            <h3 id="booking-room-name"></h3>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['checkin']}}:</strong>
                                                            <span id="booking-checkin" ></span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['checkout']}}:</strong>
                                                            <span id="booking-checkout"></span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['adult']}}:</strong>
                                                            <span id="booking-adult">0</span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['child']}}:</strong>
                                                            <span id="booking-child">0</span>
                                                        </div>
                                                        <div class="mg-cart-total">
                                                            <strong>{{$constants['booking']['total']}}:</strong>
                                                            <span id="booking-total">0</span>
                                                        </div>
                                                    </div>
                                                </aside>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="clearfix mg-terms-input">
                                                <div class="pull-right">
                                                    <label><input
                                                                type="checkbox"> {{$constants['booking']['confirm']}}
                                                        <a
                                                                href="#">{{$constants['booking']['terms']}}</a></label>
                                                </div>
                                            </div>
                                            <a href="#payment"
                                               class="btn btn-dark-main btn-next-tab pull-right">Next</a>
                                            <a href="#select-room"
                                               class="btn btn-default btn-prev-tab pull-left">Back</a>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="payment">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mg-book-form-billing">
                                                <h2 class="mg-sec-left-title">{{$constants['booking']['paylater']}}</h2>

                                                <h3>{{$constants['booking']['devlater']}}</h3>
                                                <a href="#thank-you" id="step3"
                                                   class="btn btn-dark-main btn-next-tab pull-right">{{$constants['booking']['pay']}}</a>
                                                <a href="#personal-info"
                                                   class="btn btn-default btn-prev-tab pull-left">Back</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mg-cart-container">
                                                <aside class="mg-widget mt50" id="mg-room-cart">
                                                    <h2 class="mg-widget-title">{{$constants['booking']['detail']}}</h2>

                                                    <div class="mg-widget-cart">
                                                        <div class="mg-cart-room">
                                                            <img src="images/room-1.png" alt="Delux Room"
                                                                 class="img-responsive">

                                                            <h3>Super Delux</h3>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['checkin']}}:</strong>
                                                            <span>27 Jan, 2015</span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['checkout']}}:</strong>
                                                            <span>28 Jan, 2015</span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['adult']}}:</strong>
                                                            <span>2</span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['child']}}:</strong>
                                                            <span>1</span>
                                                        </div>
                                                        <div class="mg-cart-total">
                                                            <strong>{{$constants['booking']['total']}}:</strong>
                                                            <span>$249.99</span>
                                                        </div>
                                                    </div>
                                                </aside>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="thank-you">
                                    <div class="alert alert-success alert-dismissible clearfix">
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                        <div class="mg-alert-icon"><i class="fa fa-check"></i></div>
                                        <h3 class="mg-alert-payment"
                                            style="display: inline;">{{$constants['booking']['thankyou']}}</h3>
                                    </div>
                                    <div class="mg-cart-container mg-paid">
                                        <aside class="mg-widget mt50" id="mg-room-cart">
                                            <h2 class="mg-widget-title">{{$constants['booking']['detail']}}</h2>

                                            <div class="mg-widget-cart">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mg-cart-room">
                                                            <img src="images/room-1.png" alt="Delux Room"
                                                                 class="img-responsive">

                                                            <h3>Super Delux</h3>

                                                            <p>Verbis texit statua status suo quidque concordia.
                                                                Octavio,
                                                                ignavi, iudicante intereant accusamus vitiis primos
                                                                ullum
                                                                paranda zenonem. Censes cadere urbanitas texit dicebas
                                                                maius
                                                                tranquilli, foris morborum divinum que medium utilior
                                                                crudelis
                                                                affert, quaerendum refert sequimur atqui ullus d
                                                                ornamenta
                                                                consumeret ut divinum, concedo percurri elaborare.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3 class="mg-payment-id">{{$constants['booking']['payId']}}:
                                                            #105152396140</h3>

                                                        <div class="mg-widget-cart-row">
                                                            <strong>Check In:</strong>
                                                            <span>27 Jan, 2015</span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>Check Out:</strong>
                                                            <span>28 Jan, 2015</span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>Adults:</strong>
                                                            <span>2</span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>Child:</strong>
                                                            <span>1</span>
                                                        </div>
                                                        <div class="mg-cart-address">
                                                            <strong>Your Address:</strong>
                                                            <address>
                                                                <strong>John Doe</strong><br>
                                                                Level 13, 2 Elizabeth St, Melbourne<br>
                                                                Victoria 3000 Australia
                                                            </address>
                                                        </div>
                                                        <div class="mg-cart-total">
                                                            <strong>Total:</strong>
                                                            <span>$249.99</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    @else
        <div class="mg-page">
            <div class="container">
                <div class="row">
                    <div class="alert alert-danger" role="alert"><i class="fa fa-question-circle"></i> <strong>Có
                            lỗi!</strong> Xin vui lòng thử lại.
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script type="text/javascript">
        function selectRoom(roomId) {
            $.ajax({
                type: "POST",
                url: '{{URL(Session::get('lang').'/booking/select')}}',
                data: {roomId: roomId},
                success: function (data) {
                    if (data.success) {
                        var room = data.data[0];
                        var assetBaseUrl = "{{ asset('') }}";
                        $('#booking-room-url').attr('src', assetBaseUrl + room.image_url);
                        $('#booking-room-url').attr('alt', room.name);
                        $('#booking-room-name').text(room.name);
//                        $('#booking-checkin')
//                        $('#booking-checkout')
//                        $('#booking-adult')
//                        $('#booking-child')
//                        $('#booking-total')
                    }else{
                        window.location.href = '{{URL(Session::get('lang').'/booking')}}';
                    }
                },
                error: function () {
                    window.location.href = '{{URL(Session::get('lang').'/booking')}}';
                }
            })
        }
        function makeBooking() {
            $.ajax({
                type: "POST",
                url: '{{URL(Session::get('lang').'/booking/make')}}',
                data: {},
                success: function (data) {
                    if (data.success) {
                        {{--var room = data.data[0];--}}
                        {{--var assetBaseUrl = "{{ asset('') }}";--}}
                        {{--$('#booking-room-url').attr('src', assetBaseUrl + room.image_url);--}}
                        {{--$('#booking-room-url').attr('alt', room.name);--}}
                        {{--$('#booking-room-name').text(room.name);--}}
//                        $('#booking-checkin')
//                        $('#booking-checkout')
//                        $('#booking-adult')
//                        $('#booking-child')
//                        $('#booking-total')
                    }else{
                        {{--window.location.href = '{{URL(Session::get('lang').'/booking')}}';--}}
                        console.log(data)
                    }
                },
                error: function () {
                    {{--window.location.href = '{{URL(Session::get('lang').'/booking')}}';--}}
                }
            })
        }
    </script>
@endsection