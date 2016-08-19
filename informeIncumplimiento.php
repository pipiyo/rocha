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
/* Funciones para la suma y resta de días */

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

$query_registro1 = "select CODIGO_PROYECTO from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR' AND FECHA_CONFIRMACION > FECHA_ENTREGA AND FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

while($row = mysql_fetch_array($result1))
{  
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];

	$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.AREA , MONTO AS SUMA from actualizaciones,actualizaciones_general,proyecto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND actualizaciones_general.CODIGO_GENERAL = PROYECTO.codigo_proyecto AND PROYECTO.codigo_proyecto = '".$CODIGO_PROYECTO."' AND FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' GROUP BY actualizaciones.AREA  HAVING not area = 'null' ORDER BY FECHA ";
		
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
/* Adelantados */
$query_registro3 = "select count(CODIGO_PROYECTO) AS ADELANTADOS from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR' AND FECHA_CONFIRMACION < FECHA_ENTREGA AND FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result3))
{  
	$ADELANTADOS = $row["ADELANTADOS"];
}   

/* Cumplidos */
$query_registro2 = "select * from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR' AND FECHA_CONFIRMACION <= FECHA_ENTREGA  AND FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'";
$CUMPLIDOS = 0;
$CUMPLIDOS_TOTAL=0;
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
{  
    $CUMPLIDOS++;
	$CUMPLIDOS_TOTAL+= $row["MONTO"];
} 

/* Programados */ 
$query_registro = "select count(CODIGO_PROYECTO) AS ProgramadosS, sum(MONTO) AS ProgramadosS1 from PROYECTO where NOT ESTADO = 'NULA' AND NOT ESTADO = 'VERSIONAR'  AND FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result))
{  
	$ProgramadosS = $row["ProgramadosS"];
	$ProgramadosS_total= $row["ProgramadosS1"];
}
   
$ejecutadoHold = $ProgramadosS - $CLIENTE3; 
 
$su1 = $COMERCIAL3 + $DAM3  + $PROVEEDOR3 + $IMPORTACION3+$ADQUISICIONES3 + $DESPACHO3 + $PRODUCCION3 + $INSTALACION3 + $SILLAS3 + $PLANIFICACION3 ;

$su2 = $COMERCIAL4 + $DAM4  + $PROVEEDOR4 + $IMPORTACION4+$ADQUISICIONES4 + $DESPACHO4 + $PRODUCCION4 + $INSTALACION4 + $SILLAS4 + $PLANIFICACION4 ;

$su3 =  $ADQUISICIONES3 + $DESPACHO3 + $PRODUCCION3 + $INSTALACION3 + $SILLAS3 + $PROVEEDOR3 ;

$su4 =    $ADQUISICIONES4 + $DESPACHO4 + $PRODUCCION4 + $INSTALACION4 + $SILLAS4 + $PROVEEDOR4 ;

$cumpfin = $CUMPLIDOS - $ADELANTADOS;

$VACIO = $ejecutadoHold - $cumpfin - $ADELANTADOS - $su1;
   
$TOTALFAB = $CUMPLIDOS_TOTAL + $su2;
   
$cumpfin = $CUMPLIDOS - $ADELANTADOS + $VACIO;
$ejecutadfab = $cumpfin +  $su3 + $ADELANTADOS;
$TOTALCAUSALHOL = $ProgramadosS_total - $CLIENTE4;
	
 
/* Uno */	
if($ejecutadfab == 0 ||  $ProgramadosS == 0){
	$div1 = 0;	
}
else{
	$div1 =  $ejecutadfab/ $ProgramadosS  * 100;
}

/* Dos */	
if($cumpfin == 0 ||  $ejecutadfab == 0){
	$div2 = 0;	
}
else{
	$div2 = $cumpfin / $ejecutadfab * 100;
}

/* Tres */		
if($cumpfin == 0 ||  $ejecutadoHold == 0){
	$div3 = 0;	
}
else{
	$div3 = $cumpfin / $ejecutadoHold * 100;
}
		
