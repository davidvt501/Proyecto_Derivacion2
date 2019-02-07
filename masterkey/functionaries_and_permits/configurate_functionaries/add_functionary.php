<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
session_start();
$db = pg_connect( "$host $port $dbname $credentials"  );

$consulta="SELECT * FROM functionary where run='$_POST[run]'";

$con=pg_query($db,$consulta);

$rows=pg_num_rows($con);

if ($rows>0){
  header ("Location: existentFunctionary.php");

}else{
  $sql="INSERT INTO functionary values('$_POST[run]','$_POST[name]','$_POST[phone]','$_POST[mail]',123,true,'$campus')";

  $result = pg_query($db,$sql);
  header ("Location: success.php");
}


 ?>
