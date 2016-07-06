<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION)
{
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$USUARIO = $_SESSION['NOMBRE_USUARIO'];
$CODIGO_PROYECTO= $_POST['rocha'];
$CODIGO_SERVICIO= $_POST['CODSER'];
$OBS= $_POST['obs'];
$AREA= $_POST['area'];
$link= $_POST['link'];
$DIAS= $_POST['diasini'];
$FECHA_I1= $_POST['fechaini'];
$FECHA_E1= $_POST['culq'];
$EDITAR= $_POST['editar'];

$sql111 = "SELECT * from servicio where CODIGO_SERVICIO = '".$CODIGO_SERVICIO."'";

$result111 = mysql_query($sql111, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result111))
  {
	 if($link == 'proyecto')
	{
			$NOMBRE_SERVICIO1 = "";
	}
	else
	{
			$NOMBRE_SERVICIO1 = $row["NOMBRE_SERVICIO"];
	}
  }


$FECHA1 = date('Y/m/d');
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,AREA,OBSERVACIONES,CAMPO) values ('".($FECHA1)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','SERVICIO','".$AREA ."','".$OBS."','Reprogramacion')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
	
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_SERVICIO) values ('".($CODIGO_A)."','".($CODIGO_SERVICIO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

$sql = "UPDATE servicio SET  FECHA_INICIO = '".$FECHA_I1."',FECHA_ENTREGA = '".$FECHA_E1."', DIAS = '".$DIAS."' WHERE CODIGO_SERVICIO = '".$CODIGO_SERVICIO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());



/*
if($NOMBRE_SERVICIO1 == 'Despacho')
{
header("Location: InformeProyectoDespacho.php?ESTADO=EN PROCESO");
}
else if($NOMBRE_SERVICIO1 == "Instalacion")
{
header("Location: InformeProyectoInstalacion.php?ESTADO=EN PROCESO");
}
else if($NOMBRE_SERVICIO1 == "Sillas")
{
header("Location: InformeProyectoSilla.php?ESTADO=EN PROCESO");
}
else if($NOMBRE_SERVICIO1 == "Servicio Tecnico")
{
header("Location: InformeProyectoServicioTecnico.php?ESTADO=EN PROCESO");
}
else if($NOMBRE_SERVICIO1 == "Produccion")
{
header("Location: InformeProyectoProduccion.php?ESTADO=EN PROCESO");
}
else if($NOMBRE_SERVICIO1 == "Bodega")
{
header("Location: InformeProyectoBodega.php?ESTADO=EN PROCESO");
}
else if($NOMBRE_SERVICIO1 == "Adquisiciones")
{
header("Location: InformeProyectoAbastecimiento.php?ESTADO=EN PROCESO");
}
else if($NOMBRE_SERVICIO1 == "Mantencion")
{
header("Location: InformeProyectoMantencion.php?ESTADO=EN PROCESO");
}
else if ($NOMBRE_SERVICIO1 == "")
{
header("Location: editarProyecto.php?CODIGO_PROYECTO=".urlencode($CODIGO_PROYECTO) ."");
}
else
{
	*/





	
echo '<script language = javascript>
alert("Ok")
self.location = "DescripcionServicio.php?CODIGO_SERVICIO='.urlencode($CODIGO_SERVICIO).'&CODIGO_PROYECTO='.urlencode($CODIGO_PROYECTO).'&editar='.$EDITAR.'"
</script>';
/*}*/
?>