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
if(!$db) {
   echo "Error : Unable to open database\n";
} else {
   echo "Base de datos abierta\n";
}
$result = pg_query($db,"SELECT * FROM prueba");
echo "<table>";while($row=pg_fetch_assoc($result)){echo "<tr>";
echo "<td align='center' width='200'>" . $row['nombre'] . "</td>";
echo "<td align='center' width='200'>" . $row['edad'] . "</td>";
echo "</tr>";}
echo "</table>";

?>
</div>
</body>
</html>
