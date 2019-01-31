<?php
session_start();
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
 ?>
<html>
<head>
</head>
<body>
  <p>Este funcionario tiene sus permisos revocados o ya no pertenece a nuestra institucion.</p>
  <button action="../index.php">Regresar</button>
</body>
 <html>
