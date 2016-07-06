<?php
require_once('Conexion/Conexion.php');
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$CODIGO_OC1 = $_GET['CODIGO_OC'];
$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT orden_de_compra.ROCHA_PROYECTO, orden_de_compra.DESPACHAR_NOMBRE,orden_de_compra.DESPACHAR_TELEFONO, orden_de_compra.CODIGO_OC,orden_de_compra.CODIGO_USUARIO,orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.DESPACHAR_COMUNA,orden_de_compra.DESPACHAR_RUT,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR, orden_de_compra.CONDICION_PAGO, orden_de_compra.DESCUENTO_OC,orden_de_compra.SUB_TOTAL, orden_de_compra.TIPO_IVA, orden_de_compra.IVA, orden_de_compra.NETO, orden_de_compra.OBSERVACION FROM orden_de_compra, usuario where orden_de_compra.CODIGO_OC ='".($CODIGO_OC1)."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_OC = $row["CODIGO_OC"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESPACHAR = $row["DESPACHAR_DIRECCION"];
	$DESPACHAR_RUT = $row["DESPACHAR_RUT"];
	$DESPACHAR_NOMBRE = $row["DESPACHAR_NOMBRE"];
	$DESPACHAR_COMUNA = $row["DESPACHAR_COMUNA"];
	$DESPACHAR_TELEFONO = $row["DESPACHAR_TELEFONO"];
	$TOTAL = $row["TOTAL"];
	$NOMBRE_PROVEEDOR = $row["NOMBRE_PROVEEDOR"];
	$CODIGO_USUARIO1 = $row["CODIGO_USUARIO"];
	$ESTADO = $row["ESTADO"];
	$CONDICION_PAGO = $row["CONDICION_PAGO"];
	$DESCUENTO_OC = $row["DESCUENTO_OC"];
	$SUB_TOTAL = $row["SUB_TOTAL"];
	$TIPO_IVA = $row["TIPO_IVA"];
	$NETO = $row["NETO"];
	$IVA = $row["IVA"];
	$OBSERVACION = $row["OBSERVACION"];
	$ROCHA_PROYECTO = $row["ROCHA_PROYECTO"];
	$MENSAJE = 2;
  }
  
  mysql_free_result($result);

  
  /////////////////////////////////////////

$query_registro2 = "select proveedor.COMUNA, proveedor.DIRECCION, proveedor.RUT_PROVEEDOR, proveedor.NOMBRE_FANTASIA from orden_de_compra, oc_proveedor, proveedor where proveedor.CODIGO_PROVEEDOR = oc_proveedor.CODIGO_PROVEEDOR AND oc_proveedor.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".($CODIGO_OC)."'";
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result2))
  {
	$NOMBRE_FANTASIA = $row["NOMBRE_FANTASIA"];
	$RUT_PROVEEDOR = $row["RUT_PROVEEDOR"];
	$DIRECCION = $row["DIRECCION"];
	$COMUNA = $row["COMUNA"];
  }
  
  mysql_free_result($result2);

$proveedor_valor = "RUT: ".$RUT_PROVEEDOR . "\n".$DIRECCION."\n".$COMUNA;   

 /////////////////////////////////////////

$query_registro4 = "select usuario.NOMBRE_USUARIO from usuario where usuario.CODIGO_USUARIO = '".($CODIGO_USUARIO1)."'";
$result4 = mysql_query($query_registro4, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result4))
  {
	$USUARIO= $row["NOMBRE_USUARIO"];
  }
  
  mysql_free_result($result4);
  
 $sql1 = "SELECT * FROM vale_emision ORDER BY COD_VALE DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$CODIGO_VAL= $row["COD_VALE"];
	$numero++;
  }
  
?>

<!doctype html>
<html>
<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
 <title> OC</title>
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_copiaOC.css" />
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
    <script type="text/javascript" src="js/ordenDeCompra.js"></script>
<script>  
$(function(){
                $('#rochapri').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
$(function(){
                $('#roch1').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch2').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch3').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch4').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch5').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch6').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch7').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch8').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch9').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch10').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch11').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch12').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch13').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch14').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch15').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch16').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch17').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch18').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch19').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch20').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch21').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch22').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch23').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch24').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch25').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch26').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch27').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch28').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });

			$(function(){
                $('#roch29').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch30').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch31').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch32').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch33').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch34').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch35').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch36').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch37').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch38').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch39').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch40').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch41').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch42').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch43').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch44').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch45').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch46').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch47').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch48').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch49').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch50').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			
			
			//////
			$(function(){
                $('#roch51').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch52').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch53').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch54').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch55').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch56').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch57').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch58').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch59').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch60').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch61').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch62').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch63').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch64').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch65').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch66').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch67').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch68').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch69').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch70').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch71').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch72').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch73').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch74').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			$(function(){
                $('#roch75').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
            });
			
			//////////////////////////////////////////////////////////////////////////////////
 $(function(){
                $('#proveedor').autocomplete({
                   source : 'ajaxProveedor.php',
                   select : 
				   function(event, ui)
				   {
                       $('#proveedor1').slideUp('slow', function()
					   {
                            $('#proveedor1').val(
                                 ui.item.value + 
								'\nRut:' + ui.item.rut + 
								'\n' + ui.item.direccion + 
								'\n' + ui.item.comuna+ 
								'\nSantiago - Chile'
                            );
                       });
                       $('#proveedor1').slideDown('slow');
					   
					   $('#condicion').slideUp('slow', function()
					   {
                            $('#condicion').val(
                                 ui.item.forma 
                            );
                       });
                       $('#condicion').slideDown('slow');
					      $('#rut_prove').slideUp('slow', function()
					   {
                            $('#rut_prove').val(
                                 ui.item.rut 
                            );
                       });
                       $('#rut_prove').slideDown('slow');
                       }
                       });
				           
            });
//////////////////////////////////////////////////////////////////////////////////////////			
$(function(){
                $('#des1').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
				   function(event, ui)
				   {
                       $('#cod1').slideUp('slow', function()
					   {
                            $('#cod1').val(
                                 ui.item.cod 
                            );
							
                       });
                       $('#cod1').slideDown('slow');
					   
					   	$('#um1').slideUp('slow', function()
					   {
                            $('#um1').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um1').slideDown('slow');
					   				   
					   $('#prec1').slideUp('slow', function()
					   {
                            $('#prec1').val(
                                 ui.item.precio 
                            );
							
                       });
                       $('#prec1').slideDown('slow');
					   
					   $('#cant1').slideUp('slow', function()
					   {
                            $('#cant1').val(
                                '1' 
                            );
							
                       });
                       $('#cant1').slideDown('slow');
					   
					   $('#tot1').slideUp('slow', function()
					   {
                            $('#tot1').val(
                               ui.item.psd   
                            );	
                       });
                       $('#tot1').slideDown('slow');
					    $('#desc1').slideUp('slow', function()
					   {
                            $('#desc1').val(
                                '0' 
                            );		
                       });
                       $('#desc1').slideDown('slow');
					   $('#stock1').slideUp('slow', function()
					   {
                            $('#stock1').val(
                               ui.item.stock
                            );		
                       });
                       $('#stock1').slideDown('slow');
					   $('#precl1').slideUp('slow', function(){$('#precl1').val(ui.item.psd );
});$('#precl1').slideDown('slow');$('#iva1').slideUp('slow', function(){$('#iva1').val(ui.item.precio);
});$('#iva1').slideDown('slow')
                   }     
                 });
				 
            });			
///////////////////////////////////////////////////////////	

