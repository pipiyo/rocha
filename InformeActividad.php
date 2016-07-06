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


$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
$aanno = date("d/m/Y");
$fech = substr($aanno,6,4);
$nombreser = $_GET["nombreser"];

if (isset($_GET["buscar1"])) 
{
	$fech = $_GET["ann"];
$aanno= "01/01/".$fech;   
}


if (isset($_GET["buscar"])) 
{    

if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}
}

$selected1="";
$selected2="";
if($fech == '2014')
{
	$selected1 = 'selected';
}
else
{
	$selected2 = 'selected';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Informe Cumplimiento V1.1.0</title>
   <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_informes.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script language = javascript>
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });     
  </script>

</head>

<body>

  <div id="main">	
    
	<div id="site_content">			   
  	  
	  <div id="content">   
   
<div  class="content_item">	
<form action="" method="GET">
<center>
<H1 style="color:#006;"> Indice De Cumplimiento <?php  echo $nombreser; ?></H1>
<br />
<table>
<tr>
<td>
<select style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px; width:100px;border:#ccc 1px solid;" name="ann">
<option <?php echo $selected1?>> 2014 </option>
<option <?php echo $selected2?>> 2013 </option>
</select></td>
<input style="display:none;" type="text" value="<?php echo $nombreser?>" name = "nombreser" id="nombreser" /> 
<td><input style=" font: normal .90em arial, sans-serif;
  color: #1D1D1D; cursor:pointer; color:#000;background-color: #CFCFCF; width:100px;border-radius: 10px; border:#fff 1px solid;"  type="submit" name="buscar1" value="Aceptar" /> </td>
</tr>
</table>
<br />
<table id = "" cellpadding="0" cellspacing="0"  style="font-size:10px;">
<tr>
<th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Mes</center></th>
<th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Actividad Programados</center></th>
<th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Actividad Validados</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><center>Actividad Cumplidas</center></th> 
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><center>% Validados</center></th> 
          <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><center>% Programados</center></th> 
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>Actividad Incumplidas</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>% Validados</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>% Programados</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CC9;'><center>Actividad Adelantadas</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right:#E4E4E7 1px solid;background:#CC9;'><center>% Validados</center>
          <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right:#E4E4E7 1px solid;background:#CC9;'><center>% Programados</center></th> </tr>
<?php 


function dameFecha($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon+$dia,$day,$year));        
}
$contador = 0;
while($contador < 12)
{
mysql_select_db($database_conn, $conn);
$numero = 0;

 $buscar = substr(dameFecha('01/01/'.$fech,$contador),0,7);

  switch ($buscar) {
    case $fech."-01":
        $mes = "Enero";
        break;
    case $fech."-02":
        $mes = "Febrero";
        break;
    case $fech."-03":
       $mes = "Marzo";
        break;
	case $fech."-04":
        $mes = "Abril";
        break;
    case $fech."-05":
        $mes = "Mayo";
        break;
    case $fech."-06":
        $mes = "Junio";
        break;
	case $fech."-07":
        $mes = "Julio";
        break;
	case $fech."-08":
        $mes = "Agosto";
        break;
    case $fech."-09":
        $mes = "Septiembre";
        break;
    case $fech."-10":
        $mes = "Octubre";
        break;
	case $fech."-11":
        $mes = "Noviembre";
        break;
	case $fech."-12":
        $mes = "Diciembre";
        break;
  }
$query_registro = "select count(CODIGO_SERVICIO) AS ProgramadosS from servicio where nombre_servicio = '".$nombreser."' and  NOT ESTADO = 'NULO' AND FECHA_PRIMERA_ENTREGA LIKE '%".$buscar."%'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {  
    $ProgramadosS = $row["ProgramadosS"];
  }
  
  
  
  ///
  $INCumplidas = 0;
  $query_registro1 = "select CODIGO_SERVICIO from servicio where nombre_servicio = '".$nombreser."' and NOT ESTADO = 'NULO'  AND FECHA_PRIMERA_ENTREGA < FECHA_ENTREGA AND FECHA_PRIMERA_ENTREGA LIKE '%".$buscar."%'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
  
