<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$cod=$_POST["cod"];
$run_f=$_SESSION["run_f"];
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;

$_SESSION["run_f"]=$run_f;
$_SESSION["cod"]=$cod;
 ?>
<html>
<head>
</head>


<body>
  <a href="derivationForm_interface.php">Derivaciones</a><br>
</body>
<form action="../functionaryInterface_selection.php" method="post">
  <input type="hidden" value="<?php echo $run_f;?>">
  <button type="submit">Regresar</button>
</form>
</html>
