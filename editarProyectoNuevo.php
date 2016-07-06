<?php require_once('Conexion/Conexion.php');  ?>
<?php
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
date_default_timezone_set("Chile/Continental");
/////////////////////////////////////////////////////////
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
/////////////////////////////////////////////////////////

if (isset($_GET["CODIGO_PROYECTO"]))
{
$CODIGO_PROYECTO = $_GET["CODIGO_PROYECTO"];
}
else
{
$CODIGO_PROYECTO = $_GET["CODIGO_PROYECTO"];
}
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn);

$contador = "select * from proyecto where CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());
$cuenta = 0;

 while($row = mysql_fetch_array($result1))
  {
	$CLIENTE = $row["NOMBRE_CLIENTE"];
	$RUT_CLIENTE = $row["RUT_CLIENTE"];
	$OBRA = $row["OBRA"];
	$DIRECCION_OBRA = $row["DIRECCION_FACTURACION"];
	$OC = $row["ORDEN_CC"];
	$CONDICION_PAGO = $row["CONDICION_PAGO"];
	$DEPARTAMENTO_CREDITO = $row["DEPARTAMENTO_CREDITO"];
	$DIRECTOR = $row["EJECUTIVO"];
	$DISENADOR = $row["DISENADOR"];
	$CONTACTO = $row["CONTACTO"];
	$FONO = $row["FONO"];
	$MAIL = $row["MAIL"];
	$VALIDEZ = $row["VALIDEZ_COTIZACION"];
	$PUESTOS = $row["PUESTOS"];
	$SUB_TOTAL = $row["SUB_TOTAL"];
	$DESCUENTO = $row["DESCUENTO"];
	$DESCUENTO2 = $row["DESCUENTO2"];
	$FECHA_INGRESO = $row["FECHA_INGRESO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DIAS = $row["DIAS"];
	$ESTADO = $row["ESTADO"];
	$NETO = $row["MONTO"];
	$NETO2 = $row["MONTO2"];
	$IVA = $row["IVA"];
	$TOTAL = $row["TOTAL"];
	$TIPO_IVA = $row["TIPO_IVA"];
	$FECHA_ACTA = $row["FECHA_ACTA"];
  }
  mysql_free_result($result1);
  
 if($FECHA_INGRESO == "") 
 {
  $FECHA_INGRESO = date("Y-m-d H:i:s")  ;
 }

  //////////////////////////////
  
if (isset($_POST["ingresars"])) 
{
mysql_select_db($database_conn, $conn);
$NOMBRE_SERVICIO = $_POST['txt_nombre_servicio'];
$FECHAES= $_POST['txt_fechae_servicio'];
$FECHAIS= $_POST['txt_fechai_servicio'];
$REALIZADOR= $_POST['txt_realizador'];
$SUPERVISOR= $_POST['txt_supervisor'];
$OBSERVACIONESS= $_POST['txt_observaciones_s'];
$DIRECCION2 = $_POST['txt_direccions'];
$TTF = $_POST['txt_ttf'];
$GUIA = $_POST['txt_guia'];
$INS1 = $_POST['ins1'];
$INS2 = $_POST['ins2'];
$INS3 = $_POST['ins3'];
$INS4 = $_POST['ins4'];
$LIDER = $_POST['lider'];
$CANTIDAD_DIAS = $_POST['txt_cantidad_dias'];
$PREDECESOR = $_POST['txt_predecesor'];
$PUESTOS1 = $_POST['puestos'];
$SERVICIO = $_POST['txt_servicio'];
$DOCUMENTO = $_POST['txt_documento'];
$TECNICO1= $_POST['tec1'];
$TECNICO2 = $_POST['tec2'];
$RECLAMOS = $_POST['txt_reclamos'];
$VEHICULO = $_POST['txt_transporte'];


if($NOMBRE_SERVICIO == "Produccion")
{ 
$EJECUTOR = $_POST['txt_ejecutor'];
$PROCESO = $_POST['txt_proceso'];
}
else
{
$EJECUTOR = $_POST['txt_ejecutors'];
$PROCESO = $_POST['txt_procesos'];
}
$FECHA = date('Y/m/d');
$DESCRIPCIONS = $_POST['txt_descripcion_s'];
$FECHA_REALIZACION = date("Y-m-d");

$sql = "INSERT INTO servicio (DOCUMENTO_SERVICIO_TECNICO,TIPO_SERVICIO,TECNICO_1,TECNICO_2,PROCESO,EJECUTOR,PUESTOS,PREDECESOR,DIAS,LIDER,INSTALADOR_1,INSTALADOR_2,INSTALADOR_3,INSTALADOR_4,DESCRIPCION,NOMBRE_SERVICIO,FECHA_INICIO,FECHA_ENTREGA,REALIZADOR,SUPERVISOR,OBSERVACIONES,ESTADO,CODIGO_USUARIO,CODIGO_PROYECTO,DIRECCION,TPTMFI,GUIA_DESPACHO,FECHA_REALIZACION,RECLAMOS,TRANSPORTE) values ('".($DOCUMENTO)."','".($SERVICIO)."','".($TECNICO1)."','".($TECNICO2)."','".($PROCESO)."','".($EJECUTOR)."','".($PUESTOS1)."','".($PREDECESOR)."','".($CANTIDAD_DIAS)."','".($LIDER)."','".($INS1)."','".($INS2)."','".($INS3)."','".($INS4)."','".($DESCRIPCIONS)."','".($NOMBRE_SERVICIO)."','".($FECHAIS)."','".($FECHAES)."','".($REALIZADOR)."','".($SUPERVISOR)."','".($OBSERVACIONESS)."','EN PROCESO','".($CODIGO_USUARIO)."','".($CODIGO_PROYECTO)."','".($DIRECCION2)."','".($TTF)."','".($GUIA)."','".$FECHA_REALIZACION."','".$RECLAMOS."','".$VEHICULO."')";
$result = mysql_query($sql, $conn) or die(mysql_error());

header("Location: editarProyecto.php?CODIGO_PROYECTO=".urlencode($CODIGO_PROYECTO)."");
}
////////////////////////////
$ESTADOV = "EN PROCESO";

if(isset($_GET["ESTADO"]))
{ 
$ESTADOV = $_GET["ESTADO"];
}
$OK='';
$PROCESO ='';
$TODOS='';
if($ESTADOV == 'EN PROCESO')
{
	$PROCESO = 'checked';
}
if($ESTADOV == 'OK')
{
	$OK = 'checked';
}
if($ESTADOV == 'TODOS')
{
	$TODOS = 'checked';
}

$ESTADOV1 = "EN PROCESO";

if(isset($_GET["ESTADO1"]))
{ 
$ESTADOV1 = $_GET["ESTADO1"];
}
$OK1='';
$PROCESO1 ='';
$TODOS1='';
if($ESTADOV1 == 'EN PROCESO')
{
	$PROCESO1 = 'checked';
}
if($ESTADOV1 == 'OK')
{
	$OK1 = 'checked';
}
if($ESTADOV1 == 'TODOS')
{
	$TODOS1 = 'checked';
}
$t_iva= "";
$t_Iva_Retenido="";
$t_Retencio="";

if($TIPO_IVA == 'Iva')
{
	$t_iva = 'selected';
}
else if($TIPO_IVA == 'Iva Retenido')
{
	$t_Iva_Retenido = 'selected';
}
else if($TIPO_IVA == 'Retencio')
{
	$t_Retencio = 'selected';
}



$query = "SELECT * FROM grupo_usuario, usuario, grupo where grupo.ID_GRUPO = grupo_usuario.CODIGO_GRUPO and grupo_usuario.CODIGO_USUARIO = usuario.CODIGO_USUARIO and usuario.CODIGO_USUARIO = '".$CODIGO_USUARIO."'";
$result2 = mysql_query($query, $conn) or die(mysql_error());
$numero = 0;
$GRP = "";
$GRP1 = "";
$GRP2 = "";
$GRP3 = "";
 while($row = mysql_fetch_array($result2))
  {
	if($numero == 0)
	{
	$GRP = $row["INICIALES_GRUPO"];
	}
	if($numero == 1)
	{
	$GRP1 = $row["INICIALES_GRUPO"];
	}
	if($numero == 2)
	{
	$GRP2 = $row["INICIALES_GRUPO"];
	}
	if($numero == 3)
	{
	$GRP3 = $row["INICIALES_GRUPO"];
	}
	$numero++;
  }
mysql_free_result($result2);
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
 <!--link href='http://fonts.googleapis.com/css?family=Paprika' rel='stylesheet' type='text/css' / -->
  <link rel="stylesheet" type="text/css" href="Style/Estilo_descripcion_radicado.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
 <!--  <script type="text/javascript" src="ingreso_sin_recargar.js"></script> -->
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src="js/jquery.ui.datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="Style/ingreso_sin_recargar.css">
  <link rel="stylesheet" href="style/estilopopup.css" />
  <script type="text/javascript" src="js/tinybox.js"></script>
    <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <script language = javascript>
function elije()
{
	 descuento = document.getElementById('descuento2').value;
	 
	 if(descuento > 0)
{
ejecutar=seleccionas();
}
else
{
ejecutar=seleccions();	
}
	
}


function descuentoas()
{
	 activar=document.getElementById('activars');
	 neto2 =document.getElementById('neto2');
	 descuento = document.getElementById('descuento2');
	 if(activar.checked == true)
	 {
        neto2.readOnly = false;
		descuento.readOnly = false;
	 }
	 else
	 {
		  neto2.readOnly = true;
		descuento.readOnly = true;
	 }
}

function descuentoa()
{
	 activar=document.getElementById('activara');
	 neto =document.getElementById('neto');
	 descuento = document.getElementById('descuento');
	 if(activar.checked == true)
	 {
        neto.readOnly = false;
		descuento.readOnly = false;
	 }
	 else
	 {
		  neto.readOnly = true;
		descuento.readOnly = true;
	 }
}
  /*
  
function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
/*	var xmlhttp=false; 
	try 
	{ 
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ 
			// Creacion del objeto AJAX para IE 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') { xmlhttp=new XMLHttpRequest(); } 

	return xmlhttp; 
} 
*/
function eliminaEspacios(cadena)
{
	// Funcion equivalente a trim en PHP
	var x=0, y=cadena.length-1;
	while(cadena.charAt(x)==" ") x++;	
	while(cadena.charAt(y)==" ") y--;	
	return cadena.substr(x, y-x+1);
}
/*
function cargaDatos(idDiv, idInput)
{         
	var valorInput=document.getElementById(idInput).value;
	var valorCOD=document.getElementById("codigo_radicado").value;
	var valorDIA=document.getElementById('dias_radicado').value;
	var valorRUT=document.getElementById('rut').value;
	var valorNETO=document.getElementById('neto').value;
	var valorNETO2=document.getElementById('neto2').value;
	var valorIVA=document.getElementById('iva').value;
	var valorTOTAL=document.getElementById('total').value;
	var divError=document.getElementById("error");
	
	// Elimino todos los espacios en blanco al principio y al final de la cadena
	valorInput=eliminaEspacios(valorInput);
	
	
	// Valido con una expresion regular el contenido de lo que el usuario ingresa
	
		// Si no hay error oculto el div (por si se mostraba)
		divError.style.display="none";
		mostrandoInput=false;
		
		// Creo objeto AJAX y envio peticion al servidor
		var ajax=nuevoAjax();
		ajax.open("GET", "ingreso_sin_recargar_rocha.php?dato="+valorInput+"&actualizar="+idInput+"&COD="+valorCOD+"&DIA="+valorDIA+"&RUT="+valorRUT+"&NETO="+valorNETO+"&IVA="+valorIVA+"&TOTAL="+valorTOTAL+"&NETO2="+valorNETO2, true);
	
		
		ajax.send(null);
	
}*/

var mostrandoInput=false;

$(function(){

	 $('#cliente').autocomplete({
                   source : 'ajaxCliente.php',
                   select : 
				   function(event, ui)
				   {
                      $('#rut').slideUp('slow', function()
					   {
                            $('#rut').val(
                                 ui.item.rut);
							
                       });
                       $('#rut').slideDown('slow');
                   }
                 });
				  });	

////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){
  $('#txt_actividades').click(function(){
        $('#popup1').fadeIn('slow');
    });

    $('#close1').click(function(){
        $('#popup1').fadeOut('slow');
    });
});

