<?php require_once('Conexion/Conexion.php'); ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
$CODIGO = $_GET['CODIGO_PROYECTO'];
///////////////////////////////////////////////////////////////////////////
if (isset($_GET["ingresar1"])) 
{
mysql_select_db($database_conn, $conn);
$OBSERVACIONES = $_GET['txt_observaciones1'];
$CODIGO1 = $_GET['txt_codigo_proyecto1'];

$FECHA = date('Y/m/d');
$sql = "INSERT INTO actualizaciones (OBSERVACIONES,FECHA,USUARIO,NOMBRE_USUARIO) values ('".($OBSERVACIONES)."','".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."')";
$result = mysql_query($sql, $conn) or die(mysql_error());

$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO1)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

header("Location: editarProyecto.php?CODIGO_PROYECTO=".urlencode($CODIGO1) ."");
}
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
if (isset($_GET["ingresars"])) 
{
mysql_select_db($database_conn, $conn);
$NOMBRE_SERVICIO = $_GET['txt_nombre_servicio'];
$FECHAES= $_GET['txt_fechae_servicio'];
$FECHAIS= $_GET['txt_fechai_servicio'];
$REALIZADOR= $_GET['txt_realizador'];
$SUPERVISOR= $_GET['txt_supervisor'];
$OBSERVACIONESS= $_GET['txt_observaciones_s'];
$CODIGO2 = $_GET['txt_codigo_proyecto2'];
$DIRECCION2 = $_GET['txt_direccions'];
$TTF = $_GET['txt_ttf'];
$GUIA = $_GET['txt_guia'];
$INS1 = $_GET['ins1'];
$INS2 = $_GET['ins2'];
$INS3 = $_GET['ins3'];
$INS4 = $_GET['ins4'];
$LIDER = $_GET['lider'];
$CANTIDAD_DIAS = $_GET['txt_cantidad_dias'];
$PREDECESOR = $_GET['txt_predecesor'];
$PUESTOS1 = $_GET['puestos'];
$SERVICIO = $_GET['txt_servicio'];
$DOCUMENTO = $_GET['txt_documento'];
$TECNICO1= $_GET['tec1'];
$TECNICO2 = $_GET['tec2'];
if($NOMBRE_SERVICIO == "Produccion")
{ 
$EJECUTOR = $_GET['txt_ejecutor'];
$PROCESO = $_GET['txt_proceso'];
}
else
{
$EJECUTOR = $_GET['txt_ejecutors'];
$PROCESO = $_GET['txt_procesos'];
}
$FECHA = date('Y/m/d');
$DESCRIPCIONS = $_GET['txt_descripcion_s'];

$sql = "INSERT INTO servicio (DOCUMENTO_SERVICIO_TECNICO,TIPO_SERVICIO,TECNICO_1,TECNICO_2,PROCESO,EJECUTOR,PUESTOS,PREDECESOR,DIAS,LIDER,INSTALADOR_1,INSTALADOR_2,INSTALADOR_3,INSTALADOR_4,DESCRIPCION,NOMBRE_SERVICIO,FECHA_INICIO,FECHA_ENTREGA,REALIZADOR,SUPERVISOR,OBSERVACIONES,ESTADO,CODIGO_USUARIO,CODIGO_PROYECTO,DIRECCION,TPTMFI,GUIA_DESPACHO) values ('".($DOCUMENTO)."','".($SERVICIO)."','".($TECNICO1)."','".($TECNICO2)."','".($PROCESO)."','".($EJECUTOR)."','".($PUESTOS1)."','".($PREDECESOR)."','".($CANTIDAD_DIAS)."','".($LIDER)."','".($INS1)."','".($INS2)."','".($INS3)."','".($INS4)."','".($DESCRIPCIONS)."','".($NOMBRE_SERVICIO)."','".($FECHAIS)."','".($FECHAES)."','".($REALIZADOR)."','".($SUPERVISOR)."','".($OBSERVACIONESS)."','EN PROCESO','".($CODIGO_USUARIO)."','".($CODIGO2)."','".($DIRECCION2)."','".($TTF)."','".($GUIA)."')";
$result = mysql_query($sql, $conn) or die(mysql_error());

header("Location: editarProyecto.php?CODIGO_PROYECTO=".urlencode($CODIGO2)."");
}
///////////////////////////////////////////////////////////////////////////

mysql_select_db($database_conn, $conn);	
$query_registro = "SELECT * FROM proyecto WHERE CODIGO_PROYECTO ='".($CODIGO)."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$CODIGO_PROYECTO1 = $row["CODIGO_PROYECTO"];
	$NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$OBRA = $row["OBRA"];
	$MONTO = $row["MONTO"];
	$EJECUTIVO = $row["EJECUTIVO"];
    $CONTACTO = $row["CONTACTO"];
	$TELEFONO = $row["TELEFONO"];
	$DIRECCION_DESPACHO = $row["DIRECCION_DESPACHO"];
	$DIRECCION_FACTURACION = $row["DIRECCION_FACTURACION"];
	$FECHA_INGRESO = $row["FECHA_INGRESO"];
	$FECHA_INSTALACION= $row["FECHA_ENTREGA"];
	$DIAS= $row["DIAS"];
	$VALIDEZ= $row["VALIDEZ_COTIZACION"];
	$CONDICION= $row["CONDICION_PAGO"];
	$OBSERVACIONES= $row["OBSERVACIONES"];
	$DEPARTAMENTO_CREDITO= $row["DEPARTAMENTO_CREDITO"];
	$ORDEN= $row["ORDEN_CC"];
	$RUT= $row["RUT_CLIENTE"];
	$TRANSPORTE = $row["TRANSPORTE"]; 
	$ESTADO = $row["ESTADO"]; 
	$PUESTOS = $row["PUESTOS"];
	$numero++;
  }
