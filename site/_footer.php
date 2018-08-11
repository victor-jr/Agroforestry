</div>0
<div class="ui container">
	<div id="disqus_thread"></div>
</div>

<script>
	/**
	*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
	*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
	
	var disqus_config = function () {
	this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
	this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
	};
	
	(function() { // DON'T EDIT BELOW THIS LINE
		var d = document, s = d.createElement('script');
		s.src = 'https://agroforestry-2.disqus.com/embed.js';
		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
	})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//agroforestry-2.disqus.com/count.js" async></script>

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
