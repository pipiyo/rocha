<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

/* Codigo Usuario */

$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];





/* Consulta Usuairo */
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
    $nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$apellido_m = $row["apellido_materno"];
	$numero++;
  }
mysql_free_result($result1);


/* Valores vacios */

$BUSCAR_CODIGO ='';
$VENDEDOR ='';
$PROCESO='';
$CATEGORIA='';
$BUSCAR_VENDEDOR='';

/*Valor Estado */




/* Valor Fecha */
$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';





/*bUSCAR EN BETWEEN */
$buscaf = "FECHA_ENTREGA";

/*ORDEN FECHA */
$ordenfecha = 'FECHA_ENTREGA';

if(isset($_GET["buscari"] ))
{
if($_GET["buscari"] == 'Confirmacion')
{
$ordenfecha = 'FECHA_ENTREGA';
}
else
{
$ordenfecha = 'FECHA_INICIO';
}
}



/*Valor traido Por el formulario */

if (isset($_GET["buscar"]) || isset($_GET["buscarfe"])) 
{    

$BUSCAR_CODIGO = $_GET["buscar_codigo"];
$buscaf = $_GET["buscarfe"];

if($buscaf == 'Confirmacion')
{
	$buscaf = 'FECHA_ENTREGA';
}
else if($buscaf == 'Entrega')
{
	$buscaf = 'FECHA_PRIMERA_ENTREGA';
}
else if($buscaf == 'Inicio')
{
	$buscaf = 'FECHA_INICIO';
}
if(isset($_GET["buscar_vendedor"] ))  
{
$BUSCAR_VENDEDOR = $_GET["buscar_vendedor"];
}
if(isset($_GET["categoria"] ))  
{
$CATEGORIA = $_GET["categoria"];
}
if(isset($_GET["PROCESO"] ))  
{
$PROCESO  = $_GET["PROCESO"];
}
if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}
}

/*Permiso Usuario */


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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
   <title> Informe Produccion V1.5.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />



  <link rel="stylesheet" type="text/css" href="Style/style_informes.css" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
 
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
 <link rel="stylesheet" href="style/estilopopup.css" />
  <script type="text/javascript" src="js/tinybox.js"></script>
   
      
  <script language = javascript>
     function fecha13()
  {
	  $('#culq').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
	$('#fechaini').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});		
  }
  function valia()
{
	obs = document.getElementById('obs');
    buscar = document.getElementById('buscar4') ;
   despachar = document.getElementById('area').selectedIndex;
	 if (obs.value != "" && despachar != '0') 
    {	  
       buscar.disabled=false;
    }
	else
	{
	   buscar.disabled=true;
	}
}
function dias5()
{
var fecha1= document.getElementById('fechaini').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('culq').value;
var dia2= fecha2.substr(8,2);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));

fecha_texto = anyo1+"-"+mes1a+"-"+dia1;
ms = Date.parse(fecha1);
diasem =  new Date(ms).getDay();
dias = dias +1;
final = 0;
inicio=0;

while(inicio < dias)
{
	if(diasem == 6 )
	{
		diasem=-1;
	}
	else if( diasem == 0)
	{
		
	}
	else
	{
		final++;
	}
	inicio++;
	diasem++;
}
document.getElementById('diasini').value=final; 


//document.getElementById('dias_radicado').value= new Date(ms).getDay(); 
}
  $(function(){
                $('#buscar_codigo').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {      
                   }
                 });
				    });
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
  });     
  
  function enviar()
{
var as1= confirm("Realmente deseas modificar");

if(as1)                   
{
  document.getElementById("formulario11").submit();
}
else
{
  return false;
  //window.location="Materiales.php";
}
} 
    
	
function fecha()
  {
	  $('#txt_fechai').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
	  $('#txt_fechae').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
  }
  
  
function dias1()
{
var fecha1= document.getElementById('txt_fechai').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_fechae').value;
var dia2= fecha2.substr(8,2);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);
var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));
  
