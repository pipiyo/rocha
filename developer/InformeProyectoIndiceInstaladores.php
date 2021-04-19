<?php require_once('Conexion/Conexion.php');

ini_set('max_execution_time', 300);
set_time_limit(0); ?>
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
$dias1 = '0';
if (isset($_GET["buscar"])) 
{    
if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
$dias1= $_GET["dias"];
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Informe Indice Cumplimiento V1.1.0</title>
   <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_informes.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
 <!--  <script type="text/javascript" src="ingreso_sin_recargar.js"></script> -->
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src="js/jquery.ui.datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="Style/ingreso_sin_recargar.css">
  <link rel="stylesheet" href="style/estilopopup.css" />
  <script type="text/javascript" src="js/tinybox.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  
  
  <script language = javascript>
  
function dias1()
{
var fecha1= document.getElementById('txt_desde').value;
var dia1= fecha1.substr(8);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_hasta').value;
var dia2= fecha2.substr(8);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));

document.getElementById('dias').value=dias+1; 
}
  
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
  <th id="tit_pro" height="37" colspan="11" align="center" >Informe Instalacion</th>
  </tr>
<tr>
<td width="100"><center>Desde</center></td>
<td width="100"><input onblur="dias();" onclick="dias1();" name="txt_desde" id="txt_desde" type="text" /></td>
<td width="100"><center>Hasta</center></td>
<td width="100"><input onblur="dias();" onchange="dias1();"  name="txt_hasta" id="txt_hasta" type="text" /></td>
<td width="100"> <input  type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>
</tr>
</table>
</center>
<input style=" display:none" onblur="dias1();" name="dias" id="dias" type="text" value = ''/>
</form>
<br />

<table style="font-size:12px" align="center"  cellpadding="0" cellspacing="0"  style="font-size:9px;">
<col width='300'/>
<col width='200'/>
<col width='200'/>
<col width='200'/>
<col width='200'/>
<col width='120'/>
<th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>Lider</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid; border-bottom:#E4E4E7 1px solid;background:;'><center>Q Proyectos</center></th> 
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;background:;'><center>$ Proyectos</center></th> 
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;background:;'><center>Q Instaladores</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;background:'><center>Promedio Instaladores</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;background:;'><center>Puestos Periodo</center></th>
         	 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;background:;border-right:#E4E4E7 1px solid;'><center>Puestos Diarios</center></th>
       <!--  <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;background:; border-right:#E4E4E7 1px solid;'><cente>Puestos Diarios</center></th> ---> <tr>
         
<?php
$CUENTA1=0;
$TOTAL1=0;
$TOT1=0;
$PRO1=0;
$PUESTOS1=0;
$tot_dias1 = 0;
$query_registro = "select count(distinct proyecto.CODIGO_PROYECTO) AS CUENTA ,SUM(servicio.puestos) as PUESTOS,servicio.LIDER,SUM(proyecto.MONTO) AS TOTAL  
from servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.nombre_servicio = 'instalacion' and FECHA_INICIO  between '".$txt_desde."' and '".$txt_hasta."' and not servicio.LIDER = '' GROUP BY servicio.lider  ORDER BY LIDER asc";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1)) //1
 {
	 	$CUENTA = $row["CUENTA"];
	    $LIDER = $row["LIDER"];
		$TOTAL= $row["TOTAL"];
		$PUESTOS = $row["PUESTOS"];
$query_registro1 = "
SELECT LIDER, COUNT(distinct INSTALADOR_1) AS TOT FROM
    (SELECT LIDER,INSTALADOR_1  FROM servicio WHERE NOT INSTALADOR_1 = '' and FECHA_INICIO  between '".$txt_desde."' and '".$txt_hasta."' AND lider = '".$LIDER."'
     UNION ALL
     SELECT LIDER,INSTALADOR_2  FROM servicio WHERE NOT INSTALADOR_2 = '' and FECHA_INICIO  between '".$txt_desde."' and '".$txt_hasta."' AND lider = '".$LIDER."'
     UNION ALL
     SELECT LIDER,INSTALADOR_3  FROM servicio WHERE NOT INSTALADOR_3=  '' and FECHA_INICIO  between '".$txt_desde."' and '".$txt_hasta."' AND lider = '".$LIDER."'
     UNION ALL
     SELECT LIDER,INSTALADOR_4  FROM servicio WHERE NOT INSTALADOR_4 = '' and FECHA_INICIO  between '".$txt_desde."' and '".$txt_hasta."' AND lider = '".$LIDER."') servicio  
     GROUP BY LIDER ORDER BY LIDER asc";
$result11 = mysql_query($query_registro1, $conn) or die(mysql_error());

while($row = mysql_fetch_array($result11)) //2
 {
    $TOT = $row["TOT"];
	
	if ($TOT == 0 || $CUENTA == 0)
	{
		$PRO = 0;
	}
	else
	{
		$PRO = $TOT / $CUENTA ;
	}
	if($PUESTOS == 0 || $dias1 == 0)
    {
  	$tot_dias = 0;
    }
    else
    {
     $tot_dias = $PUESTOS / $dias1;
    }

	echo  "<tr><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($LIDER)."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$CUENTA."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($TOTAL,0, ",", ".")."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$TOT."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($PRO,1, ",", ".")."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".$PUESTOS."</center></td>";
   echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right:#E4E4E7 1px solid;'><center>".number_format($tot_dias,3, ",", ".")."</center></td></tr>";
$CUENTA1+=$CUENTA;
$TOTAL1+=$TOTAL;
$TOT1+=$TOT;
$PRO1+=$PRO;
$PUESTOS1+=$PUESTOS;
$tot_dias1+=$tot_dias;


 }
 }
  mysql_free_result($result1);
  

?>
<tr> 
<td align="center"  style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><b>Total</b></td>
<td align="center" style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><b><?php echo $CUENTA1 ?></b> </td>
<td align="center" style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><b><?php echo number_format($TOTAL1,0, ",", ".") ?></b> </td>
<td align="center" style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><b><?php echo $TOT1 ?></b> </td>
<td align="center" style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><b><?php echo number_format($PRO1,1, ",", ".") ?></b> </td>
<td align="center" style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right:#E4E4E7 1px solid;'><b><?php echo $PUESTOS1 ?></b> </td>  
<td align="center" style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right:#E4E4E7 1px solid;'><b><?php echo number_format($tot_dias1,3, ",", ".") ?></b> </td>
</tr>
</table>

<!------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------><!-------------------------------------------------------------------------------------------------------------------><!-------------------------------------------------------------------------------------------------------------------><!------------------------------------------------------------------------------------------------------------------->

</div><!--close content_item-->
</div><!--close content-->	 	  
</div><!--close site_content-->	    	
</div><!--close main-->	
</body>
</html>
