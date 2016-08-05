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
                            <div role="tabpanel" class="tab-pane fade" id="contact">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="mg-sec-left-title">Thông tin liên hệ</h2>
                                        <input type="button" id="contact_vi" class="btn btn-danger"
                                               value="Tiếng Việt">

                                        <input type="button" id="contact_en" class="btn btn-primary"
                                               value="Tiếng Anh">

                                        <form class="clearfix">
                                            <div class="mg-contact-form-input" style="display:none">
                                                <input type="text" class="form-control" id="contact_id"
                                                       disabled value="{{$contact->id}}">
                                            </div>
                                            <div class="mg-contact-form-input">
                                                <label for="email">Tên hiển thị</label>
                                                <input type="text" class="form-control" id="name" value="{{$contact->name}}">
                                            </div>
                                            <div class="mg-contact-form-input">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" value="{{$contact->email_to}}">
                                            </div>
                                            <div class="mg-contact-form-input">
                                                <label for="telephone">Điện thoại</label>
                                                <input type="text" class="form-control" id="telephone"
                                                       value=" {{$contact->telephone}}">
                                            </div>
                                            <div class="mg-contact-form-input">
                                                <label for="phone">Di động</label>
                                                <input type="text" class="form-control" id="phone" value="{{$contact->phone}}">
                                            </div>
                                            <div class="mg-contact-form-input">
                                                <label for="content">Địa chỉ</label>
                                                <textarea class="form-control" id="address"
                                                          rows="5">{{$contact->address}}</textarea>
                                            </div>

                                                <div class="col-md-6">
                                                    <div class="alert alert-success alert-dismissible hidden_alert" role="alert"
                                                         id="contact_message_ok">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        <i class="fa fa-check-circle"></i>Cập nhật thông tin liên hệ thành công
                                                    </div>
                                                    <div class="alert alert-danger alert-dismissible hidden_alert" role="alert"
                                                        id="contact_message_fail">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        <i class="fa fa-question-circle"></i> <strong>Cập nhật thông tin liên hệ không
                                                            thành công
                                                    </div>

                                            </div>
                                            <input type="button" id="update-contact-btn" class="btn btn-dark-main pull-right"
                                                   value="Cập nhật thông tin liên hệ">
                                        </form>
                                    </div>
                                </div>
                            </div>
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
        $(document).ready(function () {
            $('#update-contact-btn').click(function () {
                updateContact();

            });
            $('#contact_vi').click(function () {
                loadContact('vi');
            });
            $('#contact_en').click(function () {
                loadContact('en');

            });
            function updateContact() {
                var id = $('#contact_id').val();
                var name = $('#name').val();
                var email = $('#email').val();
                var telephone = $('#telephone').val();
                var phone = $('#phone').val();
                var address = $('#address').val();
                $.ajax({
                    type: "POST",
                    url: '{{URL('vi/admin/dashboard/updateContact')}}',
                    data: {
                        id: id,
                        name: name,
                        email: email,
                        telephone: telephone,
                        phone: phone,
                        address: address
                    },
                    success: function (data) {
                        if (data.success) {
                            $('#contact_message_ok').removeClass('hidden_alert');
                        } else {
                            $('#contact_message_fail').removeClass('hidden_alert');
                        }
                    },
                    error: function () {
                        window.location.href = '{{URL(Session::get('lang').'/booking')}}';
                    }
                });
            }

            function loadContact(language) {
                var url = '{{URL('vi/admin/dashboard/contact')}}/' + language;
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (data) {
                        if (data.success) {
                            $('#contact_id').val(data.data.id);
                            $('#name').val(data.data.name);
                            $('#email').val(data.data.email_to);
                            $('#telephone').val(data.data.telephone);
                            $('#phone').val(data.data.phone);
                            $('#address').val(data.data.address);
                        } else {
                            alert('fail');
                        }
                    },
                    error: function () {
                        window.location.href = '{{URL(Session::get('lang').'/booking')}}';
                    }
                });
            }

        })
    </script>
@endsection
