<?php

$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );

$cod=$_POST['cod_p'];

$delete_prog="UPDATE program SET program_state=false WHERE cod_program='$cod'";

$exe=pg_query($db,$delete_prog);

$delete_permits="DELETE FROM permits_f WHERE code='$cod'";

$exe2=pg_query($db,$delete_permits);

?>
