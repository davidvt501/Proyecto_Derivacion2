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

$consulta_carrera="SELECT * FROM carrer WHERE name='$name' or cod_carrer='$cod' AND campus='$campus'";

$execute=pg_query($db,$consulta_carrera);

$rows=pg_num_rows($execute);

if ($rows>0){
	header('Location: http://localhost/Proyecto_Derivacion2/masterkey/carrer/exsistingCarrer.php');
}else{

$nueva_carrera="INSERT INTO carrer values('$cod','$name',true,'$campus')";

$exe=pg_query($db,$nueva_carrera);
header('Location: http://localhost/Proyecto_Derivacion2/masterkey/carrer/success.php');
}


 ?>
