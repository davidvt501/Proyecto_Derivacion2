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
 <link rel="stylesheet" type="text/css" href="../../../assets/css/funcionarios.css">
 <link rel="stylesheet" type="text/css" href="../../../assets/css/boxes.css">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
	function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');

    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();

    // Formatear RUN
    rut.value = cuerpo + '-'+ dv

    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;

    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {

        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);

        // Sumar al Contador General
        suma = suma + index;

        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

    }

    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);

    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;

    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}
	</script>
 </head>
 <body>


	 <div class="header">

 <a href="http://www.ucn.cl/" class="image fit"><img src="../../../images/ucnlogo.png" align="right" style="width:100px; height:100px"; alt=""></a>
 <a href="modify_functionariesInterface.php" class="image fit"><img src="../../../assets/images/back-arrow.png" align="left" style="width:90px; height:90px"; alt=""></a>
</div>

<div class="container">
  <h2>Agregar funcionario:</h2>
  <div class="panel panel-default">
    <div class="panel-body">
      <p>
        <form name="insert" action="add_functionary.php" method="POST">
      			RUN:
      			<input class="input_rut" type="text" name="run" placeholder="RUN completo sin puntos" oninput="checkRut(this)" maxlength="12" required>
            <br>
           Nombre Completo
      		 <input type="text" name="name" maxlength="100" required><br>
           <br>
           Telefono
      			 <input type="text" name="phone" maxlength="20" required><br>
              <br>
             Correo
      			 <input type="text" name="mail" maxlength="50" required><br>
      		 <input type="submit" value="Agregar">
      	</form>
      </p>
    </div>
  </div>
</div>


 </body>
 </html>