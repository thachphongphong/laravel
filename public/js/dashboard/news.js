//news
function addNews() {
    var title = $('#news_title').val();
    var image_url = $('#news_image_url').val();
    var introtext = $('#news_introtext').val();
    var hash_tag = $('#news_hash_tag').val();
    var language = $('.lang_check:checked').val();
    var full_text = tinymce.get('news_article_body').getContent();

    if (title == "" || title == undefined || title == null) {
        $('#news_message_validate').removeClass('hidden_alert');
        $("#validate_mess").text("Hãy nhập tiêu đề tin tức");
        return;
    }
    if (introtext == "" || introtext == undefined || introtext == null) {
        $('#news_message_validate').removeClass('hidden_alert');
        $("#validate_mess").text("Hãy nhập tóm tắt nội dung tin tức");
        return;
    }
    if (full_text == "" || full_text == undefined || full_text == null || full_text.length < 8) {
        $('#news_message_validate').removeClass('hidden_alert');
        $("#validate_mess").text("Hãy nhập nội dung tin tức");
        return;
    }

    $.ajax({
        type: "POST",
        url: DASH_BOARD_URL + '/addNews',
        data: {
            title: title,
            image_url: image_url,
            introtext: introtext,
            hash_tag: hash_tag,
            language: language,
            full_text: full_text
        },
        success: function (data) {
            if (data.success) {
                $('#news_message_ok').removeClass('hidden_alert');
                $('#news_title').val("");
                $('#news_image_url').val("");
                $('#news_introtext').val("");
                $('#news_hash_tag').val("");
                tinymce.get('news_article_body').setContent('');
                $('#news_message_validate').addClass('hidden_alert');

            } else {
                $('#news_message_fail').removeClass('hidden_alert');
            }
        },
        error: function () {
            $('#news_message_fail').removeClass('hidden_alert');
        }
    });
}

function resetNews() {
    $('#news_title').val("");
    $('#news_image_url').val("");
    $('#news_introtext').val("");
    $('#news_hash_tag').val("");
    tinymce.get('news_article_body').setContent('');
    $('#news_message_ok').addClass('hidden_alert');
    $('#news_message_fail').addClass('hidden_alert');
    $('#news_message_validate').addClass('hidden_alert');
}

//$(window).on('hashchange', function () {
//    if (window.location.hash) {
//        var page = window.location.hash.replace('#', '');
//        if (page == Number.NaN || page <= 0) {
//            return false;
//        } else {
//            getNews(page);
//        }
//    }
//});
$(document).ready(function () {
    $(document).on('click', '.pagination a', function (e) {
        getNews($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });
});
function getNews(page) {
    debugger
    waitingDialog.show("Đang tải tin tức....");
    $.ajax({
        url: DASH_BOARD_URL + '/news/load?page=' + page,
        dataType: 'json',
    }).done(function (data) {
        $('#list_news').html(data);
        location.hash = page;
        waitingDialog.hide();
    }).fail(function () {
        waitingDialog.hide();
        showMessage('Không thể tải tin tức');
    });
    waitingDialog.hide();
}
var confirmDelete = $("#dialog-confirm").dialog({
    autoOpen: false,
    resizable: false,
    height: "auto",
    width: 400,
    modal: true
});
function delete_news(id) {
    confirmDelete.dialog({
        //resizable: false,
        //height: "auto",
        //width: 400,
        //modal: true,
        buttons: {
            "Có": function () {
                $(this).dialog("close");
                $.ajax({
                    type: "POST",
                    url: DASH_BOARD_URL + '/news/delete/' + id,
                    data: {},
                    success: function (data) {
                        if (data != null) {
                            $('#list_news').html(data);
                        } else {
                            showMessage("Không xóa tin này được");
                        }
                    },
                    error: function () {
                        showMessage("Không xóa tin này được");
                    }
                });
            },
            "Không": function () {
                $(this).dialog("close");
                return false;
            }
        }
    });
    confirmDelete.dialog("open");

}
