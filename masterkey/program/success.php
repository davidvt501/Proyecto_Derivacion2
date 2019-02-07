<?php
session_start();

$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;
?>
<head>
</head>
<body>
  <p>Programa creado de forma correcta</p>
<form action="mainInterface.php" method="post">
  <button>Regresar</button>
</form>
</body>
</html>
