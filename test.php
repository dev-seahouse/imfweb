<?php
date_default_timezone_set("Asia/Singapore");
$a=new DateTime("1:30"); //end
$b=new DateTime("23:00"); //start
$interval=$a->diff($b);

echo $interval->format("%h:%i");


?>

