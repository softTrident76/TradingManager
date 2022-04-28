/**
 * **************************************************
 * ******* Name: arvid
 * ******* Description: Bootstrap 4 Admin Dashboard
 * ******* Version: 1.0.0
 * ******* Released on 2019-02-13 00:31:49
 * ******* Support Email : quixlab.com@gmail.com
 * ******* Support Skype : sporsho9
 * ******* Author: Quixlab
 * ******* URL: https://quixlab.com
 * ******* Themeforest Profile : https://themeforest.net/user/quixlab
 * ******* License: ISC
 * ***************************************************
 */

(function ($) {
    "use strict"

/*******************
Bootstrap Notify
*******************/


    // $.notify({
    //     // options
    //     message: 'Hey! Welcome to dashboard!'
    // }, {
    //     // settings
    //     type: 'success',
    //     offset: {
    //         x: 20,
    //         y: 20
    //     },
    //     spacing: 10,
    //     z_index: 1031,
    //     delay: 2000,
    //     timer: 1000,
    //     placement: {
    //         from: 'top',
    //         align: 'right'
    //     },
    //     animate: {
    //         enter: 'animated fadeInDown',
    //         exit: 'animated fadeOutUp'
    //     }
    // });


    //primary alerts
    $('.primary-alert-left-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'primary',
            offset: 20,
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'left'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.primary-alert-right-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'primary',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'right'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.primary-alert-right-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'primary',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'right'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.primary-alert-left-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'primary',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'left'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.primary-alert-center-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'primary',
            offset: {
                y: 20,
                x: 0
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'center'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.primary-alert-center-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'primary',
            offset: {
                y: 20,
                x: 0
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'center'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });



    //success alerts
    $('.success-alert-left-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'success',
            offset: 20,
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'left'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.success-alert-right-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'success',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'right'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.success-alert-right-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'success',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'right'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.success-alert-left-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'success',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'left'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.success-alert-center-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'success',
            offset: {
                y: 20,
                x: 0
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'center'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.success-alert-center-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'success',
            offset: {
                y: 20,
                x: 0
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'center'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });



    //warning alets
    $('.warning-alert-left-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'warning',
            offset: 20,
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'left'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.warning-alert-right-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'warning',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'right'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.warning-alert-right-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'warning',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'right'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.warning-alert-left-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'warning',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'left'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.warning-alert-center-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'warning',
            offset: {
                y: 20,
                x: 0
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'center'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.warning-alert-center-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'warning',
            offset: {
                y: 20,
                x: 0
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'center'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });





    //danger alets
    $('.danger-alert-left-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'danger',
            offset: 20,
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'left'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.danger-alert-right-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'danger',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'right'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.danger-alert-right-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'danger',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'right'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.danger-alert-left-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'danger',
            offset: {
                y: 20,
                x: 20
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'left'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.danger-alert-center-top').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'danger',
            offset: {
                y: 20,
                x: 0
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'center'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });

    $('.danger-alert-center-bottom').on('click', function () {
        $.notify({
            // options
            message: 'Congratulations! You\'ve succcessfully completed the task.'
        }, {
            // settings
            type: 'danger',
            offset: {
                y: 20,
                x: 0
            },
            spacing: 5,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'center'
            },
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    });


/*******************
ClipboardJS
*******************/

    const clipBoard = new ClipboardJS('.clipboard-btn');

    clipBoard.on('success', function (e) {
        setTooltip(e.trigger, 'Copied!');
        hideTooltip(e.trigger);
    });

    clipBoard.on('error', function (e) {
        setTooltip(e.trigger, 'Failed!');
        hideTooltip(e.trigger);
    });

    $('.clipboard-btn').tooltip({
        trigger: 'click',
        placement: 'bottom'
    });

    function setTooltip(btn, message) {
        $(btn).tooltip('hide')
            .attr('data-original-title', message)
            .tooltip('show');
    }

    function hideTooltip(btn) {
        setTimeout(function () {
            $(btn).tooltip('hide');
        }, 1000);
    }

/*******************
Sweet-alert JS
*******************/

    document.querySelector(".sweet-wrong").onclick = function () {
        sweetAlert("Oops...", "Something went wrong !!", "error")
    }, document.querySelector(".sweet-message").onclick = function () {
        swal("Hey, Here's a message !!")
    }, document.querySelector(".sweet-text").onclick = function () {
        swal("Hey, Here's a message !!", "It's pretty, isn't it?")
    }, document.querySelector(".sweet-success").onclick = function () {
        swal("Hey, Good job !!", "You clicked the button !!", "success")
    }, document.querySelector(".sweet-confirm").onclick = function () {
        swal({
            title: "Are you sure to delete ?",
            text: "You will not be able to recover this imaginary file !!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !!",
            closeOnConfirm: !1
        }, function () {
            swal("Deleted !!", "Hey, your imaginary file has been deleted !!", "success")
        })
    }, document.querySelector(".sweet-success-cancel").onclick = function () {
        swal({
            title: "Are you sure to delete ?",
            text: "You will not be able to recover this imaginary file !!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !!",
            cancelButtonText: "No, cancel it !!",
            closeOnConfirm: !1,
            closeOnCancel: !1
        }, function (e) {
            e ? swal("Deleted !!", "Hey, your imaginary file has been deleted !!", "success") : swal("Cancelled !!", "Hey, your imaginary file is safe !!", "error")
        })
    }, document.querySelector(".sweet-image-message").onclick = function () {
        swal({
            title: "Sweet !!",
            text: "Hey, Here's a custom image !!",
            imageUrl: "../assets/images/hand.jpg"
        })
    }, document.querySelector(".sweet-html").onclick = function () {
        swal({
            title: "Sweet !!",
            text: "<span style='color:#ff0000'>Hey, you are using HTML !!<span>",
            html: !0
        })
    }, document.querySelector(".sweet-auto").onclick = function () {
        swal({
            title: "Sweet auto close alert !!",
            text: "Hey, i will close in 2 seconds !!",
            timer: 2e3,
            showConfirmButton: !1
        })
    }, document.querySelector(".sweet-prompt").onclick = function () {
        swal({
            title: "Enter an input !!",
            text: "Write something interesting !!",
            type: "input",
            showCancelButton: !0,
            closeOnConfirm: !1,
            animation: "slide-from-top",
            inputPlaceholder: "Write something"
        }, function (e) {
            return !1 !== e && ("" === e ? (swal.showInputError("You need to write something!"), !1) : void swal("Hey !!", "You wrote: " + e, "success"))
        })
    }, document.querySelector(".sweet-ajax").onclick = function () {
        swal({
            title: "Sweet ajax request !!",
            text: "Submit to run ajax request !!",
            type: "info",
            showCancelButton: !0,
            closeOnConfirm: !1,
            showLoaderOnConfirm: !0
        }, function () {
            setTimeout(function () {
                swal("Hey, your ajax request finished !!")
            }, 2e3)
        })
    };

/*******************
Toastr
*******************/

    $("#toastr-success-top-right").on("click", function () {
                toastr.success("This Is Success Message", "Top Right", {
                    timeOut: 500000000,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-success-bottom-right").on("click", function () {
                toastr.success("This Is Success Message", "Bottom Right", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-success-bottom-left").on("click", function () {
                toastr.success("This Is Success Message", "Bottom Left", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-success-top-left").on("click", function () {
                toastr.success("This Is Success Message", "Top Left", {
                    positionClass: "toast-top-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-success-top-full-width").on("click", function () {
                toastr.success("This Is Success Message", "Top Full Width", {
                    positionClass: "toast-top-full-width",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-success-bottom-full-width").on("click", function () {
                toastr.success("This Is Success Message", "Bottom Full Width", {
                    positionClass: "toast-bottom-full-width",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-success-top-center").on("click", function () {
                toastr.success("This Is Success Message", "Top Center", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-success-bottom-center").on("click", function () {
                toastr.success("This Is Success Message", "Bottom Center", {
                    positionClass: "toast-bottom-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-info-top-right").on("click", function () {
                toastr.info("This Is info Message", "Top Right", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-info-bottom-right").on("click", function () {
                toastr.info("This Is info Message", "Bottom Right", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-info-bottom-left").on("click", function () {
                toastr.info("This Is info Message", "Bottom Left", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-info-top-left").on("click", function () {
                toastr.info("This Is info Message", "Top Left", {
                    positionClass: "toast-top-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-info-top-full-width").on("click", function () {
                toastr.info("This Is info Message", "Top Full Width", {
                    positionClass: "toast-top-full-width",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-info-bottom-full-width").on("click", function () {
                toastr.info("This Is info Message", "Bottom Full Width", {
                    positionClass: "toast-bottom-full-width",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-info-top-center").on("click", function () {
                toastr.info("This Is info Message", "Top Center", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-info-bottom-center").on("click", function () {
                toastr.info("This Is info Message", "Bottom Center", {
                    positionClass: "toast-bottom-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-warning-top-right").on("click", function () {
                toastr.warning("This Is warning Message", "Top Right", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-warning-bottom-right").on("click", function () {
                toastr.warning("This Is warning Message", "Bottom Right", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-warning-bottom-left").on("click", function () {
                toastr.warning("This Is warning Message", "Bottom Left", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-warning-top-left").on("click", function () {
                toastr.warning("This Is warning Message", "Top Left", {
                    positionClass: "toast-top-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-warning-top-full-width").on("click", function () {
                toastr.warning("This Is warning Message", "Top Full Width", {
                    positionClass: "toast-top-full-width",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-warning-bottom-full-width").on("click", function () {
                toastr.warning("This Is warning Message", "Bottom Full Width", {
                    positionClass: "toast-bottom-full-width",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-warning-top-center").on("click", function () {
                toastr.warning("This Is warning Message", "Top Center", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-warning-bottom-center").on("click", function () {
                toastr.warning("This Is warning Message", "Bottom Center", {
                    positionClass: "toast-bottom-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-danger-top-right").on("click", function () {
                toastr.error("This Is error Message", "Top Right", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-danger-bottom-right").on("click", function () {
                toastr.error("This Is error Message", "Bottom Right", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-danger-bottom-left").on("click", function () {
                toastr.error("This Is error Message", "Bottom Left", {
                    positionClass: "toast-bottom-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-danger-top-left").on("click", function () {
                toastr.error("This Is error Message", "Top Left", {
                    positionClass: "toast-top-left",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-danger-top-full-width").on("click", function () {
                toastr.error("This Is error Message", "Top Full Width", {
                    positionClass: "toast-top-full-width",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-danger-bottom-full-width").on("click", function () {
                toastr.error("This Is error Message", "Bottom Full Width", {
                    positionClass: "toast-bottom-full-width",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-danger-top-center").on("click", function () {
                toastr.error("This Is error Message", "Top Center", {
                    positionClass: "toast-top-center",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            }

        ),
        $("#toastr-danger-bottom-center").on("click", function () {
            toastr.error("This Is error Message", "Bottom Center", {
                positionClass: "toast-bottom-center",
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            })
        });


/*******************
Nestable
*******************/

    var e = function (e) {
        var t = e.length ? e : $(e.target),
            a = t.data("output");
        window.JSON ? a.val(window.JSON.stringify(t.nestable("serialize"))) : a.val("JSON browser support required for this demo.")
    };
    $("#nestable").nestable({
            group: 1
        }).on("change", e),
        $("#nestable2").nestable({
            group: 1
        }).on("change", e), e($("#nestable").data("output", $("#nestable-output"))), e($("#nestable2").data("output", $("#nestable2-output"))), $("#nestable-menu").on("click", function (e) {
            var t = $(e.target).data("action");
            "expand-all" === t && $(".dd").nestable("expandAll"), "collapse-all" === t && $(".dd").nestable("collapseAll")
        }), $("#nestable3").nestable();




/*******************
BlockUI
*******************/

    $('#demo_1').click(function () {
        $.blockUI({
            message: '<h1 class="p-3">Just a moment...</h1>'
        });

        setTimeout($.unblockUI, 2000);
    });

    $('#demo_2').click(function () {
        $.blockUI({
            message: $('#loginForm')
        });

        $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
    });

    $('#demo_3').click(function () {
        $.blockUI({
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }
        });

        setTimeout($.unblockUI);
    });

    $('#demo_4').click(function () {
        $.blockUI({
            overlayCSS: {
                backgroundColor: '#00f'
            }
        });

        setTimeout($.unblockUI, 2000);
    });

    $('#demo_5').click(function () {
        $.blockUI({
            message: $('#tallContent'),
            css: {
                top: '20%'
            }
        });

        setTimeout($.unblockUI, 20000);
    });

    $('#demo_6').click(function () {
        $.blockUI({
            message: $('#displayBox'),
            css: {
                top: ($(window).height() - 400) / 2 + 'px',
                left: ($(window).width() - 400) / 2 + 'px',
                width: '400px'
            }
        });

        setTimeout($.unblockUI, 2000);
    });

    $('#demo_7').click(function () {
        $.blockUI({
            centerY: 0,
            css: {
                top: '10px',
                left: '',
                right: '10px'
            }
        });

        setTimeout($.unblockUI, 2000);
    });

    $('#demo_8').click(function () {
        $.blockUI({
            message: null
        });

        setTimeout($.unblockUI, 2000);
    });

    $('#demo_9').click(function () {
        $.blockUI();
        $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
    });

    $('#demo_10').click(function () {
        $.blockUI({
            message: '<h1>Auto-Unblock!</h1>',
            timeout: 2000
        });
    });

    $('#demo_11').click(function () {
        $.blockUI({
            message: $('.growlUI'),
            fadeIn: 700,
            fadeOut: 700,
            timeout: 2000,
            showOverlay: false,
            centerY: false,
            css: {
                width: '350px',
                top: '10px',
                left: '',
                right: '10px',
                border: 'none',
                padding: '5px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .6,
                color: '#fff'
            }
        });
    });

    $('#demo_12').click(function () {
        $.growlUI('Growl Notification', 'Have a nice day!');
    });


    $('#block-element1').click(function () {
        $('.block-element-1').block({
            message: null
        });
    });

    $('#unblock-element1').click(function () {
        $('.block-element-1').unblock();
    });


    $('#block-element2').click(function () {
        $('.block-element-2').block({
            message: '<h1>Processing</h1>',
            css: {
                border: '3px solid #ddd'
            }
        });
    });

    $('#unblock-element2').click(function () {
        $('.block-element-2').unblock();
    });




/*******************
Bootstrap Multiselect
*******************/

// (function ($) {
//     "use strict"

//     $('.basic-multiselect').multiselect();

//     $('.basic-multiselect-optgroup').multiselect({
//         enableClickableOptGroups: true
//     });

//     $('.basic-multiselect-selectall').multiselect({
//         enableClickableOptGroups: true,
//         includeSelectAllOption: true
//     });

// })(jQuery);


/*******************
Pignose Calender
*******************/

    $(".year-calendar").pignoseCalendar({
        theme: "blue"
    }), $("input.calendar").pignoseCalendar({
        format: "YYYY-MM-DD"
    });



/*******************
Datamap
*******************/

    const map = new Datamap( {
        scope: "world", 
        element: document.getElementById("world-datamap"), 
        responsive: !0, 
        geographyConfig: {
            popupOnHover: !1, 
            highlightOnHover: !1, 
            borderColor: "transparent", 
            borderWidth: 1, 
            highlightBorderWidth: 3, 
            highlightFillColor: "rgba(0,123,255,0.5)", 
            highlightBorderColor: "rgba(255,255,255,0.1)", 
            borderWidth: 1
        }
        , bubblesConfig: {
            popupTemplate: function (e, i) {
                return '<div class="datamap-sales-hover-tooltip">' + i.country + '<span class="m-l-5"></span> ' + i.sold + "</div>"
            }, 
            borderWidth: 0, 
            highlightBorderWidth: 0, 
            highlightFillColor: "rgb(255, 255, 255)", 
            highlightBorderColor: "rgb(255, 255, 255)", 
            fillOpacity: .75
        }
        , fills: {
            Visited: "#f5f5f5", 
            neato: "rgba(0,123,255,1)", 
            white: "rgb(255, 255, 255)", 
            defaultFill: "#EBEFF2"
        }
    });
    
    map.bubbles([ {
        centered: "USA", fillKey: "white", radius: 5, sold: "$500", country: "United States"
    }
    , {
        centered: "SAU", fillKey: "white", radius: 5, sold: "$900", country: "Saudia Arabia"
    }
    , {
        centered: "RUS", fillKey: "white", radius: 5, sold: "$250", country: "Russia"
    }
    , {
        centered: "CAN", fillKey: "white", radius: 5, sold: "$1000", country: "Canada"
    }
    , {
        centered: "IND", fillKey: "white", radius: 5, sold: "$50", country: "India"
    }
    , {
        centered: "AUS", fillKey: "white", radius: 5, sold: "$700", country: "Australia"
    }
    , {
        centered: "BGD", fillKey: "white", radius: 5, sold: "$1500", country: "Bangladesh"
    }
    ]),

    window.addEventListener("resize", function (e) {
        map.resize();
    });
    



/*******************
jQvectormap
*******************/

    $('#world-map').vectorMap({ 
        map: 'world_en',
        backgroundColor: 'transparent',
        borderColor: 'rgb(239, 242, 244)',
        borderOpacity: 0.25,
        borderWidth: 1,
        color: 'rgb(239, 242, 244)',
        enableZoom: true,
        hoverColor: 'rgba(239, 242, 244 0.9)',
        hoverOpacity: null,
        normalizeFunction: 'linear',
        scaleColors: ['#b6d6ff', '#005ace'],
        selectedColor: 'rgba(239, 242, 244 0.9)',
        selectedRegions: null,
        showTooltip: true,
        onRegionClick: function(element, code, region)
        {
            var message = 'You clicked "'
                + region
                + '" which has the code: '
                + code.toUpperCase();
     
            alert(message);
        }
    });

    $('#usa').vectorMap({ 
        map: 'usa_en',
        backgroundColor: 'transparent',
        borderColor: 'rgb(239, 242, 244)',
        borderOpacity: 0.25,
        borderWidth: 1,
        color: 'rgb(239, 242, 244)',
        enableZoom: true,
        hoverColor: 'rgba(239, 242, 244 0.9)',
        hoverOpacity: null,
        normalizeFunction: 'linear',
        scaleColors: ['#b6d6ff', '#005ace'],
        selectedColor: 'rgba(239, 242, 244 0.9)',
        selectedRegions: null,
        showTooltip: true,
        onRegionClick: function(element, code, region)
        {
            var message = 'You clicked "'
                + region
                + '" which has the code: '
                + code.toUpperCase();
     
            alert(message);
        }
    });








/*******************
NOUI Slider
*******************/

    //basic slider
    let basicSlide = document.getElementById('basic-slider');
    noUiSlider.create(basicSlide, {
        start: [20, 80],
        connect: true,
        range: {
            'min': 0,
            'max': 100
        },
        step: 20, 
        pips: {
            mode: 'steps',
            density: 10,
            format: wNumb({
                decimals: 0,
                prefix: '$'
            })
        }
    });
    //basic slider ^


    //slider behaviour snap
    var snapSlider2 = document.getElementById('snap');
    noUiSlider.create(snapSlider2, {
        start: 40,
        behaviour: 'snap',
        connect: [true, false],
        range: {
            'min': 20,
            'max': 80
        }
    });
    //slider behaviour snap ^


    //slider behaviour hover
    var hoverSlider = document.getElementById('hover');
    var field = document.getElementById('hover-val');

    noUiSlider.create(hoverSlider, {
        start: 20,
        behaviour: 'hover-snap',
        range: {
            'min': 0,
            'max': 100
        },
        format: wNumb({
            decimals: 0
        })
    });

    hoverSlider.noUiSlider.on('hover', function (value) {
        field.innerHTML = value;
    });
    //slider behaviour hover ^


    //slider tooltips
    var tooltipSlider = document.getElementById('slider-tooltips');
    noUiSlider.create(tooltipSlider, {
        start: [80, 120],
        tooltips: [wNumb({decimals: 1}), true],
        range: {
            'min': 0,
            'max': 200
        }
    });
    //slider tooltips ^


    //stepping and snapping the values
    var stepSlider = document.getElementById('slider-step');
    noUiSlider.create(stepSlider, {
        start: [4000],
        step: 1000,
        range: {
            'min': [2000],
            'max': [10000]
        }
    });

    var stepSliderValueElement = document.getElementById('slider-step-value');
    stepSlider.noUiSlider.on('update', function (values, handle) {
        stepSliderValueElement.innerHTML = values[handle];
    });
    //stepping and snapping the values ^


    //slider behaviour fixed dragging
    var dragFixedSlider = document.getElementById('drag-fixed');

    noUiSlider.create(dragFixedSlider, {
        start: [40, 60],
        behaviour: 'drag-fixed',
        connect: true,
        range: {
            'min': 20,
            'max': 80
        }
    });
    //slider behaviour fixed dragging ^


    //Number formatting
    var sliderFormat = document.getElementById('slider-format');
    noUiSlider.create(sliderFormat, {
        start: [20000],
        step: 1000,
        range: {
            'min': [20000],
            'max': [80000]
        },
        ariaFormat: wNumb({
            decimals: 0
        }),
        format: wNumb({
            decimals: 3,
            thousand: '.',
            suffix: ' (US $)'
        })
    });

    var inputFormat = document.getElementById('input-format');
    sliderFormat.noUiSlider.on('update', function (values, handle) {
        inputFormat.value = values[handle];
    });

    inputFormat.addEventListener('change', function () {
        sliderFormat.noUiSlider.set(this.value);
    });
    //Number formatting ^


    //working with date
    // Create a new date from a string, return as a timestamp.
    function timestamp(str) {
        return new Date(str).getTime();
    }

    var dateSlider = document.getElementById('slider-date');

    noUiSlider.create(dateSlider, {
    // Create two timestamps to define a range.
        range: {
            min: timestamp('2010'),
            max: timestamp('2016')
        },

    // Steps of one week
        step: 7 * 24 * 60 * 60 * 1000,

    // Two more timestamps indicate the handle starting positions.
        start: [timestamp('2011'), timestamp('2015')],

    // No decimals
        format: wNumb({
            decimals: 0
        })
    });

    var dateValues = [
        document.getElementById('event-start'),
        document.getElementById('event-end')
    ];

    // Create a list of day and month names.
    var weekdays = [
        "Sunday", "Monday", "Tuesday",
        "Wednesday", "Thursday", "Friday",
        "Saturday"
    ];

    var months = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
    ];

    
    
    dateSlider.noUiSlider.on('update', function (values, handle) {
        dateValues[handle].innerHTML = formatDate(new Date(+values[handle]));
    });

    // Append a suffix to dates.
    // Example: 23 => 23rd, 1 => 1st.
    function nth(d) {
        if (d > 3 && d < 21) return 'th';
        switch (d % 10) {
            case 1:
                return "st";
            case 2:
                return "nd";
            case 3:
                return "rd";
            default:
                return "th";
        }
    }

    // Create a string representation of the date.
    function formatDate(date) {
        return weekdays[date.getDay()] + ", " +
            date.getDate() + nth(date.getDate()) + " " +
            months[date.getMonth()] + " " +
            date.getFullYear();
    }
    //working with date ^






/*******************
Counter Up
*******************/

    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

})(jQuery);