<?php
session_start();
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
$run=$_SESSION["run"];
	echo 'Se han asignado permisos de manera correcta';
?>
<html>
<head>
</head>
<body>
<form action="functionary_and_permits.php" method="post">
  <button>Regresar</button>
  <input type="hidden" name="run" value="<?php echo $run?>">
</form>
</body>
</html>
