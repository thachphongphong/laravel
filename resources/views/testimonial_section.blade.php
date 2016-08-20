@section('testimonial_section')
     <div class="mg-testi-partners parallax">
        <div class="container">
                <div class="mb50">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mg-sec-title">
                                    <h2 style="color: #fff;">{{$constants['testimonial']['tour']}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        @foreach ($tours as $tour)
                            <div class="col-sm-4">
                                <div class="mg-team-member">
                                    <figure>
                                        <img width="480" src="{{asset($tour->imageUrl)}}" alt="{{$tour->id}}" class="img-responsive center-block">
                                    </figure>
                                    <div class="mg-team-member-overlayer"></div>
                                    <div class="mg-team-info">
                                        <h3>{{$tour->arrival}}</h3>
                                        <strong>{{$tour->duration}}</strong>
                                        <p>{{$tour->note}}</p>
                                        <span><a href="javascript:void(0)"><i class="fa fa-tag">{{$constants['testimonial']['departure']}} : {{$tour->departure}}</i></a></span>
                                        <span><a href="javascript:void(0)"><i class="fa fa-tag">{{$constants['testimonial']['price']}} : {{$tour->price}}VND</i></a></span>
                                        
                                    </div>
                                </div>
                            </div>
                          @endforeach    
                            
                        </div>
                    </div>
                </div>

            </div>
    </div>
@show
