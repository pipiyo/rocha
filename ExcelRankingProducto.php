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
    background-color:#000;
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

<table>
<?php
mysql_select_db($database_conn, $conn);

$dia = date('Y-m-d');

$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];


$total_mes1 = 0;
$total_mes2 = 0;
$total_mes = 0;

$MINIMO = 0;

$total_cantidad = 0;
$total_cantidad1 = 0;
$total_cantidad2 = 0;

function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),30);

function dameFecha3($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}

$fecha8 = dameFecha3(date('d/m/Y'),90);

function dameFecha4($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}

$fecha9 = dameFecha4(date('d/m/Y'),180);






 echo " <tr><td>&nbsp; </td></tr><tr><td align='left'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
echo"<tr><th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Numero</center></th>
		      <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Codigo</center></th>
		  
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Producto</center></th>     
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Categoria</center></th>

         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Monto</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Unidades</center></th>

         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Valor Promedio</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Ultimo Valor</center></th>

		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Compras Mensuales</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Compras Trimestral</center></th>

		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Compras Sementral</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Stock Minimo</center></th>

		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Unidades Mensuales</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Unidades Trimestral</center></th>

		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Unidades Sementral</center></th>
	

         </tr>
		 ";







mysql_select_db($database_conn, $conn);

$query_registro = "SELECT  producto.PRECIO, producto.CATEGORIA, orden_de_compra.FECHA_REALIZACION,producto.DESCRIPCION,producto.CODIGO_PRODUCTO, sum(oc_producto.TOTAL) as total FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.ESTADO = 'OK' GROUP BY producto.DESCRIPCION ORDER BY sum(oc_producto.TOTAL) DESC";

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 1;
 while($row = mysql_fetch_array($result))
  { 
  $RAZON_SOCIAL= $row["DESCRIPCION"]; 								
  $TOTAL= $row["total"]; 
  $COD = $row["CODIGO_PRODUCTO"];
  $PRECIO = $row["PRECIO"];
    $CATEGORIA = $row["CATEGORIA"];
    
/////////////
$query_registro1 = "SELECT SUM(oc_producto.CANTIDAD) as CUENTA FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."' GROUP BY producto.DESCRIPCION ORDER BY sum(oc_producto.TOTAL) DESC";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $CUENTA= $row["CUENTA"]; 
  }
  
   if($TOTAL !=0 && $CUENTA != 0)
  {
 $A = $TOTAL / $CUENTA;
  }
  else
  {
	   $A = 0;
  }
  mysql_free_result($result1);
///////////  
  
  
  
  
  
/////////POR MES  
  $query_registro1 = "SELECT SUM(oc_producto.TOTAL) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.FECHA_REALIZACION between '".$fecha7."' and '".date('Y-m-d')."' and  orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_mes= $row["ccuenta"]; 
  }
  
  
   if($total_mes !=0 && $total_mes != 0)
  {
  $total_mes= $total_mes / 1 ;
  }
  else
  {
	    $total_mes = 0;
  } 
/////////  
  
  
  
/////////POR TRIMESTRE  
  $query_registro1 = "SELECT SUM(oc_producto.TOTAL) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.FECHA_REALIZACION between '".$fecha8."' and '".date('Y-m-d')."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_mes1= $row["ccuenta"]; 
  }
  
   if($total_mes1 !=0 && $total_mes1 != 0)
  {
  $total_mes1 = $total_mes1 / 3 ;
  }
  else
  {
	    $total_mes1 = 0;
  } 
  
/////////    
  
  
  
  
  
/////////POR SEMESTRE  
  $query_registro1 = "SELECT SUM(oc_producto.TOTAL) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.FECHA_REALIZACION between '".$fecha9."' and '".date('Y-m-d')."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_mes2= $row["ccuenta"]; 
  }
  
   if($total_mes2 !=0 && $total_mes2 != 0)
  {
  $total_mes2 = $total_mes2 / 6 ;
  }
  else
  {
	    $total_mes2 = 0;
  } 
  
/////////    
  
  
  
  
  
  
  
  
  
  
  /////////POR MES  
  $query_registro1 = "SELECT SUM(oc_producto.CANTIDAD) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.FECHA_REALIZACION between '".$fecha7."' and '".date('Y-m-d')."' and  orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_cantidad= $row["ccuenta"]; 
  }
  
  
   if($total_mes !=0 && $total_mes != 0)
  {
  $total_cantidad = $total_cantidad / 1 ;
  }
  else
  {
	    $total_cantidad = 0;
  } 
/////////  
  
  
  
/////////POR TRIMESTRE  
  $query_registro1 = "SELECT SUM(oc_producto.CANTIDAD) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.FECHA_REALIZACION between '".$fecha8."' and '".date('Y-m-d')."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_cantidad1 = $row["ccuenta"]; 
  }
  
   if($total_mes1 !=0 && $total_mes1 != 0)
  {
  $total_cantidad1 = $total_cantidad1 / 3 ;
  }
  else
  {
	    $total_cantidad1 = 0;
  } 
  
/////////    
  
  
  
  
  
/////////POR SEMESTRE  
  $query_registro1 = "SELECT SUM(oc_producto.CANTIDAD) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.FECHA_REALIZACION between '".$fecha9."' and '".date('Y-m-d')."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_cantidad2= $row["ccuenta"]; 
  }
  
   if($total_mes2 !=0 && $total_mes2 != 0)
  {
  $total_cantidad2 = $total_cantidad2 / 6 ;
  }
  else
  {
	    $total_cantidad2 = 0;
  } 
  
/////////    
  
  
  
  /////////STOCK MINIMO  
  $query_registro1 = "SELECT producto.STOCK_MINIMO FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $MINIMO = $row["STOCK_MINIMO"]; 
  }
//////////////









	
         

   echo '<tr><td align="center">'.$numero.'</td>'; 
   echo '<td>'.$COD.'</td>';

   echo '<td>'.($RAZON_SOCIAL).'</td>';
   echo '<td>'.($CATEGORIA).'</td>';
   echo '<td align="right">'.number_format($TOTAL,0, ",", ".").'</td>';
   echo '<td align="center">'.number_format( $CUENTA,0, ",", ".").'</td>';
   echo '<td align="right">'.number_format($A,0, ",", ".").'</td>';
   echo '<td align="right">'.number_format($PRECIO,0, ",", ".").'</td>';
         echo '<td align="right">'.number_format($total_mes,0, ",", ".").'</td>';
	     echo '<td align="right">'.number_format($total_mes1,0, ",", ".").'</td>';
		 echo '<td align="right">'.number_format($total_mes2,0, ",", ".").'</td>';
		 
		 echo '<td align="center">'.($MINIMO).'</td>';
			
		 echo '<td align="right">'.($total_cantidad).'</td>';
	     
		 echo '<td align="right">'.number_format($total_cantidad1,2,',','.').'</td>';
		 
		 echo '<td align="right">'.number_format($total_cantidad2,2,',','.').'</td>';
			
   echo '</tr>';
	
 
 }








   
  
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</body>

</html>