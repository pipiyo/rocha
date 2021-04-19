<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
ini_set('max_execution_time', 1000);
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

function dameFecha3($fecha,$dia)
{   list($day,$mon,$year) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}
function dameFecha4($fecha,$dia)
{   list($day,$mon,$year) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

if(date("w") == 1)
{
$txt_desde = dameFecha3(date("d-m-Y"),3);
$txt_hasta = dameFecha4(date("d-m-Y"),3);
}
else if(date("w") == 2)
{
$txt_desde = dameFecha3(date("d-m-Y"),4);
$txt_hasta = dameFecha4(date("d-m-Y"),2);
}
else if(date("w") == 3)
{
$txt_desde = dameFecha3(date("d-m-Y"),5);
$txt_hasta = dameFecha4(date("d-m-Y"),1);
}
else if(date("w") == 4)
{
$txt_desde = dameFecha3(date("d-m-Y"),6);
$txt_hasta = dameFecha4(date("d-m-Y"),0);
}
else if(date("w") == 5)
{
$txt_desde = dameFecha3(date("d-m-Y"),7);
$txt_hasta = dameFecha4(date("d-m-Y"),6);
}
else if(date("w") == 6)
{
$txt_desde = dameFecha3(date("d-m-Y"),1);
$txt_hasta = dameFecha4(date("d-m-Y"),5);
}
else if(date("w") == 0)
{
$txt_desde = dameFecha3(date("d-m-Y"),2);
$txt_hasta = dameFecha4(date("d-m-Y"),4);
}

if (isset($_GET["buscar"])) 
{    

if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}
}



?>
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/Dth/xhtml11.dth">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Indicador de cumplimiento V1.0</title>
  
  <link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
  
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">

  <script type="text/javascript" src="js/jquery.min.js"></script>
  
 
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script src="js/amcharts.js" type="text/javascript"></script>
  <script src="js/serial.js" type="text/javascript"></script>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
      <script src='js/breadcrumbs.php'></script>
    <link rel="styleSheet" href="style/bread.css" type="text/css" >
 <script language = javascript>
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });     
  </script>



</head>
<body>
	<div id='bread'><div id="menu1"></div></div>
  <div id='contenedor_indicador'> 
  <center> 
  <div>   
<center>
<h2 id='indi_h2'>INDICADOR DE CUMPLIMIENTO 2014</h2>


<form action="" method="get">
<table  id = "formulario">
<tr>
<td width="100"><center>Desde</center></td>
<td width="100"><input class='textbox' name="txt_desde" id="txt_desde" type="text" /></td>
<td width="100"><center>Hasta</center></td>
<td width="100"><input class='textbox'  name="txt_hasta" id="txt_hasta" type="text" /></td>
<td width="100"> <input class='casillaBotonPS1' type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>
</tr>
</table>
</form>

<?php
$COMERCIAL3=0;
$DAM3 = 0;
$CLIENTE3 =0;
$PROVEEDOR3=0;
$IMPORTACION3=0;
$ADQUISICIONES3=0;
$PRODUCCION3=0;
$DESPACHO3=0;
$SILLAS3=0;
$PLANIFICACION3=0;
$INSTALACION3=0;

$COMERCIAL4=0;
$DAM4 = 0;
$CLIENTE4 =0;
$PROVEEDOR4=0;
$IMPORTACION4=0;
$ADQUISICIONES4=0;
$PRODUCCION4=0;
$DESPACHO4=0;
$SILLAS4=0;
$PLANIFICACION4=0;
$INSTALACION4=0;
$VACIO=0;

$query_registro1 = "select CODIGO_PROYECTO from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR'   AND FECHA_CONFIRMACION > FECHA_ENTREGA AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
  
$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
  
$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.AREA , MONTO AS SUMA from actualizaciones,actualizaciones_general,proyecto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND actualizaciones_general.CODIGO_GENERAL = PROYECTO.codigo_proyecto AND PROYECTO.codigo_proyecto = '".$CODIGO_PROYECTO."' AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."' GROUP BY actualizaciones.AREA  HAVING not area = 'null' ORDER BY FECHA ";
$result2 = mysql_query($QUERY, $conn) or die(mysql_error());

$sumatoria = 1;

 while($row = mysql_fetch_array($result2))
  {  
  if($sumatoria == '1')
  {
  $cuenta = $row["cuenta"];
  $AREA = $row["AREA"];
  $sumatoria++;
  
  
  if($AREA == 'COMERCIAL')
  {
	  $COMERCIAL3++;
	  $COMERCIAL4+=$row['SUMA'];

  }
  else if($AREA == 'DAM')
  {
	  $DAM3++;
	  $DAM4+=$row['SUMA'];
  }
    else if($AREA == 'CLIENTE')
  {
	  $CLIENTE3++;
	  $CLIENTE4+=$row['SUMA'];
  }
    else if($AREA == 'PROVEEDOR')
  {
	  $PROVEEDOR3++;
	  $PROVEEDOR4+=$row['SUMA'];
  }
     else if($AREA == 'IMPORTACION')
  {
	  $IMPORTACION4+=$row['SUMA'];
	  $IMPORTACION3++;
  }                   
       else if($AREA == 'INSTALACION')
  {
	  $INSTALACION4+=$row['SUMA'];
	  $INSTALACION3++;
  }
  else if($AREA == 'DESPACHO')
  {
	   $DESPACHO4+=$row['SUMA'];
	  $DESPACHO3++;
  }
  else if($AREA == 'PRODUCCION')
  {
	  $PRODUCCION4+=$row['SUMA'];
	  $PRODUCCION3++;
  }
    else if($AREA == 'ADQUISICIONES')
  {
	  $ADQUISICIONES4+=$row['SUMA'];
	  $ADQUISICIONES3++;
  }
   else if($AREA == 'SILLAS')
  {
	  $SILLAS4+=$row['SUMA'];
	  $SILLAS3++;
  }
  else if($AREA == 'PLANIFICACION')
  {
	  $PLANIFICACION4+=$row['SUMA'];
	  $PLANIFICACION3++;
  }
  }
  }
  }
  ///////////////////////////////////////////////////
  $query_registro3 = "select count(CODIGO_PROYECTO) AS ADELANTADOS from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR' AND FECHA_CONFIRMACION < FECHA_ENTREGA AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result3))
  {  
    $ADELANTADOS = $row["ADELANTADOS"];
  }   
  $query_registro2 = "select * from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR' AND FECHA_CONFIRMACION <= FECHA_ENTREGA  AND FECHA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."'";
