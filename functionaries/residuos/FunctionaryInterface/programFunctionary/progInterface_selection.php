<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$cod_program=$_POST["cod"];
$_SESSION["cod"]=$cod_program;
$run=$_SESSION["run"];
$_SESSION["run"]=$run;
 ?>
<html>
<head>

</head>


<body>
<a href="pendingDerivations_Interface.php">Derivaciones Pendientes</a>
<a href="programmedDerivations_Interface.php">Derivaciones Programadas</a>
<a href="completedDerivations_Interface.php">Derivaciones Realizadas</a>
<br>
<form action="../functionaryInterface_selection.php" method="post">
<button type="submit">Regresar<button>
<input type="hidden" value="<?php echo $cod_program ?>" name="cod">
</form>
</body>

</html>