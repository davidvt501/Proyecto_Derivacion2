<?php

$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );

$cod=$_POST['cod_p'];

$delete_prog="UPDATE program SET active=false WHERE cod_program='$cod'";

$exe=pg_query($db,$delete_prog);

$name_con=pg_query($db,"SELECT * FROM program where cod_program='$cod'");

$name=pg_fetch_assoc($name_con);

$delete_permits="DELETE FROM permits_f WHERE code='$cod'";

$exe2=pg_query($db,$delete_permits);

?>
<html>
<head>
<head>

<body>
<p> El programa <?php echo $name['name']?> ha sido removido con sus permisos respectivos </p>
</body>
</html>