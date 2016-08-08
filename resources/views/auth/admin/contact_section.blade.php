@section('contact_section')
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
                            <i class="fa fa-question-circle"></i>Cập nhật thông tin liên hệ không
                                thành công
                        </div>

                </div>
                <input type="button" id="update-contact-btn" class="btn btn-dark-main pull-right"
                       value="Cập nhật thông tin liên hệ">
            </form>
        </div>
    </div>
</div>
@show