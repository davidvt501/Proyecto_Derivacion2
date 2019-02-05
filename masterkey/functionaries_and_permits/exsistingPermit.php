<?php
session_start();
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
$run=$_SESSION["run"];
echo 'Este permiso ya ha sido asignado previamente';
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
