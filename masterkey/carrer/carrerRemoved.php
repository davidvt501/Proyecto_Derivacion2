<?php

$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );

$cod=$_POST['cod_c'];

$delete_carrer="UPDATE carrer SET active=false WHERE cod_carrer='$cod'";

$exe=pg_query($db,$delete_carrer);

$name_con=pg_query($db,"SELECT * FROM carrer WHERE cod_carrer='$cod'");

$name=pg_fetch_assoc($name_con);

$delete_permits="DELETE FROM permits_f WHERE code='$cod'";

$exe2=pg_query($db,$delete_permits);

?>
<html>
<head>
<head>

<body>
<p> La carrera <?php echo $name['name']?> ha sido removida con sus permisos respectivos </p>
</body>
</html>
