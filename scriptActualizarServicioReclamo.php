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
  
  $NOMBRE_SERVICIO1="";
  $FECHA_I1="";
  $FECHA_E1="";
  $TRANSPORTE="";
  $REALIZADOR1="";
  $SUPERVISOR1="";
  $OBSERVACION1="";
  $DESCRIPCION1 ="";
  $ESTADO1="";
  $CODIGO_PROYECTO ="";
  $DIRECCION ="";
  $GUIA="";
  $TPTMFI="";
  $INS1="";
  $INS2="";
  $INS3="";
  $INS4="";
  $LIDER ="";
  $PREDECESOR="";
  $DIAS ="";
  $PUESTOS="";
  $SERVICIO="";
  $DOCUMENTO="";
  $TECNICO1="";
  $TECNICO2 ="";
  $RECLAMOS="";
  $EJECUTOR="";
  $PROCESO="";
if($numero != 0)
{
if (isset($_GET["txt_nombre_servicio"]))
{	
$NOMBRE_SERVICIO1 =  $_GET["txt_nombre_servicio"];
}
if (isset($_GET["txt_fechai"]))
{	
$FECHA_I1 =  $_GET["txt_fechai"];
}
if (isset( $_GET["txt_fechae"]))
{
$FECHA_E1 =  $_GET["txt_fechae"];
}
if (isset( $_GET["txt_transporte"]))
{
$TRANSPORTE =  $_GET["txt_transporte"];
}
if (isset($_GET["txt_realizador"]))
{
$REALIZADOR1 =  $_GET["txt_realizador"];
}
if (isset( $_GET["txt_supervisor"]))
{
$SUPERVISOR1 =  $_GET["txt_supervisor"];
}
if (isset($_GET["txt_observacion"]))
{
$OBSERVACION1 =  $_GET["txt_observacion"];
}
if (isset( $_GET["txt_descripcion"]))
{
$DESCRIPCION1 =  $_GET["txt_descripcion"];
}
if (isset($_GET["txt_estado"]))
{
$ESTADO1 =  $_GET["txt_estado"];
}
if (isset($_GET["txt_codigo_proyecto"]))
{
$CODIGO_PROYECTO =  $_GET["txt_codigo_proyecto"];
}
if (isset($_GET["txt_direccion"]))
{
$DIRECCION =  $_GET["txt_direccion"];
}
if (isset($_GET["txt_guia"]))
{
$GUIA =  $_GET["txt_guia"];
}
if (isset($_GET["txt_tptmfi"]))
{
$TPTMFI= $_GET["txt_tptmfi"];
}
if (isset($_GET['ins1']))
{
$INS1 = $_GET['ins1'];
}
if (isset($_GET['ins2']))
{
$INS2 = $_GET['ins2'];
}
if (isset($_GET['ins3']))
{
$INS3 = $_GET['ins3'];
}
if (isset($_GET['ins4']))
{
$INS4 = $_GET['ins4'];
}
if (isset($_GET['lider']))
{
$LIDER = $_GET['lider'];
}
if (isset($_GET['txt_predecesor']))
{
$PREDECESOR = $_GET['txt_predecesor'];
}
if (isset($_GET['txt_dias']))
{
$DIAS = $_GET['txt_dias'];
}
if (isset($_GET['puestos']))
{
$PUESTOS = $_GET['puestos'];
}
if (isset($_GET['txt_servicio']))
{
$SERVICIO = $_GET['txt_servicio'];
}
if (isset($_GET['txt_documento']))
{
$DOCUMENTO = $_GET['txt_documento'];
}
if (isset($_GET['tec1']))
{
$TECNICO1= $_GET['tec1'];
}
if (isset($_GET['tec2']))
{
$TECNICO2 = $_GET['tec2'];
}
if (isset($_GET['txt_reclamos']))
{
$RECLAMOS = $_GET['txt_reclamos'];
}


if($NOMBRE_SERVICIO1 == "Produccion")
{ 
if (isset($_GET['txt_ejecutor']))
{
$EJECUTOR = $_GET['txt_ejecutor'];
}
if (isset($_GET['txt_proceso']))
{
$PROCESO = $_GET['txt_proceso'];
}
}
else
{
	if (isset($_GET['txt_ejecutors']))
{
$EJECUTOR = $_GET['txt_ejecutors'];
}
if (isset($_GET['txt_procesos']))
{
$PROCESO = $_GET['txt_procesos'];
}
}

$fecha = date("y-m-y G:i:s");

$sql = "UPDATE servicio SET RECLAMOS = '".$RECLAMOS."', TECNICO_2 = '".($TECNICO2)."',TECNICO_1 = '".($TECNICO1)."',TIPO_SERVICIO = '".($SERVICIO)."', DOCUMENTO_SERVICIO_TECNICO = '".($DOCUMENTO)."', PROCESO = '".($PROCESO)."', EJECUTOR = '".($EJECUTOR)."', PUESTOS  = '".($PUESTOS)."', PREDECESOR = '".($PREDECESOR)."', DIAS = '".($DIAS)."',  LIDER = '".($LIDER)."',INSTALADOR_4 = '".($INS4)."', INSTALADOR_3 = '".($INS3)."',INSTALADOR_2 = '".($INS2)."',INSTALADOR_1 = '".($INS1)."', TPTMFI = '".($TPTMFI)."', DIRECCION = '".($DIRECCION)."', GUIA_DESPACHO = '".($GUIA)."', NOMBRE_SERVICIO = '". 
($NOMBRE_SERVICIO1)."',FECHA_INICIO = '" .$FECHA_I1. "', FECHA_ENTREGA = '".$FECHA_E1."', REALIZADOR = '".$REALIZADOR1."',SUPERVISOR = '".$SUPERVISOR1. "', OBSERVACIONES = '".($OBSERVACION1)."', DESCRIPCION = '".($DESCRIPCION1)."',ESTADO= '".($ESTADO1)."',TRANSPORTE = '".$TRANSPORTE."' WHERE CODIGO_SERVICIO = '".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());



header("Location: InformeProyectoReclamos.php?ESTADO=EN PROCESO");

}


?>