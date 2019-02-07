<?php
session_start();
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
?>
<html>
<head>
</head>
<body>
  <p>Este funcionario ya existe</p>
<form action="addFunctionaryInterface.php" method="post">
  <button>Regresar</button>
</form>
</body>
</html>