mysql_free_result($result1);

//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Editar Proyecto</title>
   <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_materiales_ingreso.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/ordenDeCompra.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>>
  <script src="jquery.bpopup-x.x.x.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src="js/jquery.ui.datepicker.js"></script>
 <script language = javascript>
    $(function(){
                $('#txt_director').autocomplete({
                   source : 'ajaxEmpleado.php',
                   select : 
				   function(event, ui)
				   {
                       
                   }
                 });
            });
  $(function(){
                $('#txt_nombre_cliente').autocomplete({
                   source : 'ajaxCliente.php',
                   select : 
				   function(event, ui)
				   {
                       $('#txt_rut_cliente').slideUp('slow', function()
					   {
                            $('#txt_rut_cliente').val(
                                 ui.item.rut
                            );
                       });
                       $('#txt_rut_cliente').slideDown('slow');
					   $('#txt_direccion_facturacion').slideUp('slow', function()
					   {
                            $('#txt_direccion_facturacion').val(
                                 ui.item.direccion 
                            );
                       });
                       $('#txt_direccion_facturacion').slideDown('slow');
                   }
                 });
            });	
function enviar()
{
var as1= confirm("Realmente deseas modificar");

if(as1)                   
{
  document.getElementById("formulario1").submit();
}
else
{
  return false;
  //window.location="Materiales.php";
}
} 
$(document).ready(function(){
  $('#txt_observaciones').click(function(){
        $('#popup').fadeIn('slow');
    });

    $('#close').click(function(){
        $('#popup').fadeOut('slow');
    });
});	
$(document).ready(function(){
  $('#generar').click(function(){
        $('#popup1').fadeIn('slow');
    });

    $('#close1').click(function(){
        $('#popup1').fadeOut('slow');
    });
});
function dias()
{
var fecha1= document.getElementById('txt_ingreso').value;
var dia1= fecha1.substr(8);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_entrega').value;
var dia2= fecha2.substr(8);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));


document.getElementById('txt_dias').value=dias; 
}

$(function() 
  {     $( "#txt_fechai_servicio").datepicker ({dateFormat: 'yy-mm-dd'});
        $( "#txt_fechae_servicio").datepicker ({dateFormat: 'yy-mm-dd'});
		$( "#txt_entrega" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_ingreso").datepicker ({dateFormat: 'yy-mm-dd'});
		
  });
  
function seleccion()
{
	
Sillas = document.getElementById('Sillas');
Despacho = document.getElementById('Despacho');
General = document.getElementById('General');	
Produccion= document.getElementById('Produccion');	
Instalacion = document.getElementById('Instalacion');
Servicio = document.getElementById('Servicio');
var Nombre = document.getElementById('txt_nombre_servicio').selectedIndex;
if(Nombre == '1')
{
	Sillas.style.display = "none"
	Servicio.style.display = "none";
	Produccion.style.display = "";
	Despacho.style.display = "none";
	General.style.display = "none";
	Instalacion.style.display = "none";
}
else if(Nombre == '2')
{
	Sillas.style.display = "none"
	Servicio.style.display = "none";
	Produccion.style.display = "none";
	Despacho.style.display = "";
	General.style.display = "";
	Instalacion.style.display = "none";
}
else if (Nombre == '3')
{
	Sillas.style.display = "none"
	Servicio.style.display = "none";
	Produccion.style.display = "none";
	Instalacion.style.display = "";
	General.style.display = "";
	Despacho.style.display = "none";
}
else if (Nombre == '9')
{
	Sillas.style.display = "none"
	Servicio.style.display = "";
	Produccion.style.display = "none";
	Instalacion.style.display = "none";
	General.style.display = "none";
	Despacho.style.display = "none";
}
else if (Nombre == '6')
{
	Sillas.style.display = ""
	Servicio.style.display = "none";
	Produccion.style.display = "none";
	Instalacion.style.display = "none";
	General.style.display = "none";
	Despacho.style.display = "none";
}
else 
{
	Sillas.style.display = "none"
	Servicio.style.display = "none";
	Instalacion.style.display = "none";
	Despacho.style.display = "none";
	General.style.display = "none";
}
}

function dias1()
{
var fecha1= document.getElementById('txt_fechai_servicio').value;
var dia1= fecha1.substr(8);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_fechae_servicio').value;
var dia2= fecha2.substr(8);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));


document.getElementById('txt_cantidad_dias').value= parseInt(dias) + 1; 
}
</script>

</head>

<body>
  <div id="main">	
    
	<div id="site_content">	
			   	  
