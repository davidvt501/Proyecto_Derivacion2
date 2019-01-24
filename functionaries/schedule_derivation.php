<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();

$date=$_POST['date'];

$time=$_POST['time'];

$unix_datetime = strtotime($date." ".$time);

$datetime=date('d/m/Y H:i:s',$unix_datetime);
$cod=$_POST["cod"];

$schedule=pg_query($db,"UPDATE derivation SET datetime_programmed='$datetime' WHERE cod_derivation='$cod'");

$changeStatus=pg_query($db,"UPDATE derivation SET derivation_status=1 WHERE cod_derivation='$cod'");
echo $cod;
?>
