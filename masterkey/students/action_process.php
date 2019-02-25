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


$action=$_POST["action"];
$cod_program=$_POST["cod_program"];

if($action=='a'){
  $sentence="INSERT INTO program_student VALUES ('$run','$cod_program')";
  $addProgram=pg_query($db,$sentence);
  header ('Location: ');
}else if($action=='r'){

}

?>
