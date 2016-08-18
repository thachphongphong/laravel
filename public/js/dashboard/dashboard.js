$(document).ready(function () {
    $.fn.bootstrapBtn = $.fn.button.noConflict();
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
         $('#typeName').val('ROOM');
        $('#filePath').val($('#r_image_url').val());
        dialogUpload.data('controlId', 'r_image_url').dialog("open");
    });

    $('a').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href") // activated tab
        if (target == '#introduce') {
            loadIntroduce('vi');
        }
    });

    $('#btn-r-save').click(function () {
        updateRoom();
    });

    $('input:radio[name="a_lang_radio"]').change(function () {
        if ($(this).val() == '1') {
            loadIntroduce('vi');
        } else {
           loadIntroduce('en');
        }
    });

})