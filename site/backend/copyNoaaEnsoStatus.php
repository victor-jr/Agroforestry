<?php

class CopyNoaaEnsoStatus
{
    public function __constuct()
    {
    }

    public function copyData()
    {
        $destDir = '../data/';
        $baseUrl = 'http://www.cpc.ncep.noaa.gov/products/analysis_monitoring/';
        $currentUrl = $baseUrl . 'enso_advisory/ensodisc.shtml';
        $year = date('Y') - 1;
        $decemberUrl = $baseUrl . "enso_disc_dec$year/ensodisc.shtml";
        
        copy($currentUrl, $destDir.'currentEnso.html');
        // also copy to mh directory
        copy($currentUrl, "../mh/data/".'currentEnso.html');

        copy($decemberUrl, $destDir.'lastYearEnso.html');
    }
}

$o = new CopyNoaaEnsoStatus();
$o->copyData();
