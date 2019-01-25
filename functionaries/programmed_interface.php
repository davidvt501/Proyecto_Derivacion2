<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$cod_program=$_SESSION["cod"];
$consultaderivaciones="SELECT derivation.*,carrer_student.cod_carrer as cod_carrer, program.name as program_name,student.name as student_name,functionary.name as functionary_name
FROM derivation
INNER JOIN program ON derivation.cod_program=program.cod_program
INNER JOIN student ON student.run = derivation.run_student
INNER JOIN functionary ON derivation.run_functionary = functionary.run
INNER JOIN carrer_student ON derivation.run_student = carrer_student.run
WHERE derivation_status=1 AND derivation.cod_program='$cod_program'
ORDER BY datetime_programmed";

$exe=pg_query($db,$consultaderivaciones);

 ?>
 <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <title>select</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/tablestyle.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<style>
	.btn{
		font-size: 10px;
		height:30px;
		width:90px;
	}
	</style>



  </head>
  <body>
    <div class="tbl-header">
	<table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Nombre</th>
        <th>Funcionario que Deriva</th>
        <th>Carrera</th>
        <th>Fecha de la Derivacion</th>
        <th>Fecha Programada</th>
        <th></th>
        </tr>
      </thead>
	  </table>
  </div>
	  <div class="tbl-content">
	  <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php while($mostrar=pg_fetch_assoc($exe)){
          $conCarrerName=pg_query($db,"SELECT * FROM carrer WHERE cod_carrer='$mostrar[cod_carrer]'");
          $mostrarName=pg_fetch_assoc($conCarrerName);
          ?>
        <tr>
          <td><?php echo $mostrar['student_name']?></td>
          <td><?php echo $mostrar['functionary_name']?></td>
          <td><?php echo $mostrarName['name']?></td>
          <td><?php echo $mostrar['datetime_derivated']?></td>
          <td><?php if (empty($mostrar['datetime_programmed'])) {
    echo 'Pendiente';
}else{
	echo $mostrar['datetime_programmed'];
}

		  ?></td>
          <?php echo '<input type="hidden" name="id" value="'.$mostrar['cod_derivation'].'">'; ?>
          <td><?php echo'<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal'.$mostrar['cod_derivation'].'">Cambiar Estado</button>'?></td>
        </tr>
		<!-- Modal -->
  <?php echo '<div class="modal fade" id="myModal'.$mostrar['cod_derivation'].'" role="dialog">'?>
    <?php echo '<div class="modal-dialog">'?>

      <!-- Modal content-->
      <?php echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<button type="button" class="close" data-dismiss="modal">&times;</button> ';
        echo '<h4 class="modal-title">Derivacion N°:'.$mostrar['cod_derivation'].'</h4>';
        echo '</div>';
        echo '<div class="modal-body">';
		echo '<form action="complete_derivation.php" method="post">';
		echo'<p>Alumno derivado: '.$mostrar['student_name'].'';
        echo'<p>Funcionario que Deriva: '.$mostrar['functionary_name'].'';
		echo'<p>Funcionario que Deriva: '.$mostrarName['name'].'';
		echo'<p>Fecha de la Derivacion: '.$mostrar['datetime_derivated'].'';
		$criteria = $mostrar['criteria'];
		$criteria_lista=json_decode($criteria);
		echo "<p>Criterios considerados:</p>";
		  for($i=0; $i < count($criteria_lista); $i++){
			  echo "<ul>";
			  echo " <li>$criteria_lista[$i]</li>";
			  echo "</ul>";
}
		echo '<input type="hidden" name="cod" value="'.$mostrar['cod_derivation'].'">';
		echo'</div>';
        echo'<div class="modal-footer">';
        echo '<input type="hidden" value="'.$cod_program.'" name="cod_program">';
		echo'<button type="submit" class="btn btn-default">Terminar</button>';
		echo'</form>';
        echo'<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
        echo'</div>';
		echo'</div>';

    echo'</div>';
  echo '</div>';
  } ?>
      </tbody>
    </table>
    <script>

  document.querySelector('button').addEventListener('click',function clickHandler(e){

    this.removeEventListener('click',clickHandler,false);

    e.preventDefault();
    var self = this;
    setTimeout(function(){
        self.className = 'loading';
    },125);

    setTimeout(function(){
        self.className = 'ready';
    },4300);

  },false);

    </script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script  src="../assets/js/index.js"></script>
</div>
<form action="http://localhost/Proyecto_Derivacion/functionaries/progInterface_selection.php" method="post">
<button type="submit">Regresar<button>
<input type="hidden" value="<?php echo $cod_program ?>" name="cod">
</form>
  </body>
  </html>
