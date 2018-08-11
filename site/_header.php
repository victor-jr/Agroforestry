<?php
    $fileInfo = pathinfo($_SERVER['SCRIPT_FILENAME']);
		$this_page = @$fileInfo['filename'];
		$host = $_SERVER['REQUEST_URI'];
		$mhUrl = '';
		if (strpos($host, 'mh') !== false) {
			$mhUrl = '../';
		}
?>
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
<script src="semantic/dist/semantic.min.js"></script>
<div id="header">
	<img class="ui attached image" width="100%" src="<?php echo $mhUrl; ?>images/Agroforestry_banner_1300px.jpg" alt="Agroforestry in the Climate of the Marshall Islands" />
		<div class="ui bottom attached menu">
			<a <?php if($this_page=="index"){echo 'active';}?> class="horizontal item" href="."><i class="home icon"></i>Home</a>
			<a <?php if($this_page=="enso"){echo 'active';}?> class="horizontal item" href="enso.php"><i class="umbrella icon"></i>El Niño/La Niña Pattern</a>
			<div class="ui simple dropdown item horizontal item">
			<i class="calendar alternate icon"></i>Calendars
				<i class="dropdown icon"></i>
				<div class="menu">
					<a <?php if($this_page=="calendar"){echo 'active';}?> class="horizontal item" href="calendar.php">Normal</a>
					<a <?php if($this_page=="elnino-calendar"){echo 'active';}?> class="horizontal item" href="elnino-calendar.php">El Niño</a>
				</div>
			</div>
			<div class="ui simple dropdown horizontal item">
			<i class="comment alternate icon"></i>Recommendations
				<i class="dropdown icon"></i>
				<div class="menu">
					<a <?php if($this_page=="el-nino-recommendations"){echo 'active';}?> class="horizontal item" href="el-nino-recommendations.php">El Niño</a>
					<a <?php if($this_page=="longterm-recommendations"){echo 'active';}?> class="horizontal item" href="longterm-recommendations.php">Long term</a>
				</div>
			</div>
			<a <?php if($this_page=="coastal-forest"){echo 'active';}?> class="horizontal item" href="coastal-forest.php"><i class="tree icon"></i>Coastal Forest</a>
			<a <?php if($this_page=="salt-tolerant"){echo 'active';}?> class="horizontal item" href="salt-tolerant.php"><i class="info circle icon"></i>Salt and Drought Tolerant Species</a>
			<div class="right menu">
				<div class="vertical item" style="display:none">
					<div class="ui icon dropdown button">
						<i class="bars icon"></i>
						<div class="menu">
							<a <?php if($this_page=="index"){echo 'active';}?> class="item" href="."><i class="home icon"></i>Home</a>
							<a <?php if($this_page=="enso"){echo 'active';}?> class="item" href="enso.php"><i class="umbrella icon"></i>El/La Pattern</a>
							<div class="ui simple dropdown item item">
							<i class="calendar alternate icon"></i>Calendars
								<i class="dropdown icon"></i>
								<div class="menu">
									<a <?php if($this_page=="calendar"){echo 'active';}?> class="item" href="calendar.php">Normal</a>
									<a <?php if($this_page=="elnino-calendar"){echo 'active';}?> class="item" href="elnino-calendar.php">El Niño</a>
								</div>
							</div>
							<div class="ui simple dropdown item">
							<i class="comment alternate icon"></i>Recommendations
								<i class="dropdown icon"></i>
								<div class="menu">
									<a <?php if($this_page=="el-nino-recommendations"){echo 'active';}?> class="item" href="el-nino-recommendations.php">El Niño</a>
									<a <?php if($this_page=="longterm-recommendations"){echo 'active';}?> class="item" href="longterm-recommendations.php">Long term</a>
								</div>
							</div>
							<a <?php if($this_page=="coastal-forest"){echo 'active';}?> class="item" href="coastal-forest.php"><i class="tree icon"></i>Coastal Forest</a>
							<a <?php if($this_page=="salt-tolerant"){echo 'active';}?> class="item" href="salt-tolerant.php"><i class="info circle icon"></i>Tolerant Species</a>
						</div>
					</div>
				</div>
				<a id="rmi_translate_img" href="javascript:translate_to_english()" class="item">
					<img width="25px" class="ui image" src="<?php echo $mhUrl; ?>images/usa-flag.svg" />
				</a>
				<a id="rmi_translate" href="javascript:translate_to_marshallese()" class="item">
					<img width="25px" class="ui image" src="<?php echo $mhUrl; ?>images/rmi-flag.svg" />
				</a> 
			</div>
		</div>
</div>
<div class="ui container">
<script>
	$('.ui.dropdown')
		.dropdown()
	;
</script>