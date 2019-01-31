<?php
session_start();

$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
?>
<head>
</head>
<body>
  <p>Este programa ya existe</p>
<form action="../masterkey.php" method="post">
  <button>Regresar</button>
  <input type="hidden" name="campus" value="<?php echo $campus?>">
</form>
</body>
</html>
