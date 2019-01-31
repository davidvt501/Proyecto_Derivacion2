<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";

$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$campus=$_SESSION["campus"];
$sql="SELECT * FROM functionary WHERE functionality_state!=false AND campus='$campus' ORDER BY name";
$sql_p="SELECT * FROM functionary WHERE functionality_state!=false AND campus='$campus' ORDER BY name";


$result=pg_query($db,$sql);
$result_p=pg_query($db,$sql_p);

?>

<!DOCTYPE html>
<head>
<title>Select</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../assets/css/somedivs.css">
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


<p>Asignar permisos (Carrera)</p>
<ul>
<form name="give" action="../masterkey/give_permits.php" method="POST" >
<li>Funcionario:</li>
<select id="" name="run" required>
              <option value="" selected>Seleccione al Funcionario:</option>
              <?php
          while ($mostrar=pg_fetch_assoc($result)){
            echo '<option name="run" value="'.$mostrar['run'].'">'.$mostrar['name'].'</option>';
          }
        ?>
            </select>
						<li>Carrera</li>
<select id="xd" name="permits_c" required>
						              <option value="" selected>Seleccione la carrera u programa</option>
						              <?php
													$sql2="SELECT * FROM carrer WHERE active!=false ORDER BY name";
													$result2=pg_query($db,$sql2);
						          while ($mostrar=pg_fetch_assoc($result2)){
						            echo '<option name="cod_carrer" value="'.$mostrar['cod_carrer'].'">'.$mostrar['name'].'</option>';
						          }
						        ?>
						            </select>

<li><input type="submit" value="Asignar" /></li>
</form>
</ul>

<p>Asignar permisos (Programa)</p>
<ul>
<form name="give" action="../masterkey/give_permits.php" method="POST" >
<li>Funcionario:</li>
<select id="" name="run" required>
              <option value="" selected>Seleccione al Funcionario:</option>
              <?php
          while ($mostrar=pg_fetch_assoc($result_p)){
            echo '<option name="run" value="'.$mostrar['run'].'">'.$mostrar['name'].'</option>';
          }
        ?>
            </select>
						<li>Programa</li>
<select id="xd" name="permits_c" required>
						              <option value="" selected>Seleccione la carrera u programa</option>
						              <?php
													$sql3="SELECT * from program WHERE active!=false AND type='a' ORDER BY name";
													$result3=pg_query($db,$sql3);
													while ($mostrar=pg_fetch_assoc($result3)){
														echo '<option name="cod_program" value="'.$mostrar['cod_program'].'">'.$mostrar['name'].'</option>';
													}
						        ?>
						            </select>

<li><input type="submit" value="Asignar" /></li>
</form>
</ul>


<p>Revocar permisos</p>
<ul>
	<form name="revoke" action="#" method="POST">
		<li>Funcionario</li>
		<select id="run_r" name="run_r" required>
			<option value="" selected>Seleccione el funcionario</option>
			<?php
			$sql_f="SELECT * FROM functionary WHERE functionality_state!=false AND campus='$campus' ORDER BY name";
					$result_f=pg_query($db,$sql_f);
	while ($mostrar=pg_fetch_assoc($result_f)){
		echo '<option name="run" value="'.$mostrar['run'].'">'.$mostrar['name'].'</option>';
	}
	?>
		</select>
		<input type="submit" value="Continuar"/>
	</form>
</ul>

<p>Agregar funcionarios</p>
<ul>
	<form name="insert" action="../masterkey/add.php" method="POST">
			<li>RUN:</li>
			<input class="input_rut" type="text" name="run" placeholder="RUN completo sin puntos" oninput="checkRut(this)" maxlength="12" required>
		 <li>Nombre Completo</li>
		 <input type="text" name="name" maxlength="100" required><br>
		 <li>Telefono</li>
			 <input type="text" name="phone" maxlength="20" required><br>
			 <li>Correo</li>
			 <input type="text" name="mail" maxlength="50" required><br>
		 <input type="submit" value="Agregar">
	</form>
