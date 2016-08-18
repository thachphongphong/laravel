@section('article_section')
    <div role="tabpanel" class="tab-pane fade" id="article">
        <h2 class="mg-sec-left-title">Thêm tin tức</h2>

        <form action="/new-post" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <input id="news_title" required="required" value="{{ old('title') }}" placeholder="Tiêu đề tin tức" type="text"
                       name=
                       "title" class="form-control"/>
                <input id="news_image_url" value="{{ old('image_url') }}" placeholder="Link hình ảnh đại diện" type="text" name=
                "image_url" class="form-control"/>

            </div>
            <div class="form-group">
                  <textarea id="news_introtext" name='introtext' placeholder="Tóm tắt nội dung(200 từ)" class="form-control"
                            style="height:100px;">{{ old('body')}}</textarea>
            </div>
            <div class="form-group">
                <label for="language">Ngôn ngữ hiện thị</label>
                <label><input type="radio" name="lang_radio" class="lang_check" value="1" checked="">Tiếng Việt</label>
                <label><input type="radio" name="lang_radio" class="lang_check" value="2">Tiếng Anh</label>
            </div>
            <div class="form-group">
                {{--<input id="news_hash_tag" required="required" value="{{ old('tag') }}" placeholder="Hashtag" type="text" name=--}}
                {{--"hashtag" class="form-control"/>--}}

                <select class="cs-select cs-skin-elastic form-control"
                        id="news_hash_tag" name="news_hash_tag">
                    <option value="tintuc" disabled selected>Chọn danh mục tin</option>
                    <option value="tintuc">Tin tức</option>
                    <option value="thongtindulich">Thông tin du lịch</option>
                    <option value="amthuc">Ẩm thực</option>
                </select>

            </div>
            <div class="form-group">
                <label for="article_body">Nội dung tin tức</label>
                <textarea id="news_article_body" name='news_article_body' class="mceEditor" style="height: 400px;">{{ old('body')
                }}</textarea>
            </div>
            <div class="form-group">
                <div class="alert alert-success alert-dismissible hidden_alert" role="alert"
                     id="news_message_ok">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i>Thêm tin tức thành công!
                </div>
                <div class="alert alert-danger alert-dismissible hidden_alert" role="alert"
                     id="news_message_fail">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <i class="fa fa-question-circle"></i>Thêm tin tức không thành công!
                </div>
                <div class="alert alert-danger alert-dismissible hidden_alert" role="alert"
                     id="news_message_validate">
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span--}}
                    {{--aria-hidden="true">&times;</span></button>--}}
                    <i class="fa fa-question-circle"></i><label id="validate_mess">Thông tin input không đúng</label>
                </div>
            </div>
            <div class="form-group">
                <input type="button" id='btn-publish' name='btn-publish' class="btn btn-success right" value="Thêm tin"/>
                <input type="button" id='btn-cancel' name='btn-cancel' class="btn btn-default right" value="Hủy bỏ"/>
            </div>
        </form>
    </div>
@show