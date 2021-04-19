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
if (isset($_GET["buscar"]) || isset($_GET["buscar1"])) 
{ 

$fech = $_GET["ann"];
$aanno= "01/01/".$fech;
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
  <title> Informe Cumplimiento </title>
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
<form action="" method="get">
<center>
<table  id = "formulario">
<tr>
  <th id="tit_pro" height="37" colspan="11" align="center" >Indice de cumplimiento por entregas</th>
  </tr>
<tr>
<td width="100"><center>Desde</center></td>
<td width="100"><input name="txt_desde" id="txt_desde" type="text" /></td>
<td width="100"><center>Hasta</center></td>
<td width="100"><input name="txt_hasta" id="txt_hasta" type="text" /></td>
<td width="100"> <input type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>
</tr>
</table>
</center>

<br />
<center>
<table width="100%"  cellpadding="0" cellspacing="0"  style="font-size:9px;">

<th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Proyecto Comprometidos</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><center>Proyectos Cumplidos</center></th> 
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid; background:#C9F;'><center>% Cumplidos</center></th> 
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>Proyecto Incumplidos</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>% Incumplidos</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CC9;'><center>Proyectos Adelantados</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CC9; border-right:#E4E4E7 1px solid;'><cente>% Adelantados</center></th> <tr>  
<?php
mysql_select_db($database_conn, $conn);
$numero = 0;




$query_registro = "select count(CODIGO_PROYECTO) AS COMPROMETIDOS from PROYECTO where ESTADO = 'OK' AND FECHA_CONFIRMACION between '".$txt_desde."' and '".$txt_hasta."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {  
    $COMPROMETIDOS = $row["COMPROMETIDOS"];
  }
  