$CUMPLIDOS = 0;
$CUMPLIDOS_TOTAL=0;
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result2))
  {  
    $CUMPLIDOS++;
	$CUMPLIDOS_TOTAL+= $row["MONTO"];
  } 
 /////////////////////////////////////////////////
 
$query_registro = "select count(CODIGO_PROYECTO) AS ProgramadosS, sum(MONTO) AS ProgramadosS1 from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR'  AND FECHA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result))
  {  
    $ProgramadosS = $row["ProgramadosS"];
	$ProgramadosS_total= $row["ProgramadosS1"];
  }
   
 $ejecutadoHold = $ProgramadosS - $CLIENTE3; 
 
  $su1 = $COMERCIAL3 + $DAM3  + $PROVEEDOR3 + $IMPORTACION3+$ADQUISICIONES3 + $DESPACHO3 + $PRODUCCION3 + $INSTALACION3 + $SILLAS3 + $PLANIFICACION3 ;
    $su2 = $COMERCIAL4 + $DAM4  + $PROVEEDOR4 + $IMPORTACION4+$ADQUISICIONES4 + $DESPACHO4 + $PRODUCCION4 + $INSTALACION4 + $SILLAS4 + $PLANIFICACION4 ;
	   $su3 =  $ADQUISICIONES3 + $DESPACHO3 + $PRODUCCION3 + $INSTALACION3 + $SILLAS3 + $PLANIFICACION3 ;
    $su4 =    $ADQUISICIONES4 + $DESPACHO4 + $PRODUCCION4 + $INSTALACION4 + $SILLAS4 + $PLANIFICACION4 ;
  $cumpfin = $CUMPLIDOS - $ADELANTADOS;
   $VACIO = $ejecutadoHold - $cumpfin - $ADELANTADOS - $su1;
   
   $TOTALFAB = $CUMPLIDOS_TOTAL + $su2;
   
    $cumpfin = $CUMPLIDOS - $ADELANTADOS + $VACIO;
	$ejecutadfab = $cumpfin +  $su3 + $ADELANTADOS;
	$TOTALCAUSALHOL = $ProgramadosS_total - $CLIENTE4;
	
 
	
	if($ejecutadfab == 0 ||  $ProgramadosS == 0)
	{
	$div1 = 0;	
	
	}
	else
	{
	$div1 =  $ejecutadfab/ $ProgramadosS  * 100;
	}
	
	if($cumpfin == 0 ||  $ejecutadfab == 0)
	{
	$div2 = 0;	
	
	}
	else
	{
	$div2 = $cumpfin / $ejecutadfab * 100;
	}
	
	if($cumpfin == 0 ||  $ejecutadoHold == 0)
	{
	$div3 = 0;	
	
	}
	else
	{
	$div3 = $cumpfin / $ejecutadoHold * 100;
	}
	
	
	
	if($ADELANTADOS == 0 ||  $ejecutadfab == 0)
	{
	$div4 = 0;	
	
	}
	else
	{
	$div4 = $ADELANTADOS / $ejecutadfab * 100;
	}
	
		if($ADELANTADOS == 0 ||  $ejecutadoHold == 0)
	{
	$div5 = 0;	
	
	}
	else
	{
	$div5 = $ADELANTADOS / $ejecutadoHold * 100;
	}
	
		if($su3 == 0 ||  $ejecutadoHold == 0)
	{
	$div6 = 0;	
	
	}
	else
	{
	$div6 = $su3 / $ejecutadoHold * 100;
	}
	
		if($su1 == 0 ||  $ejecutadoHold == 0)
	{
	$div7 = 0;	
	
	}
	else
	{
	$div7 = $su1 / $ejecutadoHold * 100;
	}

if($CLIENTE3 == 0 ||  $ejecutadoHold == 0)
	{
	$div8 = 0;	
	
	}
	else
	{
	$div8 = $su1 / $ejecutadoHold * 100;
	}


if($ejecutadfab == 0 ||  $su3 == 0)
	{
	$div9 = 100;	
	}
	else
	{
   $div9 =  1 -($su3 / $ejecutadfab);	
   $div9 = $div9 * 100;
	}

if($ejecutadfab == 0 ||  $ADQUISICIONES3 == 0)
	{
	$div13 = 0;	
	}
	else
	{
   $div13 = $ADQUISICIONES3  / $ejecutadfab * 100;	
	}
if($ejecutadfab == 0 ||  $DESPACHO3 == 0)
	{
	$div14 = 0;	
	}
	else
	{
   $div14 = $DESPACHO3  / $ejecutadfab * 100;	
	}
if($ejecutadfab == 0 ||  $PRODUCCION3 == 0)
	{
	$div15 = 0;	
	}
	else
	{
   $div15 = $PRODUCCION3  / $ejecutadfab * 100;	
	}	
if($ejecutadfab == 0 || $INSTALACION3 == 0)
	{
	$div16 = 0;	
	}
	else
	{
   $div16 = $INSTALACION3  / $ejecutadfab * 100;	
	}	
