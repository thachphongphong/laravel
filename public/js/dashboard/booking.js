//news

$(document).ready(function () {
    $(document).on('click', '.booking .pagination a', function (e) {
        getBookings($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });
});
function getBookings(page) {
    waitingDialog.show("Đang tải đặt phòng....");
    $.ajax({
        url: DASH_BOARD_URL + '/booking/load?page=' + page,
        dataType: 'json',
    }).done(function (data) {
        $('#list_bookings').html(data);
        location.hash = page;
        waitingDialog.hide();
    }).fail(function () {
        waitingDialog.hide();
        showMessage('Không thể tải đặt phòng');
    });
    waitingDialog.hide();
}
var confirmDeleteBooking = $("#dialog-confirm").dialog({
    autoOpen: false,
    resizable: false,
    height: "auto",
    width: 400,
    modal: true
});
function delete_bookings(id) {
    confirmDeleteBooking.dialog({
        //resizable: false,
        //height: "auto",
        //width: 400,
        //modal: true,
        buttons: {
            "Có": function () {
                $(this).dialog("close");
                $.ajax({
                    type: "POST",
                    url: DASH_BOARD_URL + '/booking/delete/' + id,
                    data: {},
                    success: function (data) {
                        if (data != null) {
                            $('#list_bookings').html(data);
                        } else {
                            showMessage("Không xóa đặt phòng này được");
                        }
                    },
                    error: function () {
                        showMessage("Không xóa đặt phòng này được");
                    }
                });
            },
            "Không": function () {
                $(this).dialog("close");
                return false;
            }
        }
    });
    confirmDeleteBooking.dialog("open");

}
