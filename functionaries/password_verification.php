<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$run=$_SESSION["run"];

$pass=$_POST['pass'];
$new_pass=$_POST['new_pass'];

$consulta_pass=pg_query($db,"SELECT * FROM functionary WHERE run='$run' and pass='$pass'");

$pass_db=pg_fetch_assoc($consulta_pass);

if($pass==$pass_db['pass']){
	$cambio_pass=pg_query($db,"UPDATE functionary SET pass='$new_pass' WHERE run='$run'");
	echo 'Contraseña Cambiada exitosamente';
	echo '<br>';
	echo '<a href="http://localhost/Proyecto_Derivacion/functionaries/functionary_selection.php">Regresar</a>';
}else{
	echo 'Contraseña erronea, intentelo nuevamente.';
	echo '<br>';
	echo '<a href="http://localhost/Proyecto_Derivacion/functionaries/functionary_selection.php">Regresar</a>';
}

?>

