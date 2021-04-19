<?php
                $CONSULTA =  trim($_POST['consulta']);

             require_once('Conexion/Conexion.php');

            mysql_select_db($database_conn, $conn); 

$RESPUESTA = "ROCHA NO EXISTE";

$sql =  "SELECT * FROM proyecto WHERE CODIGO_PROYECTO = '".$CONSULTA."' LIMIT 25 " ;

$result = mysql_query($sql, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result))
  {
  $RESPUESTA = "ROCHA EXISTE";
  }
mysql_free_result($result);

echo $RESPUESTA;

?>