$(function(){
                $('#des2').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod2').slideUp('slow', function() { $('#cod2').val( ui.item.cod ); });
$('#cod2').slideDown('slow');
$('#um2').slideUp('slow', function()
					   {
                            $('#um2').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um2').slideDown('slow');
$('#prec2').slideUp('slow', function(){ $('#prec2').val(ui.item.precio );});
$('#prec2').slideDown('slow'); $('#cant2').slideUp('slow', function(){$('#cant2').val('1');});
$('#cant2').slideDown('slow');$('#tot2').slideUp('slow', function(){$('#tot2').val(ui.item.psd);});
$('#tot2').slideDown('slow');$('#desc2').slideUp('slow', function(){$('#desc2').val('0');});
$('#desc2').slideDown('slow');$('#stock2').slideUp('slow', function(){$('#stock2').val(ui.item.stock);});
$('#stock2').slideDown('slow');$('#precl2').slideUp('slow', function(){$('#precl2').val(ui.item.psd );
});$('#precl2').slideDown('slow');$('#iva2').slideUp('slow', function(){$('#iva2').val(ui.item.precio);
});$('#iva2').slideDown('slow');}});});	
//////////////////////////////
$(function(){
                $('#des3').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod3').slideUp('slow', function() { $('#cod3').val( ui.item.cod ); });
$('#cod3').slideDown('slow');
$('#um3').slideUp('slow', function()
					   {
                            $('#um3').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um3').slideDown('slow');
$('#prec3').slideUp('slow', function(){ $('#prec3').val(ui.item.precio );});
$('#prec3').slideDown('slow'); $('#cant3').slideUp('slow', function(){$('#cant3').val('1');});
$('#cant3').slideDown('slow');$('#tot3').slideUp('slow', function(){$('#tot3').val(ui.item.psd);});
$('#tot3').slideDown('slow');$('#desc3').slideUp('slow', function(){$('#desc3').val('0');});
$('#desc3').slideDown('slow');$('#stock3').slideUp('slow', function(){$('#stock3').val(ui.item.stock);});
$('#stock3').slideDown('slow');$('#precl3').slideUp('slow', function(){$('#precl3').val(ui.item.psd );
});$('#precl3').slideDown('slow');$('#iva3').slideUp('slow', function(){$('#iva3').val(ui.item.precio);
});$('#iva3').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des4').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod4').slideUp('slow', function() { $('#cod4').val( ui.item.cod ); });
$('#cod4').slideDown('slow');
$('#um4').slideUp('slow', function()
					   {
                            $('#um4').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um4').slideDown('slow');
$('#prec4').slideUp('slow', function(){ $('#prec4').val(ui.item.precio );});
$('#prec4').slideDown('slow'); $('#cant4').slideUp('slow', function(){$('#cant4').val('1');});
$('#cant4').slideDown('slow');$('#tot4').slideUp('slow', function(){$('#tot4').val(ui.item.psd);});
$('#tot4').slideDown('slow');$('#desc4').slideUp('slow', function(){$('#desc4').val('0');});
$('#desc4').slideDown('slow');$('#stock4').slideUp('slow', function(){$('#stock4').val(ui.item.stock);});
$('#stock4').slideDown('slow');$('#precl4').slideUp('slow', function(){$('#precl4').val(ui.item.psd );
});$('#precl4').slideDown('slow');$('#iva4').slideUp('slow', function(){$('#iva4').val(ui.item.precio);
});$('#iva4').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des5').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod5').slideUp('slow', function() { $('#cod5').val( ui.item.cod ); });
$('#cod5').slideDown('slow');
$('#um5').slideUp('slow', function()
					   {
                            $('#um5').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um5').slideDown('slow');
$('#prec5').slideUp('slow', function(){ $('#prec5').val(ui.item.precio );});
$('#prec5').slideDown('slow'); $('#cant5').slideUp('slow', function(){$('#cant5').val('1');});
$('#cant5').slideDown('slow');$('#tot5').slideUp('slow', function(){$('#tot5').val(ui.item.psd);});
$('#tot5').slideDown('slow');$('#desc5').slideUp('slow', function(){$('#desc5').val('0');});
$('#desc5').slideDown('slow');$('#stock5').slideUp('slow', function(){$('#stock5').val(ui.item.stock);});
$('#stock5').slideDown('slow');$('#precl5').slideUp('slow', function(){$('#precl5').val(ui.item.psd );
});$('#precl5').slideDown('slow');$('#iva5').slideUp('slow', function(){$('#iva5').val(ui.item.precio);
});$('#iva5').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des6').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod6').slideUp('slow', function() { $('#cod6').val( ui.item.cod ); });
$('#cod6').slideDown('slow');
$('#um6').slideUp('slow', function()
					   {
                            $('#um6').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um6').slideDown('slow');
$('#prec6').slideUp('slow', function(){ $('#prec6').val(ui.item.precio );});
$('#prec6').slideDown('slow'); $('#cant6').slideUp('slow', function(){$('#cant6').val('1');});
$('#cant6').slideDown('slow');$('#tot6').slideUp('slow', function(){$('#tot6').val(ui.item.psd);});
$('#tot6').slideDown('slow');$('#desc6').slideUp('slow', function(){$('#desc6').val('0');});
$('#desc6').slideDown('slow');$('#stock6').slideUp('slow', function(){$('#stock6').val(ui.item.stock);});
$('#stock6').slideDown('slow');$('#precl6').slideUp('slow', function(){$('#precl6').val(ui.item.psd );
});$('#precl6').slideDown('slow');$('#iva6').slideUp('slow', function(){$('#iva6').val(ui.item.precio);
});$('#iva6').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des7').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod7').slideUp('slow', function() { $('#cod7').val( ui.item.cod ); });
$('#cod7').slideDown('slow');
$('#um7').slideUp('slow', function()
					   {
                            $('#um7').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um7').slideDown('slow');
$('#prec7').slideUp('slow', function(){ $('#prec7').val(ui.item.precio );});
$('#prec7').slideDown('slow'); $('#cant7').slideUp('slow', function(){$('#cant7').val('1');});
$('#cant7').slideDown('slow');$('#tot7').slideUp('slow', function(){$('#tot7').val(ui.item.psd);});
$('#tot7').slideDown('slow');$('#desc7').slideUp('slow', function(){$('#desc7').val('0');});
$('#desc7').slideDown('slow');$('#stock7').slideUp('slow', function(){$('#stock7').val(ui.item.stock);});
$('#stock7').slideDown('slow');$('#precl7').slideUp('slow', function(){$('#precl7').val(ui.item.psd );
});$('#precl7').slideDown('slow');$('#iva7').slideUp('slow', function(){$('#iva7').val(ui.item.precio);
});$('#iva7').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des8').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod8').slideUp('slow', function() { $('#cod8').val( ui.item.cod ); });
$('#cod8').slideDown('slow');
$('#um8').slideUp('slow', function()
					   {
                            $('#um8').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um8').slideDown('slow');
$('#prec8').slideUp('slow', function(){ $('#prec8').val(ui.item.precio );});
$('#prec8').slideDown('slow'); $('#cant8').slideUp('slow', function(){$('#cant8').val('1');});
$('#cant8').slideDown('slow');$('#tot8').slideUp('slow', function(){$('#tot8').val(ui.item.psd);});
$('#tot8').slideDown('slow');$('#desc8').slideUp('slow', function(){$('#desc8').val('0');});
$('#desc8').slideDown('slow');$('#stock8').slideUp('slow', function(){$('#stock8').val(ui.item.stock);});
$('#stock8').slideDown('slow');$('#precl8').slideUp('slow', function(){$('#precl8').val(ui.item.psd );
});$('#precl8').slideDown('slow');$('#iva8').slideUp('slow', function(){$('#iva8').val(ui.item.precio);
});$('#iva8').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des9').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod9').slideUp('slow', function() { $('#cod9').val( ui.item.cod ); });
$('#cod9').slideDown('slow');
$('#um9').slideUp('slow', function()
					   {
                            $('#um9').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um9').slideDown('slow');
$('#prec9').slideUp('slow', function(){ $('#prec9').val(ui.item.precio );});
$('#prec9').slideDown('slow'); $('#cant9').slideUp('slow', function(){$('#cant9').val('1');});
$('#cant9').slideDown('slow');$('#tot9').slideUp('slow', function(){$('#tot9').val(ui.item.psd);});
$('#tot9').slideDown('slow');$('#desc9').slideUp('slow', function(){$('#desc9').val('0');});
$('#desc9').slideDown('slow');$('#stock9').slideUp('slow', function(){$('#stock9').val(ui.item.stock);});
$('#stock9').slideDown('slow');$('#precl9').slideUp('slow', function(){$('#precl9').val(ui.item.psd );
});$('#precl9').slideDown('slow');$('#iva9').slideUp('slow', function(){$('#iva9').val(ui.item.precio);
});$('#iva9').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des10').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod10').slideUp('slow', function() { $('#cod10').val( ui.item.cod ); });
$('#cod10').slideDown('slow');
$('#um10').slideUp('slow', function()
					   {
                            $('#um10').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um10').slideDown('slow');
$('#prec10').slideUp('slow', function(){ $('#prec10').val(ui.item.precio );});
$('#prec10').slideDown('slow'); $('#cant10').slideUp('slow', function(){$('#cant10').val('1');});
$('#cant10').slideDown('slow');$('#tot10').slideUp('slow', function(){$('#tot10').val(ui.item.psd);});
$('#tot10').slideDown('slow');$('#desc10').slideUp('slow', function(){$('#desc10').val('0');});
$('#desc10').slideDown('slow');$('#stock10').slideUp('slow', function(){$('#stock10').val(ui.item.stock);});
$('#stock10').slideDown('slow');$('#precl10').slideUp('slow', function(){$('#precl10').val(ui.item.psd);
});$('#precl10').slideDown('slow');$('#iva10').slideUp('slow', function(){$('#iva10').val(ui.item.precio);
});$('#iva10').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des11').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod11').slideUp('slow', function() { $('#cod11').val( ui.item.cod ); });
$('#cod11').slideDown('slow');
$('#um11').slideUp('slow', function()
					   {
                            $('#um11').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um11').slideDown('slow');
$('#prec11').slideUp('slow', function(){ $('#prec11').val(ui.item.precio );});
$('#prec11').slideDown('slow'); $('#cant11').slideUp('slow', function(){$('#cant11').val('1');});
$('#cant11').slideDown('slow');$('#tot11').slideUp('slow', function(){$('#tot11').val(ui.item.psd);});
$('#tot11').slideDown('slow');$('#desc11').slideUp('slow', function(){$('#desc11').val('0');});
$('#desc11').slideDown('slow');$('#stock11').slideUp('slow', function(){$('#stock11').val(ui.item.stock);});
$('#stock11').slideDown('slow');$('#precl11').slideUp('slow', function(){$('#precl11').val(ui.item.psd);
});$('#precl11').slideDown('slow');$('#iva11').slideUp('slow', function(){$('#iva11').val(ui.item.precio);
});$('#iva11').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des12').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod12').slideUp('slow', function() { $('#cod12').val( ui.item.cod ); });
$('#cod12').slideDown('slow');
$('#um12').slideUp('slow', function()
					   {
                            $('#um12').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um12').slideDown('slow');
$('#prec12').slideUp('slow', function(){ $('#prec12').val(ui.item.precio );});
$('#prec12').slideDown('slow'); $('#cant12').slideUp('slow', function(){$('#cant12').val('1');});
$('#cant12').slideDown('slow');$('#tot12').slideUp('slow', function(){$('#tot12').val(ui.item.psd);});
$('#tot12').slideDown('slow');$('#desc12').slideUp('slow', function(){$('#desc12').val('0');});
$('#desc12').slideDown('slow');$('#stock12').slideUp('slow', function(){$('#stock12').val(ui.item.stock);});
$('#stock12').slideDown('slow');$('#precl12').slideUp('slow', function(){$('#precl12').val(ui.item.psd );
});$('#precl12').slideDown('slow');$('#iva12').slideUp('slow', function(){$('#iva12').val(ui.item.precio);
});$('#iva12').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des13').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod13').slideUp('slow', function() { $('#cod13').val( ui.item.cod ); });
$('#cod13').slideDown('slow');
$('#um13').slideUp('slow', function()
					   {
                            $('#um13').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um13').slideDown('slow');
$('#prec13').slideUp('slow', function(){ $('#prec13').val(ui.item.precio );});
$('#prec13').slideDown('slow'); $('#cant13').slideUp('slow', function(){$('#cant13').val('1');});
$('#cant13').slideDown('slow');$('#tot13').slideUp('slow', function(){$('#tot13').val(ui.item.psd);});
$('#tot13').slideDown('slow');$('#desc13').slideUp('slow', function(){$('#desc13').val('0');});
$('#desc13').slideDown('slow');$('#stock13').slideUp('slow', function(){$('#stock13').val(ui.item.stock);});
$('#stock13').slideDown('slow');$('#precl13').slideUp('slow', function(){$('#precl13').val(ui.item.psd );
});$('#precl13').slideDown('slow');$('#iva13').slideUp('slow', function(){$('#iva13').val(ui.item.precio);
});$('#iva13').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des14').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod14').slideUp('slow', function() { $('#cod14').val( ui.item.cod ); });
$('#cod14').slideDown('slow');
$('#um14').slideUp('slow', function()
					   {
                            $('#um14').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um14').slideDown('slow');
$('#prec14').slideUp('slow', function(){ $('#prec14').val(ui.item.precio );});
$('#prec14').slideDown('slow'); $('#cant14').slideUp('slow', function(){$('#cant14').val('1');});
$('#cant14').slideDown('slow');$('#tot14').slideUp('slow', function(){$('#tot14').val(ui.item.psd);});
$('#tot14').slideDown('slow');$('#desc14').slideUp('slow', function(){$('#desc14').val('0');});
$('#desc14').slideDown('slow');$('#stock14').slideUp('slow', function(){$('#stock14').val(ui.item.stock);});
$('#stock14').slideDown('slow');$('#precl14').slideUp('slow', function(){$('#precl14').val(ui.item.psd );
});$('#precl14').slideDown('slow');$('#iva14').slideUp('slow', function(){$('#iva14').val(ui.item.precio);
});$('#iva14').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des15').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod15').slideUp('slow', function() { $('#cod15').val( ui.item.cod ); });
$('#cod15').slideDown('slow');
$('#um15').slideUp('slow', function()
					   {
                            $('#um15').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um15').slideDown('slow');
$('#prec15').slideUp('slow', function(){ $('#prec15').val(ui.item.precio );});
$('#prec15').slideDown('slow'); $('#cant15').slideUp('slow', function(){$('#cant15').val('1');});
$('#cant15').slideDown('slow');$('#tot15').slideUp('slow', function(){$('#tot15').val(ui.item.psd);});
$('#tot15').slideDown('slow');$('#desc15').slideUp('slow', function(){$('#desc15').val('0');});
$('#desc15').slideDown('slow');$('#stock15').slideUp('slow', function(){$('#stock15').val(ui.item.stock);});
$('#stock15').slideDown('slow');$('#precl15').slideUp('slow', function(){$('#precl15').val(ui.item.psd );
});$('#precl15').slideDown('slow');$('#iva15').slideUp('slow', function(){$('#iva15').val(ui.item.precio);
});$('#iva15').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des16').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod16').slideUp('slow', function() { $('#cod16').val( ui.item.cod ); });
$('#cod16').slideDown('slow');
$('#um16').slideUp('slow', function()
					   {
                            $('#um16').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um16').slideDown('slow');
$('#prec16').slideUp('slow', function(){ $('#prec16').val(ui.item.precio );});
$('#prec16').slideDown('slow'); $('#cant16').slideUp('slow', function(){$('#cant16').val('1');});
$('#cant16').slideDown('slow');$('#tot16').slideUp('slow', function(){$('#tot16').val(ui.item.psd);});
$('#tot16').slideDown('slow');$('#desc16').slideUp('slow', function(){$('#desc16').val('0');});
$('#desc16').slideDown('slow');$('#stock16').slideUp('slow', function(){$('#stock16').val(ui.item.stock);});
$('#stock16').slideDown('slow');$('#precl16').slideUp('slow', function(){$('#precl16').val(ui.item.psd );
});$('#precl16').slideDown('slow');$('#iva16').slideUp('slow', function(){$('#iva16').val(ui.item.precio);
});$('#iva16').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des17').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod17').slideUp('slow', function() { $('#cod17').val( ui.item.cod ); });
$('#cod17').slideDown('slow');
$('#um17').slideUp('slow', function()
					   {
                            $('#um17').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um17').slideDown('slow');
$('#prec17').slideUp('slow', function(){ $('#prec17').val(ui.item.precio );});
$('#prec17').slideDown('slow'); $('#cant17').slideUp('slow', function(){$('#cant17').val('1');});
$('#cant17').slideDown('slow');$('#tot17').slideUp('slow', function(){$('#tot17').val(ui.item.psd);});
$('#tot17').slideDown('slow');$('#desc17').slideUp('slow', function(){$('#desc17').val('0');});
$('#desc17').slideDown('slow');$('#stock17').slideUp('slow', function(){$('#stock17').val(ui.item.stock);});
$('#stock17').slideDown('slow');$('#precl17').slideUp('slow', function(){$('#precl17').val(ui.item.psd );
});$('#precl17').slideDown('slow');$('#iva17').slideUp('slow', function(){$('#iva17').val(ui.item.precio);
});$('#iva17').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des18').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod18').slideUp('slow', function() { $('#cod18').val( ui.item.cod ); });
$('#cod18').slideDown('slow');
$('#um18').slideUp('slow', function()
					   {
                            $('#um18').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um18').slideDown('slow');
$('#prec18').slideUp('slow', function(){ $('#prec18').val(ui.item.precio );});
$('#prec18').slideDown('slow'); $('#cant18').slideUp('slow', function(){$('#cant18').val('1');});
$('#cant18').slideDown('slow');$('#tot18').slideUp('slow', function(){$('#tot18').val(ui.item.psd);});
$('#tot18').slideDown('slow');$('#desc18').slideUp('slow', function(){$('#desc18').val('0');});
$('#desc18').slideDown('slow');$('#stock18').slideUp('slow', function(){$('#stock18').val(ui.item.stock);});
$('#stock18').slideDown('slow');$('#precl18').slideUp('slow', function(){$('#precl18').val(ui.item.psd );
});$('#precl18').slideDown('slow');$('#iva18').slideUp('slow', function(){$('#iva18').val(ui.item.precio);
});$('#iva18').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des19').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod19').slideUp('slow', function() { $('#cod19').val( ui.item.cod ); });
$('#cod19').slideDown('slow');
$('#um19').slideUp('slow', function()
					   {
                            $('#um19').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um19').slideDown('slow');
$('#prec19').slideUp('slow', function(){ $('#prec19').val(ui.item.precio );});
$('#prec19').slideDown('slow'); $('#cant19').slideUp('slow', function(){$('#cant19').val('1');});
$('#cant19').slideDown('slow');$('#tot19').slideUp('slow', function(){$('#tot19').val(ui.item.psd);});
$('#tot19').slideDown('slow');$('#desc19').slideUp('slow', function(){$('#desc19').val('0');});
$('#desc19').slideDown('slow');$('#stock19').slideUp('slow', function(){$('#stock19').val(ui.item.stock);});
$('#stock19').slideDown('slow');$('#precl19').slideUp('slow', function(){$('#precl19').val(ui.item.psd );
});$('#precl19').slideDown('slow');$('#iva19').slideUp('slow', function(){$('#iva19').val(ui.item.precio);
});$('#iva19').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des20').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod20').slideUp('slow', function() { $('#cod20').val( ui.item.cod ); });
$('#cod20').slideDown('slow');
$('#um20').slideUp('slow', function()
					   {
                            $('#um20').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um20').slideDown('slow');
$('#prec20').slideUp('slow', function(){ $('#prec20').val(ui.item.precio );});
$('#prec20').slideDown('slow'); $('#cant20').slideUp('slow', function(){$('#cant20').val('1');});
$('#cant20').slideDown('slow');$('#tot20').slideUp('slow', function(){$('#tot20').val(ui.item.psd);});
$('#tot20').slideDown('slow');$('#desc20').slideUp('slow', function(){$('#desc20').val('0');});
$('#desc20').slideDown('slow');$('#stock20').slideUp('slow', function(){$('#stock20').val(ui.item.stock);});
$('#stock20').slideDown('slow');$('#precl20').slideUp('slow', function(){$('#precl20').val(ui.item.psd );
});$('#precl20').slideDown('slow');$('#iva20').slideUp('slow', function(){$('#iva20').val(ui.item.precio);
});$('#iva20').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des21').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod21').slideUp('slow', function() { $('#cod21').val( ui.item.cod ); });
$('#cod21').slideDown('slow');
$('#um21').slideUp('slow', function()
					   {
                            $('#um21').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um21').slideDown('slow');
$('#prec21').slideUp('slow', function(){ $('#prec21').val(ui.item.precio );});
$('#prec21').slideDown('slow'); $('#cant21').slideUp('slow', function(){$('#cant21').val('1');});
$('#cant21').slideDown('slow');$('#tot21').slideUp('slow', function(){$('#tot21').val(ui.item.psd);});
$('#tot21').slideDown('slow');$('#desc21').slideUp('slow', function(){$('#desc21').val('0');});
$('#desc21').slideDown('slow');$('#stock21').slideUp('slow', function(){$('#stock21').val(ui.item.stock);});
$('#stock21').slideDown('slow');$('#precl21').slideUp('slow', function(){$('#precl21').val(ui.item.psd );
});$('#precl21').slideDown('slow');$('#iva21').slideUp('slow', function(){$('#iva21').val(ui.item.precio);
});$('#iva21').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des22').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod22').slideUp('slow', function() { $('#cod22').val( ui.item.cod ); });
$('#cod22').slideDown('slow');
$('#um22').slideUp('slow', function()
					   {
                            $('#um22').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um22').slideDown('slow');
$('#prec22').slideUp('slow', function(){ $('#prec22').val(ui.item.precio );});
$('#prec22').slideDown('slow'); $('#cant22').slideUp('slow', function(){$('#cant22').val('1');});
$('#cant22').slideDown('slow');$('#tot22').slideUp('slow', function(){$('#tot22').val(ui.item.psd);});
$('#tot22').slideDown('slow');$('#desc22').slideUp('slow', function(){$('#desc22').val('0');});
$('#desc22').slideDown('slow');$('#stock22').slideUp('slow', function(){$('#stock22').val(ui.item.stock);});
$('#stock22').slideDown('slow');$('#precl22').slideUp('slow', function(){$('#precl22').val(ui.item.psd );
});$('#precl22').slideDown('slow');$('#iva22').slideUp('slow', function(){$('#iva22').val(ui.item.precio);
});$('#iva22').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des23').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod23').slideUp('slow', function() { $('#cod23').val( ui.item.cod ); });
$('#cod23').slideDown('slow');
$('#um23').slideUp('slow', function()
					   {
                            $('#um23').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um23').slideDown('slow');
$('#prec23').slideUp('slow', function(){ $('#prec23').val(ui.item.precio );});
$('#prec23').slideDown('slow'); $('#cant23').slideUp('slow', function(){$('#cant23').val('1');});
$('#cant23').slideDown('slow');$('#tot23').slideUp('slow', function(){$('#tot23').val(ui.item.psd);});
$('#tot23').slideDown('slow');$('#desc23').slideUp('slow', function(){$('#desc23').val('0');});
$('#desc23').slideDown('slow');$('#stock23').slideUp('slow', function(){$('#stock23').val(ui.item.stock);});
$('#stock23').slideDown('slow');$('#precl23').slideUp('slow', function(){$('#precl23').val(ui.item.psd );
});$('#precl23').slideDown('slow');$('#iva23').slideUp('slow', function(){$('#iva23').val(ui.item.precio);
});$('#iva23').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des24').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod24').slideUp('slow', function() { $('#cod24').val( ui.item.cod ); });
$('#cod24').slideDown('slow');
$('#um24').slideUp('slow', function()
					   {
                            $('#um24').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um24').slideDown('slow');
$('#prec24').slideUp('slow', function(){ $('#prec24').val(ui.item.precio );});
$('#prec24').slideDown('slow'); $('#cant24').slideUp('slow', function(){$('#cant24').val('1');});
$('#cant24').slideDown('slow');$('#tot24').slideUp('slow', function(){$('#tot24').val(ui.item.psd);});
$('#tot24').slideDown('slow');$('#desc24').slideUp('slow', function(){$('#desc24').val('0');});
$('#desc24').slideDown('slow');$('#stock24').slideUp('slow', function(){$('#stock24').val(ui.item.stock);});
$('#stock24').slideDown('slow');$('#precl24').slideUp('slow', function(){$('#precl24').val(ui.item.psd );
});$('#precl24').slideDown('slow');$('#iva24').slideUp('slow', function(){$('#iva24').val(ui.item.precio);
});$('#iva24').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des25').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod25').slideUp('slow', function() { $('#cod25').val( ui.item.cod ); });
$('#cod25').slideDown('slow');
$('#um25').slideUp('slow', function()
					   {
                            $('#um25').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um25').slideDown('slow');
$('#prec25').slideUp('slow', function(){ $('#prec25').val(ui.item.precio );});
$('#prec25').slideDown('slow'); $('#cant25').slideUp('slow', function(){$('#cant25').val('1');});
$('#cant25').slideDown('slow');$('#tot25').slideUp('slow', function(){$('#tot25').val(ui.item.psd);});
$('#tot25').slideDown('slow');$('#desc25').slideUp('slow', function(){$('#desc25').val('0');});
$('#desc25').slideDown('slow');$('#stock25').slideUp('slow', function(){$('#stock25').val(ui.item.stock);});
$('#stock25').slideDown('slow');$('#precl25').slideUp('slow', function(){$('#precl25').val(ui.item.psd);
});$('#precl25').slideDown('slow');$('#iva25').slideUp('slow', function(){$('#iva25').val(ui.item.precio);
});$('#iva25').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des26').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod26').slideUp('slow', function() { $('#cod26').val( ui.item.cod ); });
$('#cod26').slideDown('slow');
$('#um26').slideUp('slow', function()
					   {
                            $('#um26').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um26').slideDown('slow');
$('#prec26').slideUp('slow', function(){ $('#prec26').val(ui.item.precio );});
$('#prec26').slideDown('slow'); $('#cant26').slideUp('slow', function(){$('#cant26').val('1');});
$('#cant26').slideDown('slow');$('#tot26').slideUp('slow', function(){$('#tot26').val(ui.item.psd);});
$('#tot26').slideDown('slow');$('#desc26').slideUp('slow', function(){$('#desc26').val('0');});
$('#desc26').slideDown('slow');$('#stock26').slideUp('slow', function(){$('#stock26').val(ui.item.stock);});
$('#stock26').slideDown('slow');$('#precl26').slideUp('slow', function(){$('#precl26').val(ui.item.psd );
});$('#precl26').slideDown('slow');$('#iva26').slideUp('slow', function(){$('#iva26').val(ui.item.precio);
});$('#iva26').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des27').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod27').slideUp('slow', function() { $('#cod27').val( ui.item.cod ); });
$('#cod27').slideDown('slow');
$('#um27').slideUp('slow', function()
					   {
                            $('#um27').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um27').slideDown('slow');
$('#prec27').slideUp('slow', function(){ $('#prec27').val(ui.item.precio );});
$('#prec27').slideDown('slow'); $('#cant27').slideUp('slow', function(){$('#cant27').val('1');});
$('#cant27').slideDown('slow');$('#tot27').slideUp('slow', function(){$('#tot27').val(ui.item.psd);});
$('#tot27').slideDown('slow');$('#desc27').slideUp('slow', function(){$('#desc27').val('0');});
$('#desc27').slideDown('slow');$('#stock27').slideUp('slow', function(){$('#stock27').val(ui.item.stock);});
$('#stock27').slideDown('slow');$('#precl27').slideUp('slow', function(){$('#precl27').val(ui.item.psd );
});$('#precl27').slideDown('slow');$('#iva27').slideUp('slow', function(){$('#iva27').val(ui.item.precio);
});$('#iva27').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des28').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod28').slideUp('slow', function() { $('#cod28').val( ui.item.cod ); });
$('#cod28').slideDown('slow');
$('#um28').slideUp('slow', function()
					   {
                            $('#um28').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um28').slideDown('slow');
$('#prec28').slideUp('slow', function(){ $('#prec28').val(ui.item.precio );});
$('#prec28').slideDown('slow'); $('#cant28').slideUp('slow', function(){$('#cant28').val('1');});
$('#cant28').slideDown('slow');$('#tot28').slideUp('slow', function(){$('#tot28').val(ui.item.psd);});
$('#tot28').slideDown('slow');$('#desc28').slideUp('slow', function(){$('#desc28').val('0');});
$('#desc28').slideDown('slow');$('#stock28').slideUp('slow', function(){$('#stock28').val(ui.item.stock);});
$('#stock28').slideDown('slow');$('#precl28').slideUp('slow', function(){$('#precl28').val(ui.item.psd );
});$('#precl28').slideDown('slow');$('#iva28').slideUp('slow', function(){$('#iva28').val(ui.item.precio);
});$('#iva28').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des29').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod29').slideUp('slow', function() { $('#cod29').val( ui.item.cod ); });
$('#cod29').slideDown('slow');
$('#um29').slideUp('slow', function()
					   {
                            $('#um29').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um29').slideDown('slow');
$('#prec29').slideUp('slow', function(){ $('#prec29').val(ui.item.precio );});
$('#prec29').slideDown('slow'); $('#cant29').slideUp('slow', function(){$('#cant29').val('1');});
$('#cant29').slideDown('slow');$('#tot29').slideUp('slow', function(){$('#tot29').val(ui.item.psd);});
$('#tot29').slideDown('slow');$('#desc29').slideUp('slow', function(){$('#desc29').val('0');});
$('#desc29').slideDown('slow');$('#stock29').slideUp('slow', function(){$('#stock29').val(ui.item.stock);});
$('#stock29').slideDown('slow');$('#precl29').slideUp('slow', function(){$('#precl29').val(ui.item.psd );
});$('#precl29').slideDown('slow');$('#iva29').slideUp('slow', function(){$('#iva29').val(ui.item.precio);
});$('#iva29').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des30').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod30').slideUp('slow', function() { $('#cod30').val( ui.item.cod ); });
$('#cod30').slideDown('slow');
$('#um30').slideUp('slow', function()
					   {
                            $('#um30').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um30').slideDown('slow');
$('#prec30').slideUp('slow', function(){ $('#prec30').val(ui.item.precio );});
$('#prec30').slideDown('slow'); $('#cant30').slideUp('slow', function(){$('#cant30').val('1');});
$('#cant30').slideDown('slow');$('#tot30').slideUp('slow', function(){$('#tot30').val(ui.item.psd);});
$('#tot30').slideDown('slow');$('#desc30').slideUp('slow', function(){$('#desc30').val('0');});
$('#desc30').slideDown('slow');$('#stock30').slideUp('slow', function(){$('#stock30').val(ui.item.stock);});
$('#stock30').slideDown('slow');$('#precl30').slideUp('slow', function(){$('#precl30').val(ui.item.psd );
});$('#precl30').slideDown('slow');$('#iva30').slideUp('slow', function(){$('#iva30').val(ui.item.precio);
});$('#iva30').slideDown('slow')}});});	
//////////////////////////////
//////////////////////////////
$(function(){
                $('#des31').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod31').slideUp('slow', function() { $('#cod31').val( ui.item.cod ); });
$('#cod31').slideDown('slow');
$('#um31').slideUp('slow', function()
					   {
                            $('#um31').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um31').slideDown('slow');
$('#prec31').slideUp('slow', function(){ $('#prec31').val(ui.item.precio );});
$('#prec31').slideDown('slow'); $('#cant31').slideUp('slow', function(){$('#cant31').val('1');});
$('#cant31').slideDown('slow');$('#tot31').slideUp('slow', function(){$('#tot31').val(ui.item.psd);});
$('#tot31').slideDown('slow');$('#desc31').slideUp('slow', function(){$('#desc31').val('0');});
$('#desc31').slideDown('slow');$('#stock31').slideUp('slow', function(){$('#stock31').val(ui.item.stock);});
$('#stock31').slideDown('slow');$('#precl31').slideUp('slow', function(){$('#precl31').val(ui.item.psd );
});$('#precl31').slideDown('slow');$('#iva31').slideUp('slow', function(){$('#iva31').val(ui.item.precio);
});$('#iva31').slideDown('slow')}});});
//////////////////////////////
$(function(){
                $('#des32').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod32').slideUp('slow', function() { $('#cod32').val( ui.item.cod ); });
$('#cod32').slideDown('slow');
$('#um32').slideUp('slow', function()
					   {
                            $('#um32').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um32').slideDown('slow');
$('#prec32').slideUp('slow', function(){ $('#prec32').val(ui.item.precio );});
$('#prec32').slideDown('slow'); $('#cant32').slideUp('slow', function(){$('#cant32').val('1');});
$('#cant32').slideDown('slow');$('#tot32').slideUp('slow', function(){$('#tot32').val(ui.item.psd);});
$('#tot32').slideDown('slow');$('#desc32').slideUp('slow', function(){$('#desc32').val('0');});
$('#desc32').slideDown('slow');$('#stock32').slideUp('slow', function(){$('#stock32').val(ui.item.stock);});
$('#stock32').slideDown('slow');$('#precl32').slideUp('slow', function(){$('#precl32').val(ui.item.psd );
});$('#precl32').slideDown('slow');$('#iva32').slideUp('slow', function(){$('#iva32').val(ui.item.precio);
});$('#iva32').slideDown('slow')}});});		

//////////////////////////////
$(function(){
                $('#des33').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod33').slideUp('slow', function() { $('#cod33').val( ui.item.cod ); });
$('#cod33').slideDown('slow');
$('#um33').slideUp('slow', function()
					   {
                            $('#um33').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um33').slideDown('slow');
$('#prec33').slideUp('slow', function(){ $('#prec33').val(ui.item.precio );});
$('#prec33').slideDown('slow'); $('#cant33').slideUp('slow', function(){$('#cant33').val('1');});
$('#cant33').slideDown('slow');$('#tot33').slideUp('slow', function(){$('#tot33').val(ui.item.psd);});
$('#tot33').slideDown('slow');$('#desc33').slideUp('slow', function(){$('#desc33').val('0');});
$('#desc33').slideDown('slow');$('#stock33').slideUp('slow', function(){$('#stock33').val(ui.item.stock);});
$('#stock33').slideDown('slow');$('#precl33').slideUp('slow', function(){$('#precl33').val(ui.item.psd );
});$('#precl33').slideDown('slow');$('#iva33').slideUp('slow', function(){$('#iva33').val(ui.item.precio);
});$('#iva33').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des34').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod34').slideUp('slow', function() { $('#cod34').val( ui.item.cod ); });
$('#cod34').slideDown('slow');
$('#um34').slideUp('slow', function()
					   {
                            $('#um34').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um34').slideDown('slow');
$('#prec34').slideUp('slow', function(){ $('#prec34').val(ui.item.precio );});
$('#prec34').slideDown('slow'); $('#cant34').slideUp('slow', function(){$('#cant34').val('1');});
$('#cant34').slideDown('slow');$('#tot34').slideUp('slow', function(){$('#tot34').val(ui.item.psd);});
$('#tot34').slideDown('slow');$('#desc34').slideUp('slow', function(){$('#desc34').val('0');});
$('#desc34').slideDown('slow');$('#stock34').slideUp('slow', function(){$('#stock34').val(ui.item.stock);});
$('#stock34').slideDown('slow');$('#precl34').slideUp('slow', function(){$('#precl34').val(ui.item.psd );
});$('#precl34').slideDown('slow');$('#iva34').slideUp('slow', function(){$('#iva34').val(ui.item.precio);
});$('#iva34').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des35').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod35').slideUp('slow', function() { $('#cod35').val( ui.item.cod ); });
$('#cod35').slideDown('slow');
$('#um35').slideUp('slow', function()
					   {
                            $('#um35').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um35').slideDown('slow');
$('#prec35').slideUp('slow', function(){ $('#prec35').val(ui.item.precio );});
$('#prec35').slideDown('slow'); $('#cant35').slideUp('slow', function(){$('#cant35').val('1');});
$('#cant35').slideDown('slow');$('#tot35').slideUp('slow', function(){$('#tot35').val(ui.item.psd);});
$('#tot35').slideDown('slow');$('#desc35').slideUp('slow', function(){$('#desc35').val('0');});
$('#desc35').slideDown('slow');$('#stock35').slideUp('slow', function(){$('#stock35').val(ui.item.stock);});
$('#stock35').slideDown('slow');$('#precl35').slideUp('slow', function(){$('#precl35').val(ui.item.psd );
});$('#precl35').slideDown('slow');$('#iva35').slideUp('slow', function(){$('#iva35').val(ui.item.precio);
});$('#iva35').slideDown('slow')}});});	
////////////////////////////
//////////////////////////////
$(function(){
                $('#des36').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod36').slideUp('slow', function() { $('#cod36').val( ui.item.cod ); });
$('#cod36').slideDown('slow');
$('#um36').slideUp('slow', function()
					   {
                            $('#um36').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um36').slideDown('slow');
$('#prec36').slideUp('slow', function(){ $('#prec36').val(ui.item.precio );});
$('#prec36').slideDown('slow'); $('#cant36').slideUp('slow', function(){$('#cant36').val('1');});
$('#cant36').slideDown('slow');$('#tot36').slideUp('slow', function(){$('#tot36').val(ui.item.psd);});
$('#tot36').slideDown('slow');$('#desc36').slideUp('slow', function(){$('#desc36').val('0');});
$('#desc36').slideDown('slow');$('#stock36').slideUp('slow', function(){$('#stock36').val(ui.item.stock);});
$('#stock36').slideDown('slow');$('#precl36').slideUp('slow', function(){$('#precl36').val(ui.item.psd );
});$('#precl36').slideDown('slow');$('#iva36').slideUp('slow', function(){$('#iva36').val(ui.item.precio);
});$('#iva36').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des37').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod37').slideUp('slow', function() { $('#cod37').val( ui.item.cod ); });
$('#cod37').slideDown('slow');
$('#um37').slideUp('slow', function()
					   {
                            $('#um37').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um37').slideDown('slow');
$('#prec37').slideUp('slow', function(){ $('#prec37').val(ui.item.precio );});
$('#prec37').slideDown('slow'); $('#cant37').slideUp('slow', function(){$('#cant37').val('1');});
$('#cant37').slideDown('slow');$('#tot37').slideUp('slow', function(){$('#tot37').val(ui.item.psd);});
$('#tot37').slideDown('slow');$('#desc37').slideUp('slow', function(){$('#desc37').val('0');});
$('#desc37').slideDown('slow');$('#stock37').slideUp('slow', function(){$('#stock37').val(ui.item.stock);});
$('#stock37').slideDown('slow');$('#precl37').slideUp('slow', function(){$('#precl37').val(ui.item.psd);
});$('#precl37').slideDown('slow');$('#iva37').slideUp('slow', function(){$('#iva37').val(ui.item.precio);
});$('#iva37').slideDown('slow')}});});
//////////////////////////////
$(function(){
                $('#des38').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod38').slideUp('slow', function() { $('#cod38').val( ui.item.cod ); });
$('#cod38').slideDown('slow');
$('#um38').slideUp('slow', function()
					   {
                            $('#um38').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um38').slideDown('slow');
$('#prec38').slideUp('slow', function(){ $('#prec38').val(ui.item.precio );});
$('#prec38').slideDown('slow'); $('#cant38').slideUp('slow', function(){$('#cant38').val('1');});
$('#cant38').slideDown('slow');$('#tot38').slideUp('slow', function(){$('#tot38').val(ui.item.psd);});
$('#tot38').slideDown('slow');$('#desc38').slideUp('slow', function(){$('#desc38').val('0');});
$('#desc38').slideDown('slow');$('#stock38').slideUp('slow', function(){$('#stock38').val(ui.item.stock);});
$('#stock38').slideDown('slow');$('#precl38').slideUp('slow', function(){$('#precl38').val(ui.item.psd );
});$('#precl38').slideDown('slow');$('#iva38').slideUp('slow', function(){$('#iva38').val(ui.item.precio);
});$('#iva38').slideDown('slow')}});});

//////////////////////////////
$(function(){
                $('#des39').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod39').slideUp('slow', function() { $('#cod39').val( ui.item.cod ); });
$('#cod39').slideDown('slow');
$('#um39').slideUp('slow', function()
					   {
                            $('#um39').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um39').slideDown('slow');
$('#prec39').slideUp('slow', function(){ $('#prec39').val(ui.item.precio );});
$('#prec39').slideDown('slow'); $('#cant39').slideUp('slow', function(){$('#cant39').val('1');});
$('#cant39').slideDown('slow');$('#tot39').slideUp('slow', function(){$('#tot39').val(ui.item.psd);});
$('#tot39').slideDown('slow');$('#desc39').slideUp('slow', function(){$('#desc39').val('0');});
$('#desc39').slideDown('slow');$('#stock39').slideUp('slow', function(){$('#stock39').val(ui.item.stock);});
$('#stock39').slideDown('slow');$('#precl39').slideUp('slow', function(){$('#precl39').val(ui.item.psd );
});$('#precl39').slideDown('slow');$('#iva39').slideUp('slow', function(){$('#iva39').val(ui.item.precio);
});$('#iva39').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des40').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod40').slideUp('slow', function() { $('#cod40').val( ui.item.cod ); });
$('#cod40').slideDown('slow');
$('#um40').slideUp('slow', function()
					   {
                            $('#um40').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um40').slideDown('slow');
$('#prec40').slideUp('slow', function(){ $('#prec40').val(ui.item.precio );});
$('#prec40').slideDown('slow'); $('#cant40').slideUp('slow', function(){$('#cant40').val('1');});
$('#cant40').slideDown('slow');$('#tot40').slideUp('slow', function(){$('#tot40').val(ui.item.psd);});
$('#tot40').slideDown('slow');$('#desc40').slideUp('slow', function(){$('#desc40').val('0');});
$('#desc40').slideDown('slow');$('#stock40').slideUp('slow', function(){$('#stock40').val(ui.item.stock);});
$('#stock40').slideDown('slow');$('#precl40').slideUp('slow', function(){$('#precl40').val(ui.item.psd );
});$('#precl40').slideDown('slow');$('#iva40').slideUp('slow', function(){$('#iva40').val(ui.item.precio);
});$('#iva40').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des41').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod41').slideUp('slow', function() { $('#cod41').val( ui.item.cod ); });
$('#cod41').slideDown('slow');
$('#um41').slideUp('slow', function()
					   {
                            $('#um41').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um41').slideDown('slow');
$('#prec41').slideUp('slow', function(){ $('#prec41').val(ui.item.precio );});
$('#prec41').slideDown('slow'); $('#cant41').slideUp('slow', function(){$('#cant41').val('1');});
$('#cant41').slideDown('slow');$('#tot41').slideUp('slow', function(){$('#tot41').val(ui.item.psd);});
$('#tot41').slideDown('slow');$('#desc41').slideUp('slow', function(){$('#desc41').val('0');});
$('#desc41').slideDown('slow');$('#stock41').slideUp('slow', function(){$('#stock41').val(ui.item.stock);});
$('#stock41').slideDown('slow');$('#precl41').slideUp('slow', function(){$('#precl41').val(ui.item.psd );
});$('#precl41').slideDown('slow');$('#iva41').slideUp('slow', function(){$('#iva41').val(ui.item.precio);
});$('#iva41').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des42').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod42').slideUp('slow', function() { $('#cod42').val( ui.item.cod ); });
$('#cod42').slideDown('slow');
$('#um42').slideUp('slow', function()
					   {
                            $('#um42').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um42').slideDown('slow');
$('#prec42').slideUp('slow', function(){ $('#prec42').val(ui.item.precio );});
$('#prec42').slideDown('slow'); $('#cant42').slideUp('slow', function(){$('#cant42').val('1');});
$('#cant42').slideDown('slow');$('#tot42').slideUp('slow', function(){$('#tot42').val(ui.item.psd);});
$('#tot42').slideDown('slow');$('#desc42').slideUp('slow', function(){$('#desc42').val('0');});
$('#desc42').slideDown('slow');$('#stock42').slideUp('slow', function(){$('#stock42').val(ui.item.stock);});
$('#stock42').slideDown('slow');$('#precl42').slideUp('slow', function(){$('#precl42').val(ui.item.psd );
});$('#precl42').slideDown('slow');$('#iva42').slideUp('slow', function(){$('#iva42').val(ui.item.precio);
});$('#iva42').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des43').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod43').slideUp('slow', function() { $('#cod43').val( ui.item.cod ); });
$('#cod43').slideDown('slow');
$('#um43').slideUp('slow', function()
					   {
                            $('#um43').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um43').slideDown('slow');
$('#prec43').slideUp('slow', function(){ $('#prec43').val(ui.item.precio );});
$('#prec43').slideDown('slow'); $('#cant43').slideUp('slow', function(){$('#cant43').val('1');});
$('#cant43').slideDown('slow');$('#tot43').slideUp('slow', function(){$('#tot43').val(ui.item.psd);});
$('#tot43').slideDown('slow');$('#desc43').slideUp('slow', function(){$('#desc43').val('0');});
$('#desc43').slideDown('slow');$('#stock43').slideUp('slow', function(){$('#stock43').val(ui.item.stock);});
$('#stock43').slideDown('slow');$('#precl43').slideUp('slow', function(){$('#precl43').val(ui.item.psd );
});$('#precl43').slideDown('slow');$('#iva43').slideUp('slow', function(){$('#iva43').val(ui.item.precio);
});$('#iva43').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des44').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod44').slideUp('slow', function() { $('#cod44').val( ui.item.cod ); });
$('#cod44').slideDown('slow');
$('#um44').slideUp('slow', function()
					   {
                            $('#um44').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um44').slideDown('slow');
$('#prec44').slideUp('slow', function(){ $('#prec44').val(ui.item.precio );});
$('#prec44').slideDown('slow'); $('#cant44').slideUp('slow', function(){$('#cant44').val('1');});
$('#cant44').slideDown('slow');$('#tot44').slideUp('slow', function(){$('#tot44').val(ui.item.psd);});
$('#tot44').slideDown('slow');$('#desc44').slideUp('slow', function(){$('#desc44').val('0');});
$('#desc44').slideDown('slow');$('#stock44').slideUp('slow', function(){$('#stock44').val(ui.item.stock);});
$('#stock44').slideDown('slow');$('#precl44').slideUp('slow', function(){$('#precl44').val(ui.item.psd );
});$('#precl44').slideDown('slow');$('#iva44').slideUp('slow', function(){$('#iva44').val(ui.item.precio);
});$('#iva44').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des45').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod45').slideUp('slow', function() { $('#cod45').val( ui.item.cod ); });
$('#cod45').slideDown('slow');
$('#um45').slideUp('slow', function()
					   {
                            $('#um45').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um45').slideDown('slow');
$('#prec45').slideUp('slow', function(){ $('#prec45').val(ui.item.precio );});
$('#prec45').slideDown('slow'); $('#cant45').slideUp('slow', function(){$('#cant45').val('1');});
$('#cant45').slideDown('slow');$('#tot45').slideUp('slow', function(){$('#tot45').val(ui.item.psd);});
$('#tot45').slideDown('slow');$('#desc45').slideUp('slow', function(){$('#desc45').val('0');});
$('#desc45').slideDown('slow');$('#stock45').slideUp('slow', function(){$('#stock45').val(ui.item.stock);});
$('#stock45').slideDown('slow');$('#precl45').slideUp('slow', function(){$('#precl45').val(ui.item.psd );
});$('#precl45').slideDown('slow');$('#iva45').slideUp('slow', function(){$('#iva45').val(ui.item.precio);
});$('#iva45').slideDown('slow')}});});
//////////////////////////////
$(function(){
                $('#des46').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod46').slideUp('slow', function() { $('#cod46').val( ui.item.cod ); });
$('#cod46').slideDown('slow');
$('#um46').slideUp('slow', function()
					   {
                            $('#um46').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um46').slideDown('slow');
$('#prec46').slideUp('slow', function(){ $('#prec46').val(ui.item.precio );});
$('#prec46').slideDown('slow'); $('#cant46').slideUp('slow', function(){$('#cant46').val('1');});
$('#cant46').slideDown('slow');$('#tot46').slideUp('slow', function(){$('#tot46').val(ui.item.psd);});
$('#tot46').slideDown('slow');$('#desc46').slideUp('slow', function(){$('#desc46').val('0');});
$('#desc46').slideDown('slow');$('#stock46').slideUp('slow', function(){$('#stock46').val(ui.item.stock);});
$('#stock46').slideDown('slow');$('#precl46').slideUp('slow', function(){$('#precl46').val(ui.item.psd );
});$('#precl46').slideDown('slow');$('#iva46').slideUp('slow', function(){$('#iva46').val(ui.item.precio);
});$('#iva46').slideDown('slow')}});});
//////////////////////////////
$(function(){
                $('#des47').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod47').slideUp('slow', function() { $('#cod47').val( ui.item.cod ); });
$('#cod47').slideDown('slow');
$('#um47').slideUp('slow', function()
					   {
                            $('#um47').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um47').slideDown('slow');
$('#prec47').slideUp('slow', function(){ $('#prec47').val(ui.item.precio );});
$('#prec47').slideDown('slow'); $('#cant47').slideUp('slow', function(){$('#cant47').val('1');});
$('#cant47').slideDown('slow');$('#tot47').slideUp('slow', function(){$('#tot47').val(ui.item.psd);});
$('#tot47').slideDown('slow');$('#desc47').slideUp('slow', function(){$('#desc47').val('0');});
$('#desc47').slideDown('slow');$('#stock47').slideUp('slow', function(){$('#stock47').val(ui.item.stock);});
$('#stock47').slideDown('slow');$('#precl47').slideUp('slow', function(){$('#precl47').val(ui.item.psd );
});$('#precl47').slideDown('slow');$('#iva47').slideUp('slow', function(){$('#iva47').val(ui.item.precio);
});$('#iva47').slideDown('slow')}});});
//////////////////////////////
$(function(){
                $('#des48').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod48').slideUp('slow', function() { $('#cod48').val( ui.item.cod ); });
$('#cod48').slideDown('slow');
$('#um48').slideUp('slow', function()
					   {
                            $('#um48').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um48').slideDown('slow');
$('#prec48').slideUp('slow', function(){ $('#prec48').val(ui.item.precio );});
$('#prec48').slideDown('slow'); $('#cant48').slideUp('slow', function(){$('#cant48').val('1');});
$('#cant48').slideDown('slow');$('#tot48').slideUp('slow', function(){$('#tot48').val(ui.item.psd);});
$('#tot48').slideDown('slow');$('#desc48').slideUp('slow', function(){$('#desc48').val('0');});
$('#desc48').slideDown('slow');$('#stock48').slideUp('slow', function(){$('#stock48').val(ui.item.stock);});
$('#stock48').slideDown('slow');$('#precl48').slideUp('slow', function(){$('#precl48').val(ui.item.psd );
});$('#precl48').slideDown('slow');$('#iva48').slideUp('slow', function(){$('#iva48').val(ui.item.precio);
});$('#iva48').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des49').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod49').slideUp('slow', function() { $('#cod49').val( ui.item.cod ); });
$('#cod49').slideDown('slow');
$('#um49').slideUp('slow', function()
					   {
                            $('#um49').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um49').slideDown('slow');
$('#prec49').slideUp('slow', function(){ $('#prec49').val(ui.item.precio );});
$('#prec49').slideDown('slow'); $('#cant49').slideUp('slow', function(){$('#cant49').val('1');});
$('#cant49').slideDown('slow');$('#tot49').slideUp('slow', function(){$('#tot49').val(ui.item.psd);});
$('#tot49').slideDown('slow');$('#desc49').slideUp('slow', function(){$('#desc49').val('0');});
$('#desc49').slideDown('slow');$('#stock49').slideUp('slow', function(){$('#stock49').val(ui.item.stock);});
$('#stock49').slideDown('slow');$('#precl49').slideUp('slow', function(){$('#precl49').val(ui.item.psd );
});$('#precl49').slideDown('slow');$('#iva49').slideUp('slow', function(){$('#iva49').val(ui.item.precio);
});$('#iva49').slideDown('slow')}});});	

//////////////////////////////
$(function(){
                $('#des50').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod50').slideUp('slow', function() { $('#cod50').val( ui.item.cod ); });
$('#cod50').slideDown('slow');
$('#um50').slideUp('slow', function()
					   {
                            $('#um50').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um50').slideDown('slow');
$('#prec50').slideUp('slow', function(){ $('#prec50').val(ui.item.precio );});
$('#prec50').slideDown('slow'); $('#cant50').slideUp('slow', function(){$('#cant50').val('1');});
$('#cant50').slideDown('slow');$('#tot50').slideUp('slow', function(){$('#tot50').val(ui.item.psd);});
$('#tot50').slideDown('slow');$('#desc50').slideUp('slow', function(){$('#desc50').val('0');});
$('#desc50').slideDown('slow');$('#stock50').slideUp('slow', function(){$('#stock50').val(ui.item.stock);});
$('#stock50').slideDown('slow');$('#precl50').slideUp('slow', function(){$('#precl50').val(ui.item.psd );
});$('#precl50').slideDown('slow');$('#iva50').slideUp('slow', function(){$('#iva50').val(ui.item.precio);
});$('#iva50').slideDown('slow')}});});	
//// aqui e
$(function(){
                $('#des51').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
				   function(event, ui)
				   {
                       $('#cod51').slideUp('slow', function()
					   {
                            $('#cod51').val(
                                 ui.item.cod 
                            );
							
                       });
                       $('#cod51').slideDown('slow');
					   $('#um51').slideUp('slow', function()
					   {
                            $('#um51').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um51').slideDown('slow');
					   					   
					   $('#prec51').slideUp('slow', function()
					   {
                            $('#prec51').val(
                                 ui.item.precio 
                            );
							
                       });
                       $('#prec51').slideDown('slow');
					   
					   $('#cant51').slideUp('slow', function()
					   {
                            $('#cant51').val(
                                '1' 
                            );
							
                       });
                       $('#cant51').slideDown('slow');
					   
					   $('#tot51').slideUp('slow', function()
					   {
                            $('#tot51').val(
                               ui.item.psd  
                            );	
                       });
                       $('#tot51').slideDown('slow');
					    $('#desc51').slideUp('slow', function()
					   {
                            $('#desc51').val(
                                '0' 
                            );		
                       });
                       $('#desc51').slideDown('slow');
					   $('#stock51').slideUp('slow', function()
					   {
                            $('#stock51').val(
                               ui.item.stock
                            );		
                       });
                       $('#stock51').slideDown('slow');
					   $('#precl51').slideUp('slow', function(){$('#precl51').val(ui.item.psd );
});$('#precl51').slideDown('slow');$('#iva51').slideUp('slow', function(){$('#iva51').val(ui.item.precio);
});$('#iva51').slideDown('slow')
                   }     
                 });
				 
            });			
///////////////////////////////////////////////////////////	

$(function(){
                $('#des52').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod52').slideUp('slow', function() { $('#cod52').val( ui.item.cod ); });
$('#cod52').slideDown('slow');
$('#um52').slideUp('slow', function()
					   {
                            $('#um52').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um52').slideDown('slow');
$('#prec52').slideUp('slow', function(){ $('#prec52').val(ui.item.precio );});
$('#prec52').slideDown('slow'); $('#cant52').slideUp('slow', function(){$('#cant52').val('1');});
$('#cant52').slideDown('slow');$('#tot52').slideUp('slow', function(){$('#tot52').val(ui.item.psd);});
$('#tot52').slideDown('slow');$('#desc52').slideUp('slow', function(){$('#desc52').val('0');});
$('#desc52').slideDown('slow');$('#stock52').slideUp('slow', function(){$('#stock52').val(ui.item.stock);});
$('#stock52').slideDown('slow');$('#precl52').slideUp('slow', function(){$('#precl52').val(ui.item.psd );
});$('#precl52').slideDown('slow');$('#iva52').slideUp('slow', function(){$('#iva52').val(ui.item.precio);
});$('#iva52').slideDown('slow');}});});	
//////////////////////////////
$(function(){
                $('#des53').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod53').slideUp('slow', function() { $('#cod53').val( ui.item.cod ); });
$('#cod53').slideDown('slow');
$('#um53').slideUp('slow', function()
					   {
                            $('#um53').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um53').slideDown('slow');
$('#prec53').slideUp('slow', function(){ $('#prec53').val(ui.item.precio );});
$('#prec53').slideDown('slow'); $('#cant53').slideUp('slow', function(){$('#cant53').val('1');});
$('#cant53').slideDown('slow');$('#tot53').slideUp('slow', function(){$('#tot53').val(ui.item.psd);});
$('#tot53').slideDown('slow');$('#desc53').slideUp('slow', function(){$('#desc53').val('0');});
$('#desc53').slideDown('slow');$('#stock53').slideUp('slow', function(){$('#stock53').val(ui.item.stock);});
$('#stock53').slideDown('slow');$('#precl53').slideUp('slow', function(){$('#precl53').val(ui.item.psd );
});$('#precl53').slideDown('slow');$('#iva53').slideUp('slow', function(){$('#iva53').val(ui.item.precio);
});$('#iva53').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des54').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod54').slideUp('slow', function() { $('#cod54').val( ui.item.cod ); });
$('#cod54').slideDown('slow');
$('#um54').slideUp('slow', function()
					   {
                            $('#um54').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um54').slideDown('slow');
$('#prec54').slideUp('slow', function(){ $('#prec54').val(ui.item.precio );});
$('#prec54').slideDown('slow'); $('#cant54').slideUp('slow', function(){$('#cant54').val('1');});
$('#cant54').slideDown('slow');$('#tot54').slideUp('slow', function(){$('#tot54').val(ui.item.psd);});
$('#tot54').slideDown('slow');$('#desc54').slideUp('slow', function(){$('#desc54').val('0');});
$('#desc54').slideDown('slow');$('#stock54').slideUp('slow', function(){$('#stock54').val(ui.item.stock);});
$('#stock54').slideDown('slow');$('#precl54').slideUp('slow', function(){$('#precl54').val(ui.item.psd );
});$('#precl54').slideDown('slow');$('#iva54').slideUp('slow', function(){$('#iva54').val(ui.item.precio);
});$('#iva54').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des55').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod55').slideUp('slow', function() { $('#cod55').val( ui.item.cod ); });
$('#cod55').slideDown('slow');
$('#um55').slideUp('slow', function()
					   {
                            $('#um55').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um55').slideDown('slow');
$('#prec55').slideUp('slow', function(){ $('#prec55').val(ui.item.precio );});
$('#prec55').slideDown('slow'); $('#cant55').slideUp('slow', function(){$('#cant55').val('1');});
$('#cant55').slideDown('slow');$('#tot55').slideUp('slow', function(){$('#tot55').val(ui.item.psd);});
$('#tot55').slideDown('slow');$('#desc55').slideUp('slow', function(){$('#desc55').val('0');});
$('#desc55').slideDown('slow');$('#stock55').slideUp('slow', function(){$('#stock55').val(ui.item.stock);});
$('#stock55').slideDown('slow');$('#precl55').slideUp('slow', function(){$('#precl55').val(ui.item.psd );
});$('#precl55').slideDown('slow');$('#iva55').slideUp('slow', function(){$('#iva55').val(ui.item.precio);
});$('#iva55').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des56').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod56').slideUp('slow', function() { $('#cod56').val( ui.item.cod ); });
$('#cod56').slideDown('slow');
$('#um56').slideUp('slow', function()
					   {
                            $('#um56').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um56').slideDown('slow');
$('#prec56').slideUp('slow', function(){ $('#prec56').val(ui.item.precio );});
$('#prec56').slideDown('slow'); $('#cant56').slideUp('slow', function(){$('#cant56').val('1');});
$('#cant56').slideDown('slow');$('#tot56').slideUp('slow', function(){$('#tot56').val(ui.item.psd);});
$('#tot56').slideDown('slow');$('#desc56').slideUp('slow', function(){$('#desc56').val('0');});
$('#desc56').slideDown('slow');$('#stock56').slideUp('slow', function(){$('#stock56').val(ui.item.stock);});
$('#stock56').slideDown('slow');$('#precl56').slideUp('slow', function(){$('#precl56').val(ui.item.psd );
});$('#precl56').slideDown('slow');$('#iva56').slideUp('slow', function(){$('#iva56').val(ui.item.precio);
});$('#iva56').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des57').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod57').slideUp('slow', function() { $('#cod57').val( ui.item.cod ); });
$('#cod57').slideDown('slow');
$('#um57').slideUp('slow', function()
					   {
                            $('#um57').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um57').slideDown('slow');
$('#prec57').slideUp('slow', function(){ $('#prec57').val(ui.item.precio );});
$('#prec57').slideDown('slow'); $('#cant57').slideUp('slow', function(){$('#cant57').val('1');});
$('#cant57').slideDown('slow');$('#tot57').slideUp('slow', function(){$('#tot57').val(ui.item.psd);});
$('#tot57').slideDown('slow');$('#desc57').slideUp('slow', function(){$('#desc57').val('0');});
$('#desc57').slideDown('slow');$('#stock57').slideUp('slow', function(){$('#stock57').val(ui.item.stock);});
$('#stock57').slideDown('slow');$('#precl57').slideUp('slow', function(){$('#precl57').val(ui.item.psd );
});$('#precl57').slideDown('slow');$('#iva57').slideUp('slow', function(){$('#iva57').val(ui.item.precio);
});$('#iva57').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des58').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod58').slideUp('slow', function() { $('#cod58').val( ui.item.cod ); });
$('#cod58').slideDown('slow');
$('#um58').slideUp('slow', function()
					   {
                            $('#um58').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um58').slideDown('slow');
$('#prec58').slideUp('slow', function(){ $('#prec58').val(ui.item.precio );});
$('#prec58').slideDown('slow'); $('#cant58').slideUp('slow', function(){$('#cant58').val('1');});
$('#cant58').slideDown('slow');$('#tot58').slideUp('slow', function(){$('#tot58').val(ui.item.psd);});
$('#tot58').slideDown('slow');$('#desc58').slideUp('slow', function(){$('#desc58').val('0');});
$('#desc58').slideDown('slow');$('#stock58').slideUp('slow', function(){$('#stock58').val(ui.item.stock);});
$('#stock58').slideDown('slow');$('#precl58').slideUp('slow', function(){$('#precl58').val(ui.item.psd );
});$('#precl58').slideDown('slow');$('#iva58').slideUp('slow', function(){$('#iva58').val(ui.item.precio);
});$('#iva58').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des59').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod59').slideUp('slow', function() { $('#cod59').val( ui.item.cod ); });
$('#cod59').slideDown('slow');
$('#um59').slideUp('slow', function()
					   {
                            $('#um59').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um59').slideDown('slow');
$('#prec59').slideUp('slow', function(){ $('#prec59').val(ui.item.precio );});
$('#prec59').slideDown('slow'); $('#cant59').slideUp('slow', function(){$('#cant59').val('1');});
$('#cant59').slideDown('slow');$('#tot59').slideUp('slow', function(){$('#tot59').val(ui.item.psd);});
$('#tot59').slideDown('slow');$('#desc59').slideUp('slow', function(){$('#desc59').val('0');});
$('#desc59').slideDown('slow');$('#stock59').slideUp('slow', function(){$('#stock59').val(ui.item.stock);});
$('#stock59').slideDown('slow');$('#precl59').slideUp('slow', function(){$('#precl59').val(ui.item.psd );
});$('#precl59').slideDown('slow');$('#iva59').slideUp('slow', function(){$('#iva59').val(ui.item.precio);
});$('#iva59').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des60').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod60').slideUp('slow', function() { $('#cod60').val( ui.item.cod ); });
$('#cod60').slideDown('slow');
$('#um60').slideUp('slow', function()
					   {
                            $('#um60').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um60').slideDown('slow');
$('#prec60').slideUp('slow', function(){ $('#prec60').val(ui.item.precio );});
$('#prec60').slideDown('slow'); $('#cant60').slideUp('slow', function(){$('#cant60').val('1');});
$('#cant60').slideDown('slow');$('#tot60').slideUp('slow', function(){$('#tot60').val(ui.item.psd);});
$('#tot60').slideDown('slow');$('#desc60').slideUp('slow', function(){$('#desc60').val('0');});
$('#desc60').slideDown('slow');$('#stock60').slideUp('slow', function(){$('#stock60').val(ui.item.stock);});
$('#stock60').slideDown('slow');$('#precl60').slideUp('slow', function(){$('#precl60').val(ui.item.psd );
});$('#precl60').slideDown('slow');$('#iva60').slideUp('slow', function(){$('#iva60').val(ui.item.precio);
});$('#iva60').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des61').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod61').slideUp('slow', function() { $('#cod61').val( ui.item.cod ); });
$('#cod61').slideDown('slow');
$('#um61').slideUp('slow', function()
					   {
                            $('#um61').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um61').slideDown('slow');
$('#prec61').slideUp('slow', function(){ $('#prec61').val(ui.item.precio );});
$('#prec61').slideDown('slow'); $('#cant61').slideUp('slow', function(){$('#cant61').val('1');});
$('#cant61').slideDown('slow');$('#tot61').slideUp('slow', function(){$('#tot61').val(ui.item.psd);});
$('#tot61').slideDown('slow');$('#desc61').slideUp('slow', function(){$('#desc61').val('0');});
$('#desc61').slideDown('slow');$('#stock61').slideUp('slow', function(){$('#stock61').val(ui.item.stock);});
$('#stock61').slideDown('slow');$('#precl61').slideUp('slow', function(){$('#precl61').val(ui.item.psd );
});$('#precl61').slideDown('slow');$('#iva61').slideUp('slow', function(){$('#iva61').val(ui.item.precio);
});$('#iva61').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des62').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod62').slideUp('slow', function() { $('#cod62').val( ui.item.cod ); });
$('#cod62').slideDown('slow');
$('#um62').slideUp('slow', function()
					   {
                            $('#um62').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um62').slideDown('slow');
$('#prec62').slideUp('slow', function(){ $('#prec62').val(ui.item.precio );});
$('#prec62').slideDown('slow'); $('#cant62').slideUp('slow', function(){$('#cant62').val('1');});
$('#cant62').slideDown('slow');$('#tot62').slideUp('slow', function(){$('#tot62').val(ui.item.psd);});
$('#tot62').slideDown('slow');$('#desc62').slideUp('slow', function(){$('#desc62').val('0');});
$('#desc62').slideDown('slow');$('#stock62').slideUp('slow', function(){$('#stock62').val(ui.item.stock);});
$('#stock62').slideDown('slow');$('#precl62').slideUp('slow', function(){$('#precl62').val(ui.item.psd );
});$('#precl62').slideDown('slow');$('#iva62').slideUp('slow', function(){$('#iva62').val(ui.item.precio);
});$('#iva62').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des63').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod63').slideUp('slow', function() { $('#cod63').val( ui.item.cod ); });
$('#cod63').slideDown('slow');
$('#um63').slideUp('slow', function()
					   {
                            $('#um63').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um63').slideDown('slow');
$('#prec63').slideUp('slow', function(){ $('#prec63').val(ui.item.precio );});
$('#prec63').slideDown('slow'); $('#cant63').slideUp('slow', function(){$('#cant63').val('1');});
$('#cant63').slideDown('slow');$('#tot63').slideUp('slow', function(){$('#tot63').val(ui.item.psd);});
$('#tot63').slideDown('slow');$('#desc63').slideUp('slow', function(){$('#desc63').val('0');});
$('#desc63').slideDown('slow');$('#stock63').slideUp('slow', function(){$('#stock63').val(ui.item.stock);});
$('#stock63').slideDown('slow');$('#precl63').slideUp('slow', function(){$('#precl63').val(ui.item.psd );
});$('#precl63').slideDown('slow');$('#iva63').slideUp('slow', function(){$('#iva63').val(ui.item.precio);
});$('#iva63').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des64').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod64').slideUp('slow', function() { $('#cod64').val( ui.item.cod ); });
$('#cod64').slideDown('slow');
$('#um64').slideUp('slow', function()
					   {
                            $('#um64').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um64').slideDown('slow');
$('#prec64').slideUp('slow', function(){ $('#prec64').val(ui.item.precio );});
$('#prec64').slideDown('slow'); $('#cant64').slideUp('slow', function(){$('#cant64').val('1');});
$('#cant64').slideDown('slow');$('#tot64').slideUp('slow', function(){$('#tot64').val(ui.item.psd);});
$('#tot64').slideDown('slow');$('#desc64').slideUp('slow', function(){$('#desc64').val('0');});
$('#desc64').slideDown('slow');$('#stock64').slideUp('slow', function(){$('#stock64').val(ui.item.stock);});
$('#stock64').slideDown('slow');$('#precl64').slideUp('slow', function(){$('#precl64').val(ui.item.psd );
});$('#precl64').slideDown('slow');$('#iva64').slideUp('slow', function(){$('#iva64').val(ui.item.precio);
});$('#iva64').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des65').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod65').slideUp('slow', function() { $('#cod65').val( ui.item.cod ); });
$('#cod65').slideDown('slow');
$('#um65').slideUp('slow', function()
					   {
                            $('#um65').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um65').slideDown('slow');
$('#prec65').slideUp('slow', function(){ $('#prec65').val(ui.item.precio );});
$('#prec65').slideDown('slow'); $('#cant65').slideUp('slow', function(){$('#cant65').val('1');});
$('#cant65').slideDown('slow');$('#tot65').slideUp('slow', function(){$('#tot65').val(ui.item.psd);});
$('#tot65').slideDown('slow');$('#desc65').slideUp('slow', function(){$('#desc65').val('0');});
$('#desc65').slideDown('slow');$('#stock65').slideUp('slow', function(){$('#stock65').val(ui.item.stock);});
$('#stock65').slideDown('slow');$('#precl65').slideUp('slow', function(){$('#precl65').val(ui.item.psd );
});$('#precl65').slideDown('slow');$('#iva65').slideUp('slow', function(){$('#iva65').val(ui.item.precio);
});$('#iva65').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des66').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod66').slideUp('slow', function() { $('#cod66').val( ui.item.cod ); });
$('#cod66').slideDown('slow');
$('#um66').slideUp('slow', function()
					   {
                            $('#um66').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um66').slideDown('slow');
$('#prec66').slideUp('slow', function(){ $('#prec66').val(ui.item.precio );});
$('#prec66').slideDown('slow'); $('#cant66').slideUp('slow', function(){$('#cant66').val('1');});
$('#cant66').slideDown('slow');$('#tot66').slideUp('slow', function(){$('#tot66').val(ui.item.psd);});
$('#tot66').slideDown('slow');$('#desc66').slideUp('slow', function(){$('#desc66').val('0');});
$('#desc66').slideDown('slow');$('#stock66').slideUp('slow', function(){$('#stock66').val(ui.item.stock);});
$('#stock66').slideDown('slow');$('#precl66').slideUp('slow', function(){$('#precl66').val(ui.item.psd );
});$('#precl66').slideDown('slow');$('#iva66').slideUp('slow', function(){$('#iva66').val(ui.item.precio);
});$('#iva66').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des67').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod67').slideUp('slow', function() { $('#cod67').val( ui.item.cod ); });
$('#cod67').slideDown('slow');
$('#um67').slideUp('slow', function()
					   {
                            $('#um67').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um67').slideDown('slow');
$('#prec67').slideUp('slow', function(){ $('#prec67').val(ui.item.precio );});
$('#prec67').slideDown('slow'); $('#cant67').slideUp('slow', function(){$('#cant67').val('1');});
$('#cant67').slideDown('slow');$('#tot67').slideUp('slow', function(){$('#tot67').val(ui.item.psd);});
$('#tot67').slideDown('slow');$('#desc67').slideUp('slow', function(){$('#desc67').val('0');});
$('#desc67').slideDown('slow');$('#stock67').slideUp('slow', function(){$('#stock67').val(ui.item.stock);});
$('#stock67').slideDown('slow');$('#precl67').slideUp('slow', function(){$('#precl67').val(ui.item.psd );
});$('#precl67').slideDown('slow');$('#iva67').slideUp('slow', function(){$('#iva67').val(ui.item.precio);
});$('#iva67').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des68').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod68').slideUp('slow', function() { $('#cod68').val( ui.item.cod ); });
$('#cod68').slideDown('slow');
$('#um68').slideUp('slow', function()
					   {
                            $('#um68').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um68').slideDown('slow');
$('#prec68').slideUp('slow', function(){ $('#prec68').val(ui.item.precio );});
$('#prec68').slideDown('slow'); $('#cant68').slideUp('slow', function(){$('#cant68').val('1');});
$('#cant68').slideDown('slow');$('#tot68').slideUp('slow', function(){$('#tot68').val(ui.item.psd);});
$('#tot68').slideDown('slow');$('#desc68').slideUp('slow', function(){$('#desc68').val('0');});
$('#desc68').slideDown('slow');$('#stock68').slideUp('slow', function(){$('#stock68').val(ui.item.stock);});
$('#stock68').slideDown('slow');$('#precl68').slideUp('slow', function(){$('#precl68').val(ui.item.psd );
});$('#precl68').slideDown('slow');$('#iva68').slideUp('slow', function(){$('#iva68').val(ui.item.precio);
});$('#iva68').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des69').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod69').slideUp('slow', function() { $('#cod69').val( ui.item.cod ); });
$('#cod69').slideDown('slow');
$('#um69').slideUp('slow', function()
					   {
                            $('#um69').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um69').slideDown('slow');
$('#prec69').slideUp('slow', function(){ $('#prec69').val(ui.item.precio );});
$('#prec69').slideDown('slow'); $('#cant69').slideUp('slow', function(){$('#cant69').val('1');});
$('#cant69').slideDown('slow');$('#tot69').slideUp('slow', function(){$('#tot69').val(ui.item.psd);});
$('#tot69').slideDown('slow');$('#desc69').slideUp('slow', function(){$('#desc69').val('0');});
$('#desc69').slideDown('slow');$('#stock69').slideUp('slow', function(){$('#stock69').val(ui.item.stock);});
$('#stock69').slideDown('slow');$('#precl69').slideUp('slow', function(){$('#precl69').val(ui.item.psd );
});$('#precl69').slideDown('slow');$('#iva69').slideUp('slow', function(){$('#iva69').val(ui.item.precio);
});$('#iva69').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des70').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod70').slideUp('slow', function() { $('#cod70').val( ui.item.cod ); });
$('#cod70').slideDown('slow');
$('#um70').slideUp('slow', function()
					   {
                            $('#um70').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um70').slideDown('slow');
$('#prec70').slideUp('slow', function(){ $('#prec70').val(ui.item.precio );});
$('#prec70').slideDown('slow'); $('#cant70').slideUp('slow', function(){$('#cant70').val('1');});
$('#cant70').slideDown('slow');$('#tot70').slideUp('slow', function(){$('#tot70').val(ui.item.psd);});
$('#tot70').slideDown('slow');$('#desc70').slideUp('slow', function(){$('#desc70').val('0');});
$('#desc70').slideDown('slow');$('#stock70').slideUp('slow', function(){$('#stock70').val(ui.item.stock);});
$('#stock70').slideDown('slow');$('#precl70').slideUp('slow', function(){$('#precl70').val(ui.item.psd );
});$('#precl70').slideDown('slow');$('#iva70').slideUp('slow', function(){$('#iva70').val(ui.item.precio);
});$('#iva70').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des71').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod71').slideUp('slow', function() { $('#cod71').val( ui.item.cod ); });
$('#cod71').slideDown('slow');
$('#um71').slideUp('slow', function()
					   {
                            $('#um71').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um71').slideDown('slow');
$('#prec71').slideUp('slow', function(){ $('#prec71').val(ui.item.precio );});
$('#prec71').slideDown('slow'); $('#cant71').slideUp('slow', function(){$('#cant71').val('1');});
$('#cant71').slideDown('slow');$('#tot71').slideUp('slow', function(){$('#tot71').val(ui.item.psd);});
$('#tot71').slideDown('slow');$('#desc71').slideUp('slow', function(){$('#desc71').val('0');});
$('#desc71').slideDown('slow');$('#stock71').slideUp('slow', function(){$('#stock71').val(ui.item.stock);});
$('#stock71').slideDown('slow');$('#precl71').slideUp('slow', function(){$('#precl71').val(ui.item.psd );
});$('#precl71').slideDown('slow');$('#iva71').slideUp('slow', function(){$('#iva71').val(ui.item.precio);
});$('#iva71').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#des72').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod72').slideUp('slow', function() { $('#cod72').val( ui.item.cod ); });
$('#cod72').slideDown('slow');
$('#um72').slideUp('slow', function()
					   {
                            $('#um72').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um72').slideDown('slow');
$('#prec72').slideUp('slow', function(){ $('#prec72').val(ui.item.precio );});
$('#prec72').slideDown('slow'); $('#cant72').slideUp('slow', function(){$('#cant72').val('1');});
$('#cant72').slideDown('slow');$('#tot72').slideUp('slow', function(){$('#tot72').val(ui.item.psd);});
$('#tot72').slideDown('slow');$('#desc72').slideUp('slow', function(){$('#desc72').val('0');});
$('#desc72').slideDown('slow');$('#stock72').slideUp('slow', function(){$('#stock72').val(ui.item.stock);});
$('#stock72').slideDown('slow');$('#precl72').slideUp('slow', function(){$('#precl72').val(ui.item.psd );
});$('#precl72').slideDown('slow');$('#iva72').slideUp('slow', function(){$('#iva72').val(ui.item.precio);
});$('#iva72').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des73').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod73').slideUp('slow', function() { $('#cod73').val( ui.item.cod ); });
$('#cod73').slideDown('slow');
$('#um73').slideUp('slow', function()
					   {
                            $('#um73').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um73').slideDown('slow');
$('#prec73').slideUp('slow', function(){ $('#prec73').val(ui.item.precio );});
$('#prec73').slideDown('slow'); $('#cant73').slideUp('slow', function(){$('#cant73').val('1');});
$('#cant73').slideDown('slow');$('#tot73').slideUp('slow', function(){$('#tot73').val(ui.item.psd);});
$('#tot73').slideDown('slow');$('#desc73').slideUp('slow', function(){$('#desc73').val('0');});
$('#desc73').slideDown('slow');$('#stock73').slideUp('slow', function(){$('#stock73').val(ui.item.stock);});
$('#stock73').slideDown('slow');$('#precl73').slideUp('slow', function(){$('#precl73').val(ui.item.psd );
});$('#precl73').slideDown('slow');$('#iva73').slideUp('slow', function(){$('#iva73').val(ui.item.precio);
});$('#iva73').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des74').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod74').slideUp('slow', function() { $('#cod74').val( ui.item.cod ); });
$('#cod74').slideDown('slow');
$('#um74').slideUp('slow', function()
					   {
                            $('#um74').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um74').slideDown('slow');
$('#prec74').slideUp('slow', function(){ $('#prec74').val(ui.item.precio );});
$('#prec74').slideDown('slow'); $('#cant74').slideUp('slow', function(){$('#cant74').val('1');});
$('#cant74').slideDown('slow');$('#tot74').slideUp('slow', function(){$('#tot74').val(ui.item.psd);});
$('#tot74').slideDown('slow');$('#desc74').slideUp('slow', function(){$('#desc74').val('0');});
$('#desc74').slideDown('slow');$('#stock74').slideUp('slow', function(){$('#stock74').val(ui.item.stock);});
$('#stock74').slideDown('slow');$('#precl74').slideUp('slow', function(){$('#precl74').val(ui.item.psd );
});$('#precl74').slideDown('slow');$('#iva74').slideUp('slow', function(){$('#iva74').val(ui.item.precio);
});$('#iva74').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#des75').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod75').slideUp('slow', function() { $('#cod75').val( ui.item.cod ); });
$('#cod75').slideDown('slow');
$('#um75').slideUp('slow', function()
					   {
                            $('#um75').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um75').slideDown('slow');
$('#prec75').slideUp('slow', function(){ $('#prec75').val(ui.item.precio );});
$('#prec75').slideDown('slow'); $('#cant75').slideUp('slow', function(){$('#cant75').val('1');});
$('#cant75').slideDown('slow');$('#tot75').slideUp('slow', function(){$('#tot75').val(ui.item.psd);});
$('#tot75').slideDown('slow');$('#desc75').slideUp('slow', function(){$('#desc75').val('0');});
$('#desc75').slideDown('slow');$('#stock75').slideUp('slow', function(){$('#stock75').val(ui.item.stock);});
$('#stock75').slideDown('slow');$('#precl75').slideUp('slow', function(){$('#precl75').val(ui.item.psd );
});$('#precl75').slideDown('slow');$('#iva75').slideUp('slow', function(){$('#iva75').val(ui.item.precio);
});$('#iva75').slideDown('slow')}});});	

//////////////////////////////
				
  $(function() 
  {
		$( "#fechaE" ).datepicker({dateFormat: 'y/mm/dd'});
		$( "#fecha").datepicker  ({dateFormat: 'y/mm/dd'});
  });
/////////////////////////////
$(function(){
                $('#cod1').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
				   function(event, ui)
				   {
                       $('#des1').slideUp('slow', function()
					   {
                            $('#des1').val(
                                 ui.item.cod 
                            );
							
                       });
                       $('#des1').slideDown('slow');
					   
					   
					   $('#um1').slideUp('slow', function()
					   {
                            $('#um1').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um1').slideDown('slow');
					   					   
					   $('#prec1').slideUp('slow', function()
					   {
                            $('#prec1').val(
                                 ui.item.precio 
                            );
							
                       });
                       $('#prec1').slideDown('slow');
					   
					   $('#cant1').slideUp('slow', function()
					   {
                            $('#cant1').val(
                                '1' 
                            );
							
                       });
                       $('#cant1').slideDown('slow');
					   
					   $('#tot1').slideUp('slow', function()
					   {
                            $('#tot1').val(
                               ui.item.psd
                            );	
                       });
                       $('#tot1').slideDown('slow');
					    $('#desc1').slideUp('slow', function()
					   {
                            $('#desc1').val(
                                '0' 
                            );		
                       });
                       $('#desc1').slideDown('slow');
					   $('#stock1').slideUp('slow', function()
					   {
                            $('#stock1').val(
                               ui.item.stock
                            );		
                       });
                       $('#stock1').slideDown('slow');
					   $('#precl1').slideUp('slow', function(){$('#precl1').val(ui.item.psd );
});$('#precl1').slideDown('slow');$('#iva1').slideUp('slow', function(){$('#iva1').val(ui.item.precio);
});$('#iva1').slideDown('slow')
                   }     
                 });
				 
            });		
$(function(){
                $('#cod2').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des2').slideUp('slow', function() { $('#des2').val( ui.item.cod ); });
$('#des2').slideDown('slow');
 	$('#um2').slideUp('slow', function()
					   {
                            $('#um2').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um2').slideDown('slow');
$('#prec2').slideUp('slow', function(){ $('#prec2').val(ui.item.precio );});
$('#prec2').slideDown('slow'); $('#cant2').slideUp('slow', function(){$('#cant2').val('1');});
$('#cant2').slideDown('slow');$('#tot2').slideUp('slow', function(){$('#tot2').val(ui.item.psd);});
$('#tot2').slideDown('slow');$('#desc2').slideUp('slow', function(){$('#desc2').val('0');});
$('#desc2').slideDown('slow');$('#stock2').slideUp('slow', function(){$('#stock2').val(ui.item.stock);});
$('#stock2').slideDown('slow');$('#precl2').slideUp('slow', function(){$('#precl2').val(ui.item.psd );
});$('#precl2').slideDown('slow');$('#iva2').slideUp('slow', function(){$('#iva2').val(ui.item.precio);
});$('#iva2').slideDown('slow');}});});	
//////////////////////////////
$(function(){
                $('#cod3').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des3').slideUp('slow', function() { $('#des3').val( ui.item.cod ); });
$('#des3').slideDown('slow');
 	$('#um3').slideUp('slow', function()
					   {
                            $('#um3').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um3').slideDown('slow');
$('#prec3').slideUp('slow', function(){ $('#prec3').val(ui.item.precio );});
$('#prec3').slideDown('slow'); $('#cant3').slideUp('slow', function(){$('#cant3').val('1');});
$('#cant3').slideDown('slow');$('#tot3').slideUp('slow', function(){$('#tot3').val(ui.item.psd);});
$('#tot3').slideDown('slow');$('#desc3').slideUp('slow', function(){$('#desc3').val('0');});
$('#desc3').slideDown('slow');$('#stock3').slideUp('slow', function(){$('#stock3').val(ui.item.stock);});
$('#stock3').slideDown('slow');$('#precl3').slideUp('slow', function(){$('#precl3').val(ui.item.psd );
});$('#precl3').slideDown('slow');$('#iva3').slideUp('slow', function(){$('#iva3').val(ui.item.precio);
});$('#iva3').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod4').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des4').slideUp('slow', function() { $('#des4').val( ui.item.cod ); });
$('#des4').slideDown('slow');
 	$('#um4').slideUp('slow', function()
					   {
                            $('#um4').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um4').slideDown('slow');
$('#prec4').slideUp('slow', function(){ $('#prec4').val(ui.item.precio );});
$('#prec4').slideDown('slow'); $('#cant4').slideUp('slow', function(){$('#cant4').val('1');});
$('#cant4').slideDown('slow');$('#tot4').slideUp('slow', function(){$('#tot4').val(ui.item.psd);});
$('#tot4').slideDown('slow');$('#desc4').slideUp('slow', function(){$('#desc4').val('0');});
$('#desc4').slideDown('slow');$('#stock4').slideUp('slow', function(){$('#stock4').val(ui.item.stock);});
$('#stock4').slideDown('slow');$('#precl4').slideUp('slow', function(){$('#precl4').val(ui.item.psd );
});$('#precl4').slideDown('slow');$('#iva4').slideUp('slow', function(){$('#iva4').val(ui.item.precio);
});$('#iva4').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod5').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des5').slideUp('slow', function() { $('#des5').val( ui.item.cod ); });
$('#des5').slideDown('slow');
 	$('#um5').slideUp('slow', function()
					   {
                            $('#um5').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um5').slideDown('slow');
$('#prec5').slideUp('slow', function(){ $('#prec5').val(ui.item.precio );});
$('#prec5').slideDown('slow'); $('#cant5').slideUp('slow', function(){$('#cant5').val('1');});
$('#cant5').slideDown('slow');$('#tot5').slideUp('slow', function(){$('#tot5').val(ui.item.psd);});
$('#tot5').slideDown('slow');$('#desc5').slideUp('slow', function(){$('#desc5').val('0');});
$('#desc5').slideDown('slow');$('#stock5').slideUp('slow', function(){$('#stock5').val(ui.item.stock);});
$('#stock5').slideDown('slow');$('#precl5').slideUp('slow', function(){$('#precl5').val(ui.item.psd );
});$('#precl5').slideDown('slow');$('#iva5').slideUp('slow', function(){$('#iva5').val(ui.item.precio);
});$('#iva5').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod6').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des6').slideUp('slow', function() { $('#des6').val( ui.item.cod ); });
$('#des6').slideDown('slow');
 	$('#um6').slideUp('slow', function()
					   {
                            $('#um6').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um6').slideDown('slow');
$('#prec6').slideUp('slow', function(){ $('#prec6').val(ui.item.precio );});
$('#prec6').slideDown('slow'); $('#cant6').slideUp('slow', function(){$('#cant6').val('1');});
$('#cant6').slideDown('slow');$('#tot6').slideUp('slow', function(){$('#tot6').val(ui.item.psd);});
$('#tot6').slideDown('slow');$('#desc6').slideUp('slow', function(){$('#desc6').val('0');});
$('#desc6').slideDown('slow');$('#stock6').slideUp('slow', function(){$('#stock6').val(ui.item.stock);});
$('#stock6').slideDown('slow');$('#precl6').slideUp('slow', function(){$('#precl6').val(ui.item.psd );
});$('#precl6').slideDown('slow');$('#iva6').slideUp('slow', function(){$('#iva6').val(ui.item.precio);
});$('#iva6').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod7').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des7').slideUp('slow', function() { $('#des7').val( ui.item.cod ); });
$('#des7').slideDown('slow');
 	$('#um7').slideUp('slow', function()
					   {
                            $('#um7').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um7').slideDown('slow');
$('#prec7').slideUp('slow', function(){ $('#prec7').val(ui.item.precio );});
$('#prec7').slideDown('slow'); $('#cant7').slideUp('slow', function(){$('#cant7').val('1');});
$('#cant7').slideDown('slow');$('#tot7').slideUp('slow', function(){$('#tot7').val(ui.item.psd);});
$('#tot7').slideDown('slow');$('#desc7').slideUp('slow', function(){$('#desc7').val('0');});
$('#desc7').slideDown('slow');$('#stock7').slideUp('slow', function(){$('#stock7').val(ui.item.stock);});
$('#stock7').slideDown('slow');$('#precl7').slideUp('slow', function(){$('#precl7').val(ui.item.psd );
});$('#precl7').slideDown('slow');$('#iva7').slideUp('slow', function(){$('#iva7').val(ui.item.precio);
});$('#iva7').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod8').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des8').slideUp('slow', function() { $('#des8').val( ui.item.cod ); });
$('#des8').slideDown('slow');
 	$('#um8').slideUp('slow', function()
					   {
                            $('#um8').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um8').slideDown('slow');
$('#prec8').slideUp('slow', function(){ $('#prec8').val(ui.item.precio );});
$('#prec8').slideDown('slow'); $('#cant8').slideUp('slow', function(){$('#cant8').val('1');});
$('#cant8').slideDown('slow');$('#tot8').slideUp('slow', function(){$('#tot8').val(ui.item.psd);});
$('#tot8').slideDown('slow');$('#desc8').slideUp('slow', function(){$('#desc8').val('0');});
$('#desc8').slideDown('slow');$('#stock8').slideUp('slow', function(){$('#stock8').val(ui.item.stock);});
$('#stock8').slideDown('slow');$('#precl8').slideUp('slow', function(){$('#precl8').val(ui.item.psd );
});$('#precl8').slideDown('slow');$('#iva8').slideUp('slow', function(){$('#iva8').val(ui.item.precio);
});$('#iva8').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod9').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des9').slideUp('slow', function() { $('#des9').val( ui.item.cod ); });
$('#des9').slideDown('slow');
 	$('#um9').slideUp('slow', function()
					   {
                            $('#um9').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um9').slideDown('slow');
$('#prec9').slideUp('slow', function(){ $('#prec9').val(ui.item.precio );});
$('#prec9').slideDown('slow'); $('#cant9').slideUp('slow', function(){$('#cant9').val('1');});
$('#cant9').slideDown('slow');$('#tot9').slideUp('slow', function(){$('#tot9').val(ui.item.psd);});
$('#tot9').slideDown('slow');$('#desc9').slideUp('slow', function(){$('#desc9').val('0');});
$('#desc9').slideDown('slow');$('#stock9').slideUp('slow', function(){$('#stock9').val(ui.item.stock);});
$('#stock9').slideDown('slow');$('#precl9').slideUp('slow', function(){$('#precl9').val(ui.item.psd );
});$('#precl9').slideDown('slow');$('#iva9').slideUp('slow', function(){$('#iva9').val(ui.item.precio);
});$('#iva9').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod10').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des10').slideUp('slow', function() { $('#des10').val( ui.item.cod ); });
$('#des10').slideDown('slow');
 	$('#um10').slideUp('slow', function()
					   {
                            $('#um10').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um10').slideDown('slow');
$('#prec10').slideUp('slow', function(){ $('#prec10').val(ui.item.precio );});
$('#prec10').slideDown('slow'); $('#cant10').slideUp('slow', function(){$('#cant10').val('1');});
$('#cant10').slideDown('slow');$('#tot10').slideUp('slow', function(){$('#tot10').val(ui.item.psd);});
$('#tot10').slideDown('slow');$('#desc10').slideUp('slow', function(){$('#desc10').val('0');});
$('#desc10').slideDown('slow');$('#stock10').slideUp('slow', function(){$('#stock10').val(ui.item.stock);});
$('#stock10').slideDown('slow');$('#precl10').slideUp('slow', function(){$('#precl10').val(ui.item.psd );
});$('#precl10').slideDown('slow');$('#iva10').slideUp('slow', function(){$('#iva10').val(ui.item.precio);
});$('#iva10').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod11').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des11').slideUp('slow', function() { $('#des11').val( ui.item.cod ); });
$('#des11').slideDown('slow');
 	$('#um11').slideUp('slow', function()
					   {
                            $('#um11').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um11').slideDown('slow');
$('#prec11').slideUp('slow', function(){ $('#prec11').val(ui.item.precio );});
$('#prec11').slideDown('slow'); $('#cant11').slideUp('slow', function(){$('#cant11').val('1');});
$('#cant11').slideDown('slow');$('#tot11').slideUp('slow', function(){$('#tot11').val(ui.item.psd);});
$('#tot11').slideDown('slow');$('#desc11').slideUp('slow', function(){$('#desc11').val('0');});
$('#desc11').slideDown('slow');$('#stock11').slideUp('slow', function(){$('#stock11').val(ui.item.stock);});
$('#stock11').slideDown('slow');$('#precl11').slideUp('slow', function(){$('#precl11').val(ui.item.psd );
});$('#precl11').slideDown('slow');$('#iva11').slideUp('slow', function(){$('#iva11').val(ui.item.precio);
});$('#iva11').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod12').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des12').slideUp('slow', function() { $('#des12').val( ui.item.cod ); });
$('#des12').slideDown('slow');
 	$('#um12').slideUp('slow', function()
					   {
                            $('#um12').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um12').slideDown('slow');
$('#prec12').slideUp('slow', function(){ $('#prec12').val(ui.item.precio );});
$('#prec12').slideDown('slow'); $('#cant12').slideUp('slow', function(){$('#cant12').val('1');});
$('#cant12').slideDown('slow');$('#tot12').slideUp('slow', function(){$('#tot12').val(ui.item.psd);});
$('#tot12').slideDown('slow');$('#desc12').slideUp('slow', function(){$('#desc12').val('0');});
$('#desc12').slideDown('slow');$('#stock12').slideUp('slow', function(){$('#stock12').val(ui.item.stock);});
$('#stock12').slideDown('slow');$('#precl12').slideUp('slow', function(){$('#precl12').val(ui.item.psd );
});$('#precl12').slideDown('slow');$('#iva12').slideUp('slow', function(){$('#iva12').val(ui.item.precio);
});$('#iva12').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod13').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des13').slideUp('slow', function() { $('#des13').val( ui.item.cod ); });
$('#des13').slideDown('slow');
 	$('#um13').slideUp('slow', function()
					   {
                            $('#um13').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um13').slideDown('slow');
$('#prec13').slideUp('slow', function(){ $('#prec13').val(ui.item.precio );});
$('#prec13').slideDown('slow'); $('#cant13').slideUp('slow', function(){$('#cant13').val('1');});
$('#cant13').slideDown('slow');$('#tot13').slideUp('slow', function(){$('#tot13').val(ui.item.psd);});
$('#tot13').slideDown('slow');$('#desc13').slideUp('slow', function(){$('#desc13').val('0');});
$('#desc13').slideDown('slow');$('#stock13').slideUp('slow', function(){$('#stock13').val(ui.item.stock);});
$('#stock13').slideDown('slow');$('#precl13').slideUp('slow', function(){$('#precl13').val(ui.item.psd );
});$('#precl13').slideDown('slow');$('#iva13').slideUp('slow', function(){$('#iva13').val(ui.item.precio);
});$('#iva13').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod14').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des14').slideUp('slow', function() { $('#des14').val( ui.item.cod ); });
$('#des14').slideDown('slow');
 	$('#um14').slideUp('slow', function()
					   {
                            $('#um14').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um14').slideDown('slow');
$('#prec14').slideUp('slow', function(){ $('#prec14').val(ui.item.precio );});
$('#prec14').slideDown('slow'); $('#cant14').slideUp('slow', function(){$('#cant14').val('1');});
$('#cant14').slideDown('slow');$('#tot14').slideUp('slow', function(){$('#tot14').val(ui.item.psd);});
$('#tot14').slideDown('slow');$('#desc14').slideUp('slow', function(){$('#desc14').val('0');});
$('#desc14').slideDown('slow');$('#stock14').slideUp('slow', function(){$('#stock14').val(ui.item.stock);});
$('#stock14').slideDown('slow');$('#precl14').slideUp('slow', function(){$('#precl14').val(ui.item.psd );
});$('#precl14').slideDown('slow');$('#iva14').slideUp('slow', function(){$('#iva14').val(ui.item.precio);
});$('#iva14').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod15').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des15').slideUp('slow', function() { $('#des15').val( ui.item.cod ); });
$('#des15').slideDown('slow');
 	$('#um15').slideUp('slow', function()
					   {
                            $('#um15').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um15').slideDown('slow');
$('#prec15').slideUp('slow', function(){ $('#prec15').val(ui.item.precio );});
$('#prec15').slideDown('slow'); $('#cant15').slideUp('slow', function(){$('#cant15').val('1');});
$('#cant15').slideDown('slow');$('#tot15').slideUp('slow', function(){$('#tot15').val(ui.item.psd);});
$('#tot15').slideDown('slow');$('#desc15').slideUp('slow', function(){$('#desc15').val('0');});
$('#desc15').slideDown('slow');$('#stock15').slideUp('slow', function(){$('#stock15').val(ui.item.stock);});
$('#stock15').slideDown('slow');$('#precl15').slideUp('slow', function(){$('#precl15').val(ui.item.psd );
});$('#precl15').slideDown('slow');$('#iva15').slideUp('slow', function(){$('#iva15').val(ui.item.precio);
});$('#iva15').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod16').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des16').slideUp('slow', function() { $('#des16').val( ui.item.cod ); });
$('#des16').slideDown('slow');
 	$('#um16').slideUp('slow', function()
					   {
                            $('#um16').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um16').slideDown('slow');
$('#prec16').slideUp('slow', function(){ $('#prec16').val(ui.item.precio );});
$('#prec16').slideDown('slow'); $('#cant16').slideUp('slow', function(){$('#cant16').val('1');});
$('#cant16').slideDown('slow');$('#tot16').slideUp('slow', function(){$('#tot16').val(ui.item.psd);});
$('#tot16').slideDown('slow');$('#desc16').slideUp('slow', function(){$('#desc16').val('0');});
$('#desc16').slideDown('slow');$('#stock16').slideUp('slow', function(){$('#stock16').val(ui.item.stock);});
$('#stock16').slideDown('slow');$('#precl16').slideUp('slow', function(){$('#precl16').val(ui.item.psd );
});$('#precl16').slideDown('slow');$('#iva16').slideUp('slow', function(){$('#iva16').val(ui.item.precio);
});$('#iva16').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod17').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des17').slideUp('slow', function() { $('#des17').val( ui.item.cod ); });
$('#des17').slideDown('slow');
 	$('#um17').slideUp('slow', function()
					   {
                            $('#um17').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um17').slideDown('slow');
$('#prec17').slideUp('slow', function(){ $('#prec17').val(ui.item.precio );});
$('#prec17').slideDown('slow'); $('#cant17').slideUp('slow', function(){$('#cant17').val('1');});
$('#cant17').slideDown('slow');$('#tot17').slideUp('slow', function(){$('#tot17').val(ui.item.psd);});
$('#tot17').slideDown('slow');$('#desc17').slideUp('slow', function(){$('#desc17').val('0');});
$('#desc17').slideDown('slow');$('#stock17').slideUp('slow', function(){$('#stock17').val(ui.item.stock);});
$('#stock17').slideDown('slow');$('#precl17').slideUp('slow', function(){$('#precl17').val(ui.item.psd );
});$('#precl17').slideDown('slow');$('#iva17').slideUp('slow', function(){$('#iva17').val(ui.item.precio);
});$('#iva17').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod18').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des18').slideUp('slow', function() { $('#des18').val( ui.item.cod ); });
$('#des18').slideDown('slow');
 	$('#um18').slideUp('slow', function()
					   {
                            $('#um18').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um18').slideDown('slow');
$('#prec18').slideUp('slow', function(){ $('#prec18').val(ui.item.precio );});
$('#prec18').slideDown('slow'); $('#cant18').slideUp('slow', function(){$('#cant18').val('1');});
$('#cant18').slideDown('slow');$('#tot18').slideUp('slow', function(){$('#tot18').val(ui.item.psd);});
$('#tot18').slideDown('slow');$('#desc18').slideUp('slow', function(){$('#desc18').val('0');});
$('#desc18').slideDown('slow');$('#stock18').slideUp('slow', function(){$('#stock18').val(ui.item.stock);});
$('#stock18').slideDown('slow');$('#precl18').slideUp('slow', function(){$('#precl18').val(ui.item.psd );
});$('#precl18').slideDown('slow');$('#iva18').slideUp('slow', function(){$('#iva18').val(ui.item.precio);
});$('#iva18').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod19').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des19').slideUp('slow', function() { $('#des19').val( ui.item.cod ); });
$('#des19').slideDown('slow');
 	$('#um19').slideUp('slow', function()
					   {
                            $('#um19').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um19').slideDown('slow');
$('#prec19').slideUp('slow', function(){ $('#prec19').val(ui.item.precio );});
$('#prec19').slideDown('slow'); $('#cant19').slideUp('slow', function(){$('#cant19').val('1');});
$('#cant19').slideDown('slow');$('#tot19').slideUp('slow', function(){$('#tot19').val(ui.item.psd);});
$('#tot19').slideDown('slow');$('#desc19').slideUp('slow', function(){$('#desc19').val('0');});
$('#desc19').slideDown('slow');$('#stock19').slideUp('slow', function(){$('#stock19').val(ui.item.stock);});
$('#stock19').slideDown('slow');$('#precl19').slideUp('slow', function(){$('#precl19').val(ui.item.psd );
});$('#precl19').slideDown('slow');$('#iva19').slideUp('slow', function(){$('#iva19').val(ui.item.precio);
});$('#iva19').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod20').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des20').slideUp('slow', function() { $('#des20').val( ui.item.cod ); });
$('#des20').slideDown('slow');
 	$('#um20').slideUp('slow', function()
					   {
                            $('#um20').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um20').slideDown('slow');
$('#prec20').slideUp('slow', function(){ $('#prec20').val(ui.item.precio );});
$('#prec20').slideDown('slow'); $('#cant20').slideUp('slow', function(){$('#cant20').val('1');});
$('#cant20').slideDown('slow');$('#tot20').slideUp('slow', function(){$('#tot20').val(ui.item.psd);});
$('#tot20').slideDown('slow');$('#desc20').slideUp('slow', function(){$('#desc20').val('0');});
$('#desc20').slideDown('slow');$('#stock20').slideUp('slow', function(){$('#stock20').val(ui.item.stock);});
$('#stock20').slideDown('slow');$('#precl20').slideUp('slow', function(){$('#precl20').val(ui.item.psd );
});$('#precl20').slideDown('slow');$('#iva20').slideUp('slow', function(){$('#iva20').val(ui.item.precio);
});$('#iva20').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod21').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des21').slideUp('slow', function() { $('#des21').val( ui.item.cod ); });
$('#des21').slideDown('slow');
	$('#um21').slideUp('slow', function()
					   {
                            $('#um21').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um21').slideDown('slow');
$('#prec21').slideUp('slow', function(){ $('#prec21').val(ui.item.precio );});
$('#prec21').slideDown('slow'); $('#cant21').slideUp('slow', function(){$('#cant21').val('1');});
$('#cant21').slideDown('slow');$('#tot21').slideUp('slow', function(){$('#tot21').val(ui.item.psd);});
$('#tot21').slideDown('slow');$('#desc21').slideUp('slow', function(){$('#desc21').val('0');});
$('#desc21').slideDown('slow');$('#stock21').slideUp('slow', function(){$('#stock21').val(ui.item.stock);});
$('#stock21').slideDown('slow');$('#precl21').slideUp('slow', function(){$('#precl21').val(ui.item.psd );
});$('#precl21').slideDown('slow');$('#iva21').slideUp('slow', function(){$('#iva21').val(ui.item.precio);
});$('#iva21').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod22').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des22').slideUp('slow', function() { $('#des22').val( ui.item.cod ); });
$('#des22').slideDown('slow');
	$('#um22').slideUp('slow', function()
					   {
                            $('#um22').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um22').slideDown('slow');
$('#prec22').slideUp('slow', function(){ $('#prec22').val(ui.item.precio );});
$('#prec22').slideDown('slow'); $('#cant22').slideUp('slow', function(){$('#cant22').val('1');});
$('#cant22').slideDown('slow');$('#tot22').slideUp('slow', function(){$('#tot22').val(ui.item.psd);});
$('#tot22').slideDown('slow');$('#desc22').slideUp('slow', function(){$('#desc22').val('0');});
$('#desc22').slideDown('slow');$('#stock22').slideUp('slow', function(){$('#stock22').val(ui.item.stock);});
$('#stock22').slideDown('slow');$('#precl22').slideUp('slow', function(){$('#precl22').val(ui.item.psd );
});$('#precl22').slideDown('slow');$('#iva22').slideUp('slow', function(){$('#iva22').val(ui.item.precio);
});$('#iva22').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod23').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des23').slideUp('slow', function() { $('#des23').val( ui.item.cod ); });
$('#des23').slideDown('slow');
$('#um23').slideUp('slow', function()
					   {
                            $('#um23').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um23').slideDown('slow');
$('#prec23').slideUp('slow', function(){ $('#prec23').val(ui.item.precio );});
$('#prec23').slideDown('slow'); $('#cant23').slideUp('slow', function(){$('#cant23').val('1');});
$('#cant23').slideDown('slow');$('#tot23').slideUp('slow', function(){$('#tot23').val(ui.item.psd);});
$('#tot23').slideDown('slow');$('#desc23').slideUp('slow', function(){$('#desc23').val('0');});
$('#desc23').slideDown('slow');$('#stock23').slideUp('slow', function(){$('#stock23').val(ui.item.stock);});
$('#stock23').slideDown('slow');$('#precl23').slideUp('slow', function(){$('#precl23').val(ui.item.psd );
});$('#precl23').slideDown('slow');$('#iva23').slideUp('slow', function(){$('#iva23').val(ui.item.precio);
});$('#iva23').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod24').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des24').slideUp('slow', function() { $('#des24').val( ui.item.cod ); });
$('#des24').slideDown('slow');
$('#um24').slideUp('slow', function()
					   {
                            $('#um24').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um24').slideDown('slow');
$('#prec24').slideUp('slow', function(){ $('#prec24').val(ui.item.precio );});
$('#prec24').slideDown('slow'); $('#cant24').slideUp('slow', function(){$('#cant24').val('1');});
$('#cant24').slideDown('slow');$('#tot24').slideUp('slow', function(){$('#tot24').val(ui.item.psd);});
$('#tot24').slideDown('slow');$('#desc24').slideUp('slow', function(){$('#desc24').val('0');});
$('#desc24').slideDown('slow');$('#stock24').slideUp('slow', function(){$('#stock24').val(ui.item.stock);});
$('#stock24').slideDown('slow');$('#precl24').slideUp('slow', function(){$('#precl24').val(ui.item.psd );
});$('#precl24').slideDown('slow');$('#iva24').slideUp('slow', function(){$('#iva24').val(ui.item.precio);
});$('#iva24').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod25').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des25').slideUp('slow', function() { $('#des25').val( ui.item.cod ); });
$('#des25').slideDown('slow');
$('#um25').slideUp('slow', function()
					   {
                            $('#um25').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um25').slideDown('slow');
$('#prec25').slideUp('slow', function(){ $('#prec25').val(ui.item.precio );});
$('#prec25').slideDown('slow'); $('#cant25').slideUp('slow', function(){$('#cant25').val('1');});
$('#cant25').slideDown('slow');$('#tot25').slideUp('slow', function(){$('#tot25').val(ui.item.psd);});
$('#tot25').slideDown('slow');$('#desc25').slideUp('slow', function(){$('#desc25').val('0');});
$('#desc25').slideDown('slow');$('#stock25').slideUp('slow', function(){$('#stock25').val(ui.item.stock);});
$('#stock25').slideDown('slow');$('#precl25').slideUp('slow', function(){$('#precl25').val(ui.item.psd );
});$('#precl25').slideDown('slow');$('#iva25').slideUp('slow', function(){$('#iva25').val(ui.item.precio);
});$('#iva25').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod26').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des26').slideUp('slow', function() { $('#des26').val( ui.item.cod ); });
$('#des26').slideDown('slow');
$('#um26').slideUp('slow', function()
					   {
                            $('#um26').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um26').slideDown('slow');
$('#prec26').slideUp('slow', function(){ $('#prec26').val(ui.item.precio );});
$('#prec26').slideDown('slow'); $('#cant26').slideUp('slow', function(){$('#cant26').val('1');});
$('#cant26').slideDown('slow');$('#tot26').slideUp('slow', function(){$('#tot26').val(ui.item.psd);});
$('#tot26').slideDown('slow');$('#desc26').slideUp('slow', function(){$('#desc26').val('0');});
$('#desc26').slideDown('slow');$('#stock26').slideUp('slow', function(){$('#stock26').val(ui.item.stock);});
$('#stock26').slideDown('slow');$('#precl26').slideUp('slow', function(){$('#precl26').val(ui.item.psd );
});$('#precl26').slideDown('slow');$('#iva26').slideUp('slow', function(){$('#iva26').val(ui.item.precio);
});$('#iva26').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod27').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des27').slideUp('slow', function() { $('#des27').val( ui.item.cod ); });
$('#des27').slideDown('slow');
$('#um27').slideUp('slow', function()
					   {
                            $('#um27').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um27').slideDown('slow');
$('#prec27').slideUp('slow', function(){ $('#prec27').val(ui.item.precio );});
$('#prec27').slideDown('slow'); $('#cant27').slideUp('slow', function(){$('#cant27').val('1');});
$('#cant27').slideDown('slow');$('#tot27').slideUp('slow', function(){$('#tot27').val(ui.item.psd);});
$('#tot27').slideDown('slow');$('#desc27').slideUp('slow', function(){$('#desc27').val('0');});
$('#desc27').slideDown('slow');$('#stock27').slideUp('slow', function(){$('#stock27').val(ui.item.stock);});
$('#stock27').slideDown('slow');$('#precl27').slideUp('slow', function(){$('#precl27').val(ui.item.psd );
});$('#precl27').slideDown('slow');$('#iva27').slideUp('slow', function(){$('#iva27').val(ui.item.precio);
});$('#iva27').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod28').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des28').slideUp('slow', function() { $('#des28').val( ui.item.cod ); });
$('#des28').slideDown('slow');
$('#um28').slideUp('slow', function()
					   {
                            $('#um28').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um28').slideDown('slow');
$('#prec28').slideUp('slow', function(){ $('#prec28').val(ui.item.precio );});
$('#prec28').slideDown('slow'); $('#cant28').slideUp('slow', function(){$('#cant28').val('1');});
$('#cant28').slideDown('slow');$('#tot28').slideUp('slow', function(){$('#tot28').val(ui.item.psd);});
$('#tot28').slideDown('slow');$('#desc28').slideUp('slow', function(){$('#desc28').val('0');});
$('#desc28').slideDown('slow');$('#stock28').slideUp('slow', function(){$('#stock28').val(ui.item.stock);});
$('#stock28').slideDown('slow');$('#precl28').slideUp('slow', function(){$('#precl28').val(ui.item.psd);
});$('#precl28').slideDown('slow');$('#iva28').slideUp('slow', function(){$('#iva28').val(ui.item.precio);
});$('#iva28').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod29').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des29').slideUp('slow', function() { $('#des29').val( ui.item.cod ); });
$('#des29').slideDown('slow');
$('#um29').slideUp('slow', function()
					   {
                            $('#um29').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um29').slideDown('slow');
$('#prec29').slideUp('slow', function(){ $('#prec29').val(ui.item.precio );});
$('#prec29').slideDown('slow'); $('#cant29').slideUp('slow', function(){$('#cant29').val('1');});
$('#cant29').slideDown('slow');$('#tot29').slideUp('slow', function(){$('#tot29').val(ui.item.psd);});
$('#tot29').slideDown('slow');$('#desc29').slideUp('slow', function(){$('#desc29').val('0');});
$('#desc29').slideDown('slow');$('#stock29').slideUp('slow', function(){$('#stock29').val(ui.item.stock);});
$('#stock29').slideDown('slow');$('#precl29').slideUp('slow', function(){$('#precl29').val(ui.item.psd );
});$('#precl29').slideDown('slow');$('#iva29').slideUp('slow', function(){$('#iva29').val(ui.item.precio);
});$('#iva29').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod30').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des30').slideUp('slow', function() { $('#des30').val( ui.item.cod ); });
$('#des30').slideDown('slow');
$('#um30').slideUp('slow', function()
					   {
                            $('#um30').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um30').slideDown('slow');
$('#prec30').slideUp('slow', function(){ $('#prec30').val(ui.item.precio );});
$('#prec30').slideDown('slow'); $('#cant30').slideUp('slow', function(){$('#cant30').val('1');});
$('#cant30').slideDown('slow');$('#tot30').slideUp('slow', function(){$('#tot30').val(ui.item.psd);});
$('#tot30').slideDown('slow');$('#desc30').slideUp('slow', function(){$('#desc30').val('0');});
$('#desc30').slideDown('slow');$('#stock30').slideUp('slow', function(){$('#stock30').val(ui.item.stock);});
$('#stock30').slideDown('slow');$('#precl30').slideUp('slow', function(){$('#precl30').val(ui.item.psd );
});$('#precl30').slideDown('slow');$('#iva30').slideUp('slow', function(){$('#iva30').val(ui.item.precio);
});$('#iva30').slideDown('slow')}});});	
//////////////////////////////
//////////////////////////////
$(function(){
                $('#cod31').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des31').slideUp('slow', function() { $('#des31').val( ui.item.cod ); });
$('#des31').slideDown('slow');
$('#um31').slideUp('slow', function()
					   {
                            $('#um31').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um31').slideDown('slow');
$('#prec31').slideUp('slow', function(){ $('#prec31').val(ui.item.precio );});
$('#prec31').slideDown('slow'); $('#cant31').slideUp('slow', function(){$('#cant31').val('1');});
$('#cant31').slideDown('slow');$('#tot31').slideUp('slow', function(){$('#tot31').val(ui.item.psd);});
$('#tot31').slideDown('slow');$('#desc31').slideUp('slow', function(){$('#desc31').val('0');});
$('#desc31').slideDown('slow');$('#stock31').slideUp('slow', function(){$('#stock31').val(ui.item.stock);});
$('#stock31').slideDown('slow');$('#precl31').slideUp('slow', function(){$('#precl31').val(ui.item.psd );
});$('#precl31').slideDown('slow');$('#iva31').slideUp('slow', function(){$('#iva31').val(ui.item.precio);
});$('#iva31').slideDown('slow')}});});
//////////////////////////////
$(function(){
                $('#cod32').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des32').slideUp('slow', function() { $('#des32').val( ui.item.cod ); });
$('#des32').slideDown('slow');
$('#um32').slideUp('slow', function()
					   {
                            $('#um32').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um32').slideDown('slow');
$('#prec32').slideUp('slow', function(){ $('#prec32').val(ui.item.precio );});
$('#prec32').slideDown('slow'); $('#cant32').slideUp('slow', function(){$('#cant32').val('1');});
$('#cant32').slideDown('slow');$('#tot32').slideUp('slow', function(){$('#tot32').val(ui.item.psd);});
$('#tot32').slideDown('slow');$('#desc32').slideUp('slow', function(){$('#desc32').val('0');});
$('#desc32').slideDown('slow');$('#stock32').slideUp('slow', function(){$('#stock32').val(ui.item.stock);});
$('#stock32').slideDown('slow');$('#precl32').slideUp('slow', function(){$('#precl32').val(ui.item.psd );
});$('#precl32').slideDown('slow');$('#iva32').slideUp('slow', function(){$('#iva32').val(ui.item.precio);
});$('#iva32').slideDown('slow')}});});		

//////////////////////////////
$(function(){
                $('#cod33').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des33').slideUp('slow', function() { $('#des33').val( ui.item.cod ); });
$('#des33').slideDown('slow');
$('#um33').slideUp('slow', function()
					   {
                            $('#um33').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um33').slideDown('slow');
$('#prec33').slideUp('slow', function(){ $('#prec33').val(ui.item.precio );});
$('#prec33').slideDown('slow'); $('#cant33').slideUp('slow', function(){$('#cant33').val('1');});
$('#cant33').slideDown('slow');$('#tot33').slideUp('slow', function(){$('#tot33').val(ui.item.psd);});
$('#tot33').slideDown('slow');$('#desc33').slideUp('slow', function(){$('#desc33').val('0');});
$('#desc33').slideDown('slow');$('#stock33').slideUp('slow', function(){$('#stock33').val(ui.item.stock);});
$('#stock33').slideDown('slow');$('#precl33').slideUp('slow', function(){$('#precl33').val(ui.item.psd );
});$('#precl33').slideDown('slow');$('#iva33').slideUp('slow', function(){$('#iva33').val(ui.item.precio);
});$('#iva33').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod34').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des34').slideUp('slow', function() { $('#des34').val( ui.item.cod ); });
$('#des34').slideDown('slow');
$('#um34').slideUp('slow', function()
					   {
                            $('#um34').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um34').slideDown('slow');
$('#prec34').slideUp('slow', function(){ $('#prec34').val(ui.item.precio );});
$('#prec34').slideDown('slow'); $('#cant34').slideUp('slow', function(){$('#cant34').val('1');});
$('#cant34').slideDown('slow');$('#tot34').slideUp('slow', function(){$('#tot34').val(ui.item.psd);});
$('#tot34').slideDown('slow');$('#desc34').slideUp('slow', function(){$('#desc34').val('0');});
$('#desc34').slideDown('slow');$('#stock34').slideUp('slow', function(){$('#stock34').val(ui.item.stock);});
$('#stock34').slideDown('slow');$('#precl34').slideUp('slow', function(){$('#precl34').val(ui.item.psd );
});$('#precl34').slideDown('slow');$('#iva34').slideUp('slow', function(){$('#iva34').val(ui.item.precio);
});$('#iva34').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod35').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des35').slideUp('slow', function() { $('#des35').val( ui.item.cod ); });
$('#des35').slideDown('slow');
$('#um35').slideUp('slow', function()
					   {
                            $('#um35').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um35').slideDown('slow');
$('#prec35').slideUp('slow', function(){ $('#prec35').val(ui.item.precio );});
$('#prec35').slideDown('slow'); $('#cant35').slideUp('slow', function(){$('#cant35').val('1');});
$('#cant35').slideDown('slow');$('#tot35').slideUp('slow', function(){$('#tot35').val(ui.item.psd);});
$('#tot35').slideDown('slow');$('#desc35').slideUp('slow', function(){$('#desc35').val('0');});
$('#desc35').slideDown('slow');$('#stock35').slideUp('slow', function(){$('#stock35').val(ui.item.stock);});
$('#stock35').slideDown('slow');$('#precl35').slideUp('slow', function(){$('#precl35').val(ui.item.psd );
});$('#precl35').slideDown('slow');$('#iva35').slideUp('slow', function(){$('#iva35').val(ui.item.precio);
});$('#iva35').slideDown('slow')}});});	
////////////////////////////
//////////////////////////////
$(function(){
                $('#cod36').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des36').slideUp('slow', function() { $('#des36').val( ui.item.cod ); });
$('#des36').slideDown('slow');
$('#um36').slideUp('slow', function()
					   {
                            $('#um36').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um36').slideDown('slow');
$('#prec36').slideUp('slow', function(){ $('#prec36').val(ui.item.precio );});
$('#prec36').slideDown('slow'); $('#cant36').slideUp('slow', function(){$('#cant36').val('1');});
$('#cant36').slideDown('slow');$('#tot36').slideUp('slow', function(){$('#tot36').val(ui.item.psd);});
$('#tot36').slideDown('slow');$('#desc36').slideUp('slow', function(){$('#desc36').val('0');});
$('#desc36').slideDown('slow');$('#stock36').slideUp('slow', function(){$('#stock36').val(ui.item.stock);});
$('#stock36').slideDown('slow');$('#precl36').slideUp('slow', function(){$('#precl36').val(ui.item.psd );
});$('#precl36').slideDown('slow');$('#iva36').slideUp('slow', function(){$('#iva36').val(ui.item.precio);
});$('#iva36').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod37').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des37').slideUp('slow', function() { $('#des37').val( ui.item.cod ); });

$('#des37').slideDown('slow');
$('#um37').slideUp('slow', function()
					   {
                            $('#um37').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um37').slideDown('slow');
$('#prec37').slideUp('slow', function(){ $('#prec37').val(ui.item.precio );});
$('#prec37').slideDown('slow'); $('#cant37').slideUp('slow', function(){$('#cant37').val('1');});
$('#cant37').slideDown('slow');$('#tot37').slideUp('slow', function(){$('#tot37').val(ui.item.psd);});
$('#tot37').slideDown('slow');$('#desc37').slideUp('slow', function(){$('#desc37').val('0');});
$('#desc37').slideDown('slow');$('#stock37').slideUp('slow', function(){$('#stock37').val(ui.item.stock);});
$('#stock37').slideDown('slow');$('#precl37').slideUp('slow', function(){$('#precl37').val(ui.item.psd );
});$('#precl37').slideDown('slow');$('#iva37').slideUp('slow', function(){$('#iva37').val(ui.item.precio);
});$('#iva37').slideDown('slow')}});});
//////////////////////////////
$(function(){
                $('#cod38').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des38').slideUp('slow', function() { $('#des38').val( ui.item.cod ); });
$('#des38').slideDown('slow');
$('#um38').slideUp('slow', function()
					   {
                            $('#um38').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um38').slideDown('slow');
$('#prec38').slideUp('slow', function(){ $('#prec38').val(ui.item.precio );});
$('#prec38').slideDown('slow'); $('#cant38').slideUp('slow', function(){$('#cant38').val('1');});
$('#cant38').slideDown('slow');$('#tot38').slideUp('slow', function(){$('#tot38').val(ui.item.psd);});
$('#tot38').slideDown('slow');$('#desc38').slideUp('slow', function(){$('#desc38').val('0');});
$('#desc38').slideDown('slow');$('#stock38').slideUp('slow', function(){$('#stock38').val(ui.item.stock);});
$('#stock38').slideDown('slow');$('#precl38').slideUp('slow', function(){$('#precl38').val(ui.item.psd );
});$('#precl38').slideDown('slow');$('#iva38').slideUp('slow', function(){$('#iva38').val(ui.item.precio);
});$('#iva38').slideDown('slow')}});});

//////////////////////////////
$(function(){
                $('#cod39').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des39').slideUp('slow', function() { $('#des39').val( ui.item.cod ); });
$('#des39').slideDown('slow');
$('#um39').slideUp('slow', function()
					   {
                            $('#um39').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um39').slideDown('slow');
$('#prec39').slideUp('slow', function(){ $('#prec39').val(ui.item.precio );});
$('#prec39').slideDown('slow'); $('#cant39').slideUp('slow', function(){$('#cant39').val('1');});
$('#cant39').slideDown('slow');$('#tot39').slideUp('slow', function(){$('#tot39').val(ui.item.psd);});
$('#tot39').slideDown('slow');$('#desc39').slideUp('slow', function(){$('#desc39').val('0');});
$('#desc39').slideDown('slow');$('#stock39').slideUp('slow', function(){$('#stock39').val(ui.item.stock);});
$('#stock39').slideDown('slow');$('#precl39').slideUp('slow', function(){$('#precl39').val(ui.item.psd );
});$('#precl39').slideDown('slow');$('#iva39').slideUp('slow', function(){$('#iva39').val(ui.item.precio);
});$('#iva39').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod40').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des40').slideUp('slow', function() { $('#des40').val( ui.item.cod ); });
$('#des40').slideDown('slow');
$('#um40').slideUp('slow', function()
					   {
                            $('#um40').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um40').slideDown('slow');
$('#prec40').slideUp('slow', function(){ $('#prec40').val(ui.item.precio );});
$('#prec40').slideDown('slow'); $('#cant40').slideUp('slow', function(){$('#cant40').val('1');});
$('#cant40').slideDown('slow');$('#tot40').slideUp('slow', function(){$('#tot40').val(ui.item.psd);});
$('#tot40').slideDown('slow');$('#desc40').slideUp('slow', function(){$('#desc40').val('0');});
$('#desc40').slideDown('slow');$('#stock40').slideUp('slow', function(){$('#stock40').val(ui.item.stock);});
$('#stock40').slideDown('slow');$('#precl40').slideUp('slow', function(){$('#precl40').val(ui.item.psd );
});$('#precl40').slideDown('slow');$('#iva40').slideUp('slow', function(){$('#iva40').val(ui.item.precio);
});$('#iva40').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod41').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des41').slideUp('slow', function() { $('#des41').val( ui.item.cod ); });
$('#des41').slideDown('slow');
$('#um41').slideUp('slow', function()
					   {
                            $('#um41').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um41').slideDown('slow');
$('#prec41').slideUp('slow', function(){ $('#prec41').val(ui.item.precio );});
$('#prec41').slideDown('slow'); $('#cant41').slideUp('slow', function(){$('#cant41').val('1');});
$('#cant41').slideDown('slow');$('#tot41').slideUp('slow', function(){$('#tot41').val(ui.item.psd);});
$('#tot41').slideDown('slow');$('#desc41').slideUp('slow', function(){$('#desc41').val('0');});
$('#desc41').slideDown('slow');$('#stock41').slideUp('slow', function(){$('#stock41').val(ui.item.stock);});
$('#stock41').slideDown('slow');$('#precl41').slideUp('slow', function(){$('#precl41').val(ui.item.psd );
});$('#precl41').slideDown('slow');$('#iva41').slideUp('slow', function(){$('#iva41').val(ui.item.precio);
});$('#iva41').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod42').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des42').slideUp('slow', function() { $('#des42').val( ui.item.cod ); });
$('#des42').slideDown('slow');
$('#um42').slideUp('slow', function()
					   {
                            $('#um42').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um42').slideDown('slow');
$('#prec42').slideUp('slow', function(){ $('#prec42').val(ui.item.precio );});
$('#prec42').slideDown('slow'); $('#cant42').slideUp('slow', function(){$('#cant42').val('1');});
$('#cant42').slideDown('slow');$('#tot42').slideUp('slow', function(){$('#tot42').val(ui.item.psd);});
$('#tot42').slideDown('slow');$('#desc42').slideUp('slow', function(){$('#desc42').val('0');});
$('#desc42').slideDown('slow');$('#stock42').slideUp('slow', function(){$('#stock42').val(ui.item.stock);});
$('#stock42').slideDown('slow');$('#precl42').slideUp('slow', function(){$('#precl42').val(ui.item.psd );
});$('#precl42').slideDown('slow');$('#iva42').slideUp('slow', function(){$('#iva42').val(ui.item.precio);
});$('#iva42').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod43').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des43').slideUp('slow', function() { $('#des43').val( ui.item.cod ); });
$('#des43').slideDown('slow');
$('#um43').slideUp('slow', function()
					   {
                            $('#um43').val(
                                 ui.item.ud
                            );
							
                       });

                       $('#um43').slideDown('slow');
$('#prec43').slideUp('slow', function(){ $('#prec43').val(ui.item.precio );});
$('#prec43').slideDown('slow'); $('#cant43').slideUp('slow', function(){$('#cant43').val('1');});
$('#cant43').slideDown('slow');$('#tot43').slideUp('slow', function(){$('#tot43').val(ui.item.psd);});
$('#tot43').slideDown('slow');$('#desc43').slideUp('slow', function(){$('#desc43').val('0');});
$('#desc43').slideDown('slow');$('#stock43').slideUp('slow', function(){$('#stock43').val(ui.item.stock);});
$('#stock43').slideDown('slow');$('#precl43').slideUp('slow', function(){$('#precl43').val(ui.item.psd );
});$('#precl43').slideDown('slow');$('#iva43').slideUp('slow', function(){$('#iva43').val(ui.item.precio);
});$('#iva43').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod44').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des44').slideUp('slow', function() { $('#des44').val( ui.item.cod ); });
$('#des44').slideDown('slow');
$('#um44').slideUp('slow', function()
					   {
                            $('#um44').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um44').slideDown('slow');
$('#prec44').slideUp('slow', function(){ $('#prec44').val(ui.item.precio );});
$('#prec44').slideDown('slow'); $('#cant44').slideUp('slow', function(){$('#cant44').val('1');});
$('#cant44').slideDown('slow');$('#tot44').slideUp('slow', function(){$('#tot44').val(ui.item.psd);});
$('#tot44').slideDown('slow');$('#desc44').slideUp('slow', function(){$('#desc44').val('0');});
$('#desc44').slideDown('slow');$('#stock44').slideUp('slow', function(){$('#stock44').val(ui.item.stock);});
$('#stock44').slideDown('slow');$('#precl44').slideUp('slow', function(){$('#precl44').val(ui.item.psd );
});$('#precl44').slideDown('slow');$('#iva44').slideUp('slow', function(){$('#iva44').val(ui.item.precio);
});$('#iva44').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod45').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des45').slideUp('slow', function() { $('#des45').val( ui.item.cod ); });
$('#des45').slideDown('slow');
$('#um45').slideUp('slow', function()
					   {
                            $('#um45').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um45').slideDown('slow');
$('#prec45').slideUp('slow', function(){ $('#prec45').val(ui.item.precio );});
$('#prec45').slideDown('slow'); $('#cant45').slideUp('slow', function(){$('#cant45').val('1');});
$('#cant45').slideDown('slow');$('#tot45').slideUp('slow', function(){$('#tot45').val(ui.item.psd);});
$('#tot45').slideDown('slow');$('#desc45').slideUp('slow', function(){$('#desc45').val('0');});
$('#desc45').slideDown('slow');$('#stock45').slideUp('slow', function(){$('#stock45').val(ui.item.stock);});
$('#stock45').slideDown('slow');$('#precl45').slideUp('slow', function(){$('#precl45').val(ui.item.psd );
});$('#precl45').slideDown('slow');$('#iva45').slideUp('slow', function(){$('#iva45').val(ui.item.precio);
});$('#iva45').slideDown('slow')}});});
//////////////////////////////
$(function(){
                $('#cod46').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des46').slideUp('slow', function() { $('#des46').val( ui.item.cod ); });
$('#des46').slideDown('slow');
$('#um46').slideUp('slow', function()
					   {
                            $('#um46').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um46').slideDown('slow');
$('#prec46').slideUp('slow', function(){ $('#prec46').val(ui.item.precio );});
$('#prec46').slideDown('slow'); $('#cant46').slideUp('slow', function(){$('#cant46').val('1');});
$('#cant46').slideDown('slow');$('#tot46').slideUp('slow', function(){$('#tot46').val(ui.item.psd);});
$('#tot46').slideDown('slow');$('#desc46').slideUp('slow', function(){$('#desc46').val('0');});
$('#desc46').slideDown('slow');$('#stock46').slideUp('slow', function(){$('#stock46').val(ui.item.stock);});
$('#stock46').slideDown('slow');$('#precl46').slideUp('slow', function(){$('#precl46').val(ui.item.psd );
});$('#precl46').slideDown('slow');$('#iva46').slideUp('slow', function(){$('#iva46').val(ui.item.precio);
});$('#iva46').slideDown('slow')}});});
//////////////////////////////
$(function(){
                $('#cod47').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des47').slideUp('slow', function() { $('#des47').val( ui.item.cod ); });
$('#des47').slideDown('slow');
$('#um47').slideUp('slow', function()
					   {
                            $('#um47').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um47').slideDown('slow');
$('#prec47').slideUp('slow', function(){ $('#prec47').val(ui.item.precio );});
$('#prec47').slideDown('slow'); $('#cant47').slideUp('slow', function(){$('#cant47').val('1');});
$('#cant47').slideDown('slow');$('#tot47').slideUp('slow', function(){$('#tot47').val(ui.item.psd);});
$('#tot47').slideDown('slow');$('#desc47').slideUp('slow', function(){$('#desc47').val('0');});
$('#desc47').slideDown('slow');$('#stock47').slideUp('slow', function(){$('#stock47').val(ui.item.stock);});
$('#stock47').slideDown('slow');$('#precl47').slideUp('slow', function(){$('#precl47').val(ui.item.psd );
});$('#precl47').slideDown('slow');$('#iva47').slideUp('slow', function(){$('#iva47').val(ui.item.precio);
});$('#iva47').slideDown('slow')}});});
//////////////////////////////
$(function(){
                $('#cod48').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des48').slideUp('slow', function() { $('#des48').val( ui.item.cod ); });
$('#des48').slideDown('slow');
$('#um48').slideUp('slow', function()
					   {
                            $('#um48').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um48').slideDown('slow');
$('#prec48').slideUp('slow', function(){ $('#prec48').val(ui.item.precio );});
$('#prec48').slideDown('slow'); $('#cant48').slideUp('slow', function(){$('#cant48').val('1');});
$('#cant48').slideDown('slow');$('#tot48').slideUp('slow', function(){$('#tot48').val(ui.item.psd);});
$('#tot48').slideDown('slow');$('#desc48').slideUp('slow', function(){$('#desc48').val('0');});
$('#desc48').slideDown('slow');$('#stock48').slideUp('slow', function(){$('#stock48').val(ui.item.stock);});
$('#stock48').slideDown('slow');$('#precl48').slideUp('slow', function(){$('#precl48').val(ui.item.psd );
});$('#precl48').slideDown('slow');$('#iva48').slideUp('slow', function(){$('#iva48').val(ui.item.precio);
});$('#iva48').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod49').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des49').slideUp('slow', function() { $('#des49').val( ui.item.cod ); });
$('#des49').slideDown('slow');
$('#um49').slideUp('slow', function()
					   {
                            $('#um49').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um49').slideDown('slow');
$('#prec49').slideUp('slow', function(){ $('#prec49').val(ui.item.precio );});
$('#prec49').slideDown('slow'); $('#cant49').slideUp('slow', function(){$('#cant49').val('1');});
$('#cant49').slideDown('slow');$('#tot49').slideUp('slow', function(){$('#tot49').val(ui.item.psd);});
$('#tot49').slideDown('slow');$('#desc49').slideUp('slow', function(){$('#desc49').val('0');});
$('#desc49').slideDown('slow');$('#stock49').slideUp('slow', function(){$('#stock49').val(ui.item.stock);});
$('#stock49').slideDown('slow');$('#precl49').slideUp('slow', function(){$('#precl49').val(ui.item.precio );
});$('#precl49').slideDown('slow');$('#iva49').slideUp('slow', function(){$('#iva49').val(ui.item.precio);
});$('#iva49').slideDown('slow')}});});	

//////////////////////////////
$(function(){
                $('#cod50').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des50').slideUp('slow', function() { $('#des50').val( ui.item.cod ); });
$('#des50').slideDown('slow');
$('#um50').slideUp('slow', function()
					   {
                            $('#um50').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um50').slideDown('slow');
$('#prec50').slideUp('slow', function(){ $('#prec50').val(ui.item.precio );});
$('#prec50').slideDown('slow'); $('#cant50').slideUp('slow', function(){$('#cant50').val('1');});
$('#cant50').slideDown('slow');$('#tot50').slideUp('slow', function(){$('#tot50').val(ui.item.psd);});
$('#tot50').slideDown('slow');$('#desc50').slideUp('slow', function(){$('#desc50').val('0');});
$('#desc50').slideDown('slow');$('#stock50').slideUp('slow', function(){$('#stock50').val(ui.item.stock);});
$('#stock50').slideDown('slow');$('#precl50').slideUp('slow', function(){$('#precl50').val(ui.item.psd );
});$('#precl50').slideDown('slow');$('#iva50').slideUp('slow', function(){$('#iva50').val(ui.item.precio);
});$('#iva50').slideDown('slow')}});});		
///// aque e

$(function(){
                $('#cod51').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
				   function(event, ui)
				   {
                       $('#des51').slideUp('slow', function()
					   {
                            $('#des51').val(
                                 ui.item.cod 
                            );
							
                       });
                       $('#des51').slideDown('slow');
					   					   
					   $('#prec51').slideUp('slow', function()
					   {
                            $('#prec51').val(
                                 ui.item.precio 
                            );
							
                       });
                       $('#prec51').slideDown('slow');
					   $('#um51').slideUp('slow', function()
					   {
                            $('#um51').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um51').slideDown('slow');
					   
					   $('#cant51').slideUp('slow', function()
					   {
                            $('#cant51').val(
                                '1' 
                            );
							
                       });
                       $('#cant51').slideDown('slow');
					   
					   $('#tot51').slideUp('slow', function()
					   {
                            $('#tot51').val(
                               ui.item.psd   
                            );	
                       });
                       $('#tot51').slideDown('slow');
					    $('#desc51').slideUp('slow', function()
					   {
                            $('#desc1').val(
                                '0' 
                            );		
                       });
                       $('#desc51').slideDown('slow');
					   $('#stock51').slideUp('slow', function()
					   {
                            $('#stock1').val(
                               ui.item.stock
                            );		
                       });
                       $('#stock51').slideDown('slow');
					   $('#precl51').slideUp('slow', function(){$('#precl51').val(ui.item.precio );
});$('#precl51').slideDown('slow');$('#iva51').slideUp('slow', function(){$('#iva51').val(ui.item.precio);
});$('#iva51').slideDown('slow')
                   }     
                 });
				 
            });		
$(function(){
                $('#cod52').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des52').slideUp('slow', function() { $('#des52').val( ui.item.cod ); });
$('#des52').slideDown('slow');
	   $('#um52').slideUp('slow', function()
					   {
                            $('#um52').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um52').slideDown('slow');
$('#prec52').slideUp('slow', function(){ $('#prec52').val(ui.item.precio );});
$('#prec52').slideDown('slow'); $('#cant52').slideUp('slow', function(){$('#cant52').val('1');});
$('#cant52').slideDown('slow');$('#tot52').slideUp('slow', function(){$('#tot52').val(ui.item.psd);});
$('#tot52').slideDown('slow');$('#desc52').slideUp('slow', function(){$('#desc52').val('0');});
$('#desc52').slideDown('slow');$('#stock52').slideUp('slow', function(){$('#stock52').val(ui.item.stock);});
$('#stock52').slideDown('slow');$('#precl52').slideUp('slow', function(){$('#precl52').val(ui.item.psd );
});$('#precl52').slideDown('slow');$('#iva52').slideUp('slow', function(){$('#iva52').val(ui.item.precio);
});$('#iva52').slideDown('slow');}});});	
//////////////////////////////
$(function(){
                $('#cod53').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des53').slideUp('slow', function() { $('#des53').val( ui.item.cod ); });
$('#des53').slideDown('slow');
	   $('#um53').slideUp('slow', function()
					   {
                            $('#um53').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um53').slideDown('slow');
$('#prec53').slideUp('slow', function(){ $('#prec53').val(ui.item.precio );});
$('#prec53').slideDown('slow'); $('#cant53').slideUp('slow', function(){$('#cant53').val('1');});
$('#cant53').slideDown('slow');$('#tot53').slideUp('slow', function(){$('#tot53').val(ui.item.psd);});
$('#tot53').slideDown('slow');$('#desc53').slideUp('slow', function(){$('#desc53').val('0');});
$('#desc53').slideDown('slow');$('#stock53').slideUp('slow', function(){$('#stock53').val(ui.item.stock);});
$('#stock53').slideDown('slow');$('#precl53').slideUp('slow', function(){$('#precl53').val(ui.item.psd );
});$('#precl53').slideDown('slow');$('#iva53').slideUp('slow', function(){$('#iva53').val(ui.item.precio);
});$('#iva53').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod54').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des54').slideUp('slow', function() { $('#des54').val( ui.item.cod ); });
$('#des54').slideDown('slow');
	   $('#um54').slideUp('slow', function()
					   {
                            $('#um54').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um54').slideDown('slow');
$('#prec54').slideUp('slow', function(){ $('#prec54').val(ui.item.precio );});
$('#prec54').slideDown('slow'); $('#cant54').slideUp('slow', function(){$('#cant54').val('1');});
$('#cant54').slideDown('slow');$('#tot54').slideUp('slow', function(){$('#tot54').val(ui.item.psd);});
$('#tot54').slideDown('slow');$('#desc54').slideUp('slow', function(){$('#desc54').val('0');});
$('#desc54').slideDown('slow');$('#stock54').slideUp('slow', function(){$('#stock54').val(ui.item.stock);});
$('#stock54').slideDown('slow');$('#precl54').slideUp('slow', function(){$('#precl54').val(ui.item.psd );
});$('#precl54').slideDown('slow');$('#iva54').slideUp('slow', function(){$('#iva54').val(ui.item.precio);
});$('#iva54').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod55').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des55').slideUp('slow', function() { $('#des55').val( ui.item.cod ); });
$('#des55').slideDown('slow');
	   $('#um55').slideUp('slow', function()
					   {
                            $('#um55').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um55').slideDown('slow');
$('#prec55').slideUp('slow', function(){ $('#prec55').val(ui.item.precio );});
$('#prec55').slideDown('slow'); $('#cant55').slideUp('slow', function(){$('#cant55').val('1');});
$('#cant55').slideDown('slow');$('#tot55').slideUp('slow', function(){$('#tot55').val(ui.item.psd);});
$('#tot55').slideDown('slow');$('#desc55').slideUp('slow', function(){$('#desc55').val('0');});
$('#desc55').slideDown('slow');$('#stock55').slideUp('slow', function(){$('#stock55').val(ui.item.stock);});
$('#stock55').slideDown('slow');$('#precl55').slideUp('slow', function(){$('#precl55').val(ui.item.psd );
});$('#precl55').slideDown('slow');$('#iva55').slideUp('slow', function(){$('#iva55').val(ui.item.precio);
});$('#iva55').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod56').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des56').slideUp('slow', function() { $('#des56').val( ui.item.cod ); });
$('#des56').slideDown('slow');
	   $('#um656').slideUp('slow', function()
					   {
                            $('#um56').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um56').slideDown('slow');
$('#prec56').slideUp('slow', function(){ $('#prec56').val(ui.item.precio );});
$('#prec56').slideDown('slow'); $('#cant56').slideUp('slow', function(){$('#cant56').val('1');});
$('#cant56').slideDown('slow');$('#tot56').slideUp('slow', function(){$('#tot56').val(ui.item.psd);});
$('#tot56').slideDown('slow');$('#desc56').slideUp('slow', function(){$('#desc56').val('0');});
$('#desc56').slideDown('slow');$('#stock56').slideUp('slow', function(){$('#stock56').val(ui.item.stock);});
$('#stock56').slideDown('slow');$('#precl56').slideUp('slow', function(){$('#precl56').val(ui.item.psd );
});$('#precl56').slideDown('slow');$('#iva56').slideUp('slow', function(){$('#iva56').val(ui.item.precio);
});$('#iva56').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod57').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des57').slideUp('slow', function() { $('#des57').val( ui.item.cod ); });
$('#des57').slideDown('slow');
	   $('#um57').slideUp('slow', function()
					   {
                            $('#um57').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um57').slideDown('slow');
$('#prec57').slideUp('slow', function(){ $('#prec57').val(ui.item.precio );});
$('#prec57').slideDown('slow'); $('#cant57').slideUp('slow', function(){$('#cant57').val('1');});
$('#cant57').slideDown('slow');$('#tot57').slideUp('slow', function(){$('#tot57').val(ui.item.psd);});
$('#tot57').slideDown('slow');$('#desc57').slideUp('slow', function(){$('#desc57').val('0');});
$('#desc57').slideDown('slow');$('#stock57').slideUp('slow', function(){$('#stock57').val(ui.item.stock);});
$('#stock57').slideDown('slow');$('#precl57').slideUp('slow', function(){$('#precl57').val(ui.item.psd );
});$('#precl57').slideDown('slow');$('#iva57').slideUp('slow', function(){$('#iva57').val(ui.item.precio);
});$('#iva57').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod58').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des58').slideUp('slow', function() { $('#des58').val( ui.item.cod ); });
$('#des58').slideDown('slow');
	   $('#um58').slideUp('slow', function()
					   {
                            $('#um58').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um58').slideDown('slow');
$('#prec58').slideUp('slow', function(){ $('#prec58').val(ui.item.precio );});
$('#prec58').slideDown('slow'); $('#cant58').slideUp('slow', function(){$('#cant58').val('1');});
$('#cant58').slideDown('slow');$('#tot58').slideUp('slow', function(){$('#tot58').val(ui.item.psd);});
$('#tot58').slideDown('slow');$('#desc58').slideUp('slow', function(){$('#desc58').val('0');});
$('#desc58').slideDown('slow');$('#stock58').slideUp('slow', function(){$('#stock58').val(ui.item.stock);});
$('#stock58').slideDown('slow');$('#precl58').slideUp('slow', function(){$('#precl58').val(ui.item.psd );
});$('#precl58').slideDown('slow');$('#iva58').slideUp('slow', function(){$('#iva58').val(ui.item.precio);
});$('#iva58').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod59').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des59').slideUp('slow', function() { $('#des59').val( ui.item.cod ); });
$('#des59').slideDown('slow');
	   $('#um59').slideUp('slow', function()
					   {
                            $('#um59').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um59').slideDown('slow');
$('#prec59').slideUp('slow', function(){ $('#prec59').val(ui.item.precio );});
$('#prec59').slideDown('slow'); $('#cant59').slideUp('slow', function(){$('#cant59').val('1');});
$('#cant59').slideDown('slow');$('#tot59').slideUp('slow', function(){$('#tot59').val(ui.item.psd);});

$('#tot59').slideDown('slow');$('#desc59').slideUp('slow', function(){$('#desc59').val('0');});
$('#desc59').slideDown('slow');$('#stock59').slideUp('slow', function(){$('#stock59').val(ui.item.stock);});
$('#stock59').slideDown('slow');$('#precl59').slideUp('slow', function(){$('#precl59').val(ui.item.psd);
});$('#precl59').slideDown('slow');$('#iva59').slideUp('slow', function(){$('#iva59').val(ui.item.precio);
});$('#iva59').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod60').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des60').slideUp('slow', function() { $('#des60').val( ui.item.cod ); });
$('#des60').slideDown('slow');
	   $('#um60').slideUp('slow', function()
					   {
                            $('#um60').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um60').slideDown('slow');
$('#prec60').slideUp('slow', function(){ $('#prec60').val(ui.item.precio );});
$('#prec60').slideDown('slow'); $('#cant60').slideUp('slow', function(){$('#cant60').val('1');});
$('#cant60').slideDown('slow');$('#tot60').slideUp('slow', function(){$('#tot60').val(ui.item.psd);});
$('#tot60').slideDown('slow');$('#desc60').slideUp('slow', function(){$('#desc60').val('0');});
$('#desc60').slideDown('slow');$('#stock60').slideUp('slow', function(){$('#stock60').val(ui.item.stock);});
$('#stock60').slideDown('slow');$('#precl60').slideUp('slow', function(){$('#precl60').val(ui.item.psd );
});$('#precl60').slideDown('slow');$('#iva60').slideUp('slow', function(){$('#iva60').val(ui.item.precio);
});$('#iva60').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod61').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des61').slideUp('slow', function() { $('#des61').val( ui.item.cod ); });
$('#des61').slideDown('slow');
	   $('#um61').slideUp('slow', function()
					   {
                            $('#um61').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um61').slideDown('slow');
$('#prec61').slideUp('slow', function(){ $('#prec61').val(ui.item.precio );});
$('#prec61').slideDown('slow'); $('#cant61').slideUp('slow', function(){$('#cant61').val('1');});
$('#cant61').slideDown('slow');$('#tot61').slideUp('slow', function(){$('#tot61').val(ui.item.psd);});
$('#tot61').slideDown('slow');$('#desc61').slideUp('slow', function(){$('#desc61').val('0');});
$('#desc61').slideDown('slow');$('#stock61').slideUp('slow', function(){$('#stock61').val(ui.item.stock);});
$('#stock61').slideDown('slow');$('#precl61').slideUp('slow', function(){$('#precl61').val(ui.item.psd);
});$('#precl61').slideDown('slow');$('#iva61').slideUp('slow', function(){$('#iva61').val(ui.item.precio);
});$('#iva61').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod62').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des62').slideUp('slow', function() { $('#des62').val( ui.item.cod ); });
$('#des62').slideDown('slow');
	   $('#um61').slideUp('slow', function()
					   {
                            $('#um62').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um62').slideDown('slow');
$('#prec62').slideUp('slow', function(){ $('#prec62').val(ui.item.precio );});
$('#prec62').slideDown('slow'); $('#cant62').slideUp('slow', function(){$('#cant62').val('1');});
$('#cant62').slideDown('slow');$('#tot62').slideUp('slow', function(){$('#tot62').val(ui.item.psd);});
$('#tot62').slideDown('slow');$('#desc62').slideUp('slow', function(){$('#desc62').val('0');});
$('#desc62').slideDown('slow');$('#stock62').slideUp('slow', function(){$('#stock62').val(ui.item.stock);});
$('#stock62').slideDown('slow');$('#precl62').slideUp('slow', function(){$('#precl62').val(ui.item.psd );
});$('#precl62').slideDown('slow');$('#iva62').slideUp('slow', function(){$('#iva62').val(ui.item.precio);
});$('#iva62').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod63').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des63').slideUp('slow', function() { $('#des63').val( ui.item.cod ); });
$('#des63').slideDown('slow');
	   $('#um63').slideUp('slow', function()
					   {
                            $('#um63').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um63').slideDown('slow');
$('#prec63').slideUp('slow', function(){ $('#prec63').val(ui.item.precio );});
$('#prec63').slideDown('slow'); $('#cant63').slideUp('slow', function(){$('#cant63').val('1');});
$('#cant63').slideDown('slow');$('#tot63').slideUp('slow', function(){$('#tot63').val(ui.item.psd);});
$('#tot63').slideDown('slow');$('#desc63').slideUp('slow', function(){$('#desc63').val('0');});
$('#desc63').slideDown('slow');$('#stock63').slideUp('slow', function(){$('#stock63').val(ui.item.stock);});
$('#stock63').slideDown('slow');$('#precl63').slideUp('slow', function(){$('#precl63').val(ui.item.psd );
});$('#precl63').slideDown('slow');$('#iva63').slideUp('slow', function(){$('#iva63').val(ui.item.precio);
});$('#iva63').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod64').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des64').slideUp('slow', function() { $('#des64').val( ui.item.cod ); });
$('#des64').slideDown('slow');
	   $('#um64').slideUp('slow', function()
					   {
                            $('#um64').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um64').slideDown('slow');
$('#prec64').slideUp('slow', function(){ $('#prec64').val(ui.item.precio );});
$('#prec64').slideDown('slow'); $('#cant64').slideUp('slow', function(){$('#cant64').val('1');});
$('#cant64').slideDown('slow');$('#tot64').slideUp('slow', function(){$('#tot64').val(ui.item.psd);});
$('#tot64').slideDown('slow');$('#desc64').slideUp('slow', function(){$('#desc64').val('0');});
$('#desc64').slideDown('slow');$('#stock64').slideUp('slow', function(){$('#stock64').val(ui.item.stock);});
$('#stock64').slideDown('slow');$('#precl64').slideUp('slow', function(){$('#precl64').val(ui.item.psd );
});$('#precl64').slideDown('slow');$('#iva64').slideUp('slow', function(){$('#iva64').val(ui.item.precio);
});$('#iva64').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod65').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des65').slideUp('slow', function() { $('#des65').val( ui.item.cod ); });
$('#des65').slideDown('slow');
	   $('#um65').slideUp('slow', function()
					   {
                            $('#um65').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um65').slideDown('slow');
$('#prec65').slideUp('slow', function(){ $('#prec65').val(ui.item.precio );});
$('#prec65').slideDown('slow'); $('#cant65').slideUp('slow', function(){$('#cant65').val('1');});
$('#cant65').slideDown('slow');$('#tot65').slideUp('slow', function(){$('#tot65').val(ui.item.psd);});
$('#tot65').slideDown('slow');$('#desc65').slideUp('slow', function(){$('#desc65').val('0');});
$('#desc65').slideDown('slow');$('#stock65').slideUp('slow', function(){$('#stock65').val(ui.item.stock);});
$('#stock65').slideDown('slow');$('#precl65').slideUp('slow', function(){$('#precl65').val(ui.item.psd );
});$('#precl65').slideDown('slow');$('#iva65').slideUp('slow', function(){$('#iva65').val(ui.item.precio);
});$('#iva65').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod66').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des66').slideUp('slow', function() { $('#des66').val( ui.item.cod ); });
$('#des66').slideDown('slow');
	   $('#um66').slideUp('slow', function()
					   {
                            $('#um66').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um66').slideDown('slow');
$('#prec66').slideUp('slow', function(){ $('#prec66').val(ui.item.precio );});
$('#prec66').slideDown('slow'); $('#cant66').slideUp('slow', function(){$('#cant66').val('1');});
$('#cant66').slideDown('slow');$('#tot66').slideUp('slow', function(){$('#tot66').val(ui.item.psd);});
$('#tot66').slideDown('slow');$('#desc66').slideUp('slow', function(){$('#desc66').val('0');});
$('#desc66').slideDown('slow');$('#stock66').slideUp('slow', function(){$('#stock66').val(ui.item.stock);});
$('#stock66').slideDown('slow');$('#precl66').slideUp('slow', function(){$('#precl66').val(ui.item.psd );
});$('#precl66').slideDown('slow');$('#iva66').slideUp('slow', function(){$('#iva66').val(ui.item.precio);
});$('#iva66').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod67').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des67').slideUp('slow', function() { $('#des67').val( ui.item.cod ); });
$('#des67').slideDown('slow');
	   $('#um67').slideUp('slow', function()
					   {
                            $('#um67').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um67').slideDown('slow');
$('#prec67').slideUp('slow', function(){ $('#prec67').val(ui.item.precio );});
$('#prec67').slideDown('slow'); $('#cant67').slideUp('slow', function(){$('#cant67').val('1');});
$('#cant67').slideDown('slow');$('#tot67').slideUp('slow', function(){$('#tot67').val(ui.item.psd);});
$('#tot67').slideDown('slow');$('#desc67').slideUp('slow', function(){$('#desc67').val('0');});
$('#desc67').slideDown('slow');$('#stock67').slideUp('slow', function(){$('#stock67').val(ui.item.stock);});
$('#stock67').slideDown('slow');$('#precl67').slideUp('slow', function(){$('#precl67').val(ui.item.psd );
});$('#precl67').slideDown('slow');$('#iva67').slideUp('slow', function(){$('#iva67').val(ui.item.precio);
});$('#iva67').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod68').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des68').slideUp('slow', function() { $('#des68').val( ui.item.cod ); });
$('#des68').slideDown('slow');
	   $('#um68').slideUp('slow', function()
					   {
                            $('#um68').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um68').slideDown('slow');
$('#prec68').slideUp('slow', function(){ $('#prec68').val(ui.item.precio );});
$('#prec68').slideDown('slow'); $('#cant68').slideUp('slow', function(){$('#cant68').val('1');});
$('#cant68').slideDown('slow');$('#tot68').slideUp('slow', function(){$('#tot68').val(ui.item.psd);});
$('#tot68').slideDown('slow');$('#desc68').slideUp('slow', function(){$('#desc68').val('0');});
$('#desc68').slideDown('slow');$('#stock68').slideUp('slow', function(){$('#stock68').val(ui.item.stock);});
$('#stock68').slideDown('slow');$('#precl68').slideUp('slow', function(){$('#precl68').val(ui.item.psd );
});$('#precl68').slideDown('slow');$('#iva68').slideUp('slow', function(){$('#iva68').val(ui.item.precio);
});$('#iva68').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod69').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des69').slideUp('slow', function() { $('#des69').val( ui.item.cod ); });
$('#des69').slideDown('slow');
	   $('#um69').slideUp('slow', function()
					   {
                            $('#um69').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um69').slideDown('slow');
$('#prec69').slideUp('slow', function(){ $('#prec69').val(ui.item.precio );});
$('#prec69').slideDown('slow'); $('#cant69').slideUp('slow', function(){$('#cant69').val('1');});
$('#cant69').slideDown('slow');$('#tot69').slideUp('slow', function(){$('#tot69').val(ui.item.psd);});
$('#tot69').slideDown('slow');$('#desc69').slideUp('slow', function(){$('#desc69').val('0');});
$('#desc69').slideDown('slow');$('#stock69').slideUp('slow', function(){$('#stock69').val(ui.item.stock);});
$('#stock69').slideDown('slow');$('#precl69').slideUp('slow', function(){$('#precl69').val(ui.item.psd );
});$('#precl69').slideDown('slow');$('#iva69').slideUp('slow', function(){$('#iva69').val(ui.item.precio);
});$('#iva69').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod70').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des70').slideUp('slow', function() { $('#des70').val( ui.item.cod ); });
$('#des70').slideDown('slow');
	   $('#um70').slideUp('slow', function()
					   {
                            $('#um70').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um70').slideDown('slow');
$('#prec70').slideUp('slow', function(){ $('#prec70').val(ui.item.precio );});
$('#prec70').slideDown('slow'); $('#cant70').slideUp('slow', function(){$('#cant70').val('1');});
$('#cant70').slideDown('slow');$('#tot70').slideUp('slow', function(){$('#tot70').val(ui.item.psd);});
$('#tot70').slideDown('slow');$('#desc70').slideUp('slow', function(){$('#desc70').val('0');});
$('#desc70').slideDown('slow');$('#stock70').slideUp('slow', function(){$('#stock70').val(ui.item.stock);});
$('#stock70').slideDown('slow');$('#precl70').slideUp('slow', function(){$('#precl70').val(ui.item.psd );
});$('#precl70').slideDown('slow');$('#iva70').slideUp('slow', function(){$('#iva70').val(ui.item.precio);
});$('#iva70').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod71').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des71').slideUp('slow', function() { $('#des71').val( ui.item.cod ); });
$('#des71').slideDown('slow');
	   $('#um71').slideUp('slow', function()
					   {
                            $('#um71').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um71').slideDown('slow');
$('#prec71').slideUp('slow', function(){ $('#prec71').val(ui.item.precio );});
$('#prec71').slideDown('slow'); $('#cant71').slideUp('slow', function(){$('#cant71').val('1');});
$('#cant71').slideDown('slow');$('#tot71').slideUp('slow', function(){$('#tot71').val(ui.item.psd);});
$('#tot71').slideDown('slow');$('#desc71').slideUp('slow', function(){$('#desc71').val('0');});
$('#desc71').slideDown('slow');$('#stock71').slideUp('slow', function(){$('#stock71').val(ui.item.stock);});
$('#stock71').slideDown('slow');$('#precl71').slideUp('slow', function(){$('#precl71').val(ui.item.psd );
});$('#precl71').slideDown('slow');$('#iva71').slideUp('slow', function(){$('#iva71').val(ui.item.precio);
});$('#iva71').slideDown('slow')}});});		
//////////////////////////////
$(function(){
                $('#cod72').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des72').slideUp('slow', function() { $('#des72').val( ui.item.cod ); });
$('#des72').slideDown('slow');
	   $('#um72').slideUp('slow', function()
					   {
                            $('#um72').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um72').slideDown('slow');
$('#prec72').slideUp('slow', function(){ $('#prec72').val(ui.item.precio );});
$('#prec72').slideDown('slow'); $('#cant72').slideUp('slow', function(){$('#cant72').val('1');});
$('#cant72').slideDown('slow');$('#tot72').slideUp('slow', function(){$('#tot72').val(ui.item.psd);});
$('#tot72').slideDown('slow');$('#desc72').slideUp('slow', function(){$('#desc72').val('0');});
$('#desc72').slideDown('slow');$('#stock72').slideUp('slow', function(){$('#stock72').val(ui.item.stock);});
$('#stock72').slideDown('slow');$('#precl72').slideUp('slow', function(){$('#precl72').val(ui.item.psd );
});$('#precl72').slideDown('slow');$('#iva72').slideUp('slow', function(){$('#iva72').val(ui.item.precio);
});$('#iva72').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod73').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des73').slideUp('slow', function() { $('#des73').val( ui.item.cod ); });
$('#des73').slideDown('slow');
	   $('#um73').slideUp('slow', function()
					   {
                            $('#um73').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um73').slideDown('slow');
$('#prec73').slideUp('slow', function(){ $('#prec73').val(ui.item.precio );});
$('#prec73').slideDown('slow'); $('#cant73').slideUp('slow', function(){$('#cant73').val('1');});
$('#cant73').slideDown('slow');$('#tot73').slideUp('slow', function(){$('#tot73').val(ui.item.psd);});
$('#tot73').slideDown('slow');$('#desc73').slideUp('slow', function(){$('#desc73').val('0');});
$('#desc73').slideDown('slow');$('#stock73').slideUp('slow', function(){$('#stock73').val(ui.item.stock);});
$('#stock73').slideDown('slow');$('#precl73').slideUp('slow', function(){$('#precl73').val(ui.item.psd );
});$('#precl73').slideDown('slow');$('#iva73').slideUp('slow', function(){$('#iva73').val(ui.item.precio);
});$('#iva73').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod74').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des74').slideUp('slow', function() { $('#des74').val( ui.item.cod ); });
$('#des74').slideDown('slow');
	   $('#um74').slideUp('slow', function()
					   {
                            $('#um74').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um74').slideDown('slow');
$('#prec74').slideUp('slow', function(){ $('#prec74').val(ui.item.precio );});
$('#prec74').slideDown('slow'); $('#cant74').slideUp('slow', function(){$('#cant74').val('1');});
$('#cant74').slideDown('slow');$('#tot74').slideUp('slow', function(){$('#tot74').val(ui.item.psd);});
$('#tot74').slideDown('slow');$('#desc74').slideUp('slow', function(){$('#desc74').val('0');});
$('#desc74').slideDown('slow');$('#stock74').slideUp('slow', function(){$('#stock74').val(ui.item.stock);});
$('#stock74').slideDown('slow');$('#precl74').slideUp('slow', function(){$('#precl74').val(ui.item.psd );
});$('#precl74').slideDown('slow');$('#iva74').slideUp('slow', function(){$('#iva74').val(ui.item.precio);
});$('#iva74').slideDown('slow')}});});	
//////////////////////////////
$(function(){
                $('#cod75').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des75').slideUp('slow', function() { $('#des75').val( ui.item.cod ); });
$('#des75').slideDown('slow');
	   $('#um75').slideUp('slow', function()
					   {
                            $('#um75').val(
                                 ui.item.ud
                            );
							
                       });
                       $('#um75').slideDown('slow');
$('#prec75').slideUp('slow', function(){ $('#prec75').val(ui.item.precio );});
$('#prec75').slideDown('slow'); $('#cant75').slideUp('slow', function(){$('#cant75').val('1');});
$('#cant75').slideDown('slow');$('#tot75').slideUp('slow', function(){$('#tot75').val(ui.item.psd);});
$('#tot75').slideDown('slow');$('#desc75').slideUp('slow', function(){$('#desc75').val('0');});
$('#desc75').slideDown('slow');$('#stock75').slideUp('slow', function(){$('#stock75').val(ui.item.stock);});
$('#stock75').slideDown('slow');$('#precl75').slideUp('slow', function(){$('#precl75').val(ui.item.psd );
});$('#precl75').slideDown('slow');$('#iva75').slideUp('slow', function(){$('#iva75').val(ui.item.precio);
});$('#iva75').slideDown('slow')}});});	

function mostrar()
{
	popup = document.getElementById('popup');	
	popup.style.display = "";
}

function cerrar()
{
	popup = document.getElementById('popup');	
	popup.style.display = "none";
}

function dialog_submit(val)
{
document.getElementById('txt_descripciong').value = val;
}


////////////

 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus                                         
      //comprobamos si se pulsa una tecla
      $("#des1").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des1").val();
                                      
             //hace la búsqueda
             $("#resultado1").delay(1000).queue(function(n) {      
                                           
                  $("#resultado1").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado1").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                         
});  

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des2").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des2").val();
                                      
             //hace la búsqueda
             $("#resultado2").delay(1000).queue(function(n) {      
                                           
                  $("#resultado2").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado2").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});  
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des3").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des3").val();
                                      
             //hace la búsqueda
             $("#resultado3").delay(1000).queue(function(n) {      
                                           
                  $("#resultado3").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado3").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });  
	                            
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des4").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des4").val();
                                      
             //hace la búsqueda
             $("#resultado4").delay(1000).queue(function(n) {      
                                           
                  $("#resultado4").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado4").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                     
});      

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#des5").blur(function(e){
             //obtenemos el texto introducido en el campo
              if($("#des5").val() == "")
			 {
             consulta = 'Espera';
			 }
			 else
			 {
			  consulta = $("#des5").val();
			 }
                                      
             //hace la búsqueda
             $("#resultado5").delay(1000).queue(function(n) {      
                                           
                  $("#resultado5").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado5").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });   
	  
               
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                        
      //comprobamos si se pulsa una tecla
      $("#des6").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des6").val();
                                      
             //hace la búsqueda
             $("#resultado6").delay(1000).queue(function(n) {      
                                           
                  $("#resultado6").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado6").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                      
});   

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des7").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des7").val();
                                      
             //hace la búsqueda
             $("#resultado7").delay(1000).queue(function(n) {      
                                           
                  $("#resultado7").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado7").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 



  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des8").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des8").val();
                                      
             //hace la búsqueda
             $("#resultado8").delay(1000).queue(function(n) {      
                                           
                  $("#resultado8").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado8").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#des9").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des9").val();
                                      
             //hace la búsqueda
             $("#resultado9").delay(1000).queue(function(n) {      
                                           
                  $("#resultado9").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado9").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                     
}); 


  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des10").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des10").val();
                                      
             //hace la búsqueda
             $("#resultado10").delay(1000).queue(function(n) {      
                                           
                  $("#resultado10").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado10").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#des11").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des11").val();
                                      
             //hace la búsqueda
             $("#resultado11").delay(1000).queue(function(n) {      
                                           
                  $("#resultado11").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado11").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                                                 
      //comprobamos si se pulsa una tecla
      $("#des12").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des12").val();
                                      
             //hace la búsqueda
             $("#resultado12").delay(1000).queue(function(n) {      
                                           
                  $("#resultado12").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado12").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
	  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                               
      //comprobamos si se pulsa una tecla
      $("#des13").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des13").val();
                                      
             //hace la búsqueda
             $("#resultado13").delay(1000).queue(function(n) {      
                                           
                  $("#resultado13").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado13").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des14").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des13").val();
                                      
             //hace la búsqueda
             $("#resultado14").delay(1000).queue(function(n) {      
                                           
                  $("#resultado14").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado14").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });            
	           
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#des15").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des15").val();
                                      
             //hace la búsqueda
             $("#resultado15").delay(1000).queue(function(n) {      
                                           
                  $("#resultado15").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado15").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des16").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des16").val();
                                      
             //hace la búsqueda
             $("#resultado16").delay(1000).queue(function(n) {      
                                           
                  $("#resultado16").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado16").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des17").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des17").val();
                                      
             //hace la búsqueda
             $("#resultado17").delay(1000).queue(function(n) {      
                                           
                  $("#resultado17").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado17").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des18").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des18").val();
                                      
             //hace la búsqueda
             $("#resultado18").delay(1000).queue(function(n) {      
                                           
                  $("#resultado18").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado18").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des19").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des19").val();
                                      
             //hace la búsqueda
             $("#resultado19").delay(1000).queue(function(n) {      
                                           
                  $("#resultado19").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado19").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des20").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des20").val();
                                      
             //hace la búsqueda
             $("#resultado20").delay(1000).queue(function(n) {      
                                           
                  $("#resultado20").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado20").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
                        
      //comprobamos si se pulsa una tecla
      $("#des21").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des21").val();
                                      
             //hace la búsqueda
             $("#resultado21").delay(1000).queue(function(n) {      
                                           
                  $("#resultado21").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado21").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#des22").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des22").val();
                                      
             //hace la búsqueda
             $("#resultado22").delay(1000).queue(function(n) {      
                                           
                  $("#resultado22").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado22").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                     
      //comprobamos si se pulsa una tecla
      $("#des23").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des23").val();
                                      
             //hace la búsqueda
             $("#resultado23").delay(1000).queue(function(n) {      
                                           
                  $("#resultado23").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado23").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des24").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des24").val();
                                      
             //hace la búsqueda
             $("#resultado24").delay(1000).queue(function(n) {      
                                           
                  $("#resultado24").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado24").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des25").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des25").val();
                                      
             //hace la búsqueda
             $("#resultado25").delay(1000).queue(function(n) {      
                                           
                  $("#resultado25").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado25").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#des26").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des26").val();
                                      
             //hace la búsqueda
             $("#resultado26").delay(1000).queue(function(n) {      
                                           
                  $("#resultado26").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado26").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                    
      //comprobamos si se pulsa una tecla
      $("#des27").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des27").val();
                                      
             //hace la búsqueda
             $("#resultado27").delay(1000).queue(function(n) {      
                                           
                  $("#resultado27").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado27").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des28").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des28").val();
                                      
             //hace la búsqueda
             $("#resultado28").delay(1000).queue(function(n) {      
                                           
                  $("#resultado28").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado28").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des29").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des29").val();
                                      
             //hace la búsqueda
             $("#resultado29").delay(1000).queue(function(n) {      
                                           
                  $("#resultado29").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado29").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});


 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des30").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des30").val();
                                      
             //hace la búsqueda
             $("#resultado30").delay(1000).queue(function(n) {      
                                           
                  $("#resultado30").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado30").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

////////////

 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus                                         
      //comprobamos si se pulsa una tecla
      $("#des31").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des31").val();
                                      
             //hace la búsqueda
             $("#resultado31").delay(1000).queue(function(n) {      
                                           
                  $("#resultado31").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado31").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                         
});  

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des32").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des32").val();
                                      
             //hace la búsqueda
             $("#resultado32").delay(1000).queue(function(n) {      
                                           
                  $("#resultado32").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado32").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});  
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                                                 
      //comprobamos si se pulsa una tecla
      $("#des33").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des33").val();
                                      
             //hace la búsqueda
             $("#resultado33").delay(1000).queue(function(n) {      
                                           
                  $("#resultado33").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado33").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });  
	                            
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des34").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des34").val();
                                      
             //hace la búsqueda
             $("#resultado34").delay(1000).queue(function(n) {      
                                           
                  $("#resultado34").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado34").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                     
});      

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#des35").blur(function(e){
             //obtenemos el texto introducido en el campo
              if($("#des35").val() == "")
			 {
             consulta = 'Espera';
			 }
			 else
			 {
			  consulta = $("#des35").val();
			 }
                                      
             //hace la búsqueda
             $("#resultado35").delay(1000).queue(function(n) {      
                                           
                  $("#resultado35").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado35").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });   
	  
               
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#des36").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des36").val();
                                      
             //hace la búsqueda
             $("#resultado36").delay(1000).queue(function(n) {      
                                           
                  $("#resultado36").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado36").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                      
});   

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des37").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des37").val();
                                      
             //hace la búsqueda
             $("#resultado37").delay(1000).queue(function(n) {      
                                           
                  $("#resultado37").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado37").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 



  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des38").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des38").val();
                                      
             //hace la búsqueda
             $("#resultado38").delay(1000).queue(function(n) {      
                                           
                  $("#resultado38").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado38").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#des39").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des39").val();
                                      
             //hace la búsqueda
             $("#resultado39").delay(1000).queue(function(n) {      
                                           
                  $("#resultado39").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado39").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                     
}); 


  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des40").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des40").val();
                                      
             //hace la búsqueda
             $("#resultado40").delay(1000).queue(function(n) {      
                                           
                  $("#resultado40").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado40").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#des41").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des41").val();
                                      
             //hace la búsqueda
             $("#resultado41").delay(1000).queue(function(n) {      
                                           
                  $("#resultado41").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado41").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#des42").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des42").val();
                                      
             //hace la búsqueda
             $("#resultado42").delay(1000).queue(function(n) {      
                                           
                  $("#resultado42").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado42").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
	  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des43").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des43").val();
                                      
             //hace la búsqueda
             $("#resultado43").delay(1000).queue(function(n) {      
                                           
                  $("#resultado43").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado43").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des44").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des44").val();
                                      
             //hace la búsqueda
             $("#resultado44").delay(1000).queue(function(n) {      
                                           
                  $("#resultado44").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado44").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });            
	           
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des45").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des45").val();
                                      
             //hace la búsqueda
             $("#resultado45").delay(1000).queue(function(n) {      
                                           
                  $("#resultado45").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado45").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#des46").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des46").val();
                                      
             //hace la búsqueda
             $("#resultado46").delay(1000).queue(function(n) {      
                                           
                  $("#resultado46").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado46").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des47").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des47").val();
                                      
             //hace la búsqueda
             $("#resultado47").delay(1000).queue(function(n) {      
                                           
                  $("#resultado47").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado47").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des48").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des48").val();
                                      
             //hace la búsqueda
             $("#resultado48").delay(1000).queue(function(n) {      
                                           
                  $("#resultado48").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado48").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des49").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des49").val();
                                      
             //hace la búsqueda
             $("#resultado49").delay(1000).queue(function(n) {      
                                           
                  $("#resultado49").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado49").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des50").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des50").val();
                                      
             //hace la búsqueda
             $("#resultado50").delay(1000).queue(function(n) {      
                                           
                  $("#resultado50").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado50").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des51").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des51").val();
                                      
             //hace la búsqueda
             $("#resultado51").delay(1000).queue(function(n) {      
                                           
                  $("#resultado51").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado51").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#des52").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des52").val();
                                      
             //hace la búsqueda
             $("#resultado52").delay(1000).queue(function(n) {      
                                           
                  $("#resultado52").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado52").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des53").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des53").val();
                                      
             //hace la búsqueda
             $("#resultado53").delay(1000).queue(function(n) {      
                                           
                  $("#resultado53").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado53").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#des54").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des54").val();
                                      
             //hace la búsqueda
             $("#resultado54").delay(1000).queue(function(n) {      
                                           
                  $("#resultado54").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado54").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des55").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des55").val();
                                      
             //hace la búsqueda
             $("#resultado55").delay(1000).queue(function(n) {      
                                           
                  $("#resultado55").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado55").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des56").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des56").val();
                                      
             //hace la búsqueda
             $("#resultado56").delay(1000).queue(function(n) {      
                                           
                  $("#resultado56").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado56").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des57").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des57").val();
                                      
             //hace la búsqueda
             $("#resultado57").delay(1000).queue(function(n) {      
                                           
                  $("#resultado57").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado57").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des58").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des58").val();
                                      
             //hace la búsqueda
             $("#resultado58").delay(1000).queue(function(n) {      
                                           
                  $("#resultado58").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado58").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#des59").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des59").val();
                                      
             //hace la búsqueda
             $("#resultado59").delay(1000).queue(function(n) {      
                                           
                  $("#resultado59").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado59").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});


 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des60").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des60").val();
                                      
             //hace la búsqueda
             $("#resultado60").delay(1000).queue(function(n) {      
                                           
                  $("#resultado60").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado60").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des61").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des61").val();
                                      
             //hace la búsqueda
             $("#resultado61").delay(1000).queue(function(n) {      
                                           
                  $("#resultado61").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado61").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des62").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des62").val();
                                      
             //hace la búsqueda
             $("#resultado62").delay(1000).queue(function(n) {      
                                           
                  $("#resultado62").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado62").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des63").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des63").val();
                                      
             //hace la búsqueda
             $("#resultado63").delay(1000).queue(function(n) {      
                                           
                  $("#resultado63").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado63").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#des64").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des64").val();

                                      
             //hace la búsqueda
             $("#resultado64").delay(1000).queue(function(n) {      
                                           
                  $("#resultado64").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado64").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des65").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des65").val();
                                      
             //hace la búsqueda
             $("#resultado65").delay(1000).queue(function(n) {      
                                           
                  $("#resultado65").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado65").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des66").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des66").val();
                                      
             //hace la búsqueda
             $("#resultado66").delay(1000).queue(function(n) {      
                                           
                  $("#resultado66").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado66").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des67").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des67").val();
                                      
             //hace la búsqueda
             $("#resultado67").delay(1000).queue(function(n) {      
                                           
                  $("#resultado67").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado67").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des68").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des68").val();
                                      
             //hace la búsqueda
             $("#resultado68").delay(1000).queue(function(n) {      
                                           
                  $("#resultado68").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado68").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des69").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des69").val();
                                      
             //hace la búsqueda
             $("#resultado69").delay(1000).queue(function(n) {      
                                           
                  $("#resultado69").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado69").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});


 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des70").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des70").val();
                                      
             //hace la búsqueda
             $("#resultado70").delay(1000).queue(function(n) {      
                                           
                  $("#resultado70").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado70").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des71").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des71").val();
                                      
             //hace la búsqueda
             $("#resultado71").delay(1000).queue(function(n) {      
                                           
                  $("#resultado71").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado71").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#des72").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des72").val();
                                      
             //hace la búsqueda
             $("#resultado72").delay(1000).queue(function(n) {      
                                           
                  $("#resultado72").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado72").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des73").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des73").val();
                                      
             //hace la búsqueda
             $("#resultado73").delay(1000).queue(function(n) {      
                                           
                  $("#resultado73").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado73").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des74").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des74").val();
                                      
             //hace la búsqueda
             $("#resultado74").delay(1000).queue(function(n) {      
                                           
                  $("#resultado74").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado74").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#des75").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des75").val();
                                      
             //hace la búsqueda
             $("#resultado75").delay(1000).queue(function(n) {      
                                           
                  $("#resultado75").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOC.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado75").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
////////////

 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus                                         
      //comprobamos si se pulsa una tecla
      $("#cod1").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod1").val();
                                      
             //hace la búsqueda
             $("#resultado1").delay(1000).queue(function(n) {      
                                           
                  $("#resultado1").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado1").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                         
});  

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod2").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod2").val();
                                      
             //hace la búsqueda
             $("#resultado2").delay(1000).queue(function(n) {      
                                           
                  $("#resultado2").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado2").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});  
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod3").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod3").val();
                                      
             //hace la búsqueda
             $("#resultado3").delay(1000).queue(function(n) {      
                                           
                  $("#resultado3").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado3").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });  
	                            
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod4").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod4").val();
                                      
             //hace la búsqueda
             $("#resultado4").delay(1000).queue(function(n) {      
                                           
                  $("#resultado4").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado4").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                     
});      

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod5").blur(function(e){
             //obtenemos el texto introducido en el campo
              if($("#cod5").val() == "")
			 {
             consulta = 'Espera';
			 }
			 else
			 {
			  consulta = $("#cod5").val();
			 }
                                      
             //hace la búsqueda
             $("#resultado5").delay(1000).queue(function(n) {      
                                           
                  $("#resultado5").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado5").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });   
	  
               
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod6").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod6").val();
                                      
             //hace la búsqueda
             $("#resultado6").delay(1000).queue(function(n) {      
                                           
                  $("#resultado6").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado6").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                      
});   

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod7").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod7").val();
                                      
             //hace la búsqueda
             $("#resultado7").delay(1000).queue(function(n) {      
                                           
                  $("#resultado7").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado7").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 



  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                        
      //comprobamos si se pulsa una tecla
      $("#cod8").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod8").val();
                                      
             //hace la búsqueda
             $("#resultado8").delay(1000).queue(function(n) {      
                                           
                  $("#resultado8").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado8").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod9").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod9").val();
                                      
             //hace la búsqueda
             $("#resultado9").delay(1000).queue(function(n) {      
                                           
                  $("#resultado9").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado9").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                     
}); 


  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod10").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod10").val();
                                      
             //hace la búsqueda
             $("#resultado10").delay(1000).queue(function(n) {      
                                           
                  $("#resultado10").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado10").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod11").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod11").val();
                                      
             //hace la búsqueda
             $("#resultado11").delay(1000).queue(function(n) {      
                                           
                  $("#resultado11").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado11").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod12").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod12").val();
                                      
             //hace la búsqueda
             $("#resultado12").delay(1000).queue(function(n) {      
                                           
                  $("#resultado12").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado12").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
	  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod13").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod13").val();
                                      
             //hace la búsqueda
             $("#resultado13").delay(1000).queue(function(n) {      
                                           
                  $("#resultado13").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado13").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod14").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod13").val();
                                      
             //hace la búsqueda
             $("#resultado14").delay(1000).queue(function(n) {      
                                           
                  $("#resultado14").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado14").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });            
	           
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                     
      //comprobamos si se pulsa una tecla
      $("#cod15").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod15").val();
                                      
             //hace la búsqueda
             $("#resultado15").delay(1000).queue(function(n) {      
                                           
                  $("#resultado15").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado15").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod16").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod16").val();
                                      
             //hace la búsqueda
             $("#resultado16").delay(1000).queue(function(n) {      
                                           
                  $("#resultado16").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado16").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod17").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod17").val();
                                      
             //hace la búsqueda
             $("#resultado17").delay(1000).queue(function(n) {      
                                           
                  $("#resultado17").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado17").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod18").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod18").val();
                                      
             //hace la búsqueda
             $("#resultado18").delay(1000).queue(function(n) {      
                                           
                  $("#resultado18").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado18").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod19").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod19").val();
                                      
             //hace la búsqueda
             $("#resultado19").delay(1000).queue(function(n) {      
                                           
                  $("#resultado19").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado19").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod20").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod20").val();
                                      
             //hace la búsqueda
             $("#resultado20").delay(1000).queue(function(n) {      
                                           
                  $("#resultado20").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado20").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod21").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod21").val();
                                      
             //hace la búsqueda
             $("#resultado21").delay(1000).queue(function(n) {      
                                           
                  $("#resultado21").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado21").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod22").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod22").val();
                                      
             //hace la búsqueda
             $("#resultado22").delay(1000).queue(function(n) {      
                                           
                  $("#resultado22").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado22").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod23").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod23").val();
                                      
             //hace la búsqueda
             $("#resultado23").delay(1000).queue(function(n) {      
                                           
                  $("#resultado23").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado23").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod24").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod24").val();
                                      
             //hace la búsqueda
             $("#resultado24").delay(1000).queue(function(n) {      
                                           
                  $("#resultado24").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado24").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod25").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod25").val();
                                      
             //hace la búsqueda
             $("#resultado25").delay(1000).queue(function(n) {      
                                           
                  $("#resultado25").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado25").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod26").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod26").val();
                                      
             //hace la búsqueda
             $("#resultado26").delay(1000).queue(function(n) {      
                                           
                  $("#resultado26").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado26").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod27").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod27").val();
                                      
             //hace la búsqueda
             $("#resultado27").delay(1000).queue(function(n) {      
                                           
                  $("#resultado27").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado27").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod28").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod28").val();
                                      
             //hace la búsqueda
             $("#resultado28").delay(1000).queue(function(n) {      
                                           
                  $("#resultado28").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado28").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod29").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod29").val();
                                      
             //hace la búsqueda
             $("#resultado29").delay(1000).queue(function(n) {      
                                           
                  $("#resultado29").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado29").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});


 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod30").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod30").val();
                                      
             //hace la búsqueda
             $("#resultado30").delay(1000).queue(function(n) {      
                                           
                  $("#resultado30").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado30").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

////////////

 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus                                         
      //comprobamos si se pulsa una tecla
      $("#cod31").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod31").val();
                                      
             //hace la búsqueda
             $("#resultado31").delay(1000).queue(function(n) {      
                                           
                  $("#resultado31").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado31").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                         
});  

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod32").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod32").val();
                                      
             //hace la búsqueda
             $("#resultado32").delay(1000).queue(function(n) {      
                                           
                  $("#resultado32").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado32").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});  
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod33").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod33").val();
                                      
             //hace la búsqueda
             $("#resultado33").delay(1000).queue(function(n) {      
                                           
                  $("#resultado33").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado33").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });  
	                            
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod34").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod34").val();
                                      
             //hace la búsqueda
             $("#resultado34").delay(1000).queue(function(n) {      
                                           
                  $("#resultado34").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado34").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                     
});      

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod35").blur(function(e){
             //obtenemos el texto introducido en el campo
              if($("#cod35").val() == "")
			 {
             consulta = 'Espera';
			 }
			 else
			 {
			  consulta = $("#cod35").val();
			 }
                                      
             //hace la búsqueda
             $("#resultado35").delay(1000).queue(function(n) {      
                                           
                  $("#resultado35").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado35").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });   
	  
               
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod36").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod36").val();
                                      
             //hace la búsqueda
             $("#resultado36").delay(1000).queue(function(n) {      
                                           
                  $("#resultado36").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado36").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                      
});   

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod37").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod37").val();
                                      
             //hace la búsqueda
             $("#resultado37").delay(1000).queue(function(n) {      
                                           
                  $("#resultado37").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado37").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 



  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod38").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod38").val();
                                      
             //hace la búsqueda
             $("#resultado38").delay(1000).queue(function(n) {      
                                           
                  $("#resultado38").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado38").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod39").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod39").val();
                                      
             //hace la búsqueda
             $("#resultado39").delay(1000).queue(function(n) {      
                                           
                  $("#resultado39").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado39").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                     
}); 


  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod40").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod40").val();

                                      
             //hace la búsqueda
             $("#resultado40").delay(1000).queue(function(n) {      
                                           
                  $("#resultado40").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado40").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod41").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod41").val();
                                      
             //hace la búsqueda
             $("#resultado41").delay(1000).queue(function(n) {      
                                           
                  $("#resultado41").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado41").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod42").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod42").val();
                                      
             //hace la búsqueda
             $("#resultado42").delay(1000).queue(function(n) {      
                                           
                  $("#resultado42").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado42").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
	  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod43").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod43").val();
                                      
             //hace la búsqueda
             $("#resultado43").delay(1000).queue(function(n) {      
                                           
                  $("#resultado43").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado43").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod44").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod44").val();
                                      
             //hace la búsqueda
             $("#resultado44").delay(1000).queue(function(n) {      
                                           
                  $("#resultado44").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado44").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });            
	           
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod45").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod45").val();
                                      
             //hace la búsqueda
             $("#resultado45").delay(1000).queue(function(n) {      
                                           
                  $("#resultado45").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado45").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod46").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod46").val();
                                      
             //hace la búsqueda
             $("#resultado46").delay(1000).queue(function(n) {      
                                           
                  $("#resultado46").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado46").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod47").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod47").val();
                                      
             //hace la búsqueda
             $("#resultado47").delay(1000).queue(function(n) {      
                                           
                  $("#resultado47").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado47").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                      
      //comprobamos si se pulsa una tecla
      $("#cod48").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod48").val();
                                      
             //hace la búsqueda
             $("#resultado48").delay(1000).queue(function(n) {      
                                           
                  $("#resultado48").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado48").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod49").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod49").val();
                                      
             //hace la búsqueda
             $("#resultado49").delay(1000).queue(function(n) {      
                                           
                  $("#resultado49").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado49").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod50").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod50").val();
                                      
             //hace la búsqueda
             $("#resultado50").delay(1000).queue(function(n) {      
                                           
                  $("#resultado50").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado50").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod51").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod51").val();
                                      
             //hace la búsqueda
             $("#resultado51").delay(1000).queue(function(n) {      
                                           
                  $("#resultado51").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado51").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                    
      //comprobamos si se pulsa una tecla
      $("#cod52").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod52").val();
                                      
             //hace la búsqueda
             $("#resultado52").delay(1000).queue(function(n) {      
                                           
                  $("#resultado52").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado52").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod53").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod53").val();
                                      
             //hace la búsqueda
             $("#resultado53").delay(1000).queue(function(n) {      
                                           
                  $("#resultado53").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado53").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod54").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod54").val();
                                      
             //hace la búsqueda
             $("#resultado54").delay(1000).queue(function(n) {      
                                           
                  $("#resultado54").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado54").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod55").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod55").val();
                                      
             //hace la búsqueda
             $("#resultado55").delay(1000).queue(function(n) {      
                                           
                  $("#resultado55").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado55").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod56").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod56").val();
                                      
             //hace la búsqueda
             $("#resultado56").delay(1000).queue(function(n) {      
                                           
                  $("#resultado56").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado56").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod57").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod57").val();
                                      
             //hace la búsqueda
             $("#resultado57").delay(1000).queue(function(n) {      
                                           
                  $("#resultado57").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado57").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod58").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod58").val();
                                      
             //hace la búsqueda
             $("#resultado58").delay(1000).queue(function(n) {      
                                           
                  $("#resultado58").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado58").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod59").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod59").val();
                                      
             //hace la búsqueda
             $("#resultado59").delay(1000).queue(function(n) {      
                                           
                  $("#resultado59").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado59").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});


 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod60").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod60").val();
                                      
             //hace la búsqueda
             $("#resultado60").delay(1000).queue(function(n) {      
                                           
                  $("#resultado60").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado60").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod61").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod61").val();
                                      
             //hace la búsqueda
             $("#resultado61").delay(1000).queue(function(n) {      
                                           
                  $("#resultado61").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado61").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod62").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod62").val();
                                      
             //hace la búsqueda
             $("#resultado62").delay(1000).queue(function(n) {      
                                           
                  $("#resultado62").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado62").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod63").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod63").val();
                                      
             //hace la búsqueda
             $("#resultado63").delay(1000).queue(function(n) {      
                                           
                  $("#resultado63").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado63").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod64").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod64").val();
                                      
             //hace la búsqueda
             $("#resultado64").delay(1000).queue(function(n) {      
                                           
                  $("#resultado64").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado64").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod65").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod65").val();
                                      
             //hace la búsqueda
             $("#resultado65").delay(1000).queue(function(n) {      
                                           
                  $("#resultado65").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado65").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod66").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod66").val();
                                      
             //hace la búsqueda
             $("#resultado66").delay(1000).queue(function(n) {      
                                           
                  $("#resultado66").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado66").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod67").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod67").val();
                                      
             //hace la búsqueda
             $("#resultado67").delay(1000).queue(function(n) {      
                                           
                  $("#resultado67").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado67").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod68").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod68").val();
                                      
             //hace la búsqueda
             $("#resultado68").delay(1000).queue(function(n) {      
                                           
                  $("#resultado68").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado68").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod69").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod69").val();
                                      
             //hace la búsqueda
             $("#resultado69").delay(1000).queue(function(n) {      
                                           
                  $("#resultado69").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado69").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});


 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#cod70").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod70").val();
                                      
             //hace la búsqueda
             $("#resultado70").delay(1000).queue(function(n) {      
                                           
                  $("#resultado70").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado70").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod71").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod71").val();
                                      
             //hace la búsqueda
             $("#resultado71").delay(1000).queue(function(n) {      
                                           
                  $("#resultado71").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado71").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                       
      //comprobamos si se pulsa una tecla
      $("#cod72").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod72").val();
                                      
             //hace la búsqueda
             $("#resultado72").delay(1000).queue(function(n) {      
                                           
                  $("#resultado72").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado72").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod73").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod73").val();
                                      
             //hace la búsqueda
             $("#resultado73").delay(1000).queue(function(n) {      
                                           
                  $("#resultado73").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado73").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod74").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod74").val();
                                      
             //hace la búsqueda
             $("#resultado74").delay(1000).queue(function(n) {      
                                           
                  $("#resultado74").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado74").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#cod75").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#cod75").val();
                                      
             //hace la búsqueda
             $("#resultado75").delay(1000).queue(function(n) {      
                                           
                  $("#resultado75").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCCodigo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado75").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

////////////

 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus                                         
      //comprobamos si se pulsa una tecla
      $("#roch1").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch1").val();
                                      
             //hace la búsqueda
             $("#resultador1").delay(1000).queue(function(n) {      
                                           
                  $("#resultador1").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador1").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                         
});  

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch2").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch2").val();
                                      
             //hace la búsqueda
             $("#resultador2").delay(1000).queue(function(n) {      
                                           
                  $("#resultador2").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador2").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});  
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch3").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch3").val();
                                      
             //hace la búsqueda
             $("#resultador3").delay(1000).queue(function(n) {      
                                           
                  $("#resultador3").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador3").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });  
	                            
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch4").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch4").val();
                                      
             //hace la búsqueda
             $("#resultador4").delay(1000).queue(function(n) {      
                                           
                  $("#resultador4").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador4").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                     
});      

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#roch5").blur(function(e){
             //obtenemos el texto introducido en el campo
              if($("#roch5").val() == "")
			 {
             consulta = 'Espera';
			 }
			 else
			 {
			  consulta = $("#roch5").val();
			 }
                                      
             //hace la búsqueda
             $("#resultador5").delay(1000).queue(function(n) {      
                                           
                  $("#resultador5").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador5").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });   
	  
               
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch6").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch6").val();
                                      
             //hace la búsqueda
             $("#resultador6").delay(1000).queue(function(n) {      
                                           
                  $("#resultador6").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador6").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                      
});   

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch7").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch7").val();
                                      
             //hace la búsqueda
             $("#resultador7").delay(1000).queue(function(n) {      
                                           
                  $("#resultador7").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador7").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 



  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch8").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch8").val();
                                      
             //hace la búsqueda
             $("#resultador8").delay(1000).queue(function(n) {      
                                           
                  $("#resultador8").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador8").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#roch9").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch9").val();
                                      
             //hace la búsqueda
             $("#resultador9").delay(1000).queue(function(n) {      
                                           
                  $("#resultador9").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador9").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                     
}); 


  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch10").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch10").val();
                                      
             //hace la búsqueda
             $("#resultador10").delay(1000).queue(function(n) {      
                                           
                  $("#resultador10").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador10").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch11").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch11").val();
                                      
             //hace la búsqueda
             $("#resultador11").delay(1000).queue(function(n) {      
                                           
                  $("#resultador11").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador11").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch12").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch12").val();
                                      
             //hace la búsqueda
             $("#resultador12").delay(1000).queue(function(n) {      
                                           
                  $("#resultador12").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador12").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
	  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                      
      //comprobamos si se pulsa una tecla
      $("#roch13").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch13").val();
                                      
             //hace la búsqueda
             $("#resultador13").delay(1000).queue(function(n) {      
                                           
                  $("#resultador13").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador13").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch14").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch13").val();
                                      
             //hace la búsqueda
             $("#resultador14").delay(1000).queue(function(n) {      
                                           
                  $("#resultador14").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador14").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });            
	           
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch15").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch15").val();
                                      
             //hace la búsqueda
             $("#resultador15").delay(1000).queue(function(n) {      
                                           
                  $("#resultador15").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador15").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch16").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch16").val();
                                      
             //hace la búsqueda
             $("#resultador16").delay(1000).queue(function(n) {      
                                           
                  $("#resultador16").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador16").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch17").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch17").val();
                                      
             //hace la búsqueda
             $("#resultador17").delay(1000).queue(function(n) {      
                                           
                  $("#resultador17").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador17").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch18").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch18").val();
                                      
             //hace la búsqueda
             $("#resultador18").delay(1000).queue(function(n) {      
                                           
                  $("#resultador18").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador18").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch19").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch19").val();
                                      
             //hace la búsqueda
             $("#resultador19").delay(1000).queue(function(n) {      
                                           
                  $("#resultador19").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador19").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch20").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch20").val();
                                      
             //hace la búsqueda
             $("#resultador20").delay(1000).queue(function(n) {      
                                           
                  $("#resultador20").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador20").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch21").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch21").val();
                                      
             //hace la búsqueda
             $("#resultador21").delay(1000).queue(function(n) {      
                                           
                  $("#resultador21").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador21").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch22").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch22").val();
                                      
             //hace la búsqueda
             $("#resultador22").delay(1000).queue(function(n) {      
                                           
                  $("#resultador22").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador22").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch23").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch23").val();
                                      
             //hace la búsqueda
             $("#resultador23").delay(1000).queue(function(n) {      
                                           
                  $("#resultador23").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador23").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch24").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch24").val();
                                      
             //hace la búsqueda
             $("#resultador24").delay(1000).queue(function(n) {      
                                           
                  $("#resultador24").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador24").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch25").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch25").val();
                                      
             //hace la búsqueda
             $("#resultador25").delay(1000).queue(function(n) {      
                                           
                  $("#resultador25").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador25").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch26").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch26").val();
                                      
             //hace la búsqueda
             $("#resultador26").delay(1000).queue(function(n) {      
                                           
                  $("#resultador26").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador26").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch27").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch27").val();
                                      
             //hace la búsqueda
             $("#resultador27").delay(1000).queue(function(n) {      
                                           
                  $("#resultador27").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador27").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch28").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch28").val();
                                      
             //hace la búsqueda
             $("#resultador28").delay(1000).queue(function(n) {      
                                           
                  $("#resultador28").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador28").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch29").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch29").val();
                                      
             //hace la búsqueda
             $("#resultador29").delay(1000).queue(function(n) {      
                                           
                  $("#resultador29").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador29").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});


 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                   
      //comprobamos si se pulsa una tecla
      $("#roch30").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch30").val();
                                      
             //hace la búsqueda
             $("#resultador30").delay(1000).queue(function(n) {      
                                           
                  $("#resultador30").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador30").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

////////////

 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus                                         
      //comprobamos si se pulsa una tecla
      $("#roch31").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch31").val();
                                      
             //hace la búsqueda
             $("#resultador31").delay(1000).queue(function(n) {      
                                           
                  $("#resultador31").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador31").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                         
});  

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch32").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch32").val();
                                      
             //hace la búsqueda
             $("#resultador32").delay(1000).queue(function(n) {      
                                           
                  $("#resultador32").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador32").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});  
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch33").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch33").val();
                                      
             //hace la búsqueda
             $("#resultador33").delay(1000).queue(function(n) {      
                                           
                  $("#resultador33").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador33").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });  
	                            
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch34").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch34").val();
                                      
             //hace la búsqueda
             $("#resultador34").delay(1000).queue(function(n) {      
                                           
                  $("#resultador34").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador34").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                     
});      

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch35").blur(function(e){
             //obtenemos el texto introducido en el campo
              if($("#roch35").val() == "")
			 {
             consulta = 'Espera';
			 }
			 else
			 {
			  consulta = $("#roch35").val();
			 }
                                      
             //hace la búsqueda
             $("#resultador35").delay(1000).queue(function(n) {      
                                           
                  $("#resultador35").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador35").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });   
	  
               
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#roch36").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch36").val();
                                      
             //hace la búsqueda
             $("#resultador36").delay(1000).queue(function(n) {      
                                           
                  $("#resultador36").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador36").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                      
});   

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#roch37").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch37").val();
                                      
             //hace la búsqueda
             $("#resultador37").delay(1000).queue(function(n) {      
                                           
                  $("#resultador37").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador37").html(data);
                                    n();
                              }
                  });
                                           

             });
                                
      });                   
}); 



  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch38").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch38").val();
                                      
             //hace la búsqueda
             $("#resultador38").delay(1000).queue(function(n) {      
                                           
                  $("#resultador38").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador38").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch39").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch39").val();
                                      
             //hace la búsqueda
             $("#resultador39").delay(1000).queue(function(n) {      
                                           
                  $("#resultador39").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador39").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                     
}); 


  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#roch40").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch40").val();
                                      
             //hace la búsqueda
             $("#resultador40").delay(1000).queue(function(n) {      
                                           
                  $("#resultador40").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador40").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch41").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch41").val();
                                      
             //hace la búsqueda
             $("#resultador41").delay(1000).queue(function(n) {      
                                           
                  $("#resultador41").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador41").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#roch42").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch42").val();
                                      
             //hace la búsqueda
             $("#resultador42").delay(1000).queue(function(n) {      
                                           
                  $("#resultador42").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador42").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
	  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                      
      //comprobamos si se pulsa una tecla
      $("#roch43").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch43").val();
                                      
             //hace la búsqueda
             $("#resultador43").delay(1000).queue(function(n) {      
                                           
                  $("#resultador43").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador43").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#roch44").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch44").val();
                                      
             //hace la búsqueda
             $("#resultador44").delay(1000).queue(function(n) {      
                                           
                  $("#resultador44").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador44").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });            
	           
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch45").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch45").val();
                                      
             //hace la búsqueda
             $("#resultador45").delay(1000).queue(function(n) {      
                                           
                  $("#resultador45").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador45").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch46").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch46").val();
                                      
             //hace la búsqueda
             $("#resultador46").delay(1000).queue(function(n) {      
                                           
                  $("#resultador46").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador46").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
                      
      //comprobamos si se pulsa una tecla
      $("#roch47").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch47").val();
                                      
             //hace la búsqueda
             $("#resultador47").delay(1000).queue(function(n) {      
                                           
                  $("#resultador47").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador47").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch48").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch48").val();
                                      
             //hace la búsqueda
             $("#resultador48").delay(1000).queue(function(n) {      
                                           
                  $("#resultador48").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador48").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
                     
      //comprobamos si se pulsa una tecla
      $("#roch49").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch49").val();
                                      
             //hace la búsqueda
             $("#resultador49").delay(1000).queue(function(n) {      
                                           
                  $("#resultador49").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador49").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#roch50").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch50").val();
                                      
             //hace la búsqueda
             $("#resultador50").delay(1000).queue(function(n) {      
                                           
                  $("#resultador50").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador50").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             

                                                 
      //comprobamos si se pulsa una tecla
      $("#roch51").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch51").val();
                                      
             //hace la búsqueda
             $("#resultador51").delay(1000).queue(function(n) {      
                                           
                  $("#resultador51").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador51").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch52").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch52").val();
                                      
             //hace la búsqueda
             $("#resultador52").delay(1000).queue(function(n) {      
                                           
                  $("#resultador52").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador52").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch53").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch53").val();
                                      
             //hace la búsqueda
             $("#resultador53").delay(1000).queue(function(n) {      
                                           
                  $("#resultador53").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador53").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch54").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch54").val();
                                      
             //hace la búsqueda
             $("#resultador54").delay(1000).queue(function(n) {      
                                           
                  $("#resultador54").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador54").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch55").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch55").val();
                                      
             //hace la búsqueda
             $("#resultador55").delay(1000).queue(function(n) {      
                                           
                  $("#resultador55").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador55").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch56").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch56").val();
                                      
             //hace la búsqueda
             $("#resultador56").delay(1000).queue(function(n) {      
                                           
                  $("#resultador56").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador56").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch57").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch57").val();
                                      
             //hace la búsqueda
             $("#resultador57").delay(1000).queue(function(n) {      
                                           
                  $("#resultador57").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador57").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                    
      //comprobamos si se pulsa una tecla
      $("#roch58").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch58").val();
                                      
             //hace la búsqueda
             $("#resultador58").delay(1000).queue(function(n) {      
                                           
                  $("#resultador58").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador58").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
  
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch59").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch59").val();
                                      
             //hace la búsqueda
             $("#resultador59").delay(1000).queue(function(n) {      
                                           
                  $("#resultador59").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador59").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});


 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch60").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch60").val();
                                      
             //hace la búsqueda
             $("#resultador60").delay(1000).queue(function(n) {      
                                           
                  $("#resultador60").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador60").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch61").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch61").val();
                                      
             //hace la búsqueda
             $("#resultador61").delay(1000).queue(function(n) {      
                                           
                  $("#resultador61").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador61").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch62").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch62").val();
                                      
             //hace la búsqueda
             $("#resultador62").delay(1000).queue(function(n) {      
                                           
                  $("#resultador62").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador62").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch63").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch63").val();
                                      
             //hace la búsqueda
             $("#resultador63").delay(1000).queue(function(n) {      
                                           
                  $("#resultador63").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador63").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
                      
      //comprobamos si se pulsa una tecla
      $("#roch64").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch64").val();
                                      
             //hace la búsqueda
             $("#resultador64").delay(1000).queue(function(n) {      
                                           
                  $("#resultador64").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador64").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#roch65").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch65").val();
                                      
             //hace la búsqueda
             $("#resultador65").delay(1000).queue(function(n) {      
                                           
                  $("#resultador65").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador65").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                                  
      //comprobamos si se pulsa una tecla
      $("#roch66").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch66").val();
                                      
             //hace la búsqueda
             $("#resultador66").delay(1000).queue(function(n) {      
                                           
                  $("#resultador66").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador66").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch67").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch67").val();
                                      
             //hace la búsqueda
             $("#resultador67").delay(1000).queue(function(n) {      
                                           
                  $("#resultador67").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador67").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch68").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch68").val();
                                      
             //hace la búsqueda
             $("#resultador68").delay(1000).queue(function(n) {      
                                           
                  $("#resultador68").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador68").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch69").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch69").val();
                                      
             //hace la búsqueda
             $("#resultador69").delay(1000).queue(function(n) {      
                                           
                  $("#resultador69").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador69").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});



 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch70").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch70").val();
                                      
             //hace la búsqueda
             $("#resultador70").delay(1000).queue(function(n) {      
                                           
                  $("#resultador70").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador70").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch71").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch71").val();
                                      
             //hace la búsqueda
             $("#resultador71").delay(1000).queue(function(n) {      
                                           
                  $("#resultador71").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador71").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch72").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch72").val();
                                      
             //hace la búsqueda
             $("#resultador72").delay(1000).queue(function(n) {      
                                           
                  $("#resultador72").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador72").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focu
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch73").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch73").val();
                                      
             //hace la búsqueda
             $("#resultador73").delay(1000).queue(function(n) {      
                                           
                  $("#resultador73").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador73").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});

 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#roch74").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch74").val();
                                      
             //hace la búsqueda
             $("#resultador74").delay(1000).queue(function(n) {      
                                           
                  $("#resultador74").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador74").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});
 /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                
      //comprobamos si se pulsa una tecla
      $("#roch75").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#roch75").val();
                                      
             //hace la búsqueda
             $("#resultador75").delay(1000).queue(function(n) {      
                                           
                  $("#resultador75").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoOCRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultador75").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
});


</script>
</head>
<?php
$frase = ($NOMBRE_FANTASIA)."\n".($RUT_PROVEEDOR)."\n".($DIRECCION)."\n".($COMUNA);
?>
<body>
<form action = "scriptVale.php" method="POST" id='formulario'>
<!--------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------> <!--------------------------------------------------------------------------------------------------->
<div id="content_item" class="content_item">	
<center><h1 style="color:#00C;">Vale Bodega</h1></center>
<center>
<br />
<table>
<tr>
<td> Rocha </td>
<td><input type = "text" id="rocha" name="rocha" VALUE="<?php echo $ROCHA_PROYECTO; ?>" /></td>
 <td>DEPARTAMENTO</td>
        <td><select  onchange="" id = "departamento" name="departamento">
     <option>...</option>
<option>PRODUCCION</option>
<option>ADQUICICIONES</option>
<option>ABASTECIMIENTO</option>
<option>DESPACHO</option>
<option>INSTALACIONES</option>
<option>COMERCIAL</option>
<option>FINANZAS</option>
<option>RRHH</option>
<option>SISTEMA</option>
<option>DAM</option>
<option>DESARROLLO</option>
<option>dfSILLAS</option>
<option>GERENCIA</option>
<option>DAM</option>
<option>DAM</option>
<option>MUEBLES ESPECIALES</option>
<option>SERVICIO TECNICO</option>
</select></td>
          <td>Empleado</td>
        <td><input type='text'  onchange="" id = "empleado" name="empleado"></td>

        <td>Fecha</td>
        <td><center><input readonly type="text"   id= "fecha" name = "fecha" value="<?php echo  date("Y-m-d H:i:s")?>"/></center></td>
        <td><center>N° VALE</center></td>
        <td><input  readonly type="text"   id= "n_vale" name = "n_vale" value="<?php echo $CODIGO_VAL + 1;?>"/></td>
</tr>
</table>
<br />
</center>
<center>
<p>&nbsp;</p>
<p>&nbsp;</p>

<div id = "div_producto">

<table width="100%" frame="box" rules="all" cellspacing=0 cellpadding=0> 
<thead>
<tr>
<th><center>Codigo</center></th>
<th><center>Rocha</center></th>
<th height="40">Existe Rocha</th>
<th><center>Descripcion</center></th>
<th><center>Obs</center></th>
<th height="40">Existe</th>
<th ><center>Stock</center></th>
<th><center>Cant</center></th>
<th height="40">U/M</th>
</thead>
</tr>
<?php
$query_registro3 = "select producto.UNIDAD_DE_MEDIDA,oc_producto.PRECIO_UNITARIO, oc_producto.PRECIO_LISTA,producto.STOCK_ACTUAL, oc_producto.OBSERVACION, producto.DESCRIPCION,oc_producto.ROCHA,producto.CODIGO_PRODUCTO, oc_producto.TOTAL, oc_producto.DESCUENTO, oc_producto.CANTIDAD, oc_producto.PRECIO_BODEGA from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".$CODIGO_OC1."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
$contador= 1;
 while($row = mysql_fetch_array($result3))
  {
	$COD_PRODUCTO = $row["CODIGO_PRODUCTO"]; 
	$DESCRIPCION = $row["DESCRIPCION"]; 
	$STOCK = $row["STOCK_ACTUAL"]; 
	$ROCHA = $row["ROCHA"]; 
	$OBSERVACION1 = $row["OBSERVACION"]; 
	$TOTAL_PRODUCTO = $row["TOTAL"];
	$DESCUENTO_PRODUCTO = $row["DESCUENTO"];
	$CANTIDAD = $row["CANTIDAD"];
	$PRECIO_BODEGA = $row["PRECIO_BODEGA"];
	$PRECIO_LISTA = $row["PRECIO_LISTA"];
	$PRECIO_UNITARIO = $row["PRECIO_UNITARIO"];
		$UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
     echo "<tr><td id = 'cel1'><center> <input ondblclick='limpiar".$contador."();' class='form1' name =cod".$contador." id =cod".$contador." type = 'text' value = '" . 
	   $COD_PRODUCTO . "' /></center></td>";	
	 echo "<td id = 'cel2'><center> <input class='form8' name =roch".$contador." id =roch".$contador." type = 'text' value = '" . 
	    ($ROCHA) . "' /></center></td>";
			echo "<td height='30'><input class='form9' name =exs1".$contador."  id =exs1".$contador." type = 'text' value = '' /><div id=resultador".$contador."></div></td>";		
     echo "<td id = 'cel3'><input onblur='final();' class='form2' name =des".$contador." id =des".$contador." type = 'text' value = '" . 
	    $DESCRIPCION . "' /></td>";
     echo "<td id = 'cel4'><input class='form9' name =obs".$contador." id =obs".$contador." type = 'text' value = '". 
	    ($OBSERVACION1)."' /></td>";
		 echo "<td height='30'><input class='form9' name =exs".$contador."  id =exs".$contador." type = 'text' value = '' /><div id=resultado".$contador."></div></td>";
	 echo "<td id = 'cel5' style='background:#ccc'><center><input class='form10' name =stock".$contador." id =stock".$contador." type = 'text' value = '" . 
	    $STOCK. "' /></center></td>";
	 echo "<td id = 'cel6'><center><input onblur='total();final();' onkeydown='total();final();' class='form3' id =cant".$contador." name =cant".$contador." type = 'text' value = '" . 
	    $CANTIDAD . "' /></center></td>";
		 echo "<td id = 'cel6'><center><input class='form3' id =um".$contador." type = 'text' value = '" . 
	    $UNIDAD_DE_MEDIDA . "' /></center></td></tr>";
 
    $contador++; 
  }
  mysql_free_result($result3);
  mysql_close($conn);
  
  while($contador < 76)
  {
  echo "<tr><td id = 'cel1'><center> <input ondblclick='limpiar".$contador."();' class='form1' name =cod".$contador." id =cod".$contador." type = 'text' value = '' /></center></td>";	
	 echo "<td id = 'cel2'><center> <input class='form8' name =roch".$contador." id =roch".$contador." type = 'text' value = '' /></center></td>";	
	 	echo "<td height='30'><input class='form9' name =exs1".$contador."  id =exs1".$contador." type = 'text' value = '' /><div id=resultador".$contador."></div></td>";	
     echo "<td id = 'cel3'><input onblur='final();es_vacio2();' class='form2' name =des".$contador." id =des".$contador." type = 'text' value = '' /></td>";
     echo "<td id = 'cel4'><input class='form9' name =obs".$contador."  id =obs".$contador." type = 'text' value = '' /></td>";
	  echo "<td height='30'><input class='form9' name =exs".$contador."  id =exs".$contador." type = 'text' value = '' /><div id=resultado".$contador."></div></td>";
	 echo "<td id = 'cel5' style='background:#ccc'><center><input class='form10' name =stock".$contador." id =stock".$contador." type = 'text' value = '' /></center></td>";
	 echo "<td id = 'cel6'><center><input onblur='total();final();' onkeydown='total();final();' class='form3' id =cant".$contador." name =cant".$contador." type = 'text' value = '' /></center></td>";
	  echo "<td id = 'cel6'><center><input class='form3' id =um".$contador." name =ud".$contador."  type = 'text' value = '' /></center></td></tr>";
	 $contador++; 
  }
?>
</table>
<input style="display:none" type = "text" id="codiguito" name="codiguito" value="<?php echo $CODIGO_USUARIO; ?>" />
<div align="right">
    <input style="width:245px; margin:10px;"  type = 'button' id="ingresar" name ="ingresar" value = "EMITIR"  onclick="enviar();" />
   
</div>
</div><!--close content_item--> 
</form>
</body>
</html>