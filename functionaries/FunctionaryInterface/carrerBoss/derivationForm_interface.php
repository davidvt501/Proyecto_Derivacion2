<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
$db = pg_connect( "$host $port $dbname $credentials"  );
session_start();
$cod=$_SESSION["cod"];
$run_f=$_SESSION["run_f"];
$_SESSION["run_f"]=$run_f;
$_SESSION["cod"]=$cod;

//criterios academicos
$criteriaAcad=pg_query($db,"SELECT * FROM criteria WHERE type='a'");
$criteriaSocEm=pg_query($db,"SELECT * FROM criteria WHERE type='s'")


 ?>
 <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <title>select</title>
  <script src="../assets/js/derivationScript.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script>
  function updateTextInput(val) {
          document.getElementById('sliderv').value=val;
        }
</script>
<style>

</style>
  </head>
  <body>
    <p>Sample</p>
  <form name="derivation" action="derivationProcess/analize_derivation.php" method="POST">
    Estudiante <br>
    <select id="xd" name="run" required>
      <option value="">Seleccione un estudiante</option>
      <?php
      $sql="SELECT student.name, student.mail, student.academic_level, carrer_student.run, carrer_student.cod_carrer FROM carrer_student INNER JOIN student ON student.run = carrer_student.run WHERE cod_carrer='$cod' ORDER BY student.name";
      $result=pg_query($db,$sql);
      while ($mostrar=pg_fetch_assoc($result)){
  		      echo '<option name="run" value="'.$mostrar['run'].'">'.$mostrar['name'].'</option>';
	  }
?>
    </select><br>
    Criterios academicos:<br>
    <?php while($mostrarCriteriaAcad=pg_fetch_assoc($criteriaAcad)){
      echo '<input type="checkbox" name="academica[]" value="'.$mostrarCriteriaAcad['criteria_definition'].'">'.$mostrarCriteriaAcad['criteria_definition'].' <br>';
    }
?>
    Criterios socio-emocionales: <br>
    <?php while($mostrarCriteriaSocEm=pg_fetch_assoc($criteriaSocEm)){
      echo '<input type="checkbox" name="academica[]" value="'.$mostrarCriteriaSocEm['criteria_definition'].'">'.$mostrarCriteriaSocEm['criteria_definition'].' <br>';
    }
    ?>
    Correo: <input type="text" name="mail" value="" required> <br>
    Telefono: <input type="text" name="phone" value="" required> <br>
  Comentario <br>
  <textarea id="confirmationText" class="text" cols="70" rows ="5" name="comment" required placeholder="Comentarios y Observaciones con respecto al estudiante derivado."></textarea> <br>
  <input type="submit">
  </form>
<form action="carrerInterface_selection.php" method="post">
  <input type="hidden" value="<?php echo $cod; ?>" name="cod">
  <button type="submit">Regresar</button>
</form>



  </body>
  </html>
