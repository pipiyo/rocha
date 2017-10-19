<?php
                $CONSULTA =  $_POST['consulta'];

             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 

$lista = array();


$sql =  "SELECT * FROM producto WHERE DESCRIPCION LIKE '%".$CONSULTA."%' and not TEMPORADA = '2' and DESHABILITAR = '0' LIMIT 25 ";

$result = mysql_query($sql, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result))
  {
  $lista[] = array( "DES" => $row["DESCRIPCION"], "NOMBRE" => $_POST['nombre'], "COD" => $row["CODIGO_PRODUCTO"] );
  }
mysql_free_result($result);

echo json_encode($lista);

?>

