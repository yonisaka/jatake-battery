if (typeof objectifyForm !== "function") {
    window.objectifyForm = function (formArray) { //serialize data function
        if (!formArray instanceof Array) {
            return false
        }
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }
}

function show_alert(
    title,
    message,
    error,
    selector,
    callback_show,
    callback_hide,
    scroll_to_message
) {
    if (typeof error == "undefined") error = true;
    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: true,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "3000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        onHidden: () => {
            callback_hide();
        }
    };
    if (!error) {
        toastr.success(message, title);
    } else if (error == "info") {
        toastr.info(message, title);
    } else if (error == "warning") {
        toastr.warning(message, title);
    } else {
        toastr.error(message, title);
    }
}

function swal2Confirm($title, $msg, $type, $callbackTrue, $callbackFalse = null) {
    swal.fire({
        title: $title,
        text: $msg,
        icon: $type,
        allowOutsideClick: false,
        buttonsStyling: false,
        customClass: {
            confirmButton: 'btn btn-sm btn-primary mx-2',
            cancelButton: 'btn btn-sm btn-secondary mx-2',
        },
        confirmButtonText: "<i class='fa fa-check'></i> Yes",
        showCancelButton: true,
        cancelButtonText: "<i class='fa fa-times'></i> No",
    }).then(result => {
        if (result.value) {
            $callbackTrue();
        }
    })
}
