<?php 
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);

$sql = ($_POST['nombre'] == "fechac") ? "UPDATE orden_de_compra set FECHA_CONFIRMACION= '".$_POST['fecha']."'  where CODIGO_OC ='".$_POST['cod']."'" :  "UPDATE orden_de_compra set FECHA_ENVIO_VALIJA= '".$_POST['fecha']."' where CODIGO_OC ='".$_POST['cod']."'"  ; 
$sqlr = mysql_query($sql, $conn) or die(mysql_error());


if ($_POST['nombre'] == "fechac") {	
$sql2="UPDATE servicio set FECHA_ENTREGA= '".$_POST['fecha']."' where CODIGO_OC ='".$_POST['cod']."' and nombre_servicio = 'OC'"; 
$sqlr2 = mysql_query($sql2, $conn) or die(mysql_error());

}

echo "Orden de Compra ".$_POST['cod']." actualizada con exito.";
?>