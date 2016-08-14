var dialogUpload, form, dialogMessage;
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

dialogMessage = $("#dialog-message").dialog({
    autoOpen: false,
    height: 200,
    width: 500,
    modal: true,
    closeOnEscape: true,
    dialogClass: "alert",
    open: function(event, ui){
        setTimeout("$('#dialog-message').dialog('close')",2000);
    },
    buttons: {
        Đóng: function () {
            $(this).dialog("close");
        }
    }
});

function showMessage(message) {
    $('#msg_content').text(message);
    dialogMessage.dialog("open");
}

form = dialogUpload.find("form").on("submit", function (event) {
    event.preventDefault();
});
