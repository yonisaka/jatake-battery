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
    message = '',
    error = false,
    selector,
    callback_show = () => {},
    callback_hide = () => {},
    scroll_to_message = () => {}
) {

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

function swal2Confirm($title, $msg, $type, $callbackTrue, $callbackFalse) {
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

let formHelper = {
    edit: ($data, $form) => {
        if (!$data)
            return false
        $form = $($form).prop("tagName") == "form" ? $($form) : $($form).find('form');
        $.each($data, (i, val) => {
            if (!$.isArray(val))
                $form.find(':not(.form-array) [name=' + i + ']').val(val)
            else {
                $formArray = $form.find('.form-array')
                if ($formArray.data('name') == i) {
                    $formArray.find('.form-array-input').filter((j, el) => {
                        $(el).val(val[j])
                    })
                } else {
                    $formArray.find('.form-array-input [name=' + i + ']').filter((j, el) => {
                        $(el).val(val[j])
                    })
                }
            }
        })
    },
    getData: ($form) => {
        $form = $($form).prop("tagName") == "form" ? $($form) : $($form).find('form');
        let $formData = $form.serializeArray();

        $formAuto = $form.find('.auto-price')
        $.each($formAuto, (i, el) => {
            if ($(el).data('rawVal')) {
                $formData.push({
                    name: $(el).attr('name'),
                    value: $(el).data('rawVal'),
                })
            }
        })
        $formArray = $form.find('.form-array')
        $.each($formArray, (i, el) => {
            $arrWrapper = $(el);
            $name = $arrWrapper.data('name')
            if ($name) {
                $arr = $.map($arrWrapper.find('.form-array-input'), (em) => {
                    return $(em).val()
                })
                $formData.push({
                    name: $name,
                    value: $arr,
                })
            } else {
                var $name = null;
                $arr = {}
                $.map($arrWrapper.find('.form-array-input'), (em) => {
                    if ($(em).attr('name')) {
                        $nm = $(em).attr('name').split('.');
                        if ($nm.length > 1) {
                            $name = $nm[0];
                            var $subname = $nm[1];
                            if ($(em).val())
                                $arr[$subname] = $(em).val()
                        }
                    }
                })
                $formData.push({
                    name: $name,
                    value: $arr,
                })
            }
        })
        // $formData = $formData.map(arr => {
        //     (arr.value == null) ? null
        //         : (arr.value.length == 0) ? arr.value = "" : null
        //     return arr
        // })
        return objectifyForm($formData);
    },
}

$(() => {
    let priceConfig = {
        currencySymbol: 'Rp ',
        decimalPlaces: 0,
        decimalCharacter: ',',
        digitGroupSeparator: '.',
    }
    $.each($('.auto-price'), (i, el) => {
        var $price = new AutoNumeric(el, priceConfig)
        $($price.domElement).on('keyup', function (e) {
            $(this).data('raw-val', $price.rawValue)
        })
    })
})