/* Cuatro */		
if($ADELANTADOS == 0 ||  $ejecutadfab == 0){
	$div4 = 0;	
}
else{
	$div4 = $ADELANTADOS / $ejecutadfab * 100;
}

/* Cinco */		
if($ADELANTADOS == 0 ||  $ejecutadoHold == 0){
	$div5 = 0;	
}
else{
	$div5 = $ADELANTADOS / $ejecutadoHold * 100;
}

/* Seis */	
if($su3 == 0 ||  $ejecutadoHold == 0){
	$div6 = 0;	
}
else{
	$div6 = $su3 / $ejecutadoHold * 100;
}

/* Siete */		
if($su1 == 0 ||  $ejecutadoHold == 0)
{
	$div7 = 0;	
}
else{
	$div7 = $su1 / $ejecutadoHold * 100;
}

/* Ocho */		
if($CLIENTE3 == 0 ||  $ejecutadoHold == 0){
	$div8 = 0;	
}
else{
	$div8 = $su1 / $ejecutadoHold * 100;
}

/* Nueve */	
if($ejecutadfab == 0 ||  $su3 == 0){
	$div9 = 100;	
}
else{
   $div9 =  1 -($su3 / $ejecutadfab);	
   $div9 = $div9 * 100;
}

/* Diez */
if($ejecutadfab == 0 ||  $ADQUISICIONES3 == 0){
	$div13 = 0;	
}
else
{
   $div13 = $ADQUISICIONES3  / $ejecutadfab * 100;	
}

/* Once */
if($ejecutadfab == 0 ||  $DESPACHO3 == 0){
	$div14 = 0;	
}
else{
   $div14 = $DESPACHO3  / $ejecutadfab * 100;	
}

/* Doce */
if($ejecutadfab == 0 ||  $PRODUCCION3 == 0){
	$div15 = 0;	
}
else{
   $div15 = $PRODUCCION3  / $ejecutadfab * 100;	
}

/* Trece */
if($ejecutadfab == 0 || $INSTALACION3 == 0){
	$div16 = 0;	
}
else{
   $div16 = $INSTALACION3  / $ejecutadfab * 100;	
}

/* Catorce */	
if($ejecutadfab == 0 || $SILLAS3 == 0)
{
	$div17 = 0;	
}
else
{
   $div17 = $SILLAS3  / $ejecutadfab * 100;	
}	

/* Quince */	
if($ejecutadfab == 0 || $PROVEEDOR3 == 0){
	$div18 = 0;	
}
else{
   $div18 = $PROVEEDOR3 / $ejecutadfab * 100;	
}

/* Dieciseis */	
if($ejecutadoHold  == 0 || $ADQUISICIONES3 == 0){
	$div19 = 0;	
}
else{
	$div19 = $ADQUISICIONES3 / $ejecutadoHold * 100;	
}

/* Diecisiete*/	
if($ejecutadoHold  == 0 || $DESPACHO3 == 0){
	$div20 = 0;	
}
else{
	$div20 = $DESPACHO3 / $ejecutadoHold * 100;	
}	
	
/* Dieciocho */
if($ejecutadoHold  == 0 || $PRODUCCION3 == 0){
	$div21 = 0;	
}
else{
	$div21 = $PRODUCCION3 / $ejecutadoHold * 100;	
}	
	
/**/	
if($ejecutadoHold  == 0 || $INSTALACION3 == 0){
	$div23 = 0;	
}
else{
	$div23 = $INSTALACION3 / $ejecutadoHold * 100;	
}

/**/	
if($ejecutadoHold  == 0 || $SILLAS3 == 0){
	$div24 = 0;	
}
else{
	$div24 = $SILLAS3  / $ejecutadoHold * 100;	
}

/**/	
if($ejecutadoHold  == 0 || $PLANIFICACION3 == 0){
	$div25 = 0;	
}
else{
	$div25 = $PLANIFICACION3  / $ejecutadoHold * 100;	
}

/**/
if($ejecutadoHold  == 0 || $COMERCIAL3 == 0){
	$div26 = 0;	
}
else{
	$div26 = $COMERCIAL3  / $ejecutadoHold * 100;	
}