$CUMPLIDOS = 0;
$ADELANTADO = 0;
$ATRASADO = 0;  
$query_registro2 = "select * from PROYECTO where ESTADO = 'OK' AND  FECHA_CONFIRMACION between '".$txt_desde."' and '".$txt_hasta."'";
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result2))
  {  
    $cuenta = 0;
    $FECHA_INGRESO = $row["FECHA_INGRESO"];
	$FECHA_ENTREGA = $row["FECHA_CONFIRMACION"];
	$DEPARTAMENTO_CREDITO = $row["DEPARTAMENTO_CREDITO"];
	$PUESTOS = $row["PUESTOS"];
	$CONVENIR = $row["CONVENIR"];
	$TIEMPO_ESPECIAL = $row["TIEMPO_ESPECIAL"];
	
	$ANOI = substr($FECHA_INGRESO,0,4);
	$MESI = substr($FECHA_INGRESO,5,2);
	$DIAI = substr($FECHA_INGRESO,8,2);
	
	$ANOE = substr($FECHA_ENTREGA ,0,4);
	$MESE = substr($FECHA_ENTREGA ,5,2);
	$DIAE = substr($FECHA_ENTREGA ,8,2);
	
$timestamp2 = mktime(0,0,0,$MESI,$DIAI,$ANOI); 
$timestamp1 = mktime(0,0,0,$MESE,$DIAE,$ANOE);

$segundos_diferencia = $timestamp1 - $timestamp2; 
$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 

$arrDias = array('Domingo','Lunes','Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');  
$fecha = mktime(0, 0, 0, 01  , 20, 2014); //0,0,0,mes,dia,año  


if($arrDias[date('w',$fecha)] == 'Lunes')
{
	$contado1 = 1;
}
else if($arrDias[date('w',$fecha)] == 'Martes')
{
	$contado1 = 2;
}
else if($arrDias[date('w',$fecha)] == 'Miercoles')
{
	$contado1 = 3;
}	
else if($arrDias[date('w',$fecha)] == 'Jueves')
{
	$contado1 = 4;
}	
else if($arrDias[date('w',$fecha)] == 'Viernes')
{
	$contado1 = 5;
}
else if($arrDias[date('w',$fecha)] == 'Sabado')
{
	$contado1 = 6;
}
else if($arrDias[date('w',$fecha)] == 'Domingo')
{
	$contado1 = 7;
}


if($TIEMPO_ESPECIAL != "")
{
	$cuenta = $TIEMPO_ESPECIAL;
}
else if($DEPARTAMENTO_CREDITO == 'BOZZ' || $DEPARTAMENTO_CREDITO == 'DALI'  || $DEPARTAMENTO_CREDITO == 'FLOW'  || $DEPARTAMENTO_CREDITO == 'TESSELA'  || $DEPARTAMENTO_CREDITO == 'STAFF'  || $DEPARTAMENTO_CREDITO == 'ESTADO'  && $PUESTOS < 21)
{
	$cuenta = 18;
}
else if($DEPARTAMENTO_CREDITO == 'BOZZ' || $DEPARTAMENTO_CREDITO == 'DALI'  || $DEPARTAMENTO_CREDITO == 'FLOW'  || $DEPARTAMENTO_CREDITO == 'TESSELA'  || $DEPARTAMENTO_CREDITO == 'STAFF'  || $DEPARTAMENTO_CREDITO == 'ESTADO' && $PUESTOS > 20 || $PUESTOS < 51 )
{
	$cuenta = 21;
}
else if($DEPARTAMENTO_CREDITO == 'BOZZ' || $DEPARTAMENTO_CREDITO == 'DALI'  || $DEPARTAMENTO_CREDITO == 'FLOW'  || $DEPARTAMENTO_CREDITO == 'TESSELA'  || $DEPARTAMENTO_CREDITO == 'STAFF'  || $DEPARTAMENTO_CREDITO == 'ESTADO' &&  $PUESTOS > 50 )
{
	$cuenta = $CONVENIR;
}

else if($DEPARTAMENTO_CREDITO == 'MADERA')
{
	$cuenta = 25;
}
else if($DEPARTAMENTO_CREDITO == 'PROTOTIPOS' || $DEPARTAMENTO_CREDITO == 'FULL SPACE'  || $DEPARTAMENTO_CREDITO == 'COSTEMAL'  || $DEPARTAMENTO_CREDITO == 'LOCKERS'  &&  $PUESTOS > 50 )
{
	$cuenta = $CONVENIR;
}

else if($DEPARTAMENTO_CREDITO == 'MANTENIMIENTO OFICINAS' || $DEPARTAMENTO_CREDITO == 'FLETES Y VIATICO'  || $DEPARTAMENTO_CREDITO == 'DESMONTE Y REUBICACION'  || $DEPARTAMENTO_CREDITO == 'MANO OBRA'|| $DEPARTAMENTO_CREDITO == 'MANTENIMIENTO SILLAS'|| $DEPARTAMENTO_CREDITO == 'REPARACION SILLAS'  )
{
	$cuenta = 5;
}
else if($DEPARTAMENTO_CREDITO == 'BUTACAS IMPORTADA' || $DEPARTAMENTO_CREDITO == 'MANUFACTURAS MUÑOZ'  || $DEPARTAMENTO_CREDITO == 'ACTIU - SILLAS'  || $DEPARTAMENTO_CREDITO == 'NOWY STYL'|| $DEPARTAMENTO_CREDITO == 'DAUPHIN'|| $DEPARTAMENTO_CREDITO == 'CONTATTO'  || $DEPARTAMENTO_CREDITO == 'BASFLEX'  || $DEPARTAMENTO_CREDITO == 'LOVATO'  || $DEPARTAMENTO_CREDITO == 'FLEXFORM'|| $DEPARTAMENTO_CREDITO == 'GRAMMER'|| $DEPARTAMENTO_CREDITO == 'SILLAS SCANFORM' || $DEPARTAMENTO_CREDITO == 'SILLAS VARIAS'|| $DEPARTAMENTO_CREDITO == 'VC INDUSTRIAL' || $DEPARTAMENTO_CREDITO == 'INDUMAC' )
{
	$cuenta =  $CONVENIR;
}
else if($DEPARTAMENTO_CREDITO == 'ANDERSEN' || $DEPARTAMENTO_CREDITO == 'BIBLIOTECA MURO'  || $DEPARTAMENTO_CREDITO == 'CAMPUS'  || $DEPARTAMENTO_CREDITO == 'FALCON'|| $DEPARTAMENTO_CREDITO == 'KADENA'|| $DEPARTAMENTO_CREDITO == 'ACTIU - MUEBLES'  || $DEPARTAMENTO_CREDITO == 'MULTIPLE')
{
	$cuenta = 18;
}
else if($DEPARTAMENTO_CREDITO == 'ESTADO' && $PUESTOS > 20 || $PUESTOS < 51 )
{
	$cuenta = 18;
}

$primario = 1;
$dias_total = 0;
while($primario  < $dias_diferencia)
{
	if($contado1 == 6)
	{
		$contado1++;		
	}
	else if($contado1 == 7)
	{
		$contado1=1;	
	}
	else
	{
		$contado1++;
		$dias_total++;
		
	}
	$primario++;	
}

if($dias_total == $cuenta)
{
	$CUMPLIDOS++;
}
else if($dias_total < $cuenta)
{
	$ATRASADO++;
	
}
else if($dias_total > $cuenta)
{
	$ADELANTADO++;
}

  } 


 if($COMPROMETIDOS > 0 && $ADELANTADO > 0 )
  {
  $TOTAL2 = ( $ADELANTADO / $COMPROMETIDOS ) * 100;
  }
  else
  {
	$TOTAL2 = 0;  
  }
  if($COMPROMETIDOS > 0 && $CUMPLIDOS > 0 )
  {
  $TOTAL1 = ( $CUMPLIDOS / $COMPROMETIDOS  ) * 100; 
  }
   else
  {
	$TOTAL1 = 0;  
  }
   if($COMPROMETIDOS > 0 && $ATRASADO > 0 )
  {
 $TOTAL = ( $ATRASADO / $COMPROMETIDOS  ) * 100; 
  }
   else
  {
	$TOTAL = 0;  
  }

	
 echo  "<tr><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$COMPROMETIDOS."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$CUMPLIDOS."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($TOTAL1,0, ",", ".") ."%</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$ATRASADO."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($TOTAL,0, ",", ".")."%</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$ADELANTADO."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right:#E4E4E7 1px solid;'><center>".number_format($TOTAL2,0, ",", ".")."%</center></td></tr>";
	$numero++;
  mysql_free_result($result);


