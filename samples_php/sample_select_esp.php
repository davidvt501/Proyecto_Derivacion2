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

$result = pg_query($db,"SELECT * FROM prueba where nombre='$_POST[nombre]' AND edad='$_POST[edad]'");
$rows = pg_num_rows($result);
if ($rows>0){
echo "<table>";
while($row=pg_fetch_assoc($result)){
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>Nombre</th>";
  echo "<th>Edad</th>";
  echo "<th>Salud</th>";
  echo "</tr>";
  echo "<tr>";
echo "<td align='center' width='200'>" . $row['id'] . "</td>";
echo "<td align='center' width='200'>" . $row['nombre'] . "</td>";
echo "<td align='center' width='200'>" . $row['edad'] . "</td>";
echo "<td align='center' width='200'>" . $row['salud'] . "</td>";
echo "</tr>";}
echo "</table>";
}else{
  echo 'No se encontraron datos con estos parametros';
}
?>
</div>
</body>
</html>
