<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
$CODIGO = $_GET['txt_codigo'];	
$query_registro = "SELECT * FROM SERVICIO WHERE CODIGO_SERVICIO ='".$CODIGO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$numero++;
  }
mysql_free_result($result1);
  
if($numero != 0)
{
$NOMBRE_SERVICIO1 =  $_GET["txt_nombre_servicio"];
$FECHA_I1 =  $_GET["txt_fechai"];
$FECHA_E1 =  $_GET["txt_fechae"];
$REALIZADOR1 =  $_GET["txt_realizador"];
$SUPERVISOR1 =  $_GET["txt_supervisor"];
$OBSERVACION1 =  $_GET["txt_observacion"];
$DESCRIPCION1 =  $_GET["txt_descripcion"];
$ESTADO1 =  $_GET["txt_estado"];
$CODIGO_RADICADO =  $_GET["txt_codigo_proyecto2"];
$DIAS = $_GET['txt_dias'];

if($NUEVO == "")
{
$NUEVO = $CODIGO;
}
$fecha = date("y-m-y G:i:s");

$sql = "UPDATE servicio SET DIAS = '".($DIAS)."', NOMBRE_SERVICIO = '". 
($NOMBRE_SERVICIO1)."',FECHA_INICIO = '" .$FECHA_I1. "', FECHA_ENTREGA = '".$FECHA_E1."', REALIZADOR = '".$REALIZADOR1."',SUPERVISOR = '".$SUPERVISOR1. "', OBSERVACIONES = '".($OBSERVACION1)."', DESCRIPCION = '".($DESCRIPCION1)."',ESTADO= '".($ESTADO1)."' WHERE CODIGO_SERVICIO = '".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());


header("Location: DescripcionRadicado.php?txt_codigo_proyecto2=". urlencode($CODIGO_RADICADO )."");
}
else
{
echo '<script language = javascript>
alert("El codigo que ingreso no existe")
self.location = "DescripcionRadicado.php?txt_codigo_proyecto2=".urlencode($CODIGO_RADICADO ).""
</script>';
}



?>