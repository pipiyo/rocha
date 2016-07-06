<?php require_once('Conexion/Conexion.php'); ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$CODIGO_PRODUCTO= $_GET['CODIGO_PRODUCTO'];
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Listado OC Transito V1.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/bodega.css" />
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script src='js/Bloqueo.php'></script>
  <script src='js/breadcrumbs.php'></script>
  </head>
<body>
<div id='bread'><div id="menu1"></div></div>
<h1 class="h-oc-transito">Listado OC Transito</h1>
<table class="table-info listado-oc-transito">
<tr>
	<th>N°</th>
	<th>Rocha</th>
	<th>Proveedor</th>
	<th>Fecha realizacion</th>
	<th>Fecha entrega</th>
	<th>Fecha confirmacion</th>
	<th>Neto</th>
	<th>Factura</th>
	<th>Fecha Envio por valija</th>
	<th>Recibir</th>
	<th>Estado</th>
</tr>

<?php

//listado de materiales
////////////////////////////////

function dameFecha2($fecha,$dia){   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
$fecha7 = dameFecha2(date('d/m/Y'),7);
mysql_select_db($database_conn, $conn);

$query_registro = "SELECT DISTINCT orden_de_compra.NETO,orden_de_compra.FACTURAS, orden_de_compra.ROCHA_PROYECTO, orden_de_compra.ENVIADO, orden_de_compra.FECHA_CONFIRMACION, orden_de_compra.FECHA_ENVIO_VALIJA, orden_de_compra.CODIGO_OC,orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR  FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and orden_de_compra.ESTADO = 'EN PROCESO'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$contador1=0;

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_OC = $row["CODIGO_OC"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESPACHAR = $row["DESPACHAR_DIRECCION"];
	$TOTAL = $row["TOTAL"];
	$NOMBRE_PROVEEDOR = $row["NOMBRE_PROVEEDOR"];
	$ESTADO = $row["ESTADO"];
	$ENVIADO = $row["ENVIADO"];
	$ROCHA_PROYECTO = $row["ROCHA_PROYECTO"];
	$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
	$FECHA_ENVIOV = $row["FECHA_ENVIO_VALIJA"];
    $FACTURAS = $row["FACTURAS"];
	$NETO = $row["NETO"];
	$MENSAJE = 2;
	
if ($contador1 == 20)
{
echo "
<tr>
	<th>N°</th>
	<th>Rocha</th>
	<th>Proveedor</th>
	<th>Fecha realizacion</th>
	<th>Fecha entrega</th>
	<th>Fecha confirmacion</th>
	<th>User</th>
	<th>Total</th>
	<th>Factura</th>
	<th>Fecha Envio por valija</th>
	<th>Recibir</th>
	<th>Estado</th>
</tr>
";
$contador1 = 0;
}
if($ENVIADO == 1)
{
echo "<tbody><tr><td class=\"enviado\"> <a href=DescripcionOC1.php?CODIGO_OC=" .$CODIGO_OC.">". $CODIGO_OC."</a><input style='display:none;' onchange='enviar();' id = 'codoc".$numero."' name='codoc".$numero."' type='text' value='".$CODIGO_OC."' class='textf'/></td>";
echo "<td class=\"enviado\"><a href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($ROCHA_PROYECTO).">".($ROCHA_PROYECTO) . "</a></td>";
echo "<td class=\"enviado\">" . ($NOMBRE_PROVEEDOR) . "</td>";	
echo "<td align=\"center\" class=\"enviado\">" . $FECHA_REALIZACION . "</td>";
echo "<td align=\"center\" class=\"enviado\">" .$FECHA_ENTREGA . "</td>";
if($ESTADO == "OK")
	{
	 	echo "<td align=\"center\"align=\"center\"  id=\"azul\">".$FECHA_CONFIRMACION."</td>";	
	}
	else
	{	
		if($FECHA_CONFIRMACION > $fecha7)
		{
			echo "<td align=\"center\" id=\"verde\">".$FECHA_CONFIRMACION."</td>";	
		}
		else if($FECHA_CONFIRMACION < date('Y-m-d'))
		{
	 		echo "<td align=\"center\" id=\"rojo\">".$FECHA_CONFIRMACION."</td>";			
		}
		else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7)
		{
	 		echo "<td align=\"center\" id=\"amarillo\">".$FECHA_CONFIRMACION."</td>";			
		}		
	}
echo "<td align=\"right\" class=\"enviado\">" .number_format($NETO , 0, ",", ".").   "</td>"; 
echo "<td align='right' class=\"enviado\">" . $FACTURAS.   "</td>";
echo "<td align=\"center\" class=\"enviado\">".$FECHA_ENVIOV."</td>";	
echo "<td align=\"center\" class=\"enviado\"><a href=RecibirOC.php?CODIGO_OC=" .$CODIGO_OC. ">Recibir</a></td>"; 	
echo "<td class=\"enviado\">".$ESTADO."</td></tr></tbody>"; 
}
else
{
echo "<tbody><tr><td> <a href=DescripcionOC1.php?CODIGO_OC=" .$CODIGO_OC. ">" .$CODIGO_OC . "</a></td>";
echo "<td><a href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($ROCHA_PROYECTO).">" .($ROCHA_PROYECTO) . "</a></td>";
echo "<td>".$NOMBRE_PROVEEDOR. "</td>";	
echo "<td align=\"center\">".$FECHA_REALIZACION. "</td>";
echo "<td align=\"center\">".$FECHA_ENTREGA. "</td>";
if($ESTADO == "OK")
{
echo "<td align=\"center\" id=\"azul\" >".$FECHA_CONFIRMACION."</td>";	
}
else
{	
	 if($FECHA_CONFIRMACION > $fecha7)
		{
	 		echo "<td align=\"center\" id=\"verde\">".$FECHA_CONFIRMACION."</td>";	
		}
		else if($FECHA_CONFIRMACION < date('Y-m-d'))
		{
	 	 	echo "<td align=\"center\" id=\"rojo\">".$FECHA_CONFIRMACION."</td>";			
		}
		else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7)
		{
	 	 	echo "<td align=\"center\" id=\"amarillo\">".$FECHA_CONFIRMACION."</td>";			
		}
	}
echo "<td align=\"right\">" .number_format($NETO , 0, ",", ".").   "</td>"; 
echo "<td align='center'>" . $FACTURAS.   "</td>";
echo "<td align=\"center\">".$FECHA_ENVIOV."</td>";	
echo "<td align='center'><a href=RecibirOC.php?CODIGO_OC=" .$CODIGO_OC. ">Recibir</a></td>"; 	
echo "<td>".$ESTADO. "</td></tr></tbody>"; 
}
$numero++;
$contador1++;
}
echo "<tr class=\"alt\"><th align=\"left\" colspan=\"15\">Numero: " . $numero ."</th></tr>";
mysql_free_result($result);
mysql_close($conn);
?>
</table>
</body>
</html>