<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>El Niño calendar - Marshall Islands Agroforestry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>@-ms-viewport{width:extend-to-zoom;zoom:1.0;}</style>
    <link href="./opensanshawaii/opensanshawaii.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700italic,700" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include '_header.php'; ?>
<div id="content" role="main">

<h1>Kōl̗ōn̗ta in kin ekkan ko an Ri-M̗ajel̗ - El Nin̄o</h1>

<ul>
    <li>Kōl̗ōn̗ta in ej kwal̗ok wāween an kōto, n̗o, im wōt oktak ilo tōreen an jino im iol̗ap in iiō in El Nin̄o, im an̄jiwiwi ko einwōt iien m̗ōrā im dik l̗o̗k an le kein ekkan ilo iiō n̗e ālkin.</li>
    <li>Aitok in tōreen El Nin̄o ekkā an ruo iiō. N̄e ejem̗l̗o̗k, eban bar jino jen jinoin, ekkā an ro̗o̗l n̄an bar jekjek eo m̗okta n̄e ejjab eoktak im La Nin̄a, lale  <a href="calendar.php">“normal”</a> kōl̗ōn̗ta.</li>  
    <li>Kōl̗ōn̗ta in M̗ajel̗ ej ajej ilo ruo m̗ōttan ko, Rak im An̄ōnean̄. El Nin̄o ej kōm̗m̗an bwe Rak en kadu kūtien im m̗ōl̗awi, im tok ālik kōm̗m̗an bwe An̄ōnean̄ en aetok kūtien.</li>
    <li>Kōl̗ōn̗ta in ej pedped ioon iien m̗adm̗ōd ko an kein ekkan ko kijed, kōnke eto kūtien aer eddek (rej jab ekkat aolep iiō). Iien m̗adm̗ōd kein rej dik l̗o̗k itok wōt jān an̄ōnean̄ in El Nin̄o.</li>
    <li>Kōl̗ōn̗ta in ej pedped ioon iien m̗adm̗ōd ko an kein ekkan ko kijed, kōnke eto kūtien aer eddek (rej jab ekkat aolep iiō). Edik tōprak ko ilo iien m̗adm̗ōd (eiet kein ekkan) itok jān an̄ōnean̄ in El Nin̄o</li>
    <li><a href="el-nino-recommendations.php">Pojak n̄an iien l̗an̄ ko im loloorjake kein ekkan ko ilo iiō n̗e jinoin, bwe em̗ōl̗awi, im jino l̗ōmn̗ak e iiō in m̗ōrā n̗e ej pojak in wal̗ok iiō n̗e tokālik.</a></li>
    <li>Kōl̗ōn̗ta in ej n̄an kwal̗o̗k mel̗el̗e ikijjeen jorrāān ko wal̗o̗k jān El Nin̄o ilo M̗ajel̗. Ijo wōt ke, ej jab lukkuun alikkar n̄an kajjojo aelōn̄ bwe reoktak jān doon.  Emaron̄ wōr emaron̄ naaj kōm̗m̗an kōl̗ōnta n̄an kajjojo iaan aelōn̄ ko.  <a href="../images/RMI_30_yr_rain_avg.png" target="_blank">Aelōn̄ ko tuiōn̄ rōkajoor aer m̗ōrā</a> im l̗apl̗o̗k aer kajoor jorrāān jān iien m̗ōrā ko ilo El Nin̄o.</li>
</ul>

<div id="container" style="height: 800px; margin: 0 auto"></div>

<calendar-table id="table" params="chartOptions: chartOptions"></calendar-table>

<p style="font-size: .8em;"><em>Kein kakememej:</em> Wōt (Giant taro) im bar jet kain kein ekkan rōmaron̄ kalle aolep iien. kōl̗ōn̗ta in ej kwal̗ok iien m̗adm̗ōd ko ilo tōreen An̄ōnean̄ kōnke ilo tōreen Rak, armej rōkōnaan ekkat mā im iaraj</p>
</div>
<?php include '_footer.php'; ?>

<script type="text/javascript" src="./js/highcharts.js"></script>
<script type="text/javascript" src="./js/exporting.js"></script>
<script type="text/javascript" src="./js/gradstop.js"></script>
<script type="text/javascript" src="./js/elnino-calendar.js"></script>
<script type="text/javascript" src="./js/calendar-table.js"></script>

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
