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
$txt_desde = dameFecha3(date("d-m-Y"),0);
$txt_hasta = dameFecha4(date("d-m-Y"),7);
}
else if(date("w") == 2)
{
$txt_desde = dameFecha3(date("d-m-Y"),1);
$txt_hasta = dameFecha4(date("d-m-Y"),6);
}
else if(date("w") == 3)
{
$txt_desde = dameFecha3(date("d-m-Y"),2);
$txt_hasta = dameFecha4(date("d-m-Y"),5);
}
else if(date("w") == 4)
{
$txt_desde = dameFecha3(date("d-m-Y"),3);
$txt_hasta = dameFecha4(date("d-m-Y"),4);
}
else if(date("w") == 5)
{
$txt_desde = dameFecha3(date("d-m-Y"),4);
$txt_hasta = dameFecha4(date("d-m-Y"),3);
}
else if(date("w") == 6)
{
$txt_desde = dameFecha3(date("d-m-Y"),5);
$txt_hasta = dameFecha4(date("d-m-Y"),2);
}
else if(date("w") == 0)
{
$txt_desde = dameFecha3(date("d-m-Y"),6);
$txt_hasta = dameFecha4(date("d-m-Y"),1);
}



if (isset($_POST["boton"])) 
{    

if($_POST["txt_desde"] != "" and $_POST["txt_hasta"] != "" )  
{
$txt_desde = $_POST["txt_desde"];
$txt_hasta = $_POST["txt_hasta"];
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title> Compromiso Produccion V1.0.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

   <link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
    <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" /
  <script type="text/javascript" src="js/jquery.min.js"></script>
  

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="jquery.bpopup-x.x.x.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
    <link rel="stylesheet" href="style/estilopopup.css" />
  <script type="text/javascript" src="js/tinybox.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  
  
  <script language = javascript>
    $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });  
  </script>

</head>

<body id='BodyInformeUnidadesProduccion'>
<center>
<div id='DivInformeUnidadesProduccion'>
<form method="post" action="">
<h1> Compromiso Producción  &nbsp; &nbsp;  &nbsp;  <?php echo $txt_desde ."&nbsp; &nbsp;  -&nbsp;   &nbsp; ".$txt_hasta ?></h1>
<table>
<tr>
<td> Desde </td>
<td><input type="text" id="txt_desde" value="" name="txt_desde" /> </td>
<td> Hasta </td>
<td><input type="text" id="txt_hasta" value="" name="txt_hasta" /> </td>
<td><input type="submit" id="boton" value="Aceptar" name="boton" /> </td>
</tr>
<tr>
<td><a href="ExcelInformeCompromisoProduccion.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>" target="_blank"><img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></a> </td>
</tr>
</table>
</form>
<br />
</div>




<table border="0" cellspacing="0" cellpadding="0">
<tr>

<?php 
mysql_select_db($database_conn, $conn);

$CONTADOR = 0; 

$ML3=0;
$ME3=0;
$CAJO3=0;
$SC3=0;
$SR3=0;
$OR3=0;
$BL3=0;
$BT3=0;

$ML4=0;
$ME4=0;
$CAJO4=0;
$SC4=0;
$SR4=0;
$OR4=0;
$BL4=0;
$BT4=0;
$cantidadQ3=0;
$cantidadT4=0;
$sql666 = "SELECT distinct   WEEK(orden_de_compra.FECHA_CONFIRMACION) as SEMANA
FROM orden_de_compra, proyecto, oc_producto , producto,oc_proveedor
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC

AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
AND producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CANTIDAD_RECIBIDA < oc_producto.CANTIDAD  AND 
orden_de_compra.FECHA_CONFIRMACION  between '".$txt_desde."' and '".$txt_hasta."'   and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' order by orden_de_compra.FECHA_CONFIRMACION asc";




