<?php
   $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = db_derv";
   $credentials = "user = postgres password=1234";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Base de datos abierta\n";
   }

   $sql =<<<EOF
      SELECT * from prueba;
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   }
   while($row = pg_fetch_row($ret)) {
      echo "ID = ". $row['0'] . "\n";
   }
   echo "Operacion realizada\n";
   pg_close($db);
?>