?>
</table>
<br />
<table>
<tr>
<td>
<select name="ann">
<option <?php echo $selected1?>> 2014 </option>
<option <?php echo $selected2?>> 2013 </option>
</select></td>
<td><input type="submit" name="buscar1" value="Aceptar" /> </td>
</tr>
</table>
<!------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------><!-------------------------------------------------------------------------------------------------------------------><!-------------------------------------------------------------------------------------------------------------------><!------------------------------------------------------------------------------------------------------------------->
<br />
<br />
<table width="100%" id = "" cellpadding="0" cellspacing="0"  style="font-size:9px;">

<th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Mes</center></th>
<th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Proyecto Comprometidos</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><cente>Proyectos Cumplidos</center></th> 
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><cente>% Cumplidos</center></th> 
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>Proyecto Incumplidos</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>% Incumplidos</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CC9;'><center>Proyectos Adelantados</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right:#E4E4E7 1px solid;background:#CC9;'><cente>% Adelantados</center></th> <tr>
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

 $buscar = substr(dameFecha($aanno,$contador),0,7);

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

$query_registro = "select count(CODIGO_PROYECTO) AS COMPROMETIDOS from PROYECTO where ESTADO = 'OK' AND FECHA_CONFIRMACION LIKE '%".$buscar."%'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {  
    $COMPROMETIDOS = $row["COMPROMETIDOS"];
  }
 

  /////
$TOTAL1 = 0; 
$TOTAL = 0; 
$TOTAL2 = 0;
$CUMPLIDOS1 = 0;
$ADELANTADO1 = 0;
$ATRASADO1 = 0; 


$query_registro1 = "select * from PROYECTO where ESTADO = 'OK' AND  FECHA_CONFIRMACION LIKE '%".$buscar."%'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {  

     $cuenta = 0;
    $FECHA_INGRESO = $row["FECHA_INGRESO"];
	$FECHA_ENTREGA = $row["FECHA_CONFIRMACION"];
	$DEPARTAMENTO_CREDITO = $row["DEPARTAMENTO_CREDITO"];
	$PUESTOS = $row["PUESTOS"];
	$CONVENIR = $row["CONVENIR"];
	$TIEMPO_ESPECIAL = $row["TIEMPO_ESPECIAL"];
	
	$ANOI = substr($FECHA_INGRESO,0,4);
	$MESI = substr($FECHA_INGRESO,5,2);
	$DIAI = substr($FECHA_INGRESO,8,2);
	
	$ANOE = substr($FECHA_ENTREGA ,0,4);
	$MESE = substr($FECHA_ENTREGA ,5,2);
	$DIAE = substr($FECHA_ENTREGA ,8,2);

