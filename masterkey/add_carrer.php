<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );

$name=$_POST['name'];
$cod=$_POST['cod'];

$consulta_carrera="SELECT * FROM carrer WHERE name='$name' or cod_carrer='$cod'";

$execute=pg_query($db,$consulta_carrera);

$rows=pg_num_rows($execute);

if ($rows>0){
	header('Location: http://localhost/Proyecto_Derivacion/masterkey/carrer/exsistingCarrer.php');
}else{

$nueva_carrera="INSERT INTO carrer values('$cod','$name',true)";

$exe=pg_query($db,$nueva_carrera);
header('Location: http://localhost/Proyecto_Derivacion/masterkey/carrer/success.php');
}


 ?>