if(mes1 == '01')
{
	mesito = 'JANUARY';
}
else  if(mes1 == '02')
{
	mesito = 'FEBRUARY';
}
else  if(mes1 == '03')
{
	mesito = 'MARCH';
}
else  if(mes1 == '04')
{
	mesito = 'APRIL';
}
else  if(mes1 == '05')
{
	mesito = 'MAY';
}
else  if(mes1 == '06')
{
	mesito = 'JUNE';
}
else  if(mes1 == '07')
{
	mesito = 'JULY';
}
else  if(mes1 == '08')
{
	mesito = 'AUGUST';
}
else  if(mes1 == '09')
{
	mesito = 'SEPTEMBER';
}
else  if(mes1 == '10')
{
	mesito = 'OCTOBER';
}
else  if(mes1 == '11')
{
	mesito = 'NOVEMBER';
}
else  if(mes1 == '12')
{
	mesito = 'DECEMBER';
}
ms = Date.parse(mesito +" "+ dia1+","+anyo1);
diasem =  new Date(ms).getDay();
dias = dias +1;
final = 0;
inicio=0;

while(inicio < dias)
{
	if(diasem == 6 )
	{
		diasem=-1;
	}
	else if( diasem == 0)
	{
		
	}
	else
	{
		final++;
	}
	inicio++;
	diasem++;
}

      
document.getElementById('txt_dias').value=final; 
}
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});	
  });
  </script>
</head>
<body>
<form action="" method="get" name="formulario">
<center>
<table    id = "formulario">
<tr>
  <th id="tit_sil" height="37" colspan="11" align="center" style="color:#009;">Informe Sillas</th>
  </tr>
