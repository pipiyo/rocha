<?php

require_once('Conexion/Conexion.php');

mysql_select_db($database_conn, $conn); 

$RESPUESTA = array();

$query_registro = "select servicio.CODIGO_PROYECTO, sub_servicio.CODIGO_SUBSERVICIO, sub_servicio.SUB_DESCRIPCION from sub_servicio, servicio where sub_servicio.SUB_CODIGO_SERVICIO =  servicio.CODIGO_SERVICIO and sub_servicio.SUB_ESTADO = 'En Proceso' and sub_servicio.SUB_NOMBRE_SERVICIO  = 'Adquisiciones'";

$resulta = mysql_query($query_registro, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta)){

  $RESPUESTA[] = array( "codigo" => $row['CODIGO_SUBSERVICIO'], "proyecto" => $row['CODIGO_PROYECTO'], "sub" => $row['SUB_DESCRIPCION']);

}

mysql_free_result($resulta);

echo json_encode($RESPUESTA);



?>