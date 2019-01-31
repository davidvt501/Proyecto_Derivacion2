<?php
session_start();
$campus=$_SESSION["campus"];
 ?>
<html>
<head>
</head>
<body>
  <p>Los datos fueron ingresados de manera incorrecta o corresponden al de otro campus.</p>
<form action="../index.php" method="post">
  <button>Regresar</button>
  <input type="hidden" name="campus" value="<?php echo $campus?>">
</form>
</body>
 <html>
