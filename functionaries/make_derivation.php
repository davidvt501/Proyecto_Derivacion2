<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$run_student=$_SESSION["run"];
$cod_program=$_SESSION["cod"];
$run_functionary=$_SESSION["run_f"];
$comment=$_SESSION["comment"];
$criteriosArray=$_SESSION["criteriosArray"];
$priority=$_SESSION["priority"];
$date = date('Y/m/d h:i:s', time());
$criteriosEncodeados=json_encode($criteriosArray);

$derivar=pg_query($db,"INSERT INTO derivation (cod_program,run_student,run_functionary,criteria,derivation_status,datetime_derivated)values(204,'$run_student','$run_functionary','$criteriosEncodeados',0,'$date')");

echo $derivar;
?>
