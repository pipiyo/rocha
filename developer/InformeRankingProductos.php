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

$PROCESO='';
$OK='';
$NULO='';
$PROGRAMADOS='';
$TODOS='';
$BUSCAR_CODIGO = "";
function dameFechaa($fecha,$dia)
{   list($day,$mon,$year) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}
function dameFechab($fecha,$dia)
{   list($day,$mon,$year) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$CATEGORIA = $_GET["categoria"];
$PRODUCTO = $_GET["producto"];

if(date("w") == 1)
{
$txt_desde = dameFechaa(date("d-m-Y"),3);
$txt_hasta = dameFechab(date("d-m-Y"),3);
}
else if(date("w") == 2)
{
$txt_desde = dameFechaa(date("d-m-Y"),4);
$txt_hasta = dameFechab(date("d-m-Y"),2);
}
else if(date("w") == 3)
{
$txt_desde = dameFechaa(date("d-m-Y"),5);
$txt_hasta = dameFechab(date("d-m-Y"),1);
}
else if(date("w") == 4)
{
$txt_desde = dameFechaa(date("d-m-Y"),6);
$txt_hasta = dameFechab(date("d-m-Y"),0);
}
else if(date("w") == 5)
{
$txt_desde = dameFechaa(date("d-m-Y"),7);
$txt_hasta = dameFechab(date("d-m-Y"),6);
}
else if(date("w") == 6)
{
$txt_desde = dameFechaa(date("d-m-Y"),1);
$txt_hasta = dameFechab(date("d-m-Y"),5);
}
else if(date("w") == 0)
{
$txt_desde = dameFechaa(date("d-m-Y"),2);
$txt_hasta = dameFechab(date("d-m-Y"),4);
}


if (isset($_GET["buscar"])) 
{    

if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}

if($_GET["producto"] != "")
{
$PRODUCTO = $_GET["producto"];
}


if($_GET["categoria"] != "")
{
$CATEGORIA = $_GET["categoria"];
}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Informe Ranking V1.1.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
<script type="text/javascript">
  
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});		
  }); 
     
</script>
</head>
<body>
<div id='bread'><div id="menu1"></div></div>
<form action="" method="get">
<center>
<table  id = "tabla_ranking_producto_form" >
<tr>
  <h1 id='rproduh1'>Informe Ranking OC Productos <?php echo $txt_desde. " - ".$txt_hasta ?></h1>
</tr>

<tr>
  <td align="center">
    Desde
  </td>
  <td width="">
    <input class="textbox" name="txt_desde" id="txt_desde" type="text" />
  </td>
  <td align="center">
    Hasta
  </td>
  <td>
    <input class="textbox" name="txt_hasta" id="txt_hasta" type="text" />
  </td>
  <td> 
    <input class="boton_ranking_producto" type="submit" id="buscar" name = "buscar" value = "Buscar" /> 
  </td>
  <td> 
    <a href="ExcelRankingProducto.php?txt_desde=<?php echo $txt_desde ?>&txt_hasta=<?php echo $txt_hasta ?>"><IMG SRC="Imagenes/Excel.png"></a> 
  </td>
</tr>
<tr>
  <td align="center">Producto</td>
  <td>
    <input class="textbox" name="producto" id="producto" type="text" value="<?php echo $PRODUCTO; ?>" />
  </td>
  <td>
    Categorias
  </td>
  <td>
    <select class="textbox" id = "categoria" name = "categoria">
      <option>  </option>
      <option> Accesorios </option>
      <option> ACTIU </option>
      <option> Almacenamiento </option>
      <option> Articulo Electrico </option>
      <option> Baldosas Laminadas </option>
      <option> Baldosas Tapizadas</option>
      <option> Cajoneras </option>
      <option> Cerraduras </option>
      <option> Correderas </option>
      <option> Cristales </option>
      <option> Cubiertas </option>
      <option> Embalaje </option>
      <option> Full Space </option>
      <option> Laminados </option>
      <option> Maderas </option>
      <option> Mantencion </option>
      <option> Maquinas y Herramientas </option>
      <option> Muebles Especiales </option>
      <option> Mueble De Linea </option>
      <option> Paneleria </option>
      <option> Partes y Piezas </option>
      <option> Producto Especial</option>
      <option> Quincalleria </option>
      <option> Quimicos </option> 
      <option> Repiceria </option>
      <option> Servicios </option>
      <option> Seguridad </option>
      <option> Sillas </option>
      <option> Soportes </option>
      <option> Superficies Curvas </option>
      <option> Superficies Rectas </option>
      <option> Tapacantos </option>
      <option> Tela </option>
      <option> Tiradores </option>
      <option> Tornillos </option>
      </select>
  </td>
</tr>
</table>

</center>
</form>


<br />
<center>  

  
<table id ='tabla_ranking_producto' rules="all" frame="box" bordercolor="#ccc">
  <tr>
    <th>Numero</th>
    <th>Codigo</th>
    <th>Producto</th>
    <th>Categoria</th>
    <th>Monto</th>
    <th>Unidades</th>	
    <th>Valor Promedio</th>	
    <th>Ultimo Valor</th>
    <th>Compras Mensuales</th>
    <th>Compras Trimestral</th>
    <th>Compras Semestral</th>
    <th>Stock Minimo</th>
    <th>Unidades Mensuales</th>
    <th>Unidades Trimestral</th>
    <th>Unidades Semestral</th>
</tr>

<?php

