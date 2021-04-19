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

$TXT_OC = "";
$TXT_CLIENTE = "";
$TXT_ROCHA = "";
if (isset($_POST["boton"])) 
{    
$TXT_OC = $_POST["txt_oc"];
$TXT_CLIENTE = $_POST["txt_cliente"];
$TXT_ROCHA = $_POST["txt_rocha"];
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
  <title>  Informe Ingresos OC V1.0.0</title>
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

<form method="post" action="">
<h1> Informe Ingresos OC &nbsp; &nbsp;  &nbsp; <?php echo $txt_desde ."&nbsp; &nbsp;  -&nbsp;   &nbsp; ".$txt_hasta ?></h1>
<table>
<tr>
<td> Desde </td>
<td><input class="casillaTexto" type="text" id="txt_desde" value="" name="txt_desde" /> </td>
<td> Hasta </td>
<td><input class="casillaTexto" type="text" id="txt_hasta" value="" name="txt_hasta" /> </td>
<td> Rocha </td>
<td><input class="casillaTexto" type="text" id="txt_rocha" value="" name="txt_rocha" /> </td>
<td> OC </td>
<td><input class="casillaTexto" type="text" id="txt_oc" value="" name="txt_oc" /> </td>
<td> Cliente </td>
<td><input class="casillaTexto" type="text" id="txt_cliente" value="" name="txt_cliente" /> </td>

<td><input type="submit" id="boton" value="Aceptar" name="boton" /> </td>

</tr>
<tr>
<td><a href="ExcelInformeUnidadesProduccion.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>&txt_rocha=<?php echo $TXT_ROCHA;?>&txt_oc=<?php echo $TXT_OC;?>&txt_cliente=<?php echo $TXT_CLIENTE;?>" target="_blank"><img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></a> </td>
</tr>
</table>


</form>
<br />
<table id ="tabla_unidades_produccion" width="100%" rules="all" frame="box">

  <tr>
  <th width="100"><center>Semana</center></th>	
  <th width="100"><center>Fecha Confirmacion</center></th>	
  <th width="100"><center>Rocha</center></th>
  <th width="100"><center>Codigo Oc</center></th>	
  <th width="200"><center>Cliente</center></th>
  <th width="100"><center>Ranking</center></th>
  <th width="100"><center>Muebles de linea</center></th>
  <th width="100"><center>Muebles Especiales</center></th>
  <th width="100"><center>Cajoneras</center></th>
  <th width="100"><center>Superficie Recta</center></th>
  <th width="100"><center>Superficie Curvas</center></th>
  <th width="100"><center>Baldosas Laminadas</center></th>
  <th width="100"><center>Baldosas Tapizadas</center></th>
  <th width="100"><center>Otros</center></th>
  <th width="100"><center>Total</center></th>
  </tr>	

<?php 
mysql_select_db($database_conn, $conn);
$ML1=0;
$ME1=0;
$CAJO1=0;
$SC1=0;
$SR1=0;
$OR1=0;
$BL1=0;
$BT1=0;

if(isset($_POST["boton"]))  
{

	
$TXT_OC = $_POST["txt_oc"];
$TXT_CLIENTE = $_POST["txt_cliente"];
$TXT_ROCHA = $_POST["txt_rocha"];
	

if($_POST["txt_rocha"] != "")
{


$sql555 = "SELECT DISTINCT orden_de_compra.FECHA_REALIZACION, proyecto.NOMBRE_CLIENTE, orden_de_compra.FECHA_ENTREGA,oc_producto.ROCHA , orden_de_compra.FECHA_REALIZACION, orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO
FROM orden_de_compra, proyecto, oc_producto,oc_proveedor
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
 AND orden_de_compra.FECHA_REALIZACION 
between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80'  and oc_producto.ROCHA = '".$TXT_ROCHA ."' ORDER BY orden_de_compra.FECHA_REALIZACION  ";

}

else if ($_POST["txt_oc"] != "")


{


$sql555 = "SELECT DISTINCT orden_de_compra.FECHA_REALIZACION, proyecto.NOMBRE_CLIENTE, orden_de_compra.FECHA_ENTREGA,oc_producto.ROCHA , orden_de_compra.FECHA_REALIZACION, orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO
FROM orden_de_compra, proyecto, oc_producto,oc_proveedor
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
 AND orden_de_compra.FECHA_REALIZACION 
between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' and orden_de_compra.CODIGO_OC = '".$TXT_OC ."' ORDER BY orden_de_compra.FECHA_REALIZACION  ";	

}

else if ($_POST["txt_cliente"] != "")

{
$sql555 = "SELECT DISTINCT orden_de_compra.FECHA_REALIZACION, proyecto.NOMBRE_CLIENTE, orden_de_compra.FECHA_ENTREGA,oc_producto.ROCHA , orden_de_compra.FECHA_REALIZACION, orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO
FROM orden_de_compra, proyecto, oc_producto,oc_proveedor
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
 AND orden_de_compra.FECHA_REALIZACION 
between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' and proyecto.NOMBRE_CLIENTE = '".$TXT_CLIENTE ."' ORDER BY orden_de_compra.FECHA_REALIZACION  ";	
}
else
{
	$sql555 = "SELECT DISTINCT orden_de_compra.FECHA_REALIZACION, proyecto.NOMBRE_CLIENTE, orden_de_compra.FECHA_ENTREGA,oc_producto.ROCHA , orden_de_compra.FECHA_REALIZACION, orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO
FROM orden_de_compra, proyecto, oc_producto,oc_proveedor
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
 AND orden_de_compra.FECHA_REALIZACION 
between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' ORDER BY orden_de_compra.FECHA_REALIZACION  ";
}
}
else
{
$sql555 = "SELECT DISTINCT orden_de_compra.FECHA_REALIZACION, proyecto.NOMBRE_CLIENTE, orden_de_compra.FECHA_ENTREGA,oc_producto.ROCHA , orden_de_compra.FECHA_REALIZACION, orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO
FROM orden_de_compra, proyecto, oc_producto,oc_proveedor
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
 AND orden_de_compra.FECHA_REALIZACION 
between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' ORDER BY orden_de_compra.FECHA_REALIZACION  ";
}




$result555 = mysql_query($sql555, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result555))
  { 
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$CODIGO_OC = $row["CODIGO_OC"];
	$ROCHA = $row["ROCHA"];
	
	
$dia  = substr($FECHA_REALIZACION,8,2);
$mes = substr($FECHA_REALIZACION,5,2);
$anio = substr($FECHA_REALIZACION,0,4);  

$semana = date('W',  mktime(0,0,0,$mes,$dia,$anio));
	
	echo "<tr><td><center>".$semana ."</center></td>";	
	echo "<td><center>".$FECHA_ENTREGA."</center></td>";	
	echo "<td><center>".($ROCHA)."</center></td>";	
	echo "<td><center>".$CODIGO_OC."</center></td>";	
	echo "<td><center>".($NOMBRE_CLIENTE)."</center></td>";	

	

$sql666 = "SELECT oc_producto.cantidad,producto.CATEGORIA
FROM orden_de_compra, proyecto, oc_producto , producto,oc_proveedor
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
 and oc_producto.CODIGO_PRODUCTO  = PRODUCTO.CODIGO_PRODUCTO AND oc_producto.ROCHA = '".$ROCHA."' 
AND orden_de_compra.FECHA_REALIZACION
between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' ORDER BY orden_de_compra.FECHA_REALIZACION ";
$cantidadQ=0;
$result666 = mysql_query($sql666, $conn) or die(mysql_error());
$ML=0;
$ME=0;
$CAJO=0;
$SC=0;
$SR=0;
$OR=0;
$BL=0;
$BT=0;

 while($row = mysql_fetch_array($result666))
  {
	$cant = $row["cantidad"];
	$CATEGORIA = $row["CATEGORIA"];
	
	if($CATEGORIA == 'Mueble De Linea')
	{
		$ML+=$row['cantidad'];
		$ML1+=$row['cantidad'];
	}
	else if($CATEGORIA == 'Muebles Especiales')
	{
		$ME+=$row['cantidad'];
		$ME1+=$row['cantidad'];
	}
	else if($CATEGORIA == 'Cajoneras')
	{
		$CAJO+=$row['cantidad'];
			$CAJO1+=$row['cantidad'];
	}
	else if($CATEGORIA == 'Superficies Curvas')
	{
		$SC+=$row['cantidad'];
		$SC1+=$row['cantidad'];
	}
    else if($CATEGORIA == 'Superficies Rectas')
	{
		$SR+=$row['cantidad'];
		$SR1+=$row['cantidad'];
	}
    else if($CATEGORIA == 'Baldosas Laminadas')
	{
		$BL+=$row['cantidad'];
		$BL1+=$row['cantidad'];
	}
    else if($CATEGORIA == 'Baldosas Tapizadas')
	{
		$BT+=$row['cantidad'];
		$BT1+=$row['cantidad'];
	}
	
	else
	{
		$OR+=$row['cantidad'];
		$OR1+=$row['cantidad'];
	}


	
  }
  
  	
$cantidadQ= $ML + $ME +$CAJO + $SC + $SR + $OR + $BL + $BT;
  
 if($cantidadQ >= 200 )
 {
	$letra = 'A';
 }
 else if ($cantidadQ >= 51 && $cantidadQ < 200)
 {
	 $letra = 'B';
 }
 else
 {
	 $letra = 'C';
 }
 
    

    echo "<td><center>".$letra."</center></td>";	
	  echo "<td><center>".$ML."</center></td>";	
	  	  echo "<td><center>".$ME."</center></td>";
		   echo "<td><center>".$CAJO."</center></td>";	
	  	  echo "<td><center>".$SR."</center></td>";
		  echo "<td><center>".$SC."</center></td>";
		     echo "<td><center>".$BL."</center></td>";
		  echo "<td><center>".$BT."</center></td>";
		  echo "<td><center>".$OR."</center></td>";
	echo "<td > <center>".$cantidadQ."</center></td></tr>";

	
  }
$cantidadQ1=0;
$cantidadQ1= $ML1 + $ME1 +$CAJO1 + $SC1 + $SR1 + $OR1+ $BL1 + $BT1;

 echo "<tr><th colspan='6'><center>Total</center></th>";	
	  echo "<th><center>".$ML1."</center></th>";	
	  	  echo "<th><center>".$ME1."</center></th>";
		  echo "<th><center>".$CAJO1."</center></th>";	
	  	  echo "<th><center>".$SR1."</center></th>";
		  echo "<th><center>".$SC1."</center></th>";
		  echo "<th><center>".$BL1."</center></th>";
		  echo "<th><center>".$BT1."</center></th>";
		  echo "<th><center>".$OR1."</center></th>";
	echo "<th > <center>".$cantidadQ1."</center></th></tr>";


?>
</table>


</center>
</body>

</html>