$CODIGO_Actividad = $row["CODIGO_SERVICIO"];
  
$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.AREA 
from actualizaciones,actualizaciones_general,servicio where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND 
actualizaciones_general.codigo_servicio = servicio.codigo_servicio AND SERVICIO.codigo_servicio = '".$CODIGO_Actividad."' and FECHA_PRIMERA_ENTREGA LIKE '%".$buscar."%' GROUP BY actualizaciones.AREA HAVING not area = 'null' ORDER BY  FECHA_ENTREGA ";
$result2 = mysql_query($QUERY, $conn) or die(mysql_error());

$sumatoria = 1;

 while($row = mysql_fetch_array($result2))
  {  
  if($sumatoria == '1')
  {
  $cuenta = $row["cuenta"];
  $AREA = $row["AREA"];
   $sumatoria++;
  
 if($AREA == "ADQUISICIONES" || $AREA == "SILLAS" || $AREA == "PRODUCCION" || $AREA == "DESPACHO" || $AREA == "INSTALACION" || $AREA == "PLANIFICACION")
  {
	  $INCumplidas++;
  }
  }
  
  }
  }
  
  
  ///
$query_registro2 = "select count(CODIGO_SERVICIO) AS Cumplidas from SERVICIO where nombre_servicio = '".$nombreser."' and NOT ESTADO = 'NULO' AND FECHA_ENTREGA <= FECHA_PRIMERA_ENTREGA AND FECHA_PRIMERA_ENTREGA  LIKE '%".$buscar."%'";
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result2))
  {  
    $Cumplidas = $row["Cumplidas"];
  } 
$query_registro3 = "select count(CODIGO_SERVICIO) AS ADELANTADOS from SERVICIO where  nombre_servicio = '".$nombreser."' and NOT ESTADO = 'NULO' AND FECHA_ENTREGA < FECHA_PRIMERA_ENTREGA AND FECHA_PRIMERA_ENTREGA  LIKE '%".$buscar."%'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result3))
  {  
    $ADELANTADOS = $row["ADELANTADOS"];
  }   
  
  
  ////////////////////////////////////////////
$VALIDADOS = $Cumplidas + $INCumplidas;
  
  if($VALIDADOS > 0 && $ADELANTADOS > 0 )
  {
  $TOTAL2 = ( $ADELANTADOS / $VALIDADOS ) * 100;
  }
  else
  {
	$TOTAL2 = 0;  
  }
  
    if($ProgramadosS > 0 && $ADELANTADOS > 0 )
  {
  $TOTAL7 = ( $ADELANTADOS / $ProgramadosS ) * 100;
  }
  else
  {
	$TOTAL7 = 0;  
  }
  if($ProgramadosS > 0 && $Cumplidas > 0 )
  {
  $TOTAL1 = ( $Cumplidas / $ProgramadosS ) * 100; 
  }
   else
  {
	$TOTAL1 = 0;  
  }
   if($ProgramadosS > 0 && $INCumplidas > 0 )
  {
 $TOTAL = ( $INCumplidas / $ProgramadosS ) * 100; 
  }
   else
  {
	$TOTAL = 0;  
  }
  
  if($VALIDADOS > 0 && $Cumplidas > 0 )
  {
  $TOTAL3 = ( $Cumplidas / $VALIDADOS ) * 100; 
  }
   else
  {
	$TOTAL3 = 0;  
  }
   if($VALIDADOS > 0 && $INCumplidas > 0 )
  {
 $TOTAL4 = ( $INCumplidas / $VALIDADOS) * 100; 
  }
   else
  {
	$TOTAL4 = 0;  
  }
    echo  "<tr><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$mes."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$ProgramadosS."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$VALIDADOS."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><center>".$Cumplidas."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><center>".number_format($TOTAL3,2, ",", ".") ."%</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><center>".number_format($TOTAL1,2, ",", ".") ."%</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>".$INCumplidas."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>".number_format($TOTAL,2, ",", ".")."%</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>".number_format($TOTAL,2, ",", ".")."%</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CC9;'><center>".$ADELANTADOS."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right:#E4E4E7 1px solid;background:#CC9;'><center>".number_format($TOTAL7,2, ",", ".")."%</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right:#E4E4E7 1px solid;background:#CC9;'><center>".number_format($TOTAL2,2, ",", ".")."%</center></td></tr>";
	$numero++;
	  $contador++; 
 }
  mysql_free_result($result);


