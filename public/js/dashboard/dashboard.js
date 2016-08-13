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
    $('#btn-upload').click(function () {
        upload();
    });

    $("#r_combobox").change(function () {
        getRoomDetail(this.value);
    });

    $("#r_combobox_en").change(function () {
        getRoomDetail(this.value);
    });

    $('input:radio[name="r_lang_radio"]').change(function () {
        if ($(this).val() == '1') {
            $('#f_edit_room').hide(500);
            $('#room_vi').show();
            $('#room_en').hide();
        } else {
            $('#f_edit_room').hide(500);
            $('#room_vi').hide();
            $('#room_en').show();
        }
    });

    $("#btn-upload-image").click(function () {
        $('#filePath').val($('#r_image_url').val());
        dialogUpload.data('controlId', 'r_image_url').dialog("open");
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

    function upload(controlId) {
        var form = document.forms.namedItem("upload_image"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!

        $.ajax({
            async: true,
            type: "POST",
            dataType: "json", // or html if you want...
            contentType: false, // high importance!
            url: DASH_BOARD_URL + '/upload', // you need change it.
            data: formdata, // high importance!
            processData: false, // high importance!
            success: function (data) {
                $('#' + controlId).val(data.data);
            },
            timeout: 10000
        });
    }

    function replace(controlId, oldFile) {
        var form = document.forms.namedItem("upload_image"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!

        $.ajax({
            async: true,
            type: "POST",
            dataType: "json", // or html if you want...
            contentType: false, // high importance!
            url: DASH_BOARD_URL + '/upload/replace', // you need change it.
            data: formdata, // high importance!
            processData: false, // high importance!
            success: function (data) {
                alert(data.data);
                $('#' + controlId).val(data.data);
                $('#' + controlId + '_src').attr('src', assetBaseUrl + data.data + "?t=" + new Date().getTime());
            },
            timeout: 10000
        });
    }

    function getRoomDetail(id) {
        var url = DASH_BOARD_URL + '/room/' + id;
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                if (data.success) {
                    $('#f_edit_room').show(1000);
                    $('#r_name').val(data.data.name);
                    $('#r_thumbnail').val(data.data.thumbnail);
                    $('#r_image_url').val(data.data.image_url);
                    $('#r_thumbnail_src').attr('src', assetBaseUrl + data.data.thumbnail);
                    $('#r_image_url_src').attr('src', assetBaseUrl + data.data.image_url);
                    $('#r_description').val(data.data.description);
                    $('#r_room_type').val(data.data.room_type);
                    $('#r_total_room').val(data.data.total_room);
                    $('#r_total_person').val(data.data.total_person);
                    $('#r_price').val(data.data.price);
                    $('#r_f_price').val(data.data.f_price);
                    $('#r_rate').val(data.data.rate);
                } else {
                    alert('fail');
                }
            },
            error: function () {
                alert('fail');
            }
        });
    }

    var dialogUpload, form;
    dialogUpload = $("#div_upload_image").dialog({
        autoOpen: false,
        height: 200,
        width: 500,
        modal: true,
        buttons: {
            "Upload": uploadImage,
            Cancel: function () {
                dialogUpload.dialog("close");
            }
        }
    });

    form = dialogUpload.find("form").on("submit", function (event) {
        event.preventDefault();
    });

    function uploadImage() {
        debugger
        var controlId = $("#div_upload_image").data('controlId');
        replace(controlId, $('#filePath').val());
    }


     $('a').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href") // activated tab
            if(target == '#introduce'){
                loadIntroduce('vi');
            }
            if(target == '#introduce'){
                loadIntroduce('vi');
            }
     });
})