
<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );

$run=$_POST['run'];
$exe2=pg_query($db,"UPDATE functionary set functionality_state=true where run='$run'");
$con=pg_query($db,"SELECT * from functionary WHERE run='$run'");
$datos=pg_fetch_assoc($con);

 ?>
<html>
 <head>
 </head>
 
 <body>
 <p>Se han reactivado de manera exitosa los permisos de: <?php echo $datos['name'] ?></p>
 <a href="http://localhost/Proyecto_Derivacion/masterkey/masterkey.php">Regresar</a>
 </body>
 </html>