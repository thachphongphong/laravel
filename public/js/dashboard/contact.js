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
                showMessage("Có lỗi xảy ra, vui lòng thử lại");
            }
        },
        error: function () {
            showMessage("Có lỗi xảy ra, vui lòng thử lại");
        }
    });
}