</ul>


<p>Desactivar funcionarios</p>
<ul>
	<form name="delete" action="../masterkey/delete.php" method="POST">
		<li>Funcionario</li>
		<select id="xd" name="run" required>
			<option value="">Seleccione el funcionario</option>
			<?php
			$sql4="SELECT * FROM functionary WHERE functionality_state!=false ORDER BY name";
					$result4=pg_query($db,$sql4);
	while ($mostrar=pg_fetch_assoc($result4)){
		echo '<option name="run" value="'.$mostrar['run'].'">'.$mostrar['name'].'</option>';
	}
?>
</select> <br>
		<input type="submit" value="Desactivar">
	</form>
</ul>

<p>Reactivar funcionarios</p>
<ul>
	<form name="delete" action="../masterkey/reactivate.php" method="POST">
		<li>Funcionario</li>
		<select id="xd" name="run" required>
			<option value="">Seleccione el funcionario</option>
			<?php
			$sql4="SELECT * FROM functionary WHERE functionality_state=false ORDER BY name";
					$result4=pg_query($db,$sql4);
	while ($mostrar=pg_fetch_assoc($result4)){
		echo '<option name="run" value="'.$mostrar['run'].'">'.$mostrar['name'].'</option>';
	}
?>
</select> <br>
		<input type="submit" value="Reactivar">
	</form>
</ul>

<p>Agregar Carrera</p>
<ul>
<form name="carrera_a" action="../masterkey/add_carrer.php" method="POST">
	<li>Nombre de la Carrera</li>
  <input type="text" name="name" maxlength="100" required><br>
  <li>Codigo de la Carrera</li>
  <input type="number" name="cod" required><br>
	<input type="submit" value="Agregar">
</form>
</ul>


<p>Borrar Carrera</p>
<ul>
<form name="carrera_b" action="../masterkey/carrer/carrerRemoved.php" method="POST">
	<?php
	/* $host        = "host = localhost";
	$port        = "port = 5432";
	$dbname      = "dbname = db_derv";
	$credentials = "user = postgres password=1234"; */

	$db = pg_connect( "$host $port $dbname $credentials"  );

	$lista_carreras=pg_query($db,"SELECT * FROM carrer WHERE active!=false ORDER BY name")
	 ?>
	<li>Carrera a eliminar:</li>
  <select name="cod_c" required>
		<option value="" selected>Seleccione la Carrera:</option>
		<?php while ($mostrar=pg_fetch_assoc($lista_carreras)){
			echo '<option name="cod_carrer" value="'.$mostrar['cod_carrer'].'">'.$mostrar['name'].'</option>';
		} ?>
  </select><br>
	<input type="submit" value="Borrar">
</form>
</ul>

<p>Agregar Programa</p>
<ul>
<form name="programa_a" action="../masterkey/add_program.php" method="POST">
	<li>Nombre del Programa</li>
  <input type="text" name="name" required><br>
  <li>Codigo del Programa</li>
  <input type="text" name="cod" required><br>
	<input type="submit" value="Agregar">
</form>
</ul>

<p>Borrar Programa</p>
<ul>
<form name="programa_b" action="../masterkey/program/programRemoved.php" method="POST">
	<?php
	$host        = "host = localhost";
	$port        = "port = 5432";
	$dbname      = "dbname = db_derv";
	$credentials = "user = postgres password=1234";

	$db = pg_connect( "$host $port $dbname $credentials"  );

	$lista_prog=pg_query($db,"SELECT * FROM program WHERE active!=false ORDER BY name")
	 ?>
	<li>Programa a eliminar:</li>
  <select name="cod_p" required>
		<option value="" selected>Seleccione el Programa:</option>
		<?php while ($mostrar=pg_fetch_assoc($lista_prog)){
			echo '<option name="cod_program" value="'.$mostrar['cod_program'].'">'.$mostrar['name'].'</option>';
		} ?>
  </select><br>
	<input type="submit" value="Borrar">
</form>
</ul>

</body>
</html>
