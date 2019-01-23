<?php


	$run = $_POST['id_run'];

	$query = "SELECT * FROM permits_f where run='$run'";
	$sql=pg_query($db,$query);

	while($mostrar=pg_fetch_assoc($sql){
		echo $html='<option name="cod" value="'.$mostrar['cod'].'">'.$mostrar['name'].'</option>';
	}
?>
