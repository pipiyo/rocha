<?php

             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 



$lista = 0;

$sql =  "SELECT * FROM radicado WHERE CODIGO_RADICADO LIKE '".$_POST['consulta']."'  ";
$result = mysql_query($sql, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result))
  {
  $lista = 1;
  }
mysql_free_result($result);


echo ($lista);





?>

