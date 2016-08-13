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
                                <a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">
                                    <i class="fa fa-info"></i>
                                    Liên Hệ
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#introduce" aria-controls="introduce" role="tab" data-toggle="tab">
                                    <i class="fa fa-hotel"></i>
                                    Giới Thiệu
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#article" aria-controls="article" role="tab" data-toggle="tab">
                                    <i class="fa fa-pencil"></i>
                                    Tin tức
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#upload" aria-controls="upload" role="tab" data-toggle="tab">
                                    <i class="fa fa-cogs"></i>
                                    Upload
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#settings4" aria-controls="settings4" role="tab" data-toggle="tab">
                                    <i class="fa fa-cogs"></i>
                                    Book phòng
                                </a>
                            </li>
                             <li role="presentation">
                                <a href="#booking" aria-controls="booking" role="tab" data-toggle="tab">
                                    <i class="fa fa-list-ul"></i>
                                    Booking
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home4">
                                <h1>Trang quản trị hệ thống khách sạn Pearl Sea</h1>
                            </div>
                            @include('auth.admin.contact_section')
                            <div role="tabpanel" class="tab-pane fade" id="introduce">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="mg-sec-left-title">Giới thiệu</h2>
                                        <input type="button" id="info_vi" class="btn btn-danger"
                                               value="Tiếng Việt">

                                        <input type="button" id="info_en" class="btn btn-primary"
                                               value="Tiếng Anh">

                                        <div id="intro-content"></div>
                                    </div>
                                </div>
                            </div>
                            @include('auth.admin.article_section')
                            @include('auth.admin.upload')
                            <div role="tabpanel" class="tab-pane fade" id="settings4">

                            </div>
                            @include('auth.admin.booking')
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
