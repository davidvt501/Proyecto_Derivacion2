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
WHERE derivation_status=0 AND derivation.cod_program=$cod_program
ORDER BY priority";

$exe=pg_query($db,$consultaderivaciones);

 ?>
 <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <title>select</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/table_test.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/tablestyle.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/programbuttons.css">

  </head>
  <body>
    <div class="tbl-header">
	<table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Nombre</th>
        <th>Funcionario que Deriva</th>
        <th>Carrera</th>
        <th>Prioridad</th>
        <th>Fecha de la Derivacion</th>
        <th>Fecha Programada</th>
        <th>Revisar</th>
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
          <?php 
          echo '<form action="derivation_analytic.php" method="post">' ?>
          <td><?php echo $mostrar['student_name']?></td>
          <td><?php echo $mostrar['functionary_name']?></td>
          <td><?php echo $mostrarName['name']?></td>
          <td><?php echo $mostrar['priority']?></td>
          <td><?php echo $mostrar['datetime_derivated']?></td>
          <td><?php if (empty($mostrar['datetime_programmed'])) {
    echo 'Pendiente';
}else{
	echo $mostrar['datetime_programmed'];
}
		  echo $mostrar['datetime_programmed']
		  
		  ?></td>
          <?php echo '<input type="hidden" name="id" value="'.$mostrar['cod_derivation'].'">'; ?>
          <td><?php echo'<button type="submit">Revisar</button>'; echo '</form>' ?></td>
        </tr>
        <?php } ?>
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
  </body>
  </html>
