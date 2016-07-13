<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.cantothemes.com/html/mega/v1.1/fullwidth/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 09:32:17 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pearl sea hotel</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Playfair+Display:400,400italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/cs-select.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/freepik.hotels.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('/js/respond.min.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('/js/modernizr.custom.min.js') }}"></script>
</head>
<body>
<div class="preloader"></div>

@extends('footer_section')
@extends('news_section')
@extends('testimonial_section')
@extends('hotel_facilities_section')
@extends('about_section')
@extends('best_room_section')
@extends('book_now_section')

<div id="mega-slider" class="carousel slide " data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#mega-slider" data-slide-to="0" class="active"></li>
        <li data-target="#mega-slider" data-slide-to="1"></li>
        <li data-target="#mega-slider" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @for ($i = 0; $i < count($sliders); $i++)
        <div class="item @if($i == 0)active beactive @endif">
            <img src="{{$sliders[$i]->image_url}}" alt="...">

            <div class="carousel-caption">
                <img src="images/stars.png" alt="">

                <h2>{{$sliders[$i]->h_info}}</h2>

                <p>{{$sliders[$i]->p_info}}</p>
            </div>
        </div>
        @endfor

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev">
    </a>
    <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next">
    </a>
</div>
@extends('header_section')
        <!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
</div> -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/js/jssor.slider.mini.js') }}"></script>
<script src="{{ asset('/js/classie.js') }}"></script>
<script src="{{ asset('/js/selectFx.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/js/starrr.min.js') }}"></script>
<script src="{{ asset('/js/nivo-lightbox.min.js') }}"></script>
<script src="{{ asset('/js/jquery.shuffle.min.js') }}"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true') }}"></script>
<script src="{{ asset('/js/gmaps.min.js') }}"></script>
<script src="{{ asset('/js/jquery.parallax-1.1.3.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
</body>

<!-- Mirrored from demo.cantothemes.com/html/mega/v1.1/fullwidth/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 09:34:43 GMT -->
</html>