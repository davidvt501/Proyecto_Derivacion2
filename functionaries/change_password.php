<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$run=$_SESSION["run"];
$_SESSION["run"]=$run;

?>
<html>
<head>

</head>

<body>
<form action="password_verification.php" method="post">
Ingrese su contraseña actual <br>
<input type="text" name="pass"> <br>
Ingrese su nueva contraseña <br>
<input type="text" name="new_pass"> <br>
<input type="submit" value="Enviar">
</form>
<a href="http://localhost/Proyecto_Derivacion2/functionaries/functionary_selection.php">Regresar</a>
</body>
</html>
