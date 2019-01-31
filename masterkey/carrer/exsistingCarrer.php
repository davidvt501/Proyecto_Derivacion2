<?php
session_start();
$_SESSION["campus"]=$campus;
$campus=$_SESSION["campus"];
?>
<head>
</head>
<body>
  <p>Esta carrera ya existe</p>
<form action="../masterkey.php" method="post">
  <button>Regresar</button>
  <input type="hidden" name="campus" value="<?php echo $campus?>">
</form>
</body>
</html>
