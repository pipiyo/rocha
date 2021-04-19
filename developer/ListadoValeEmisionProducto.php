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
$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];
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


$CODIGO_PRODUCTO = $_GET['CODIGO_PRODUCTO'];
$STOCK=0;
$trans=0;

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT sum(oc_producto.CANTIDAD) as trans FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and orden_de_compra.ESTADO = 'EN PROCESO'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

while($row = mysql_fetch_array($result1))
{
	$trans = $row["trans"];

}

mysql_select_db($database_conn, $conn);

$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
	$STOCK = $row["STOCK_ACTUAL"];
  }
  
	$contable= $trans + $STOCK;

?>


<!DOCTYPE html>
<html>

<head>
 <title>Listado OC V1.0.0</title>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=9" />
 <link rel="stylesheet" type="text/css" href="Style/bodega.css" />
 <link rel="styleSheet" href="style/bread.css" type="text/css" >
 <link rel="shortcut icon" href="Imagenes/rocha.png">
 <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
 <script src="js/jquery.ui.datepicker.js"></script>
 <script src='js/Bloqueo.php'></script>
 <script src='js/breadcrumbs.php'></script>
</head>

<body>
<div id='bread'><div id="menu1"></div></div>	

<h1 class="h-oc-transito"> Vales Emitidos </h1>

<table class="table-form listado-vale-emision ">


<tr>
<th class="uno-v">Numero</th>
<th class="uno-v">Fecha</th>
<th class="uno-v">Departamento</th>
<th class="uno-v">Nombre usuario</th>
<th class="uno-v">Rocha</th>
<th class="uno-v">Cantidad Vale </th>
<th class="uno-v1">CODIGO OC - CANTIDAD OC </th>
<th class="uno-v">Diferencia</th>
<th class="uno-v">Estado</th>
</tr>
<tr>
<td align="right" class="listado-vale-destacado" colspan="7" align="center">STOCK CONTABLE </td>
<td align="center"class="listado-vale-destacado" colspan="1" align="center"> <?php echo $contable; ?> </td>
<td align="right" class="listado-vale-destacado" colspan="1" align="center"> </td>
</tr>

<?php

function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);
$TOTAL2=0;
$TOTAL3=0;
$TOTAL4=0;

mysql_select_db($database_conn, $conn);
$query_registro = "select DISTINCt COD_VALE,FECHA_TERMINO,DEPARTAMENTO,CODIGO_USUARIO,CODIGO_PROYECTO,CODIGO_PROYECTO,ESTADO  from vale_emision, producto, producto_vale_emision where vale_emision.COD_VALE =  producto_vale_emision.CODIGO_VALE AND producto_vale_emision.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO AND producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and estado = 'pendiente' ORDER BY CODIGO_PROYECTO";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 1;
while($row = mysql_fetch_array($result))
{
	$CODIGO_VALE= $row["COD_VALE"];
	$FECHA = $row["FECHA_TERMINO"];
	$DEPARTAMENTO = $row["DEPARTAMENTO"];
	$CODIGO_USUARIO1 = $row["CODIGO_USUARIO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$ESTADO = $row["ESTADO"];
	
$query_registro = "SELECT * FROM producto_vale_emision WHERE CODIGO_VALE = '".$CODIGO_VALE."' and CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

while($row = mysql_fetch_array($result1))
{
	$CANTIDAD_SOLICITADA = $row["CANTIDAD_SOLICITADA"];
	$TOTAL4+=$row['CANTIDAD_SOLICITADA'];
}		
	
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO1."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

while($row = mysql_fetch_array($result1))
{
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
}	
  
$query_registro = "SELECT oc_producto.CANTIDAD, orden_de_compra.CODIGO_OC FROM orden_de_compra,oc_producto WHERE orden_de_compra.CODIGO_OC  =  oc_producto.CODIGO_OC AND oc_producto.ROCHA = '".$CODIGO_PROYECTO."' and oc_producto.`CODIGO_PRODUCTO` = '".$CODIGO_PRODUCTO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$CANTIDAD_OC = '';
$CODIGO_OC ='';
$trd= '';
$trd1= '';
$TOTAL=0;
while($row = mysql_fetch_array($result1))
{
	$CANTIDAD_OC = $row["CANTIDAD"];
	$CODIGO_OC = $row["CODIGO_OC"];
    $TOTAL+=$row['CANTIDAD'];
	$trd.='<table style="width:100%;" ><tr><td align="left" >'.$CODIGO_OC.'</td><td align="left">'.number_format($CANTIDAD_OC, 0, ",", ".").'</td></tr></table>';
}		 
$trd1.='<table style="width:100%;" ><tr><td align="left"><b>TOTAL</b></td><td align="left"><b>'.$TOTAL.'</b></td></tr></table>';
$TOTAL1 = $CANTIDAD_SOLICITADA - $TOTAL;
$TOTAL2+=$TOTAL1 ;	
	  
if($numero1 == 20)
{
echo "<thead>
<tr>
<th>Numero</th>
<th>Fecha</th>
<th>Departamento</th>
<th>Nombre usuario</th>
<th>Rocha</th>
<th>Cantidad Vale </th>
<th>OC</th>
<th>Diferencia</th>
<th>Estado</th>
</thead>";
$numero1 = 0;
}
echo "<tbody><tr><td> <a href=Vale_entrega.php?CODIGO_VALE=" .$CODIGO_VALE. ">" .$CODIGO_VALE . "</a></td>";
if($ESTADO == "ENTREGADO")
{
	echo "<td id='azul' color:#fff;'>".substr($FECHA,0,11)."</td>";	
}
else
{	
	if(substr($FECHA,0,11) > $fecha7)
	{
	    echo "<td id='verde'>".substr($FECHA,0,11)."</td>";	
	}
	else if(substr($FECHA,0,11) < date('Y-m-d'))
	{
		echo "<td id='rojo'>".substr($FECHA,0,11)."</td>";				
	}
	else if(substr($FECHA,0,11) >= date('Y-m-d')  && substr($FECHA,0,11) <= $fecha7)
	{
		echo "<td id='amarillo'>".substr($FECHA,0,11)."</td>";			
	}
}
echo "<td>".$DEPARTAMENTO."</td>";
echo "<td>".$nombres." ".$apellido."</td>";
echo "<td>".$CODIGO_PROYECTO. "</td>";
echo "<td>".$CANTIDAD_SOLICITADA."</td>";	
echo "<td>".$trd. $trd1."</td>";	
echo "<td>".$TOTAL1."</td>";	
echo "<td>".$ESTADO. "</td></tr></tbody>"; 
$numero++;
$numero1++;
}

	   
mysql_free_result($result);
mysql_close($conn);
$TOTAL3= $contable - $TOTAL2;
?>
<tr>
<td colspan="5" class="listado-vale-destacado" align="right" align="center">Total </td>
<td class="listado-vale-destacado" align="center"align="center"> <?php echo $TOTAL4; ?> </td>
<td class="listado-vale-destacado" align="right" align="center">Total </td>
<td class="listado-vale-destacado" align="center"align="center"> <?php echo $TOTAL3; ?> </td>
<td class="listado-vale-destacado" align="center"> </td>
</tr>
</table>

</body>
</html>
