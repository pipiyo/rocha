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

$EDITAR = "";

$COMUNA = "" ;
$NCOMUNA = "" ;

if(isset($_GET['editar_rutaDescripcion']))
{
$EDITAR  = $_GET['editar_rutaDescripcion'];
}

$query_registro = "SELECT * FROM SERVICIO WHERE CODIGO_SERVICIO ='".$CODIGO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	  
	  
	$NOMBRE_SERVICIO2 = $row["NOMBRE_SERVICIO"];
	$FECHA_I2 = $row["FECHA_INICIO"];
	$FECHA_E2 = $row["FECHA_PRIMERA_ENTREGA"];
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
	$CANTIDAD = $row["CANTIDAD"];
		$FECHA_CONFI = $row["FECHA_ENTREGA"];
	$numero++;
  }
mysql_free_result($result1);
  
if($numero != 0)
{
	
$NOMBRE_SERVICIO1 = "";
$FECHA_I1 =  "";
$FECHA_E1 =  "";
$FECHA_C1 =  $FECHA_CONFI;
$HORA_CONF = "";
$REALIZADOR1 =  "";
$SUPERVISOR1 =  "";
$OBSERVACION1 =  "";
$DESCRIPCION1 =  "";
$ESTADO1 =  "";
$CODIGO_PROYECTO =  "";
$DIRECCION =  "";
$GUIA =  "";
$TPTMFI= "";
$INS1 = "";
$INS2 = "";
$INS3 = "";
$INS4 = "";
$M3 = "";
$LIDER = "";
$PREDECESOR = "";
$DIAS = "";
$PUESTOS = "";
$SERVICIO = "";
$DOCUMENTO = "";
$TECNICO1= "";
$TECNICO2 = "";
$RECLAMOS = "";
$VEHICULO = "";
$OC = "";
$CANTIDAD = "";
$EJECUTOR = "";
$PROCESO = "";
$EJECUTOR = "";
$BODEGA = "";
$FI = "";
$CATEGORIA = "";
$PROGRESO ="";

$FACTURA = "";
$MONTO_FACTURA ="";

$RECEPCION= 0;
$ARCHIVO = 0;

	
if(isset($_GET['txt_nombre_servicio']))
{	
$NOMBRE_SERVICIO1 =  $_GET["txt_nombre_servicio"];
}
if(isset($_GET['txt_fechai']))
{	
$FECHA_I1 =  $_GET["txt_fechai"];
}
if(isset($_GET['txt_comuna']))
{	
$COMUNA =  $_GET["txt_comuna"];
}
if(isset($_GET['txt_fechape']))
{	
$FECHA_E1 =  $_GET["txt_fechape"];
}
if(isset($_GET['txt_fechae']))
{	
$FECHA_C1 =  $_GET["txt_fechae"];
}
if(isset($_GET['txt_hora']))
{
$HORA_CONF =  $_GET["txt_hora"];
}
if(isset($_GET['txt_realizador']))
{
$REALIZADOR1 =  $_GET["txt_realizador"];
}
if(isset($_GET['txt_supervisor']))
{
$SUPERVISOR1 =  $_GET["txt_supervisor"];
}
if(isset($_GET['txt_observacion']))
{
$OBSERVACION1 =  $_GET["txt_observacion"];
}
if(isset($_GET['txt_descripcion']))
{
$DESCRIPCION1 =  $_GET["txt_descripcion"];
}
if(isset($_GET['txt_estado']))
{
$ESTADO1 =  $_GET["txt_estado"];
}
if(isset($_GET['txt_codigo_proyecto']))
{
$CODIGO_PROYECTO =  $_GET["txt_codigo_proyecto"];
}
if(isset($_GET['txt_direccion']))
{
$DIRECCION =  $_GET["txt_direccion"];
}
if(isset($_GET['txt_guia']))
{
$GUIA =  $_GET["txt_guia"];
}
if(isset($_GET['txt_tptmfi']))
{
$TPTMFI= $_GET["txt_tptmfi"];
}
if(isset($_GET['ins1']))
{
$INS1 = $_GET['ins1'];
}
if(isset($_GET['ins2']))
{
$INS2 = $_GET['ins2'];
}
if(isset($_GET['ins3']))
{
$INS3 = $_GET['ins3'];
}
if(isset($_GET['ins4']))
{
$INS4 = $_GET['ins4'];
}
if(isset($_GET['lider']))
{
$LIDER = $_GET['lider'];
}
if(isset($_GET['txt_predecesor']))
{
$PREDECESOR = $_GET['txt_predecesor'];
}
if(isset($_GET['txt_dias']))
{
$DIAS = $_GET['txt_dias'];
}
if(isset($_GET['puestos']))
{
$PUESTOS = $_GET['puestos'];
}
if(isset($_GET['txt_servicio']))
{
$SERVICIO = $_GET['txt_servicio'];
}
if(isset($_GET['txt_documento']))
{
$DOCUMENTO = $_GET['txt_documento'];
}
if(isset($_GET['tec1']))
{
$TECNICO1= $_GET['tec1'];
}
if(isset($_GET['tec2']))
{
$TECNICO2 = $_GET['tec2'];
}
if(isset($_GET['txt_reclamos']))
{
$RECLAMOS = $_GET['txt_reclamos'];
}
if(isset($_GET['txt_transporte']))
{
$VEHICULO = $_GET['txt_transporte'];
}
if(isset($_GET['txt_prooc']))
{
$OC = $_GET['txt_prooc'];
}
if(isset($_GET['txt_cant']))
{
$CANTIDAD = $_GET['txt_cant'];
}
if(isset($_GET['txt_categoria']))
{
$CATEGORIA = $_GET['txt_categoria'];
}
if(isset($_GET['txt_bodega']))
{
$BODEGA = $_GET['txt_bodega'];
}
if(isset($_GET['txt_fi']))
{
$FI = $_GET['txt_fi'];
}
if(isset($_GET['txt_vale']))
{
$VALE = $_GET['txt_vale'];
}
if(isset($_GET['rangeValue1']))
{
$PROGRESO = $_GET['rangeValue1'];
}
if(isset($_GET['m3']))
{
$M3 = $_GET['m3'];
}

if(isset($_GET['txt_re']))
{
$RECEPCION = $_GET['txt_re'];
}
if(isset($_GET['txt_ar']))
{
$ARCHIVO = $_GET['txt_ar'];
}

if(isset($_GET['factura']))
{
$FACTURA = $_GET['factura'];
}
if(isset($_GET['monto_factura']))
{
$MONTO_FACTURA = $_GET['monto_factura'];
}


  $MONTO_FACTURA = str_replace(".","",$MONTO_FACTURA); 


  $MONTO_FACTURA = str_replace(",",".",$MONTO_FACTURA); 



if($NOMBRE_SERVICIO1 == "Produccion")
{ 
  if(isset($_GET['txt_ejecutor']))
  {
    $EJECUTOR = $_GET['txt_ejecutor'];
  }
  if(isset($_GET['txt_proceso']))
  {
    $PROCESO = $_GET['txt_proceso'];
  }
}
else if($NOMBRE_SERVICIO1 == "Sillas")
{
  if(isset($_GET['txt_ejecutors']))
  {
    $EJECUTOR = $_GET['txt_ejecutors'];
  }
  if(isset($_GET['txt_procesos']))
  {
    $PROCESO = $_GET['txt_procesos'];
  }
}
else if($NOMBRE_SERVICIO1 == "Instalacion")
{
  if(isset($_GET['txt_procesoi']))
  {
    $PROCESO = $_GET['txt_procesoi'];
  }
}

$fecha = date("y-m-y G:i:s");
$FECHA1 = date('Y/m/d');


if($OC == '')
{
	$OC = 'SIN OC';
}
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

if($ESTADO1 != $ESTADO2 && $ESTADO2 != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA1)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','SERVICIO','".$ESTADO2 ."','".$ESTADO1."','Estado')";
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

$query_registro = "SELECT * FROM comunas WHERE NOMBRE_COMUNA ='".$COMUNA."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
    $NCOMUNA= $row["CODIGO_COMUNA"];
  }
 mysql_free_result($result);

