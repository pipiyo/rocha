<?php 
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
mysql_select_db($database_conn, $conn);
$NOMBRE_SERVICIO = $_POST['txt_nombre_servicio'];
$FECHAES= $_POST['txt_fechae_servicio'];
$FECHAIS= $_POST['txt_fechai_servicio'];
$REALIZADOR= $_POST['txt_realizador'];
$SUPERVISOR= $_POST['txt_supervisor'];
$OBSERVACIONESS= $_POST['txt_observaciones_s'];
$DIRECCION2 = $_POST['txt_direccions'];
$TTF = $_POST['txt_ttf'];
$INS1 = $_POST['ins1'];
$INS2 = $_POST['ins2'];
$COMUNA = $_POST['txt_comuna'];
$INS3 = $_POST['ins3'];
$INS4 = $_POST['ins4'];
$LIDER = $_POST['lider'];
$M3 = $_POST['txt_m3'];
$CANTIDAD_DIAS = $_POST['txt_cantidad_dias'];
$PREDECESOR = "";
$PUESTOS1 = $_POST['puestos'];
$SERVICIO = $_POST['txt_servicio'];
$DOCUMENTO = $_POST['txt_documento'];
$TECNICO1= $_POST['tec1'];
$TECNICO2 = $_POST['tec2'];
$RECLAMOS = $_POST['txt_reclamos'];
$VEHICULO = $_POST['txt_transporte'];
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$CODIGO_PROYECTO = $_POST['CODIGO_PROYECTO'];
$FI = $_POST['txt_fi'];
$VALE = $_POST['txt_vale'];
$CATEGORIA = $_POST['txt_Categoria'];
$BODEGA = $_POST['txt_bodega'];
/* */
$FACTURA= $_POST['txt_factura'];
$MONTO_FACTURA = $_POST['txt_monto_factura'];
/* */


  $MONTO_FACTURA = str_replace(".",",",$MONTO_FACTURA); 


  $MONTO_FACTURA = str_replace(",",".",$MONTO_FACTURA); 


if(isset($_POST['txt_guia']))
{
$GUIA = $_POST['txt_guia'];
}
else
{
$GUIA = "";  
}

$PROCESO ='';

if($NOMBRE_SERVICIO == "Produccion")
{ 
  $EJECUTOR = $_POST['txt_ejecutor'];
  if(isset($_POST['txt_proceso']))
  {
    $PROCESO = $_POST["txt_proceso"];
  }
  $TXTOCPRO = $_POST['txt_prooc'];
  $CANTIDAD = $_POST['txt_cant'];
}
else if($NOMBRE_SERVICIO == "Sillas")
{
  $EJECUTOR = $_POST['txt_ejecutors'];
  if(isset($_POST['txt_procesos']))
  {
    $PROCESO = $_POST['txt_procesos'];
  }
  $TXTOCPRO = $_POST['txt_proocs'];
  $CANTIDAD = $_POST['txt_cants'];
}
else if($NOMBRE_SERVICIO == "Instalacion")
{
  if(isset($_POST['txt_procesoi']))
  {
    $PROCESO = $_POST['txt_procesoi'];
  }
  $EJECUTOR = "";
  $TXTOCPRO = "";
  $CANTIDAD ="";
}
else
{
  $EJECUTOR = "";
  $PROCESO = "";
  $TXTOCPRO = "";
  $CANTIDAD ="";
}
switch ($NOMBRE_SERVICIO)
		 {
	  case "Adquisiciones":
        $NUMERA = 1;
        break;
    case "Mantencion":
         $NUMERA = 2;	
        break;
    case "Desarrollo":
         $NUMERA = 3;	
        break;
    case "Produccion":
         $NUMERA = 4;
        break;
    case "Sillas":
         $NUMERA = 5;	
        break;
    case "Bodega":
          $NUMERA = 6;	
        break;
	  case "FI":
          $NUMERA = 7;
        break;
    case "Despacho":
          $NUMERA = 8;
        break;
    case "Instalacion":
          $NUMERA = 9;	
        break;
	  case "Servicio Tecnico":
          $NUMERA = 10;
        break;
    case "Sistema":
          $NUMERA = 11;
        break;
    case "Prevención de Riesgos":
          $NUMERA = 12;
        break;
    case "Factura":
          $NUMERA = 13;
        break;
    case "Nota de Credito":
          $NUMERA = 14;
        break;
		 }

$FECHA = date('Y/m/d');
$DESCRIPCIONS = $_POST['txt_descripcion_s'];
$FECHA_REALIZACION = date("Y-m-d");

$CUENTA = 0;

if($NOMBRE_SERVICIO == "Factura")
{
$sqlA = "SELECT COUNT(ID) AS CUENTA FROM factura WHERE numero_factura = '".$FACTURA."' and not numero_factura = 0";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultA))
  {
  $CUENTA = $row["CUENTA"];
  }
mysql_free_result($resultA);
}

if($NOMBRE_SERVICIO == "Nota de Credito")
{
$sqlA = "SELECT COUNT(ID) AS CUENTA FROM nota_credito WHERE numero_nota = '".$FACTURA."' and not numero_nota = 0";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultA))
  {
  $CUENTA = $row["CUENTA"];
  }
mysql_free_result($resultA);
}

if($CUENTA <= 0)
{
$NCOMUNA="";
$query_registro = "SELECT * FROM comunas WHERE NOMBRE_COMUNA ='".$COMUNA."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
    $NCOMUNA= $row["CODIGO_COMUNA"];
  }
 mysql_free_result($result);

