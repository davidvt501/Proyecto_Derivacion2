<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;

//Recibir Datos
$criteriosArray=$_SESSION["criteriosArray"];
$cod=$_SESSION["cod"];
$run_f=$_SESSION["run_f"];
$comment=$_SESSION["comment"];
$run=$_SESSION["run"];
$prog=$_SESSION['prog'];

//Consultas Nombres
$consulta_nombre_funcionario=pg_query($db,"SELECT * FROM functionary where run='$run_f'");
$nombreFun=pg_fetch_assoc($consulta_nombre_funcionario);
$consulta_nombre_estudiante=pg_query($db,"SELECT * FROM student where run='$run'");
$nombreEs=pg_fetch_assoc($consulta_nombre_estudiante);

//Redirigir datos
$_SESSION["run"]=$run;
$_SESSION["cod"]=$cod;
$_SESSION["run_f"]=$run_f;
$_SESSION["comment"]=$comment;
$_SESSION["criteriosArray"]=$criteriosArray;
$_SESSION['prog']=$prog;

$datProg=pg_query($db,"SELECT * FROM program where cod_program='$prog'");
$nomProg=pg_fetch_assoc($datProg);
?>
<html>
<head>
  <meta charset="utf-8">
  <title>xd</title>
</head>

<body>
  <h1>Resumen Derivacion</h1>
<p>Jefe / Funcionario que deriva: <?php echo $nombreFun['name']; ?> </p>
<p>Estudiante derivado: <?php echo $nombreEs['name'];?></p>
<p> Indicadores considerados: </p>
<ul>
<?php for($i=0; $i < count($criteriosArray); $i++){
    echo " <li>$criteriosArray[$i]</li>";
}
 ?>
</ul>
 <p> Comentario: <?php echo $comment ?> </p>
 <p> Programa: <?php echo $nomProg['name']?> </p>
<form action="../carrerInterface_selection.php" method="post">
  <input type="hidden" value="<?php echo $cod; ?>" name="cod">
  <input type="hidden" value="<?php echo $run_f; ?>" name="run_f">
  <button type="submit">Regresar</button>
</form>
  <form>
  <button type="submit" formaction="make_derivation.php" method="post">Enviar Direccion</button>
</form>
</body>
</html>