?>
</table>

<br />
<table  id = "formulario">
<tr>
<td width="100"><center>Desde</center></td>
<td width="100"><input style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" name="txt_desde" id="txt_desde" type="text" /></td>
<td width="100"><center>Hasta</center></td>
<td width="100"><input style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" name="txt_hasta" id="txt_hasta" type="text" /></td>
<td width="100"> <input style=" font: normal .90em arial, sans-serif;
  color: #1D1D1D; cursor:pointer; color:#000;background-color: #CFCFCF; width:100px;border-radius: 10px; border:#fff 1px solid;" type="submit" id="buscar" name = "buscar" value = "Buscar" /><input type="text" style="display:none;" value="<?php echo $nombreser?>" name = "nombreser" id="nombreser" /> </td>
</tr>
</table>
</center>

<br />
<center>
<table  cellpadding="0" cellspacing="0"  style="font-size:10px;">

         
    
<?php
mysql_select_db($database_conn, $conn);
$numero = 0;

$query_registro = "select count(CODIGO_SERVICIO) AS ProgramadosS from SERVICIO where nombre_servicio = '".$nombreser."' and NOT ESTADO = 'NULO' AND FECHA_PRIMERA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {  
    $ProgramadosS = $row["ProgramadosS"];
  }
  
  ///
  $INCumplidas = 0;
  $query_registro1 = "select CODIGO_SERVICIO from SERVICIO where nombre_servicio = '".$nombreser."' and NOT ESTADO = 'NULO'  AND FECHA_ENTREGA  > FECHA_PRIMERA_ENTREGA AND FECHA_PRIMERA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
  
$CODIGO_Actividad = $row["CODIGO_SERVICIO"];
  
$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.AREA 
from actualizaciones,actualizaciones_general,servicio where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND 
actualizaciones_general.codigo_servicio = servicio.codigo_servicio AND SERVICIO.codigo_servicio = '".$CODIGO_Actividad."' AND FECHA_PRIMERA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."' GROUP BY actualizaciones.AREA HAVING not area = 'null' ORDER BY FECHA_ENTREGA  ";
$result2 = mysql_query($QUERY, $conn) or die(mysql_error());

$sumatoria = 1;

 while($row = mysql_fetch_array($result2))
  {  
  if($sumatoria == '1')
  {
  $cuenta = $row["cuenta"];
  $AREA = $row["AREA"];
  $sumatoria++;
  
  
  if($AREA == "ADQUISICIONES" || $AREA == "SILLAS" || $AREA == "PRODUCCION" || $AREA == "DESPACHO" || $AREA == "INSTALACION" || $AREA == "PLANIFICACION")
  {
	  $INCumplidas++;
  }
  
  }
  
  }
  
  }
  
  
$query_registro2 = "select count(CODIGO_SERVICIO) AS Cumplidas from SERVICIO where nombre_servicio = '".$nombreser."' and NOT ESTADO = 'NULO' AND FECHA_ENTREGA <= FECHA_PRIMERA_ENTREGA  AND FECHA_PRIMERA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."'";

$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result2))
  {  
    $Cumplidas = $row["Cumplidas"];
  } 
