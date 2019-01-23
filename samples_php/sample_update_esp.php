<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>select</title>
<meta name="description" content="If we want to fetch all rows from the actor table the following PostgreSQL SELECT statement can be used.">
</head>
<body>
<h1>sample text</h1>
<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );

$consulta_i = pg_query($db,"SELECT * FROM prueba where nombre='$_POST[nombre]'");
$rows = pg_num_rows($consulta_i);

if ($rows>0){
$result = pg_query($db,"UPDATE prueba SET nombre='$_POST[nombre_n]' where nombre='$_POST[nombre]'");
echo 'Cambio de nombre realizado exitosamente';
}else{
  echo 'No existen registros con dichos parametros';
}
?>
</div>
</body>
</html>