if($ejecutadfab == 0 || $SILLAS3 == 0)
	{
	$div17 = 0;	
	}
	else
	{
   $div17 = $SILLAS3  / $ejecutadfab * 100;	
	}	
	if($ejecutadfab == 0 || $PLANIFICACION3 == 0)
	{
	$div18 = 0;	
	}
	else
	{
   $div18 = $PLANIFICACION3 / $ejecutadfab * 100;	
	}
	
	
	if($ejecutadoHold  == 0 || $ADQUISICIONES3 == 0)
	{
	$div19 = 0;	
	}
	else
	{
    $div19 = $ADQUISICIONES3 / $ejecutadoHold * 100;	
	}	
	if($ejecutadoHold  == 0 || $DESPACHO3 == 0)
	{
	$div20 = 0;	
	}
	else
	{
    $div20 = $DESPACHO3 / $ejecutadoHold * 100;	
	}	
	
	if($ejecutadoHold  == 0 || $PRODUCCION3 == 0)
	{
	$div21 = 0;	
	}
	else
	{
    $div21 = $PRODUCCION3 / $ejecutadoHold * 100;	
	}	
	
	
	
	if($ejecutadoHold  == 0 || $INSTALACION3 == 0)
	{
	$div23 = 0;	
	}
	else
	{
    $div23 = $INSTALACION3 / $ejecutadoHold * 100;	
	}	
		if($ejecutadoHold  == 0 || $SILLAS3 == 0)
	{
	$div24 = 0;	
	}
	else
	{
    $div24 = $SILLAS3  / $ejecutadoHold * 100;	
	}	
	if($ejecutadoHold  == 0 || $PLANIFICACION3 == 0)
	{
	$div25 = 0;	
	}
	else
	{
    $div25 = $PLANIFICACION3  / $ejecutadoHold * 100;	
	}
	if($ejecutadoHold  == 0 || $COMERCIAL3 == 0)
	{
	$div26 = 0;	
	}
	else
	{
    $div26 = $COMERCIAL3  / $ejecutadoHold * 100;	
	}	
	if($ejecutadoHold  == 0 || $DAM3 == 0)
	{
	$div27 = 0;	
	}
	else
	{
    $div27 = $DAM3  / $ejecutadoHold * 100;	
	}		
	if($ejecutadoHold  == 0 || $PROVEEDOR3 == 0)
	{
	$div28 = 0;	
	}
	else
	{
    $div28 = $PROVEEDOR3  / $ejecutadoHold * 100;	
	}	
		if($ejecutadoHold  == 0 || $IMPORTACION3 == 0)
	{
	$div29 = 0;	
	}
	else
	{
    $div29 = $IMPORTACION3  / $ejecutadoHold * 100;	
	}	
	if($CLIENTE3 == 0 ||  $ejecutadoHold == 0)
	{
	$div30 = 0;	
	
	}
	else
	{
	$div30 = $CLIENTE3 / $ejecutadoHold * 100;
	}
	
	
	if($ejecutadoHold == 0 ||  $su1 == 0)
	{
	$div31 = 0;	
	}
	else
	{
   $div31 =  1 -($su1 / $ejecutadoHold);	
   $div31 = $div31 * 100;
	}
	
	if($TOTALFAB == 0 ||  $su4 == 0)
	{
	$div32 = 0;	
	}
	else
	{
   $div32 =  1 -($su4 / $TOTALFAB);	
   $div32 = $div32 * 100;
	}

    if($TOTALCAUSALHOL == 0 ||  $su2 == 0)
	{
	$div33 = 0;	
	}
	else
	{
   $div33 =  1 -($su2 / $TOTALCAUSALHOL);	
   $div33 = $div33 * 100;
	}
	
	$suma= $div13 + $div14 +  $div15 + $div16 + $div17 + $div18;
	
	$suma1= $div19 + $div20 +  $div21 + $div23 + $div24 + $div25 + $div26 + $div27 + $div28  + $div29;
?>

<table width="100%" cellspacing="0" class="tablas_Indicador_cumplimiento">

<tr>
	<th rowspan="2">&nbsp;</th>
    <th rowspan="2" id="th_title_fecha"><?php echo $txt_desde ?>  &nbsp;/&nbsp;  <?php echo $txt_hasta ?></th>
    
    <th rowspan="2">Cantidad</th>
    <th rowspan="2">% Fabrica</th>
    <th rowspan="2">% Holding</th>
    <th rowspan="2">Monto Neto</th>
    
    <th colspan="2">SEGÚN CANTIDAD DE PROYECTOS</th>
    <th colspan="2">SEGÚN MONTO DE PROYECTOS</th>
    	
    		
        
    
    
      
    	<tr>
        
    		<th>Fabrica</th>
            <th>Holding</th>
        
        	<th>Fabrica</th>
            <th>Holding</th>
        
        </tr>
    

    
    
    
</tr>








<tr>
	<td colspan="2" id="td_title2">Rochas Ingresados</td>
    
    <td id="td_title2" align="center"><?php echo $ProgramadosS ?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($ProgramadosS_total,0, ",", "."); ?></td>
    
    <td id="td_title4" rowspan="7" align="center"><?php echo number_format($div9,1, ",", "."); ?>%</td>
    <td id="td_title4" rowspan="7" align="center"><?php echo number_format($div31,1, ",", "."); ?>%</td>
    <td id="td_title4" rowspan="7" align="center"><?php echo number_format($div32,1, ",", "."); ?>%</td>
    <td id="td_title4_last" rowspan="7" align="center"><?php echo number_format($div33,1, ",", "."); ?>%</td>
    
</tr>

<tr>
	<td colspan="2" id="td_title2">Rochas Ejecutados (Causal Holding)</td>
    
    <td id="td_title2" align="center"><?php echo  $ejecutadoHold ?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($TOTALCAUSALHOL,0, ",", "."); ?></td>
    
</tr>

<tr>
	<td colspan="2" id="td_title2">Rochas Ejecutados (Causal Fabrica)</td>
    
    <td id="td_title2" align="center"><?php echo $ejecutadfab; ?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div1,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($TOTALFAB,0, ",", "."); ?></td>
    
</tr>

