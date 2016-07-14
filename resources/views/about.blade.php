@extends('master')
@section('content_section')
    <div class="mg-about-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2> {{$abouts ->title}}</h2>
                    <img src="{{asset($abouts ->image_url)}}" alt="hotel image">
                    <p>{{$abouts ->content}}</p>
                    <hr/>
                </div>
                <div class="col-sm-4">
                    <div class="mg-feature">
                        <div class="mg-feature-icon-title">
                            <i class="fp-ht-maid"></i>

                            <h3>Room service</h3>
                        </div>
                        <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua
                            dolorum.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mg-feature">
                        <div class="mg-feature-icon-title">
                            <i class="fp-ht-computer"></i>

                            <h3>Wi-fi service</h3>
                        </div>
                        <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua
                            dolorum.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mg-feature">
                        <div class="mg-feature-icon-title">
                            <i class="fp-ht-parking"></i>

                            <h3>Free Parking</h3>
                        </div>
                        <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua
                            dolorum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection