<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
session_start();
$db = pg_connect( "$host $port $dbname $credentials"  );
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8">
 <title>select</title>
 <link rel="stylesheet" type="text/css" href="../assets/css/funcionarios.css">
 <link rel="stylesheet" type="text/css" href="../assets/css/boxes.css">
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
 <a href="http://www.ucn.cl/" class="image fit"><img src="../images/ucnlogo.png" align="right" style="width:100px; height:100px"; alt=""></a>
</div>


<div class="card card-1>
	<form method="post">
	</form>
	<div>
	<p>Funcionarios y Permisos</p>
	<form name="empty" action="#" method="post">
	<img src="../assets/images/employees.png" alt="carrera" height="190" width="190">
	<br> <input type="submit" value="Acceder">
	</form>
	</div>
</div>

	<div class="card card-2>
		<form method="post">
		</form>
		<div>
		<form name="empty" action="#" method="post">
		<img src="#" alt="carrera" height="190" width="190">
		<p>Seleccione</p>
		<select id="soflow-color" name="cod" required>
			<?php
				//empty

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
		<form name="empty" action="#" method="post">
		<img src="#" alt="carrera" height="190" width="190">
		<p>Seleccione</p>
		<select id="soflow-color" name="cod" required>
			<?php
				//empty

			?>
		</select>
		<input type="submit" value="Acceder">
		</form>
		</div>
	</div>

 </body>
 </html>