$timestamp2 = mktime(0,0,0,$MESI,$DIAI,$ANOI); 
$timestamp1 = mktime(0,0,0,$MESE,$DIAE,$ANOE);

$segundos_diferencia = $timestamp1 - $timestamp2; 
$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 

$arrDias = array('Domingo','Lunes','Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');  
$fecha = mktime(0, 0, 0, 01  , 20, 2014); //0,0,0,mes,dia,año  


if($arrDias[date('w',$fecha)] == 'Lunes')
{
	$contado1 = 1;
}
else if($arrDias[date('w',$fecha)] == 'Martes')
{
	$contado1 = 2;
}
else if($arrDias[date('w',$fecha)] == 'Miercoles')
{
	$contado1 = 3;
}	
else if($arrDias[date('w',$fecha)] == 'Jueves')
{
	$contado1 = 4;
}	
else if($arrDias[date('w',$fecha)] == 'Viernes')
{
	$contado1 = 5;
}
else if($arrDias[date('w',$fecha)] == 'Sabado')
{
	$contado1 = 6;
}
else if($arrDias[date('w',$fecha)] == 'Domingo')
{
	$contado1 = 7;
}


if($TIEMPO_ESPECIAL != "")
{
	$cuenta = $TIEMPO_ESPECIAL;
}
else if($DEPARTAMENTO_CREDITO == 'BOZZ' || $DEPARTAMENTO_CREDITO == 'DALI'  || $DEPARTAMENTO_CREDITO == 'FLOW'  || $DEPARTAMENTO_CREDITO == 'TESSELA'  || $DEPARTAMENTO_CREDITO == 'STAFF'  || $DEPARTAMENTO_CREDITO == 'ESTADO'  && $PUESTOS < 21)
{
	$cuenta = 18;
}
else if($DEPARTAMENTO_CREDITO == 'BOZZ' || $DEPARTAMENTO_CREDITO == 'DALI'  || $DEPARTAMENTO_CREDITO == 'FLOW'  || $DEPARTAMENTO_CREDITO == 'TESSELA'  || $DEPARTAMENTO_CREDITO == 'STAFF'  || $DEPARTAMENTO_CREDITO == 'ESTADO' && $PUESTOS > 20 || $PUESTOS < 51 )
{
	$cuenta = 21;
}
else if($DEPARTAMENTO_CREDITO == 'BOZZ' || $DEPARTAMENTO_CREDITO == 'DALI'  || $DEPARTAMENTO_CREDITO == 'FLOW'  || $DEPARTAMENTO_CREDITO == 'TESSELA'  || $DEPARTAMENTO_CREDITO == 'STAFF'  || $DEPARTAMENTO_CREDITO == 'ESTADO' &&  $PUESTOS > 50 )
{
	$cuenta = $CONVENIR;
}

else if($DEPARTAMENTO_CREDITO == 'MADERA')
{
	$cuenta = 25;
}
else if($DEPARTAMENTO_CREDITO == 'PROTOTIPOS' || $DEPARTAMENTO_CREDITO == 'FULL SPACE'  || $DEPARTAMENTO_CREDITO == 'COSTEMAL'  || $DEPARTAMENTO_CREDITO == 'LOCKERS'  &&  $PUESTOS > 50 )
{
	$cuenta = $CONVENIR;
}