<div id="content">   
<div  class="content_item">		
<center>
<h1>Proyecto</h1>
<form  id = 'formulario1' method="GET" action="scriptEditarProyecto.php" />
<div id = 'formulario'>
<table cellspacing="0" cellpadding="0" id="formulario_rocha" border ="0" width="500">
<tr>
<td  width="110" colspan="2"><b>Codigo proyecto:</b></br> <input readonly type="text" onkeypress="return justNumbers(event);" onkeyup="es_vacio();" id = "txt_codigo_proyecto" name = "txt_codigo_proyecto" value="<?php echo $CODIGO?>"> </td>
<td width="110" colspan="2" ><b>Fecha Ing:</b></br> <input readonly type="text" class="txt_ingreso" id="txt_ingreso" onkeyup="es_vacio();" onchange="dias();es_vacio();" onfocus="dias();" onblur="dias();" name = "txt_ingreso" value="<?php echo $FECHA_INGRESO?>"></td>
</tr>                                                               
<tr>
<td  width="110'"><b>Cliente:</b></br><input type="text" autocomplete="off" onkeyup="es_vacio();" id="txt_nombre_cliente" name="txt_nombre_cliente" value="<?php echo ($NOMBRE_CLIENTE);?>"> </td>
<td  width="110"><b>Rut Cliente:</b></br><input readonly type="text" class="txt_rut_cliente" onkeyup="es_vacio();" id= "txt_rut_cliente" name = "txt_rut_cliente" value="<?php echo $RUT ?>"></td>
<td  width="110"><b>Contacto:</b></br><input readonly type="text"  onkeyup="es_vacio();" id= "txt_contacto_cliente" name = "txt_contacto_cliente" value="<?php echo $CONTACTO?>"></td>
<td  width="110"><b>Obra:</b></br><input  type="text"  onkeyup="es_vacio();" id= "txt_obra" name = "txt_obra" value="<?php echo ($OBRA);?>"></td>
</tr>
<tr>
<td colspan="2"><b>Dirección Despacho:</b></br><input  type="text" onkeyup="es_vacio();" class="txt_direccion_despacho" id = "txt_direccion_despacho" name = "txt_direccion_despacho" value="<?php echo ($DIRECCION_DESPACHO);?>"> </td>
<td colspan="2"><b>Dirección Facturacion:</b></br><input readonlytype="text" id="txt_direccion_facturacion" name = "txt_direccion_facturacion" value="<?php echo ($DIRECCION_FACTURACION);?>"></td>
</tr>
<tr>
<td><b>Telefono:</b></br><input readonly type="text"  onkeyup="es_vacio();" id= "txt_telefono_cliente" name = "txt_telefono_cliente" value="<?php echo $TELEFONO?>"></td>
<td><b>Fecha Instalacion:</b><input readonly type="text"  onchange="dias();es_vacio();" onfocus="dias();" onblur="dias();" id= "txt_entrega" name = "txt_entrega" value="<?php echo $FECHA_INSTALACION?>"></td>
<td><b>Orden cc:</b></br><input readonly type="text"  onkeyup="es_vacio();" id= "txt_orden" name = "txt_orden" value="<?php echo $ORDEN ?>"></td>
<td><b>Director:</b></br><input  type="text"  onkeyup="es_vacio();" id= "txt_director" name = "txt_director" value="<?php echo ($EJECUTIVO);?>"></td>
</tr>
<tr>
<td><b>Condicion Pago:</b><input  type="text"  onkeyup="es_vacio();" id= "txt_condicion_pago" name = "txt_condicion_pago" value="<?php echo $CONDICION?>"></td>
<td><b>Transporte:</b></br><select id = "txt_transporte" name = "txt_transporte">
<option><?php echo $TRANSPORTE ?></option>
<option>Incluido</option>
<option>Cliente</option>
</select></td>
<td><b>Monto:</b></br><input onkeyup="es_vacio();" type="text" name = "txt_monto" id = "txt_monto" value="<?php echo number_format($MONTO, 0, ",", ".")?>"></td>
<td><b>Validez cotización:</b></br><input onkeyup="es_vacio();" type="text" name = "txt_validez" id = "txt_validez" value="<?php echo $VALIDEZ?>"></td>
</tr>
<tr>
<td><b>Depart credito:</b><input readonly type="text"  onkeyup="es_vacio();" id= "txt_departamento_credito" name = "txt_departamento_credito" value="<?php echo $DEPARTAMENTO_CREDITO ?> "></td>
<td><b>Dias:</b></br><input readonly type="text"  onkeyup="es_vacio()" class="txt_dias" id= "txt_dias" name = "txt_dias" value="<?php echo $DIAS ?>"></td>
<td><b>Estado:</b></br><select id = "txt_estado" name="txt_estado">
<option><?php echo $ESTADO ?></option>
<option>EN PROCESO</option>
<option>NULA</option>
<option>OK</option>
</select></td>
<td><b>Puestos:</b></br><input type="text"  class="txt_puestos" id= "txt_puestos" name = "txt_puestos" value="<?php echo $PUESTOS ?>"></td>
</tr>
<tr>
<?php
$sql111 = "SELECT actualizaciones.NOMBRE_USUARIO, actualizaciones.OBSERVACIONES, actualizaciones.FECHA,actualizaciones.USUARIO FROM actualizaciones_general, 
actualizaciones,proyecto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_GENERAL = proyecto.CODIGO_PROYECTO and proyecto.CODIGO_PROYECTO = '".($CODIGO_PROYECTO1)."' ORDER BY ACTUALIZACIONES.CODIGO_ACTUALIZACIONES DESC";
$result111 = mysql_query($sql111, $conn) or die(mysql_error());
echo "<td colspan='4'><b>Observaciones:</b></br><textarea rows='7' cols='74' id='txt_observaciones' name = 'txt_observaciones'>";
 while($row = mysql_fetch_array($result111))
  {
	$OBSERVACIONES_A = $row["OBSERVACIONES"];
	$FECHA_A = $row["FECHA"];
	$USUARIO_A = $row["USUARIO"];
	$NOMBRE_A = $row["NOMBRE_USUARIO"];
    echo "\n" .$NOMBRE_A ." ".$FECHA_A . "\n".$OBSERVACIONES_A . "\n"; 
  }
  echo "</textarea></td>";