$(document).ready(function(){
  $('#menos').click(function(){
        $('#servicios').fadeOut('slow');
		$('#mas').fadeIn('slow');
		$('#menos').fadeOut('slow');
    });

    $('#mas').click(function(){
        $('#servicios').fadeIn('slow');
		$('#menos').fadeIn('slow');
		$('#mas').fadeOut('slow');
    });
});

$(document).ready(function(){
  $('#menos1').click(function(){
        $('#tabla_oc').fadeOut('slow');
		$('#mas1').fadeIn('slow');
		$('#menos1').fadeOut('slow');
    });

    $('#mas1').click(function(){
        $('#tabla_oc').fadeIn('slow');
		$('#menos1').fadeIn('slow');
		$('#mas1').fadeOut('slow');
    });
});

$(document).ready(function(){
  $('#menos2').click(function(){
        $('#tabla_bod').fadeOut('slow');
		$('#mas2').fadeIn('slow');
		$('#menos2').fadeOut('slow');
    });

    $('#mas2').click(function(){
        $('#tabla_bod').fadeIn('slow');
		$('#menos2').fadeIn('slow');
		$('#mas2').fadeOut('slow');
    });
});
//////////////////////////////////////////////////////////////////////////
   $(function(){
        	$('#fecha_ingreso').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
				$('#fecha_entrega').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
					$('#fecha_acta').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
    });

