<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Agroforestry in the Climate of the Marshall Islands</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>@-ms-viewport{width:extend-to-zoom;zoom:1.0;}</style>
    <link href="./opensanshawaii/opensanshawaii.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700italic,700" rel="stylesheet" type="text/css">
    <link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
include '_header.php';
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<div id="content" role="main">

<table class="columns" style="margin-top: 1.28em;"><tbody>
    <tr>
    <td class="column" style="width: 45%;">

        <h2>This quarter (updated monthly)</h2>

        <div class="gauges">
            <div class="variable">Rainfall</div>
            <div>
                <div id="rain_recent" class="gauge"></div>
                <div id="rain_outlook" class="gauge"></div>
            </div>

            <div class="variable">Wind speed</div>
            <div>
                <div id="wind_recent" class="gauge"></div>
                <div id="wind_outlook" class="gauge"></div>
            </div>

            <div class="variable">Sea level <small>(not including waves or tides)</small></div>
            <div>
                <div id="sealevel_recent" class="gauge"></div>
                <div id="sealevel_outlook" class="gauge"></div>
            </div>
        </div>

        <p>For more detail on the above information see the <a href="http://apdrc.soest.hawaii.edu/dashboard_RMI/">Marshall Islands Climate Outlook</a> and the Pacific ENSO Applications Center (PEAC) <a href="http://www.weather.gov/peac/update">bulletin</a>.</p>
        
        <p>Daily information on inundations is available for <a href="http://www.pacioos.hawaii.edu/shoreline/runup-kwajalein/">Kwajelein</a> and <a href="http://www.pacioos.hawaii.edu/shoreline/runup-majuro/">Majuro</a>. For daily information on storms and inundations, stay tuned to radio or the ‘chatty beetle.’</p>

    </td>

    <td class="column">
        <h2>This year (updated monthly)</h2>

        <img class="loading" src="images/loading_lg.gif" data-bind="hidden: display" />

        <div data-bind="visible: display, if: display" style="display: none;">
            <div class="gauges">
                <div class="variable" data-bind="text: advisory"></div>
                <div class="when-updated" data-bind="visible: advisoryDate">Updated <a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/enso_advisory/ensodisc.html">{{advisoryDate}}</a></div>
                <div>
                    <!-- ko if: recentGaugeValue -->
                        <div class="gauge" data-bind="elninoGauge: {value: recentGaugeValue, which: 'recent'}"></div>
                    <!-- /ko -->
                    <!-- ko if: outlookGaugeValue -->
                        <div class="gauge" data-bind="elninoGauge: {value: outlookGaugeValue, which: 'outlook'}"></div>
                    <!-- /ko -->
                </div>
            </div>

            <!-- ko switch: display -->
            <!-- ko case: 'normal' -->
                <ul style="margin-bottom: 0;">
                    <li>What is the <a href="enso.php">El Niño/La Niña pattern</a>?</li>
                    <li>Learn about the Marshallese traditional <a href="calendar.php">agroforestry calendar</a>.</li>
                </ul>
                <div id="calendar" style="width: 420px; height: 350px; margin: 0 auto" data-bind="calendar"></div>
            <!-- /ko -->

            <!-- ko case: $default -->

                <!-- ko if: display() === 'watch' -->
                    <p>An El Niño is possible. Listen to the news and continue to check this website to learn what might happen next.</p>
                <!-- /ko -->

                <ul>
                    <li>What is the <a href="enso.php">El Niño/La Niña pattern</a>?</li>
                    <li>How does El Niño affect the <a href="elnino-calendar.php">agroforestry calendar</a>?</li>
                    <!-- ko ifnot: recentGaugeValue() == 1 && outlookGaugeValue() == 5 -->
                        <li><a href="el-nino-recommendations.php#storms">Prepare</a> for possible storms.</li>
                        <li>Wet weather will affect your crops during the El Niño year—<a href="el-nino-recommendations.php#wet">care for them</a>.</li>
                    <!-- /ko -->
                    <li><a href="el-nino-recommendations.php#drought">Plan ahead</a> for <!--ko if: display() === 'watch'-->possible <!--/ko-->drought after the El Niño year.</li>
                </ul>

                <!-- ko switch: display -->
                <!-- ko case: 'watch' -->
                    <figure id="calendar" style="max-width: 375px; margin: 0 auto;">
                        <img class="arrow" src="images/now-arrow.png" data-bind="arrow: {now: currentMonth, width: 513, offset: 48}" />
                        <img class="whole" src="images/el-nino-calendar-watch.png" />
                        <figcaption class="ack"><a href="acknowledgements.php">Figure adapted from: Lander</a></figcaption>
                    </figure>
                <!-- /ko -->

                <!-- ko case: $default -->
                    <figure id="calendar" style="max-width: 600px; margin: 0 auto;">
                        <img class="arrow" src="images/now-arrow.png" data-bind="arrow: {now: currentMonth, width: 750, offset: 10}" />
                        <img class="whole" src="images/el-nino-calendar.png" />
                        <figcaption class="ack"><a href="acknowledgements.php">Figure adapted from: Lander</a></figcaption>
                    </figure>
                <!-- /ko -->
                <!-- /ko -->

            <!-- /ko -->
            <!-- /ko -->

        </div>
    </td>
    </tr>
</tbody></table>

<div>
    <h2>Long term: The lifetime of a tree or person</h2>

    <ul>
        <li><a href="longterm-recommendations.php">Plant resilient trees and crops</a> that can tolerate drought and salty conditions.</li>

        <li><a href="longterm-recommendations.php#tradition_food">Enjoy traditional foods</a> that keep you healthy with vitamins and fiber.</li>

        <li><a href="longterm-recommendations.php#coastal_forest">Care for coastal forest</a> that holds the shoreline and protects crops from salt spray.</li>

        <li>Learn about the <a href="longterm-recommendations.php#longterm_effect">effects of climate change</a> in the Marshalls.</li>
    </ul>
</div>

</div>
<?php include '_footer.php'; ?>

<script type="text/javascript" src="js/jquery.query-object.js"></script>
<script type="text/javascript" src="js/knockout-switch-case.min.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/highcharts-more.js"></script>
<script type="text/javascript" src="js/exporting.js"></script>
<script type="text/javascript" src="js/gauge.js"></script>
<script type="text/javascript" src="js/gradstop.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type='text/javascript' src='js/csv.js'></script>
<script type='text/javascript' src='js/condition-gauges.js'></script>
<script type='text/javascript' src='js/index.js'></script>
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=11330033;
var sc_invisible=1;
var sc_security="ce881b73";
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" + scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="web stats"
href="http://statcounter.com/" target="_blank"><img class="statcounter"
src="//c.statcounter.com/11330033/0/ce881b73/1/" alt="web
stats"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
</body>
</html>