?>
</tr>
<tr>
<td></br><input readonly type="button" onclick="enviar();" id="ingresar" name="ingresar" value="Modificar"></td>
</tr>
</table>

<br />
<br />
<table border="0" style="font-size: 8pt" id="tabla_oc" cellpadding="0" cellspacing="0">
<col width="100" />
<col width="180" />
<col width="130" />
<col width="130" />
<col width="135" />
<col width="80" />
<tr>
<th><center>Código</center></th>
<th><center>Proveedor</center></th>
<th><center>Fecha ingreso</center></th>
<th><center>Fecha entrega</center></th>
<th><center>Fecha confirmacion</center></th>
<th><center>Estado</center></th>
<th><center>Total</center></th>
</tr>
<?php
$fin=0;
$sql555 = "select DISTINCT orden_de_compra.FECHA_CONFIRMACION ,orden_de_compra.NOMBRE_PROVEEDOR, orden_de_compra.FECHA_ENTREGA , orden_de_compra.FECHA_REALIZACION , orden_de_compra.CODIGO_OC ,orden_de_compra.ESTADO from orden_de_compra,proyecto,oc_producto where orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO1."'";
$result555 = mysql_query($sql555, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result555))
  {
	$OC = $row["CODIGO_OC"];
	$ESTADO = $row["ESTADO"];
	$FECHA_I = $row["FECHA_REALIZACION"];
	$FECHA_E = $row["FECHA_ENTREGA"];
	$FECHA_C = $row["FECHA_CONFIRMACION"];
	$NOMBRE_PROVEEDOR= $row["NOMBRE_PROVEEDOR"];
$sql666 = "select sum(oc_producto.TOTAL) as TOTAL from orden_de_compra,proyecto,oc_producto where orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO1."' and oc_producto.CODIGO_OC = ".$OC."";
$result666 = mysql_query($sql666, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result666))
 {
   $TOTAL = $row["TOTAL"];
	echo "<tr><td><center> <a href=DescripcionOC1.php?CODIGO_OC=" .$OC. ">" . 
	    $OC. "</a></center></td>";
	echo "<td><center>".$NOMBRE_PROVEEDOR."</center></td>";		
	echo "<td><center>".$FECHA_I."</center></td>";	
	echo "<td><center>".$FECHA_E."</center></td>";	
	echo "<td><center>".$FECHA_C."</center></td>";	
	echo "<td><center>".$ESTADO."</center></td>";	
	echo "<td align='right'>".number_format($TOTAL, 0, ",", ".")."</td></tr>";
   $fin+=$row['TOTAL'];
  }
  }
  echo "<tr><td colspan='7' align='right'>".number_format($fin, 0, ",", ".")."</td></tr>";
