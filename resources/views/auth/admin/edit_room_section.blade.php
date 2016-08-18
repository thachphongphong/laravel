@section('edit_room_section')
    <div role="tabpanel" class="tab-pane fade" id="edit_room">
        <h2 class="mg-sec-left-title">Sửa thông tin phòng</h2>

        <div class="form-group">
            <label for="language">Ngôn ngữ hiện thị</label>
            <label><input type="radio" name="r_lang_radio" class="r_lang_check" value="1" checked="">Tiếng Việt</label>
            <label><input type="radio" name="r_lang_radio" class="r_lang_check" value="2">Tiếng Anh</label>
        </div>
        <div class="mg-book-form-input" id="room_vi">
            <select class="cs-select cs-skin-elastic form-control"
                    id="r_combobox" name="r_combobox">
                <option value="" disabled selected>Chọn phòng</option>
                @foreach ($rooms as $room)
                    @if($room->language_id==1)
                        <option value="{{$room->id}}">{{$room->name}}</option>
                    @endif
                @endforeach
            </select>

        </div>
        <div class="mg-book-form-input" id="room_en" hidden>
            <select class="cs-select cs-skin-elastic form-control"
                    id="r_combobox_en" name="r_combobox_en">
                <option value="" disabled selected>Chọn phòng</option>
                @foreach ($rooms as $room)
                    @if($room->language_id==2)
                        <option value="{{$room->id}}">{{$room->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <form action="/new-post" method="post" id="f_edit_room" hidden>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="r_id" id="r_id">

            <h2>Thông tin chi tiết phòng</h2>

            <div class="form-group">
                <label for="r_name">Tên phòng</label>
                <input id="r_name" required="required" placeholder="Tên phòng" type="text" name="title" class="form-control"/>
            </div>
            {{--<div class="form-group">--}}
            {{--<label for="r_thumbnail">Hình ảnh đại diện</label>--}}
            <input id="r_image_url_thumbnail" placeholder="Hình ảnh đại diện" disabled type="hidden" name="r_image_url_thumbnail"/>
            {{--class="form-control"/>--}}
            {{--</div>--}}
            <div class="form-group">
                <label for="r_image_url">Hình ảnh phòng</label>
                <input id="r_image_url" placeholder="Hình ảnh phòng" hidden disabled type="text" name="r_image_url"/>
                <img height="auto" width="auto" id="r_image_url_src">
                <input id="btn-upload-image" type="button" name="btn-upload-image"
                       class="btn btn-primary" value="upload"/>
            </div>
            <div class="form-group">
                <label for="r_description">Mô tả phòng</label>
                <textarea id="r_description" name='r_description' placeholder="Mô tả phòng" class="form-control"
                          style="height:100px;"></textarea>
            </div>
            <div class="form-group">
                <label for="r_total_room">Tổng số phòng</label>
                <input id="r_total_room" required="required" placeholder="Tổng số phòng" type="number" min="1" name="r_total_room"
                       oninput="validity.valid||(value='1');"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="r_total_person">Số lượng người</label>
                <input id="r_total_person" required="required" placeholder="Số lượng người" type="number" min="1"
                       name="r_total_person"
                       oninput="validity.valid||(value='1');"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="r_price">Giá phòng</label>
                <input id="r_price" required="required" placeholder="Giá phòng" type="number" name="r_price" min="1"
                       oninput="validity.valid||(value='1');"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="r_f_price">Giá cho người nước ngoài</label>
                <input id="r_f_price" required="required" placeholder="Giá cho người nước ngoài" type="number" min="1"
                       name="r_f_price"
                       oninput="validity.valid||(value='1');"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="r_rate">Đánh giá</label>
                <input id="r_rate" required="required" placeholder="Đánh giá" type="number" min="1" oninput="validity.valid||
                (value='1');" name="r_rate" class="form-control"/>
            </div>

            <div class="form-group">
                <div class="alert alert-success alert-dismissible hidden_alert" role="alert"
                     id="r_message_ok">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i>Chỉnh sửa phòng thành công!
                </div>
                <div class="alert alert-danger alert-dismissible hidden_alert" role="alert"
                     id="r_message_fail">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <i class="fa fa-question-circle"></i>Thêm tin tức không thành công!
                </div>
                <div class="alert alert-danger alert-dismissible hidden_alert" role="alert"
                     id="r_message_validate">
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span--}}
                    {{--aria-hidden="true">&times;</span></button>--}}
                    <i class="fa fa-question-circle"></i><label id="r_validate_mess">Thông tin input không đúng</label>
                </div>
            </div>
            <div class="form-group">
                <input type="button" id='btn-r-save' name='btn-r-edit' class="btn btn-success right" value="Sửa phòng"/>
                <input type="button" id='btn-r-cancel' name='btn-r-cancel' class="btn btn-default right" value="Hủy bỏ"/>
            </div>
        </form>
    </div>
@show