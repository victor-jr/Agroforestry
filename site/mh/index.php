<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Agroforestry in the Climate of the Marshall Islands</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>@-ms-viewport{width:extend-to-zoom;zoom:1.0;}</style>
    <link href="../opensanshawaii/opensanshawaii.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700italic,700" rel="stylesheet" type="text/css">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
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

        <h2>Kuwōta in (mel̗el̗e kein rej kōkāāl aolep allōn̄)</h2>

        <div class="gauges">
            <div class="variable">Wōt</div>
            <div>
                <div id="rain_recent" class="gauge"></div>
                <div id="rain_outlook" class="gauge"></div>
            </div>

            <div class="variable">Kajoor in kōto</div>
            <div>
                <div id="wind_recent" class="gauge"></div>
                <div id="wind_outlook" class="gauge"></div>
            </div>

            <div class="variable">Utiej in lo̗jet eo</div>
            <div>
                <div id="sealevel_recent" class="gauge"></div>
                <div id="sealevel_outlook" class="gauge"></div>
            </div>
        </div>

        <p>N̄an mel̗el̗e ko rōl̗l̗ap l̗o̗k kijjien mel̗el̗e kein rej wal̗o̗k ilōn̄ lale website eo an <a href="http://apdrc.soest.hawaii.edu/dashboard_RMI/">Marshall Islands Climate Outlook</a> em Pacific ENSO Applications Center (PEAC)  <a href="http://www.weather.gov/peac/update">bulletin</a>.</p>

    </td>

    <td class="column">
        <h2>Iiō in (mel̗el̗e kein rej kōkāāl aolep allōn̄)</h2>

        <img class="loading" src="../images/loading_lg.gif" data-bind="hidden: display" />

        <div data-bind="visible: display, if: display" style="display: none;">
            <div class="gauges">
                <div class="variable" data-bind="text: advisory"></div>
                <div class="when-updated" data-bind="visible: advisoryDate">kōkāāl <a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/enso_advisory/ensodisc.html">{{advisoryDate}}</a></div>
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
                    <li>Ta in <a href="enso.php">El Niño/La Niña pattern</a>?</li>
                    <li>Ekkatak kōn iien ko ruo ilo m̗antin M̗ajel̗ āinwōt an̄an ean̄ kab rak (etan allōn̄ kein rej wal̗o̗k ilo kajin M̗ajel̗) <a href="calendar.php">agroforestry calendar</a>.</li>
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
                        <img class="arrow" src="../images/now-arrow.png" data-bind="arrow: {now: currentMonth, width: 513, offset: 48}" />
                        <img class="whole" src="../images/el-nino-calendar-watch.png" />
                        <figcaption class="ack"><a href="acknowledgements.php">Figure adapted from: Lander</a></figcaption>
                    </figure>
                <!-- /ko -->

                <!-- ko case: $default -->
                    <figure id="calendar" style="max-width: 600px; margin: 0 auto;">
                        <img class="arrow" src="../images/now-arrow.png" data-bind="arrow: {now: currentMonth, width: 750, offset: 10}" />
                        <img class="whole" src="../images/el-nino-calendar.png" />
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
    <h2>Aitokan an juon menin eddek (ak keinikkan) ak juon armej mour</h2>

    <ul>
        <li><a href="longterm-recommendations.php">Wōjke im keinikkan ko</a> me rōmaron̄ in mour ilo det jilōn̄lōn̄ im pel̗aak ko rōjo̗o̗l̗.</li>

        <li><a href="longterm-recommendations.php#tradition_food">Amān m̗ōn̄ā kein kannin aelōn̄ kein</a> me rōkōjparok ājmour eo am̗ kōn el̗ap ōn ko ie.</li>

        <li><a href="longterm-recommendations.php#coastal_forest">Kwal̗o̗k am̗ kea kōn mar ko rej eddek tōrerein kappe</a> me rej bo̗kuj bok eo jān an rōm̗ im rej kōjparoki keinikkan ko jān aer jo̗o̗l̗i.</li>

        <li><a href="longterm-recommendations.php#longterm_effect">Ekkatak kōn jekjek ko rej wal̗o̗k n̄an pel̗aak ko im men in eddek ko jān ak oktak mejatoto eo pel̗aakin in M̗ajel̗.</a></li>
    </ul>
</div>

</div>
<?php include '_footer.php'; ?>

<script type="text/javascript" src="./js/jquery.query-object.js"></script>
<script type="text/javascript" src="./js/knockout-switch-case.min.js"></script>
<script type="text/javascript" src="./js/highcharts.js"></script>
<script type="text/javascript" src="./js/highcharts-more.js"></script>
<script type="text/javascript" src="./js/exporting.js"></script>
<script type="text/javascript" src="./js/gauge.js"></script>
<script type="text/javascript" src="./js/gradstop.js"></script>
<script type="text/javascript" src="./js/calendar.js"></script>
<script type='text/javascript' src='./js/csv.js'></script>
<script type='text/javascript' src='./js/condition-gauges.js'></script>
<script type='text/javascript' src='./js/index.js'></script>

</body>
</html>