<tr>
	<td colspan="2" id="td_title2">Rochas Cumplidos</td>
    
    
    <td id="td_title2" align="center"><?php echo  $cumpfin;?></td>
    <td id="td_title2" align="center"><?php echo number_format($div2,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($div3,2, ",", "."); ?>%</td>
    <td id="td_title2" rowspan="2" align="center"><?php echo number_format($CUMPLIDOS_TOTAL,0, ",", "."); ?></td>
    
</tr>

<tr>
	<td colspan="2" id="td_title2">Rochas Adelantados</td>
    
    <td id="td_title2" align="center"><?php echo $ADELANTADOS?></td>
    <td id="td_title2" align="center"><?php echo number_format($div4,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($div5,2, ",", "."); ?>%</td>
    
</tr>

<tr>
	<td colspan="2" id="td_title2">Rochas Incumplidos (Causal Fabrica)</td>
    
    <td id="td_title2" align="center"><?php echo $su3; ?></td>
    <td id="td_title2" align="center"><?php echo number_format($suma,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($div6,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($su4,0, ",", ".")?></td>
    
    
</tr>

<tr>
	<td colspan="2" id="td_title2">Rochas Incumplidos (Causal Holding)</td>
    
     <td id="td_title2" align="center"><?php echo $su1?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div8,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($su2,0, ",", ".") ?></td>
    
    
    
</tr>




<tr>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>









<!--

<tr>
	<th colspan="2" id="th_title_azul">FACTORES DE INCUMPLIMIENTO FABRICA</th>
        
    <th id="th_title_azul">Cantidad</th>
    <th id="th_title_azul">% Fabrica</th>
    <th id="th_title_azul"></th>
    <th id="th_title_azul">Monto Neto</th>    
    <th id="th_title_azul">Dias Atraso</th>
    
   
</tr>

<tr>
	<td colspan="2" id="td_title2">Adquisiciones</td>
    
    <td id="td_title2" align="center"><?php echo $ADQUISICIONES3 ?></td>
    <td id="td_title2" align="center"><?php echo number_format($div13,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($ADQUISICIONES4,0, ",", ".") ?></td>
    <td id="td_title2_last" align="center"></td>
    
    
    <td colspan="3" rowspan="6">
    <div id="grafico_indic">  
  <script type="text/javascript">
            var chart;

            var chartData2 = 
			[
			  {
                    "country": "Adquisiciones",
                    "visits": <?php echo $ADQUISICIONES3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },

                {
                    "country": "Despacho",
                    "visits": <?php echo $DESPACHO3?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
                {
                    "country": "Instalacion",
                    "visits": <?php echo $INSTALACION3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
                 {
                    "country": "Planificacion",
                    "visits": <?php echo $PLANIFICACION3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
                {
                    "country": "Produccion",
                    "visits": <?php echo $PRODUCCION3?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
                
                {
                    "country": "Sillas",
                    "visits": <?php echo $SILLAS3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                }
               
            ];

 
            AmCharts.ready(function () {
                // SERIAL CHART
              chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData2;
                chart.categoryField = "country";
                chart.startDuration = 1;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 0;
                categoryAxis.gridPosition = "start";
              

                // value
                // in case you don't want to change default settings of value axis,
                // you don't need to create it, as one value axis is created automatically.

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "visits";
                 graph.colorField = "color";
                graph.balloonText = "[[category]]: <b>[[value]]</b>";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 0.8;
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "top-right";
                chart.write("chartdivb");
            });
        </script>
 
  
 <div id="chartdivb" style="width: 500px; height: 180px;"></div>



</div>
    
    
     </td>

   
       
</tr>

<tr>
	<td colspan="2" id="td_title2">Despacho</td>
    
    <td id="td_title2" align="center"><?php echo $DESPACHO3 ?></td>
    <td id="td_title2" align="center"><?php echo number_format($div14,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($DESPACHO4,0, ",", ".") ?></td>
     <td id="td_title2_last" align="center"></td>
    
</tr>
<tr>
	<td colspan="2" id="td_title2">Instalacion</td>
        
    <td id="td_title2" align="center"><?php echo $INSTALACION3;?></td>
    <td id="td_title2" align="center"><?php echo number_format($div16,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($INSTALACION4,0, ",", ".");?></td>
     <td id="td_title2_last" align="center"></td>
       
</tr>
<tr>
	<td colspan="2" id="td_title2">Planificacion</td>
    
    <td id="td_title2" align="center"><?php echo $PLANIFICACION3;?></td>
    <td id="td_title2" align="center"><?php echo number_format($div18,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($PLANIFICACION4,0, ",", ".");?></td>
     <td id="td_title2_last" align="center"></td>
       
</tr>
<tr>
	<td colspan="2" id="td_title2">Produccion</td>
    
    <td id="td_title2" align="center"><?php echo $PRODUCCION3; ?></td>
    <td id="td_title2" align="center"><?php echo number_format($div15,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($PRODUCCION4,0, ",", "."); ?></td>
     <td id="td_title2_last" align="center"></td>
    
</tr>



<tr>
	<td colspan="2" id="td_title2">Sillas</td>
    
    <td id="td_title2" align="center"><?php echo $SILLAS3;?></td>
    <td id="td_title2" align="center"><?php echo number_format($div17,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($SILLAS4,0, ",", ".");?></td>
     <td id="td_title2_last" align="center"></td>
    
</tr>



<tr>
	<th colspan="2" id="th_title_azul2">TOTAL</th>
    
     <th id="th_title_azul2"><?php echo $su3 ?></th>
    <th id="th_title_azul2"><?php echo number_format($suma,2, ",", "."); ?>%</th>
    <th id="th_title_azul2"></th>
    <th id="th_title_azul2"><?php echo number_format($su4,0, ",", ".");?></th>
     <th id="th_title_azul2"></th>
       
</tr>

<tr>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
    <td></td>
    <td></td>

</tr>















<tr>
	<th colspan="2" id="th_title_azul">ROCHAS CON INCUMPLIMIENTO FABRICA</th>
        
    <th colspan="3" id="th_title_azul">Area Responsable</th>
   
   
    <th id="th_title_azul">Monto Neto</th>    
    <th id="th_title_azul">Dias Atraso</th>
   
</tr>

<?php

function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('-',$fecha);
    return date('N',mktime(0,0,0,$year,$mon+$dia,$day));        
}

$cu2 = 0;
$COMERCIAL=0;
$DAM = 0;
$CLIENTE =0;
$PROVEEDOR=0;
$IMPORTACION=0;
$IN1=0;
$IN2=0;
$query_registro1 = "select CODIGO_PROYECTO,FECHA_ENTREGA,FECHA_CONFIRMACION from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR'  AND FECHA_CONFIRMACION > FECHA_ENTREGA AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
  
$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];

$segundos= strtotime($FECHA_CONFIRMACION)-strtotime($FECHA_ENTREGA) ;
$diferencia_dias=intval($segundos/60/60/24);
$contador = 1;
$dias_total=0;
while($contador <= $diferencia_dias)
{
	$dias = dameFecha2(substr($FECHA_ENTREGA,0,10),$contador);
	
	if($dias == 1 || $dias == 2 || $dias == 3|| $dias == 4 || $dias == 5)
	{
		$dias_total++;
	}

	$contador++;
}


$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.AREA,proyecto.MONTO from actualizaciones,actualizaciones_general,proyecto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND actualizaciones_general.CODIGO_GENERAL = PROYECTO.codigo_proyecto AND PROYECTO.codigo_proyecto = '".$CODIGO_PROYECTO."' AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."' GROUP BY actualizaciones.AREA HAVING not area = 'null' ORDER BY FECHA";
$result2 = mysql_query($QUERY, $conn) or die(mysql_error());

$cu = 1;

 while($row = mysql_fetch_array($result2))
  {  
  $cuenta = $row["cuenta"];
  $AREA = $row["AREA"];
   $MONTO2 = $row["MONTO"];
   
  if($cuenta != 0)
  {
	  if($cu == 1)
	  {
if($AREA == "ADQUISICIONES" || $AREA == "SILLAS" || $AREA == "PRODUCCION" || $AREA == "DESPACHO" || $AREA == "INSTALACION" || $AREA == "PLANIFICACION" )
{
		  $IN1+=$row['MONTO'];
   echo  "<tr><td style='border-right:solid #CCC 1px; border-left:solid #CCC 1px;border-top:solid #CCC 1px;' colspan='2'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
 echo "<td style='border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' colspan='3'><center>".$AREA." </center></td>
 <td style=' border-left:solid #CCC 1px;border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' align= 'center'>".number_format($MONTO2,0, ",", ".")."</td><td style=' border-left:solid #CCC 1px;border-top:solid #CCC 1px;border-right:solid #CCC 1px;' align='center' >".$dias_total."</td></tr>";
 $cu2++; 
		  }
		  


	  }
  }
  $cu++;
  
  }
 
  } 
 ?>



<tr>
	<th colspan="2" id="th_title_azul2">TOTAL</th>
    
    <th id="th_title_azul2" colspan="3"></th>

    <th id="th_title_azul2"><?php echo number_format($IN1,0, ",", ".") ?> </th>
    <th id="th_title_azul2"></th>
       
</tr>


<tr>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
    <td></td>
    <td></td>
  
</tr>

-->












<tr>
	<th colspan="2" id="th_title_azul">FACTORES DE INCUMPLIMIENTO HOLDING</th>
        
    <th id="th_title_azul">Cantidad</th>
    <th id="th_title_azul"></th>
    <th id="th_title_azul">% Holding</th>
    <th id="th_title_azul">Monto Neto</th>    
    <th id="th_title_azul">Dias Atraso</th>
   
</tr>

<tr>
	<td colspan="2" id="td_title2">Adquisiciones</td>
    
    <td id="td_title2" align="center"><?php echo $ADQUISICIONES3 ?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div19,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($ADQUISICIONES4,0, ",", ".") ?></td>
    <td id="td_title2_last" align="center"></td>
    <td colspan="3" rowspan="10">
    <div id="grafico_indic">  
  <script type="text/javascript">
            var chart;

            var chartData3 = 
			[
			  {
                    "country": "Adquisiciones",
                    "visits": <?php echo $ADQUISICIONES3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
                {
                    "country": "Despacho",
                    "visits": <?php echo $DESPACHO3?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
                {
                    "country": "Instalacion",
                    "visits": <?php echo $INSTALACION3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
                 {
                    "country": "Planificacion",
                    "visits": <?php echo $PLANIFICACION3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                }
				,
                {
                    "country": "Produccion",
                    "visits": <?php echo $PRODUCCION3?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
              
                {
                    "country": "Sillas",
                    "visits": <?php echo $SILLAS3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
               
                {
                    "country": "Comercial",
                    "visits": <?php echo $COMERCIAL3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
                {
                    "country": "DAM",
                    "visits": <?php echo $DAM3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                }
				,
				 {
                    "country": "Importacion",
                    "visits": <?php echo $IMPORTACION3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                },
                {
                    "country": "Provedor",
                    "visits": <?php echo $PROVEEDOR3 ?>,
                    "color": "#7DB4E4",
					"vacio": ""
                }
				
               
            ];

 
            AmCharts.ready(function () {
                // SERIAL CHART
              chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData3;
                chart.categoryField = "country";
                chart.startDuration = 1;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 45;
                categoryAxis.gridPosition = "start";
              

                // value
                // in case you don't want to change default settings of value axis,
                // you don't need to create it, as one value axis is created automatically.

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "visits";
                 graph.colorField = "color";
                graph.balloonText = "[[category]]: <b>[[value]]</b>";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 0.8;
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "top-right";
                chart.write("chartdivc");
            });
        </script>
 
  
 <div id="chartdivc" style="width: 500px; height: 250px;"></div>



</div>
    
    
    </td>
       
</tr>

<tr>
	<td colspan="2" id="td_title2">Despacho</td>
    
    <td id="td_title2" align="center"><?php echo $DESPACHO3 ?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div20,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($DESPACHO4,0, ",", ".") ?></td>
     <td id="td_title2_last" align="center"></td>
    
</tr>
<tr>
	<td colspan="2" id="td_title2">Instalacion</td>
        
    <td id="td_title2" align="center"><?php echo $INSTALACION3;?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div23,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($INSTALACION4,0, ",", ".") ?></td>
     <td id="td_title2_last" align="center"></td>
       
</tr>
<tr>
	<td colspan="2" id="td_title2">Planificacion</td>
    
    <td id="td_title2" align="center"><?php echo $PLANIFICACION3;?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div25,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($PLANIFICACION4,0, ",", ".") ?></td>
     <td id="td_title2_last" align="center"></td>
       
</tr>
<tr>
	<td colspan="2" id="td_title2">Produccion</td>
    
    <td id="td_title2" align="center"><?php echo $PRODUCCION3; ?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div21,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($PRODUCCION4,0, ",", ".") ?></td>
     <td id="td_title2_last" align="center"></td>
    
</tr>



<tr>
	<td colspan="2" id="td_title2">Sillas</td>
    
    <td id="td_title2" align="center"><?php echo $SILLAS3;?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div24,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($SILLAS4,0, ",", ".") ?></td>
     <td id="td_title2_last" align="center"></td>
    
</tr>



<tr>
	<td colspan="2" id="td_title2">Comercial</td>
    
     <td id="td_title2" align="center"><?php echo $COMERCIAL3;?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div26,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($COMERCIAL4,0, ",", ".") ?></td>
     <td id="td_title2_last" align="center"></td>
       
</tr>

<tr>
	<td colspan="2" id="td_title2">DAM</td>
    
     <td id="td_title2" align="center"><?php echo $DAM3;?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div27,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($DAM4,0, ",", ".") ?></td>
     <td id="td_title2_last" align="center"></td>
       
</tr>

<tr>
	<td colspan="2" id="td_title2">Importacion</td>
    
     <td id="td_title2" align="center"><?php echo $IMPORTACION3;?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div29,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($IMPORTACION4,0, ",", ".") ?></td>
     <td id="td_title2_last" align="center"></td>
       
</tr>
<tr>
	<td colspan="2" id="td_title2">Proveedor</td>
    
     <td id="td_title2" align="center"><?php echo $PROVEEDOR3;?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div28,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($PROVEEDOR4,0, ",", ".") ?></td>
     <td id="td_title2_last" align="center"></td>
       
</tr>



<tr>
	<th colspan="2" id="th_title_azul2">TOTAL</th>
    
     <th id="th_title_azul2"><?php echo $su1;?></th>
    <th id="th_title_azul2"></th>
    <th id="th_title_azul2"><?php echo number_format($suma1,2, ",", "."); ?>%</th>
    <th id="th_title_azul2"><?php echo number_format($su2,0, ",", ".");?></th>
     <th id="th_title_azul2"></th>
       
</tr>

<tr>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
    <td></td>
    <td></td>

</tr>


<tr>
	<th colspan="2" id="th_title_azul">ROCHAS CUMPLIDOS</th>
    <th colspan="2" id="th_title_azul">Ejecutivo</th>
    <th colspan="2" id="th_title_azul">Monto</th>
    
</tr>
<?php
$MONTO1=0;
$cuenta=0;
$query_registro1 = "select NOMBRE_CLIENTE,CODIGO_PROYECTO,FECHA_ENTREGA,FECHA_CONFIRMACION,EJECUTIVO,MONTO from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR' AND FECHA_CONFIRMACION <= FECHA_ENTREGA  AND FECHA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
$EJECUTIVO = $row["EJECUTIVO"];
$MONTO = $row["MONTO"];
$MONTO1+= $row["MONTO"];
$cuenta++;
echo "<tr><td style='border-right:solid #CCC 1px; border-left:solid #CCC 1px;border-top:solid #CCC 1px;' colspan='2'><center> <a id='cod_ser' target='_blank' 				  href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>
<td style=' border-right:solid #CCC 1px;border-top:solid #CCC 1px;border:solid #CCC 1px;' colspan='2'><center>".$EJECUTIVO." </center></td>
<td align='right' style='border-right:solid #CCC 1px;border-top:solid #CCC 1px;border:solid #CCC 1px;' colspan='2'>".number_format($MONTO,0, ",", ".")."</td>
</tr>";
  }
 ?>

<tr>
	<th colspan="2" id="th_title_azul2">Total</th>
    <th colspan="2" id="th_title_azul2"><?php echo $cuenta ?></th>
    <th colspan="2" id="th_title_azul2"><?php echo number_format($MONTO1,0, ",", ".") ?></th>
 
</tr>

<tr>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
    <td></td>
    <td></td>

</tr>


<tr>
	<th colspan="2" id="th_title_azul">Cumplidos Area vacia</th>
    <th colspan="2" id="th_title_azul">Ejecutivo</th>
    <th colspan="2" id="th_title_azul">Monto</th>

   
</tr>
<?php
$cu2 = 0;
$COMERCIAL=0;
$DAM = 0;
$CLIENTE =0;
$PROVEEDOR=0;
$IMPORTACION=0;
$IN1=0;
$IN2=0;
$pila = array();
$tabla = "";
$TIPO = "";

$query_registro1 = "select NOMBRE_CLIENTE,CODIGO_PROYECTO,FECHA_ENTREGA,FECHA_CONFIRMACION,EJECUTIVO,MONTO from PROYECTO where NOT ESTADO = 'NULA'  AND NOT ESTADO = 'VERSIONAR' AND FECHA_CONFIRMACION > FECHA_ENTREGA AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
  
$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
$EJECUTIVO = $row["EJECUTIVO"];
$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
$NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
  $MONTO2 = $row["MONTO"];

$segundos= strtotime($FECHA_CONFIRMACION)-strtotime($FECHA_ENTREGA) ;
$diferencia_dias=intval($segundos/60/60/24);
$contador = 1;
$dias_total=0;
while($contador <= $diferencia_dias)
{
	$dias = dameFecha2(substr($FECHA_ENTREGA,0,10),$contador);
	
	if($dias == 1 || $dias == 2 || $dias == 3|| $dias == 4 || $dias == 5)
	{
		$dias_total++;
	}

	$contador++;
}


$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.OBSERVACIONES,actualizaciones.AREA from actualizaciones,actualizaciones_general,proyecto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND actualizaciones_general.CODIGO_GENERAL = PROYECTO.codigo_proyecto AND PROYECTO.codigo_proyecto = '".$CODIGO_PROYECTO."' AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."' GROUP BY actualizaciones.AREA HAVING area in('','null')  ORDER BY FECHA";
$result2 = mysql_query($QUERY, $conn) or die(mysql_error());

$cu = 1;

 while($row = mysql_fetch_array($result2))
  {  
  $cuenta = $row["cuenta"];
  $AREA = $row["AREA"];
  $OBSERVACIONESS = $row["OBSERVACIONES"];

   
  if($cuenta != 0)
  {
	  if($cu == 1)
	  {
if($AREA != "CLIENTE")
{
 switch ($AREA)
		 {
	case "":
        $TIPO = '1';
        break;
 	case "null":
        $TIPO = '2';
        break;
		   default:
       $TIPO = '';
		 }

 $IN1+=$MONTO2;
 $tabla="<tr><td style='border-right:solid #CCC 1px; border-left:solid #CCC 1px;border-top:solid #CCC 1px;' colspan='2'><center> <a id='cod_ser' target='_blank' 				  href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>
<td style=' border-right:solid #CCC 1px;border-top:solid #CCC 1px;border:solid #CCC 1px'  colspan='2'><center>".$EJECUTIVO." </center></td>
<td style=' border-right:solid #CCC 1px;border-top:solid #CCC 1px;border:solid #CCC 1px;' colspan='2'><center>".number_format($MONTO2,0, ",", ".")." </center></td>

</tr>";
 $cu2++; 
 $pila[]= array( "TIPO" => $TIPO,
 "TABLA" => $tabla);
		  }

	  }

  }
  $cu++;
  
  }
 
  } 
asort($pila);
foreach ($pila  as $key => $val) 
{
 echo "".$pila[$key]["TABLA"].""  ;
}
 ?>

<tr>
	<th colspan="2" id="th_title_azul2">Total</th>
     <th colspan="2" id="th_title_azul2"><?php echo $cu2?></th>
    <th colspan="2" id="th_title_azul2"><?php echo number_format($IN1,0, ",", ".")?></th>
 
</tr>

<tr>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
    <td></td>
    <td></td>

</tr>





<tr>
	<th colspan="2" id="th_title_azul">ROCHAS CON INCUMPLIMIENTO HOLDING</th>
    <th colspan="1" id="th_title_azul">Ejecutivo</th>
    <th colspan="1" id="th_title_azul">Area Responsable</th>
   	<th colspan="2" id="th_title_azul">Cliente</th>
    <th colspan="2" id="th_title_azul">Observaciones</th>
    <th id="th_title_azul">Monto Neto</th>    
    <th id="th_title_azul">Dias Atraso</th>
   
</tr>
<?php
$cu2 = 0;
$COMERCIAL=0;
$DAM = 0;
$CLIENTE =0;
$PROVEEDOR=0;
$IMPORTACION=0;
$IN1=0;
$IN2=0;
$pila = array();
$tabla = "";
$TIPO = "";
$query_registro1 = "select NOMBRE_CLIENTE,CODIGO_PROYECTO,FECHA_ENTREGA,FECHA_CONFIRMACION,EJECUTIVO from PROYECTO where NOT ESTADO = 'NULA'  AND NOT ESTADO = 'VERSIONAR' AND FECHA_CONFIRMACION > FECHA_ENTREGA AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
  
$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
$EJECUTIVO = $row["EJECUTIVO"];
$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
$NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
$segundos= strtotime($FECHA_CONFIRMACION)-strtotime($FECHA_ENTREGA) ;
$diferencia_dias=intval($segundos/60/60/24);
$contador = 1;
$dias_total=0;
while($contador <= $diferencia_dias)
{
	$dias = dameFecha2(substr($FECHA_ENTREGA,0,10),$contador);
	
	if($dias == 1 || $dias == 2 || $dias == 3|| $dias == 4 || $dias == 5)
	{
		$dias_total++;
	}

	$contador++;
}


$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.OBSERVACIONES,actualizaciones.AREA,proyecto.MONTO from actualizaciones,actualizaciones_general,proyecto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND actualizaciones_general.CODIGO_GENERAL = PROYECTO.codigo_proyecto AND PROYECTO.codigo_proyecto = '".$CODIGO_PROYECTO."' AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."' GROUP BY actualizaciones.AREA HAVING not area = 'null' and not area = ''  ORDER BY FECHA";
$result2 = mysql_query($QUERY, $conn) or die(mysql_error());

$cu = 1;

 while($row = mysql_fetch_array($result2))
  {  
  $cuenta = $row["cuenta"];
  $AREA = $row["AREA"];
  $OBSERVACIONESS = $row["OBSERVACIONES"];
  $MONTO2 = $row["MONTO"];
   
  if($cuenta != 0)
  {
	  if($cu == 1)
	  {
if($AREA != "CLIENTE")
{
 switch ($AREA)
		 {
	case "ADQUISICIONES":
        $TIPO = '1';
        break;
    case "COMERCIAL":
        $TIPO = '2';	
        break;
    case "DAM":
        $TIPO = '3';	
        break;
    case "DESPACHO":
        $TIPO = '4';
        break;
    case "IMPORTACION":
        $TIPO = '5';	
        break;
    case "INSTALACION":
         $TIPO = '6';	
        break;
	case "PLANIFICACION":
         $TIPO = '7';
        break;
    case "PRODUCCION":
         $TIPO = '8';
        break;
    case "PROVEEDOR":
         $TIPO = '9';	
        break;
	case "SILLAS":
          $TIPO = '10';
        break;
   default:
       $TIPO = '';
		 }

 $IN1+=$row['MONTO'];
 
 $tabla="<tr><td style='border-right:solid #CCC 1px; border-left:solid #CCC 1px;border-top:solid #CCC 1px;' colspan='2'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>
  <td style='border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' colspan='1'><center>".$EJECUTIVO." </center></td>
 <td style='border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' colspan='1'><center>".$AREA." </center></td>
 <td style='border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' colspan='2'><center>".$NOMBRE_CLIENTE." </center></td>
 <td style='border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' colspan='2'><center>".$OBSERVACIONESS." </center></td>
 <td style=' border-left:solid #CCC 1px;border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' align= 'center'>".number_format($MONTO2,0, ",", ".")."</td><td style=' border-left:solid #CCC 1px;border-top:solid #CCC 1px;border-right:solid #CCC 1px;' align='center' >".$dias_total."</td></tr>";
 $cu2++; 
 $pila[]= array( "TIPO" => $TIPO,
 "TABLA" => $tabla);
		  }

	  }

  }
  $cu++;
  
  }
 
  } 
asort($pila);
foreach ($pila  as $key => $val) 
{
 echo "".$pila[$key]["TABLA"].""  ;
}
 ?>

<tr>
	<th colspan="2" id="th_title_azul2">TOTAL</th>
    
    <th id="th_title_azul2" colspan="6"></th>

    <th id="th_title_azul2"><?php echo number_format($su2,0, ",", ".");?></th>
    <th id="th_title_azul2"></th>
       
</tr>

<tr>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
    <td></td>
    <td></td>

</tr>
















<tr>
	<th colspan="2" id="th_title_rojo">FACTORES DE INCUMPLIMIENTO EXTERNO</th>
        
    <th id="th_title_rojo">Cantidad</th>
    <th id="th_title_rojo"></th>
    <th id="th_title_rojo">% Ingresos</th>
    <th id="th_title_rojo">Monto Neto</th>    
    <th id="th_title_rojo">Dias Atraso</th>
   
</tr>

<tr>
	<td colspan="2" id="td_title2">Cliente</td>
    
    <td id="td_title2" align="center"><?php echo $CLIENTE3 ?></td>
    <td id="td_title2" align="center"></td>
    <td id="td_title2" align="center"><?php echo number_format($div30,2, ",", "."); ?>%</td>
    <td id="td_title2" align="center"><?php echo number_format($CLIENTE4,0, ",", ".");?></td>
    <td id="td_title2_last" align="center"></td>
       
</tr>

<tr>
	<td colspan="2" id="th_title_rojo2">TOTAL</td>
    
    <td id="th_title_rojo2"></td>
    <td id="th_title_rojo2"></td>
    <td align="center" id="th_title_rojo2"><?php echo number_format($div30,2, ",", "."); ?>%</td>
    <td align="center" id="th_title_rojo2"><?php echo number_format($CLIENTE4,0, ",", ".");?></td>
     <td id="th_title_rojo2"></td>
    
</tr>

<tr>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
    <td></td>
    <td></td>

</tr>














<tr>
	<th colspan="2" id="th_title_rojo">ROCHAS CON INCUMPLIMIENTO EXTERNO</th>
        
    <th colspan="2" id="th_title_rojo">Area Responsable</th>
   <th colspan="2" id="th_title_rojo">Cliente</th>
        <th colspan="2" id="th_title_rojo">Observaciones</th>
    <th id="th_title_rojo">Monto Neto</th>    
    <th id="th_title_rojo">Dias Atraso</th>
  
   
</tr>
<?php
$cu2 = 0;
$COMERCIAL=0;
$DAM = 0;
$CLIENTE =0;
$PROVEEDOR=0;
$IMPORTACION=0;
$IN1=0;
$IN2=0;
$query_registro1 = "select NOMBRE_CLIENTE,CODIGO_PROYECTO,FECHA_ENTREGA,FECHA_CONFIRMACION from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR'  AND FECHA_CONFIRMACION > FECHA_ENTREGA AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
  
$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
$NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];

$segundos= strtotime($FECHA_CONFIRMACION)-strtotime($FECHA_ENTREGA) ;
$diferencia_dias=intval($segundos/60/60/24);
$contador = 1;
$dias_total=0;
while($contador <= $diferencia_dias)
{
	$dias = dameFecha2(substr($FECHA_ENTREGA,0,10),$contador);
	
	if($dias == 1 || $dias == 2 || $dias == 3|| $dias == 4 || $dias == 5)
	{
		$dias_total++;
	}

	$contador++;
}

$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.AREA,proyecto.MONTO,actualizaciones.OBSERVACIONES from actualizaciones,actualizaciones_general,proyecto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND actualizaciones_general.CODIGO_GENERAL = PROYECTO.codigo_proyecto AND PROYECTO.codigo_proyecto = '".$CODIGO_PROYECTO."' AND FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."' GROUP BY actualizaciones.AREA HAVING not area = 'null' ORDER BY FECHA";
$result2 = mysql_query($QUERY, $conn) or die(mysql_error());

$cu = 1;

 while($row = mysql_fetch_array($result2))
  {  
  $cuenta = $row["cuenta"];
  $AREA = $row["AREA"];
   $MONTO2 = $row["MONTO"];
     $OBSERVACIONESS = $row["OBSERVACIONES"];
  if($cuenta != 0)
  {
	  if($cu == 1)
	  {
if($AREA == "CLIENTE")
{
		  $IN1+=$row['MONTO'];
   echo  "<tr><td style='border-right:solid #CCC 1px; border-left:solid #CCC 1px;border-top:solid #CCC 1px;' colspan='2'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
 echo "<td style='border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' colspan='2'><center>".$AREA." </center></td>
 <td style='border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' colspan='2'><center>".$NOMBRE_CLIENTE." </center></td>
<td style='border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' colspan='2'><center>".$OBSERVACIONESS." </center></td>
 <td style=' border-left:solid #CCC 1px;border-top:solid #CCC 1px;' style = 'border:solid #CCC 1px;' align= 'center'>".number_format($MONTO2,0, ",", ".")."</td><td style=' border-left:solid #CCC 1px;border-top:solid #CCC 1px;border-right:solid #CCC 1px;' align='center' >".$dias_total."</td></tr>";
 $cu2++; 
		  }
		  


	  }
  }
  $cu++;
  
  }
 
  } 
 ?>
<tr>
	<td colspan="5" id="th_title_rojo2">TOTAL</td>
    
    <td id="th_title_rojo2"></td>
    <td id="th_title_rojo2"></td>
    <td id="th_title_rojo2"></td>
    <td align="CENTER" id="th_title_rojo2"><?php echo number_format($CLIENTE4,0, ",", ".");?></td>
     <td id="th_title_rojo2"></td>
    
</tr>

<tr>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
    <td></td>
    <td></td>

</tr>
















</table>

</div>
</center>
</div>

</body>
</html>