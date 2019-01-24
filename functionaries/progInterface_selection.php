<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$cod_program=$_SESSION["cod"];
$_SESSION["cod"]=$cod_program;

 ?>
<html>
<head>

</head>


<body>
<a href="../functionaries/pending_Interface.php">Derivaciones Pendientes</a>
<a href="../functionaries/programmed_Interface.php">Derivaciones Programadas</a>
<a href="">Derivaciones Realizadas</a>
</body>

</html>