$sql = "INSERT INTO servicio (CODIGO_COMUNA,FI,OC,DOCUMENTO_SERVICIO_TECNICO,TIPO_SERVICIO,TECNICO_1,TECNICO_2,PROCESO,EJECUTOR,PUESTOS,PREDECESOR,DIAS,LIDER,INSTALADOR_1,INSTALADOR_2,INSTALADOR_3,INSTALADOR_4,DESCRIPCION,NOMBRE_SERVICIO,FECHA_INICIO,FECHA_ENTREGA,FECHA_PRIMERA_ENTREGA,REALIZADOR,SUPERVISOR,OBSERVACIONES,ESTADO,CODIGO_USUARIO,CODIGO_PROYECTO,DIRECCION,TPTMFI,GUIA_DESPACHO,FECHA_REALIZACION,RECLAMOS,TRANSPORTE,CATEGORIA,CANTIDAD,BODEGA,ORDEN_SERVICIO,VALE,M3,FACTURA,MONTO_FACTURA) values ('".($NCOMUNA)."','".($FI)."','".($TXTOCPRO)."','".($DOCUMENTO)."','".($SERVICIO)."','".($TECNICO1)."','".($TECNICO2)."','".($PROCESO)."','".($EJECUTOR)."','".($PUESTOS1)."','".($PREDECESOR)."','".($CANTIDAD_DIAS)."','".($LIDER)."','".($INS1)."','".($INS2)."','".($INS3)."','".($INS4)."','".($DESCRIPCIONS)."','".($NOMBRE_SERVICIO)."','".($FECHAIS)."','".($FECHAES)."','".($FECHAES)."','".($REALIZADOR)."','".($SUPERVISOR)."','".($OBSERVACIONESS)."','EN PROCESO','".($CODIGO_USUARIO)."','".($CODIGO_PROYECTO)."','".($DIRECCION2)."','".($TTF)."','".($GUIA)."','".$FECHA_REALIZACION."','".$RECLAMOS."','".$VEHICULO."','".($CATEGORIA)."','".($CANTIDAD)."','".($BODEGA)."','".($NUMERA)."','".($VALE)."','".($M3)."','".($FACTURA)."','".($MONTO_FACTURA)."')";
$result = mysql_query($sql, $conn) or die(mysql_error());




if($FI != "")
{
$sql = "UPDATE servicio SET FI = '".$FI."' WHERE CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());  
}

$sqlA = "SELECT * FROM servicio ORDER BY CODIGO_SERVICIO DESC LIMIT 1";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultA))
  {
  $CODIGO_OCA = $row["CODIGO_SERVICIO"];
  }
mysql_free_result($resultA);


if($NOMBRE_SERVICIO == "Factura"){
$sql = "INSERT INTO factura (NUMERO_FACTURA, FECHA_INICIO, FECHA_ENTREGA, MONTO, CODIGO_PROYECTO,CODIGO_SERVICIO,FECHA_CONFIRMACION) VALUES ('".$FACTURA."','".$FECHAIS."','".$FECHAES."','".$MONTO_FACTURA."','".$CODIGO_PROYECTO."','".$CODIGO_OCA."','".$FECHAES."')";
$result = mysql_query($sql, $conn) or die(mysql_error());  
}

if($NOMBRE_SERVICIO == "Nota de Credito"){
$sql = "INSERT INTO nota_credito (NUMERO_NOTA, FECHA_INICIO, FECHA_ENTREGA, MONTO, CODIGO_PROYECTO,CODIGO_SERVICIO,FECHA_CONFIRMACION) VALUES ('".$FACTURA."','".$FECHAIS."','".$FECHAES."','".$MONTO_FACTURA."','".$CODIGO_PROYECTO."','".$CODIGO_OCA."','".$FECHAES."')";
$result = mysql_query($sql, $conn) or die(mysql_error());  
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
     $sql = "INSERT INTO guia_despacho_md(CODIGO_GUIA,CODIGO_SERVICIO,ESTADO) values ('".$GUIA."','".$CODIGO_OCA."','Pendiente')";
     $result = mysql_query($sql, $conn) or die(mysql_error());  
    }
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
     $sql = "INSERT INTO guia_despacho_si(CODIGO_GUIA,CODIGO_SERVICIO,ESTADO) values ('".$GUIA."','".$CODIGO_OCA."','Pendiente')";
     $result = mysql_query($sql, $conn) or die(mysql_error());  
    }
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
     $sql = "INSERT INTO guia_despacho_mu(CODIGO_GUIA,CODIGO_SERVICIO,ESTADO) values ('".$GUIA."','".$CODIGO_OCA."','Pendiente')";
     $result = mysql_query($sql, $conn) or die(mysql_error());  
    }
  }
}


$contador = 1;
while ($contador <= 49 )
{
$PRODUCTO = $_POST['txt_producto'.$contador];
$CANTIDAD_S = $_POST['txt_cantid_producto'.$contador];
$CODIGO =   $_POST['txt_codigo'.$contador];

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

  
$sql01="INSERT INTO servicio_vale (CODIGO_SERVICIO, CODIGO_PRODUCTO, CANTIDAD, DESCRIPCION,CANTIDAD_ENTREGADA) VALUES ('".$CODIGO_OCA."','".$CODIGO."','".$CANTIDAD_E."','".$PRODUCTO."','".$CANTIDAD_S."')";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());

$CANTIDAD_T = $CANTIDAD_U + $CANTIDAD_S;

$sql02="UPDATE producto_vale_emision SET CANTIDAD_UTILIZADA = '".$CANTIDAD_T."' WHERE CODIGO_PRODUCTO = '".$CODIGO."' and CODIGO_VALE = '".$VALE."'";
$result02 = mysql_query($sql02, $conn) or die(mysql_error());


}
$contador++;
}
echo '<script language = javascript>
javascript:history.go(-2)
</script>';
}

else
{
echo '<script language = javascript>
alert("Factura O Nota ya ingresada")
javascript:history.go(-2)
</script>';
}


?>