(function () {

// Displays a "normal" circular calendar
// see elnino-calendar.js for the El Nino calendar

// array.foreach polyfill
function arrayForEach(array, action) {
    for (var i = 0, j = array.length; i < j; i++)
        action(array[i], i);
}
// support rounding to a certain number decimal places
Number.prototype.round = function(places) {
    return +(Math.round(this + "e+" + places) + "e-" + places);
}

var monthsColor =  "#434348",
    months = [
        { name: 'Juun', y: 30 },
        { name: 'Jul̗ae', y: 31 },
        { name: 'O̗kwōj', y: 31 },
        { name: 'Jeptōm̗ba', y: 30 },
        { name: 'Oktoba', y: 31 },
        { name: 'Nobōm̗ba', y: 30 },
        { name: 'Tijem̗ba', y: 31 },
        { name: 'Jānwōde', y: 31 },
        { name: 'Pāpode', y: 28 },
        { name: 'M̗aaj', y: 31 },
        { name: 'Eprōl̗', y: 30 },
        { name: 'Māe', y: 31 }
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
function donutSeries(series) {
	var currentsize = 90;
    arrayForEach(series, function(item) {
        if (item.visible !== false) {
        	item.size = currentsize + '%';
    		currentsize -= item.width + (item.space || 2);
        }
    });
    arrayForEach(series.slice(0).reverse(), function(item) {
        if (item.visible !== false) {
        	var	width = item.width;
    		currentsize += width + (item.space || 2);
        	item.innerSize = (currentsize * 100 / (currentsize + width)).round(2) + '%';
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
    rain_Normal = [ 604, 630, 658, 678, 710, 678, 572, 432, 377, 421, 502, 567 ],
    rain_Legend = {'710': 'rainy', '377': 'dry'},
    rain_NormalData = coloredMonthSeriesFromData(rain_Normal, rain_Low, rain_ColorResolution, rain_Colors, rain_Legend);

var wind_Low = 5,
    wind_High = 16,
    wind_ColorResolution = 0.2,
    wind_Stops = Math.ceil((wind_High - wind_Low) / wind_ColorResolution) + 1,
    wind_LowColor = "#FCE2C5",
    wind_HighColor = "#E78B28",
    wind_Colors = gradStop({ stops: wind_Stops, colorArray: [wind_LowColor, wind_HighColor]}),
    wind_LegendColor = legendGradient(wind_HighColor, wind_LowColor),
    wind_Normal = [ 12.1260, 9.4684, 5.5549, 6.2969, 6.4990, 10.8886, 13.1930, 15.7401, 15.3343, 14.7704, 14.1817, 13.6804 ],
    wind_Legend = { '5.5549': 'calm', '15.7401': 'windy' },
    wind_NormalData = coloredMonthSeriesFromData(wind_Normal, wind_Low, wind_ColorResolution, wind_Colors, wind_Legend);

var season_Low = 0,
    season_High = 1,
    season_ColorResolution = 0.1,
    season_Stops = Math.ceil((season_High - season_Low) / season_ColorResolution) + 1,
    season_LowColor = "#FFFF00",
    season_HighColor = "#00B050",
    season_Colors = gradStop({ stops: season_Stops, colorArray: [season_LowColor, season_HighColor]}),
    season_LegendColor = legendGradient(season_HighColor, season_LowColor),
    season_Legend = { "1": "rak (summer, wet)", "0.5": "transition", "0": "añōneañ (winter, dry)" },
    season_Normal = [ 1, 1, 1, 1, 1, 0, 0, 0, 0, .25, .5, .75 ],
    season_NormalData = coloredMonthSeriesFromData(season_Normal, season_Low, season_ColorResolution, season_Colors, season_Legend);

var production_Legend = {
    "1": "more harvest",
    "0.5": "some harvest",
    "0.4": "some harvest",
    "0.3": "some harvest",
    "0.2": "less harvest",
    "0": "less harvest"
};

//Colors: make breadfruit green-to-white (like rak). Make pandanus yellow-to-white (like annonean). For the other crops, use unique colors, like red, purple.

var breadfruit_Season = [ 1, 1, 1, 0.6, 0.2, 0.2, 0.2, 0, 0.4, 0.4, 0.4, 0.7 ],
    breadfruit_Color = "#48AD20",
    breadfruit_LegendColor = legendGradient(breadfruit_Color, nonProductionColor),
    breadfruit_Data = productionSeries(1, breadfruit_Season, breadfruit_Color, production_Legend);

var pandanus_Season = [ 0.3, 0.3, 0.5, 0.8, 0.9, 1, 1, 1, 0.9, 0.8, 0.3, 0.3 ],
    pandanus_Color = "#C8C629",
    pandanus_LegendColor = legendGradient(pandanus_Color, nonProductionColor),
    pandanus_Data = productionSeries(1, pandanus_Season, pandanus_Color, production_Legend);

var arrowroot_Season = [ 0, 0, 0, 0, 0.5, 1, 1, 1, 1, 0.2, 0, 0 ],
    arrowroot_Color = "#8D1400",
    arrowroot_LegendColor = legendGradient(arrowroot_Color, nonProductionColor),
    arrowroot_Data = productionSeries(1, arrowroot_Season, arrowroot_Color, production_Legend);

var gianttaro_Season = [ 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0 ],
    gianttaro_Color = "#534163",
    gianttaro_LegendColor = legendGradient(gianttaro_Color, nonProductionColor),
    gianttaro_Data = productionSeries(1, gianttaro_Season, gianttaro_Color, {"1": "more harvest", "0": "(see note below)"});

var truetaro_Season = [ 1, 1, 1, 0.5, 0, 0, 0, 0, 0, 0.5, 0.5, 1 ],
    truetaro_Color = "#836E74",
    truetaro_LegendColor = legendGradient(truetaro_Color, nonProductionColor),
    truetaro_Data = productionSeries(1, truetaro_Season, truetaro_Color, production_Legend);

var yearround_Season = [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
    yearround_Color = "#F4C73C",
    yearround_Data = productionSeries(1, yearround_Season, yearround_Color, {"1": "harvest"});


// initialize the calendar within the given element; bare=true displays a calendar without title or legend
window.calendar = function(element, bare) {
    return $(element).highcharts({
        credits: {
            enabled: false
        },
        exporting: {
            filename: 'calendar_normal',
            enabled: !bare
        },
        legend: {
            enabled: !bare
        },
        chart: {
            type: 'pie'
        },
        title: {
            text: bare ? null : 'Marshallese Traditional Agroforestry Calendar'
        },
        subtitle: {
            text: bare ? null : 'Weather and harvest seasons'
        },
        yAxis: { },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%']
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
            data: rain_NormalData,
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
            name: 'Wind',
            data: wind_NormalData,
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
            data: coloredMonthSeriesFromData([ 2, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1 ], 0, 1, [nonProductionColor, "#70D3AA", "#22AC74"], {"2": "more likely", "1": "possible"}),
            visible: false,
            showInLegend: false
        }, {
            name: 'Probability',
            tableLabel: 'Tropical storms – neutral/La Niña years',
            data: coloredMonthSeriesFromData([ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ], 0, 1, ["#8C959B", "#2D3D4B"], {"0": "almost no risk"}),
            visible: false,
            showInLegend: false
        }, {
            name: 'Seasons',
            tableLabel: 'Named seasons',
            data: season_NormalData,
            width: 6,
            space: 10,
            dataLabels: { enabled: false },
            borderColor: 0,
            showInLegend: true,
            legendColor: season_LegendColor,
            legendType: 'default'
        }, {
            name: 'Breadfruit',
            tableLabel: 'Breadfruit (<a href="http://www.hawaii.edu/cpis/MI/plants/ma.html">mā</a>, <a href="http://www.agroforestry.net/images/pdfs/A.mariannensis-dugdug.pdf">mejwaan</a>)',
            data: breadfruit_Data,
            width: 6,
            dataLabels: { enabled: false },
            borderColor: 0,
            showInLegend: true,
            legendColor: breadfruit_LegendColor,
            legendType: 'default'
        }, {
            name: 'Pandanus',
            tableLabel: 'Pandanus (<a href="http://www.hawaii.edu/cpis/MI/plants/bob.html">bōb</a>)',
            data: pandanus_Data,
            width: 6,
            dataLabels: { enabled: false },
            borderColor: 0,
            showInLegend: true,
            legendColor: pandanus_LegendColor,
            legendType: 'default'
        }, {
            name: 'Arrowroot',
            tableLabel: 'Arrowroot (<a href="http://www.hawaii.edu/cpis/MI/plants/makmok.html">ṃakṃōk</a>)',
            data: arrowroot_Data,
            width: 6,
            dataLabels: { enabled: false },
            borderColor: 0,
            showInLegend: true,
            legendColor: arrowroot_LegendColor,
            legendType: 'default'
        }, {
            name: 'Giant land taro',
            tableLabel: 'Giant land taro (<a href="http://www.hawaii.edu/cpis/MI/plants/wot.html">wōt</a>)',
            data: gianttaro_Data,
            width: 6,
            dataLabels: { enabled: false },
            borderColor: 0,
            showInLegend: true,
            legendColor: gianttaro_LegendColor,
            legendType: 'default'
        }, {
            name: 'True taro',
            tableLabel: 'True taro (<a href="http://www.hawaii.edu/cpis/MI/plants/kotak.html">kōtak</a>)',
            data: truetaro_Data,
            width: 6,
            dataLabels: { enabled: false },
            borderColor: 0,
            showInLegend: true,
            legendColor: truetaro_LegendColor,
            legendType: 'default'
        }, {
            name: 'Year-round',
            tableLabel: 'Year-round: coconut (<a href="http://www.hawaii.edu/cpis/MI/plants/ni.html">ni</a>), '+
                'banana (<a href="http://www.hawaii.edu/cpis/MI/plants/keepran.html">keeprañ</a>), ' +
                'giant swamp taro (<a href="http://www.hawaii.edu/cpis/MI/plants/iaraj.html">iaraj</a>)',
            data: yearround_Data,
            visible: false,
            showInLegend: false
        }])
    });
};

}());
