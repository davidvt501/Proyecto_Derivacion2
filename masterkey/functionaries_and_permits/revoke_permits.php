<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
session_start();
$db = pg_connect( "$host $port $dbname $credentials"  );
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>select</title>
<meta name="description" content="If we want to fetch all rows from the actor table the following PostgreSQL SELECT statement can be used.">
</head>
<body>
<?php
$campus=$_SESSION["campus"];
$run=$_SESSION["run"];
$_SESSION["run"]=$run;
$_SESSION["campus"]=$campus;


$cod=$_POST['cod'];

$sentencia=("DELETE FROM permits_f WHERE run='$run' AND code='$cod'");
$exe=pg_query($db,$sentencia);

echo 'Se han eliminado los permisos de forma exitosa';

?>
<form action="functionary_and_permits.php" method="post">
  <button>Regresar</button>
  <input type="hidden" name="run" value="<?php echo $run?>">
</form>
</body>
</html>
