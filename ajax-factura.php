<?php
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn); 

$factura=(isset($_POST['factura']))? trim($_POST['factura']) : "" ;
$servicio=(isset($_POST['servicio']))? trim($_POST['servicio']) : "" ;

$RESPUESTA = array();

$sqla = "SELECT * FROM servicio WHERE CODIGO_SERVICIO = '".$servicio."' ";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
    $NOMBRE = $row["NOMBRE_SERVICIO"];
  }
mysql_free_result($resulta);

if($NOMBRE == 'Factura')
{
$cuenta = 0;
$sqla = "SELECT count(NUMERO_FACTURA) as CUENTA FROM factura WHERE NUMERO_FACTURA = '".$factura."' and not CODIGO_SERVICIO = '".$servicio."' ";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
    $cuenta = $row["CUENTA"];
  }
mysql_free_result($resulta);
}
else
{
$cuenta = 0;
$sqla = "SELECT count(NUMERO_NOTA) as CUENTA FROM nota_credito WHERE NUMERO_NOTA = '".$factura."' and not CODIGO_SERVICIO = '".$servicio."' ";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
    $cuenta = $row["CUENTA"];
  }
mysql_free_result($resulta);	
}



if($cuenta > 0)
{
	$final="no";
	$mensaje = "Ya se encuentra ingresada ";
}
else
{
	$final="si";
	$mensaje = "OK";
}

$RESPUESTA[] = array( "mensaje" => $mensaje ,  "finm3" => $final );

echo json_encode($RESPUESTA);

?>
