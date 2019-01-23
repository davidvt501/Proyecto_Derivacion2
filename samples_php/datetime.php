<?php
$date=$_POST['date'];
$time=$_POST['time'];

echo $date;
echo "<br>";
echo $time;
echo "<br>";

$time2=mktime($time);

$timestamp = strtotime($date,$time2);

echo $timestamp;

 ?>
