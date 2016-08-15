@section('header_section')
    <header class="header transp sticky"> <!-- available class for header: .sticky .center-content .transp -->
        <nav class="navbar navbar-inverse">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img id="logo1" src="{{asset('images/logo.png')}}" alt="logo">
                        <img id="logo2" src="{{asset('images/logo-s.png')}}" alt="logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @foreach ($menus as $menu)
                            @if(count($menu->submenus))
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                       aria-expanded="false">{{$menu->name}} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach ($menu->submenus as $sub)
                                            <li><a href="{{asset($sub ->url)}}">{{$sub->name}} </a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li><a href="{{asset($menu ->url)}}">{{$menu ->name}}</a></li>
                            @endif
                        @endforeach

                    </ul>
                </div>
                <!-- /.navbar-collapse   
                <div class="mg-search-box-cont pull-right">
                    <a href="#" class="mg-search-box-trigger"><i class="fa fa-search"></i></a>                    
                    <div class="mg-search-box">
                        <form>
                            <input type="text" name="s" class="form-control" placeholder="Type Keyword...">
                            <button type="submit" class="btn btn-main"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
               -->
               
                <div class="mg-search-box-cont pull-right">
                     <a href="#" class="mg-lang-box-trigger"><i class="fa fa-lang"></i></a>
                    <div class="mg-lang-box">
                        <a href="{{ url('/vi/home') }}"><img src="{{asset('images/flag-vi.jpg')}}" alt="VI"></a>
                        <a href="{{ url('/en/home') }}"><img src="{{asset('images/flag-en.jpg')}}" alt="EN"></a>
                    </div>
                 </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
@show
