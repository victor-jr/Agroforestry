<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Normal calendar - Marshall Islands Agroforestry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>@-ms-viewport{width:extend-to-zoom;zoom:1.0;}</style>
    <link href="./opensanshawaii/opensanshawaii.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700italic,700" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include '_header.php'; ?>
<div id="content" role="main">

<h1>Marshallese agroforestry calendar – normal years</h1>

<ul>
<li>This is a generalized calendar for “normal” years.</li>
<li>The Marshallese year is divided into two major seasons, <em>Añōn Rak</em> and <em>Añōneañ</em>.</li>
<li>The calendar focuses on harvest times of traditional crops, because they are perennial (not planted every year).</li>
<li>This calendar shows how wind, waves and rain change during the seasons of an “average” year. Agroforestry recommendations are similar for “average,” neutral or La Niña years. The calendar is circular because the patterns generally repeat unless there is an El Niño. <a href="elnino-calendar.php">A different calendar is shown for El Niño years</a>.</li>
<li>This calendar is very general for the Marshalls. Each atoll could have its own calendar, since the <a href="images/RMI_30_yr_rain_avg.png">northern atolls have a strong dry season</a>.</li>
</ul>

<div id="calendar" style="height: 700px; margin: 0 auto"></div>
<calendar-table id="table" params="chartOptions: chartOptions"></calendar-table>


<p style="font-size: .8em;"><em>Note:</em> Giant land taro (wōt) and some other crops could be harvested year round; this calendar shows them with harvest seasons during Añōneañ because people prefer to harvest other crops at other times.</p>

<p>Other planting or harvesting calendars can be created for different crops and different atolls. Examples include:</p>
<ul>
    <li><a href="../docs/SpennemanCalendar.pdf">Seasonality of Marshallese Food Plants</a> by Spenneman</li>
    <li><a href="../docs/FromKarness-edited.pdf">Availability of Fruits and Vegetables in Majuro</a> by Aikne and Kusto</a></li>
</ul>


</div>
<?php include '_footer.php'; ?>

<script type="text/javascript" src="../js/highcharts.js"></script>
<script type="text/javascript" src="../js/exporting.js"></script>
<script type="text/javascript" src="../js/gradstop.js"></script>
<script type="text/javascript" src="../js/calendar.js"></script>
<script type="text/javascript" src="../js/calendar-table.js"></script>

<script>
(function() {
var chart = calendar('#calendar');

var vm = {
    chartOptions: $('#calendar').highcharts().userOptions
};
ko.applyBindings(vm, $('#table')[0]);

})();
</script>

</body>
</html>
