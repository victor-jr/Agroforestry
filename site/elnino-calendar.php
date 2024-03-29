<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>El Niño calendar - Marshall Islands Agroforestry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>@-ms-viewport{width:extend-to-zoom;zoom:1.0;}</style>
    <link href="./opensanshawaii/opensanshawaii.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700italic,700" rel="stylesheet" type="text/css">
    <link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include '_header.php'; ?>
<div id="content" role="main">

<h1>Marshallese agroforestry calendar — El Niño</h1>

<ul>
<li>This calendar shows how wind, waves and rain change during the onset and peak of an El Niño year, and the aftereffects of drought and reduced harvests the following year.</li>
<li>The total El Niño phase takes about two years. When it ends, it does not cycle back on itself — it usually goes back to neutral or La Niña conditions, so go to the <a href="calendar.php">“normal” calendar</a>.</li>
<li>The Marshallese year is divided into two major seasons, Rak and An̄ōnean̄. The El Niño year makes Rak early and wet, and the following year makes An̄ōnean̄ very long.</li>
<li>The calendar focuses on <em>harvest</em> times of traditional crops, because they are perennial (not planted every year). Harvests are small (fewer crops are gathered) during and after an El Niño drought.</li>
<li><a href="el-nino-recommendations.php">Prepare for possible storms and care for crops during the first, wet year, and plan ahead for drought in the second year..</a></li>
<li>This calendar is intended to give a general idea of the effects of El Nino on the Marshalls. However it is not exactly accurate for each atoll because they are all different. Maybe someone could create a different calendar for each atoll. The <a href="images/RMI_30_yr_rain_avg.png" target="_blank">northern atolls have a strong dry season</a> and are more affected by the El Nin̄o drought.</li>

<div id="container" style="height: 800px; margin: 0 auto"></div>

<calendar-table id="table" params="chartOptions: chartOptions"></calendar-table>

<p style="font-size: .8em;"><em>Note:</em> Giant land taro (wōt) and some other crops could be harvested year round; this calendar shows them with harvest seasons during An̄ōnean̄ because during Rak, people prefer to harvest breadfruit and true taro.</p>
</div>
<?php include '_footer.php'; ?>

<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/exporting.js"></script>
<script type="text/javascript" src="js/gradstop.js"></script>
<script type="text/javascript" src="js/elnino-calendar.js"></script>
<script type="text/javascript" src="js/calendar-table.js"></script>

<script>
(function() {
var vm = {
    chartOptions: $('#container').highcharts().userOptions
};
ko.applyBindings(vm, $('#table')[0]);

})();
</script>

</body>
</html>

