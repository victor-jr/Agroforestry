<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Agroforestry in the Climate of the Marshall Islands</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>@-ms-viewport{width:extend-to-zoom;zoom:1.0;}</style>
    <link href="../opensanshawaii/opensanshawaii.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700italic,700" rel="stylesheet" type="text/css">
    <link href="../css/lightbox.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
    <script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
    <script src="../semantic/dist/semantic.min.js"></script>
</head>
<body>
<?php 
include '../_header.php';
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");
?>

<div class="ui container">
    <div id="content" role="main">

        <table class="columns" style="margin-top: 1.28em;"><tbody>
            <tr>
            <td class="column" style="width: 45%;">

                <h2>kobban allōn̄ ko rej jem̗l̗o̗k l̗o̗k in (mel̗el̗e kein rej kōkkāāl aolep allōn̄)</h2>

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
                <h2>Iiō in (mel̗el̗e kein rej kōkkāāl aolep allōn̄)</h2>

                <img class="loading" src="../images/loading_lg.gif" data-bind="hidden: display" />

                <div data-bind="visible: display, if: display" style="display: none;">
                    <div class="gauges">
                        <div class="variable" data-bind="text: advisory"></div>
                        <div class="when-updated" data-bind="visible: advisoryDate">kar kōkkāāl ilo <a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/enso_advisory/ensodisc.html">{{advisoryDate}}</a></div>
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
                            <p>Juon <a href="elnino-calendar">El Niño</a> emaron̄ bōk jikin. Kāron̄jake wōt ennaan im mel̗el̗e ko (ilo retio im ial̗ in leto-letak mel̗el̗e ko jet) em waate website in n̄an lale ta emaron̄ wal̗o̗k tok ālik.</p>
                        <!-- /ko -->

                        <ul>
                            <li>Ta in <a href="enso.php">El Niño/La Niña pattern</a>?</li>
                            <li>Ewi wāween an <a href="elnino-calendar.php">El Niño eo jelōt iien (raan, allōn̄, em ko jet) ekkat wōjke?</a></li>
                            <!-- ko ifnot: recentGaugeValue() == 1 && outlookGaugeValue() == 5 -->
                            <li><a href="el-nino-recommendations.php#storms">M̗aanjab-popo n̄an an maron̄ jetak l̗an̄ em kōto ko.</a></li>
                            <li>M̗ōl̗awi in mejatoto ko rōmaron̄ bar jelōt kein ekkan ko ilo iiōōn El Nin̄o ko - <a href="el-nino-recommendations.php#wet">kōjparoki</a>.</li>
                            <!-- /ko -->
                            <li><a href="el-nino-recommendations.php#drought">M̗aanjab-popo n̄an juon iien emaron̄ m̗ōrā  (ak den̄den̄-in-mājlep) ālikin El Niño eo ilo iiō eo ej jem̗l̗o̗k l̗o̗k.</a></li>
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
                                <img class="whole" src="../images/el-nino-calendar_mh.png" />
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
</div>
<?php include '../_footer.php'; ?>

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
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=11330033;
var sc_security="ce881b73";
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" + scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"<a title="web stats"
href="http://statcounter.com/" target="_blank"><img class="statcounter"
src="//c.statcounter.com/11330033/0/ce881b73/1/" alt="web
stats"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
</body>
</html>