?>
</table>
<br />
<br />
</form>
<table>
<tr>
<td><center> <h1>Nueva actividad</h1> </center></td>
<td>&nbsp; <input readonly type="button" id="generar" name="generar" value="Generar"></td>
</tr>
</table>
<br />
<br />
<table style="font-size: 8pt" cellpadding="0" cellspacing="0">
<col width="60" /> 
<col width="60" /> 
<col width="200" />
<col width="80" />
<col width="80" />
<col width="60" />
<col width="60" /> 
<col width="60" />
<col width="200" />
</tr>
<?php
$fin=0;
$sql555 = "select * FROM servicio where CODIGO_PROYECTO = '".$CODIGO."' AND  not NOMBRE_SERVICIO='OC'";
$result555 = mysql_query($sql555, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result555))
  {
	$NOMBRE_SERVICIO1 = $row["NOMBRE_SERVICIO"];
	$CODIGO_SERVICIO1 = $row["CODIGO_SERVICIO"];
	$FECHA_I1 = $row["FECHA_INICIO"];
	$FECHA_E1 = $row["FECHA_ENTREGA"];
	$REALIZADOR1 = $row["REALIZADOR"];
	$SUPERVISOR1 = $row["SUPERVISOR"];
	$OBSERVACION1 = $row["OBSERVACIONES"];
	$DESCRIPCION1 = $row["DESCRIPCION"];
	$CODIGO_SERVICIO1 = $row["CODIGO_SERVICIO"];
	$ESTADO1 = $row["ESTADO"];
	$DIAS1 = $row["DIAS"];
	$PREDECESOR1  = $row["PREDECESOR"];
	if($NOMBRE_SERVICIO1 == "Produccion")
	{
	
	echo "<tr><td style='background:blue; color:#FFF; border-top:#E4E4E7 1px solid border-left:#E4E4E7 1px solid; border-right:#E4E4E7 1px solid;' colspan='10'> <a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO). ">" . 
	    $NOMBRE_SERVICIO1 . "</a></td></tr>";
	echo "<tr><td style='background:blue; color:#FFF; background:blue; color:#FFF;border-left:#E4E4E7 1px solid;'><center>N° actividad</center></td>";	
	echo "<td style='background:blue; color:#FFF; background:blue; color:#FFF;'><center>Prdecesor</center></td>";
	echo "<td style='background:blue; color:#FFF; background:blue; color:#FFF;'><center>Descripcion</center></td>";
	echo "<td style='background:blue; color:#FFF;' ><center>Fecha Inicio</center></td>";	
	echo "<td style='background:blue; color:#FFF;' ><center>Fecha Entrega</center></td>";	
	echo "<td style='background:blue; color:#FFF;' ><center>Dias</center></td>";	
	echo "<td style='background:blue; color:#FFF;' ><center>Usuario</center></td>";
	echo "<td style='background:blue; color:#FFF;' ><center>Supervisor</center></td>";	
	echo "<td style='background:blue; color:#FFF;' ><center>Observacion</center></td>";	
	echo "<td style='background:blue; color:#FFF; border-right:#E4E4E7 1px solid;' ><center>Estado</center></td></tr>";	
	}
	if($NOMBRE_SERVICIO1 == "Instalacion")
	{
	echo "<tr><td style='background:#B10F0F; color:#FFF; border-top:#E4E4E7 1px solid border-left:#E4E4E7 1px solid; border-right:#E4E4E7 1px solid'  colspan='10'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO). ">" . 
	    $NOMBRE_SERVICIO1 . "</a></td></tr>";
	echo "<tr><td style='background:#B10F0F; color:#FFF;border-left:#E4E4E7 1px solid'><center>N° actividad</center></td>";	
	echo "<td style='background:#B10F0F; color:#FFF;'><center>Predecesor</center></td>";	
	echo "<td style='background:#B10F0F; color:#FFF;'><center>Descripcion</center></td>";	
	echo "<td style='background:#B10F0F; color:#FFF;'><center>Fecha Inicio</center></td>";	
	echo "<td style='background:#B10F0F; color:#FFF;'><center>Fecha Entrega</center></td>";
	echo "<td style='background:#B10F0F; color:#FFF;'><center>Dias</center></td>";	
	echo "<td style='background:#B10F0F; color:#FFF;'><center>Usuario</center></td>";
	echo "<td style='background:#B10F0F; color:#FFF;'><center>Supervisor</center></td>";	
	echo "<td style='background:#B10F0F; color:#FFF;'><center>Observacion</center></td>";	
	echo "<td style='background:#B10F0F; color:#FFF; border-right:#E4E4E7 1px solid;'><center>Estado</center></td></tr>";
	}
	if($NOMBRE_SERVICIO1 == "Adquisiciones")
	{
	echo "<tr><td style='background:#36C444; color:#FFF; border-top:#E4E4E7 1px solid border-left:#E4E4E7 1px solid ;border-right:#E4E4E7 1px solid'  colspan='10'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO). ">" . 
	    $NOMBRE_SERVICIO1 . "</a></td></tr>";
    echo "<tr><td style='background:#36C444; color:#FFF;border-left:#E4E4E7 1px solid'><center>N° actividad</center></td>";	
	echo "<td style='background:#36C444; color:#FFF;'><center>Predecesor</center></td>";	
	echo "<td style='background:#36C444; color:#FFF;'><center>Descripcion</center></td>";	
    echo "<td style='background:#36C444; color:#FFF;'><center>Fecha Inicio</center></td>";	
	echo "<td style='background:#36C444; color:#FFF;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#36C444; color:#FFF;'><center>Dias</center></td>";
	echo "<td style='background:#36C444; color:#FFF;'><center>Usuario</center></td>";
	echo "<td style='background:#36C444; color:#FFF;'><center>Supervisor</center></td>";	
	echo "<td style='background:#36C444; color:#FFF;'><center>Observacion</center></td>";	
	echo "<td style='background:#36C444; color:#FFF; border-right:#E4E4E7 1px solid;'><center>Estado</center></td></tr>";		
	}
	if($NOMBRE_SERVICIO1 == "Despacho")
	{	
	echo "<tr><td style='background:#FFFF00; color:Black; border-top:#E4E4E7 1px solid; border-left:#E4E4E7 1px solid ;border-right:#E4E4E7 1px solid'  colspan='10'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO). ">" . 
	    $NOMBRE_SERVICIO1 . "</a></td></tr>";
	echo "<tr><td style='background:#FFFF00; color:Black;border-left:E4E4E7 1px solid;'><center>N° actividad</center></td>";
    echo "<td style='background:#FFFF00; color:Black;'><center>Predecesor</center></td>";	
	echo "<td style='background:#FFFF00; color:Black;'><center>Descripcion</center></td>";	
	echo "<td style='background:#FFFF00; color:Black;'><center>Fecha Inicio</center></td>";	
	echo "<td style='background:#FFFF00; color:Black;'><center>Fecha Entrega</center></td>";
	echo "<td style='background:#FFFF00; color:Black;'><center>Dias</center></td>";	
	echo "<td style='background:#FFFF00; color:Black;'><center>Usuario</center></td>";
	echo "<td style='background:#FFFF00; color:Black;'><center>Supervisor</center></td>";	
	echo "<td style='background:#FFFF00; color:Black;'><center>Observacion</center></td>";	
    echo "<td style='background:#FFFF00; color:Black; border-right:#E4E4E7 1px solid;'><center>Estado</center></td></tr>";	
	}
    if($NOMBRE_SERVICIO1 == "Desarrollo")
	{	
	echo "<tr><td style='background:#E46F1C; color:#FFF; border-top:#E4E4E7 1px solid border-left:#E4E4E7 1px solid; border-right:#E4E4E7 1px solid'  colspan='10'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO). ">" . 
	    $NOMBRE_SERVICIO1 . "</a></td></tr>";
	echo "<tr><td style='background:#E46F1C; color:#FFF;border-left:#E4E4E7 1px solid'><center>N° actividad</center></td>";		
	echo "<td style='background:#E46F1C; color:#FFF;'><center>Predecesor</center></td>";	
	echo "<td style='background:#E46F1C; color:#FFF;'><center>Descripcion</center></td>";	
	echo "<td style='background:#E46F1C; color:#FFF;'><center>Fecha Inicio</center></td>";	
	echo "<td style='background:#E46F1C; color:#FFF;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#E46F1C; color:#FFF;'><center>Dias</center></td>";
	echo "<td style='background:#E46F1C; color:#FFF;'><center>Usuario</center></td>";
	echo "<td style='background:#E46F1C; color:#FFF;'><center>Supervisor</center></td>";	
	echo "<td style='background:#E46F1C; color:#FFF;'><center>Observacion</center></td>";	
    echo "<td style='background:#E46F1C; color:#FFF; border-right:#E4E4E7 1px solid;'><center>Estado</center></td></tr>";	
	}
	 if($NOMBRE_SERVICIO1 == "Mantencion")
	{	
	echo "<tr><td style='background:#642EFE; color:#FFF; border-top:#E4E4E7 1px solid border-left:#E4E4E7 1px solid ;border-right:#E4E4E7 1px solid'  colspan='10'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO). ">" . 
	    $NOMBRE_SERVICIO1 . "</a></td></tr>";
	echo "<tr><td style='background:#642EFE; color:#FFF;border-left:#E4E4E7 1px solid'><center>N° actividad</center></td>";	
	echo "<td style='background:#642EFE; color:#FFF;'><center>Predecesor</center></td>";	
	echo "<td style='background:#642EFE; color:#FFF;'><center>Descripcion</center></td>";	
	echo "<td style='background:#642EFE; color:#FFF;'><center>Fecha Inicio</center></td>";	
	echo "<td style='background:#642EFE; color:#FFF;'><center>Fecha Entrega</center></td>";
	echo "<td style='background:#642EFE; color:#FFF;'><center>Dias</center></td>";		
	echo "<td style='background:#642EFE; color:#FFF;'><center>Usuario</center></td>";
	echo "<td style='background:#642EFE; color:#FFF;'><center>Supervisor</center></td>";	
	echo "<td style='background:#642EFE; color:#FFF;'><center>Observacion</center></td>";	
    echo "<td style='background:#642EFE; color:#FFF; border-right:#E4E4E7 1px solid;'><center>Estado</center></td></tr>";	
	}
	 if($NOMBRE_SERVICIO1 == "Sillas")
	{	
	echo "<tr><td style='background:#0080FF; color:#FFF; border-top:#E4E4E7 1px solid border-left:#E4E4E7 1px solid; border-right:#E4E4E7 1px solid;'  colspan='10'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" .urlencode($CODIGO). ">" . 
	    $NOMBRE_SERVICIO1 . "</a></td></tr>";
	echo "<tr><td style='background:#0080FF; color:#FFF;border-left:#E4E4E7 1px solid'><center>N° actividad</center></td>";		
	echo "<td style='background:#0080FF; color:#FFF;'><center>Predecesor</center></td>";
	echo "<td style='background:#0080FF; color:#FFF;'><center>Descripcion</center></td>";	
	echo "<td style='background:#0080FF; color:#FFF;'><center>Fecha Inicio</center></td>";	
	echo "<td style='background:#0080FF; color:#FFF;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#0080FF; color:#FFF;'><center>Dias</center></td>";	
	echo "<td style='background:#0080FF; color:#FFF;'><center>Usuario</center></td>";
	echo "<td style='background:#0080FF; color:#FFF;'><center>Supervisor</center></td>";	
	echo "<td style='background:#0080FF; color:#FFF;'><center>Observacion</center></td>";	
    echo "<td style='background:#0080FF; color:#FFF; border-right:#E4E4E7 1px solid;'><center>Estado</center></td></tr>";	
	}
	if($NOMBRE_SERVICIO1 == "Bodega")
	{	
	echo "<tr><td style='background:#DF01D7; color:#FFF; border-top:#E4E4E7 1px solid border-left:#E4E4E7 1px solid; border-right:#E4E4E7 1px solid'  colspan='10'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO). ">" .  
	    $NOMBRE_SERVICIO1 . "</a></td></tr>";
    echo "<tr><td style='background:#DF01D7; color:#FFF;border-left:#E4E4E7 1px solid'><center>N° actividad</center></td>";
	echo "<td style='background:#DF01D7; color:#FFF;'><center>Predecesor</center></td>";	
	echo "<td style='background:#DF01D7; color:#FFF;'><center>Descripcion</center></td>";	
	echo "<td style='background:#DF01D7; color:#FFF;'><center>Fecha Inicio</center></td>";	
	echo "<td style='background:#DF01D7; color:#FFF;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#DF01D7; color:#FFF;'><center>Dias</center></td>";
	echo "<td style='background:#DF01D7; color:#FFF;'><center>Usuario</center></td>";
	echo "<td style='background:#DF01D7; color:#FFF;'><center>Supervisor</center></td>";	
	echo "<td style='background:#DF01D7; color:#FFF;'><center>Observacion</center></td>";	
    echo "<td style='background:#DF01D7; color:#FFF; border-right:#E4E4E7 1px solid;'><center>Estado</center></td></tr>";	
	}
	if($NOMBRE_SERVICIO1 == "Sistema")
	{	
	echo "<tr><td style='background:black; color:#FFF; border-top:#E4E4E7 1px solid border-left:#E4E4E7 1px solid; border-right:#E4E4E7 1px solid;'  colspan='10'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" .urlencode($CODIGO). ">" .  
	    $NOMBRE_SERVICIO1 . "</a></td></tr>";
	echo "<tr><td style='background:black; color:#FFF;border-left:#E4E4E7 1px solid'><center>N° actividad</center></td>";		
	echo "<td style='background:black; color:#FFF;'><center>Predecesor</center></td>";	
	echo "<td style='background:black; color:#FFF;'><center>Descripcion</center></td>";	
	echo "<td style='background:black; color:#FFF;'><center>Fecha Inicio</center></td>";	
	echo "<td style='background:black; color:#FFF;'><center>Fecha Entrega</center></td>";	
    echo "<td style='background:black; color:#FFF;'><center>Dias</center></td>";	
	echo "<td style='background:black; color:#FFF;'><center>Usuario</center></td>";
	echo "<td style='background:black; color:#FFF;'><center>Supervisor</center></td>";	
	echo "<td style='background:black; color:#FFF;'><center>Observacion</center></td>";	
    echo "<td style='background:black; color:#FFF; border-right:#E4E4E7 1px solid;'><center>Estado</center></td></tr>";	
	}
	if($NOMBRE_SERVICIO1 == "Servicio Tecnico")
	{	
	echo "<tr><td style='background:#886A08; color:#FFF; border-top:#E4E4E7 1px solid border-left:#E4E4E7 1px solid; border-right:#E4E4E7 1px solid;'  colspan='10'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" .urlencode($CODIGO). ">" .  
	    $NOMBRE_SERVICIO1 . "</a></td></tr>";
	echo "<tr><td style='background:#886A08; color:#FFF;border-left:#E4E4E7 1px solid'><center>N° actividad</center></td>";		
	echo "<td style='background:#886A08; color:#FFF;'><center>Predecesor</center></td>";	
	echo "<td style='background:#886A08; color:#FFF;'><center>Descripcion</center></td>";	
	echo "<td style='background:#886A08; color:#FFF;'><center>Fecha Inicio</center></td>";	
	echo "<td style='background:#886A08; color:#FFF;'><center>Fecha Entrega</center></td>";	
    echo "<td style='background:#886A08; color:#FFF;'><center>Dias</center></td>";	
	echo "<td style='background:#886A08; color:#FFF;'><center>Usuario</center></td>";
	echo "<td style='background:#886A08; color:#FFF;'><center>Supervisor</center></td>";	
	echo "<td style='background:#886A08; color:#FFF;'><center>Observacion</center></td>";	
    echo "<td style='background:#886A08; color:#FFF; border-right:#E4E4E7 1px solid;'><center>Estado</center></td></tr>";	
	}
    echo "<tr><td style='border-left:#E4E4E7 1px solid;'><center>".$CODIGO_SERVICIO1."</center></td>";
	echo "<td><center>".($PREDECESOR1)."</center></td>";
	echo "<td><center>".($DESCRIPCION1)."</center></td>";
	echo "<td><center>".$FECHA_I1 ."</center></td>";	
	echo "<td><center>".$FECHA_E1."</center></td>";	
	echo "<td><center>".$DIAS1."</center></td>";	
	echo "<td><center>".$REALIZADOR1."</center></td>";
	echo "<td><center>".$SUPERVISOR1."</center></td>";	
	echo "<td><center>".($OBSERVACION1)."</center></td>";
	echo "<td  style='border-right:#E4E4E7 1px solid;'><center>".$ESTADO1."</center></td></tr>";
	echo "<tr><td  style='border-top:#E4E4E7 1px solid;' colspan='10'><center>&nbsp;</center></td></tr>";
	
  }
