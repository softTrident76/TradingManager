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
    "use strict"

    const EPChart = Array.prototype.slice.call($('.easy-pie-chart'));

    EPChart.forEach(chart => {
        $(chart).easyPieChart({
            barColor: function(parcent) {
                return parcent > 75 ? 'rgb(0, 171, 197)' : parcent > 50 ? 'rgb(117, 180, 50)' : parcent > 25 ? 'rgb(7, 135, 234)' : 'rgb(192, 10, 39)';
            }, 
            lineWidth: 2
        });
    })

})(jQuery);