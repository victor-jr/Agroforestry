(function () {

// Displays a the El Nino circular calendar
// see calendar.js for the "normal" calendar

// array.foreach polyfill
function arrayForEach(array, action) {
    for (var i = 0, j = array.length; i < j; i++)
        action(array[i], i);
}
// support rounding to a certain number decimal places
Number.prototype.round = function(places) {
    return +(Math.round(this + "e+" + places)  + "e-" + places);
}

var monthsColor =  "#434348",
    months = [
        { name: 'Jānwōde', y: 31 },
        { name: 'Pāpode', y: 28 },
        { name: 'M̗aaj', y: 31 },
        { name: 'Eprōl̗', y: 30 },
        { name: 'Māe', y: 31 },
        { name: 'Juun', y: 30 },
        { name: 'Jul̗ae', y: 31 },
        { name: 'O̗kwōj', y: 31 },
        { name: 'Jeptōm̗ba', y: 30 },
        { name: 'Oktoba', y: 31 },
        { name: 'Nobōm̗ba', y: 30 },
        { name: 'Tijōm̗ba', y: 31 },
        { name: 'Jānwōde', y: 31 },
        { name: 'Pāpode', y: 28 },
        { name: 'M̗aaj', y: 31 },
        { name: 'Eprōl̗', y: 30 },
        { name: 'Māe', y: 31 },
        { name: 'Juun', y: 30 },
        { name: 'Jul̗ae', y: 31 },
        { name: 'O̗kwōj', y: 31 },
        { name: 'Jeptōm̗ba', y: 30 },
        { name: 'Oktoba', y: 31 },
        { name: 'Nobōm̗ba', y: 30 }
    ];

arrayForEach(months, function(month) { month.color = monthsColor });

// return a HighChart series array from the given data;
// merges consecutive equal value into a single data point;
// sets the color and legend based on the given parameters
//      data: array of values for each month
//      lowValue: the value of colors[0]
//      resolution: the difference between the values of each color; so colors[1] is equal to lowValue + resolution
//      colors: array of colors
//      labels: labels for matched values
function coloredMonthSeriesFromData(data, lowValue, resolution, colors, legend) {
    var chartData = [],
        lastValue = 0,
        countedDays = 0;
    function pushData() {
        if (countedDays) {
            chartData.push({
                name: (legend && legend[lastValue]) || lastValue,
                y: countedDays,
                color: colors[Math.round((lastValue - lowValue) / resolution)] || "gray"
            });
        }
    }
    arrayForEach(data, function(item, i) {
        if (item != lastValue) {
            pushData();
            lastValue = item;
            countedDays = 0;
        }
        countedDays += months[i].y;
    });
    pushData();
    return chartData;
}

// returns a HighChart series for production data
var nonProductionColor = "#E5E5E5";
function productionSeries(maxValue, data, fullProductionColor, legend) {
    return coloredMonthSeriesFromData(data, 0, 0.1, gradStop({ stops: Math.ceil(maxValue / 0.1) + 1, colorArray: [nonProductionColor, fullProductionColor]}), legend);
}

// in a donut chart, HighChart expects each series to have size and innersize values;
// when given in percentages, innerSize is a percentage of the series' size; to produce
// consistently sized rings, this function set these percentages based on "width" and "space" values
//      width: the width of the ring for the series in percentage points of the chart
//      space: the width of the space between this series and the one inside it in percentage points (default is 2)
var multiplier = .8;
function donutSeries(series) {
	var currentsize = 95;
    arrayForEach(series, function(item) {
        if (item.visible !== false) {
    	   item.size = currentsize + '%';
		  currentsize -= ((item.width + (item.space || 2)) * multiplier).round(2);
        }
    });
    arrayForEach(series.slice(0).reverse(), function(item) {
        if (item.visible !== false) {
        	var	width = item.width;
    		currentsize += ((width + (item.space || 2)) * multiplier).round(2);
        	item.innerSize = (currentsize * 100 / (currentsize + (width * multiplier))).round(2) + '%';
        }
    });
	return series;
}

// returns a HighChart vertical gradient "color" given two colors
function legendGradient(top, bottom) {
    return {
        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
        stops: [
            [0, top],
            [1, bottom]
        ]
    };
}

// Values and definitions for each set of data

var rain_Low = 220,
    rain_High = 800,
    rain_ColorResolution = 10,
    rain_Stops = Math.ceil((rain_High - rain_Low) / rain_ColorResolution) + 1,
    rain_LowColor = "#D4D8F9",
    rain_HighColor = "#273de2",
    rain_Colors = gradStop({ stops: rain_Stops, colorArray: [rain_LowColor, rain_HighColor]}),
    rain_LegendColor = legendGradient(rain_HighColor, rain_LowColor),
    rain_Elnino = [ 472, 421, 518, 626, 645, 661, 715, 786, 786, 754, 678, 602, 417, 252, 252, 332, 457, 614, 661, 670, 669, 715, 666 ],
    rain_Legend = {'678': 'wet', '661': 'wet', '786': 'very wet', '421': 'dry', '417': 'dry', '252': 'very dry'},
    rain_ElninoData = coloredMonthSeriesFromData(rain_Elnino, rain_Low, rain_ColorResolution, rain_Colors, rain_Legend);

var wind_Low = 5,
    wind_High = 16,
    wind_ColorResolution = 0.2,
    wind_Stops = Math.ceil((wind_High - wind_Low) / wind_ColorResolution) + 1,
    wind_LowColor = "#FCE2C5",
    wind_HighColor = "#E78B28",
    wind_Colors = gradStop({ stops: wind_Stops, colorArray: [wind_LowColor, wind_HighColor]}),
    wind_LegendColor = legendGradient(wind_HighColor, wind_LowColor),
    wind_Elnino = [ 15.5, 15.5, 13.8, 11.5, 11.9, 12.0, 5.1, 5.1, 8.8, 5.5, 10.5, 14.3, 15.0, 15.0, 14.8, 14.2, 13.7, 12.1, 9.5, 5.6, 6.3, 6.5, 10.9 ],
    wind_Legend = { '5.1': 'variable', '6.3': 'calm', '15.5': 'windy', '15': 'windy' },
    wind_ElninoData = coloredMonthSeriesFromData(wind_Elnino, wind_Low, wind_ColorResolution, wind_Colors, wind_Legend);

var sealevel_Low = -5.4,
    sealevel_High = 3,
    sealevel_ColorResolution = 0.2,
    sealevel_Stops = Math.ceil((sealevel_High - sealevel_Low) / sealevel_ColorResolution) + 1,
    sealevel_LowColor = "#C5FCE5",
    sealevel_HighColor = "#22AC74",
    sealevel_Colors = gradStop({ stops: sealevel_Stops, colorArray: [sealevel_LowColor, sealevel_HighColor]}),
    sealevel_LegendColor = legendGradient(sealevel_HighColor, sealevel_LowColor),
    sealevel_Legend = { 0: 'average', '-5': '5 inches low' },
    sealevel_Elnino = [ 0, 0, 0, 0, 0, 0, -3, -3, -4, -4, -5, -5, -5, -4, -3, -1, -1, 0, 0, 0, 0, 0, 0 ],
    sealevel_ElninoData = coloredMonthSeriesFromData(sealevel_Elnino, sealevel_Low, sealevel_ColorResolution, sealevel_Colors, sealevel_Legend);

var season_Low = 0,
    season_High = 1,
    season_ColorResolution = 0.1,
    season_Stops = Math.ceil((season_High - season_Low) / season_ColorResolution) + 1,
    season_LowColor = "#FFFF00",
    season_HighColor = "#00B050",
    season_Colors = gradStop({ stops: season_Stops, colorArray: [season_LowColor, season_HighColor]}),
    season_LegendColor = legendGradient(season_HighColor, season_LowColor),
    season_Legend = { "1": "rak (summer, wet)", "0.5": "early rains", "0": "añōneañ (winter, dry)" },
    season_Elnino = [ 0, .5, .5, .5, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0 ],
    season_ElninoData = coloredMonthSeriesFromData(season_Elnino, season_Low, season_ColorResolution, season_Colors, season_Legend);

var storm_LowColor = "#8C959B",
    storm_HighColor = "#2D3D4B",
    storm_Colors = gradStop({ stops: 4, colorArray: [storm_LowColor, storm_HighColor]}),
    storm_Legend = { "0": "almost no risk", "1": "little risk", "2": "risk", "3": "higher risk" },
    storm_Values = [ 0, 0, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0 ],
    storm_Data = coloredMonthSeriesFromData(storm_Values, 0, 1, storm_Colors, storm_Legend);

var production_Legend = {
    "1": "more harvest",
    "0.5": "some harvest",
    "0.4": "some harvest",
    "0.3": "some harvest",
    "0.2": "less harvest",
    "0": "less harvest"
};

//Colors: make breadfruit green-to-white (like rak). Make pandanus yellow-to-white (like annonean). For the other crops, use unique colors, like red, purple.


var breadfruit_Season = [ 0, 0.3, 0.4, 0.4, 0.7, 1, 1, 1, 0.6, 0.2, 0.2, 0.2, 0, 0.3, 0.4, 0.4, 0.4, 0.4, 0.4, 0.4, 0.4, 0.2, 0.2 ],
    breadfruit_Color = "#48AD20",
    breadfruit_LegendColor = legendGradient(breadfruit_Color, nonProductionColor),
    breadfruit_Data = productionSeries(1, breadfruit_Season, breadfruit_Color, production_Legend);

var pandanus_Season = [ 1, 0.9, 0.8, 0.3, 0.3, 0.3, 0.3, 0.5, 0.8, 0.9, 1, 1, 1, 0.9, 0.5, 0, 0, 0, 0, 0.3, 0.4, 0.5, 0.8 ],
    pandanus_Color = "#C8C629",
    pandanus_LegendColor = legendGradient(pandanus_Color, nonProductionColor),
    pandanus_Data = productionSeries(1, pandanus_Season, pandanus_Color,  production_Legend);

var arrowroot_Season = [ 1, 1, 0.5, 0, 0, 0, 0, 0, 0.5, 1, 1, 1, 1, 1, 0.5, 0, 0, 0, 0, 0, 0, 0.3, 0.8 ],
    arrowroot_Color = "#8D1400",
    arrowroot_LegendColor = legendGradient(arrowroot_Color, nonProductionColor),
    arrowroot_Data = productionSeries(1, arrowroot_Season, arrowroot_Color, production_Legend);

var gianttaro_Season = [ 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0.5, 0.5, 0.5, 0, 0, 0, 0, 0.5, 0.7, 0.8 ],
    gianttaro_Color = "#534163",
    gianttaro_LegendColor = legendGradient(gianttaro_Color, nonProductionColor),
    gianttaro_Data = productionSeries(1, gianttaro_Season, gianttaro_Color, {"1": "more harvest", "0": "(see note below)"});

var truetaro_Season = [ 0, 0, 0.5, 0.5, 1, 1, 1, 1, 0.5, 0, 0, 0, 0, 0, 0, 0, 0.5, 0.5, 0.5, 0.5, 0.5, 0, 0 ],
    truetaro_Color = "#836E74",
    truetaro_LegendColor = legendGradient(truetaro_Color, nonProductionColor),
    truetaro_Data = productionSeries(1, truetaro_Season, truetaro_Color, production_Legend);

var yearround_Season = [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.7, 0.8 ],
    yearround_Color = "#F4C73C",
    yearround_Data = productionSeries(1, yearround_Season, yearround_Color, {"1": "harvest", "0.5": "less harvest"});

var arrow = ['M', 0, 0, 'L', 100, 0, 'L', 95, 5, 'M', 100, 0, 'L', 95, -5],
    labelCss = { color: '#555', fontWeight: 'bold', fontSize: '11px' };

function onDraw () {
    var chart = this,
        ren = chart.renderer,
        svgBox = ren.box.getBoundingClientRect(),
        r = chart.series[0].group.element.getBoundingClientRect(),
        w = r.width,
        h = r.height,
        x = r.left - svgBox.left,
        y = r.top - svgBox.top,
        centerX = x + w * 0.5,
        centerY = y + h * 0.56,
        scale = Math.min(w/650, 1),
        scale2 = (scale + 1)/2,
        lArrowTransform = 'translate(' + (centerX - 210 * scale) + ' ' + (y + 10 * scale) + ') rotate(-20) scale('+ scale2 +')',
        rArrowTransform = 'translate(' + (centerX + 20 * scale) + ' ' + (y - 5 * scale) + ') rotate(10 100 0) scale('+ scale2 +')';

    if (chart.lArrowGroup) {
        chart.lArrowGroup.attr({ transform: lArrowTransform });
        chart.rArrowGroup.attr({ transform: rArrowTransform });
    } else {
        chart.lArrowGroup = ren.g('lArrowGroup').add();
        ren.path(arrow)
            .attr({
                'stroke-width': 2,
                stroke: '#555'
            })
            .add(chart.lArrowGroup);
        ren.label('Return to <br>normal calendar', 0, -35)
            .css(labelCss)
            .add(chart.lArrowGroup);

        chart.lArrowGroup.attr({ transform: lArrowTransform });

        chart.rArrowGroup = ren.g('rArrowGroup').add();
        ren.path(arrow)
            .attr({
                'stroke-width': 2,
                stroke: '#555'
            })
            .add(chart.rArrowGroup);
        ren.label('Transition from <br>normal calendar', 0, -35)
            .css(labelCss)
            .add(chart.rArrowGroup);

        chart.rArrowGroup.attr({ transform: rArrowTransform });
    }
}

// initialize the calendar within the "container" element
// Create the chart
$('#container').highcharts({
    credits: {
        enabled: false
    },
    exporting: {
        filename: 'calendar_elnino',
        chartOptions: {
            title: {
                text: 'Marshallese agroforestry calendar — El Niño'
            },
            subtitle: {
                text: 'Weather and harvest seasons'
            },
            chart: {
                events: {
                    load: onDraw
                }
            }
        }
    },
    chart: {
        type: 'pie',
        events: {
            load: function () {
                setTimeout(onDraw.bind(this), 1000);
            },
            redraw: function () {
                setTimeout(onDraw.bind(this), 10);
            }
        },
        marginTop: 35
    },
    title: {
        text: null
    },
    yAxis: { },
    plotOptions: {
        pie: {
            shadow: false,
            center: ['50%', '50%'],
            startAngle: 0,
            endAngle: 345
        }
    },
    tooltip: {
        headerFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.key}</b>',
        pointFormat: '',
    },
    series: donutSeries([{
        name: 'Months',
        data: months,
        width: 3,
        dataLabels: {
            distance: 0
        },
        enableMouseTracking: false,
        borderColor: "white"
    }, {
        name: 'Rain',
        tableLabel: '<a href="enso.php#rain_graphs">Rain</a>',
        data: rain_ElninoData,
        width: 6,
        dataLabels: { enabled: false },
        tooltip: {
            headerFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}'
        },
        borderColor: 0,
        showInLegend: true,
        legendColor: rain_LegendColor,
        legendType: 'default'
    }, {
        name: 'Sea Level',
        data: sealevel_ElninoData,
        width: 6,
        dataLabels: { enabled: false },
        tooltip: {
            headerFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}'
        },
        borderColor: 0,
        showInLegend: true,
        legendColor: sealevel_LegendColor,
        legendType: 'default'
    }, {
        name: 'Wind',
        data: wind_ElninoData,
        width: 6,
        dataLabels: { enabled: false },
        tooltip: {
            headerFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}'
        },
        borderColor: 0,
        showInLegend: true,
        legendColor: wind_LegendColor,
        legendType: 'default'
    }, {
        name: 'Probability',
        tableLabel: 'Wave train probability',
        data: coloredMonthSeriesFromData([ 1, 1, 1, 1, 1, 2, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 1, 1, 1 ], 0, 1,
            [nonProductionColor, "#70D3AA", "#22AC74"], {"2": "more likely", "1": "possible"}),
        visible: false,
        showInLegend: false
    }, {
        name: 'Probability',
        tableLabel: 'Tropical storms – El&nbsp;Niño years',
        data: storm_Data,
        visible: false,
        showInLegend: false
    }, {
        name: 'Seasons',
        tableLabel: 'Named seasons',
        data: season_ElninoData,
        width: 6,
        space: 10,
        dataLabels: { enabled: false },
        borderColor: 0,
        showInLegend: true,
        legendColor: season_LegendColor,
        legendType: 'default'
    }, {
        name: 'Breadfruit',
        tableLabel: 'Breadfruit <small>(<a href="http://www.hawaii.edu/cpis/MI/plants/ma.html">mā</a>, <a href="http://www.agroforestry.net/images/pdfs/A.mariannensis-dugdug.pdf">mejwaan</a>)</small>',
        data: breadfruit_Data,
        width: 6,
        dataLabels: { enabled: false },
        borderColor: 0,
        showInLegend: true,
        legendColor: breadfruit_LegendColor,
        legendType: 'default'
    }, {
        name: 'Pandanus',
        tableLabel: 'Pandanus <small>(<a href="http://www.hawaii.edu/cpis/MI/plants/bob.html">bōb</a>)</small>',
        data: pandanus_Data,
        width: 6,
        dataLabels: { enabled: false },
        borderColor: 0,
        showInLegend: true,
        legendColor: pandanus_LegendColor,
        legendType: 'default'
    }, {
        name: 'Arrowroot',
        tableLabel: 'Arrowroot <small>(<a href="http://www.hawaii.edu/cpis/MI/plants/makmok.html">ṃakṃōk</a>)</small>',
        data: arrowroot_Data,
        width: 6,
        dataLabels: { enabled: false },
        borderColor: 0,
        showInLegend: true,
        legendColor: arrowroot_LegendColor,
        legendType: 'default'
    }, {
        name: 'Giant land taro',
        tableLabel: 'Giant land taro <small>(<a href="http://www.hawaii.edu/cpis/MI/plants/wot.html">wōt</a>)</small>',
        data: gianttaro_Data,
        width: 6,
        dataLabels: { enabled: false },
        borderColor: 0,
        showInLegend: true,
        legendColor: gianttaro_LegendColor,
        legendType: 'default'
    }, {
        name: 'True taro',
        tableLabel: 'True taro <small>(<a href="http://www.hawaii.edu/cpis/MI/plants/kotak.html">kōtak</a>)</small>',
        data: truetaro_Data,
        width: 6,
        dataLabels: { enabled: false },
        borderColor: 0,
        showInLegend: true,
        legendColor: truetaro_LegendColor,
        legendType: 'default'
    }, {
        name: 'Year-round',
        tableLabel: 'Year-round: <small>coconut (<a href="http://www.hawaii.edu/cpis/MI/plants/ni.html">ni</a>), '+
            'banana (<a href="http://www.hawaii.edu/cpis/MI/plants/keepran.html">keeprañ</a>), ' +
                'giant swamp taro (<a href="http://www.hawaii.edu/cpis/MI/plants/iaraj.html">iaraj</a>)</small>',
        data: yearround_Data,
        visible: false,
        showInLegend: false
    }])
});

}());