$query_registro3 = "select count(CODIGO_SERVICIO) AS ADELANTADOS from SERVICIO where nombre_servicio = '".$nombreser."' and NOT ESTADO = 'NULO' AND FECHA_ENTREGA < FECHA_PRIMERA_ENTREGA AND FECHA_PRIMERA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result3))
  {  
    $ADELANTADOS = $row["ADELANTADOS"];
  }   
   $VALIDADOS = $Cumplidas + $INCumplidas;
  
  if($VALIDADOS > 0 && $ADELANTADOS > 0 )
  {
  $TOTAL2 = ( $ADELANTADOS / $VALIDADOS ) * 100;
  }
  else
  {
	$TOTAL2 = 0;  
  }
  
    if($ProgramadosS > 0 && $ADELANTADOS > 0 )
  {
  $TOTAL7 = ( $ADELANTADOS / $ProgramadosS ) * 100;
  }
  else
  {
	$TOTAL7 = 0;  
  }
  if($ProgramadosS > 0 && $Cumplidas > 0 )
  {
  $TOTAL1 = ( $Cumplidas / $ProgramadosS ) * 100; 
  }
   else
  {
	$TOTAL1 = 0;  
  }
   if($ProgramadosS > 0 && $INCumplidas > 0 )
  {
 $TOTAL = ( $INCumplidas / $ProgramadosS ) * 100; 
  }
   else
  {
	$TOTAL = 0;  
  }
  
  if($VALIDADOS > 0 && $Cumplidas > 0 )
  {
  $TOTAL3 = ( $Cumplidas / $VALIDADOS ) * 100; 
  }
   else
  {
	$TOTAL3 = 0;  
  }
   if($VALIDADOS > 0 && $INCumplidas > 0 )
  {
 $TOTAL4 = ( $INCumplidas / $VALIDADOS) * 100; 
  }
   else
  {
	$TOTAL4 = 0;  
  }
  
 
	echo  "<tr><th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;'><center>Actividad Programadoss</center></th><td style='border-left: #E4E4E7 1px solid;border-top: #E4E4E7 1px solid'><center>".$ProgramadosS."</center></td><td rowspan='2' style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;'>Validados</td><td rowspan='2' style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid; ' >Programadoss</td></tr>";
		echo  "<tr><th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;'><center>Actividad Validados</center></th><td style='border-left: #E4E4E7 1px solid;border-top: #E4E4E7 1px solid;'><center>".$VALIDADOS."</center></td></tr>";
	echo  "<tr><th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;background:#C9F;'><center>Actividad Cumplidas</center></th> <td style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;'><center>".$Cumplidas."</center></td><td style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;' align='center'>".number_format($TOTAL3,2, ",", ".")."%</td><td style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid; 'align='center' >".number_format($TOTAL1,2, ",", ".")."%</td></tr>";
	echo  "<tr><th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;background:#F99;'><center>Actividad Incumplidas</center></th><td style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;'><center>".$INCumplidas."</center><td style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;'align='center' >".number_format($TOTAL4,2, ",", ".")."%</td><td style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid; 'align='center' >".number_format($TOTAL,2, ",", ".")."%</td></td></tr>";
	echo  "<tr><th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CC9;'><center>Actividad Adelantadas</center></th><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid; width:100px;border-top: #E4E4E7 1px solid;'><center>".$ADELANTADOS."</center></td><td style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;' align='center'>".number_format($TOTAL2,2, ",", ".")."%</td><td style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid; ' align='center' >".number_format($TOTAL7,2, ",", ".")."%</td></tr>";
	$numero++;
	
 
  mysql_free_result($result);


?>
</table>
<br />

<table  rules="all" frame="box"  style="font-size:9px;">

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
$query_registro1 = "select CODIGO_SERVICIO from SERVICIO where nombre_servicio = '".$nombreser."' and NOT ESTADO = 'NULO'  AND FECHA_ENTREGA > FECHA_PRIMERA_ENTREGA AND FECHA_PRIMERA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
  
$CODIGO_Actividad = $row["CODIGO_SERVICIO"];
  
