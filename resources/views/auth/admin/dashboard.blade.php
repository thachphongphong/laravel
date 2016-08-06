@extends('layouts.app')
@section('content')
    <div class="mg-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mg-tab-left-nav mb80">

                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home4" aria-controls="home4" role="tab" data-toggle="tab">
                                    <i class="fa fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#contact" aria-controls="profile4" role="tab" data-toggle="tab">
                                    <i class="fa fa-user"></i>
                                    Liên Hệ
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#introdute" aria-controls="introdute4" role="tab" data-toggle="tab">
                                    <i class="fa fa-info"></i>
                                    Giới Thiệu
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#article" aria-controls="messages4" role="tab" data-toggle="tab">
                                    <i class="fa fa-pencil"></i>
                                    Tin tức
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#settings4" aria-controls="settings4" role="tab" data-toggle="tab">
                                    <i class="fa fa-cogs"></i>
                                    Book phòng
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home4">
                                <h1>Trang quản trị hệ thống khách sạn Pearl Sea</h1>
                            </div>
                             @include('auth.admin.contact_section')
                             @include('auth.admin.intro_section')
                            <div role="tabpanel" class="tab-pane fade" id="messages4">
                                Tin tức
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="settings4">
                                Đặt phòng
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
       var DASH_BOARD_URL = '{{URL('vi/admin/dashboard')}}';
    </script>
@endsection
