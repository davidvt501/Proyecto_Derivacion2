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
$prog=$_SESSION['prog'];
date_default_timezone_set("America/Santiago");
$date = date('Y/m/d h:i:s', time());
$criteriosEncodeados=json_encode($criteriosArray);
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;

$derivar=pg_query($db,"INSERT INTO derivation (cod_program,run_student,run_functionary,criteria,derivation_status,datetime_derivated,comment)values('$prog','$run_student','$run_functionary','$criteriosEncodeados',0,'$date','$comment')");

$_SESSION["run_f"]=$run_functionary;
$_SESSION["cod"]=$cod_program;
?>
<html>
<head>
</head>

<body>
  <form action="../carrerInterface_selection.php" method="post">
    <input type="hidden" value="<?php echo $cod_program;?>" name="cod">
<button type="submit">Regresar</button>
  </form>

</body>
</html>