$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.AREA 
from actualizaciones,actualizaciones_general,servicio where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND 
actualizaciones_general.codigo_servicio = servicio.codigo_servicio AND SERVICIO.codigo_servicio = '".$CODIGO_Actividad."' AND FECHA_PRIMERA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."' GROUP BY actualizaciones.AREA  HAVING not area = 'null' ORDER BY FECHA_ENTREGA ";
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
  }
  else if($AREA == 'DAM')
  {
	 
	  $DAM3++;
  }
    else if($AREA == 'CLIENTE')
  {
	  
	  $CLIENTE3++;
  }
    else if($AREA == 'PROVEEDOR')
  {
	
	  $PROVEEDOR3++;
  }
     else if($AREA == 'IMPORTACION')
  {
	 
	  $IMPORTACION3++;
  }
       else if($AREA == 'INSTALACION')
  {
	  
	  $INSTALACION3++;
  }
  else if($AREA == 'DESPACHO')
  {
	  
	  $DESPACHO3++;
  }
  else if($AREA == 'PRODUCCION')
  {
	
	  $PRODUCCION3++;
  }
    else if($AREA == 'ADQUISICIONES')
  {
	
	  $ADQUISICIONES3++;
  }
   else if($AREA == 'SILLAS')
  {
	  
	  $SILLAS3++;
  }
  else if($AREA == 'PLANIFICACION')
  {
	  
	  $PLANIFICACION3++;
  }
  }
  }
  }
  
  if($VALIDADOS > 0 && $ADQUISICIONES3 > 0 )
  {
 $VALOR = ( $ADQUISICIONES3 / $VALIDADOS) * 100; 
  }
   else
  {
  $VALOR = 0;  
  }
    if($VALIDADOS > 0 && $DESPACHO3 > 0 )
  {
 $VALOR1 = ( $DESPACHO3 / $VALIDADOS) * 100; 
  }
   else
  {
  $VALOR1 = 0;  
  }
      if($VALIDADOS > 0 && $PRODUCCION3 > 0 )
  {
 $VALOR2 = ( $PRODUCCION3 / $VALIDADOS) * 100; 
  }
   else
  {
  $VALOR2 = 0;  
  }
      if($VALIDADOS > 0 && $INSTALACION3 > 0 )
  {
 $VALOR3 = ( $INSTALACION3 / $VALIDADOS) * 100; 
  }
   else
  {
  $VALOR3 = 0;  
  }
     if($VALIDADOS > 0 && $SILLAS3 > 0 )
  {
 $VALOR4 = ( $SILLAS3 / $VALIDADOS) * 100; 
  }
   else
  {
  $VALOR4 = 0;  
  }
   if($VALIDADOS > 0 && $PLANIFICACION3 > 0 )
  {
 $VALOR14 = ( $PLANIFICACION3 / $VALIDADOS) * 100; 
  }
   else
  {
  $VALOR14 = 0;  
  }
    if($ProgramadosS > 0 && $COMERCIAL3 > 0 )
  {
 $VALOR6 = ( $COMERCIAL3/ $ProgramadosS) * 100; 
  }
   else
  {
  $VALOR6 = 0;  
  }
  
    if($ProgramadosS > 0 && $DAM3 > 0 )
  {
 $VALOR7 = ( $DAM3/ $ProgramadosS) * 100; 
  }
   else
  {
  $VALOR7 = 0;  
  }
    if($ProgramadosS > 0 && $CLIENTE3 > 0 )
  {
 $VALOR8 = ( $CLIENTE3/ $ProgramadosS) * 100; 
  }
   else
  {
  $VALOR8 = 0;  
  }
   if($ProgramadosS > 0 && $PROVEEDOR3 > 0 )
  {
 $VALOR9 = ( $PROVEEDOR3/ $ProgramadosS) * 100; 
  }
   else
  {
  $VALOR9 = 0;  
  }
   if($ProgramadosS> 0 && $IMPORTACION3 > 0 )
  {
 $VALOR10 = ( $IMPORTACION3/ $ProgramadosS) * 100; 
  }
   else
  {
  $VALOR10 = 0;  
  }
  
 $su1 = $COMERCIAL3 + $DAM3 + $CLIENTE3 + $PROVEEDOR3 + $IMPORTACION3; 
 $su2 =  $ADQUISICIONES3 + $DESPACHO3 + $PRODUCCION3 + $INSTALACION3 + $SILLAS3 + $PLANIFICACION3 ;
    if($VALIDADOS > 0 && $su2 > 0 )
  {
 $VALOR5 = ( $su2 / $VALIDADOS) * 100; 
  }
   else
  {
  $VALOR5 = 0;  
  }
  
     if($ProgramadosS > 0 &&  $su1 > 0 )
  {
 $VALOR11 = (  $su1/ $ProgramadosS) * 100; 
  }
   else
  {
  $VALOR11 = 0;  
  }
  
