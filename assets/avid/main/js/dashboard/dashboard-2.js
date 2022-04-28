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


    //Sparkline

    $("#sparkline_btc1").sparkline([33, 22, 68, 54, 8, 30, 74, 7, 36, 5, 41, 19, 43, 29,], {
        type: "line",
        width: "100%",
        height: "50",
        lineColor: "rgba(255,255,255,0.5)",
        lineWidth: 2,
        fillColor: "transparent",
        minSpotColor: "rgba(255,255,255,0.5)",
        maxSpotColor: "rgba(255,255,255,0.5)",
        highlightLineColor: "rgba(0, 0, 0, 0.2)",
        highlightSpotColor: "rgba(255,255,255,0.5)",
        disableTooltips: true,
        disableHighlight:true
    });

    $("#sparkline_btc2").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "100%",
        height: "50",
        lineColor: "rgba(255,255,255,0.5)",
        lineWidth: 2,
        fillColor: "transparent",
        minSpotColor: "rgba(255,255,255,0.5)",
        maxSpotColor: "rgba(255,255,255,0.5)",
        highlightLineColor: "rgba(0, 0, 0, 0.2)",
        highlightSpotColor: "rgba(255,255,255,0.5)",
        disableTooltips: true,
        disableHighlight:true
    });
    $("#sparkline_btc3").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "100%",
        height: "50",
        lineColor: "rgba(255,255,255,0.5)",
        lineWidth: 2,
        fillColor: "transparent",
        minSpotColor: "rgba(255,255,255,0.5)",
        maxSpotColor: "rgba(255,255,255,0.5)",
        highlightLineColor: "rgba(0, 0, 0, 0.2)",
        highlightSpotColor: "rgba(255,255,255,0.5)",
        disableTooltips: true,
        disableHighlight:true
    });
    $("#sparkline_btc4").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "100%",
        height: "50",
        lineColor: "rgba(255,255,255,0.5)",
        lineWidth: 2,
        fillColor: "transparent",
        minSpotColor: "rgba(255,255,255,0.5)",
        maxSpotColor: "rgba(255,255,255,0.5)",
        highlightLineColor: "rgba(0, 0, 0, 0.2)",
        highlightSpotColor: "rgba(255,255,255,0.5)",
        disableTooltips: true,
        disableHighlight:true
    });

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


    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    
})(jQuery);
















// })(jQuery);