<?php
session_start();
$campus=$_SESSION["campus"];
echo 'Este permiso ya ha sido asignado previamente';
?>
<html>
<head>
</head>
<body>
<form action="../masterkey.php" method="post">
  <button>Regresar</button>
  <input type="hidden" name="campus" value="<?php echo $campus?>">
</form>
</body>
</html>
