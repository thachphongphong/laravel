@extends('master')
@section('content_section')
    @include('title_section')
    <div class="mg-about-features">
        <div class="container">
            <div class="row">
                @foreach ($abouts as $ab)
                    <div class="row">
                        <div class="col-md-12">
                            <p>{!! nl2br(e($ab ->content)) !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        @if ($ab ->image_url != "" && is_array(explode(',', $ab ->image_url)))
                            @if (count(explode(',', $ab ->image_url)) == 2)
                                @foreach( explode(',', $ab ->image_url) as $url)
                                    <div class="col-sm-6">
                                        <figure class="mg-room mg-room-col-2">
                                            <img src=" {{asset($url)}}" alt="pearl sea hotel" class="img-responsive center-block">
                                        </figure>
                                    </div>
                                @endforeach
                            @elseif (count(explode(',', $ab ->image_url)) == 3)
                                @foreach( explode(',', $ab ->image_url) as $url)
                                    <div class="col-sm-4">
                                        <figure class="mg-room">
                                            <img src=" {{asset($url)}}" alt="pearl sea hotel" class="img-responsive center-block">
                                        </figure>
                                    </div>
                                @endforeach
                            @elseif (count(explode(',', $ab ->image_url)) == 4)
                                @foreach( explode(',', $ab ->image_url) as $url)
                                    <div class="col-sm-3">
                                        <figure class="mg-room mg-room-col-4">
                                            <img src=" {{asset($url)}}" alt="pearl sea hotel" class="img-responsive center-block">
                                        </figure>
                                    </div>
                                @endforeach
                            @elseif(count(explode(',', $ab ->image_url)) == 1)
                                <div class="col-xs-12">
                                        <img src=" {{asset($ab ->image_url)}}" alt="pearl sea hotel" class="img-responsive center-block">
                                </div>
                            @endif
                        @endif
                    </div>
                    <hr/>
                @endforeach
                {{--  <div class="col-sm-4">
                      <div class="mg-feature">
                          <div class="mg-feature-icon-title">
                              <i class="fp-ht-maid"></i>
                              <h3>Room service</h3>
                          </div>
                          <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua dolorum.</p>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="mg-feature">
                          <div class="mg-feature-icon-title">
                              <i class="fp-ht-computer"></i>
                              <h3>Wi-fi service</h3>
                          </div>
                          <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua dolorum.</p>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="mg-feature">
                          <div class="mg-feature-icon-title">
                              <i class="fp-ht-parking"></i>
                              <h3>Free Parking</h3>
                          </div>
                          <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua dolorum.</p>
                      </div>
                  </div>--}}
            </div>
        </div>
    </div>
@endsection