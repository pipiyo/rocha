<?php require_once('Conexion/Conexion.php'); 

session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
ini_set('max_execution_time', 500);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.rut,empleado.nombres, empleado.apellido_paterno , empleado.apellido_materno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$apellido_m = $row["apellido_materno"];
	$rut_usuario= $row["rut"];
	$numero++;
  }
  mysql_free_result($result1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title> Informe Cliente Compra V1.0.0</title>
<meta name="description" content="mantenedor linea" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link rel="shortcut icon" href="Imagenes/rocha.png">
<link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
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

   $(function(){
                $('#nombrec').autocomplete({
                   source : 'ajaxCliente.php',
                   select : function(event, ui){
                
                   }
                });
   });   
  </script>
</head>

<body>
<div id='bread'><div id="menu1"></div></div>
<form action="" method="GET">
<div class='contenedor_cliente'>
<h1 class='h-linea'> Informe Cliente </h1>
<input type='text' name='desde' id='desde' class='textbox1 form' placeholder="Desde">
<input type='text' name='hasta' id='hasta' class='textbox1 form' placeholder="Hasta">
<input type='text' name='codigoc' class='textbox1 form' placeholder="Codigo">
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
$codigo = $_GET["codigoc"];
$nombre = $_GET["nombrec"];
if($codigo != "" || $nombre != "")
{
$desde = $_GET["desde"];
$hasta = $_GET["hasta"];

/* Tabla 1 */
if($desde == "" ||  $hasta == "")
{
$desde= "0000-00-00";
$hasta= "2050-01-01";
}
if($codigo != "")
{
$query_registro = "SELECT distinct proyecto.CODIGO_PROYECTO,proyecto.DEPARTAMENTO_CREDITO, proyecto.OBRA, proyecto.FECHA_INGRESO, proyecto.FECHA_CONFIRMACION, proyecto.MONTO FROM proyecto, cliente WHERE proyecto.RUT_CLIENTE = cliente.RUT_CLIENTE  and cliente.RUT_CLIENTE = '".$codigo."' and proyecto.ESTADO IN ('EN PROCESO','OK','ACTA') and proyecto.FECHA_CONFIRMACION BETWEEN '".$desde."' and '".$hasta."'";
}
else if($nombre != "")
{
$query_registro = "SELECT distinct proyecto.CODIGO_PROYECTO,proyecto.DEPARTAMENTO_CREDITO, proyecto.OBRA, proyecto.FECHA_INGRESO, proyecto.FECHA_CONFIRMACION, proyecto.MONTO FROM proyecto, cliente WHERE proyecto.RUT_CLIENTE = cliente.RUT_CLIENTE  and cliente.NOMBRE_CLIENTE = '".$nombre."' and proyecto.ESTADO IN ('EN PROCESO','OK','ACTA') and proyecto.FECHA_CONFIRMACION BETWEEN '".$desde."' and '".$hasta."'";	
}
echo "<tr> <td colspan='6'><h1>Listado de Rochas</td></h1></tr>";

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$fila = 0;
$MONTO1 = 0;
$CONTADOR=0;
 while($row = mysql_fetch_array($result))
  {  
  	$CODIGO_PROYECTO= $row["CODIGO_PROYECTO"];
	$OBRA = $row["OBRA"];
	$FECHA_INGRESO = $row["FECHA_INGRESO"];
	$DEPARTAMENTO_CREDITO = $row["DEPARTAMENTO_CREDITO"];
	$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
	$MONTO = $row["MONTO"];
	$MONTO1 += $MONTO;  
	$CONTADOR++;
	if($numero == 0)
	{	
	echo"<tr>
	     <th>Rocha</th> 
	     <th>Obra</th>
	     <th>Linea</th> 
		 
		 <th>Fecha Ingreso</th>
		 <th>Fecha Confirmacion</th>
		 <th>Monto Neto</th>
	
	     </tr>
		 ";
 	$numero = 20;
    }

if($fila == 0)
{
  $color_fila = 'uno';
}
else
{
  $color_fila = 'dos';
  $fila = -1;
}
echo  "<tr class=".$color_fila."><td align='left'> <a href=editarProyecto.php?CODIGO_PROYECTO=" .urlencode($CODIGO_PROYECTO). ">".$CODIGO_PROYECTO."</a></td>";
echo  "<td align='left'>".$OBRA."</td>";
echo  "<td align='left'>".$DEPARTAMENTO_CREDITO."</td>";
echo  "<td align='center'>".$FECHA_INGRESO."</td>";
echo  "<td align='center'>".$FECHA_CONFIRMACION."</td>";
echo  "<td align='right'>".number_format($MONTO,0, ",", ".")."</td></tr>";
	$fila++;
	$numero--;
  }
  mysql_free_result($result);
/* Tabla 2 */
echo "<tr><th align='left'>".$CONTADOR."</th><th colspan='4'></th><th align='right'>".number_format($MONTO1,0, ",", ".")."</td></th>";


if($codigo != "")
{
$query_registro = "SELECT oc_producto.CODIGO_PRODUCTO,sum(oc_producto.CANTIDAD) as CANTIDAD,producto.UNIDAD_DE_MEDIDA,producto.DESCRIPCION
FROM orden_de_compra,producto,proyecto, cliente ,oc_producto
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO and proyecto.RUT_CLIENTE = cliente.RUT_CLIENTE  and cliente.RUT_CLIENTE = '".$codigo."' and proyecto.ESTADO IN ('EN PROCESO','OK','ACTA')  and proyecto.FECHA_CONFIRMACION BETWEEN '".$desde."' and '".$hasta."' and orden_de_compra.NOMBRE_PROVEEDOR IN('Muebles&Diseños','Sillas y Sillas S.A.','Actiu SA','Nowy Styl Sp','MUMA','DAUPHIN','Contatto S.A.','Cerantola Chile','VC Industrial','Bartibas y Martin SPA','Intermob S.A.','Indumac Ltda','Vialim','Soc. Com. Llanos y Sanchez Ltda','Muebles Lloy','Reyplast SPA','Espacio y equipamiento Ltda','Equimet','Procesa S.A.','Muebles Sur S.A.') GROUP BY oc_producto.CODIGO_PRODUCTO";
}
else if($nombre != "")
{
$query_registro = "SELECT oc_producto.CODIGO_PRODUCTO,sum(oc_producto.CANTIDAD) as CANTIDAD,producto.UNIDAD_DE_MEDIDA,producto.DESCRIPCION
FROM orden_de_compra,producto,proyecto, cliente ,oc_producto
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO and proyecto.RUT_CLIENTE = cliente.RUT_CLIENTE  and cliente.NOMBRE_CLIENTE = '".$nombre."' and proyecto.ESTADO IN ('EN PROCESO','OK','ACTA')  and proyecto.FECHA_CONFIRMACION BETWEEN '".$desde."' and '".$hasta."' and orden_de_compra.NOMBRE_PROVEEDOR IN('Muebles&Diseños','Sillas y Sillas S.A.','Actiu SA','Nowy Styl Sp','MUMA','DAUPHIN','Contatto S.A.','Cerantola Chile','VC Industrial','Bartibas y Martin SPA','Intermob S.A.','Indumac Ltda','Vialim','Soc. Com. Llanos y Sanchez Ltda','Muebles Lloy','Reyplast SPA','Espacio y equipamiento Ltda','Equimet','Procesa S.A.','Muebles Sur S.A.') GROUP BY oc_producto.CODIGO_PRODUCTO ORDER BY sum(oc_producto.CANTIDAD) DESC";
}

echo "<tr> <td colspan='6'><h1>Listado de producto</td></h1></tr>";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$fila = 0;
$CANTIDAD1=0;
$CONTADOR=0;
 while($row = mysql_fetch_array($result))
  {  

  	$CODIGO_PRODUCTO= $row["CODIGO_PRODUCTO"];
	$CANTIDAD = $row["CANTIDAD"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
	$CANTIDAD1 += $CANTIDAD;  
	$CONTADOR++;

	if($numero == 0)
	{	
	echo"
	     <tr>
	     <th>Codigo</th> 
		 <th colspan='3'>Descripcion</th>
		 <th>Cantidad</th>
		 <th>Unidad de medida</th>
	     </tr>
		 ";
 	$numero = 20;
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
echo  "<tr class=".$color_fila."><td align='left'><a href=Producto.php?&buscar_codigo=" .urlencode($CODIGO_PRODUCTO). "&buscar_usuario=&familias=&buscar=Buscar&valor=0>".$CODIGO_PRODUCTO."</a></td>";
echo  "<td colspan='3' align='left'>".$DESCRIPCION."</td>";
echo  "<td align='right'>".number_format($CANTIDAD,0, ",", ".")."</td>";
echo  "<td align='center'>".$UNIDAD_DE_MEDIDA."</td></tr>";
	$fila++;
	$numero--;
  }
    mysql_free_result($result);


if($codigo != "")
{
$query_registro1 = "SELECT producto_vale_emision.CODIGO_PRODUCTO,sum(distinct producto_vale_emision.CANTIDAD_SOLICITADA) as CANTIDAD,producto.UNIDAD_DE_MEDIDA,producto.DESCRIPCION
FROM vale_emision,producto,proyecto, cliente ,producto_vale_emision
WHERE vale_emision.COD_VALE = producto_vale_emision.CODIGO_VALE and producto.CODIGO_PRODUCTO = producto_vale_emision.CODIGO_PRODUCTO AND vale_emision.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and proyecto.RUT_CLIENTE = cliente.RUT_CLIENTE  and cliente.RUT_CLIENTE = '".$codigo."' and proyecto.ESTADO IN ('EN PROCESO','OK','ACTA')  and proyecto.FECHA_CONFIRMACION BETWEEN '".$desde."' and '".$hasta."' and vale_emision.DEPARTAMENTO IN('SILLAS') GROUP BY producto_vale_emision.CODIGO_PRODUCTO ORDER BY sum(producto_vale_emision.CANTIDAD_SOLICITADA) DESC";
}
else if($nombre != "")
{
$query_registro1 = "SELECT producto_vale_emision.CODIGO_PRODUCTO,sum(distinct producto_vale_emision.CANTIDAD_SOLICITADA) as CANTIDAD,producto.UNIDAD_DE_MEDIDA,producto.DESCRIPCION
FROM vale_emision,producto,proyecto, cliente ,producto_vale_emision
WHERE vale_emision.COD_VALE = producto_vale_emision.CODIGO_VALE and producto.CODIGO_PRODUCTO = producto_vale_emision.CODIGO_PRODUCTO AND vale_emision.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and proyecto.RUT_CLIENTE = cliente.RUT_CLIENTE  and cliente.NOMBRE_CLIENTE = '".$nombre."' and proyecto.ESTADO IN ('EN PROCESO','OK','ACTA')  and proyecto.FECHA_CONFIRMACION BETWEEN '".$desde."' and '".$hasta."' and vale_emision.DEPARTAMENTO IN('SILLAS') GROUP BY producto_vale_emision.CODIGO_PRODUCTO ORDER BY sum(producto_vale_emision.CANTIDAD_SOLICITADA) DESC";
}


$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
$numero = 0;
$fila = 0;
 while($row = mysql_fetch_array($result1))
  {  

  	$CODIGO_PRODUCTO= $row["CODIGO_PRODUCTO"];
	$CANTIDAD = $row["CANTIDAD"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
	$CANTIDAD1 += $CANTIDAD;  
	$CONTADOR++;

	if($numero == 0)
	{	
	echo"
	     <tr>
	     <th>Codigo</th> 
		 <th colspan='3'>Descripcion</th>
		 <th>Cantidad</th>
		 <th>Unidad de medida</th>
	     </tr>
		 ";
 	$numero = 20;
    }

if($fila == 0)
{
  $color_fila = 'cinco';
}
else
{
  $color_fila = 'seis';
  $fila = -1;
}
echo  "<tr class=".$color_fila."><td align='left'><a href=Producto.php?&buscar_codigo=" .urlencode($CODIGO_PRODUCTO). "&buscar_usuario=&familias=&buscar=Buscar&valor=0>".$CODIGO_PRODUCTO."</a></td>";
echo  "<td colspan='3' align='left'>".$DESCRIPCION."</td>";
echo  "<td align='right'>".number_format($CANTIDAD,0, ",", ".")."</td>";
echo  "<td align='center'>".$UNIDAD_DE_MEDIDA."</td></tr>";
	$fila++;
	$numero--;
  }

mysql_free_result($result1);





  echo "<tr><th align='left'>".$CONTADOR."</th><th colspan='3'></th><th align='right'>".number_format($CANTIDAD1,0, ",", ".")."</td></th></th><th></th>";
  


  }
}

?>
</table>
<div>



</body>
</html>
