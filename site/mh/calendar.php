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

<h1>Kōl̗ōn̗ta in kein ekkan ko ilo M̗ajel̗ - ilo iiō ko ejjel̗o̗k El Nin̄o ak La Nin̄a.</h1>

<ul>
    <li>Kōl̗ōn̗ta in ej n̄an iiō ko ejjel̗o̗k El Nin̄o ak La Nin̄a.</li>
    <li>Kōl̗ōn̗ta in M̗ajel̗ ej ajeej ilo ruo m̗ōttan ko, Rak im An̄ōnean̄.</li>
    <li>Kōl̗ōn̗ta in ej pedped ioon iien m̗adm̗ōd an kein ekkan ko kijed, kōnke eto kūtien aer eddek (rej jab ekkat aolep iiō).</li>
    <li>Kōl̗ōn̗ta in kwal̗o̗k wāween an kōto, n̗o, im wōt oktak ilo iiō ko ejjel̗o̗k El Nin̄o ak La Nin̄a.  Naan in kean̄ ko ikijien kein ekkan ko rej juon wōt ilo tōre ko watōki ‘normal’ im La Nin̄a.  Kōl̗ōnta in wal̗o̗k ilo jekjek in doulul n̄an kallikkar ke enaaj bar ro̗o̗l im jino jān jinoun.  <a href="elnino-calendar">Bar juon kōl̗ōnta waj wal̗o̗k n̄an iiō in El Nin̄o ko.</a></li>
    <li>Kōl̗ōn̗ta in elukkuun alikkar ilo M̗ajel̗. Kajojo aelōn̄ emaron̄ wōr aer makmake kōl̗ōn̗ta, el̗ap tata <a href="../images/RMI_30_yr_rain_avg.png" target="_blank">aelōn̄ ko tuiōn̄ bwe el̗apl̗o̗k aer kajoor m̗ōrā.</a></li>
</ul>

<div id="calendar" style="height: 700px; margin: 0 auto"></div>
<calendar-table id="table" params="chartOptions: chartOptions"></calendar-table>

<p style="font-size: .8em;"><em>Kein kakememej:</em> Wōt (Giant taro) im bar jet kain kein ekkan rōmaron̄ kalle aolep iien. kōl̗ōn̗ta in ej kwal̗ok iien m̗adm̗ōd ko ilo tōreen An̄ōnean̄ kōnke ilo tōreen Rak, armej rōkōnaan ekkat mā im iaraj</p>

<p>Wāween ekkat ko jet im kōl̗ōn̗ta ko jet rōmaron̄ bar kōm̗m̗an n̄an kajjojo kein ekkan im kajjojo aelōn̄.  Waan jon̄ak:</p>
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