?>
</table>
</div>
</center>

<!------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------>

<form  id = 'formulario2' method="GET" action="" />
<div id="popup" style="display:none">
    <div class="content-popup">
    <div class="close"><a href="#" id="close">Cerrar</a></div>
	<p><b>Observacion:</b></p>
    <textarea rows="17" cols="74" id="txt_observaciones1" name = "txt_observaciones1"></textarea>
	<input readonly type="submit" id="ingresar1" name="ingresar1" value="Ingresar">
	<input style="display:none;" type="text" id = "txt_codigo_proyecto1" name = "txt_codigo_proyecto1" value="<?php echo $CODIGO_PROYECTO1?>"/>
    </div>
</div>
</form>
<form  id = 'formulario3' method="GET" action="" />
<div id="popup1" style="display:none">
<div class="content-popup">
<center>
<table>
<tr>
<td colspan="3"><center> <h1>Nueva actividad</h1> </center></td>
</tr>
<tr>
<td><b>Tipo:</b></br><select onchange="seleccion();" id = "txt_nombre_servicio" name="txt_nombre_servicio">
<option>Adquisiciones</option>
<option>Produccion</option>
<option>Despacho</option>
<option>Instalacion</option>
<option>Desarrollo</option>
<option>Mantencion</option>
<option>Sillas</option>
<option>Bodega</option>
<option>Sistema</option>
<option>Servicio Tecnico</option>
</select> </td>
<td><b>Fecha inicio:</b></br><input readonly type="text" onchange="dias1();"  id= "txt_fechai_servicio" name = "txt_fechai_servicio" value="" />  </td>
<td><b>Fecha entrega:</b></br><input readonly onchange="dias1();" type="text"  id= "txt_fechae_servicio" name = "txt_fechae_servicio" value="" />  </td>
</tr>
<tr>
<td><b>Realizador:</b></br><input readonly type="text" readonly="readonly"  id= "txt_realizador" name = "txt_realizador" value="<?php echo $NOMBRE_USUARIO?>" /> </td>
<td colspan=""><b>Supervisor:</b></br><input type="text"  id= "txt_supervisor" name = "txt_supervisor" value="" /><input readonly type="text" onkeypress="return justNumbers(event);" onkeyup="es_vacio();" id = "txt_codigo_proyecto2" name = "txt_codigo_proyecto2" style="display:none;" value="<?php echo $CODIGO?>">  </td>
<td><b>Dias:</b></br><input readonly type="text" onchange="dias1();"  id= "txt_cantidad_dias" name = "txt_cantidad_dias" value="" />  </td>
</tr>
<tr>
<td colspan="2"><b>Descripcion:</b></br><textarea rows="3" cols="36" id="txt_descripcion_s" name = "txt_descripcion_s"></textarea> </td>
<td><b>Predecesor:</b></br><input  type="text"  id= "txt_predecesor" name = "txt_predecesor" value="" />  </td>
</tr>
<tr>
<td colspan="2"><b>Observaciones:</b></br><textarea rows="3" cols="36" id="txt_observaciones_s" name = "txt_observaciones_s"></textarea> </td>
<td></br><input readonly type="submit" id="ingresars" name="ingresars" value="Ingresar"></td>
</tr>
</table>
<div id="General" style = "Display:none;">
<table>
<tr>
<td><b>Direccion:</b></br><input type="text"  id= "txt_direccions" name = "txt_direccions" value="" /> </td>
</tr>
<tr>
<td><b>TP/TM/FI:</b></br><input type="text"  id= "txt_ttf" name = "txt_ttf" value="" /> </td>
</tr>
</table>
</div>
<div id="Despacho" style = "Display:none;">
<table>
<tr>
<td><b>Guia Despacho:</b></br><input type="text"  id= "txt_guia" name = "txt_guia" value="" /> </td>
</tr>
</table>
</div> 
<div id="Instalacion" style = "Display:none;">
<table>
<tr>
<td><b>Lider 1:</b></br><input type="text"  id= "lider" name = "lider" value="" /> </td>
<td><b>Puestos</b></br><input type="text"  id= "puestos" name = "puestos" value="" /> </td>
</tr>
<tr>
<td><b>Instalador 1:</b></br><input type="text"  id= "ins1" name = "ins1" value="" /> </td>
<td><b>Instalador 2:</b></br><input type="text"  id= "ins2" name = "ins2" value="" /> </td>
</tr>
<tr>
<td><b>Instalador 3:</b></br><input type="text"  id= "ins3" name = "ins3" value="" /> </td>
<td><b>Instalador 4:</b></br><input type="text"  id= "ins4" name = "ins4" value="" /> </td>
</tr>
</table>
</div>
<div id="Servicio" style = "Display:none;">
<table>
<tr>
<td><b>Tipo Servicio</b></br><select onchange="seleccion();" id = "txt_servicio" name="txt_servicio">
<option>Servicio Tecnico </option>
<option>Garantia</option></select> </td>
<td><b>N° Documento</b></br><input type="text"  id= "txt_documento" name = "txt_documento" value="" /> </td>
</tr>
<tr>
<td><b>Tecnico 1:</b></br><input type="text"  id= "tec1" name = "tec1" value="" /> </td>
<td><b>Tecnico 2:</b></br><input type="text"  id= "tec2" name = "tec2" value="" /> </td>
</tr>
</table>
</div>
<div id="Produccion" style = "Display:none;">
<table>
<tr>
<td><b>Proceso:</b></br><select onchange="seleccion();" id = "txt_proceso" name="txt_proceso">
<option>Corte</option>
<option>Ruteado</option>
<option>Enchape Recto</option>
<option>Enchape Curvo</option>
<option>Laminado</option>
<option>Perforado</option>
<option>Barniz</option>
<option>Armado</option>
<option>Limpieza</option>
</select> </td>
<td><b>Ejecutor</b></br><input type="text"  id= "txt_ejecutor" name = "txt_ejecutor" value="" /> </td>
</tr>
</table>
</div>
<div id="Sillas" style = "Display:none;">
<table>
<tr>
<td><b>Proceso:</b></br><select onchange="seleccion();" id = "txt_procesos" name="txt_procesos">
<option>Tapizado</option>
<option>Retapizado</option>
<option>Armado</option>
<option>Limpieza</option>
</select> </td>
<td><b>Ejecutor</b></br><input type="text"  id= "txt_ejecutors" name = "txt_ejecutors" value="" /> </td>
</tr>
</table>
</div>
<a href="#" id="close1">Cerrar</a>
</center>
    </div>
    
</div>
</form>

    </div>
    </div>
	</div><!--close site_content-->	
    </div><!--close main-->	
</body>
</html>
