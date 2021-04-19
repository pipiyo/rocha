<?php require_once('Conexion/Conexion.php');?>
<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=nombre_del_archivo.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">
<head>  
<title> </title>

<style>
body 
{
   font-family: tahoma,arial,sans-serif; 
}  

h2 
{
    color:#4E4E4E;
    font-weight:bold;
}

p 
{
    color:#666;
}

legend 
{
    color:#0168B3;
    font-family: Arial;
}

 th {
    background-color:#003;
	font-size: 10px !important;
    color:#FFF;
}

tbody tr:nth-child(2n) td, tbody tr.even td {
    background-color:#ECECEC;
}

table td {
    border: 1px solid #ECECEC;
    padding: 5px;
	font-size: 10px !important;
    color:#646464;
}

.boton 
{
    background-color:#EE3A43;
    border:0;
    color:#FFF;
    padding:5px 20px;
    cursor:pointer;
}

.boton_limpiar 
{
    background-color:#B8D45A;
    border:0;
    color:#5E7C38;
    padding:3px 10px;
    cursor:pointer;
}

.boton:hover 
{
    background-color:#769056;    
}

.boton_limpiar:hover 
{
    background-color:#C7DD7F;
}

.page {
    width: 950px;
}

.menu {
    border: 0 none;
    font-family: tahoma,arial,sans-serif;
    font-size: 12px;
}

#header #title .TituloPanelCADEM {
    font-family: tahoma,arial,sans-serif;
}

.display-label, .editor-label {
    margin: 0 0 1.5em;
}

#main {   
    float:left;
    
}

textarea.roles_textarea 
{
    width:190px;
    height:50px;
}


.borde
{
	border: 1px solid #ccc;
}
</style>

</head>

<body>

<table id ="tabla_unidades_produccion" rules="all" frame="box">
<tr>
<th width="300"  align="center">Categoria</th>
<th width="300" align="center">Cantidad</th>
<th width="300" align="center">Total</th>
</tr>
<?php 
mysql_select_db($database_conn, $conn);

$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
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

</body>

</html>