if($FECHA_C1 == "" || $FECHA_C1 == "0000-00-00 00:00:00") 
{
$sql = "UPDATE servicio SET ARCHIVO = '".$ARCHIVO."', RECEPCION = '".$RECEPCION."', MONTO_FACTURA = '".$MONTO_FACTURA."',FACTURA = '".$FACTURA."',M3 = '".$M3."', PROGRESO = '".$PROGRESO."',CODIGO_COMUNA='".$NCOMUNA."',  TRANSPORTE ='".$VEHICULO."', RECLAMOS = '".$RECLAMOS."', TECNICO_2 = '".($TECNICO2)."',TECNICO_1 = '".($TECNICO1)."',TIPO_SERVICIO = '".($SERVICIO)."', DOCUMENTO_SERVICIO_TECNICO = '".($DOCUMENTO)."', PROCESO = '".($PROCESO)."', EJECUTOR = '".($EJECUTOR)."', PUESTOS  = '".($PUESTOS)."', PREDECESOR = '".($PREDECESOR)."', DIAS = '".($DIAS)."',  LIDER = '".($LIDER)."',INSTALADOR_4 = '".($INS4)."', INSTALADOR_3 = '".($INS3)."',INSTALADOR_2 = '".($INS2)."',INSTALADOR_1 = '".($INS1)."', TPTMFI = '".($TPTMFI)."', DIRECCION = '".($DIRECCION)."', GUIA_DESPACHO = '".($GUIA)."', NOMBRE_SERVICIO = '". 
($NOMBRE_SERVICIO1)."',FECHA_INICIO = '" .$FECHA_I1. "', FECHA_PRIMERA_ENTREGA = '".$FECHA_E1."', FECHA_ENTREGA = '".$FECHA_E1."', REALIZADOR = '".$REALIZADOR1."',SUPERVISOR = '".$SUPERVISOR1. "', OBSERVACIONES = '".($OBSERVACION1)."', DESCRIPCION = '".($DESCRIPCION1)."',ESTADO= '".($ESTADO1)."',OC='".$OC."',CATEGORIA='".$CATEGORIA."',CANTIDAD='".$CANTIDAD."',BODEGA='".$BODEGA."',FI='".$FI."'    WHERE CODIGO_SERVICIO = '".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
}
else 
{
$sql = "UPDATE servicio SET ARCHIVO = '".$ARCHIVO."', RECEPCION = '".$RECEPCION."', MONTO_FACTURA = '".$MONTO_FACTURA."', FACTURA = '".$FACTURA."', M3 = '".$M3."', PROGRESO = '".$PROGRESO."',CODIGO_COMUNA='".$NCOMUNA."', TRANSPORTE ='".$VEHICULO."', RECLAMOS = '".$RECLAMOS."', TECNICO_2 = '".($TECNICO2)."',TECNICO_1 = '".($TECNICO1)."',TIPO_SERVICIO = '".($SERVICIO)."', DOCUMENTO_SERVICIO_TECNICO = '".($DOCUMENTO)."', PROCESO = '".($PROCESO)."', EJECUTOR = '".($EJECUTOR)."', PUESTOS  = '".($PUESTOS)."', PREDECESOR = '".($PREDECESOR)."', DIAS = '".($DIAS)."',  LIDER = '".($LIDER)."',INSTALADOR_4 = '".($INS4)."', INSTALADOR_3 = '".($INS3)."',INSTALADOR_2 = '".($INS2)."',INSTALADOR_1 = '".($INS1)."', TPTMFI = '".($TPTMFI)."', DIRECCION = '".($DIRECCION)."', GUIA_DESPACHO = '".($GUIA)."', NOMBRE_SERVICIO = '". 
($NOMBRE_SERVICIO1)."',FECHA_INICIO = '" .$FECHA_I1. "', FECHA_PRIMERA_ENTREGA = '".$FECHA_E1."',FECHA_ENTREGA = '".substr($FECHA_C1,0,10)." ".$HORA_CONF."', REALIZADOR = '".$REALIZADOR1."',SUPERVISOR = '".$SUPERVISOR1. "', OBSERVACIONES = '".($OBSERVACION1)."', DESCRIPCION = '".($DESCRIPCION1)."',ESTADO= '".($ESTADO1)."',OC='".$OC."' ,CATEGORIA='".$CATEGORIA."',CANTIDAD='".$CANTIDAD."',BODEGA='".$BODEGA."' ,FI='".$FI."'   WHERE CODIGO_SERVICIO = '".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
}


