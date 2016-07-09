<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.cantothemes.com/html/mega/v1.1/fullwidth/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 09:32:17 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pearl sea hotel</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
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
<header class="header transp sticky"> <!-- available class for header: .sticky .center-content .transp -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @foreach ($menus as $menu)
                       @if(count($menu->submenus))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$menu->name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($menu->submenus as $sub)
                                        <li><a href="{{$sub ->url}}">{{$sub->name}} </a></li>
                                    @endforeach
                                </ul>
                            </li>
                         @else
                             <li><a href="{{$menu ->url}}">{{$menu ->name}}</a></li>
                         @endif
                   @endforeach
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="mg-search-box-cont pull-right">
                <a href="#" class="mg-search-box-trigger"><i class="fa fa-search"></i></a>
                <div class="mg-search-box">
                    <form>
                        <input type="text" name="s" class="form-control" placeholder="Type Keyword...">
                        <button type="submit" class="btn btn-main"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
</header>


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

<div class="mg-book-now">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="mg-bn-title">Search Rooms <span class="mg-bn-big">For rates & availability</span></h2>
            </div>
            <div class="col-md-9">
                <div class="mg-bn-forms">
                    <form>
                        <div class="row">
                            <div class="col-md-3 col-xs-6">
                                <div class="input-group date mg-check-in">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Check In">
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <div class="input-group date mg-check-out">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Check Out">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <select class="cs-select cs-skin-elastic">
                                            <option value="" disabled selected>Adult</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <select class="cs-select cs-skin-elastic">
                                            <option value="" disabled selected>Child</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-main btn-block">Check Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mg-best-rooms">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mg-sec-title">
                    <h2>Our Best Rooms</h2>
                    <p>These best rooms chosen by our customers</p>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <figure class="mg-room">
                            <img src="images/room-1.png" alt="img11" class="img-responsive">
                            <figcaption>
                                <h2>Super Deluxe</h2>
                                <div class="mg-room-rating"><i class="fa fa-star"></i> 5.00</div>
                                <div class="mg-room-price">$249<sup>.99/Night</sup></div>
                                <p>adversantur probatum iudicante indicaverunt repugnantibus.</p>
                                <a href="#" class="btn btn-link">View Details <i class="fa fa-angle-double-right"></i></a>
                                <a href="#" class="btn btn-main">Book</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-sm-4">
                        <figure class="mg-room">
                            <img src="images/room-2.png" alt="img11" class="img-responsive">
                            <figcaption>
                                <h2>Super Deluxe</h2>
                                <div class="mg-room-rating"><i class="fa fa-star"></i> 5.00</div>
                                <div class="mg-room-price">$249<sup>.99/Night</sup></div>
                                <p>adversantur probatum iudicante indicaverunt repugnantibus.</p>
                                <a href="#" class="btn btn-link">View Details <i class="fa fa-angle-double-right"></i></a>
                                <a href="#" class="btn btn-main">Book</a>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-sm-4">
                        <figure class="mg-room">
                            <img src="images/room-3.png" alt="img11" class="img-responsive">
                            <figcaption>
                                <h2>Super Deluxe</h2>
                                <div class="mg-room-rating"><i class="fa fa-star"></i> 5.00</div>
                                <div class="mg-room-price">$249<sup>.99/Night</sup></div>
                                <p>adversantur probatum iudicante indicaverunt repugnantibus.</p>
                                <a href="#" class="btn btn-link">View Details <i class="fa fa-angle-double-right"></i></a>
                                <a href="#" class="btn btn-main">Book</a>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
