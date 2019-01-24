<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();

$cod=$_POST["cod"];

$date = date('Y/m/d h:i:s', time());

$complete=pg_query($db,"UPDATE derivation SET datetime_done='$date'
WHERE cod_derivation='$cod'");

$changeStatus=pg_query($db,"UPDATE derivation SET derivation_status=2");
?>