if($NOMBRE_SERVICIO1 == "Factura"){

$sql = "UPDATE factura SET NUMERO_FACTURA = '".$FACTURA."', FECHA_INICIO = '".$FECHA_I1."', FECHA_ENTREGA = '".$FECHA_E1."', MONTO = '".$MONTO_FACTURA."' WHERE CODIGO_SERVICIO ='".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());  
}

if($NOMBRE_SERVICIO1 == "Nota de Credito"){

$sql = "UPDATE nota_credito SET NUMERO_NOTA = '".$FACTURA."', FECHA_INICIO = '".$FECHA_I1."', FECHA_ENTREGA = '".$FECHA_E1."', MONTO = '".$MONTO_FACTURA."' WHERE CODIGO_SERVICIO ='".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());  
}

if($FI != "")
{

$cuenta = 0;

$query_registro = "SELECT count(CODIGO_SERVICIO) as cuenta FROM servicio WHERE NOMBRE_SERVICIO = 'FI' AND CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {
    $cuenta = $row["cuenta"];
  }
mysql_free_result($result);

$contador=0;
$CODIGO_FI_NO = "";
$MENOR="";
$CS = 0;
$query_registro = "SELECT * FROM servicio WHERE NOMBRE_SERVICIO = 'FI' AND CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' order by CODIGO_SERVICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {

    if($contador == 1)
    {
      $CODIGO_FI_NO.= "'".$row["CODIGO_SERVICIO"]."'";
      $MENOR = " AND CODIGO_SERVICIO < '".$row["CODIGO_SERVICIO"]."' AND not CODIGO_SERVICIO > '".$row["CODIGO_SERVICIO"]."' ";
      $CS = $row["CODIGO_SERVICIO"];
    }
    else if($contador > 1)
    {
      $CODIGO_FI_NO.= ",'".$row["CODIGO_SERVICIO"]."'"; 
    }

    $contador++;
  }