else if($DEPARTAMENTO_CREDITO == 'MANTENIMIENTO OFICINAS' || $DEPARTAMENTO_CREDITO == 'FLETES Y VIATICO'  || $DEPARTAMENTO_CREDITO == 'DESMONTE Y REUBICACION'  || $DEPARTAMENTO_CREDITO == 'MANO OBRA'|| $DEPARTAMENTO_CREDITO == 'MANTENIMIENTO SILLAS'|| $DEPARTAMENTO_CREDITO == 'REPARACION SILLAS'  )
{
	$cuenta = 5;
}
else if($DEPARTAMENTO_CREDITO == 'BUTACAS IMPORTADA' || $DEPARTAMENTO_CREDITO == 'MANUFACTURAS MUÑOZ'  || $DEPARTAMENTO_CREDITO == 'ACTIU - SILLAS'  || $DEPARTAMENTO_CREDITO == 'NOWY STYL'|| $DEPARTAMENTO_CREDITO == 'DAUPHIN'|| $DEPARTAMENTO_CREDITO == 'CONTATTO'  || $DEPARTAMENTO_CREDITO == 'BASFLEX'  || $DEPARTAMENTO_CREDITO == 'LOVATO'  || $DEPARTAMENTO_CREDITO == 'FLEXFORM'|| $DEPARTAMENTO_CREDITO == 'GRAMMER'|| $DEPARTAMENTO_CREDITO == 'SILLAS SCANFORM' || $DEPARTAMENTO_CREDITO == 'SILLAS VARIAS'|| $DEPARTAMENTO_CREDITO == 'VC INDUSTRIAL' || $DEPARTAMENTO_CREDITO == 'INDUMAC' )
{
	$cuenta =  $CONVENIR;
}
else if($DEPARTAMENTO_CREDITO == 'ANDERSEN' || $DEPARTAMENTO_CREDITO == 'BIBLIOTECA MURO'  || $DEPARTAMENTO_CREDITO == 'CAMPUS'  || $DEPARTAMENTO_CREDITO == 'FALCON'|| $DEPARTAMENTO_CREDITO == 'KADENA'|| $DEPARTAMENTO_CREDITO == 'ACTIU - MUEBLES'  || $DEPARTAMENTO_CREDITO == 'MULTIPLE')
{
	$cuenta = 18;
}
else if($DEPARTAMENTO_CREDITO == 'ESTADO' && $PUESTOS > 20 || $PUESTOS < 51 )
{
	$cuenta = 18;
}

$primario = 1;
$dias_total = 0;
while($primario  < $dias_diferencia)
{
	if($contado1 == 6)
	{
		$contado1++;		
	}
	else if($contado1 == 7)
	{
		$contado1=1;	
	}
	else
	{
		$contado1++;
		$dias_total++;
	}
	$primario++;	
}
if($dias_total == $cuenta)
{
	$CUMPLIDOS1++;
}
else if($dias_total < $cuenta)
{
	$ATRASADO1++;
	
}
else if($dias_total > $cuenta)
{
	$ADELANTADO1++;
}









 if($COMPROMETIDOS > 0 && $ADELANTADO > 0 )
  {
  $TOTAL2 = ( $ADELANTADO1 / $COMPROMETIDOS ) * 100;
  }
  else
  {
	$TOTAL2 = 0;  
  }
  if($COMPROMETIDOS > 0 && $CUMPLIDOS > 0 )
  {
  $TOTAL1 = ( $CUMPLIDOS1 / $COMPROMETIDOS  ) * 100; 
  }
   else
  {
	$TOTAL1 = 0;  
  }
   if($COMPROMETIDOS > 0 && $ATRASADO > 0 )
  {
 $TOTAL = ( $ATRASADO1 / $COMPROMETIDOS  ) * 100; 
  }
   else
  {
	$TOTAL = 0;  
  }


  }
    echo  "<tr><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$mes."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$COMPROMETIDOS."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><center>".$CUMPLIDOS1."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#C9F;'><center>".number_format($TOTAL1,0, ",", ".") ."%</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>".$ATRASADO1."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#F99;'><center>".number_format($TOTAL,0, ",", ".")."%</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CC9;'><center>".$ADELANTADO1."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right:#E4E4E7 1px solid;background:#CC9;'><center>".number_format($TOTAL2,0, ",", ".")."%</center></td></tr>";
	$numero++;
	  $contador++; 
 }
  mysql_free_result($result);
  mysql_close($conn);


?>
</table>
</form>
</div><!--close content_item--></div><!--close content-->	 	  
      </div><!--close site_content-->	
    	
  </div><!--close main-->	
</body>
</html>
