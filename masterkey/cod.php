<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );

$id_run = $_POST['id_run'];

$query= "SELECT * FROM permits_f WHERE run=$id_run AND state!=false ORDER BY name";
$go=pg_query($db,$query);
$html= "<option value='0'>Seleccionar Permiso</option>";

while($mostrar=pg_fetch_assoc($go){
		$html.= "<option value='".$mostrar['cod']."'>".$mostrar['name']."</option>";
	}

echo $html;
?>
