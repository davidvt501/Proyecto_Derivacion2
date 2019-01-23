<?php
$db = pg_connect("host=localhost port=5432 dbname=db_derv user=postgres password=1234");
$query = "INSERT INTO prueba (nombre,edad,salud) VALUES ('$_POST[nombre]','$_POST[edad]','$_POST[salud]')";
$result = pg_query($query);
echo 'Datos Ingresados';
?>
