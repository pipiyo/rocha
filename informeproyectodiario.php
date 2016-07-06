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
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  }
mysql_free_result($result1);


$PROCESO='';
$OK='';
$NULO='';
$PROGRAMADOS='';
$TODOS='';
$BUSCAR_CODIGO ='';
$INEN = "";

$DESDE = "";
$HASTA = "";
$ROCHAROCHA = "";






$ESTADOV = $_GET["ESTADO"];



$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
$buscaf = "ENTREGA";
$ordenfecha = 'FECHA_INICIO';
if (isset($_GET["buscar"]) || isset($_GET["buscarfe"])) 
{    

$BUSCAR_CODIGO = $_GET["buscar_codigo"];
if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];


$DESDE = $_GET["txt_desde"];
$HASTA = $_GET["txt_hasta"];

}




if ($_GET["buscarfe"] == "INICIO" ) 
{ 
$ordenfecha = 'FECHA_INICIO';
$buscaf = "INICIO";
$INEN = "INICIO";
}
else 
{ 
$ordenfecha = 'FECHA_ENTREGA';
$buscaf = "ENTREGA";
$INEN = "ENTREGA";
}
} ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informe Diario V1.1.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_informes.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/tinybox.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
    
      <link rel="stylesheet" href="style/estilopopup.css" />

  <script language = javascript>
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

function dias1()
{
var fecha1= document.getElementById('txt_fechai').value;
var dia1= fecha1.substr(8);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_fechae').value;
var dia2= fecha2.substr(8);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);
var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));
        
document.getElementById('txt_dias').value=parseInt(dias) + 1; 
}
  
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });
    
  </script>









</head>

<body>
<div id='bread'><div id="menu1"></div></div>
<form action="" method="get">
<center>
<table  id = "formulario">
<tr>
  <th id="tit_pro" height="37" colspan="11" align="center" >Informe Diario</th>
  </tr>











<tr>

<td width="180">Desde &nbsp; &nbsp;
<input style="border:grey 1px solid;border-radius: 8px;" name="txt_desde" id="txt_desde" type="text"  value="<?php echo $DESDE;?>" /></td>
<td width="180">Hasta &nbsp; &nbsp;<input style="border:grey 1px solid;border-radius: 8px;" name="txt_hasta" id="txt_hasta" type="text"  value="<?php echo $HASTA;?>" /></td>




<?php 
$INICIO1 = "";
$ENTREGA1 = "";

if($INEN == "INICIO")
{
	$INICIO1 = 'selected';
}
else if($INEN == "ENTREGA")
{
	$ENTREGA1 = 'selected';
}

?>




  <td width="300" colspan="2">
  Buscar por fecha de &nbsp;&nbsp;&nbsp; 
  <select  style="border-radius: 8px;" onchange="" id = "buscarfe" name = "buscarfe">
    <option></option>
    <option <?php echo $INICIO1;?> >INICIO</option>
    <option <?php echo $ENTREGA1;?> >ENTREGA</option>
  </select>
  </td>




</tr>











<tr>

<tr>

<td width="180">Rocha &nbsp; &nbsp;
<input  style="border:grey 1px solid;border-radius: 8px;width:100px;" type="text" id="buscar_codigo" name="buscar_codigo" value="<?php echo $BUSCAR_CODIGO;?>" ></td>





 
<?php 
$TODOS1 = "";
$PROCESO1 = "";
$NULO1 = "";
$OK1 = "";
if($ESTADOV == "TODOS")
{
	$TODOS1 = 'selected';
}
else if($ESTADOV == "EN PROCESO")
{
	$PROCESO1 = 'selected';
}
else if($ESTADOV == "NULO")
{
	$NULO1 = 'selected';
}
else if($ESTADOV == "OK")
{
	$OK1 = 'selected';
}
?>

  
 
  <td>
  Estado &nbsp;&nbsp;&nbsp; 
  <select style="border-radius: 8px;"  onchange="" id = "ESTADO" name = "ESTADO">
    <option></option>
    <option <?php echo $TODOS1;?> >TODOS</option>
    <option <?php echo $PROCESO1;?>>EN PROCESO</option>
    <option <?php echo $NULO1;?>>NULO</option>
    <option <?php echo $OK1;?>>OK</option>
  </select>
  </td>












<td width="150" align="left"> <input type="submit" style=" color:#FFF;background-color:#CCC; height:25px;border-radius: 10px; width:70px; border:#fff 1px solid;" id="buscar" name = "buscar" value = "Buscar" /> </td>
<td align=""><a href="ExcelInformeProduccion.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>&ESTADO=<?php echo urlencode($ESTADOV);?>" target="_blank">
<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></td>
</tr>

