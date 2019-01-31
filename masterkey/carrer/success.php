<?php
session_start();

$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
?>
<head>
</head>
<body>
  <p>Carrera creada de forma correcta</p>
<form action="../masterkey.php" method="post">
  <button>Regresar</button>
  <input type="hidden" name="campus" value="<?php echo $campus?>">
</form>
</body>
</html>
