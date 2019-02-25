<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
session_start();
$db = pg_connect( "$host $port $dbname $credentials"  );
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;

$cod=$_SESSION["cod"];
$_SESSION["cod"]=$cod;

$run=$_SESSION["run"];
$_SESSION["run"]=$run;

$cod_program=$_SESSION["cod_program"];

$student_name=$_SESSION["student_name"];

$program=pg_query($db,"SELECT * FROM program where cod_program='$cod_program'");
echo $program['name'];

?>
<html>
<head>
</head>
<body>
  <?PHP echo $run;
  echo $cod_program;
  echo $program['name'];
  ?>
</Body>
</html>