$(function() 
  {  	//$( "#fecha_ingreso").datepicker ({dateFormat: 'yy-mm-dd'});
                 
		//$( "#fecha_entrega").datepicker ({dateFormat: 'yy-mm-dd'});
		      
		$( "#fecha_contacto").datepicker ({dateFormat: 'yy-mm-dd'});
		$( "#fecha_inicior").datepicker ({dateFormat: 'yy-mm-dd'});
		$( "#fecha_entregar").datepicker ({dateFormat: 'yy-mm-dd'});
	//	$( "#fecha_acta").datepicker ({dateFormat: 'yy-mm-dd'});
  });
  function fecha()
  {
	  $('#txt_fechai_servicio').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
	  $('#txt_fechae_servicio').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
  }
//////////////////////////////////////////////////////////////////////////
function enviar()
{
  document.getElementById("formulario").submit();
} 
function enviar1()
{
  document.getElementById("formulario1").submit();
} 
/////////////////////////////////////////////////////////////////////////
function dias1()
{
var fecha1= document.getElementById('txt_fechai_servicio').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_fechae_servicio').value;
var dia2= fecha2.substr(8,2);
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

function dias()
{
var fecha1= document.getElementById('fecha_ingreso').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('fecha_entrega').value;
var dia2= fecha2.substr(8,2);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));

document.getElementById('dias_radicado').value=dias; 
}

function dias2()
{
var fecha1= document.getElementById('fecha_inicior').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('fecha_entregar').value;
var dia2= fecha2.substr(8,2);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));

document.getElementById('dias_rocha').value=dias; 
}

 $(function(){
                $('#disenador').autocomplete({
                   source : 'ajaxEmpleado.php',
                   select : 
				   function(event, ui)
				   {
                       
                   }
                 });
            });
			$(function(){
                $('#director').autocomplete({
                   source : 'ajaxEmpleado.php',
                   select : 
				   function(event, ui)
				   {
                       
                   }
                 });
            });
			
$(document).ready(function(){
  $('#txt_observaciones').click(function(){
        $('#popup').fadeIn('slow');
    });

    $('#close').click(function(){
        $('#popup').fadeOut('slow');
    });
	});	
	
function totalw()
{
var descuento = document.getElementById('descuento').value ;	
var sub_total = document.getElementById('sub_total').value;
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
descuento = descuento.replace(/\./g ,"");
descuento = descuento.replace(/\,/g ,".");
des1 = sub_total * descuento / 100;
des1 = Math.round(sub_total - des1);
document.getElementById('neto').value = des1;
if(descuento2 > 0)
{
ejecutar=seleccionas();
}
else
{
ejecutar=seleccions();	
}
}