$result666 = mysql_query($sql666, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result666))
  {
$cantidadQ=0;
$cantidadT=0;	  
	  
$ML=0;
$ME=0;
$CAJO=0;
$SC=0;
$SR=0;
$OR=0;
$BL=0;
$BT=0;

$ML2=0;
$ME2=0;
$CAJO2=0;
$SC2=0;
$SR2=0;
$OR2=0;
$BL2=0;
$BT2=0;


	  $SEMANA = $row["SEMANA"];
	  
	$sql123 = "SELECT  distinct orden_de_compra.FECHA_CONFIRMACION, proyecto.NOMBRE_CLIENTE,oc_producto.ROCHA , orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO,
oc_producto.cantidad, oc_producto.diferencia,producto.CATEGORIA,oc_producto.OBSERVACION,oc_producto.total, WEEK(orden_de_compra.FECHA_CONFIRMACION) as SEMANA
FROM orden_de_compra, proyecto, oc_producto , producto,oc_proveedor

WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC

AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
AND producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CANTIDAD_RECIBIDA < oc_producto.CANTIDAD  AND 
WEEK(orden_de_compra.FECHA_CONFIRMACION) = '".$SEMANA."'  and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' order by orden_de_compra.FECHA_CONFIRMACION asc";  
	$result123 = mysql_query($sql123, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result123))
  {
  
	  
	  
	$CATEGORIA = $row["CATEGORIA"];
	
		if($CATEGORIA == 'Mueble De Linea')
	{
		if($row['diferencia'] == 0)
		{
		$ML+=$row['cantidad'];
		$ML3+=$row['cantidad'];
		}
		else
		{
		$ML+=$row['diferencia'];
		$ML3+=$row['diferencia'];	
		}
		$ML2+=$row['total'];
		$ML4+=$row['total'];
	}
	else if($CATEGORIA == 'Muebles Especiales')
	{
		if($row['diferencia'] == 0)
		{
		$ME+=$row['cantidad'];
		$ME3+=$row['cantidad'];
		}
		else
		{
		$ME+=$row['diferencia'];
		$ME3+=$row['diferencia'];	
		}
		$ME2+=$row['total'];
		$ME4+=$row['total'];
	}
	else if($CATEGORIA == 'Cajoneras')
	{
		if($row['diferencia'] == 0)
		{
		$CAJO+=$row['cantidad'];
		$CAJO3+=$row['cantidad'];
		}
		else
		{
		$CAJO+=$row['diferencia'];
		$CAJO3+=$row['diferencia'];	
		}
		$CAJO2+=$row['total'];
		$CAJO4+=$row['total'];
	}
	else if($CATEGORIA == 'Superficies Curvas')
	{
		if($row['diferencia'] == 0)
		{
		$SC+=$row['cantidad'];
		$SC3+=$row['cantidad'];
		}
		else
		{
		$SC+=$row['diferencia'];
		$SC3+=$row['diferencia'];	
		}
	
		$SC2+=$row['total'];
		$SC4+=$row['total'];
	}
    else if($CATEGORIA == 'Superficies Rectas')
	{
		if($row['diferencia'] == 0)
		{
		$SR+=$row['cantidad'];
		$SR3+=$row['cantidad'];
		}
		else
		{
		$SR+=$row['diferencia'];	
		$SR3+=$row['diferencia'];
		}
		$SR2+=$row['total'];
		$SR4+=$row['total'];
		
	}
	  else if($CATEGORIA == 'Baldosas Laminadas')
	{

		if($row['diferencia'] == 0)
		{
		$BL+=$row['cantidad'];
		$BL3+=$row['cantidad'];
		}
		else
		{
		$BL+=$row['diferencia'];
		$BL3+=$row['diferencia'];	
		}
		$BL2+=$row['cantidad'];
		$BL4+=$row['cantidad'];
	}
    else if($CATEGORIA == 'Baldosas Tapizadas')
	{
		
		if($row['diferencia'] == 0)
		{
		$BT+=$row['cantidad'];
		$BT3+=$row['cantidad'];
		}
		else
		{
		$BT+=$row['diferencia'];
		$BT3+=$row['diferencia'];	
		}
		$BT2+=$row['cantidad'];
		$BT4+=$row['cantidad'];
	}
	else
	{

		if($row['diferencia'] == 0)
		{
		$OR+=$row['cantidad'];
		$OR3+=$row['cantidad'];
		}
		else
		{
		$OR+=$row['diferencia'];
		$OR3+=$row['diferencia'];	
		}
		$OR2+=$row['total'];
		$OR4+=$row['total'];
	}
	
	
  }

