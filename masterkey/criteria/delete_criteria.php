<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;

$cod=$_POST['cod'];

$pg=pg_query($db,"DELETE FROM criteria WHERE cod='$cod'");


header ('Location: success_deleting.php');
 ?>
