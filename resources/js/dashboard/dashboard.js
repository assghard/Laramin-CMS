// window.Vue = require('vue');
window.$ = window.jQuery = require('jquery');
require('bootstrap');
window.swal = require('sweetalert2');
window.lightbox = require("lightbox2");

$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": document.querySelector("meta[name='csrf-token']").getAttribute("content")
        }
    });

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});

window.unlockInput = function (button, input_id) {
    $(button).addClass('d-none');
    $(input_id).removeAttr('readonly').focus();
}

window.systemAlert = function (type, message) {
    swal.fire({html: message, icon: type}).then(function () {
        location.reload();
    }, function () {
        location.reload();
    });
}

window.deleteEntity = function (route, event, returnUrl = null) {
    event.preventDefault();
    swal.fire({
        text: 'Delete this object',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#1D5080',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        focusCancel: true,
        timer: 10000,
        timerProgressBar: true,
        allowOutsideClick: () => {
            swal.close();
        }
    }).then(function (btn) {
        if (btn.value) {
            if (btn.value === true) { // remove
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    data: {},
                    timeout: ajaxTimeout,
                    success: function (result) {
                        if (result.success === true) {
                            systemAlert('success', result.message, function () {
                                if (!returnUrl) {
                                    location.reload();
                                    return;
                                }
                                window.location.href = returnUrl;
                            });
                        } else {
                            systemAlert('error', result.message);
                            console.log(result);
                        }
                    },
                    error: function (err) {
                        systemAlert('error', 'ERROR! Something went wrong');
                        console.log(err);
                    }
                }).fail(function (err) {
                    systemAlert('error', 'ERROR! Something went wrong');
                    console.log(err);
                });
            }
        }
    }).catch(swal.noop);
}

window.saveImageData = function(button, event){
    event.preventDefault();
    var imageBox = $(button).parent('.image-box');
    var route = $(button).data('route');

    var imageData = {};
    $(imageBox).find('input').each(function(iterator, element){
        imageData[$(element).data('name')] = element.value;
    });

    $.ajax({
        url: route,
        type: 'PUT',
        data: imageData,
        timeout: ajaxTimeout,
        success: function (result) {
            if (result.success === true) {
                swal.fire({ html: result.message, icon: 'success', timer: 2000, timerProgressBar: true });
            } else {
                systemAlert('error', result.message);
                console.log(result);
            }
        },
        error: function (err) {
            systemAlert('error', 'ERROR! Something went wrong');
            console.log(err);
        }
    }).fail(function (err) {
        systemAlert('error', 'ERROR! Something went wrong');
        console.log(err);
    });
}

window.deleteImage = function (button, event) {
    event.preventDefault();
    var imageBox = $(button).parent('.image-box');
    var route = $(button).data('route');

    $.ajax({
        url: route,
        type: 'DELETE',
        data: {},
        timeout: ajaxTimeout,
        success: function (result) {
            if (result.success === true) {
                $(imageBox).remove();
            } else {
                systemAlert('error', result.message);
                console.log(result);
            }
        },
        error: function (err) {
            systemAlert('error', 'ERROR! Something went wrong');
            console.log(err);
        }
    }).fail(function (err) {
        systemAlert('error', 'ERROR! Something went wrong');
        console.log(err);
    });
}

// window.btnConfirmation = function (button, event) {
//     event.preventDefault();
//     swal.fire({
//         text: button.message,
//         showCancelButton: true,
//         confirmButtonColor: '#d33',
//         cancelButtonColor: '#1D5080',
//         confirmButtonText: 'Yes',
//         cancelButtonText: 'Close',
//         focusCancel: true,
//         timer: 10000,
//         timerProgressBar: true,
//         allowOutsideClick: () => {
//             swal.close();
//         }
//     }).then(function (btn) {
//         if (btn.value && btn.value === true) { // accept
//             window.location.href = button.href;
//         }
//     }).catch(swal.noop);
// };

// const app = new Vue({
//     el: '#app',
//     components: {},
// });