</div> -->
<div class="mg-about parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2 class="mg-sec-left-title">About Mega Hotel</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliqua venandi mutat plerisque nostrum vos, geometria intellegimus percurri mediocritatem aeque suppetet explicatis, praeclaram ambigua cogitavisse vituperatoribus dicent signiferumque alios improbe, reliquisti rudem, consedit pendet circumcisaque amorem patria magnopere inmortalibus dolere. Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua dolorum crudelis exercitumque, nobis, videntur doloribus patre poetarum omnisque cognitionem primum, atomos certamen possent, adversantur probatum iudicante indicaverunt repugnantibus, operis aequi aequitate clarorum occultarum multa diis sine inter.</p>
            </div>
            <div class="col-md-5">
                <div class="video-responsive">
                    <iframe src="https://player.vimeo.com/video/134008155" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mg-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mg-sec-title">
                    <h2>Hotel facilties</h2>
                    <p>These best rooms chosen by our customers</p>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mg-feature">
                            <div class="mg-feature-icon-title">
                                <i class="fp-ht-receptionist"></i>
                                <h3>24-hour reception</h3>
                            </div>
                            <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua dolorum.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mg-feature">
                            <div class="mg-feature-icon-title">
                                <i class="fa fa-cogs"></i>
                                <h3>Room service</h3>
                            </div>
                            <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua dolorum.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mg-feature">
                            <div class="mg-feature-icon-title">
                                <i class="fa fa-car"></i>
                                <h3>Car hire</h3>
                            </div>
                            <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua dolorum.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mg-feature">
                            <div class="mg-feature-icon-title">
                                <i class="fa fa-phone"></i>
                                <h3>Wake-up call</h3>
                            </div>
                            <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua dolorum.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mg-feature">
                            <div class="mg-feature-icon-title">
                                <i class="fa fa-coffee"></i>
                                <h3>Coffee and tea</h3>
                            </div>
                            <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua dolorum.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mg-feature">
                            <div class="mg-feature-icon-title">
                                <i class="fa fa-cogs"></i>
                                <h3>Free Wi-Fi</h3>
                            </div>
                            <p>Didicisset labore vitium referenda labor peccant integre turpe est tantopere, eius defuturum sua dolorum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mg-testi-partners parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mg-sec-left-title">Testimonial</h2>
                <div class="mg-testimonial-slider" id="mg-testimonial-slider">
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consumeret terminatas oritur euripidis satis. Venisset ipsum.</p>
                        <footer>John Doe, Example Inc</footer>
                    </blockquote>
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sol magnum gustare pararetur statuam, morbi patriam omittantur.</p>
                        <footer>John Doe, Example Inc</footer>
                    </blockquote>
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Stabilem monet, petat excepturi nudus expeteremus fabellas vexetur.</p>
                        <footer>John Doe, Example Inc</footer>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="mg-sec-left-title">Our Partners</h2>
                <ul class="mg-part-logos" id="mg-part-logos">
                    <li><img src="images/part-logo-1.png" alt="Partner Logo"></li>
                    <li><img src="images/part-logo-2.png" alt="Partner Logo"></li>
                    <li><img src="images/part-logo-3.png" alt="Partner Logo"></li>
                    <li><img src="images/part-logo-1.png" alt="Partner Logo"></li>
                    <li><img src="images/part-logo-3.png" alt="Partner Logo"></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="mg-news-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h2 class="mg-sec-left-title">Recent News</h2>
                <ul class="mg-recnt-posts">
                    <li>
                        <div class="mg-recnt-post">
                            <div class="mg-rp-date">27 <div class="mg-rp-month">may</div></div>
                            <h3><a href="#">A Standard Blog Post</a></h3>
                            <p>Nostram virtutem poterimus quoddam praesertim legendos libero exhorrescere saluti...</p>
                        </div>
                    </li>
                    <li>
                        <div class="mg-recnt-post">
                            <div class="mg-rp-date">27 <div class="mg-rp-month">may</div></div>
                            <h3><a href="#">A Standard Blog Post</a></h3>
                            <p>Nostram virtutem poterimus quoddam praesertim legendos libero exhorrescere saluti...</p>
                        </div>
                    </li>
                    <li>
                        <div class="mg-recnt-post">
                            <div class="mg-rp-date">27 <div class="mg-rp-month">may</div></div>
                            <h3><a href="#">A Standard Blog Post</a></h3>
                            <p>Nostram virtutem poterimus quoddam praesertim legendos libero exhorrescere saluti...</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-7">
                <h2 class="mg-sec-left-title">Our Gallery</h2>

                <div class="mg-gallery-container">
                    <ul class="mg-gallery" id="mg-gallery">
                        <li><img src="images/gallery-01.png" alt="Partner Logo"></li>
                        <li><img src="images/gallery-02.png" alt="Partner Logo"></li>
                        <li><img src="images/gallery-05.png" alt="Partner Logo"></li>
                        <li><img src="images/gallery-06.png" alt="Partner Logo"></li>
                        <li><img src="images/gallery-07.png" alt="Partner Logo"></li>
                        <li><img src="images/gallery-08.png" alt="Partner Logo"></li>
                    </ul>
                    <ul class="mg-gallery-thumb" id="mg-gallery-thumb">
                        <li><img src="images/gallery-thumb-01.png" alt="Partner Logo"></li>
                        <li><img src="images/gallery-thumb-02.png" alt="Partner Logo"></li>
                        <li><img src="images/gallery-thumb-05.png" alt="Partner Logo"></li>
                        <li><img src="images/gallery-thumb-06.png" alt="Partner Logo"></li>
                        <li><img src="images/gallery-thumb-07.png" alt="Partner Logo"></li>
                        <li><img src="images/gallery-thumb-08.png" alt="Partner Logo"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="mg-footer">
    <div class="mg-footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h2 class="mg-widget-title">Contact US</h2>
                        <address>
                            <strong>Envato</strong><br>
                            Level 13, 2 Elizabeth St, Melbourne<br>
                            Victoria 3000 Australia
                        </address>

                        <p>
                            +000-123-456-789<br>
                            +000-123-456-789
                        </p>

                        <p>
                            <a href="mailto:#">example@example.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h2 class="mg-widget-title">Instagram</h2>
                        <ul class="mg-instagram">
                            <li><a href="#"><img src="images/ins-01.png" alt=""></a></li>
                            <li><a href="#"><img src="images/ins-02.png" alt=""></a></li>
                            <li><a href="#"><img src="images/ins-03.png" alt=""></a></li>
                            <li><a href="#"><img src="images/ins-04.png" alt=""></a></li>
                            <li><a href="#"><img src="images/ins-05.png" alt=""></a></li>
                            <li><a href="#"><img src="images/ins-06.png" alt=""></a></li>
                            <li><a href="#"><img src="images/ins-07.png" alt=""></a></li>
                            <li><a href="#"><img src="images/ins-08.png" alt=""></a></li>
                            <li><a href="#"><img src="images/ins-09.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h2 class="mg-widget-title">Newsletter</h2>
                        <p>Inbecilloque elegans errorem concedo coniuncta arare dicant etsi electram minimum.</p>
                        <form>
                            <p>
                                <input type="email" class="form-control" placeholder="Your Email">
                            </p>
                            <input type="submit" class="btn btn-main" value="Subscribe">
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h2 class="mg-widget-title">Social Media</h2>
                        <p>Tibi alienus possimus nomini legendus pariatur, logikh assidua philosophis expectat occultarum accedit suscipit interrogari difficilius reddidisti.</p>
                        <ul class="mg-footer-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mg-copyright">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <ul class="mg-footer-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Rooms</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <p>&copy; 2015 <a href="http://www.cantothemes.com/">CantoThemes</a>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

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