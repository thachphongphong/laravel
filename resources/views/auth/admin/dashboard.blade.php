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
                                <a href="#introduce" aria-controls="introduce" role="tab" data-toggle="tab">
                                    <i class="fa fa-info"></i>
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
                                <a href="#edit_room" aria-controls="edit_room" role="tab" data-toggle="tab">
                                    <i class="fa fa-cogs"></i>
                                    Sửa phòng
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home4">
                                <h1>Trang quản trị hệ thống khách sạn Pearl Sea</h1>
                            </div>
                            @include('auth.admin.intro_section')
                            @include('auth.admin.article_section')
                            @include('auth.admin.upload')
                            @include('auth.admin.edit_room_section')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var DASH_BOARD_URL = '{{URL('vi/admin/dashboard')}}';
        var assetBaseUrl = "{{ asset('') }}";
    </script>
@endsection
