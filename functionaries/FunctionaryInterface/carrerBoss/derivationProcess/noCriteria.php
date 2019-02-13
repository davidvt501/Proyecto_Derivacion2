<?php

$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );

session_start();
$cod=$_SESSION["cod"];
$run_f=$_SESSION["run_f"];
$_SESSION["run_f"]=$run_f;
$_SESSION["cod"]=$cod;
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;







?>
<html>
<head>
  <title>Titulo</title>
</head>

<body>
  <p>No se escogieron criterios, intentelo nuevamente</p>
  <form action="../derivationForm_interface.php" method="post">
    <button type="submit">Regresar</button>
  </form>
</body>
</html>
