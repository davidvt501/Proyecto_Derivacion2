<?php
session_start();
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
echo 'Este funcionario tiene permisos revocados o ya no pertenece a nuestra institucion.'

 ?>
<html>
<head>
</head>
<body>
  <button action="../index.php">Regresar</button>
</body>
 <html>
