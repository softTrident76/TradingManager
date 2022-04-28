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

(function($) {
    "use strict"

    // Clock pickers
    var input = $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });

    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function () {
        console.log(this.value);
    });

    $('#check-minutes').click(function (e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });

})(jQuery)