//news

$(document).ready(function () {
    $(document).on('click', '#tour-paging .pagination a', function (e) {
        var r_t = $('input:radio[name="t_lang_radio"]').val();
        getTours($(this).attr('href').split('page=')[1], (r_t == 1) ? 'vi' : 'en' );
        e.preventDefault();
    });
});
function getTours(page, lang) {
    $.ajax({
        url: DASH_BOARD_URL + '/tour/load?page=' + page,
        data:{
            lang : lang
        },
        dataType: 'json',
    }).done(function (data) {
        $('#list-tours').html(data);
        location.hash = page;
    }).fail(function () {
        $('#messModal').find('span').text('Không thể tour');
            $('#messModal').modal('show');
    });
}

function addTours() {
    var duration = $('#duration').val();
    var type = $('#durationType input:radio:checked').val();
    var departure = $('#departure').val();
    var arrival=  $('#arrival').val();
    var price = $('#price').val();
    var note = $('#note').val();
    var image = $('#image').val();
     var language_id = $('input:radio[name="t_lang_radio"]').val();
    if(duration > 0 &&  departure != '' &&  arrival != '' && price> 0 &&  note != '') {
        $.ajax({
            type: "POST",
            url: DASH_BOARD_URL + '/tour/add',
            data: {
                duration: duration + ' ' + type,
                departure: departure,
                arrival: arrival,
                price: price,
                note: note,
                imageUrl: image,
                language_id: language_id
            },
            success: function (data) {
                if (data != null) {
                    clearTour();
                   getTours(1, (language_id == 1) ? 'vi' : 'en');
                } else {
                    $('#messModal').find('span').text("Không thêm tour này được");
                        $('#messModal').modal('show');
                }
            },
            error: function () {
                $('#messModal').find('span').text("Không thêm tour này được");
                $('#messModal').modal('show');
            }
        });
    }else{
         $('#messModal').find('span').text('Thông tin chưa đầy đủ.');
        $('#messModal').modal('show');
    }

}

function deleteTour(id) {
     var lang = $('input:radio[name="t_lang_radio"]').val();
    $.ajax({
        type: "POST",
        url: DASH_BOARD_URL + '/tour/delete',
        data: {
            id :  id,    
            lang : lang
        },
        success: function (data) {
            if (data != null) {
                 $('#list-tours').html(data);
            } else {
                $('#messModal').find('span').text("Không xóa tour này được");
                $('#messModal').modal('show');
            }
        },
        error: function () {
            $('#messModal').find('span').text("Không xóa tour này được");
                $('#messModal').modal('show');
        }
    });

}

function clearTour(){
     $('#duration').val(0);
    $('#departure').val('');
   $('#arrival').val('');
     $('#price').val(0);
    $('#note').val('');
}

function openUploadImageTour(){
    $('#typeName').val('TOUR');
    $('#tourModal').modal('hide');
    dialogUpload.dialog("open");
}

function addImageTour(url){
    $('#tourModal #image').val(url);
    $('#tourModal').modal('show');
}