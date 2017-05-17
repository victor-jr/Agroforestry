<?php

class CopyGaugeData
{
    public function __construct()
    {
    }

    public function copyData()
    {
        $sourceUrl = 'http://iprc.soest.hawaii.edu/users/mwidlans/Marshall_Islands/';
        $destDir = '../data/';
        
        $files = array(
            'prec_gauge',
            'wspd_gauge',
            'ssh_gauge'
        );

        foreach($files as $file) {
            $latestFile = $this->findLatestFile($file);
            copy($sourceUrl.$latestFile, $destDir.$file.".csv");
            // also copy to mh directory
            copy($sourceUrl.$latestFile, "../mh/data/".$file.".csv");
        }
    }

    public function findLatestFile($fileName) {
        $sourceUrl = 'http://iprc.soest.hawaii.edu/users/mwidlans/Marshall_Islands/';
        $html = file_get_contents($sourceUrl);
        $fileFound = false;
        $day = 31;
        $month = 12;
        $year = date('Y');
        $ext = ".csv";
        
        while($fileFound == false) {
            // prep day numbers below 10 with leading zeros
            $preppedDay = $day;
            if($day < 10) {
                $preppedDay = sprintf("%02d", $preppedDay);
            }
            // convert month number to month abbreviation
            $monthVal = $this->convertMonthToString($month);
            $fileToGet = $fileName."_".$preppedDay."-".$monthVal."-".$year.$ext;
            if (strpos($html, $fileToGet) == false) {
                // loop through the days, months, year
                $day--;
                if($day == 0) {
                    $month--;
                    $day = 31;
                    if($month == 0) {
                        $year--;
                        $month = 12;
                        $day = 31;
                    }
                }
            } else {
                $fileFound = true;
                return $fileToGet;
            }
        }
        
    }

    private function convertMonthToString($monthNum) {
        switch ($monthNum) {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Aug";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Oct";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Dec";
                break;
        }
    }

}

$o = new CopyGaugeData();
$o->copyData();