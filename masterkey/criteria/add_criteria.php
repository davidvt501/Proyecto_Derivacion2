<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;

$criteria=$_POST["criteria"];
$type=$_POST["type"];

$pg=pg_query($db,"INSERT INTO criteria (criteria_definition,type) VALUES ('$criteria','$type')");

echo 'done';
 ?>
