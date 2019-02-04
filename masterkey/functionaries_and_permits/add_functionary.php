<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );

$consulta="SELECT * FROM functionary where run='$_POST[run]'";

$con=pg_query($db,$consulta);

$rows=pg_num_rows($con);

if ($rows>0){
  echo 'Este funcionario ya se encuentra dentro del sistema';

}else{
  $sql="INSERT INTO functionary values('$_POST[run]','$_POST[name]','$_POST[phone]','$_POST[mail]',123,true)";

  $result = pg_query($db,$sql);
}


 ?>
