<?php
session_start();

$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
?>
<head>
</head>
<body>
  <p>Esta carrera ya existe</p>
<form action="mainInterface.php" method="post">
  <button>Regresar</button>
</form>
</body>
</html>
