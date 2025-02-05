const myModal = new bootstrap.Modal('#confirmationModal')

function custom_confirm(msg, callback) {
    $("#confirmationModal .modal-body").html(msg);

    myModal.show();

    $('#confirm-btn').on('click', function () {
        callback(true); // Return true if the user clicks the confirm button
        myModal.hide();
    });
}
