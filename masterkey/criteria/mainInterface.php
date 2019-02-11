<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
session_start();
$db = pg_connect( "$host $port $dbname $credentials"  );
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
$conCritAcad=pg_query($db,"SELECT * FROM criteria WHERE type='a' ORDER BY cod");
$conCritSocEm=pg_query($db,"SELECT * FROM criteria WHERE type='s' ORDER BY cod");
$conCrit=pg_query($db,"SELECT * FROM criteria ORDER BY cod");
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8">
 <title>select</title>
 <link rel="stylesheet" type="text/css" href="../../assets/css/funcionarios.css">
 <link rel="stylesheet" type="text/css" href="../../assets/css/funcionarios2.css">
 <link rel="stylesheet" type="text/css" href="../../assets/css/boxes.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
<script>
function buscarSelect()
{	// creamos un variable que hace referencia al select
	var select=document.getElementById("soflow-color");
	// obtenemos el valor a buscar
	var buscar=document.getElementById("buscar").value;
	// recorremos todos los valores del select
	for(var i=1;i<select.length;i++)
	{
		if(select.options[i].value==buscar)
		{
			// seleccionamos el valor que coincide
			select.selectedIndex=i;
		}
	}
}
</script>
 </head>
 <body>


	 <div class="header">

 <a href="http://www.ucn.cl/" class="image fit"><img src="../../images/ucnlogo.png" align="right" style="width:100px; height:100px"; alt=""></a>
 <a href="../criteria_and_studentsInterface.php" class="image fit"><img src="../../assets/images/back-arrow.png" align="left" style="width:90px; height:90px"; alt=""></a>
</div>

<div class="container">
  <h2>Modificar Criterios:</h2>
  <div class="panel panel-default">
    <div class="panel-body">
      <b> Lista de Criterios</b>
      <br>
      <i> Criterios Academicos: </i>
      <?php while($mostrar=pg_fetch_assoc($conCritAcad)){
        echo '<li>'.$mostrar['criteria_definition'].' - Codigo: '.$mostrar['cod'].'';
      } ?>
      <br>
      <br>
      <i> Criterios Socio-Emocionales </i>
      <?php while($mostrar2=pg_fetch_assoc($conCritSocEm)){
        echo '<li>'.$mostrar2['criteria_definition'].' - Codigo: '.$mostrar2['cod'].'';
      } ?>
      <br>
      <br>
      <b> Agregar Criterio</b>
        <form name="carrera_a" action="add_criteria.php" method="POST">
        	Descripcion:
          <br>
          <textarea id="confirmationText" class="text" cols="70" rows ="5" name="criteria_definition" required placeholder="Describa aqui el criterio"></textarea> <br>
          <br>
          Tipo de Criterio:
          <select id="soflow-color2" name="type" required>
            <option value="" selected>Seleccione un Tipo:</option>
            <option value="s">Socio Emocional</option>
            <option value="a">Academico</option>
          </select>
          <br>
        	<input type="submit" value="Agregar">
        </form>
        <br>
        <b>Eliminar Criterios:</b>
        <br>
        Buscar criterio por Codigo:
        <form onsubmit="return false">
          <input type="text" id="buscar"><input type="submit" value="Buscar" onclick="buscarSelect()">
        </form>
          <p>
            Buscar criterio manualmente:
            <form method="post" action="delete_criteria.php">
            <select id="soflow-color" name="cod" required>
              <option value="" selected>Seleccione el Criterio:</option>
                      <?php
                  while ($mostrar3=pg_fetch_assoc($conCrit)){
                    echo '<option name="run" value="'.$mostrar3['cod'].'">'.$mostrar3['criteria_definition'].'</option>';
                  }
                ?>
                    </select>
                    <br>
                    <button type="submit">Eliminar</button>
                  </form>
          </p>
    </div>
  </div>
</div>


 </body>
 </html>
