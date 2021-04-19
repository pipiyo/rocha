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
  <title> Entrega Produccion V1.0.0</title>
   <link rel="shortcut icon" href="Imagenes/rocha.png">
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
<h1> Entrega Producción  &nbsp; &nbsp;  &nbsp;  <?php echo $txt_desde ."&nbsp; &nbsp;  -&nbsp;   &nbsp; ".$txt_hasta ?></h1>
<table>
<tr>
<td> Desde </td>
<td><input type="text" id="txt_desde" value="" name="txt_desde" /> </td>
<td> Hasta </td>
<td><input type="text" id="txt_hasta" value="" name="txt_hasta" /> </td>
<td><input type="submit" id="boton" value="Aceptar" name="boton" /> </td>
</tr>
<tr>
<td><a href="ExcelInformeEntregaProduccion.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>" target="_blank"><img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></a> </td>
</tr>
</table>
</form>
<br />
<table id ="tabla_unidades_produccion" rules="all" frame="box">
<tr>
<th width="300"  align="center">Categoria</th>
<th width="300" align="center">Cantidad</th>
<th width="300" align="center">Total</th>
</tr>
<?php 
mysql_select_db($database_conn, $conn);


$sql666 = "SELECT  distinct orden_de_compra.FECHA_CONFIRMACION, proyecto.NOMBRE_CLIENTE, actualizaciones.FECHA,oc_producto.ROCHA , orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO,
actualizaciones.CODIGO_ACTUALIZACIONES,oc_producto.cantidad_recibida as cantidad,producto.CATEGORIA,oc_producto.OBSERVACION,oc_producto.total

FROM orden_de_compra, proyecto, oc_producto , producto,oc_proveedor,actualizaciones,actualizaciones_general

WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
AND oc_producto.CANTIDAD_RECIBIDA > '0' AND producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_PRODUCTO = actualizaciones_general.CODIGO_PRODUCTO AND
actualizaciones_general.CODIGO_ACTUALIZACIONES = actualizaciones.CODIGO_ACTUALIZACIONES AND actualizaciones.OC = orden_de_compra.CODIGO_OC AND 
actualizaciones.FECHA between '".$txt_desde."' and '".$txt_hasta."'   and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' ";
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

$result666 = mysql_query($sql666, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result666))
  {
	$CATEGORIA = $row["CATEGORIA"];
	
		if($CATEGORIA == 'Mueble De Linea')
	{
		$ML+=$row['cantidad'];
		$ML2+=$row['total'];
	}
	else if($CATEGORIA == 'Muebles Especiales')
	{
		$ME+=$row['cantidad'];
		$ME2+=$row['total'];
	}
	else if($CATEGORIA == 'Cajoneras')
	{
		$CAJO+=$row['cantidad'];
		$CAJO2+=$row['total'];
	}
	else if($CATEGORIA == 'Superficies Curvas')
	{
		$SC+=$row['cantidad'];
		$SC2+=$row['total'];
	}
    else if($CATEGORIA == 'Superficies Rectas')
	{
		$SR+=$row['cantidad'];
		$SR2+=$row['total'];
		
	}
	  else if($CATEGORIA == 'Baldosas Laminadas')
	{
		$BL+=$row['cantidad'];
		$BL2+=$row['cantidad'];
	}
    else if($CATEGORIA == 'Baldosas Tapizadas')
	{
		$BT+=$row['cantidad'];
		$BT2+=$row['cantidad'];
	}
	else
	{
		$OR+=$row['cantidad'];
		$OR2+=$row['total'];
	}
	
	
  }


    echo "<tr><td><center>Mueble de Linea</center></td>";	
	echo "<td> <center>".$ML."</center></td>";
	echo "<td> <center>". number_format($ML2,0, ",", ".")."</center></td></tr>";
	
    echo "<tr><td><center>Muebles Especiales</center></td>";	
	echo "<td> <center>".$ME."</center></td>";
	echo "<td> <center>". number_format($ME2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr><td><center>Cajoneras</center></td>";	
	echo "<td> <center>".$CAJO."</center></td>";
	echo "<td> <center>". number_format($CAJO2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr><td><center>Superficies Rectas</center></td>";	
	echo "<td> <center>".$SR."</center></td>";
	echo "<td> <center>". number_format($SR2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr><td><center>Superficies Curvas</center></td>";	
	echo "<td> <center>".$SC."</center></td>";
	echo "<td> <center>". number_format($SC2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr><td><center>Baldosas Laminadas</center></td>";	
	echo "<td> <center>".$BL."</center></td>";
	echo "<td> <center>". number_format($BL2,0, ",", ".")."</center></td></tr>";
	
	echo "<tr><td><center>Baldosas Tapizadas</center></td>";	
	echo "<td> <center>".$BT."</center></td>";
	echo "<td> <center>". number_format($BT2,0, ",", ".")."</center></td></tr>";
	
	
	echo "<tr><td><center>Otros</center></td>";	
	echo "<td> <center>".$OR."</center></td>";
	echo "<td> <center>". number_format($OR2,0, ",", ".")."</center></td></tr>";

$cantidadQ=0;
$cantidadQ2=0;	
$cantidadQ= $ML + $ME +$CAJO + $SC + $SR + $OR + $BL + $BT;
$cantidadQ2= $ML2 + $ME2 +$CAJO2 + $SC2 + $SR2 + $OR2 + $BL2 + $BT2;

	echo "<tr><th><center>Total</center></th>";	
	echo "<th> <center>".$cantidadQ."</center></th>";
	echo "<th> <center>". number_format($cantidadQ2,0, ",", ".")."</center></th></tr>";
?>
</table>

</div>
</center>
</body>

</html>
