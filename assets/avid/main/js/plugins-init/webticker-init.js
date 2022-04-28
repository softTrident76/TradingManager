/**
 * **************************************************
 * ******* Name: arvid
 * ******* Description: Bootstrap 4 Admin Dashboard
 * ******* Version: 1.0.0
 * ******* Released on 2019-02-13 00:31:50
 * ******* Support Email : quixlab.com@gmail.com
 * ******* Support Skype : sporsho9
 * ******* Author: Quixlab
 * ******* URL: https://quixlab.com
 * ******* Themeforest Profile : https://themeforest.net/user/quixlab
 * ******* License: ISC
 * ***************************************************
 */

(function($) {
    "use strict";




    /*
    -------------------
    Ticker
    -------------------*/
    if ($('#webticker-dark-icons').length) {
        
        $("#webticker-dark-icons").webTicker({
            height: 'auto',
            duplicate: true,
            startEmpty: false,
            rssfrequency: 4,
            // startEmpty: true
        });
    };


    /*
    -------------------
    Ticker
    -------------------*/
    if ($('#webticker-wout-icons').length) {

        $("#webticker-wout-icons").webTicker({
                height: 'auto',
                duplicate: true,
                startEmpty: false,
                rssfrequency: 5,
                // startEmpty: true
            });
    };


    /*
    -------------------
    Ticker
    -------------------*/
    if ($('#webticker-big').length) {

        $("#webticker-big").webTicker({
                height: 'auto',
                duplicate: true,
                startEmpty: false,
                rssfrequency: 5,
                // startEmpty: true
            });
    };





})(jQuery);