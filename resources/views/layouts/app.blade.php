<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta id="token" name="token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('/images/favicon.ico') }}">
    <title>PEARL SEA HOTEL ADMINISTRATION</title>

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
    <link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('/js/respond.min.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('/js/modernizr.custom.min.js') }}"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('vi/home') }}">Trang chính</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (!Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('vi/admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield('content')

@if (Auth::guest())
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
{{--<script src="http://maps.google.com/maps/api/js?sensor=true') }}"></script>--}}
<script src="{{ asset('/js/gmaps.min.js') }}"></script>
<script src="{{ asset('/js/jquery.parallax-1.1.3.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="{{ asset('/js/validate.js') }}"></script>


@else
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/dashboard/dashboard.js') }}"></script>
<script src="{{ asset('/js/dashboard/about.js') }}"></script>
<script src="{{ asset('/js/dashboard/contact.js') }}"></script>
<script src="{{ asset('/js/dashboard/uploadImage.js') }}"></script>
<script src="{{ asset('/js/dashboard/dialog_handel.js') }}"></script>
<script src="{{ asset('/js/dashboard/news.js') }}"></script>
<script src="{{ asset('/js/dashboard/room.js') }}"></script>
<script src="{{ asset('/js/waitingForDialog.js') }}"></script>
<script src="{{ asset('/js/dashboard/booking.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
@endif

</body>

</html>