echo "<tr> <th colspan='3' style='background:red;color:#fff;'>Factores De Incumplimiento Interno</th><th style='background:green;color:#fff;' colspan='3'>Factores De Incumplimiento Externo</th> </tr>"; 

echo "<tr><td width='90'>ADQUISICIONES</td><td align='center'>".$ADQUISICIONES3."</td><td align='center'>".number_format($VALOR,2, ",", ".")."%</td>";
echo "<td width='90'>COMERCIAL</td><td align='center'>".$COMERCIAL3."</td><td align='center'>".number_format($VALOR6,2, ",", ".")."%</td></tr>";

echo "<tr><td>DESPACHO</td><td align='center'>".$DESPACHO3."</td><td align='center'>".number_format($VALOR1,2, ",", ".")."%</td>";
echo "<td>DAM</td><td align='center'>".$DAM3."</td><td align='center'>".number_format($VALOR7,2, ",", ".")."%</td></tr>";

echo "<tr><td>PRODUCCION</td><td align='center'>".$PRODUCCION3."</td><td align='center'>".number_format($VALOR2,2, ",", ".")."%</td>";	
echo "<td>CLIENTE</td><td align='center'>".$CLIENTE3."</td><td align='center'>".number_format($VALOR8,2, ",", ".")."%</td></tr>";
	

echo "<tr><td >INSTALACION<td align='center' width='40'>".$INSTALACION3."</td><td width='40' align='center'>".number_format($VALOR3,2, ",", ".")."%</td>";
echo "<td>PROVEEDOR<td align='center'>".$PROVEEDOR3."</td><td width='40' align='center'>".number_format($VALOR9,2, ",", ".")."%</td></tr>";

echo "<tr><td>SILLAS<td align='center' width='70'>".$SILLAS3."</td><td align='center'>".number_format($VALOR4,2, ",", ".")."%</td>";	  
echo "<td rowspan='2' >IMPORTACION</td><td rowspan='2'   align='center' width='70'>".$IMPORTACION3."</td><td rowspan='2'  align='center'>".number_format($VALOR10,2, ",", ".")."%</td></tr>";	

echo "<tr><td>PLANIFICACION<td align='center' width='70'>".$PLANIFICACION3."</td><td align='center'>".number_format($VALOR14,2, ",", ".")."%</td>";	


echo "<tr><td>Total</td><td align = 'center' >".$su2."</td><td align='center'>".number_format($VALOR5,2, ",", ".")."%</td><td>Total</td><td align = 'center'>".$su1."</td><td align='center'>".number_format($VALOR11,2, ",", ".")."%</td></tr>"; 
 ?>
</table>

<table cellspacing="0" cellpadding="0">
<tr >
<td valign="top">
<table rules="all" frame="box"  style="font-size:10px;">
<tr> <th colspan='2' style='background:red;color:#fff;'>Factores De Incumplimiento Interno </th> </tr>	
<tr>
<th width="100"> COD</th>
<th width="100"> Area</th>
</tr>
<?php
$cu2 = 0;
$COMERCIAL=0;
$DAM = 0;
$CLIENTE =0;
$PROVEEDOR=0;
$IMPORTACION=0;

$query_registro1 = "select CODIGO_SERVICIO from SERVICIO where nombre_servicio = '".$nombreser."' and NOT ESTADO = 'NULO'  AND FECHA_ENTREGA  > FECHA_PRIMERA_ENTREGA AND FECHA_PRIMERA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
  
$CODIGO_Actividad = $row["CODIGO_SERVICIO"];


$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.AREA,servicio.CODIGO_PROYECTO
from actualizaciones,actualizaciones_general,servicio where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND 
actualizaciones_general.codigo_servicio = servicio.codigo_servicio AND SERVICIO.codigo_servicio = '".$CODIGO_Actividad."' AND FECHA_PRIMERA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."' GROUP BY actualizaciones.AREA HAVING not area = 'null' ORDER BY FECHA_ENTREGA";
$result2 = mysql_query($QUERY, $conn) or die(mysql_error());

