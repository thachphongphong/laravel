@extends('master')
@section('content_section')
    @include('title_section')
    @if(! empty($booking))
        <style>
            div.cs-skin-elastic {
                background: transparent;
                font-size: 14px;
                color: #000;
            }
        </style>
        <div class="mg-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mg-booking-form">

                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#select-room" id="step1" aria-controls="select-room" role="tab"
                                       data-toggle="tab"><span
                                                class="mg-bs-tab-num">1</span><span
                                                class="mg-bs-bar"></span>{{$constants['booking']['step1']}}</a>
                                </li>
                                <li role="presentation">
                                    <a href="#personal-info" id="step2" class="disabled" aria-controls="personal-info" role="tab"
                                       data-toggle="tab"><span
                                                class="mg-bs-tab-num">2</span><span
                                                class="mg-bs-bar"></span>{{$constants['booking']['step2']}}</a>
                                </li>
                                <li role="presentation">
                                    <a href="#payment" id="step3" class="disabled" aria-controls="payment" role="tab"
                                       data-toggle="tab"><span
                                                class="mg-bs-tab-num">3</span><span
                                                class="mg-bs-bar"></span>{{$constants['booking']['step3']}}</a>
                                </li>
                                <li role="presentation">
                                    <a href="#thank-you" id="step4" class="disabled" aria-controls="thank-you" role="tab"
                                       data-toggle="tab"><span
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
                                                            <span id ="room-price">{{number_format($room->price, 0)}}</span></h3>

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
                                                                <div class="input-group date mg-check-in">
                                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="booking-checkin"
                                                                           onchange="hasCheckin(this); updateBooking('in');"
                                                                           name="booking-checkin"
                                                                           placeholder="{{$constants['booknow']['checkin']}}">

                                                                </div>
                                                                <div style="display:none;" class="alert alert-warning"
                                                                     role="alert"><i
                                                                            class="fa fa-warning"></i> {{$constants['validate']['checkin']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <div class="input-group date mg-check-out">
                                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="booking-checkout"
                                                                           onchange="hasCheckout(this); updateBooking('out');"
                                                                           name="booking-checkout"
                                                                           placeholder="{{$constants['booknow']['checkout']}}">
                                                                </div>
                                                                <div style="display:none;" class="alert alert-warning"
                                                                     role="alert"><i
                                                                            class="fa fa-warning"></i> {{$constants['validate']['checkout']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" style="z-index: 0;">
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <select class="cs-select cs-skin-elastic form-control"
                                                                        id="booking-adult" name="booking-adult">
                                                                    <option value="" disabled
                                                                            selected>{{$constants['booknow']['adult']}}</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" style="z-index: 0;">
                                                            <div class="mg-book-form-input">
                                                                <select class="cs-select cs-skin-elastic form-control"
                                                                        id="booking-child" name="booking-child">
                                                                    <option value="" disabled
                                                                            selected>{{$constants['booknow']['child']}}</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <label>{{$constants['booking']['firstname']}}</label>
                                                                <input id="firstname" name="firstname" type="text"
                                                                       onblur="checkText(this)"
                                                                       class="form-control">

                                                                <div style="display:none;" class="alert alert-warning"
                                                                     role="alert"><i
                                                                            class="fa fa-warning"></i> {{$constants['validate']['firstname']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <label>{{$constants['booking']['lastname']}}</label>
                                                                <input id="lastname" name="lastname" type="text"
                                                                       onblur="checkText(this)"
                                                                       class="form-control">

                                                                <div style="display:none;" class="alert alert-warning"
                                                                     role="alert"><i
                                                                            class="fa fa-warning"></i> {{$constants['validate']['lastname']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <label>{{$constants['booking']['email']}}</label>
                                                                <input id="email1" name="email1" type="text"
                                                                       onblur="checkEmail(this)"
                                                                       class="form-control">

                                                                <div style="display:none;" class="alert alert-warning"
                                                                     role="alert"><i
                                                                            class="fa fa-warning"></i> {{$constants['validate']['email']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <label>{{$constants['booking']['email2']}}</label>
                                                                <input id="email2" name="email2" type="text"
                                                                       onblur="checkEmail(this); checkSameEmail(this)"
                                                                       class="form-control">

                                                                <div style="display:none;" class="alert alert-warning"
                                                                     role="alert"><i
                                                                            class="fa fa-warning"></i> {{$constants['validate']['email']}}
                                                                </div>
                                                                <div style="display:none;" class="alert alert-warning"
                                                                     role="alert"><i
                                                                            class="fa fa-warning"></i> {{$constants['validate']['email2']}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <div class="mg-book-form-input">
                                                                <label>{{$constants['booking']['phone']}}</label>
                                                                <input id="phone" name="phone" type="text"
                                                                       onblur="checkPhone(this)"
                                                                       class="form-control">

                                                                <div style="display:none;" class="alert alert-warning"
                                                                     role="alert"><i
                                                                            class="fa fa-warning"></i> {{$constants['validate']['phone']}}
                                                                </div>
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
                                                            <img id="booking-room-url" src="{{asset('images/room.jpg')}}" alt="pearlsea" class="img-responsive">

                                                            <h3 id="booking-room-name"></h3>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['checkin']}}:</strong>
                                                            <span id="booking-checkin-txt"></span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['checkout']}}:</strong>
                                                            <span id="booking-checkout-txt"></span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['adult']}}:</strong>
                                                            <span id="booking-adult-txt">0</span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['child']}}:</strong>
                                                            <span id="booking-child-txt">0</span>
                                                        </div>
                                                        <div class="mg-cart-total">
                                                            <strong>{{$constants['booking']['total']}}:</strong>
                                                            <span id="booking-total-txt">0</span>
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
                                                    <label><input id="accept"
                                                                  type="checkbox"> {{$constants['booking']['confirm']}}
                                                        <a
                                                                href="#">{{$constants['booking']['terms']}}</a></label>
                                                </div>
                                            </div>
                                            <a href="#payment" id="step2"
                                               class="btn btn-dark-main btn-next-tab pull-right disabled">Next</a>
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
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mg-cart-container">
                                                <aside class="mg-widget mt50" id="mg-room-cart">
                                                    <h2 class="mg-widget-title">{{$constants['booking']['detail']}}</h2>

                                                    <div class="mg-widget-cart">
                                                        <div class="mg-cart-room">
                                                            <img id="booking-room-url" src="{{asset('images/room.jpg')}}" alt="pearlsea" class="img-responsive">

                                                            <h3 id="booking-room-name"></h3>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['checkin']}}:</strong>
                                                            <span id="booking-checkin-txt"></span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['checkout']}}:</strong>
                                                            <span id="booking-checkout-txt"></span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['adult']}}:</strong>
                                                            <span id="booking-adult-txt">0</span>
                                                        </div>
                                                        <div class="mg-widget-cart-row">
                                                            <strong>{{$constants['booknow']['child']}}:</strong>
                                                            <span id="booking-child-txt">0</span>
                                                        </div>
                                                        <div class="mg-cart-total">
                                                            <strong>{{$constants['booking']['total']}}:</strong>
                                                            <span id="booking-total-txt">0</span>
                                                        </div>
                                                    </div>
                                                </aside>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="#thank-you" id="step3"
                                               class="btn btn-dark-main btn-next-tab pull-right">{{$constants['booking']['pay']}}</a>
                                            <a href="#personal-info"
                                               class="btn btn-default btn-prev-tab pull-left">Back</a>
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
                                                        <img id="booking-room-url" src="{{asset('images/room.jpg')}}" alt="pearlsea" class="img-responsive">

                                                        <h3 id="booking-room-name"></h3>
                                                    </div>
                                                </div>    
                                                <div class="col-md-6">
                                                    <h3 class="mg-payment-id">{{$constants['booking']['payId']}}: #<span id="booking-id-txt"></span></h3>   
                                                    <div class="mg-widget-cart-row">
                                                        <strong>{{$constants['booknow']['checkin']}}:</strong>
                                                        <span id="booking-checkin-txt"></span>
                                                    </div>
                                                    <div class="mg-widget-cart-row">
                                                        <strong>{{$constants['booknow']['checkout']}}:</strong>
                                                        <span id="booking-checkout-txt"></span>
                                                    </div>
                                                    <div class="mg-widget-cart-row">
                                                        <strong>{{$constants['booknow']['adult']}}:</strong>
                                                        <span id="booking-adult-txt">0</span>
                                                    </div>
                                                    <div class="mg-widget-cart-row">
                                                        <strong>{{$constants['booknow']['child']}}:</strong>
                                                        <span id="booking-child-txt">0</span>
                                                    </div>
                                                    <div class="mg-cart-address">
                                                            <strong>{{$constants['contact']['full_name']}}:</strong>
                                                            <address>
                                                                <strong id="booking-name-txt"></strong><br>
                                                                <span id="booking-email-txt"></span><br>
                                                                <span id="booking-phone-txt"></span>
                                                            </address>
                                                        </div>
                                                    <div class="mg-cart-total">
                                                        <strong>{{$constants['booking']['total']}}:</strong>
                                                        <span id="booking-total-txt">0</span>
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
         var session_checkin = "";
         var session_checkout = "";
         var session_adult = "0";
         var session_child = "0";
         var session_total = 0;
         var isBooking = false;
           @if(Session::has('booking') && ! empty(Session::get('booking')->check_in))
                session_checkin = '{{ date('d/m/Y', strtotime(Session::get('booking')->check_in))}}';
            @endif

            
            @if(Session::has('booking') && ! empty(Session::get('booking')->check_out))
                session_checkout = '{{date('d/m/Y', strtotime(Session::get('booking')->check_out))}}';
            @endif

           
            @if(Session::has('booking') && ! empty(Session::get('booking')->adult))
                session_adult = '{{Session::get('booking')->adult}}';
                    @endif

            
            @if(Session::has('booking') && ! empty(Session::get('booking')->child))
                session_child = '{{Session::get('booking')->child}}';
            @endif

            @if(Session::has('booking') && ! empty(Session::get('booking')->total_money))
                session_total = '{{Session::get('booking')->total_money}}';
            @endif

        $(document).ready(function () {
            $('a[href="#personal-info"]').click(function (event) {
                if ($(this).hasClass('disabled')) {
                    return false;
                }
            });

            $('a[href="#payment"]').click(function (event) {
                if ($(this).hasClass('disabled')) {
                    return false;
                }
            });

            $('a[href="#thank-you"]').click(function (event) {
                if ($(this).hasClass('disabled')) {
                    return false;
                }
            });

            $('#accept').change(function () {
                if ($(this).prop('checked')) {
                    var checkin = $('#booking-checkin').val();
                    var checkout = $('#booking-checkout').val();
                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();
                    var email1 = $('#email1').val();
                    var email2 = $('#email2').val();
                    var phone = $('#phone').val();
                    if (isText(checkin) && isText(checkout) && isText(firstname) && isText(lastname) && isEmail(email1) && isEmail(email2) && isSameEmail(email1, email2) && isPhone(phone)) {
                        $('a[href="#payment"]').removeClass("disabled");
                        $('#step2').removeClass("disabled");
                    } else {
                        $('#booking-checkin').change();
                        $('#booking-checkout').change();
                        $('#firstname').blur();
                        $('#lastname').blur();
                        $('#email1').blur();
                        $('#email2').blur();
                        $('#phone').blur();
                        $(this).prop('checked', false);
                    }

                } else {
                    $('a[href="#payment"]').addClass("disabled");
                    $('#step2').addClass("disabled");
                }
            });
            

                $('a[id="step1"]').on('shown.bs.tab', function (e) {
                    var target = $(e.target).attr("href") // activated tab
                    if(!isBooking)
                        selectRoom($(e.target).attr("rid"));
                    else
                        location.reload();
                });
                $('a[id="step3"]').on('shown.bs.tab', function (e) {
                    var target = $(e.target).attr("href") // activated tab
                    makeBooking();
                });

                $('a[id="step2"]').on('shown.bs.tab', function (e) {
                    var target = $(e.target).attr("href") // activated tab
                    userInfo();
                });
        });
       

        function selectRoom(roomId) {
            if (session_checkin != "")
                $('#booking-checkin').val(session_checkin);
            if (session_checkout != "")
                $('#booking-checkout').val(session_checkout);
            if (session_adult != "0") {
                $('#booking-adult select').val(session_adult);
                adultSelect.current = session_adult;
                adultSelect._changeOption();
            }
            if (session_child != "0") {
                $('#booking-child select').val(session_child);
                childSelect.current = session_child;
                childSelect._changeOption();
            }

            $.ajax({
                type: "POST",
                url: '{{URL(Session::get('lang').'/booking/select')}}',
                data: {roomId: roomId},
                success: function (data) {
                    if (data.success) {
                       
                        var room = data.room;
                        if(room != ""){
                            var assetBaseUrl = "{{ asset('') }}";
                            if(typeof room.image_url != 'undefined')
                            $('#booking-room-url').attr('src', assetBaseUrl + room.image_url);
                             if(typeof room.name != 'undefined')
                            $('#booking-room-url').attr('alt', room.name);
                             if(typeof room.name != 'undefined')
                            $('#booking-room-name').text(room.name);
                        }
                      

                        var booking = data.booking;
                        if(booking != ""){
                            if(typeof booking.check_in != 'undefined')
                            $('#booking-checkin-txt').text($.format.date(booking.check_in.date, "dd/MM/yyyy"));
                            if(typeof booking.checkout != 'undefined')
                            $('#booking-checkout-txt').text($.format.date(booking.check_out.date, "dd/MM/yyyy"));
                            if(typeof booking.adult != 'undefined')
                            $('#booking-adult-txt').text(booking.adult);
                            if(typeof booking.child != 'undefined')
                            $('#booking-child-txt').text(booking.child);
                            if(typeof booking.total_money != 'undefined')
                            $('#booking-total-txt').text(booking.total_money);
                        }    

                        var checkin = $('#booking-checkin').val();
                        var checkout = $('#booking-checkout').val();
                        var firstname = $('#firstname').val();
                        var lastname = $('#lastname').val();
                        var email1 = $('#email1').val();
                        var email2 = $('#email2').val();
                        var phone = $('#phone').val();
                        if (isText(checkin) && isText(checkout) && isText(firstname) && isText(lastname) && isEmail(email1) && isEmail(email2) && isSameEmail(email1, email2) && isPhone(phone)) {
                            $('a[href="#payment"]').removeClass("disabled");
                            $('#step2').removeClass("disabled");
                        }
                        ;
                    } else {
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
                      
                        var room = data.room[0];
                         if(room != ""){
                            var assetBaseUrl = "{{ asset('') }}";
                            $('#thank-you #booking-room-url').attr('src', assetBaseUrl + room.image_url);
                            $('#thank-you #booking-room-url').attr('alt', room.name);
                            $('#thank-you #booking-room-name').text(room.name);
                         }

                       var booking = data.booking;
                        if(booking != ""){
                            if(typeof booking.booking_id != 'undefined')
                                $('#thank-you #booking-id-txt').text(booking.booking_id);
                            if(typeof booking.check_in != 'undefined')
                                $('#thank-you #booking-checkin-txt').text($.format.date(booking.check_in.date, "dd/MM/yyyy"));
                            if(typeof booking.check_out != 'undefined')
                                $('#thank-you #booking-checkout-txt').text($.format.date(booking.check_out.date, "dd/MM/yyyy"));
                            if(typeof booking.adult != 'undefined')
                                $('#thank-you #booking-adult-txt').text(booking.adult);
                            if(typeof booking.child != 'undefined')
                                $('#thank-you #booking-child-txt').text(booking.child);
                            if(typeof booking.total_money != 'undefined')
                            if(typeof booking.full_name != 'undefined')
                                $('#thank-you #booking-name-txt').text(booking.full_name);
                            if(typeof booking.email != 'undefined')
                                $('#thank-you #booking-email-txt').text(booking.email);
                            if(typeof booking.phone != 'undefined')
                                $('#thank-you #booking-phone-txt').text(booking.phone);
                            if(typeof booking.total_money != 'undefined')
                                $('#thank-you #booking-total-txt').text(booking.total_money);
                        }

                        $('a[href="#personal-info"]:not("#step1")').addClass("disabled");    
                        $('a[href="#payment"]:not("#step2")').addClass("disabled");
                        isBooking = true;

                    } else {
                        window.location.href = '{{URL(Session::get('lang').'/booking')}}';
                        console.log(data)
                    }
                },
                error: function () {
                    window.location.href = '{{URL(Session::get('lang').'/booking')}}';
                }
            });
        }
        ;

        function userInfo() {
            var checkin = $('#booking-checkin').val();
            var checkout = $('#booking-checkout').val();
            var adult = $('#booking-adult').val();
            var child = $('#booking-child').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var email1 = $('#email1').val();
            var email2 = $('#email2').val();
            var phone = $('#phone').val();
            ;
            $.ajax({
                type: "POST",
                url: '{{URL(Session::get('lang').'/booking/userInfo')}}',
                data: {
                    checkin: checkin,
                    checkout: checkout,
                    adult: adult,
                    child: child,
                    firstname: firstname,
                    lastname: lastname,
                    email1: email1,
                    email2: email2,
                    phone: phone

                },
                success: function (data) {
                    if (data.success) {

                        var room = data.room;
                         if(room != ""){
                            var assetBaseUrl = "{{ asset('') }}";
                            $('#payment #booking-room-url').attr('src', assetBaseUrl + room.image_url);
                            $('#payment #booking-room-url').attr('alt', room.name);
                            $('#payment #booking-room-name').text(room.name);
                         }

                       var booking = data.booking;
                        if(booking != ""){
                            if(typeof booking.check_in != 'undefined')
                                $('#payment #booking-checkin-txt').text($.format.date(booking.check_in.date, "dd/MM/yyyy"));
                            if(typeof booking.check_out != 'undefined')
                                $('#payment #booking-checkout-txt').text($.format.date(booking.check_out.date, "dd/MM/yyyy"));
                            if(typeof booking.adult != 'undefined')
                                $('#payment #booking-adult-txt').text(booking.adult);
                            if(typeof booking.child != 'undefined')
                                $('#payment #booking-child-txt').text(booking.child);
                            if(typeof booking.total_money != 'undefined')
                                $('#payment #booking-total-txt').text(booking.total_money);
                        }    
                    } else {
                        window.location.href = '{{URL(Session::get('lang').'/booking')}}';
                    }
                },
                error: function () {
                    window.location.href = '{{URL(Session::get('lang').'/booking')}}';
                }
            });
        };
       
    </script>
@endsection

