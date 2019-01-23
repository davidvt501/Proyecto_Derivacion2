<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );

$name=$_POST['name'];
$cod=$_POST['cod'];

$nuevo_prog="INSERT INTO program values('$cod','$name',true)";

$exe=pg_query($db,$nuevo_prog);

 ?>
