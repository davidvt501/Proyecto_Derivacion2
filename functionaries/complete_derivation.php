<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();

$cod=$_POST["cod"];
$cod_program=$_POST["cod_program"];

$date = date('Y/m/d h:i:s', time());

$complete=pg_query($db,"UPDATE derivation SET datetime_done='$date'
WHERE cod_derivation='$cod'");

$changeStatus=pg_query($db,"UPDATE derivation SET derivation_status=2 WHERE cod_derivation='$cod'");
$_SESSION["cod"]=$cod_program;
?>
<html>
<head>
</head>
<body>
<form action="http://localhost/Proyecto_Derivacion/functionaries/pending_Interface.php" method="post">
<button type="submit">
</form>
</body>
</html>
