@extends('layouts.app')
@section('content')
    <div>
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
                                    Thêm tin tức
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#list_article" aria-controls="list_article" role="tab" data-toggle="tab">
                                    <i class="fa fa-pencil"></i>
                                    Quản lí tin
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#edit_room" aria-controls="edit_room" role="tab" data-toggle="tab">
                                    <i class="fa fa-cogs"></i>
                                    Sửa phòng
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#list_bookings" aria-controls="booking" role="tab" data-toggle="tab">
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
                                        <div class="form-group">
                                            <label for="language">Ngôn ngữ hiện thị</label>
                                            <label><input type="radio" name="a_lang_radio" value="1" checked="">Tiếng Việt</label>
                                            <label><input type="radio" name="a_lang_radio" value="2">Tiếng Anh</label>
                                        </div>
                                        <div id="intro-content"></div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="list_article">
                                <h2 class="mg-sec-left-title">Danh sách tin</h2>
                               <div id="list_news"></div>
                            </div>

                            @include('auth.admin.article_section')
                            @include('auth.admin.edit_room_section')
                            {{--@include('auth.admin.booking')--}}
                            <div role="tabpanel" class="tab-pane fade" id="list_bookings">
                                <h2 class="mg-sec-left-title">Danh sách tin</h2>
                                <div id="list_bookings"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="dialog-message" title="Thông báo">
            <p id="msg_content"></p>
        </div>
        <div id="dialog-confirm" title="Xóa">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Bạn có muốn xóa hay
                không?</p>
        </div>
    </div>
    <script type="text/javascript">
        var DASH_BOARD_URL = '{{URL('vi/admin/dashboard')}}';
        var assetBaseUrl = "{{ asset('') }}";
    </script>
    <div id="div_upload_image" title="Upload hình ảnh">
        <form name="upload_image" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <fieldset>
                <label for="image">Chọn hình ảnh cần upload</label>
                <input type="file" name="image" class="btn btn-primary ui-widget-content ui-corner-all">
                <input type="text" id="filePath" name="filePath" class="text ui-widget-content ui-corner-all" value=""
                       hidden>
                <input type="hidden" id="typeName" name="typeName" value="">
                <!-- Allow form submission with keyboard without duplicating the dialog button -->
                <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </fieldset>
        </form>
    </div>
@endsection