/**/
if($ejecutadoHold  == 0 || $DAM3 == 0)
{
$div27 = 0;	
}
else
{
$div27 = $DAM3  / $ejecutadoHold * 100;	
}		

/**/
if($ejecutadoHold  == 0 || $PROVEEDOR3 == 0){
	$div28 = 0;	
}
else{
	$div28 = $PROVEEDOR3  / $ejecutadoHold * 100;	
}

/**/
if($ejecutadoHold  == 0 || $IMPORTACION3 == 0){
	$div29 = 0;	
}
else{
	$div29 = $IMPORTACION3  / $ejecutadoHold * 100;	
}

/**/	
if($CLIENTE3 == 0 ||  $ejecutadoHold == 0){
	$div30 = 0;	
}
else{
	$div30 = $CLIENTE3 / $ejecutadoHold * 100;
}
	
/**/	
if($ejecutadoHold == 0 ||  $su1 == 0){
	$div31 = 0;	
}
else{
	$div31 =  1 -($su1 / $ejecutadoHold);	
	$div31 = $div31 * 100;
}

/**/
if($TOTALFAB == 0 ||  $su4 == 0){
	$div32 = 0;	
}
else
{
	$div32 =  1 -($su4 / $TOTALFAB);	
	$div32 = $div32 * 100;
}

