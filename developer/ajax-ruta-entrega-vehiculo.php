<?php
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn); 


$ruta=(isset($_POST['ruta']))? trim($_POST['ruta']) : "" ;
$m3= (isset($_POST['m3'])) ? trim($_POST['m3']) : "" ;
$cod= (isset($_POST['cod'])) ? trim($_POST['cod']) : "" ;
$vehiculo= (isset($_POST['veh'])) ? trim($_POST['veh']) : "" ;


$RESPUESTA = array();

if($ruta != "vacio"){
$patente = "";
$sqla = "SELECT ruta.PATENTE FROM ruta WHERE ruta.CODIGO_RUTA = ".$ruta."";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
  $patente = $row["PATENTE"];
  }
mysql_free_result($resulta);


$total_m3 ="";
$sqla =  "SELECT distinct sum(servicio.M3) as total FROM servicio, ruta, servicio_ruta WHERE servicio.CODIGO_SERVICIO = servicio_ruta.CODIGO_SERVICIO and servicio_ruta.CODIGO_RUTA = ruta.CODIGO_RUTA   AND ruta.CODIGO_RUTA = ".$ruta." AND NOT servicio.CODIGO_SERVICIO  = '".$cod."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
  $total_m3 = $row["total"];
  }
mysql_free_result($resulta);

$vehiculo_m3 = "";
$sqla = "SELECT M3 FROM VEHICULO WHERE  PATENTE = '".$vehiculo."' ";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
  $vehiculo_m3 = $row["M3"];
  }
mysql_free_result($resulta);

$total_m3 = $total_m3 + $m3;

if($total_m3 > $vehiculo_m3)
{
	$final="no";
	$mensaje = "Problema, el vehiculo ya cuenta con $total_m3 M3 y su vehiculo suporta $vehiculo_m3 M3 ";
}
else
{
	$final="si";
	$mensaje = "OK, Dentro de la capacidad";
}

$RESPUESTA[] = array( "mensaje" => $mensaje , "patente" => $patente, "total_m3" => $total_m3, "vehiculo_m3" => $vehiculo_m3 , "finm3" => $final );

}
else
{
$RESPUESTA[] = array( "mensaje" => "Actividad sin ruta", "patente" => "", "total_m3" => $m3, "vehiculo_m3" => "" , "finm3" => "si" );
}
echo json_encode($RESPUESTA);

?>