$cu = 1;

 while($row = mysql_fetch_array($result2))
  {  
  $cuenta = $row["cuenta"];
  $AREA = $row["AREA"];
    $CODP = $row["CODIGO_PROYECTO"];
  
  if($cuenta != 0)
  {
	  if($cu == 1)
	  {
		  if($AREA == "ADQUISICIONES" || $AREA == "SILLAS" || $AREA == "PRODUCCION" || $AREA == "DESPACHO" || $AREA == "INSTALACION" || $AREA == "PLANIFICACION" )
		  {
		  
   echo  "<td><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODP).">" . $CODIGO_Actividad . "</a></td>";	
 echo "<td>".$AREA." </td></tr>";
 $cu2++; 
		  }
		  


	  }
  }
  $cu++;
  
  }
 
  }
  echo "<td  colspan='' align='CENTER'>Total</td>"; 
  echo "<td>".$cu2."</td>"; 
 ?>
 
</table>
</td>
<td  valign="top">
<table rules="all" frame="box"  style="font-size:10px;">
<tr> <th style='background:green;color:#fff;' colspan='2'>Factores De Incumplimiento  Externo </th> </tr>
<tr>
<th width="100"> COD</th>
<th width="100"> Area</th>
</tr>
<?php
$cu2 = 0;
$COMERCIAL=0;
$DAM = 0;
$CLIENTE =0;
$PROVEEDOR=0;
$IMPORTACION=0;

$query_registro1 = "select CODIGO_SERVICIO from SERVICIO where nombre_servicio = '".$nombreser."' and NOT ESTADO = 'NULO'  AND FECHA_ENTREGA  > FECHA_PRIMERA_ENTREGA AND FECHA_PRIMERA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  
  
$CODIGO_Actividad = $row["CODIGO_SERVICIO"];


$QUERY="select count(actualizaciones.AREA) as cuenta ,actualizaciones.AREA,servicio.CODIGO_PROYECTO
from actualizaciones,actualizaciones_general,servicio where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES AND 
actualizaciones_general.codigo_servicio = servicio.codigo_servicio AND SERVICIO.codigo_servicio = '".$CODIGO_Actividad."' AND FECHA_PRIMERA_ENTREGA
between '".$txt_desde."' and '".$txt_hasta."' GROUP BY actualizaciones.AREA HAVING not area = 'null' ORDER BY FECHA_ENTREGA";
$result2 = mysql_query($QUERY, $conn) or die(mysql_error());

$cu = 1;

 while($row = mysql_fetch_array($result2))
  {  
  $cuenta = $row["cuenta"];
  $AREA = $row["AREA"];
    $CODP = $row["CODIGO_PROYECTO"];
  
  if($cuenta != 0)
  {
	  if($cu == 1)
	  {
		  if($AREA == "COMERCIAL" || $AREA == "DAM" || $AREA == "IMPORTACION" || $AREA == "CLIENTE" || $AREA == "PROVEEDOR")
		  {
   echo  "<td><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODP).">" . $CODIGO_Actividad . "</a></td>";	
 echo "<td>".$AREA." </td></tr>";
		  }
		  
 if ($AREA == 'COMERCIAL')
 {
	 $COMERCIAL++;
	  $cu2++; 
 }
  else if ($AREA == 'DAM')
 {
	 $DAM++;
	  $cu2++; 
 }	
  else if ($AREA == 'IMPORTACION')
 {
	 $IMPORTACION++;
	  $cu2++; 
 }	
  else if ($AREA == 'CLIENTE')
 {
	 $CLIENTE++;
	  $cu2++; 
 }
  else if ($AREA == 'PROVEEDOR')
 {
	 $PROVEEDOR++;
	  $cu2++; 
 }

	  }
  }
  $cu++;
  
  }
 
  }
  echo "<td  colspan='' align='CENTER'>Total</td>"; 
  echo "<td>".$cu2."</td>"; 
 ?>
 