function seleccions()
{
var sub_total = document.getElementById('sub_total').value;	
var total = document.getElementById('total').value;
var iva = document.getElementById('iva').value;
var neto =document.getElementById('neto').value
var iva1  = document.getElementById('iva1');
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
neto = neto.replace(/\./g ,"");
neto = neto.replace(/\,/g ,".");
if(iva1.selectedIndex == "1")
{
	des1 =  Math.round(neto * 10 / 100);
	des2 =  Math.round(parseInt(neto) - parseInt(des1));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "2")
{
	des1 =  Math.round(neto * 19 / 100);
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "3")
{
	des1 =  0;
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
}
/** */
function totalas()
{
var sub_total = document.getElementById('neto').value;
var neto = document.getElementById('neto2').value ;
var descuento = document.getElementById('descuento2').value ;
var total = document.getElementById('total').value;
var iva = document.getElementById('iva').value;
var iva1  = document.getElementById('iva1').value;
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
descuento = descuento.replace(/\./g ,"");
descuento = descuento.replace(/\,/g ,".");
des1 = sub_total * descuento / 100;
des1 = Math.round(sub_total - des1);
document.getElementById('neto2').value = des1;
if(descuento > 0)
{
ejecutar=seleccionas();
}
else
{
ejecutar=seleccions();	
}
}

function seleccionas()
{
var sub_total = document.getElementById('neto').value;	
var total = document.getElementById('total').value;
var iva = document.getElementById('iva').value;
var neto =document.getElementById('neto2').value;
var iva1  = document.getElementById('iva1');
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
neto = neto.replace(/\./g ,"");
neto = neto.replace(/\,/g ,".");
if(iva1.selectedIndex == "1")
{
	des1 =  Math.round(neto * 10 / 100);
	des2 =  Math.round(parseInt(neto) - parseInt(des1));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "2")
{
	des1 =  Math.round(neto * 19 / 100);
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "3")
{
	des1 =  0;
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
}

function seleccion1()
{
Sillas = document.getElementById('Sillas');	
Produccion= document.getElementById('Produccion');	
General = document.getElementById('General');	
Despacho = document.getElementById('Despacho');
Instalacion = document.getElementById('Instalacion');
Servicio = document.getElementById('Servicio');

var Nombre = document.getElementById('txt_nombre_servicio').selectedIndex;

if(Nombre == '1')
{
	javascript:TINY.box.size(470,350,1)
	
	Sillas.style.display = "none";
	Servicio.style.display = "none";
	Produccion.style.display = "";
	Despacho.style.display = "none";
	General.style.display = "none";
	Instalacion.style.display = "none";
}
 
else if(Nombre == '2')
{
	javascript:TINY.box.size(470,390,1)	
	
	Sillas.style.display = "none";
	Produccion.style.display = "none";
    Servicio.style.display = "none";
    Instalacion.style.display = "none";
    General.style.display = "";
	Despacho.style.display = "";
}
else if (Nombre == '3')
{
	javascript:TINY.box.size(470,470,1)
	
	Sillas.style.display = "none";
	Produccion.style.display = "none";
    Servicio.style.display = "none";
	Instalacion.style.display = "";
	General.style.display = "";
	Despacho.style.display = "none";
}

else if (Nombre == '9')
{
	javascript:TINY.box.size(470,380,1)
	
	Sillas.style.display = "none";
	Produccion.style.display = "none";
	Servicio.style.display = "";
	Instalacion.style.display = "none";
	General.style.display = "none";
	Despacho.style.display = "none";
}
else if (Nombre == '6')
{
	javascript:TINY.box.size(470,350,1)
	
	Sillas.style.display = "";
	Servicio.style.display = "none";
	Produccion.style.display = "none";
	Instalacion.style.display = "none";
	General.style.display = "none";
	Despacho.style.display = "none";
}

else if (Nombre == '4' || '5' || '7' || '8')
{
	javascript:TINY.box.size(470,320,1)
	
	Sillas.style.display = "none";
	Servicio.style.display = "none";
	Produccion.style.display = "none";
	Instalacion.style.display = "none";
	General.style.display = "none";
	Despacho.style.display = "none";
	Desarrollo.style.display = "";
	Mantencion.style.display = "";
	Bodega.style.display = "";
	Sistema.style.display = "";
}

else 
{
	javascript:TINY.box.size(470,350,1)
	
   Sillas.style.display = "none";	
   Produccion.style.display = "none";
   Servicio.style.display = "none";
   Instalacion.style.display = "none";
   Despacho.style.display = "none";
   General.style.display = "none";
}
}

</script>
</head>
<body>

<form action="scriptModificarProyecto.php" method="post">

  <table width="100%" id="tabla_rocha" rules="all" border="1">
    <tr>
      <td width="108" rowspan="7" style=" background-color:#B7DBFF" align="center" ><input name = "codigo_radicado" style="border:#B7DBFF 1px solid;background:#B7DBFF;width:95%;" type="text" id = "codigo_radicado" value="<?php echo $CODIGO_PROYECTO ?>" /></td>
      <td width="125" style=" background-color:#B7DBFF">Cliente</td>
      <td width="139"> <input name="cliente" id="cliente" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $CLIENTE ?>"></td>
      <td width="117" style=" background-color:#B7DBFF">Director</td>
       
      <td width="137"><select name="director" id="director" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" >
<option><?php echo ($DIRECTOR) ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
</select></td>
      <td  width="147" rowspan="2" style=" background-color:#B7DBFF">Fecha de Ingreso</td> 
      <td width="116" rowspan="2"><input onchange="dias();" name="fecha_ingreso" readonly="readonly" id="fecha_ingreso" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $FECHA_INGRESO ?>"></td>
    </tr>
    <tr>
      <td style=" background-color:#B7DBFF">Rut</td>
      <td><input name="rut" id="rut" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $RUT_CLIENTE?>"></td>
      <td style=" background-color:#B7DBFF">Diseñador</td>
      <td><select name="disenador" id="disenador" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" >
<option><?php echo $DISENADOR ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DAM'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
</select></td>
      </tr>
    <tr>
      <td style=" background-color:#B7DBFF">Obra</td>
      <td><input name="obra" id="obra" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $OBRA?>"/></td>
      <td style=" background-color:#B7DBFF">Contacto</td>
      <td><input name="contacto" id="contacto" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;"  value="<?php echo $CONTACTO?>"/></td>
      <td rowspan="2" style=" background-color:#B7DBFF">Fecha de Entrega</td>
      <td rowspan="2"><input onchange="dias();" name="fecha_entrega" id="fecha_entrega" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $FECHA_ENTREGA ?>" /></td>
    </tr>
    <tr>
      <td style=" background-color:#B7DBFF">Direccion Obra</td>
      <td><input  name="direccion_obra" id="direccion_obra" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $DIRECCION_OBRA?>"/></td>
      <td style=" background-color:#B7DBFF">Fono</td>
      <td><input name="fono" id="fono" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $FONO?>"/></td>
      </tr>
    <tr>
      <td style=" background-color:#B7DBFF">OC</td>
      <td><input name="oc" id="oc" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $OC?>"/></td>
      <td style=" background-color:#B7DBFF">Mail</td>
      <td><input name="mail" id="mail" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $MAIL?>"/></td>
      <td rowspan="2" style=" background-color:#B7DBFF"><p> Dias
      </p>        <p>&nbsp;</p></td>
      <td rowspan="2"><input name="dias_radicado" id="dias_radicado"  type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $DIAS ?>" /></td>
    </tr>
    <tr>
      <td style=" background-color:#B7DBFF">Condicion de Pago</td>
      <td><input name="condicion_pago" id="condicion_pago" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;"  value="<?php echo $CONDICION_PAGO?>"/></td>
      <td style=" background-color:#B7DBFF">Validez Cotizacion</td>
      <td><input name="validez" id="validez" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;"   value="<?php echo $VALIDEZ?>"/></td>
      </tr> 
    <tr>
      <td style=" background-color:#B7DBFF">Dept. Credito</td>
      <td><input name="departamento_credito" id="departamento_credito" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;"  value="<?php echo $DEPARTAMENTO_CREDITO?>"/></td>
      <td style=" background-color:#B7DBFF">Puestos</td>
      <td><input name="puestos" id="puestos" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo $PUESTOS;?>" /></td>
      <td style=" background-color:#B7DBFF">Fecha Acta</td>
      <td><input  name="fecha_acta" id="fecha_acta" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;"   value="<?php echo $FECHA_ACTA; ?>"></td>
    </tr>
    <tr>
      <td rowspan="8" style=" background:#FFEAC4;">&nbsp;</td>
      <td  colspan="4" rowspan="2" style =" background:#7CC6F1;">Observaciones</td>
      <td style =" background:#7CC6F1;">Sub Total</td>
      <td><input name="sub_total" id="sub_total" onchange="totalw();"  type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" value="<?php echo number_format($SUB_TOTAL,0, ",", ".") ?>" />
      </td>
    </tr>
    <tr>
      <td style =" background:#7CC6F1;">Descuento &nbsp; <input id="activara" type="checkbox" name="activara" value="" onclick="descuentoa();"></td>
      <td><input readonly="readonly" name="descuento" id="descuento" onchange="totalw();" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;"  value="<?php echo number_format($DESCUENTO,2, ",", ".");?>" /></td>
      </tr>
      
    <tr>
      <td onclick="TINY.box.show({url:'generarobsproyecto.php?CODIGO_PROYECTO=<?php echo $CODIGO_PROYECTO?>',width:680,height:320})" colspan="4" rowspan="6"><?php $sql111 = "SELECT actualizaciones.NOMBRE_USUARIO,actualizaciones.OBSERVACIONES, actualizaciones.FECHA,actualizaciones.USUARIO, actualizaciones.RAZON, actualizaciones.AREA FROM actualizaciones_general, 
actualizaciones,proyecto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_GENERAL = proyecto.CODIGO_PROYECTO and proyecto.CODIGO_PROYECTO = '".($CODIGO_PROYECTO)."' ORDER BY ACTUALIZACIONES.CODIGO_ACTUALIZACIONES DESC";
$result111 = mysql_query($sql111, $conn) or die(mysql_error());
echo "<textarea style='border:#fff 1px solid; margin:3px; width:99%; height:75px;' id='txt_observaciones' name = 'txt_observaciones'>";
 while($row = mysql_fetch_array($result111))
  {
	$OBSERVACIONES_A = $row["OBSERVACIONES"];
	$FECHA_A = $row["FECHA"];
	$USUARIO_A = $row["USUARIO"];
	$NOMBRE_A = $row["NOMBRE_USUARIO"];
	$AREA = $row["AREA"];
	$RAZON = $row["RAZON"];
    echo "" .$NOMBRE_A ." ".$FECHA_A . " ".$OBSERVACIONES_A . "\n".$AREA . " ".$RAZON . "\n"; 
  }
  echo "</textarea>"; ?> </td>
      <td style =" background:#7CC6F1;">Neto</td>
      <td><input  name="neto" id="neto" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;"  onchange="totalw();"  value="<?php echo number_format($NETO,0, ",", ".")?>" /></td>
    </tr>
    <tr>
      
      <td style ="background:#7CC6F1;">Descuento 2 &nbsp; <input id="activars" name="activars" type="checkbox" value="" onclick="descuentoas();"/></td>
      <td><input readonly="readonly" name="descuento2" id="descuento2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;"  onchange="totalas();"  value="<?php echo number_format($DESCUENTO2,2, ",", ".");?>" /></td>
    </tr>
    <tr>
      <td style =" background:#7CC6F1;">Neto 2</td>
      <td><input name="neto2" id="neto2" readonly="readonly" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;"  onchange="totalas();"  value="<?php echo number_format($NETO2,0, ",", ".");?>" /></td>
    </tr>
    <tr>
      <td style =" background:#7CC6F1;">Iva &nbsp;
       <select onchange="elije();" style="background:#7CC6F1;border:#7CC6F1 1px solid;height:14px; font-size:10px;" id = "iva1" name="iva1">
         <option></option>
          <option <?php echo $t_Iva_Retenido?>>Iva Retenido</option>
          <option <?php echo $t_iva?>>Iva</option>
          <option <?php echo $t_Retencio?>>Retencion</option>
        </select></td>
      <td><input name="iva" id="iva" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;"   value="<?php echo number_format($IVA,0, ",", ".");?>" />
       </td>
    </tr>
    <tr>
      <td style =" background:#7CC6F1;"><b>Total</b></td>
      <td><input name="total" id="total" type ="text" style="border:#fff 1px solid;height:14px;font:bold 12px;width:95%;"  value="<?php echo number_format($TOTAL,0, ",", ".");?>" /></td>
    </tr>
    <tr>
      <td style =" background:#7CC6F1;">Estado</td>
      <td><select  style="border:#fff 1px solid;height:14px; font-size:10px;" id = "estado" name="estado">
<option><?php echo $ESTADO ?></option>
<option>EN PROCESO</option>
<option>OK</option>
<option>ACTA</option>
<option>NULA</option>
</select></td>
    </tr>
    </table>
    <br />
    <input type="submit" value="Ingresar"  style="width: 200px; height: 30px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/>
    </form>
    <br />

<!--
  <table id="factura" width="935" rules="all" border="1">
    <tr>
      <td colspan="9"  style=" background-color:#B7DBFF">Facturacion</td>
      </tr>
    <tr>
      <td width="38"  style=" background-color:#B7DBFF">Cliente</td>
      <td width="128">&nbsp;</td>
      <td width="63" align="center"  style=" background-color:#B7DBFF">Factura</td>
      <td width="119" align="center"  style=" background-color:#B7DBFF">Cliente</td>
      <td width="114" align="center"  style=" background-color:#B7DBFF">Fecha Emision</td>
      <td width="99" align="center"  style=" background-color:#B7DBFF">Fecha Vencimiento</td>
      <td width="106" align="center"  style=" background-color:#B7DBFF">Monto</td>
      <td width="111" align="center"  style=" background-color:#B7DBFF">Estado</td>
      <td width="99" align="center"  style=" background-color:#B7DBFF">Pago</td>
    </tr>
    <tr>
      <td  style=" background-color:#B7DBFF">Rut</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  style=" background-color:#B7DBFF">Giro</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  style=" background-color:#B7DBFF">Direccion</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  style=" background-color:#B7DBFF">Fono</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  -->
  <br />
<div style="display:none;" class="mensaje" id="error"></div>
<form id = 'formulario'  name = 'formulario' method="GET" action=""/>
<table width="100%" id = "tabla_actividades" rules="all" border="1" style="">
<tr>
<td  style=" background-color:#B7DBFF" >Actividades</td>
<td  style=" background-color:#B7DBFF" align="center" >Todas</td>
<td  align="center" width="81"><input   <?php echo $TODOS; ?>  type="radio" name="ESTADO" value="TODOS" /></td>
<td  style=" background-color:#B7DBFF" align="center" >En Proceso</td>
<td  align="center" width="70"><input  <?php echo $PROCESO; ?> type="radio" name="ESTADO" value="EN PROCESO" /></td>
<td  style=" background-color:#B7DBFF" align="center" >Ok</td>
<td  align="center" width="70"><input  <?php echo $OK; ?>  type="radio" name="ESTADO" value="OK" /></td>
<td  style=" background-color:#B7DBFF" align="center" width=""><input type="submit" value="Aceptar" style="width:70px; border:#fff 1px solid;" /></td>
<td  align="center" width="115"><input onclick="TINY.box.show({url:'generareditarproyecto.php?CODIGO_PROYECTO=<?php echo $CODIGO_PROYECTO?>&CODIGO_USUARIO=<?php echo $USUARIO?>'});" type="button" value="Generar" style="width:70px; border:#fff 1px solid;" id = "txt_actividades" name = "txt_actividades"></td>
<td  style=" background-color:#B7DBFF" align="center" ><a style="display:none" href="#" id="mas"> + </a> <a  href="#" id="menos"> - </a></td>
</tr>
</table>

<input id = "CODIGO_PROYECTO" name = "CODIGO_PROYECTO" style="display:none;" value="<?php echo $CODIGO_PROYECTO ?>">
</form>
<!------------------------------------------------------------------------------------------------------------>
<div id = "servicios">
<table width="100%" id="tabla_servicio" cellpadding="0" cellspacing="0">
<col width="60" />
</tr>
<?php
$fin=0;
if($ESTADOV == "TODOS")
{
$sql555 = "select * FROM servicio where CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' AND  not NOMBRE_SERVICIO='OC'";
}
else
{
$sql555 = "select * FROM servicio where CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' AND ESTADO  = '".$ESTADOV."' AND  not NOMBRE_SERVICIO='OC' ";
}
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
	$RECLAMOS  = $row["RECLAMOS"];
	if($NOMBRE_SERVICIO1 == "Produccion")
	{
	echo "<tr><td align='center' style='background:blue;color:#fff;border-bottom:#999' rowspan='2' colspan='10'> <a style='color:#fff;
	text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" . 
	    $NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:blue;color:#fff;'><center>N°</center></td>";	
	echo "<td style='background:blue;color:#fff;'><center>Descripcion</center></td>";
	echo "<td style='background:blue;color:#fff;'><center>Reclamo</center></td>";
	echo "<td   style='background:blue;color:#fff;'><center>Fecha Inicio</center></td>";	
	echo "<td  ' style='background:blue;color:#fff;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:blue;color:#fff;'><center>Dias</center></td>";	
	echo "<td   style='background:blue;color:#fff;'><center>Usuario</center></td>";
	echo "<td  ' style='background:blue;color:#fff;'><center>Supervisor</center></td>";	
	echo "<td style='background:blue;color:#fff;'><center>Observacion</center></td>";	
	echo "<td  style='background:blue;color:#fff;'><center>Estado</center></td></tr>";	
	}
	else if($NOMBRE_SERVICIO1 == "Instalacion")
	{
	echo "<tr><td align='center' style='background:#B10F0F; color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
	text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" . 
	    $NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:#B10F0F;color:#fff;'><center>N°</center></td>";	
	echo "<td style='background:#B10F0F;color:#fff;'><center>Descripcion</center></td>";
	echo "<td style='background:#B10F0F;color:#fff;'><center>Reclamo</center></td>";
	echo "<td width='70' style='background:#B10F0F;color:#fff;'><center>Fecha Inicio</center></td>";	
	echo "<td width='70' style='background:#B10F0F;color:#fff;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#B10F0F;color:#fff;'><center>Dias</center></td>";	
	echo "<td style='background:#B10F0F;color:#fff;'><center>Usuario</center></td>";
	echo "<td style='background:#B10F0F;color:#fff;'><center>Supervisor</center></td>";	
	echo "<td style='background:#B10F0F;color:#fff;'><center>Observacion</center></td>";	
	echo "<td style='background:#B10F0F;color:#fff;'><center>Estado</center></td></tr>";	
	}
	 else if($NOMBRE_SERVICIO1 == "Adquisiciones")
	{
	echo "<tr><td align='center' style='background:#36C444; color:#fff;' rowspan='2' colspan='10'> <a style='color:#FFF;
	text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" . 
	$NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:#36C444;color:#fff;'><center>N°</center></td>";	
	echo "<td style='background:#36C444;color:#fff;'><center>Descripcion</center></td>";
	echo "<td style='background:#36C444;color:#fff;'><center>Reclamo</center></td>";
	echo "<td width='70' style='background:#36C444;color:#fff;'><center>Fecha Inicio</center></td>";	
	echo "<td width='70' style='background:#36C444;color:#fff;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#36C444;color:#fff;'><center>Dias</center></td>";	
	echo "<td style='background:#36C444;color:#fff;'><center>Usuario</center></td>";
	echo "<td style='background:#36C444;color:#fff;'><center>Supervisor</center></td>";	
	echo "<td style='background:#36C444;color:#fff;'><center>Observacion</center></td>";	
	echo "<td style='background:#36C444;color:#fff;'><center>Estado</center></td></tr>";		
	}
	else if($NOMBRE_SERVICIO1 == "Despacho")
	{
	echo "<tr><td align='center' style='background:#FFFF00; color:#060;' rowspan='2' colspan='10'> <a style='color:black;
	text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" . 
	$NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:#FFFF00'><center>N°</center></td>";	
	echo "<td style='background:#FFFF00;'><center>Descripcion</center></td>";
	echo "<td style='background:#FFFF00;'><center>Reclamo</center></td>";
	echo "<td width='70' style='background:#FFFF00;'><center>Fecha Inicio</center></td>";	
	echo "<td width='70' style='background:#FFFF00;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#FFFF00;'><center>Dias</center></td>";	
	echo "<td style='background:#FFFF00;'><center>Usuario</center></td>";
	echo "<td style='background:#FFFF00;'><center>Supervisor</center></td>";	
	echo "<td style='background:#FFFF00;'><center>Observacion</center></td>";	
	echo "<td style='background:#FFFF00;'><center>Estado</center></td></tr>";		
	}
	else if($NOMBRE_SERVICIO1 == "Desarrollo")
	{
	echo "<tr><td align='center' style='background:#E46F1C; color:#060;' rowspan='2' colspan='10'> <a style='color:black;
	text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" . 
	$NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:#E46F1C;'><center>N°</center></td>";	
	echo "<td style='background:#E46F1C;'><center>Descripcion</center></td>";
	echo "<td style='background:#E46F1C;'><center>Reclamo</center></td>";
	echo "<td width='70' style='background:#E46F1C;'><center>Fecha Inicio</center></td>";	
	echo "<td width='70' style='background:#E46F1C;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#E46F1C;'><center>Dias</center></td>";	
	echo "<td style='background:#E46F1C;'><center>Usuario</center></td>";
	echo "<td style='background:#E46F1C;'><center>Supervisor</center></td>";	
	echo "<td style='background:#E46F1C;'><center>Observacion</center></td>";	
	echo "<td style='background:#E46F1C;'><center>Estado</center></td></tr>";		
	}
	else if($NOMBRE_SERVICIO1 == "Mantencion")
	{
	echo "<tr><td align='center' style='background:#642EFE; color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
	text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" . 
	$NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:#642EFE;color:#fff;'><center>N°</center></td>";	
	echo "<td style='background:#642EFE;color:#fff;'><center>Descripcion</center></td>";
	echo "<td style='background:#642EFE;color:#fff;'><center>Reclamo</center></td>";
	echo "<td width='70' style='background:#642EFE;color:#fff;'><center>Fecha Inicio</center></td>";	
	echo "<td width='70' style='background:#642EFE;color:#fff;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#642EFE;color:#fff;'><center>Dias</center></td>";	
	echo "<td style='background:#642EFE;color:#fff;'><center>Usuario</center></td>";
	echo "<td style='background:#642EFE;color:#fff;'><center>Supervisor</center></td>";	
	echo "<td style='background:#642EFE;color:#fff;'><center>Observacion</center></td>";	
	echo "<td style='background:#642EFE;color:#fff;'><center>Estado</center></td></tr>";		
	}
	else if($NOMBRE_SERVICIO1 == "Sillas")
	{
	echo "<tr><td align='center' style='background:#0080FF; color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
	text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" . 
	$NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:#0080FF;color:#fff;'><center>N°</center></td>";	
	echo "<td style='background:#0080FF;color:#fff;'><center>Descripcion</center></td>";
	echo "<td style='background:#0080FF;color:#fff;'><center>Reclamo</center></td>";
	echo "<td width='70' style='background:#0080FF;color:#fff;'><center>Fecha Inicio</center></td>";	
	echo "<td width='70' style='background:#0080FF;color:#fff;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#0080FF;color:#fff;'><center>Dias</center></td>";	
	echo "<td style='background:#0080FF;color:#fff;'><center>Usuario</center></td>";
	echo "<td style='background:#0080FF;color:#fff;'><center>Supervisor</center></td>";	
	echo "<td style='background:#0080FF;color:#fff;'><center>Observacion</center></td>";	
	echo "<td style='background:#0080FF;color:#fff;'><center>Estado</center></td></tr>";		
	}
    else if($NOMBRE_SERVICIO1 == "Bodega")
	{
	echo "<tr><td align='center' style='background:#DF01D7; color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
	text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" . 
	$NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:#DF01D7;color:#fff;'><center>N°</center></td>";	
	echo "<td style='background:#DF01D7;color:#fff;'><center>Descripcion</center></td>";
	echo "<td style='background:#DF01D7;color:#fff;'><center>Reclamo</center></td>";
	echo "<td width='70' style='background:#DF01D7;color:#fff;'><center>Fecha Inicio</center></td>";	
	echo "<td width='70' style='background:#DF01D7;color:#fff;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#DF01D7;color:#fff;'><center>Dias</center></td>";	
	echo "<td style='background:#DF01D7;color:#fff;'><center>Usuario</center></td>";
	echo "<td style='background:#DF01D7;color:#fff;'><center>Supervisor</center></td>";	
	echo "<td style='background:#DF01D7;color:#fff;'><center>Observacion</center></td>";	
	echo "<td style='background:#DF01D7;color:#fff;'><center>Estado</center></td></tr>";		
	}
	else if($NOMBRE_SERVICIO1 == "Sistema")
	{
	echo "<tr><td align='center' style='background:black; color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
	text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" . 
	$NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:black;color:#fff;'><center>N°</center></td>";	
	echo "<td style='background:black;color:#fff;'><center>Descripcion</center></td>";
	echo "<td style='background:black;color:#fff;'><center>Reclamo</center></td>";
	echo "<td width='70' style='background:black;color:#fff;'><center>Fecha Inicio</center></td>";	
	echo "<td width='70' style='background:black;color:#fff;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:black;color:#fff;'><center>Dias</center></td>";	
	echo "<td style='background:black;color:#fff;'><center>Usuario</center></td>";
	echo "<td style='background:black;color:#fff;'><center>Supervisor</center></td>";	
	echo "<td style='background:black;color:#fff;'><center>Observacion</center></td>";	
	echo "<td style='background:black;color:#fff;'><center>Estado</center></td></tr>";		
	}
	else if($NOMBRE_SERVICIO1 == "Servicio Tecnico")
	{
	echo "<tr><td align='center' style='background:#886A08;color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
	text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" . 
	$NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:#886A08;color:#fff;'><center>N°</center></td>";	
	echo "<td style='background:#886A08;color:#fff;'><center>Descripcion</center></td>";
	echo "<td style='background:#886A08;color:#fff;'><center>Reclamo</center></td>";
	echo "<td width='70' style='background:#886A08;color:#fff;'><center>Fecha Inicio</center></td>";	
	echo "<td width='70' style='background:#886A08;color:#fff;'><center>Fecha Entrega</center></td>";	
	echo "<td style='background:#886A08;color:#fff;'><center>Dias</center></td>";	
	echo "<td style='background:#886A08;color:#fff;'><center>Usuario</center></td>";
	echo "<td style='background:#886A08;color:#fff;'><center>Supervisor</center></td>";	
	echo "<td style='background:#886A08;color:#fff;'><center>Observacion</center></td>";	
	echo "<td style='background:#886A08;color:#fff;'><center>Estado</center></td></tr>";		
	}
	
	
    echo "<tr><td width='50' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$CODIGO_SERVICIO1."</center></td>";
	echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".($DESCRIPCION1)."</center></td>";
		echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$RECLAMOS ."</center></td>";
	echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$FECHA_I1 ."</center></td>";	
	echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$FECHA_E1."</center></td>";	
	echo "<td width='70'style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$DIAS1."</center></td>";	
	echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$REALIZADOR1."</center></td>";
	echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$SUPERVISOR1."</center></td>";	
	echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".($OBSERVACION1)."</center></td>";	
	echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;border-right:#E4E4E7 1px solid'><center>".$ESTADO1."</center></td></tr>";
	
	echo"<tr><td> &nbsp; </td></tr>";
  }
?>
</table>
</div>

<br />
<form id = 'formulario1'  name = 'formulario1' method="GET" action=""/>
<table width="100%" id = "tabla_oc_form" rules="all" border="1" style="">
<tr>
<td  style=" background-color:#BCF5A9;" width="">Orden de compra</td>
<td  style=" background-color:#BCF5A9" align="center" width="">Todas</td>
<td  align="center" width=""><input   <?php echo $TODOS1; ?> type="radio" name="ESTADO1" value="TODOS" /></td>
<td  style=" background-color:#BCF5A9" align="center" width="">En Proceso</td>
<td  align="center" width=""><input  <?php echo $PROCESO1; ?>  type="radio" name="ESTADO1" value="EN PROCESO" /></td>
<td  style=" background-color:#BCF5A9" align="center" width="">Ok</td>
<td  align="center" width=""><input  <?php echo $OK1; ?> type="radio" name="ESTADO1" value="OK" /></td>
<td  style=" background-color:#BCF5A9" align="center" width=""><input type="submit" value="Aceptar"  style="width:70px; border:#fff 1px solid;" /></td>
<td  align="center" width=""><input type="button"  value="Generar" style="width:95%; border:#fff 1px solid;" id = "txt_actividades" name = "txt_actividades"></td>
<td  style=" background-color:#BCF5A9" align="center" width=""><a style="display:none" href="#" id="mas1"> + </a> <a  href="#" id="menos1"> - </a></td>
</tr>
</table>
<input id = "CODIGO_PROYECTO" name = "CODIGO_PROYECTO" style="display:none;" value="<?php echo $CODIGO_PROYECTO ?>">
</form>
<table width="100%" id="tabla_oc"  rules="all" border="1">
<tr>
<td width="" style=" background-color:#BCF5A9"><center>OC</center></td>
<td width=""style=" background-color:#BCF5A9"><center>Proveedor</center></td>
<td width="" style=" background-color:#BCF5A9"><center>Fecha ingreso</center></td>
<td width="" style=" background-color:#BCF5A9"><center>Fecha entrega</center></td>
<td  width="" style=" background-color:#BCF5A9"><center>Fecha confirmacion</center></td>
<td   width="" style=" background-color:#BCF5A9"><center>Estado</center></td>
<td style=" background-color:#BCF5A9"><center>Total</center></td>
</tr>
<?php
$fin=0;
if($ESTADOV1 == "TODOS")
{
$sql555 = "select DISTINCT orden_de_compra.FECHA_CONFIRMACION ,orden_de_compra.NOMBRE_PROVEEDOR, orden_de_compra.FECHA_ENTREGA , orden_de_compra.FECHA_REALIZACION , orden_de_compra.CODIGO_OC ,orden_de_compra.ESTADO from orden_de_compra,proyecto,oc_producto where orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' and not orden_de_compra.ESTADO = 'Nulo' and not orden_de_compra.ESTADO = 'Pendiente'  ";
}
else
{
$sql555 = "select DISTINCT orden_de_compra.FECHA_CONFIRMACION ,orden_de_compra.NOMBRE_PROVEEDOR, orden_de_compra.FECHA_ENTREGA , orden_de_compra.FECHA_REALIZACION , orden_de_compra.CODIGO_OC ,orden_de_compra.ESTADO from orden_de_compra,proyecto,oc_producto where orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' and orden_de_compra.ESTADO = '".$ESTADOV1."'";
}
$result555 = mysql_query($sql555, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result555))
  {
	$OC = $row["CODIGO_OC"];
	
	$ESTADO = $row["ESTADO"];
	
	$FECHA_I = $row["FECHA_REALIZACION"];
	$FECHA_E = $row["FECHA_ENTREGA"];
	$FECHA_C = $row["FECHA_CONFIRMACION"];
	$NOMBRE_PROVEEDOR= $row["NOMBRE_PROVEEDOR"];
$sql666 = "select sum(oc_producto.TOTAL) as TOTAL from orden_de_compra,proyecto,oc_producto where orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' and oc_producto.CODIGO_OC = '".$OC."'";
$result666 = mysql_query($sql666, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result666))
 {
	 
if($GRP == "DAM" || $GRP1 == "DAM" || $GRP2 == "DAM" || $GRP3 == "DAM" || $GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN" || $GRP == "INS" || $GRP1 == "INS" || $GRP2 == "INS" || $GRP3 == "INS"|| $GRP == "DES" || $GRP1 == "DES" || $GRP2 == "DES" || $GRP3 == "DES"   )
{ 
$TOTAL = 0;

}
else
{
    $TOTAL = $row["TOTAL"];  
}
	echo "<tr><td><center> <a target='_blank' href=scriptPacking.php?CODIGO_OC=" .$OC. ">" . 
	    $OC. "</a></center></td>";
	echo "<td><center>".$NOMBRE_PROVEEDOR."</center></td>";		
	echo "<td><center>".$FECHA_I."</center></td>";	
	echo "<td><center>".$FECHA_E."</center></td>";	
	echo "<td><center>".$FECHA_C."</center></td>";	
	echo "<td><center>".$ESTADO."</center></td>";	
	echo "<td align='right'>".number_format($TOTAL, 0, ",", ".")."</td></tr>";
	if($GRP == "DAM" || $GRP1 == "DAM" || $GRP2 == "DAM" || $GRP3 == "DAM" || $GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN" || $GRP == "INS" || $GRP1 == "INS" || $GRP2 == "INS" || $GRP3 == "INS"|| $GRP == "DES" || $GRP1 == "DES" || $GRP2 == "DES" || $GRP3 == "DES"   )
{ 
   $fin=0;
}
else
{
	$fin+=$row['TOTAL'];
}
  }
     mysql_free_result($result666);
  }
  echo "<tr><td colspan='6' align='right'><B>Total</B></td>";
  echo "<td  align='right'><B>".number_format($fin, 0, ",", ".")."</B></td></tr>";

?>
</table>
<br />
<!------------------------------------------------------------------------------------------------------------>
<!------------------------->
<table width="100%" id = "tabla_oc_form" rules="all" border="1" style="">
<tr>
<td style=" background-color:#BCF5A9;" width="866">Salida Bodega</td>
<td  style=" background-color:#BCF5A9" align="center" width="66"><a style="display:none" href="#" id="mas2"> + </a> <a  href="#" id="menos2"> - </a></td>
</tr>
</table>


<table id="tabla_bod" width="100%" rules="all" border="1">
<tr>
<td  width="" style=" background-color:#BCF5A9"><center>Documento</center></td>
<td  width="" style=" background-color:#BCF5A9"><center>Codigo</center></td>
<td width="" style=" background-color:#BCF5A9"><center>Descripcion</center></td>
<td width="" style=" background-color:#BCF5A9"><center>Fecha</center></td>
<td width="" style=" background-color:#BCF5A9"><center>User</center></td>
<td width=""style=" background-color:#BCF5A9"><center>Cantidad Ingresada</center></td>
<td width=""style=" background-color:#BCF5A9"><center>Cantidad Egresada</center></td>
</tr>
<?php


$sql666 = "SELECT producto.CODIGO_PRODUCTO,producto.DESCRIPCION, actualizaciones.NOMBRE_USUARIO,actualizaciones.ROCHA,actualizaciones.INGRESO,actualizaciones.EGRESO,actualizaciones.FECHA FROM actualizaciones_general,actualizaciones,producto WHERE producto.CODIGO_PRODUCTO = actualizaciones_general.CODIGO_PRODUCTO AND actualizaciones_general.CODIGO_ACTUALIZACIONES = actualizaciones.CODIGO_ACTUALIZACIONES AND actualizaciones.ROCHA = '".$CODIGO_PROYECTO."'";
$result666 = mysql_query($sql666, $conn) or die(mysql_error());
$INGRESOS = 0;
$EGRESOS = 0;
 while($row = mysql_fetch_array($result666))
 {
	$FECHAP = $row["FECHA"];
	$DESCRIPCION_P = $row["DESCRIPCION"];
	$ROCHAP = $row["ROCHA"];
	$INGRESOP = $row["INGRESO"];
	$EGRESOP = $row["EGRESO"];
	$CODIGO_PRODUCTO12 = $row["CODIGO_PRODUCTO"];
	$NOMBRE_USUARIOP= $row["NOMBRE_USUARIO"];
		echo "<tr><td><center> <a href=DescripcionOC1.php?CODIGO_OC=></a>".$ROCHAP."</center></td>";
	echo "<td><center> <a href=DescripcionOC1.php?CODIGO_OC=></a>".$CODIGO_PRODUCTO12."</center></td>"; 
	echo "<td><center> <a href=DescripcionOC1.php?CODIGO_OC=></a>".$DESCRIPCION_P."</center></td>";
	echo "<td><center>".$FECHAP."</center></td>";	
	echo "<td><center>".$NOMBRE_USUARIOP."</center></td>";		
	echo "<td align='right'>".$INGRESOP."</td>";	
	echo "<td align='right'>".$EGRESOP."</td></tr>";

	  $INGRESOS+=$row['INGRESO'];
	  $EGRESOS+=$row['EGRESO'];
}
  echo "<tr><td colspan='5' align='right'><B> Total</B></td>";
  echo "<td  align='right'><B>".number_format($INGRESOS, 0, ",", ".")."</B></td>";
  echo "<td  align='right'><B>".number_format($EGRESOS, 0, ",", ".")."</B></td></tr>";
   mysql_free_result($result666);
?>
</table>

</body>
</html>
