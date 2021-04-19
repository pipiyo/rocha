<?php

   require_once('Conexion/Conexion.php');
   mysql_select_db($database_conn, $conn); 

$lista = array();


$sql =  "SELECT * FROM producto2 WHERE DESCRIPCION LIKE '%".$_POST['consulta']."%' and not TEMPORADA = '2' LIMIT 30 ";

$result = mysql_query($sql, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result))
  {
  $lista[] = $row["DESCRIPCION"] ;
  }
mysql_free_result($result);

echo json_encode($lista);

?>

