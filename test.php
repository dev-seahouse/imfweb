<?php
date_default_timezone_set("Asia/Singapore");
/*$t1 = strtotime('2013-08-07 12:00');
$t2 = strtotime('2013-08-07 18:30');
$differenceInSeconds = $t2 - $t1;
$differenceInMinutes = $differenceInSeconds / 60;
echo $differenceInMinutes.PHP_EOL;*/

$datetime1 = new DateTime('2013-08-07 12:00');
$datetime2 = new DateTime('2013-08-07 18:35');
$interval = $datetime1->diff($datetime2);
$hours=$interval->days*24;
$hours+=$interval->h;
$hours+=$interval->i/60;
echo $hours;
?>

