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

$asignaturas='El/la est. presenta dificultades para comprender e integrar contenidos en más de una asignatura.';
$asignatura='Presenta series dificultades en una asignatura y ésta representa una problematica para llegar a la titulación.';
$vacios_p='Podría evidenciarse: problemáticas asociadas a organización del tiempo, ausencia de hábito, estrategias, métodos de estudio.';
$reprobacion='Reprobación del ciclo básico.';
$causal_eliminacion='Causal de eliminación';

//criterios socioEmoiconales

$desmotivacion='Desmotivacion';
$frustracion='Frustración';
$hipersensibilidad='Hipersensibilidad';
$ans_ang='Ansiedad y Angustia';
$estres='Estres academico';
$desesperanza='Desesperanza';
$desadaptacion='Desadaptacion';
$prob_voc='Problemas Vocacionales';
$dif_soc='Dificultades en las relaciones sociales';
$dif_com='Dificultades en la comunicación y expresión oral';


 ?>
 <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
  <title>select</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/derivationFormulary.css"/>
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
  <form name="derivation" action="../functionaries/send_derivation.php" method="POST">
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
    <input type="checkbox" name="academica[]" value="<?php echo $asignaturas; ?>"> <?php echo $asignaturas; ?> <br>
    <input type="checkbox" name="academica[]" value="<?php echo $asignatura; ?>"> <?php echo $asignatura; ?> <br>
    <input type="checkbox" name="academica[]" value="<?php echo $vacios_p; ?>"> <?php echo $vacios_p; ?> <br>
    <input type="checkbox" name="academica[]" value="<?php echo $reprobacion; ?>"> <?php echo $reprobacion; ?> <br>
    <input type="checkbox" name="academica[]" value="<?php echo $causal_eliminacion; ?>"> <?php echo $causal_eliminacion; ?> <br>
    Criterios socio-emocionales: <br>
    <input type="checkbox" name="socioEmocional[]" value="<?php echo $desmotivacion; ?>"> <?php echo $desmotivacion; ?> <br>
    <input type="checkbox" name="socioEmocional[]" value="<?php echo $frustracion; ?>"> <?php echo $frustracion; ?> <br>
    <input type="checkbox" name="socioEmocional[]" value="<?php echo $hipersensibilidad; ?>"> <?php echo $hipersensibilidad; ?> <br>
    <input type="checkbox" name="socioEmocional[]" value="<?php echo $ans_ang; ?>"> <?php echo $ans_ang; ?> <br>
    <input type="checkbox" name="socioEmocional[]" value="<?php echo $estres; ?>"> <?php echo $estres; ?> <br>
    <input type="checkbox" name="socioEmocional[]" value="<?php echo $desesperanza; ?>"> <?php echo $desesperanza; ?> <br>
    <input type="checkbox" name="socioEmocional[]" value="<?php echo $desadaptacion; ?>"> <?php echo $desadaptacion; ?> <br>
    <input type="checkbox" name="socioEmocional[]" value="<?php echo $prob_voc; ?>"> <?php echo $prob_voc; ?> <br>
    <input type="checkbox" name="socioEmocional[]" value="<?php echo $dif_soc; ?>"> <?php echo $dif_soc; ?> <br>
    <input type="checkbox" name="socioEmocional[]" value="<?php echo $dif_com; ?>"> <?php echo $dif_com; ?> <br>
    Correo: <input type="text" name="mail" value="" required> <br>
    Telefono: <input type="text" name="phone" value="" required> <br>
  Comentario <br>
  <textarea id="confirmationText" class="text" cols="70" rows ="5" name="comment" required placeholder="Comentarios y Observaciones con respecto al estudiante derivado."></textarea> <br>
  <input type="submit">
  </form>
<form action="../functionaries/carrerInterface_selection.php" method="post">
  <input type="hidden" value="<?php echo $cod; ?>" name="cod">
  <button type="submit">Regresar</button>
</form>



  </body>
  </html>
