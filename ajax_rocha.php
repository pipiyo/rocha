<?php
                $CONSULTA =  trim($_POST['consulta']);

             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 

$lista = array();


$sql =  "SELECT CODIGO_PROYECTO FROM proyecto WHERE CODIGO_PROYECTO LIKE '%".$CONSULTA."%' LIMIT 25 ";


$result = mysql_query($sql, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result))
  {
  $lista[] = array( "COD" => $row["CODIGO_PROYECTO"], "NOMBRE" => $_POST['nombre'] );
  }
mysql_free_result($result);

echo json_encode($lista);


?>

