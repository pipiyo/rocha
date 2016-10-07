<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$contador = 1;
mysql_select_db($database_conn, $conn);
$NVALE = $_POST['folio'];
$DIFTOTAL = $_POST['diftot'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];	

$numero = 0;
$sql1 = "SELECT * from oc_producto  where CODIGO_OC = '".$NVALE ."'";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$CODIGO_OCU = $row["CODIGO_OC"];
	$numero++;
  }
mysql_free_result($result2);

$sql1 = "SELECT * from orden_de_compra  where CODIGO_OC = '".$NVALE ."'";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ESTAD = $row["ESTADO"];
  }
mysql_free_result($result2);
/*
$sqldeleteser="delete from oc_producto  where CODIGO_OC = '".$NVALE ."'"; 
$resultdeleteser = mysql_query($sqldeleteser, $conn) or die(mysql_error());
*/


if($ESTAD != "OK")
{
$contador = 1;
while ($contador <= $numero )
{

$CODIGO_PRODUCTO= $_POST['cod'.$contador];
$ROCH = $_POST['roch'.$contador];
$CANTIDAD = $_POST['cans'.$contador];
$OBS = $_POST['obs'.$contador];
$CANE= $_POST['cane'.$contador];
$ENTR= $_POST['entr'.$contador];
$DIF= $_POST['dif'.$contador];
$GUIA = $_POST['guia'.$contador];
$ID = $_POST['id'.$contador];
$SUMACA = $CANE + $ENTR;
if($CODIGO_PRODUCTO != "")
{

$sql01="update oc_producto set CANTIDAD_RECIBIDA = '".$SUMACA."',DIFERENCIA='".$DIF."',OBSERVACION='".($OBS)."',GUIA_DESPACHO='".$GUIA."' where ID = '".$ID."'";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());
if($SUMACA > 0 && $CANE > 0){
$sql02="insert into oc_recibo (codigo_oc, total, recibido,fecha_recibido,codigo_producto,user) values ('".$NVALE."','".$CANTIDAD."','".$SUMACA."','".date('Y-m-d')."','".$CODIGO_PRODUCTO."','".$NOMBRE_USUARIO."')";
$result02 = mysql_query($sql02, $conn) or die(mysql_error());
}
$sql1 = "SELECT * from producto  where CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO ."'";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$STOCK = $row["STOCK_ACTUAL"];
  }
  
  if($CANE != "")
  {
  $FINAL = $STOCK + $CANE;
 $sql01="UPDATE PRODUCTO SET STOCK_ACTUAL = '".$FINAL."' WHERE CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO ."'";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());



$FECHA = date('Y/m/d');
$sql1 = "INSERT INTO actualizaciones (VALOR_ANTIGUO,ROCHA,INGRESO,FECHA,USUARIO,NOMBRE_USUARIO,OC) values ('".($STOCK)."','".($ROCH)."','".($CANE)."','".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','".($NVALE)."')";
$result1 = mysql_query($sql1, $conn) or die(mysql_error());

$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_PRODUCTO) values ('".($CODIGO_A)."','".$CODIGO_PRODUCTO."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
  }
}
$contador++;
}


if($DIFTOTAL == 0)
{
$sql9="UPDATE orden_de_compra SET ESTADO = 'OK',DIFERENCIA_TOTAL ='".$DIFTOTAL."' WHERE CODIGO_OC = '".$NVALE."'";
$result9 = mysql_query($sql9, $conn) or die(mysql_error());

$sql6="UPDATE servicio set ESTADO = 'OK' where CODIGO_OC ='".$NVALE."' and nombre_servicio = 'OC'"; 
$result6 = mysql_query($sql6, $conn) or die(mysql_error());
}
else
{
$sql9="UPDATE orden_de_compra SET ESTADO = 'En Proceso',DIFERENCIA_TOTAL ='".$DIFTOTAL."'  WHERE CODIGO_OC = '".$NVALE."'";
$result9 = mysql_query($sql9, $conn) or die(mysql_error());
$sql6="UPDATE servicio set ESTADO = 'EN PROCESO' where CODIGO_OC ='".$NVALE."' and nombre_servicio = 'OC'"; 
$result6 = mysql_query($sql6, $conn) or die(mysql_error());
}
}

echo '<script language = javascript>
alert("Vale enviado")
self.location = "ListadoDeCompras.php"
</script>';

?>