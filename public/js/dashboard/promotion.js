function getPro(page, lang) {
    $.ajax({
        url: DASH_BOARD_URL + '/pro/load?page=' + page,
        data:{
            lang : lang
        },
        dataType: 'json',
    }).done(function (data) {
        $('#list-promotion').html(data);
        location.hash = page;
    }).fail(function () {
        $('#messPModal').find('span').text('Không thể tour');
        $('#messPModal').modal('show');
    });
}

function openAddPro(){
   $('#add-pro').show();
    $('#edit-pro').hide();
    $('#promotionModal').modal('show'); 
}

function addPro() {
    var description = $('#description').val();
    var apply_time_from = $('#apply_time_from').val();
    var apply_time_to=  $('#apply_time_to').val();
    var sale_off = $('#sale_off').val();
    var enabled = $('#showPromotion input:radio:checked').val();
     var language_id = $('input:radio[name="p_lang_radio"]:checked').val();
    if(description != '' &&  apply_time_from != '' &&  apply_time_to != '' && sale_off != '') {
        $.ajax({
            type: "POST",
            url: DASH_BOARD_URL + '/pro/add',
            data: {
                description: description,
                apply_time_from: apply_time_from,
                apply_time_to: apply_time_to,
                sale_off: sale_off,
                enabled: enabled,
                language_id: language_id
            },
            success: function (data) {
                if (data != null) {
                   clearPro();
                   getPro(1, (language_id == 1) ? 'vi' : 'en');
                } else {
                    $('#messPModal').find('span').text("Không thêm tour này được");
                    $('#messPModal').modal('show');
                }
            },
            error: function () {
                $('#messPModal').find('span').text("Không thêm tour này được");
                $('#messPModal').modal('show');
            }
        });
    }else{
         $('#messPModal').find('span').text('Thông tin chưa đầy đủ.');
        $('#messPModal').modal('show');
    }

}

function deletePro(id) {
     var lang = $('input:radio[name="p_lang_radio"]').val();
    $.ajax({
        type: "POST",
        url: DASH_BOARD_URL + '/pro/delete',
        data: {
            id :  id,    
            lang : lang
        },
        success: function (data) {
            if (data != null) {
                 $('#list-promotion').html(data);
            } else {
                $('#messPModal').find('span').text("Không xóa được");
                $('#messPModal').modal('show');
            }
        },
        error: function () {
            $('#messPModal').find('span').text("Không xóa được");
            $('#messPModal').modal('show');
        }
    });

}

function openEditPro(tmp){
    var id = $(tmp).attr('p-id');;
    if(id != ''){
        $('#promotionId').val(id); 
        $('#description').val($(tmp).parents('tr').find('td:eq(1)').text());
        $('#apply_time_from').val($(tmp).parents('tr').find('td:eq(2)').text());
        $('#apply_time_to').val($(tmp).parents('tr').find('td:eq(3)').text());
        $('#sale_off').val($(tmp).parents('tr').find('td:eq(4)').text());
        
        var $enabled = $('input:radio[name="proRadioOptions"]');
        var dur = $(tmp).parents('tr').find('td:eq(5)').html();

        if($(dur).attr('class')  == 'fa fa-check-square-o'){
            $enabled.filter('[value=1]').prop('checked', true);
        }else{
            $enabled.filter('[value=0]').prop('checked', true);
        }
        

        $('#add-pro').hide();
        $('#edit-pro').show();
        $('#promotionModal').modal('show');

    }
    
}

function editPro() {
    var id = $('#promotionId').val();
     var description = $('#description').val();
    var apply_time_from = $('#apply_time_from').val();
    var apply_time_to=  $('#apply_time_to').val();
    var sale_off = $('#sale_off').val();
    var enabled = $('#showPromotion input:radio:checked').val();
     var language_id = $('input:radio[name="p_lang_radio"]:checked').val();

    if(id !=  ''  && description != '' &&  apply_time_from != '' &&  apply_time_to != '' && sale_off != '') {
        $.ajax({
            type: "POST",
            url: DASH_BOARD_URL + '/pro/edit',
            data: {
                id : id,
                 description: description,
                apply_time_from: apply_time_from,
                apply_time_to: apply_time_to,
                sale_off: sale_off,
                enabled: enabled,
                language_id: language_id
            },
            success: function (data) {
                if (data != null) {
                    clearPro();
                   getPro(1, (language_id == 1) ? 'vi' : 'en');
                } else {
                    $('#messPModal').find('span').text("Không sửa tour này được");
                    $('#messPModal').modal('show');
                }
            },
            error: function () {
                $('#messPModal').find('span').text("Không sửa tour này được");
                $('#messPModal').modal('show');
            }
        });
    }else{
         $('#messPModal').find('span').text('Thông tin chưa đầy đủ.');
        $('#messPModal').modal('show');
    }

}

function clearPro(){
    $('#description').val('');
    $('#apply_time_from').val('');
    $('#apply_time_to').val('');
   $('#sale_off').val('');
   var $enabled = $('input:radio[name="proRadioOptions"]');
   $enabled.filter('[value=1]').prop('checked', true);
    $('#add-pro').show();
    $('#edit-pro').hide();
}