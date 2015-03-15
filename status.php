<?php
$timezone = "Asia/Bangkok";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$time=date("H:i");
echo $time;
?>