<?php
$host        = "host = localhost";
$port        = "port = 5432";
$dbname      = "dbname = db_derv";
$credentials = "user = postgres password=1234";
session_start();
$db = pg_connect( "$host $port $dbname $credentials"  );
$campus=$_SESSION["campus"];
$_SESSION["campus"]=$campus;

$cod=$_SESSION["cod"];
$_SESSION["cod"]=$cod;

$run=$_POST['run'];
$senStudentP="SELECT carrer_student.run as run,carrer.cod_carrer as cod_carrer,
student.name as student_name,student.academic_level,
student.income_year,student.campus,
program.cod_program,program.name as program_name,
carrer.name as carrer_name
FROM carrer_student INNER JOIN student
ON student.run=carrer_student.run
INNER JOIN carrer ON carrer_student.cod_carrer=carrer.cod_carrer
INNER JOIN program_student ON program_student.run=student.run
INNER JOIN program ON program.cod_program=program_student.cod_program
WHERE student.run='$run'";
$conStudentP=pg_query($db,$senStudentP);
$StudentP=pg_fetch_assoc($conStudentP);

$conStudent=pg_query($db,"SELECT * FROM student WHERE run='$run'");
$Student=pg_fetch_assoc($conStudent);

?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8">
 <title>select</title>
 <link rel="stylesheet" type="text/css" href="../../assets/css/funcionarios.css">
 <link rel="stylesheet" type="text/css" href="../../assets/css/boxes.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <style>
br {
display: block;
margin: 2px 0;
}
 </style>
 <style>
body {
margin: 0;
}

.header {
text-align: center;
background: #1abc9c;
color: white;
font-size: 5px;
}
</style>
<script>
function buscarSelect()
{	// creamos un variable que hace referencia al select
	var select=document.getElementById("soflow-color");
	// obtenemos el valor a buscar
	var buscar=document.getElementById("buscar").value;
	// recorremos todos los valores del select
	for(var i=1;i<select.length;i++)
	{
		if(select.options[i].value==buscar)
		{
			// seleccionamos el valor que coincide
			select.selectedIndex=i;
		}
	}
}
</script>
 </head>
 <body>


	 <div class="header">

 <a href="http://www.ucn.cl/" class="image fit"><img src="../../images/ucnlogo.png" align="right" style="width:100px; height:100px"; alt=""></a>
 <a href="students_search.php" class="image fit"><img src="../../assets/images/back-arrow.png" align="left" style="width:90px; height:90px"; alt=""></a>
</div>

<div class="container">
  <h2><?php echo $Student['name']?></h2>
  <div class="panel panel-default">
    <div class="panel-body">
    </div>
  </div>
</div>


 </body>
 </html>
