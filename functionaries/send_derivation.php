<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();

/* Preparar fecha
$date=$_POST['date'];
//echo "fecha: $date";
$time=$_POST['time'];
//echo "tiempo: $time";

$unix_datetime = strtotime($date." ".$time);

$string_datetime=date('d/m/Y H:i:s',$unix_datetime);
//Fecha lista */

//$con=pg_query($db,"INSERT INTO derivation (cod_program,run_student,run_functionary,support) values(202,'$run','$run_f','Hola')");

if (isset($_POST["academica"]) || isset($_POST["socioEmocional"])) {
  $cod=$_SESSION["cod"];
  $run_f=$_SESSION["run_f"];
  $comment=$_POST['comment'];
  $run=$_POST['run'];
  $slider=$_POST['sliderv'];
  $_SESSION["cod"]=$cod;
  $_SESSION["run_f"]=$run_f;
  $_SESSION["comment"]=$comment;
  $_SESSION["run"]=$run;
  $_SESSION["slider"]=$slider;

  $criteriosArray=[];
  if (isset($_POST["academica"]) && (!isset($_POST["socioEmocional"]))){
    $criteriosArray = $_POST['academica'];
    $_SESSION["criteriosArray"]=$criteriosArray;
    header('Location: ../functionaries/derivAnalysis.php');
  }else if(isset($_POST["socioEmocional"]) && (!isset($_POST["academica"]))){
    $criteriosArray = $_POST['socioEmocional'];
    $_SESSION["criteriosArray"]=$criteriosArray;
    header('Location: ../functionaries/derivAnalysis.php');
  }else if (isset($_POST["academica"]) && isset($_POST["socioEmocional"])){
    $criteriosArray=array_merge($_POST["academica"],$_POST["socioEmocional"]);
    $_SESSION["criteriosArray"]=$criteriosArray;
    header('Location: ../functionaries/derivAnalysis.php');
  }
}else{
header('Location: ../functionaries/noCriteria.html');
}
?>
