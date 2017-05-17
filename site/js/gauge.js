(function () {

// Display a gauge "chart" within the given element
//
// value: 1, 3, or 5 (1 points to the left, 3 to the middle, and 5 to the right)
// chartLabel: label under the gauge
// colors: array of color values for the gauge (3 values)
// dialColor: color value of the pointer in the gauge
// bandLabels: array of labels for the gauge values (3); optional

window.levelGauge = function(element, value, chartLabel, colors, dialColor, bandLabels) {
    var dialHighlightColor = Highcharts.Color(dialColor).brighten(.7).get('rgb'),
        dialBorderColor = Highcharts.Color(dialColor).brighten(-.3).get('rgb');

    bandLabels = bandLabels || [ 'Below', 'Normal', 'Above' ];

    return $(element).highcharts({
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            marginLeft: 0,
            marginTop: 0,
            marginBottom: 0,
            marginRight: 0
        },

        title: {
            text: null
        },

        tooltip: {
            enabled: false
        },

        pane: {
            center: ['50%', '73%'],
            size: '144%',
            startAngle: -90,
            endAngle: 90,
            background: null
        },

        plotOptions: {
            gauge: {
                animation: false,
                dataLabels: {
                    enabled: true,
                    format: chartLabel,
                    borderRadius: 0,
                    borderWidth: 0,
                    y: 9,
                    style: {color: "black", fontSize: "12pt", fontWeight: "normal", textShadow: "0", fontFamily: "Open Sans Hawaii" }
                },
                dial: {
                    baseLength: '0%',
                    baseWidth: 10,
                    radius: '65%',
                    rearLength: '0%',
                    topWidth: 2,
                    borderWidth: 1,
                    borderColor: dialBorderColor,
                    backgroundColor: dialColor
                },
                pivot: {
                    radius: 9,
                    borderWidth: 1,
                    borderColor: dialBorderColor,
                    backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                        stops: [
                            [0, dialHighlightColor],
                            [1, dialBorderColor]
                        ]
                    }
                }
             }
        },

        // the value axis
        yAxis: {
            labels: {
                enabled: true,
                rotation: 'auto',
                style: {
                    color: 'black'
                }
            },
            tickLength: 0,
            minorTickLength: 0,
            min: 0,
            max: 6,
            categories: {
                1: bandLabels[0],
                3: bandLabels[1],
                5: bandLabels[2]
            },
            tickPositions: [1, 3, 5],
            plotBands: [{
                from: 0,
                to: 2,
                color: colors[0],
                thickness: '50%'
            }, {
                from: 2,
                to: 4,
                color: colors[1],
                thickness: '50%'
            }, {
                from: 4,
                to: 6,
                color: colors[2],
                thickness: '50%'
            }]
        },

        series: [{
            data: [3]       // a starting value of 3 points to the middle; the actual value is set below to get a nice animation
        }]

    }, function (chart) {
        // update the gauge value asynchronously to get a nice animation
        setTimeout(function () {
            var point = chart.series[0].points[0];
            point.update(value, true, {
                duration: 800
            });
        }, 0);
    });
};

}());
