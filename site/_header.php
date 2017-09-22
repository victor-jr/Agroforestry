<?php
    $fileInfo = pathinfo($_SERVER['SCRIPT_FILENAME']);
    $this_page = @$fileInfo['filename'];
?>
<div id="content_skip" role="navigation"><a href="#content">Skip to content</a></div>
<div class="header">
    <div class="dept-header">
        <div class="header-inner">
            <div class="banner"><img src="images/Agroforestry_banner_1300px.jpg" alt="Agroforestry in the Climate of the Marshall Islands"></div>
            <div role="navigation" class="mobile-flag-menu">
                <a href="#"><span lang="mh" xml:lang="mh">Kajin M̧ajeļ</span></a> 
                <br/>
                <a href="javascript:translate_to_english()">English</a>
            </div>
            <div class="go-to-menu"><a href="#main-menu" title="Open/close menu">Menu</a></div>
            <div role="navigation" class="menu" id="main-menu">
                <div class="inner">
                    <ul>
                        <li<?php if($this_page=="index"){echo ' class="active"';}?>><a href=".">Home</a></li>
                        <li<?php if($this_page=="enso"){echo ' class="active"';}?>><a href="enso.php">El Niño/La Niña Pattern</a></li>
                        <li<?php if($this_page=="calendar"){echo ' class="active"';}?>><a href="calendar.php">Calendar (Normal)</a></li>
                        <li<?php if($this_page=="elnino-calendar"){echo ' class="active"';}?>><a href="elnino-calendar.php">Calendar (El Niño)</a></li>
                        <li<?php if($this_page=="el-nino-recommendations"){echo ' class="active"';}?>><a href="el-nino-recommendations.php">El Niño Recommendations</a></li>
                        <li<?php if($this_page=="longterm-recommendations"){echo ' class="active"';}?>><a href="longterm-recommendations.php">Long term Recommendations</a></li>
                        <li<?php if($this_page=="coastal-forest"){echo ' class="active"';}?>><a href="coastal-forest.php">Coastal Forest</a></li>
                        <li<?php if($this_page=="salt-tolerant"){echo ' class="active"';}?>><a href="salt-tolerant.php">Salt and Drought Tolerant Species</a></li>

                    </ul>
                </div>
            </div>
            <div role="navigation" class="flag-menu" id="flag-menu">
                <div class="flag-inner">           
                  <table cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <a id="rmi_translate_img" href="javascript:translate_to_marshallese()"><img src="images/rmi_flag.png" alt="RMI Flag" hspace="10" style="width:60px;height:30px;" display="inline-block"></a><br />
                        <a id="rmi_translate" href="javascript:translate_to_marshallese()"><span lang="mh" xml:lang="mh">Kajin M̧ajeļ</span></a> 
<!--                        <a href="#">Kajin M̧ajeļ</a> -->
<!--                        <a href="#">Kajin Majel</a> -->
                      </td>
                      <td>
                        <a href="#"><img src="images/us_flag.png" alt="USA Flag" hspace="10" style="width:60px;height:30px;" display="inline-block"></a><br />
                        <a href="#">English</a>
                      </td>
                    </tr>
                  </table>     
               </div>
            </div>
            
        </div>
    </div>
</div>
