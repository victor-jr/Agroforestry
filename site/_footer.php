</div>0
<div class="ui container">
	<div id="disqus_thread"></div>
</div>

<div id="footer">
    <div class="ui container">
        <div id="innerfooter">
            <a href="acknowledgements.php#about_this_project">About this project</a>
            <br/>
            <a href="acknowledgements.php#acknowledgements">Website developed by the University of Hawaiʻi with funding from the DOI USGS Pacific Islands Climate Science Center.</a>
        </div>
    </div>
</div>
<?php
    $host = $_SERVER['REQUEST_URI'];
    if (strpos($host, 'mh') !== false) {
        $mhUrl = '../';
    }
?>
<script type="text/javascript" src="<?php echo $mhUrl; ?>js/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="<?php echo $mhUrl; ?>js/knockout-3.4.0.js"></script>
<script type="text/javascript" src="<?php echo $mhUrl; ?>js/knockout.punches.min.js"></script>
<script type="text/javascript" src="<?php echo $mhUrl; ?>js/home.js"></script>
<script type="text/javascript" src="<?php echo $mhUrl; ?>js/translate_to_marshallese.js"></script>
<script type="text/javascript" src="<?php echo $mhUrl; ?>js/translate_to_english.js"></script>
<script src="<?php echo $mhUrl; ?>js/lightbox.js"></script>
<script type="text/javascript">
(function() {
    ko.punches.enableAll();
})();
</script>
