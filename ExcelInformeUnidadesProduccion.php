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
<?php
mysql_select_db($database_conn, $conn);

$TXT_OC = $_GET["txt_oc"];
$TXT_CLIENTE = $_GET["txt_cliente"];
$TXT_ROCHA = $_GET["txt_rocha"];
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];


$ML1=0;
$ME1=0;
$CAJO1=0;
$SC1=0;
$SR1=0;
$OR1=0;
$BL1=0;
$BT1=0;




	

if($_GET["txt_rocha"] != "")
{


$sql555 = "SELECT DISTINCT orden_de_compra.FECHA_REALIZACION, proyecto.NOMBRE_CLIENTE, orden_de_compra.FECHA_ENTREGA,oc_producto.ROCHA , orden_de_compra.FECHA_REALIZACION, orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO
FROM orden_de_compra, proyecto, oc_producto,oc_proveedor
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
 AND orden_de_compra.FECHA_REALIZACION 
between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80'  and oc_producto.ROCHA = '".$TXT_ROCHA ."' ORDER BY orden_de_compra.FECHA_REALIZACION  ";

}

else if ($_GET["txt_oc"] != "")


{


$sql555 = "SELECT DISTINCT orden_de_compra.FECHA_REALIZACION, proyecto.NOMBRE_CLIENTE, orden_de_compra.FECHA_ENTREGA,oc_producto.ROCHA , orden_de_compra.FECHA_REALIZACION, orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO
FROM orden_de_compra, proyecto, oc_producto,oc_proveedor
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
 AND orden_de_compra.FECHA_REALIZACION 
between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' and orden_de_compra.CODIGO_OC = '".$TXT_OC ."' ORDER BY orden_de_compra.FECHA_REALIZACION  ";	

}

else if ($_GET["txt_cliente"] != "")

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
</body>

</html>