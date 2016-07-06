<?php require_once('Conexion/Conexion.php'); 

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title> Informe Proveedor Compra V1.0.0</title>
<meta name="description" content="mantenedor linea" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link rel="shortcut icon" href="Imagenes/rocha.png">

<link rel="stylesheet" type="text/css" href="Style/style_mantenedores.css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
<link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src='js/breadcrumbs.php'></script>
    <link rel="styleSheet" href="style/bread.css" type="text/css" >
<script src="js/jquery.ui.datepicker.js"></script>

<script language = javascript> 
    $(function() 
  {
		$( "#desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });    

   $( function(){
                $('#nombrec').autocomplete({
                   source : 'ajaxproveedor.php',
                   select : function(event, ui){
                   }
                });
   });   
  </script>
</head>

<body>
<div id='bread'><div id="menu1"></div></div>
<form action="" method="GET">
<div class='contenedor_provee'>
<h1 class='h-linea'> Informe Proveedor </h1>
<input type='text' name='desde' id='desde' class='textbox1 form' placeholder="Desde">
<input type='text' name='hasta' id='hasta' class='textbox1 form' placeholder="Hasta">
<input type='text' name='nombrec' id='nombrec' class='textbox1 form' placeholder="Nombre">

<input type='submit' value='buscar' name='buscarc' class='textbox_boton1 form1'>

</div>
</form>	

<!-- TABLA LINEA -->
<div class='section'>
<table class='tabla-cliente-info' rules='all' border='1'>	
<?php

if (isset($_GET["buscarc"]))
{
$DESDE = (empty($_GET['desde'])) ? "0000-00-00" : $_GET['desde'] ;
$HASTA = (empty($_GET['hasta'])) ? "2050-01-01" : $_GET['hasta'] ;
$query_registro =  " SELECT SUM(oc_producto.TOTAL) AS TOTAL, proyecto.CODIGO_PROYECTO,proyecto.OBRA,proyecto.DEPARTAMENTO_CREDITO,proyecto.FECHA_INGRESO,proyecto.FECHA_CONFIRMACION,proyecto.MONTO 
FROM proyecto,orden_de_compra,oc_producto
WHERE  proyecto.CODIGO_PROYECTO = oc_producto.ROCHA and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND  orden_de_compra.NOMBRE_PROVEEDOR = '".$_GET['nombrec']."' AND  proyecto.FECHA_CONFIRMACION  BETWEEN '".$DESDE."' and '".$HASTA."' GROUP BY proyecto.codigo_proyecto ORDER BY SUM(oc_producto.TOTAL) DESC";     
$result = mysql_query($query_registro, $conn) or die(mysql_error());
echo "<tr> <td colspan='6'><h1>Listado de Rochas</td></h1></tr>";
$con = 20;
$fila = 0;
$LISTA_COD_ROCHA = array();
$LISTA_MONTO_ROCHA = 0;
 while( $row = mysql_fetch_array($result) )
  {  
if ( $con == 20 ) 
{
	echo"<tr>
	     <th>Rocha</th> 
	     <th>Obra</th>
	     <th>Linea</th> 
		   <th>Fecha Ingreso</th>
		   <th>Fecha Confirmacion</th>
		   <th>Total Compra</th>	
	     </tr>
		 ";
$con = 0;
}	
$LISTA_MONTO_ROCHA +=  $row['TOTAL'];
$LISTA_COD_ROCHA[] =  $row['CODIGO_PROYECTO'];
if($fila == 0)
{
  $color_fila = 'uno';
}
else
{
  $color_fila = 'dos';
  $fila = -1;
}
echo  "<tr class=".$color_fila."><td align='left'> <a href=editarProyecto.php?CODIGO_PROYECTO=" .urlencode($row['CODIGO_PROYECTO']). ">".$row['CODIGO_PROYECTO']."</a></td>";
echo  "<td align='left'>".$row['OBRA']."</td>";
echo  "<td align='left'>".$row['DEPARTAMENTO_CREDITO']."</td>";
echo  "<td align='center'>".$row['FECHA_INGRESO']."</td>";
echo  "<td align='center'>".$row['FECHA_CONFIRMACION']."</td>";
echo  "<td align='right'>".number_format($row['TOTAL'],0, ",", ".")."</td></tr>";
$fila++;
$con++;
  }
  mysql_free_result($result);
echo "<tr><th align='left'></th><th colspan='4'></th><th align='right'>".number_format( $LISTA_MONTO_ROCHA ,0, ",", ".")."</th></th>";
echo "<tr> <td colspan='6'><h1>Listado de productos</td></h1></tr>";
/* Tabla 2 */
$TOTALFIN =0;
$con = 20;
$query_registrox = " SELECT SUM(oc_producto.TOTAL) AS TOTAL, oc_producto.CODIGO_PRODUCTO,oc_producto.PRECIO_UNITARIO,producto.DESCRIPCION,producto.UNIDAD_DE_MEDIDA,oc_producto.CANTIDAD FROM proyecto,orden_de_compra,oc_producto,producto WHERE  proyecto.CODIGO_PROYECTO = oc_producto.ROCHA and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND  orden_de_compra.NOMBRE_PROVEEDOR = '".$_GET['nombrec']."' AND producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND  proyecto.FECHA_CONFIRMACION  BETWEEN '".$DESDE."' and '".$HASTA."' GROUP BY oc_producto.codigo_producto ORDER BY SUM(oc_producto.TOTAL) DESC " ;
$LISTA_PRODUCTOS = array();

$resultx = mysql_query($query_registrox, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($resultx))
  {  

    $TOTALFIN += $row['TOTAL'];
	if($con == 20)
	{	
	echo"
	   <tr>
	   <th>Codigo</th> 
		 <th colspan='2'>Descripcion</th>
		 <th>Cantidad</th>
		 <th>Unidad de medida</th>
		 <th>Valor total</th>
	     </tr>
		 ";
$con = 0;
    }
if($fila == 0)
{
  $color_fila = 'tres';
}
else
{
  $color_fila = 'cuatro';
  $fila = -1;
}
echo  "<tr class=".$color_fila."><td align='left'><a href=Producto.php?&buscar_codigo=" .urlencode($row['CODIGO_PRODUCTO']). "&buscar_usuario=&familias=&buscar=Buscar&valor=0>".$row['CODIGO_PRODUCTO']."</a></td>";
echo  "<td colspan='2' align='left'>".$row['DESCRIPCION']."</td>";
echo  "<td align='right'>".number_format($row['CANTIDAD'])."</td>";
echo  "<td align='center'>".$row['UNIDAD_DE_MEDIDA']."</td>";
echo  "<td align='right'>".number_format( $row['TOTAL'],0, ",", ".")."</td></tr>";
$fila++;
$con++;
}
echo "<tr><th align='left'></th><th colspan='4'></th><th align='right'>".number_format(  $TOTALFIN ,0, ",", ".")."</th></th>";
  }

?>
</table>
<div>

</body>
</html>
