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

$CODIGO_RUTA = $_GET["CODIGO_RUTA"];
$CODIGO_SERVICIO= $_GET['CODIGO_SERVICIO'];

/*1*/

$patente = "";
$sqla = "SELECT ruta.PATENTE FROM ruta WHERE ruta.CODIGO_RUTA = ".$CODIGO_RUTA."";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
  $patente = $row["PATENTE"];
  }
mysql_free_result($resulta);

if($patente != "")
{
/*2*/

$total_m3 ="";
$sqla =  "SELECT distinct sum(servicio.M3) as total FROM servicio, ruta, servicio_ruta WHERE servicio.CODIGO_SERVICIO = servicio_ruta.CODIGO_SERVICIO and servicio_ruta.CODIGO_RUTA = ruta.CODIGO_RUTA   AND ruta.CODIGO_RUTA = ".$CODIGO_RUTA."";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
  $total_m3 = $row["total"];
  }
mysql_free_result($resulta);

/*3*/

$vehiculo_m3 = "";
$sqla = "SELECT M3 FROM VEHICULO WHERE  PATENTE = '".$patente."' ";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
  $vehiculo_m3 = $row["M3"];
  }
mysql_free_result($resulta);

/*4*/

$m3 = "";
$sqla = "SELECT M3 FROM SERVICIO WHERE CODIGO_SERVICIO = '".$CODIGO_SERVICIO."' ";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
  $m3 = $row["M3"];
  }
mysql_free_result($resulta);


/*5*/

$total_m3 = $total_m3 + $m3;

if($total_m3 > $vehiculo_m3)
{
	echo '<script language = javascript>
	alert("Camion maxima capacidad ")
	self.location = "Ruta_entrega.php?CODIGO_RUTA='.$CODIGO_RUTA.'"
	</script>';
}
else
{
	$sql01="INSERT INTO servicio_ruta(CODIGO_RUTA,CODIGO_SERVICIO) VALUES('".$CODIGO_RUTA."','".$CODIGO_SERVICIO."')";
	$result01 = mysql_query($sql01, $conn) or die(mysql_error());
	echo '<script language = javascript>
	alert("Hoja de ruta realizada")
	self.location = "Ruta_entrega.php?CODIGO_RUTA='.$CODIGO_RUTA.'"
	</script>';
}

}
else
{

$sql01="INSERT INTO servicio_ruta(CODIGO_RUTA,CODIGO_SERVICIO) VALUES('".$CODIGO_RUTA."','".$CODIGO_SERVICIO."')";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());
echo '<script language = javascript>
alert("Hoja de ruta realizada ")
self.location = "Ruta_entrega.php?CODIGO_RUTA='.$CODIGO_RUTA.'"
</script>';
}

?>