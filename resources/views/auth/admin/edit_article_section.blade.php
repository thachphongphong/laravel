<h2 class="mg-sec-left-title">Cập nhật tin tức</h2>
<form action="/new-post" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="e_news_id" name="e_news_id">

    <div class="form-group">
        <input id="e_news_title" required="required"  placeholder="Tiêu đề tin tức" type="text"
               name=
               "title" class="form-control"/>
        <input id="e_news_image_url" placeholder="Link hình ảnh đại diện" type="text" name=
        "e_image_url" class="form-control"/>

    </div>
    <div class="form-group">
                  <textarea id="e_news_introtext" name='e_introtext' placeholder="Tóm tắt nội dung(200 từ)" class="form-control"
                            style="height:100px;"></textarea>
    </div>
    <div class="form-group">
        <label for="language">Ngôn ngữ hiện thị</label>
        <label><input type="radio" name="e_lang_radio" class="e_lang_check" value="1">Tiếng Việt</label>
        <label><input type="radio" name="e_lang_radio" class="e_lang_check" value="2">Tiếng Anh</label>
    </div>
    <div class="form-group">
        <select class="cs-select cs-skin-elastic form-control"
                id="e_news_hash_tag" name="e_news_hash_tag">
            <option value="" disabled selected>Chọn danh mục tin</option>
            <option value="tintuc">Tin tức</option>
            <option value="thongtindulich">Thông tin du lịch</option>
            <option value="amthuc">Ẩm thực</option>
        </select>

    </div>
    <div class="form-group">
        <label for="article_body">Nội dung tin tức</label>
                <textarea id="e_news_article_body" name='e_news_article_body' class="mceEditor" style="height: 400px;"></textarea>
    </div>
    <div class="form-group">
        <div class="alert alert-danger alert-dismissible hidden_alert" role="alert"
             id="e_news_message_validate">
            {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span--}}
            {{--aria-hidden="true">&times;</span></button>--}}
            <i class="fa fa-question-circle"></i><label id="e_validate_mess">Thông tin input không đúng</label>
        </div>
    </div>
</form>

