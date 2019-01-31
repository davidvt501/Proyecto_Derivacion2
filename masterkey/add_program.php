<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$name=$_POST['name'];
$cod=$_POST['cod'];
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;

$consulta_programa="SELECT * FROM program WHERE name='$name' or cod_program='$cod'";

$execute=pg_query($db,$consulta_programa);

$rows=pg_num_rows($execute);

if ($rows>0){
	header('Location: http://localhost/Proyecto_Derivacion2/masterkey/program/exsistingProgram.php');
}else{
$nuevo_prog="INSERT INTO program values('$cod','$name',true,'a','$campus')";

$exe=pg_query($db,$nuevo_prog);
echo $campus;
header('Location: http://localhost/Proyecto_Derivacion2/masterkey/program/success.php');

}
 ?>
