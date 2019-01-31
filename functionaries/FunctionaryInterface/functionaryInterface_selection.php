<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
session_start();
$run=$_SESSION["run_f"];
$_SESSION["run"]=$run;
$db = pg_connect( "$host $port $dbname $credentials"  );


$sql_carrer="SELECT * FROM permits_f where run='$run' AND permisson_state!=false AND permisson_type='c'";
		$result=pg_query($db,$sql_carrer);
$sql_program="SELECT * FROM permits_f where run='$run' AND permisson_state!=false AND permisson_type='p'";
$result2=pg_query($db,$sql_program);
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8">
 <title>select</title>
 <link rel="stylesheet" type="text/css" href="../../assets/css/funcionarios.css">
 <link rel="stylesheet" type="text/css" href="../../assets/css/boxes.css">
 <style>
br {
display: block;
margin: 2px 0;
}
 </style>
 <style>
body {
margin: 0;
}

.header {
text-align: center;
background: #1abc9c;
color: white;
font-size: 5px;
}
</style>
 </head>
 <body>


	 <div class="header">
 <a href="http://www.ucn.cl/" class="image fit"><img src="../../images/ucnlogo.png" align="right" style="width:100px; height:100px"; alt=""></a>
</div>


	<div class="card card-1>
		<form method="post">
		</form>
		<div>
		<form name="hola" action="carrerBoss/carrerInterface_selection.php" method="post">
		<img src="../../assets/images/boss_carrer.png" alt="carrera" height="190" width="190">
		<p>Seleccione una carrera</p>
		<select id="soflow-color" name="cod" required>
			<?php
				while($mostrar=pg_fetch_assoc($result)){
					echo '<option name="cod" value="'.$mostrar['code'].'">'.$mostrar['name'].'</option>';
				}

			?>
		</select>
		<input type="submit" value="Acceder">
		</form>
		</div>
	</div>

	<div class="card card-2>
		<form method="post">
		</form>
		<div>
		<form name="hola" action="programFunctionary/progInterface_selection.php" method="post">
		<img src="../../assets/images/program2.png" alt="carrera" height="190" width="190">
		<p>Seleccione un programa</p>
		<select id="soflow-color" name="cod" required>
			<?php
				while($mostrar2=pg_fetch_assoc($result2)){
					echo '<option name="cod" value="'.$mostrar2['code'].'">'.$mostrar2['name'].'</option>';
				}

			?>
		</select>
		<input type="submit" value="Acceder">
		</form>
		</div>
	</div>

	<div class="card card-3>
		<form method="post">
		</form>
		<div>
		<form name="hola" action="password/change_password.php" method="post">
		<br>
		<img src="../../assets/images/key.png" alt="carrera" height="190" width="190">
		<p>Cambiar contraseña</p>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<input type="submit">
		</form>
		</div>
	</div>
 </body>
 </html>
