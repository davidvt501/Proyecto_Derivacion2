<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
 ?>
<html>
<head>
</head>
<body>
  Criterio agregado de forma exitosa
  <form action="mainInterface.php">
<button type="submit">Regresar</button>
  </form>
</body>
<html>
