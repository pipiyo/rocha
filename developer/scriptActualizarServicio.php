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
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$USUARIO = $_SESSION['NOMBRE_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
mysql_select_db($database_conn, $conn);
$CODIGO = $_GET['txt_codigo'];	
$query_registro = "SELECT * FROM SERVICIO WHERE CODIGO_SERVICIO ='".$CODIGO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	  $NOMBRE_SERVICIO2 = $row["NOMBRE_SERVICIO"];
	$FECHA_I2 = $row["FECHA_INICIO"];
	$FECHA_E2 = $row["FECHA_ENTREGA"];
	$REALIZADOR2 = $row["REALIZADOR"];
	$SUPERVISOR2 = $row["SUPERVISOR"];
	$OBSERVACION2 = $row["OBSERVACIONES"];
	$DESCRIPCION2 = $row["DESCRIPCION"];
	$CODIGO_SERVICIO2 = $row["CODIGO_SERVICIO"];
	$ESTADO2 = $row["ESTADO"];
	$PREDECESOR2 = $row["PREDECESOR"];
	$DIAS2 = $row["DIAS"];
	$DIRECCIO2= $row["DIRECCION"];
	$TPTMFI2= $row["TPTMFI"];
    $GUIA2= $row["GUIA_DESPACHO"];
	$INS12= $row["INSTALADOR_1"];
	$INS22= $row["INSTALADOR_2"];
	$INS32= $row["INSTALADOR_3"];
	$INS42= $row["INSTALADOR_4"];
	$LIDER2= $row["LIDER"];
	$PUESTOS2 = $row["PUESTOS"];
	$PROCESO2 = $row["PROCESO"];
	$EJECUTOR2 = $row["EJECUTOR"];
	$SERVICIO2 = $row['TIPO_SERVICIO'];
    $DOCUMENTO2 = $row['DOCUMENTO_SERVICIO_TECNICO'];
    $TECNICO12= $row['TECNICO_1'];
    $TECNICO22 =$row['TECNICO_2'];
	$RECLAMOS2  = $row["RECLAMOS"];
	$VEHICULO2 = $row["TRANSPORTE"];
	$OC2 = $row["OC"];
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
  $OC="";
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
if (isset($_GET['txt_prooc']))
{
$OC = $_GET['txt_prooc'];
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


$FECHA1 = date('Y/m/d');


if($NOMBRE_SERVICIO1 != $NOMBRE_SERVICIO2 && $NOMBRE_SERVICIO2 != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA1)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','SERVICIO','".$NOMBRE_SERVICIO2."','".$NOMBRE_SERVICIO1."','Nombre')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_SERVICIO) values ('".($CODIGO_A)."','".($CODIGO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
if($FECHA_I1 != $FECHA_I2 && $FECHA_I2 != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA1)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','SERVICIO','".$FECHA_I2 ."','".$FECHA_I1."','Fecha Ingreso')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_SERVICIO) values ('".($CODIGO_A)."','".($CODIGO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
if($FECHA_E1 != $FECHA_E2 && $FECHA_E2 != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA1)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','SERVICIO','".$FECHA_E2 ."','".$FECHA_E1."','Fecha Entrega')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_SERVICIO) values ('".($CODIGO_A)."','".($CODIGO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}

if(($DESCRIPCION1) != $DESCRIPCION2 && $DESCRIPCION2 != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA1)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','SERVICIO','".$DESCRIPCION2 ."','".$DESCRIPCION1."','Descripcion')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_SERVICIO) values ('".($CODIGO_A)."','".($CODIGO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}


if($DIAS != $DIAS2 && $DIAS2)
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA1)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','SERVICIO','".$DIAS2 ."','".$DIAS."','Dias')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_SERVICIO) values ('".($CODIGO_A)."','".($CODIGO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}

if(($OBSERVACION1) != $OBSERVACION2 && $OBSERVACION2)
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA1)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','SERVICIO','".$OBSERVACION2 ."','".$OBSERVACION1."','Observaciones')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_SERVICIO) values ('".($CODIGO_A)."','".($CODIGO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}


$sql = "UPDATE servicio SET RECLAMOS = '".$RECLAMOS."', TECNICO_2 = '".($TECNICO2)."',TECNICO_1 = '".($TECNICO1)."',TIPO_SERVICIO = '".($SERVICIO)."', DOCUMENTO_SERVICIO_TECNICO = '".($DOCUMENTO)."', PROCESO = '".($PROCESO)."', EJECUTOR = '".($EJECUTOR)."', PUESTOS  = '".($PUESTOS)."', PREDECESOR = '".($PREDECESOR)."', DIAS = '".($DIAS)."',  LIDER = '".($LIDER)."',INSTALADOR_4 = '".($INS4)."', INSTALADOR_3 = '".($INS3)."',INSTALADOR_2 = '".($INS2)."',INSTALADOR_1 = '".($INS1)."', TPTMFI = '".($TPTMFI)."', DIRECCION = '".($DIRECCION)."', GUIA_DESPACHO = '".($GUIA)."', NOMBRE_SERVICIO = '". 
($NOMBRE_SERVICIO1)."',FECHA_INICIO = '" .$FECHA_I1. "', FECHA_ENTREGA = '".$FECHA_E1."', REALIZADOR = '".$REALIZADOR1."',SUPERVISOR = '".$SUPERVISOR1. "', OBSERVACIONES = '".($OBSERVACION1)."', DESCRIPCION = '".($DESCRIPCION1)."',ESTADO= '".($ESTADO1)."',TRANSPORTE = '".$TRANSPORTE."',OC='OC4' WHERE CODIGO_SERVICIO = '".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

if (isset($_GET['rutaa']))
{
$rutaa = $_GET['rutaa'];
$CODIGO_RUTA = $_GET['CODIGO_RUTA'];
}
else
{
	$rutaa = "";
}
$editarp = $_GET['editarp'];

if($editarp == 'editarp')
{
	header("Location: editarProyecto.php?CODIGO_PROYECTO=".urlencode($CODIGO_PROYECTO)."");
}
else if($rutaa == 'ruta')
{
	header("Location: Ruta_entrega.php?CODIGO_RUTA=".$CODIGO_RUTA."");
}
else if($NOMBRE_SERVICIO1 == 'Despacho')
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
}
else
{
echo '<script language = javascript>
alert("El codigo que ingreso no existe")
self.location = "editarProyecto.php?CODIGO_PROYECTO=".urlencode($CODIGO_PROYECTO).""
</script>';
}
?>