</table>

</td>
</tr>
</table>


<?php 
/*if($Selecione > 0)
{
	 $Selecione1 = ( $TOTAL/ $cu2 ) * ($Selecione);
}
else
{
	$Selecione1 = 0;
}
if($COMERCIAL > 0)
{
	 $COMERCIAL1 = ( $TOTAL / $cu2 ) *  ($COMERCIAL);
}
else
{
	$COMERCIAL1 = 0;
}
if($DAM > 0)
{
	 $DAM1 = ( $TOTAL / $cu2 )  * ($DAM);
}
else
{
	$DAM1 = 0;
}
if($ADQUISICIONES > 0)
{
	 $ADQUISICIONES1 = ( $TOTAL / $cu2 )  * ($ADQUISICIONES);
}
else
{
	$ADQUISICIONES1 = 0;
}
if($PRODUCCION > 0)
{
	 $PRODUCCION1 = ( $TOTAL / $cu2 )  *  ($PRODUCCION);
}
else
{
	$PRODUCCION1 = 0;
}
if($DESPACHO > 0)
{
	 $DESPACHO1 = ( $TOTAL / $cu2 )  *  ($DESPACHO);
}
else
{
	$DESPACHO1 = 0;
}
if($TRANSPORTE > 0)
{
	 $TRANSPORTE1 = ( $TOTAL / $cu2 )  *  ($TRANSPORTE);
}
else
{
	$TRANSPORTE1 = 0;
}
if($INSTALACION > 0)
{
	 $INSTALACION1 = ( $TOTAL / $cu2 )  * ($INSTALACION);
}
else
{
	$INSTALACION1  = 0;
}
if($CLIENTE > 0)
{
	 $CLIENTE1 = ( $TOTAL / $cu2 )  *  ($CLIENTE);
}
else
{
	$CLIENTE1  = 0;
}
?>

<?php $FINALA = $Selecione1 + $COMERCIAL1 + $DAM1 + $ADQUISICIONES1 + $PRODUCCION1 + $DESPACHO1 + $TRANSPORTE1 + $INSTALACION1 + $CLIENTE1; */ ?>

<br /> 
<!---
<table  rules="all" frame="box"  style="font-size:9px;">
<tr>
<td> Seleccione </td>
<td> <?php // echo number_format($Selecione1,2, ",", ".") ?> %</td>
</tr>
<tr>
<td> COMERCIAL </td>
<td> <?php //echo number_format($COMERCIAL1,2, ",", ".") ?> %</td>
</tr>
<tr>
<td> DAM </td>
<td> <?php //echo number_format($DAM1,2, ",", ".") ?> %</td>
</tr>
<tr>
<td> ADQUISICIONES </td>
<td> <?php //echo number_format($ADQUISICIONES1,2, ",", ".") ?> %</td>
</tr>
<tr>
<td> PRODUCCION </td>
<td> <?php //echo number_format($PRODUCCION1,2, ",", ".") ?> %</td>
</tr>
<tr>
<td>DEPACHO</td>
<td> <?php //echo number_format($DESPACHO1,2, ",", ".") ?> %</td>
</tr>
<tr>
<td>TRANSPORTE</td>
<td> <?php //echo number_format($TRANSPORTE1,2, ",", ".") ?> %</td>
</tr>
<tr>
<td>INSTALACION</td>
<td> <?php //echo number_format($INSTALACION1,2, ",", ".")  ?> %</td>
</tr>
<tr>
<td>CLIENTE</td>
<td> <?php //echo number_format($CLIENTE1,2, ",", ".")  ?> %</td>
</tr>
<tr>
<td>TOTAL</td>
<td> <?php //echo number_format($FINALA,0, ",", ".")  ?> %</td>
</tr>
</table>
--->
<!------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------><!-------------------------------------------------------------------------------------------------------------------><!-------------------------------------------------------------------------------------------------------------------><!------------------------------------------------------------------------------------------------------------------->


</form>
</div><!--close content_item--></div><!--close content-->	 	  
      </div><!--close site_content-->	
    	
  </div><!--close main-->	
</body>
</html>
