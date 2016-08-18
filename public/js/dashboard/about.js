var about = {};
function loadIntroduce(lang){
    var url = DASH_BOARD_URL + '/introduce/' + lang;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            if (data.success) {
                
                $('#intro-content').html(data.html);
                
            } else {
                alert('fail');
            }
        },
        error: function () {
            alert('fail');
        }
    });
}

function saveAbout(tmp){
    var id = $(tmp).attr('content-id');
    var lang = $(tmp).attr('lang-id');
    var content = $(tmp).prev('textarea').val();
    if(content != ""){
        $.ajax({
            type: "POST",
            url: DASH_BOARD_URL + '/saveAbout',
            data: {
                id: id,
                langCode: lang,
                content: content
            },
            success: function (data) {
                if (data.success) {
                    alert('Lưu thành công');
                } else {
                     alert('Lưu thất bại');
                }
            },
            error: function () {
                alert('Lỗi');
            }
        });
    }else{
         alert('Nội dung trống');
    }
    

}

function deleteImageAbout(id, iurl, lang){
    $.ajax({
        type: "POST",
        url: DASH_BOARD_URL + '/deleteImageAbout',
        data: {
            id: id,
            langCode: lang,
            iurl: iurl
        },
        success: function (res) {
            if(res.success){
                if(lang == '1'){
                    loadIntroduce('vi');
                }else{
                     loadIntroduce('en');
                }
                about = {};
            }
        },
        error: function () {
            alert('Lỗi');
        }
    });
}

function openUploadImageAbout(tmp){
    var id = $(tmp).attr('content-id');
    var lang = $(tmp).attr('lang-id');
    //set temp about to store
    about.id = id;
    about.lang = lang;

    $('#typeName').val('ABOUT');
    dialogUpload.dialog("open");
}

function addImageAbout(imgPath){
    if(imgPath != '' && !$.isEmptyObject(about) ){
        $.ajax({
            type: "POST",
            url: DASH_BOARD_URL + '/addImageAbout',
            data: {
                id: about.id,
                langCode: about.lang,
                imageUrl: imgPath
            },
            success: function (res) {
                if(res.success){
                    if(about.lang == '1'){
                        loadIntroduce('vi');
                    }else{
                         loadIntroduce('en');
                    }
                    about = {};
                }
            },
            error: function () {
                alert('Lỗi');
            }
        });
    }
     
}

function openConfirm(tmp){
    var id = $(tmp).attr('content-id');
    var lang = $(tmp).attr('lang-id');
    var iurl = $(tmp).attr('img-url');
    if(id != ''){    
        $('<div></div>').appendTo('body')
            .html('<div><h6>Bạn muốn xóa ảnh này?</h6></div>')
            .dialog({
            modal: true,
            title: 'message',
            zIndex: 10000,
            autoOpen: true,
            width: 'auto',
            resizable: false,
            buttons: {
                Yes: function () {
                    deleteImageAbout(id, iurl, lang);
                    $(this).dialog("close");
                },
                No: function () {
                    $(this).dialog("close");
                }
            },
            close: function (event, ui) {
                $(this).remove();
            }
        });   
    }

}