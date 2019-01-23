<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );

$name=$_POST['name'];
$cod=$_POST['cod'];

$consulta_programa="SELECT * FROM program WHERE name='$name' or cod_program='$cod'";

$execute=pg_query($db,$consulta_programa);

$rows=pg_num_rows($execute);

if ($rows>0){
	echo 'No';
}else{
$nuevo_prog="INSERT INTO program values('$cod','$name',true)";

$exe=pg_query($db,$nuevo_prog);
echo 'Si';
}
 ?>
