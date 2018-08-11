<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>El Niño Southern Oscillation - Marshall Islands Agroforestry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>@-ms-viewport{width:extend-to-zoom;zoom:1.0;}</style>
    <link href="./opensanshawaii/opensanshawaii.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700italic,700" rel="stylesheet" type="text/css">
    <link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include '_header.php'; ?>
    <div id="content" role="main">
    
    <h1>The El Niño Southern Oscillation (ENSO)</h1>
    
    <p>The El Niño Southern Oscillation (ENSO) is a weather pattern that affects the Marshalls (and much of the world).</p>
    
    <ol start="1">
        <li>When the trade winds are normal, it is called a <strong>Neutral</strong> year.</li>
        <li>When trade winds are weaker than normal, or absent, it is an <strong>El Niño</strong> year.</li>
        <li>When the trade winds are stronger than normal, it is a <strong>La Niña</strong> year.</li>
    </ol>
    
    <p>The winds and water temperatures affect rain, storms, drought, and sea level.</p>
    
    <p><h2>El Niño</h2> An El Niño year (Year 0) typically has wet and stormy weather. The year following an El Niño year (Year 1) usually has a strong drought in Micronesia. The storms and drought are bad, but because we can recognize the pattern and predict them, farmers can take action.</p>
    
    <p>
        <figure style="max-width: 900px; margin: 0 auto;">
            <img class="whole" src="images/el-nino-calendar.png" />
            <figcaption class="ack"><a href="acknowledgements.php">Figure adapted from: Lander</a></figcaption>
        </figure>
    </p>
    
    <table class="enso">
    <tr>
        <td colspan="3"><h2>Year 0 – El Niño</h2></td>
        <td colspan="3"><h2>Year 1 – Post El Niño <small>(After-effects)</small></h2></td>
    </tr>
    <tr>
        <td width="21%">Sometime March – August, if scientists see signs that an El Niño year <em>might</em> be starting, they declare an <strong>El Niño Watch</strong>. Farmers should pay attention for further news.</td>
        <td width="18%">A month or more later, <em>if</em> scientists are sure that it is an El Niño year, they declare an <strong>El Niño Advisory</strong>. <a href="el-nino-recommendations.php">Farmers should take action</a>.</td>
        <td width="16%">Around November it becomes apparent whether the El Niño conditions are <strong>strong</strong> or <strong>weak</strong>.</td>
        <td width="15%">Starting around February of the following year, El Niño after-effects like drought begin.</td>
        <td width="16%">When El Niño conditions have ended and conditions are normal (Neutral), a <strong>final advisory</strong> is issued.</td>
        <td>A new watch or advisory <em>might</em> make this “Year 0” for a La Niña or even another El Niño year.</td>
    </tr>
    </table>
    
    <p><h2>La Niña</h2> Watches and advisories are also announced in La Niña years. However, after the time a La Niña advisory is issued (around June of Year 0), there is not a major drought or storm season to predict. For Neutral and La Niña conditions, farmers should care for a variety of crops using good traditional and scientific methods for Marshallese conditions.</p>
    
    <a id="rain_graphs"></a>
    
    <figure>
        <img class="whole" data-bind="visible: whichimage() == 'Majuro'" src="images/Majuro-ENSO-rainfall.png" />
        <img class="whole" data-bind="visible: whichimage() == 'Kwajalein'" src="images/Kwajalein-ENSO-rainfall.png" />
        <figcaption class="ack"><a href="acknowledgements.php">Figure: Rufus</a></figcaption>
    </figure>
    
    
    <div style="text-align: center;">
        <label style="font-weight: bold;">View Graph for Location:</label>
        <span class="optiongroup" data-bind="foreach: ['Majuro', 'Kwajalein']" style="display: inline-block;">
            <button type="button" data-bind="
                text: $data,
                css: {selected: $parent.whichimage() === $data},
                click: function () {$parent.whichimage($data);}"></button>
        </span>
    </div>
    
    <h2>More Information</h2>
    
    <ul>
        <li><a href="http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/enso_advisory/enso-alert-readme.shtml">ENSO alert system</a> (how scientists decide when to announce a <em>watch</em> or <em>advisory</em>)</li>
        <li><a href="el-nino-recommendations.php">El Niño recommendations for agroforestry in the Marshalls</a></li>
        <li><a href="http://www.pacificrisa.org/wp-content/uploads/2015/11/Pacific-Region-EL-NINO-Fact-Sheet_RMI_2015-FINAL-v2.pdf">More about El Niño and its impacts in the Marshalls</a></li>
        <li><a href="http://pcep.prel.org/wp-content/uploads/2015/11/FINAL-Climate-Variability.pdf">Information about ENSO and why the climate in the Pacific is different from year to year.</a></li>
    </ul>
    
    <h3>Maps of rainfall and drought across the Marshall Islands for different ENSO phases</h3>
    
    <p>The two-panel maps at each link below show how rainfall compares with <em>normal</em> for each three-month season (source: <a href="acknowledgements.php">Sutton</a>). If an island falls within a white area of the map, rainfall will be normal for that time of year; greenish color means there will be more rain than is normal for that time of year; brownish color means there will be less rain than is normal. Read through the top maps of each page to see how rainfall progresses during “Year 0” and read through the bottom maps of each page to see how rainfall progresses during “Year 1.” DJF = December-January-February; JFM = January-February-March; etc.</p>
    
    <ul>
        <li><a href="docs/ENSO_Rainfall_Atlas_strong_el_nino.pdf">Moderate – Strong El Niño</a></li>
        <li><a href="docs/ENSO_Rainfall_Atlas_weak_el_nino.pdf">Weak El Niño</a></li>
        <li><a href="docs/ENSO_Rainfall_Atlas_neutral.pdf">Neutral</a></li>
        <li><a href="docs/ENSO_Rainfall_Atlas_weak_la_nina.pdf">Weak La Niña</a></li>
        <li><a href="docs/ENSO_Rainfall_Atlas_strong_la_nina.pdf">Moderate – Strong La Niña</a></li>
    </ul>
    
    </div>
<?php include '_footer.php'; ?>
<script>
(function() {
    var vm = { whichimage: ko.observable('Majuro') };
    ko.applyBindings(vm);
})();
</script>
</body>
</html>