if($TOTALCAUSALHOL == 0 ||  $su2 == 0){
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

<!DOCTYPE html>
<html>
	<head>
		<title>Informe de cumplimiento V1.0</title>

		<meta charset="utf-8" >
		
		<link rel="shortcut icon" href="Imagenes/rocha.png">
		<link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
	  	

	  	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

	  	<!--Calendario -->
	  	<link rel="stylesheet" href="style/calendario.css" />
	  	<script src="js/calendario.js"></script>

	 
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
		<div id='bread'>
			<div id="menu1"></div>
		</div> 
		<h2 id='indi_h2'>INDICADOR DE CUMPLIMIENTO / Desde <?php echo $txt_desde ?> / Hasta <?php echo $txt_hasta ?> </h2>

		<form action="" method="get">
			<table  id = "formulario" class="center">
				<tr>
					<td width="100">Desde</td>
					<td width="100"><input class='textbox' name="txt_desde" id="txt_desde" type="text" /></td>
					<td width="100">Hasta</td>
					<td width="100"><input class='textbox'  name="txt_hasta" id="txt_hasta" type="text" /></td>
					<td width="100"> <input class='casillaBotonPS1' type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>
				</tr>
			</table>
		</form>

		<table class="tablas_Indicador_cumplimiento normal-table">
			<tr>
				<th colspan="2" id="th_title_azul">FACTORES DE INCUMPLIMIENTO HOLDING</th>
			        
			    <th id="th_title_azul">Cantidad</th>
			    <th id="th_title_azul">% Holding</th>
			    <th id="th_title_azul">Monto Neto</th>    
			    <th id="th_title_azul">% Cumplimiento</th>
			   
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Adquisiciones</td>
			    <td id="td_title2" align="right"><?php echo $ADQUISICIONES3 ?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div19,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($ADQUISICIONES4,0, ",", "."); ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div19,2, ",", "."); ?>%</td>
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Despacho</td>
			    <td id="td_title2" align="right"><?php echo $DESPACHO3 ?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div20,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($DESPACHO4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div20,2, ",", "."); ?>%</td>
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Instalacion</td>
			    <td id="td_title2" align="right"><?php echo $INSTALACION3;?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div23,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($INSTALACION4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div23,2, ",", "."); ?>%</td>  
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Planificacion</td>
			    <td id="td_title2" align="right"><?php echo $PLANIFICACION3;?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div25,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($PLANIFICACION4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div25,2, ",", "."); ?>%</td>   
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Produccion</td>
			    <td id="td_title2" align="right"><?php echo $PRODUCCION3; ?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div21,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($PRODUCCION4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div21,2, ",", "."); ?>%</td>
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Sillas</td>
			    <td id="td_title2" align="right"><?php echo $SILLAS3;?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div24,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($SILLAS4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div24,2, ",", "."); ?>%</td>
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Comercial</td>
			    <td id="td_title2" align="right"><?php echo $COMERCIAL3;?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div26,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($COMERCIAL4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div26,2, ",", "."); ?>%</td>
			</tr>

			<tr>
				<td colspan="2" id="td_title2">DAM</td>
			    <td id="td_title2" align="right"><?php echo $DAM3;?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div27,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($DAM4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div27,2, ",", "."); ?>%</td> 
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Importacion</td>
			    <td id="td_title2" align="right"><?php echo $IMPORTACION3;?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div29,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($IMPORTACION4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div29,2, ",", "."); ?>%</td>
			       
			</tr>
			<tr>
				<td colspan="2" id="td_title2">Proveedor</td>
			    <td id="td_title2" align="right"><?php echo $PROVEEDOR3;?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div28,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($PROVEEDOR4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div28,2, ",", "."); ?>%</td>  
			</tr>

			<tr>
				<th colspan="2" id="th_title_azul2">TOTAL</th>
			    <th id="th_title_azul2" align="right"><?php echo $su1;?></th>
			    <th id="th_title_azul2"><?php echo number_format($suma1,2, ",", "."); ?>%</th>
			    <th id="th_title_azul2" align="right"><?php echo number_format($su2,0, ",", ".");?></th>
			    <th id="th_title_azul2"><?php echo number_format( 100 - $suma1,2, ",", "."); ?>%</th>     
			</tr>

			<tr height="20">
			</tr>

			<tr>
				<th colspan="2" id="th_title_azul">FACTORES DE INCUMPLIMIENTO FABRICA</th>  
			    <th id="th_title_azul">Cantidad</th>
			    <th id="th_title_azul">% Fabrica</th>
			    <th id="th_title_azul">Monto Neto</th>    
			    <th id="th_title_azul">% Cumplimiento</th>
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Adquisiciones</td>
			    <td id="td_title2" align="right"><?php echo $ADQUISICIONES3 ?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div13,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($ADQUISICIONES4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div13,2, ",", "."); ?>%</td>       
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Despacho</td>
			    <td id="td_title2" align="right"><?php echo $DESPACHO3 ?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div14,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($DESPACHO4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div14,2, ",", "."); ?>%</td>
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Instalacion</td>    
			    <td id="td_title2" align="right"><?php echo $INSTALACION3;?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div16,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($INSTALACION4,0, ",", ".");?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div16,2, ",", "."); ?>%</td>
			</tr>
			<tr>
				<td colspan="2" id="td_title2">Proveedor</td>
			    <td id="td_title2" align="right"><?php echo $PROVEEDOR3;?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div18,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($PROVEEDOR4,0, ",", ".") ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div18,2, ",", "."); ?>%</td>  
			</tr>
			<tr>
				<td colspan="2" id="td_title2">Produccion</td>
			    <td id="td_title2" align="right"><?php echo $PRODUCCION3; ?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div15,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($PRODUCCION4,0, ",", "."); ?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div15,2, ",", "."); ?>%</td>
			</tr>

			<tr>
				<td colspan="2" id="td_title2">Sillas</td>
			    <td id="td_title2" align="right"><?php echo $SILLAS3;?></td>
			    <td id="td_title2" align="center"><?php echo number_format($div17,2, ",", "."); ?>%</td>
			    <td id="td_title2" align="right"><?php echo number_format($SILLAS4,0, ",", ".");?></td>
			    <td id="td_title2_last" align="center"><?php echo number_format( 100 - $div17,2, ",", "."); ?>%</td>
			</tr>

			<tr>
				<th colspan="2" id="th_title_azul2">TOTAL</th>
    			<th id="th_title_azul2" align="right"><?php echo $su3 ?></th>
    			<th id="th_title_azul2"><?php echo number_format($suma,2, ",", "."); ?>%</th>
    			<th id="th_title_azul2" align="right"><?php echo number_format($su4,0, ",", ".");?></th>
     			<th id="th_title_azul2"><?php echo number_format( 100 - $suma,2, ",", "."); ?>%</th> 
			</tr>
		</table>

	</body>
</html>