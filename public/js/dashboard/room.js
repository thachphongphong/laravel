function getRoomDetail(id) {
    var url = DASH_BOARD_URL + '/room/' + id;
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            if (data.success) {
                $('#f_edit_room').show(1000);
                $('#r_id').val(data.data.id);
                $('#r_name').val(data.data.name);
                $('#r_image_url_thumbnail').val(data.data.thumbnail);
                $('#r_image_url').val(data.data.image_url);
                //$('#r_thumbnail_src_thumbnail').attr('src', assetBaseUrl + data.data.thumbnail);
                $('#r_image_url_src').attr('src', assetBaseUrl + data.data.image_url);
                $('#r_description').val(data.data.description);
                $('#r_room_type').val(data.data.room_type);
                $('#r_total_room').val(data.data.total_room);
                $('#r_total_person').val(data.data.total_person);
                $('#r_price').val(data.data.price);
                $('#r_f_price').val(data.data.f_price);
                $('#r_rate').val(data.data.rate);
            } else {
                showMessage("Có lỗi xảy ra!");
            }
        },
        error: function () {
            showMessage("Có lỗi xảy ra!");
        }
    });
}

function updateRoom() {
    var id = $('#r_id').val();
    var name = $('#r_name').val();
    var thumbnail = $('#r_image_url_thumbnail').val();
    var image_url = $('#r_image_url').val();
    var description = $('#r_description').val();
    var room_type = $('#r_room_type').val();
    var total_room = $('#r_total_room').val();
    var total_person = $('#r_total_person').val();
    var price = $('#r_price').val();
    var f_price = $('#r_f_price').val();
    var rate = $('#r_rate').val();
    $.ajax({
        type: "POST",
        url: DASH_BOARD_URL + '/room/update',
        data: {
            id: id,
            name: name,
            thumbnail: thumbnail,
            image_url: image_url,
            description: description,
            room_type: room_type,
            total_room: total_room,
            total_person: total_person,
            price: price,
            f_price: f_price,
            rate: rate
        },
        success: function (data) {
            if (data.success) {
                showMessage("Cập nhật thông tin phòng thành công!");
            } else {
                showMessage("Cập nhật thông tin phòng thất bại!");
            }
        },
        error: function () {
            showMessage("Có lỗi xảy ra. Cập nhật thông tin phòng thất bại!");
        }
    });
}
