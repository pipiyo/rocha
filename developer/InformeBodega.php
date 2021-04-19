<?php require_once('Conexion/Conexion.php');?>
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
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".($CODIGO_USUARIO)."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  }
mysql_free_result($result1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Informe Bodega V1.0.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_materiales.css" />
   
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  
  <script language = javascript> 
			  $(function() 
  {
		$( "#fecha" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });  
  $(function(){
                $('#buscar_usuario').autocomplete({
                   source : 'ajaxProducto.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(      
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });
 </script>
</head>
<body>
  <form  method="GET"/>   
<center>  <h1> Bodega </h1>   
  <table>
  <tr>
  <td> Codigo: </td>
  <td> <input type="text" autocomplete="off" id="buscar_codigo" name="buscar_codigo" /> </td>
  <td> Descripcion: </td>
  <td> <input type="text" autocomplete="off" id="buscar_usuario" name="buscar_usuario" /> </td>
  <td>Categoria: </td>
  <td ><center><select style="" id = "familias" name = "familias">
<option></option>
<option> Producto </option>
<option> Cerraduras </option>
<option> Correderas </option>
<option> Embalaje </option>
<option> Sillas </option>
<option> Laminados </option>
<option> Maderas </option>
<option> Quimicos </option>
<option> Quincalleria </option>
<option> Seguridad </option>
<option> Tapacantos </option>
<option> Tiradores </option>
<option> Tornillos </option>
<option> ACTIU </option>
<option> Almacenamiento </option>
<option> Paneleria </option>
<option> Accesorios </option>
<option> Cubiertas </option>
<option> Soportes </option>
<option> Servicios </option>
  </select></center></td>
   <td>Fecha: </td>
  <td ><center><input type="text" id = "fecha" name = "fecha">
    <td width="20">&nbsp;  </td>
  <td width="138"><input type="submit" name = "buscar" id='buscar' value="Buscar"/> </td>
  <td width="10">&nbsp;  </td>
 </tr>
  </table>	
  </center>
 <form>
 


<table id="datagrid" rules="all" cellspacing=0 cellpadding=0 style="font-size: 8pt">
<tr>
<th><center>Código</center></th>
<th><center>Descripción</center></th>
<th><center>Stock</center></th>
<th><center>Stock Fecha</center></th>
<th><center>U/M</center></th>
<th><center>Precio</center></th>
<th><center>Total</center></th>
<th><center>Minimo</center></th>
<th><center>Categoria</center></th>
</tr>
<?php
$BUSCAR_CODIGO = "";
$BUSCAR_DESCRIPCION = "";	
$CODIGO_PRODUCTO ="";
$FECHA=date("Y-m-d");
$INGRESO = 0;
$EGRESO = 0;
//listado de materiales
////////////////////////////////
if (isset($_GET["buscar"])) 
{
$FECHA = $_GET['fecha'];
if($FECHA == "")
{
	$FECHA=date("Y-m-d");
}
$BUSCAR_CODIGO = $_GET['buscar_codigo'];
$BUSCAR_DESCRIPCION = $_GET['buscar_usuario'];	
$familias = $_GET['familias'];	
mysql_select_db($database_conn, $conn);
if($BUSCAR_CODIGO == "" && $BUSCAR_DESCRIPCION  == "" && $familias == "")
{
$query_registro = "SELECT * FROM PRODUCTO order by DESCRIPCION ASC";	
//$query_registro = "SELECT CODIGO_PRODUCTO,DESCRIPCION,STOCK_ACTUAL,PRECIO,UNIDAD_DE_MEDIDA,FORMATO,GESTION,DIMENSION,RELACION,STOCK_MINIMO FROM PRODUCTO WHERE CODIGO_PRODUCTO = //'".$BUSCAR_CODIGO."' OR  DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%'  order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO != "" && $BUSCAR_DESCRIPCION  == "" && $familias == "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO == "" && $BUSCAR_DESCRIPCION  != "" && $familias == "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' OR  DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%'  order by DESCRIPCION ASC ";
//$query_registro = "SELECT CODIGO_PRODUCTO,DESCRIPCION,STOCK_ACTUAL,PRECIO,UNIDAD_DE_MEDIDA,FORMATO,GESTION,DIMENSION,RELACION,STOCK_MINIMO FROM PRODUCTO WHERE CODIGO_PRODUCTO = //'".$BUSCAR_CODIGO."' OR  DESCRIPCION = '".($BUSCAR_DESCRIPCION)."'  order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO == "" && $BUSCAR_DESCRIPCION  == "" && $familias != "" )
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CATEGORIA = '".$familias."' order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO != "" && $BUSCAR_DESCRIPCION  != "" && $familias == "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO != "" && $BUSCAR_DESCRIPCION  == "" && $familias != "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO != "" && $BUSCAR_DESCRIPCION  != "" && $familias != "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO == "" && $BUSCAR_DESCRIPCION  != "" && $familias != "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CATEGORIA = '".$familias."' OR  DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%'  order by DESCRIPCION ASC ";
}
}
else
{
	$query_registro = "SELECT * FROM PRODUCTO order by DESCRIPCION ASC";
}
$fin=0;
$contador1 = 0;
$numero = 0;
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {
	$CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$STOCK_ACTUAL = $row["STOCK_ACTUAL"];
	$FORMATO = $row["FORMATO"];
	$gestion = $row["GESTION"];
	$Dimension = $row["DIMENSION"];
	$RELACION = $row["RELACION"];
	$STOCK_MINIMO = $row["STOCK_MINIMO"];
	$STOCK_MAXIMO = $row["STOCK_MAXIMO"];
	$PRECIO = $row["PRECIO"];
	$UM = $row["UNIDAD_DE_MEDIDA"];
	$CATEGORIA = $row["CATEGORIA"];
	$MENSAJE = 2;
	
$query_registro3 = "SELECT SUM(actualizaciones.EGRESO) as EGRESO FROM producto,actualizaciones,actualizaciones_general where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES and actualizaciones_general.CODIGO_PRODUCTO = PRODUCTO.CODIGO_PRODUCTO AND PRODUCTO.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' AND actualizaciones.FECHA  between '2013-01-01' and '".$FECHA."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result3))
  {  
  $EGRESO = $row["EGRESO"];
  }
$query_registro4 = "SELECT SUM(actualizaciones.INGRESO) as INGRESO FROM producto,actualizaciones,actualizaciones_general where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES and actualizaciones_general.CODIGO_PRODUCTO = PRODUCTO.CODIGO_PRODUCTO AND PRODUCTO.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' AND actualizaciones.FECHA   between '2013-01-01' and '".$FECHA."'";
$result4 = mysql_query($query_registro4, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result4))
  {  
  $INGRESO = $row["INGRESO"];
  }
	
	$SUMAA=  $INGRESO - $EGRESO;
	$SUMAB = $STOCK_ACTUAL + $SUMAA;
	$TOTAL = $PRECIO * $STOCK_ACTUAL;
	$TOTAL1 = number_format($PRECIO,0, ",", ".") * $STOCK_ACTUAL;	
	$fin+=$TOTAL1;
	if($contador1 == 15)
	{
	echo"	<tr>
<th><center>Código</center></th>
<th><center>Descripción</center></th>
<th><center>Stock</center></th>
<th><center>Stock Fecha</center></th>
<th><center>U/M</center></th>
<th><center>Precio</center></th>
<th><center>Total</center></th>
<th><center>Minimo</center></th>
<th><center>Categoria</center></th>
</tr>";
		$contador1 = 0;
	}
	
     echo "<tbody><tr><td><center> <a href=DescripcionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
	   $CODIGO_PRODUCTO . "</a></center></td>";
    echo "<td id = 'des'><center> <a target='_blank' href=DescripcionProductoDetalle.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
	   $DESCRIPCION . "</a></center></td>";
		
		
		
		
	if($STOCK_ACTUAL < $STOCK_MINIMO)
	{	
     echo "<td style='background-color:#F72D2D; color:#fff;'><center>" . 
	    $STOCK_ACTUAL . "</center></td>";
	}
	else
	{
		echo "<td><center>" . 
	    $STOCK_ACTUAL . "</center></td>";
	}
	echo "<td><center>".$SUMAB."</center></td>";
	echo "<td><center>".$UM."</center></td>";
	echo "<td><center>".number_format($PRECIO, 0, ",", ".")."</center></td>";
	echo "<td><center>".number_format($TOTAL, 0, ",", ".")."</center></td>";
	echo "<td><center>".$STOCK_MINIMO."</center></td>";
	echo "<td><center></center>".$CATEGORIA."</td></tr></tbody>";
   
         
		  $numero++;	  
		  $contador1++;
  }
  echo "<tr class=\"alt\"><td colspan=\"5\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td>";
  echo "<td><center>Total</center></td>";
  echo "<td colspan=\"3\">".number_format($fin, 0, ",", ".")."</td></tr>";
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>

<table>
<tr>
<td><h4>Ingreso de Producto</h4></td>
<td><a target='_blank' href="IngresoProducto.php" >
<IMG SRC="Imagenes/cabinet.png">
</a></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><h4>Inventario de Bodega</h4></td>
<td><a target='_blank' href="ExcelInformeProducto.php?CODIGO_PRODUCTO=<?php echo $CODIGO_PRODUCTO;?>">
<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel" class="right">
</a></td>
</tr>
</table>


</body>
</html>
