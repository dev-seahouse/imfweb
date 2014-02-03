<?php
date_default_timezone_set("Asia/Singapore");
$a=new DateTime("08:30");
$b=new DateTime("01:40");
$interval=$a->diff($b);

echo $interval->format("%h");

?>

