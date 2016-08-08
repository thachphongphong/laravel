$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // global editor
    tinymce.init({
        mode: "specific_textareas",
        editor_selector: /(mceEditor|mceRichText)/,
        plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
    //contact

    $('#update-contact-btn').click(function () {
        updateContact();
    });
    $('#contact_vi').click(function () {
        loadContact('vi');
    });
    $('#contact_en').click(function () {
        loadContact('en');

    });

    // news
    $('#btn-publish').click(function () {
        addNews();
    });
    $('#btn-cancel').click(function () {
        resetNews();
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
            url: DASH_BOARD_URL + '/updateContact',
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
                alert('fail');
            }
        });
    }

    function loadContact(language) {
        var url = DASH_BOARD_URL + '/contact/' + language;
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
                alert('fail');
            }
        });
    }

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

    function resetNews(){
        $('#news_title').val("");
        $('#news_image_url').val("");
        $('#news_introtext').val("");
        $('#news_hash_tag').val("");
        tinymce.get('news_article_body').setContent('');
        $('#news_message_ok').addClass('hidden_alert');
        $('#news_message_fail').addClass('hidden_alert');
        $('#news_message_validate').addClass('hidden_alert');
    }
})