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
    
       
    
    
    //#marketcap1
    
    
        const marketcap1 = document.getElementById("marketcap1").getContext('2d');
        
        // marketcap1.height = 100;
    
        let barChartData2 = {
            defaultFontFamily: 'Poppins',
            labels: ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'forteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen', 'twenty'],
            datasets: [{
                label: 'Expense',
                backgroundColor: 'rgba(94,16,132,1)',
                hoverBackgroundColor: 'rgba(94,16,132,1)', 
                data: [
                    '20',
                    '14',
                    '18',
                    '25',
                    '27',
                    '22',
                    '12', 
                    '24', 
                    '20', 
                    '14', 
                    '18', 
                    '16', 
                    '34', 
                    '32', 
                    '43', 
                    '36', 
                    '56', 
                    '12', 
                    '23', 
                    '34'
                ]
            }, {
                label: 'Earning',
                backgroundColor: 'rgba(255,255,255,0.75)',
                hoverBackgroundColor: 'rgba(255,255,255,0.75)', 
                data: [
                    '32',
                    '58',
                    '34',
                    '37',
                    '15',
                    '41',
                    '24', 
                    '38', 
                    '52', 
                    '38', 
                    '24', 
                    '19', 
                    '54', 
                    '34', 
                    '23', 
                    '34', 
                    '35', 
                    '22', 
                    '43', 
                    '33'
                ]
            }]
    
        };
    
        new Chart(marketcap1, {
            type: 'bar',
            data: barChartData2,
            options: {
                legend: {
                    display: false
                }, 
                title: {
                    display: false
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                maintainAspectRatio: false, 
                scales: {
                    xAxes: [{
                        display: false, 
                        stacked: true,
                        barPercentage: 1, 
                        barThickness: 5, 
                        ticks: {
                            display: false
                        }, 
                        gridLines: {
                            display: false, 
                            drawBorder: false
                        }
                    }],
                    yAxes: [{
                        display: false, 
                        stacked: true, 
                        gridLines: {
                            display: false, 
                            drawBorder: false
                        }, 
                        ticks: {
                            display: false, 
                            max: 100, 
                            min: 0
                        }
                    }]
                }
            }
        });
    
    
    
    
    //#marketcap2
    
    
        const marketcap2 = document.getElementById("marketcap2").getContext('2d');
    
        new Chart(marketcap2, {
            type: "line",
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April"],
                datasets: [{
                    label: "Sales Stats",
                    backgroundColor: 'rgba(94,16,132,0.21)',
                    borderColor: 'rgba(94,16,132,1)',
                    pointBackgroundColor: 'rgba(94,16,132,1)',
                    pointBorderColor: 'rgba(94,16,132,1)',
                    pointHoverBackgroundColor: 'rgba(94,16,132,1)',
                    pointHoverBorderColor: 'rgba(94,16,132,1)',
                    data: [20, 10, 18, 15, 32, 18, 15, 22, 8, 6, 12, 13, 10, 18, 14, 24, 16, 12, 19, 21, 16, 14, 24, 21, 13, 15, 27, 29, 21, 11, 14, 19, 21, 17]
                }]
            },
            options: {
                title: {
                    display: !1
                },
                tooltips: {
                    intersect: !1,
                    mode: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                legend: {
                    display: !1
                },
                responsive: !0,
                maintainAspectRatio: !1,
                hover: {
                    mode: "index"
                },
                scales: {
                    xAxes: [{
                        display: !1,
                        gridLines: !1,
                        scaleLabel: {
                            display: !0,
                            labelString: "Month"
                        }
                    }],
                    yAxes: [{
                        display: !1,
                        gridLines: !1,
                        scaleLabel: {
                            display: !0,
                            labelString: "Value"
                        },
                        ticks: {
                            beginAtZero: !0
                        }
                    }]
                },
                elements: {
                    line: {
                        tension: .15
                    },
                    point: {
                        radius: 2,
                        borderWidth: 1
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 5,
                        bottom: 0
                    }
                }
            }
        });
    
    
    
    
    
    //#marketcap3
    
    
    const marketcap3 = document.getElementById("marketcap3").getContext('2d');
    
    new Chart(marketcap3, {
        type: "line",
        data: {
            labels: ["January", "February", "March", "April", "May", "June"],
            datasets: [{
                label: "Sales Stats",
                backgroundColor: 'rgba(94,16,132,0.21)',
                borderColor: 'rgba(94,16,132,1)',
                pointBackgroundColor: 'rgba(94,16,132,1)',
                pointBorderColor: 'rgba(94,16,132,1)',
                pointHoverBackgroundColor: 'rgba(94,16,132,1)',
                pointHoverBorderColor: 'rgba(94,16,132,1)',
                data: [0, 18, 14, 24, 16, 30]
            }]
        },
        options: {
            title: {
                display: !1
            },
            tooltips: {
                intersect: !1,
                mode: "nearest",
                xPadding: 5,
                yPadding: 5,
                caretPadding: 5
            },
            legend: {
                display: !1
            },
            responsive: !0,
            maintainAspectRatio: !1,
            hover: {
                mode: "index"
            },
            scales: {
                xAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                        display: !0,
                        labelString: "Month"
                    }, 
                    ticks: {
                        max: 30, 
                        min: 0
                    }
                }],
                yAxes: [{
                    display: !1,
                    gridLines: !1,
                    scaleLabel: {
                        display: !0,
                        labelString: "Value"
                    },
                    ticks: {
                        beginAtZero: !0
                    }
                }]
            },
            elements: {
                line: {
                    tension: 0
                },
                point: {
                    radius: 0,
                    borderWidth: 0
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            }
        }
    });
    
    
    
    $("#sparkline1").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "150px",
        height: "30px",
        lineColor: "rgb(0, 171, 197)",
        fillColor: "rgba(0, 171, 197, .5)",
        minSpotColor: "rgb(0, 171, 197)",
        maxSpotColor: "rgb(0, 171, 197)",
        highlightLineColor: "rgb(0, 171, 197)",
        highlightSpotColor: "rgb(0, 171, 197)"
    });
    
    
    $("#sparkline2").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "150px",
        height: "30px",
        lineColor: "rgb(0, 171, 197)",
        fillColor: "rgba(0, 171, 197, .5)",
        minSpotColor: "rgb(0, 171, 197)",
        maxSpotColor: "rgb(0, 171, 197)",
        highlightLineColor: "rgb(0, 171, 197)",
        highlightSpotColor: "rgb(0, 171, 197)"
    });
    
    
    $("#sparkline3").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "150px",
        height: "30px",
        lineColor: "rgb(0, 171, 197)",
        fillColor: "rgba(0, 171, 197, .5)",
        minSpotColor: "rgb(0, 171, 197)",
        maxSpotColor: "rgb(0, 171, 197)",
        highlightLineColor: "rgb(0, 171, 197)",
        highlightSpotColor: "rgb(0, 171, 197)"
    });
    
    
    $("#sparkline4").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "150px",
        height: "30px",
        lineColor: "rgb(0, 171, 197)",
        fillColor: "rgba(0, 171, 197, .5)",
        minSpotColor: "rgb(0, 171, 197)",
        maxSpotColor: "rgb(0, 171, 197)",
        highlightLineColor: "rgb(0, 171, 197)",
        highlightSpotColor: "rgb(0, 171, 197)"
    });
    
    
    $("#sparkline5").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "150px",
        height: "30px",
        lineColor: "rgb(0, 171, 197)",
        fillColor: "rgba(0, 171, 197, .5)",
        minSpotColor: "rgb(0, 171, 197)",
        maxSpotColor: "rgb(0, 171, 197)",
        highlightLineColor: "rgb(0, 171, 197)",
        highlightSpotColor: "rgb(0, 171, 197)"
    });
    
    
    $("#sparkline6").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "150px",
        height: "30px",
        lineColor: "rgb(0, 171, 197)",
        fillColor: "rgba(0, 171, 197, .5)",
        minSpotColor: "rgb(0, 171, 197)",
        maxSpotColor: "rgb(0, 171, 197)",
        highlightLineColor: "rgb(0, 171, 197)",
        highlightSpotColor: "rgb(0, 171, 197)"
    });
    
    
    $("#sparkline7").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "150px",
        height: "30px",
        lineColor: "rgb(0, 171, 197)",
        fillColor: "rgba(0, 171, 197, .5)",
        minSpotColor: "rgb(0, 171, 197)",
        maxSpotColor: "rgb(0, 171, 197)",
        highlightLineColor: "rgb(0, 171, 197)",
        highlightSpotColor: "rgb(0, 171, 197)"
    });
    
    
    $("#sparkline8").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "150px",
        height: "30px",
        lineColor: "rgb(0, 171, 197)",
        fillColor: "rgba(0, 171, 197, .5)",
        minSpotColor: "rgb(0, 171, 197)",
        maxSpotColor: "rgb(0, 171, 197)",
        highlightLineColor: "rgb(0, 171, 197)",
        highlightSpotColor: "rgb(0, 171, 197)"
    });
    
    
    $("#sparkline9").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "150px",
        height: "30px",
        lineColor: "rgb(0, 171, 197)",
        fillColor: "rgba(0, 171, 197, .5)",
        minSpotColor: "rgb(0, 171, 197)",
        maxSpotColor: "rgb(0, 171, 197)",
        highlightLineColor: "rgb(0, 171, 197)",
        highlightSpotColor: "rgb(0, 171, 197)"
    });
    
    
    $("#sparkline10").sparkline([79, 72, 29, 6, 52, 32, 73, 40, 14, 75, 77, 39, 9, 15, 10], {
        type: "line",
        width: "150px",
        height: "30px",
        lineColor: "rgb(0, 171, 197)",
        fillColor: "rgba(0, 171, 197, .5)",
        minSpotColor: "rgb(0, 171, 197)",
        maxSpotColor: "rgb(0, 171, 197)",
        highlightLineColor: "rgb(0, 171, 197)",
        highlightSpotColor: "rgb(0, 171, 197)"
    });


    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    
    
    
})(jQuery);