</table>
<br />
<center>  
<table id = "informe_sillas" cellpadding="0" cellspacing="0"  style="font-size:9px; width:98%;">
<?php
mysql_select_db($database_conn, $conn);
function dameFecha2($fecha,$dia)
{   
	list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
function dameFecha5($fecha,$dia)
{   list($year,$mon,$day) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
function dameFecha6($fecha,$dia)
{   list($year,$mon,$day) = explode('-',$fecha);
    return date('w',mktime(0,0,0,$mon,$day+$dia,$year));        
}
$fecha7 = dameFecha2(date('d/m/Y'),7);


$txt_desde = $_GET["txt_desde"];
$txt_desde1 = $_GET["txt_desde1"];
$txt_hasta = $_GET["txt_hasta"];
$proceso1 = $_GET["proceso"];


$query_registro = "SELECT distinct * FROM servicio where FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."' or FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' ";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$FECHA_VARIABLE ="";
$FECHA_REALIZACION = "";
 while($row = mysql_fetch_array($result))
  { 
    $NOMBRE_SERVICIO = $row["NOMBRE_SERVICIO"]; 
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$TPTMFI = $row["TPTMFI"];
	$DIRECCION = $row["DIRECCION"];
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$PROCESO = $row["PROCESO"];
	$EJECUTOR = $row["EJECUTOR"];
	$PREDECESOR = $row["PREDECESOR"];
	$DIAS = $row["DIAS"];
	$OC = $row["OC"];
	$ESTADO_N = $row["ESTADO"];
	$RECLAMOS = $row["RECLAMOS"];
	$CANTIDAD = $row["CANTIDAD"];
 	$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
 if($NOMBRE_SERVICIO == 'Sillas' && $PROCESO == $proceso1 && $ESTADO_N != 'NULO')
    {
    	 	if(substr($FECHA_INICIO,0,10) <= $txt_desde1 && $FECHA_ENTREGA >= substr($txt_desde1,0,10) )
    	{
    
	if($numero == 0)
	{	
 //   echo "<tr><td  align='left' colspan='4'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
	echo"<tr>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;'><center>Rocha</center></th> 
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>N°</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Proceso</center></th>
	   
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Descripcion</center></th>
		  <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Observaciones</center></th>
		  <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:100px;'><center><a style='color:#fff;text-decoration:none;' id='fechai' href='InformeProyectoProduccion.php?buscari=Inicio&txt_desde=".$txt_desde ."&txt_hasta=".$txt_hasta."&buscar_codigo=".$BUSCAR_CODIGO."'>Fecha I</a></center></th>
		  		  <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:100px;'><center>Fecha E</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:100px;'><center><a style='color:#fff;text-decoration:none;' id='fechae' href='InformeProyectoProduccion.php?buscari=Confirmacion&txt_desde=".$txt_desde."&txt_hasta=".$txt_hasta."&buscar_codigo=".$BUSCAR_CODIGO."'>Fecha C</a></center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Dias</center></th>
		  <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>OC</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Reclamos</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Cantidad</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>Estado</center></th></tr>
		 ";
        $numero = 20;
    }	
	
	
	
	
	
	
	if($FECHA_REALIZACION  == date("Y-m-d"))
	{
      echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;background:#39C;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	  
	echo  "<td  style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'> <a style='color:#000;text-decoration:none;' 
     	href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
        </td>";
	
	
	
	
	//echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($PREDECESOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($PROCESO)."</td>";

	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($DESCRIPCION)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($OBSERVACIONES)."</td>";
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".substr($FECHA_INICIO,0,11)."</td>";
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".substr($FECHA_PRIMERA_ENTREGA,0,11)."</td>";	
		if($ESTADO == "OK")
		{
echo  "<td onclick = TINY.box.show({url:'generarActualizarServicio.php?codigoProyecto=".urlencode($CODIGO_PROYECTO)."&CodigoServicio=".$CODIGO_SERVICIO."&link='})  align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#0000FF; color: white;'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else
		{
		if($FECHA_ENTREGA > $fecha7)
		{
echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#3ADF00;'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else if($FECHA_ENTREGA < date('Y-m-d'))
		{
echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#DF0101;color:#FFF;'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{      
echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#FFFF00;'>".substr($FECHA_ENTREGA,0,11)."</td>";		
		}
		}
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($DIAS)."</td>";
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($OC)."</td>";
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($RECLAMOS)."</td>";
    //echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($REALIZADOR)."</td>";
	//echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($SUPERVISOR)."</td>";
	//echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($EJECUTOR)."</td>";
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($CANTIDAD)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".$ESTADO."</td></tr>";
	}
	else
	{
		    echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
			
		echo  "<td  style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'> <a style='color:#000;text-decoration:none;' 
     	href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
        </td>";
	
	//echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($PREDECESOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($PROCESO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DESCRIPCION)."</td>";
		echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBSERVACIONES)."</td>";
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".substr($FECHA_INICIO,0,11)."</td>";
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:;'>".substr($FECHA_PRIMERA_ENTREGA,0,11)."</td>";
		if($ESTADO == "OK")
		{
echo  "<td onclick = TINY.box.show({url:'generarActualizarServicio.php?codigoProyecto=".urlencode($CODIGO_PROYECTO)."&CodigoServicio=".$CODIGO_SERVICIO."&link='})  align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#0000FF; color: white;'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else
		{		
		if($FECHA_ENTREGA > $fecha7)
		{
echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#3ADF00;'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else if($FECHA_ENTREGA < date('Y-m-d'))
		{
echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#DF0101;color:#FFF;'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
echo  "<td  align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#FFFF00;'>".substr($FECHA_ENTREGA,0,11)."</td>";		
		}
		}
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DIAS)."</td>";
		echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:'>".($OC)."</td>";
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($RECLAMOS)."</td>";
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CANTIDAD)."</td>";

    //echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($REALIZADOR)."</td>";
	//echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($SUPERVISOR)."</td>";
	//echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($EJECUTOR)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$ESTADO."</td></tr>";
	}
	$numero--;
	}
}
  }

  mysql_free_result($result);
  mysql_close($conn);
 
?>
</table>
</body>
</html>