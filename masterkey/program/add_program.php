<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$name=$_POST['name'];
$cod=$_POST['cod'];
$type=$_POST['type'];
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;

$consulta_programa="SELECT * FROM program WHERE name='$name' or cod_program='$cod'";

$execute=pg_query($db,$consulta_programa);

$rows=pg_num_rows($execute);

if ($rows>0){
	header('Location: exsistingProgram.php');
}else{
$nuevo_prog="INSERT INTO program values('$cod','$name',true,'$type','$campus')";

$exe=pg_query($db,$nuevo_prog);
header('Location: success.php');

}
 ?>