if($CONTADOR == 0)
{
$cantidadQ= $ML + $ME +$CAJO + $SC + $SR + $OR + $BL + $BT;
$cantidadT= $ML2 + $ME2 +$CAJO2 + $SC2 + $SR2 + $OR2 + $BL2 + $BT2;	

echo '
<td>
<table id ="tabla_unidades_produccion" rules="all" frame="box">
<tr>
<th  width="300"  align="center">COD</th>
<th width="300" align="center">Semana</th>
<th width="300" align="center">'.$SEMANA.'</th>
</tr>';

    echo "<tr><td rowspan='2'><center>Mueble de Linea</center></td>";	
	echo "<td><center>Cantidad</center></td>";
	echo "<td> <center>".$ML."</center></td></tr>";
	echo "<tr><td><center>Total</center></td>";
	echo "<td> <center>". number_format($ML2,0, ",", ".")."</center></td></tr>";
	
    echo "<tr><td rowspan='2'><center>Muebles Especiales</center></td>";	
	echo "<td><center>Cantidad</center></td>";
	echo "<td> <center>".$ME."</center></td></tr>";
	echo "<tr><td><center>Total</center></td>";
	echo "<td> <center>". number_format($ME2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr><td rowspan='2'><center>Cajoneras</center></td>";	
	echo "<td><center>Cantidad</center></td>";
	echo "<td> <center>".$CAJO."</center></td></tr>";
	echo "<tr><td><center>Total</center></td>";
	echo "<td> <center>". number_format($CAJO2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr><td rowspan='2'><center>Superficies Rectas</center></td>";	
	echo "<td><center>Cantidad</center></td>";
	echo "<td> <center>".$SR."</center></td></tr>";
	echo "<tr><td><center>Total</center></td>";
	echo "<td> <center>". number_format($SR2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr><td rowspan='2'><center>Superficies Curvas</center></td>";	
	echo "<td><center>Cantidad</center></td>";
	echo "<td> <center>".$SC."</center></td></tr>";
	echo "<tr><td><center>Total</center></td>";
	echo "<td> <center>". number_format($SC2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr><td rowspan='2'><center>Baldosas Laminadas</center></td>";	
	echo "<td><center>Cantidad</center></td>";
	echo "<td> <center>".$BL."</center></td></tr>";
	echo "<tr><td><center>Total</center></td>";
	echo "<td> <center>". number_format($BL2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr><td rowspan='2'><center>Baldosas Tapizadas</center></td>";	
	echo "<td><center>Cantidad</center></td>";
	echo "<td> <center>".$BT."</center></td></tr>";
	echo "<tr><td><center>Total</center></td>";
	echo "<td> <center>". number_format($BT2,0, ",", ".")."</center></td></tr>";
	
	
	echo "<tr><td rowspan='2'><center>Otros</center></td>";	
	echo "<td><center>Cantidad</center></td>";
	echo "<td> <center>".$OR."</center></td></tr>";
	echo "<tr><td><center>Total</center></td>";
	echo "<td> <center>". number_format($OR2,0, ",", ".")."</center></td></tr>";
	
	
	echo "<tr><th colspan='2'><center>Total Cant</center></th>";	
	echo "<td><center><b>".$cantidadQ."</b></center></td></tr>";
	echo "<tr><th colspan='2'><center>Total Prec</center></th>";	
	echo "<td><center><b>".$cantidadT."</b></center></td></tr></table></td> ";

}
else
{
$cantidadQ= $ML + $ME +$CAJO + $SC + $SR + $OR + $BL + $BT;
$cantidadT= $ML2 + $ME2 +$CAJO2 + $SC2 + $SR2 + $OR2 + $BL2 + $BT2;		
echo '
<td>
<table id ="tabla_unidades_produccion" rules="all" frame="box">
<tr>
<th width="300" align="center">'.$SEMANA.'</th>
</tr>';

    echo "<tr>";	
	echo "<td> <center>".$ML."</center></td></tr>";
	echo "<tr>";
	echo "<td> <center>". number_format($ML2,0, ",", ".")."</center></td></tr>";
	
    echo "<tr>";	
	echo "<td> <center>".$ME."</center></td></tr>";
	echo "<tr>";
	echo "<td> <center>". number_format($ME2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr>";	
	echo "<td> <center>".$CAJO."</center></td></tr>";
	echo "<tr>";
	echo "<td> <center>". number_format($CAJO2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr>";	
	echo "<td> <center>".$SR."</center></td></tr>";
	echo "<tr>";
	echo "<td> <center>". number_format($SR2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr>";	
	echo "<td> <center>".$SC."</center></td></tr>";
	echo "<tr>";
	echo "<td> <center>". number_format($SC2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr>";	
	echo "<td> <center>".$BL."</center></td></tr>";
	echo "<tr>";
	echo "<td> <center>". number_format($BL2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr>";	
	echo "<td> <center>".$BT."</center></td></tr>";
	echo "<tr>";
	echo "<td> <center>". number_format($BT2,0, ",", ".")."</center></td></tr>";
	
	
	echo "<tr>";	
	echo "<td> <center>".$OR."</center></td></tr>";
	echo "<tr>";
	echo "<td> <center>". number_format($OR2,0, ",", ".")."</center></td></tr>";	
	
	
	echo "<tr><td><center><b>".$cantidadQ."</b></center></td></tr>";	
	echo "<tr><td><center><b>".$cantidadT."</b></center></td></tr></table> </td> ";
}
$CONTADOR++;
}


$cantidadQ3= $ML3 + $ME3 +$CAJO3 + $SC3 + $SR3 + $OR3 + $BL3 + $BT3;
$cantidadT4= $ML4 + $ME4 +$CAJO4 + $SC4 + $SR4 + $OR4 + $BL4 + $BT4;	


    echo "<td>";
	 
	echo '<table id ="tabla_unidades_produccion" rules="all" frame="box"> ';
	echo '<th> Total </th>';
	echo '<tr> <td> '.$ML3.' </td></tr>';
	echo '<tr> <td> '.number_format($ML4,0, ",", ".").' </td></tr>';
	echo '<tr> <td> '.$ME3.' </td></tr>';
	echo '<tr> <td> '.number_format($ME4,0, ",", ".").' </td></tr>';
	echo '<tr> <td> '.$CAJO3.' </td></tr>';
	echo '<tr> <td> '.number_format($CAJO4,0, ",", ".").' </td></tr>';
	echo '<tr> <td> '.$SC3.' </td></tr>';
	echo '<tr> <td> '.number_format($SC4,0, ",", ".").' </td></tr>';
	echo '<tr> <td> '.$SR3.' </td></tr>';
	echo '<tr> <td> '.number_format($SR4,0, ",", ".").' </td></tr>';
	echo '<tr> <td> '.$BL3.' </td></tr>';
	echo '<tr> <td> '.number_format($BL4,0, ",", ".").' </td></tr>';
	echo '<tr> <td> '.$BT3.' </td></tr>';
    echo '<tr> <td> '.number_format($BT4,0, ",", ".").' </td></tr>';
	echo '<tr> <td> '.$OR3.' </td></tr>';
	echo '<tr> <td> '.number_format($OR4,0, ",", ".").' </td></tr> ';
	echo '<tr> <td> <b>'.$cantidadQ3.' </b></td></tr>';
	echo '<tr> <td><b> '.number_format($cantidadT4,0, ",", ".").'</b> </td></tr> ';
	echo "</table></td>"
	/* 
	echo "<tr><th><center>Total</center></th>";	
	echo "<th> <center>".$cantidadQ."</center></th>";
	echo "<th> <center>". number_format($cantidadQ2,0, ",", ".")."</center></th></tr>";
	*/
	
?>
</tr></table>


</center>
</body>

</html>