mysql_free_result($result);


  if($CS > $CODIGO)
  {  
    if($cuenta > 1)
    {
      $sql23 = "UPDATE servicio SET FI = '".$FI."' WHERE CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' AND  CODIGO_SERVICIO NOT in(".$CODIGO_FI_NO.") ".$MENOR." ";
      $result = mysql_query($sql23, $conn) or die(mysql_error());  
    }
    else
    {
      $sql23 = "UPDATE servicio SET FI = '".$FI."' WHERE CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";
      $result = mysql_query($sql23, $conn) or die(mysql_error());  
    }
  }
  else if($CS == 0)
  {
      $sql23 = "UPDATE servicio SET FI = '".$FI."' WHERE CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";
      $result = mysql_query($sql23, $conn) or die(mysql_error());  
  }
}


if($GUIA != "")
{
 if(substr($CODIGO_PROYECTO,0,1) == 'M')
  {
    $CODIGO_GUIA = 0;
    $sql1 = "SELECT COUNT(CODIGO_GUIA) AS CODIGO_GUIA FROM guia_despacho_md WHERE CODIGO_GUIA = '".$GUIA."'";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
    $CODIGO_GUIA = $row["CODIGO_GUIA"];
    }
    mysql_free_result($result2);

    if($CODIGO_GUIA == 0)
    {
     $sql = "INSERT INTO guia_despacho_md(CODIGO_GUIA,CODIGO_SERVICIO,ESTADO) values ('".$GUIA."','".$CODIGO."','Pendiente')";
     $result = mysql_query($sql, $conn) or die(mysql_error());  
    }
    $sql = "UPDATE guia_despacho_md SET CODIGO_GUIA = '".$GUIA."' WHERE CODIGO_SERVICIO = '".$CODIGO."'";
    $result = mysql_query($sql, $conn) or die(mysql_error());  
  }
  else if(substr($CODIGO_PROYECTO,0,1) == 'S')
  {
    $CODIGO_GUIA = 0;
    $sql1 = "SELECT COUNT(CODIGO_GUIA) AS CODIGO_GUIA FROM guia_despacho_si WHERE CODIGO_GUIA = '".$GUIA."'";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
    $CODIGO_GUIA = $row["CODIGO_GUIA"];
    }
    mysql_free_result($result2);

    if($CODIGO_GUIA == 0)
    {
     $sql = "INSERT INTO guia_despacho_si(CODIGO_GUIA,CODIGO_SERVICIO,ESTADO) values ('".$GUIA."','".$CODIGO."','Pendiente')";
     $result = mysql_query($sql, $conn) or die(mysql_error());  
    }
    $sql = "UPDATE guia_despacho_si SET CODIGO_GUIA = '".$GUIA."' WHERE CODIGO_SERVICIO = '".$CODIGO."'";
    $result = mysql_query($sql, $conn) or die(mysql_error());  
  }
  else 
  {
    $CODIGO_GUIA = 0;
    $sql1 = "SELECT COUNT(CODIGO_GUIA) AS CODIGO_GUIA FROM guia_despacho_mu WHERE CODIGO_GUIA = '".$GUIA."'";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
    $CODIGO_GUIA = $row["CODIGO_GUIA"];
    }
    mysql_free_result($result2);

       if($CODIGO_GUIA == 0)
    {
     $sql = "INSERT INTO guia_despacho_mu(CODIGO_GUIA,CODIGO_SERVICIO,ESTADO) values ('".$GUIA."','".$CODIGO."','Pendiente')";
     $result = mysql_query($sql, $conn) or die(mysql_error());  
    }
    $sql = "UPDATE guia_despacho_mu SET CODIGO_GUIA = '".$GUIA."' WHERE CODIGO_SERVICIO = '".$CODIGO."'";
    $result = mysql_query($sql, $conn) or die(mysql_error());  
  }
}
/*
$contador = 1;
while ($contador <= 49 )
{
$PRODUCTO = $_GET['txt_producto'.$contador];
if($ESTADO1 == 'NULO' || $CATEGORIA != 'Proceso')
{
$CANTIDAD_S = 0;
}
else
{
$CANTIDAD_S = $_GET['txt_cantid_producto'.$contador];
}
$CODIGO =   $_GET['txt_codigo'.$contador];
$ID =  $_GET['id_pv'.$contador];


if($PRODUCTO != "" && $CODIGO != "")
{

$sqlA = "SELECT * FROM producto_vale_emision WHERE CODIGO_PRODUCTO = '".$CODIGO."' and CODIGO_VALE = '".$VALE."'";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resultA))
  {
  $CANTIDAD_E = $row["CANTIDAD_SOLICITADA"];
  $CANTIDAD_U = $row["CANTIDAD_UTILIZADA"];
  }
  mysql_free_result($resultA);

$sql111 = "SELECT *  from servicio_vale where ID = '".$ID."' ";
$result111 = mysql_query($sql111, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result111))
  {
  $CANTIDAD_ENTREGADA= $row["CANTIDAD_ENTREGADA"];
  }
  mysql_free_result($result111);


  if($ID == "")
  {
  $sql01="INSERT INTO servicio_vale (CODIGO_SERVICIO, CODIGO_PRODUCTO, CANTIDAD, DESCRIPCION,CANTIDAD_ENTREGADA) VALUES ('".$CODIGO_OCA."','".$CODIGO."','".$CANTIDAD_E."','".$PRODUCTO."','".$CANTIDAD_S."')";
  $result01 = mysql_query($sql01, $conn) or die(mysql_error());
  }
  else
  {
  $sql01="UPDATE servicio_vale SET  CANTIDAD_ENTREGADA = '".$CANTIDAD_S."' WHERE ID = '".$ID."'";
 $result01 = mysql_query($sql01, $conn) or die(mysql_error());
  }
  
$CANTIDAD_S =  $CANTIDAD_S - $CANTIDAD_ENTREGADA;
$CANTIDAD_T = $CANTIDAD_U + $CANTIDAD_S;

$sql02="UPDATE producto_vale_emision SET CANTIDAD_UTILIZADA = '".$CANTIDAD_T."' WHERE CODIGO_PRODUCTO = '".$CODIGO."' and CODIGO_VALE = '".$VALE."'";
$result02 = mysql_query($sql02, $conn) or die(mysql_error());


}
$contador++;
}
*/

if($EDITAR == 'editar')
{
	header("Location: editarProyecto.php?CODIGO_PROYECTO=".urlencode($CODIGO_PROYECTO)."");
}
else if($EDITAR == 'reclamo')
{
header("Location: InformeProyectoReclamos.php?ESTADO=EN PROCESO");
}
else if($NOMBRE_SERVICIO1 == 'Despacho')
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Instalacion")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Sillas")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Servicio Tecnico")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Sistema")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Produccion")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Bodega")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Adquisiciones")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "FI")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Mantencion")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Visita")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Presentacion")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Cotizacion")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Reunion")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == "Planimetria")
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == 'Factura')
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == 'Nota de Credito')
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}
else if($NOMBRE_SERVICIO1 == 'TI')
{
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
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