$total_mes1 = 0;
$total_mes2 = 0;
$total_mes = 0;
$MINIMO = 0;
$total_cantidad = 0;
$total_cantidad1 = 0;
$total_cantidad2 = 0;
/*--------------------------------------------------------------*/
function dameFecha2($fecha,$dia)
{   
  list($day,$mon,$year) = explode('/',$fecha);
  return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}
$fecha7 = dameFecha2(date('d/m/Y'),30);

function dameFecha3($fecha,$dia)
{   
  list($day,$mon,$year) = explode('/',$fecha);
  return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}

$fecha8 = dameFecha3(date('d/m/Y'),90);

function dameFecha4($fecha,$dia)
{   
  list($day,$mon,$year) = explode('/',$fecha);
  return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}

$fecha9 = dameFecha4(date('d/m/Y'),180);
/*--------------------------------------------------------------*/


mysql_select_db($database_conn, $conn);

$query_registro = "SELECT  producto.PRECIO, producto.CATEGORIA, orden_de_compra.FECHA_REALIZACION,producto.DESCRIPCION,producto.CODIGO_PRODUCTO, sum(oc_producto.TOTAL) as total FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC  AND 
orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.ESTADO = 'OK'";



if($PRODUCTO != "") 
{ 
$query_registro .= " AND producto.DESCRIPCION = '".$PRODUCTO."' ";
} 

if($CATEGORIA  != "") 
{ 
$query_registro .= " AND producto.CATEGORIA = '".$CATEGORIA."' ";
}

$query_registro .= " GROUP BY producto.DESCRIPCION ORDER BY sum(oc_producto.TOTAL) DESC ";





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
$query_registro1 = "SELECT SUM(oc_producto.CANTIDAD) as CUENTA FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND
orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."' GROUP BY producto.DESCRIPCION ORDER BY sum(oc_producto.TOTAL) DESC";

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
  $query_registro1 = "SELECT SUM(oc_producto.TOTAL) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND
orden_de_compra.FECHA_REALIZACION between '".$fecha7."' and '".date('Y-m-d')."' and  orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_mes= $row["ccuenta"]; 
  }
  
  
   if($total_mes !=0)
  {
  $total_mes= $total_mes / 1 ;
  }
  else
  {
	    $total_mes = 0;
  } 
/////////  
  
  
  
/////////POR TRIMESTRE  
  $query_registro1 = "SELECT SUM(oc_producto.TOTAL) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND
orden_de_compra.FECHA_REALIZACION between '".$fecha8."' and '".date('Y-m-d')."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_mes1= $row["ccuenta"]; 
  }
  
   if($total_mes1 !=0)
  {
  $total_mes1 = $total_mes1 / 3 ;
  }
  else
  {
	    $total_mes1 = 0;
  } 
  
/////////    
  
  
  
  
  
/////////POR SEMESTRE  
  $query_registro1 = "SELECT SUM(oc_producto.TOTAL) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND
orden_de_compra.FECHA_REALIZACION between '".$fecha9."' and '".date('Y-m-d')."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_mes2= $row["ccuenta"]; 
  }
  
   if($total_mes2 !=0)
  {
  $total_mes2 = $total_mes2 / 6 ;
  }
  else
  {
	    $total_mes2 = 0;
  } 
  
/////////    
  
  
  
  
  
  
  
  
  
  
  /////////POR MES  
  $query_registro1 = "SELECT SUM(oc_producto.CANTIDAD) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND
orden_de_compra.FECHA_REALIZACION between '".$fecha7."' and '".date('Y-m-d')."' and  orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_cantidad= $row["ccuenta"]; 
  }
  
  
   if($total_mes !=0)
  {
  $total_cantidad = $total_cantidad / 1 ;
  }
  else
  {
	    $total_cantidad = 0;
  } 
/////////  
  
  
  
/////////POR TRIMESTRE  
  $query_registro1 = "SELECT SUM(oc_producto.CANTIDAD) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND
orden_de_compra.FECHA_REALIZACION between '".$fecha8."' and '".date('Y-m-d')."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_cantidad1 = $row["ccuenta"]; 
  }
  
   if($total_mes1 !=0)
  {
  $total_cantidad1 = $total_cantidad1 / 3 ;
  }
  else
  {
	    $total_cantidad1 = 0;
  } 
  
/////////    
  
  
  
  
  
/////////POR SEMESTRE  
  $query_registro1 = "SELECT SUM(oc_producto.CANTIDAD) as ccuenta FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND
orden_de_compra.FECHA_REALIZACION between '".$fecha9."' and '".date('Y-m-d')."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  { 
   $total_cantidad2= $row["ccuenta"]; 
  }  
   if($total_mes2 !=0)
  {
  $total_cantidad2 = $total_cantidad2 / 6 ;
  }
  else
  {
	    $total_cantidad2 = 0;
  } 
/////////    
/////////STOCK MINIMO  
  $query_registro1 = "SELECT producto.STOCK_MINIMO FROM orden_de_compra, producto, oc_producto where  producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND
orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."' and orden_de_compra.ESTADO = 'OK' AND producto.CODIGO_PRODUCTO = '".$COD."'";

$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  { 
   $MINIMO = $row["STOCK_MINIMO"]; 
  }

   echo '<tr><td align="center">'.$numero.'</td>'; 
   echo '<td><a href=Producto.php?&buscar_codigo='.urlencode($COD).'&buscar_usuario=&familias=&buscar=Buscar&valor=0>'.$COD.'</a></td>';
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
   $numero++;
  } 
  
  mysql_free_result($result);
  mysql_close($conn);
 
?>
</table>
</center> 
</body>
</html>
