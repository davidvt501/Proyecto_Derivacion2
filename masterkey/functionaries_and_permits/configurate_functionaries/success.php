<?php
session_start();
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
?>
<html>
<head>
</head>
<body>
  <p>El funcionario ha sido ingresado de forma correcta</p>
<form action="addFunctionaryInterface.php" method="post">
  <button>Regresar</button>
</form>
</body>
</html>