<tr>

</tr>

</table>
</center>
</form>
















<table id = "" cellpadding="0" cellspacing="0"  style="font-size:9px; width:100%;">
<?php
mysql_select_db($database_conn, $conn);
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);

if($buscaf == 'INICIO')
{	
///////
if($BUSCAR_CODIGO!='')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.OC, servicio.DIAS, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.NOMBRE_SERVICIO,servicio.FECHA_INICIO from  servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and 
proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."'";
}
else if($ESTADOV=='TODOS')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.OC,servicio.FECHA_REALIZACION,servicio.NOMBRE_SERVICIO, servicio.RECLAMOS, servicio.DIAS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO  and servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."' order by servicio.NOMBRE_SERVICIO";
}
else
{
$query_registro = "select  DISTINCT 'servicio.CODIGO_SERVICIO',servicio.OC,servicio.FECHA_REALIZACION,servicio.NOMBRE_SERVICIO, servicio.RECLAMOS, servicio.DIAS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO, servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.ESTADO = '".$ESTADOV."' and servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."' order by servicio.NOMBRE_SERVICIO";
}

//////
} 
else if($buscaf == 'ENTREGA')
{	
///////
	
if($BUSCAR_CODIGO!='')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.OC,servicio.NOMBRE_SERVICIO, servicio.DIAS, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from  servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and  
proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."'";
}
else if($ESTADOV=='TODOS')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.NOMBRE_SERVICIO,servicio.OC,servicio.FECHA_REALIZACION, servicio.RECLAMOS, servicio.DIAS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and  servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' order by servicio.NOMBRE_SERVICIO";
}
else
{
$query_registro = "select  DISTINCT 'servicio.CODIGO_SERVICIO',servicio.NOMBRE_SERVICIO,servicio.OC,servicio.FECHA_REALIZACION, servicio.RECLAMOS, servicio.DIAS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO, servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from  servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.ESTADO = '".$ESTADOV."'  and servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' order by servicio.NOMBRE_SERVICIO";
}

}


$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$FECHA_VARIABLE ="";
$FECHA_REALIZACION = "";
 while($row = mysql_fetch_array($result))
  {  
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$NOMBRE_SERVICIO = $row["NOMBRE_SERVICIO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$TPTMFI = $row["TPTMFI"];
	$DIRECCION = $row["DIRECCION"];
	$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
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
	$RECLAMOS = $row["RECLAMOS"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
/*	if($FECHA_VARIABLE == $FECHA_INICIO)
	{
		$numero=1;
	}
	else
	{
		$numero = 0;
	}
	if($numero == 0)
	{	
	$FECHA_VARIABLE = $FECHA_INICIO;
	}
	$date = new DateTime($FECHA_INICIO);
	switch ($date->format('m')) {
    case "01":
        $mes = "Enero";
        break;
    case "02":
        $mes = "Febrero";
        break;
    case "03":
        $mes = "Marzo";
        break;
	case "04":
        $mes = "Abril";
        break;
    case "05":
        $mes = "Mayo";
        break;
    case "06":
        $mes = "Junio";
        break;
	case "07":
        $mes = "Julio";
        break;
    case "08":
        $mes = "Agosto";
        break;
    case "09":
        $mes = "Septiembre";
        break;
    case "10":
        $mes = "Octubre";
        break;
	case "11":
        $mes = "Noviembre";
        break;
	case "11":
        $mes = "Diciembre";
        break;
	}
	////////
	switch ($date->format('w')) {
    case "1":
        $dia = "Lunes " . $date->format('d') ." ".$mes ;
        break;
    case "2":
        $dia = "Martes " . $date->format('d')." ".$mes;
        break;
    case "3":
        $dia = "Miercoles " .$date->format('d')." ".$mes;
        break;
	case "4":
        $dia = "Jueves " . $date->format('d')." ".$mes;
        break;
    case "5":
        $dia = "Viernes " . $date->format('d')." ".$mes;
        break;
    case "6":
        $dia = "Sabado " . $date->format('d')." ".$mes;
        break;
	case "7":
        $dia = "Domingo " . $date->format('d')." ".$mes;
        break;
	}
*/
	if($numero == 0)
	{	
 //   echo "<tr><td  align='left' colspan='4'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
	echo"<tr style='background:#DBDBDB'>
	     <th style='background:
 ; border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;'><center>Rocha</center></th> 
		 <th style='background:
 ;border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Nro</center></th>
		 <th style='background:
 ;border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Proceso</center></th>
	     <th style='background:
 ;border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Cliente</center></th>
		 <th style='background:
 ;border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Descripcion</center></th>
		  <th style='background:
 ;border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Observaciones</center></th>
		  <th style='background:
 ;border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:100px;'><center><a style='color:#000;text-decoration:none;' id='fechai' href='InformeProyectoProduccion.php?fechai=FECHA_INICIO&ESTADO=".$ESTADO."'>Fecha I</a></center></th>
		 <th style='background:
 ;border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:100px;'><center><a style='color:#000;text-decoration:none;' id='fechae' href='InformeProyectoProduccion.php?fechae=FECHA_ENTREGA&ESTADO=".$ESTADO."'>Fecha E</a></center></th>
		 <th style='background:
 ;border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Dias</center></th>
		 <th style='background:
 ;border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Reclamos</center></th>
         <th style='background:
 ;border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>Estado</center></th></tr>
		 ";
        $numero = 20;
    }
	if(substr($FECHA_INICIO,0,10) <= date("Y-m-d") && substr($FECHA_ENTREGA,0,10) >= date("Y-m-d"))
	{
		
    echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;background:
 ; color:;'><center> <a style='color: #000 ;' id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td align='center' onclick=TINY.box.show({url:'generarDescricionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO																																																																																																																																																																																																																																																																																																																																																																																												). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "'}) style=' color: ;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:
 ;'>".($CODIGO_SERVICIO)."</td>";
	//echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($PREDECESOR)."</td>";
	
	
	
	if($NOMBRE_SERVICIO == "Produccion")
		{
	echo  "<td style=' color: #FFF;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:blue;'>".($NOMBRE_SERVICIO)."</td>";
		} 
	else if($NOMBRE_SERVICIO == "Despacho")
	    {
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#FC0;'>".($NOMBRE_SERVICIO)."</td>";
		}
	else if($NOMBRE_SERVICIO == "Instalacion")
		{
		echo  "<td style='color: #FFF;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#B10F0F;'>".($NOMBRE_SERVICIO)."</td>";
		}
	else if($NOMBRE_SERVICIO == "Servicio Tecnico")
		{
		echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#886A08;'>".($NOMBRE_SERVICIO)."</td>";	
		}
	else if($NOMBRE_SERVICIO == "Sillas")
		{
		 echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#0080FF;'>".($NOMBRE_SERVICIO)."</td>";
		}
	else if($NOMBRE_SERVICIO == "Adquisiciones")
		{
		echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#26FF00 ;'>".($NOMBRE_SERVICIO)."</td>";	
		}
	else if($NOMBRE_SERVICIO == "OC")
		{
		echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#1CBD00 ;'>".($NOMBRE_SERVICIO)."</td>";
		}	
	else if($NOMBRE_SERVICIO == "Bodega")
		{
		echo  "<td style='color: #FFF;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#96F;'>".($NOMBRE_SERVICIO)."</td>";
		}
		else if($NOMBRE_SERVICIO == "Sistema")
		{
		echo  "<td style='color: #FFF;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#000;'>".($NOMBRE_SERVICIO)."</td>";
		}
	echo  "<td style=' color: ;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background: ;'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td style=' color: ;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background: ;'>".($DESCRIPCION)."</td>";
		echo  "<td style=' color: ;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background: ;'>".($OBSERVACIONES)."</td>";
	echo  "<td align='center' style=' color: ;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:;'>".($FECHA_INICIO)."</td>";
				
		if($ESTADO == "OK")
		{
echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#0000FF; color: white;'>".($FECHA_ENTREGA)."</td>";
		}
		else
		{
		if($FECHA_ENTREGA > $fecha7)
		{
echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#3ADF00;'>".($FECHA_ENTREGA)."</td>";
		}
		else if($FECHA_ENTREGA < date('Y-m-d'))
		{
echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#DF0101;color:#FFF;'>".($FECHA_ENTREGA)."</td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#FFFF00;'>".($FECHA_ENTREGA)."</td>";		
		} 
		
		}
	echo  "<td align='center' style=' color: ;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background: ;'>".($DIAS)."</td>";
	echo  "<td align='center' style=' color: ;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:;'>".($RECLAMOS)."</td>";

    //echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($REALIZADOR)."</td>";
	//echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($SUPERVISOR)."</td>";
	//echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($EJECUTOR)."</td>";
    echo  "<td style=' color: ;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background: ;'>".$ESTADO."</td></tr>";
		   $numero--;

       }
	  
  }
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</body>
</html>