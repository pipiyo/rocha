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


if(isset($_POST["ano"]))
{
	$ano=$_POST["ano"];
}
else
{
	$ano='2014';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title> Historico Entrega BPT V1.0.0</title>
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
<h1>Historico Entrega BPT </h1>
<table>
<tr>
<td> Desde </td>
<td><select name = 'ano' /><option>2014 </option><option> 2013 </option></select></td>
<td><input type="submit" name = 'boton' /></td>
</tr>
<tr>
<td>
<a href="ExcelInformeHistoricoProduccion.php?ano=<?php echo $ano;?>" target="_blank"><img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></a>
</table>
</form>
<br />
<table id ="tabla_unidades_produccion" rules="all" frame="box" width="100%">
<tr>
<th width="100" align="center">Codigo</th>
<th width="100" align="center">Enero</th>
<th width="100" align="center">Feberero</th>
<th  width="100" align="center">Marzo</th>
<th width="100" align="center">Abril</th>
<th width="100" align="center">Mayo</th>
<th  width="100" align="center">Junio</th>
<th width="100" align="center">Julio</th>
<th width="100" align="center">Agosto</th>
<th width="100" align="center">Septiembre</th>
<th  width="100" align="center">Octubre</th>
<th width="100" align="center">Noviembre</th>
<th width="100" align="center">Diciembre</th>
</tr>
<?php 
ini_set('max_execution_time', 500);
mysql_select_db($database_conn, $conn);
$ENERO=0;
$FEBRERO=0;
$MARZO=0;
$ABRIL=0;
$MAYO=0;
$JUNIO=0;
$JULIO=0;
$AGOSTO=0;
$SEPTIEMBRE=0;
$OCTUBRE=0;
$NOVIEMBRE=0;
$DICIEMBRE=0;
$CATGORIA=0;
$MES=1;
$NOMMES=0;


if(isset($_POST["ano"]))
{
	$ano=$_POST["ano"];
}
else
{
	$ano='2014';
}



while($CATGORIA <= 7)  ///1
{
if($CATGORIA == 0)
{
	$NC = 'Mueble de Linea';
}
else if($CATGORIA == 1)
{
	$NC = 'Muebles Especiales';
}
else if($CATGORIA == 2)
{
	$NC = 'Cajoneras';
}
else if($CATGORIA == 3)
{
	$NC = 'Superficies Rectas';
}
else if($CATGORIA == 4)
{
	$NC = 'Superficies Curvas';
}
else if($CATGORIA == 5)
{
	$NC = 'Baldosas Laminadas';
}
else if($CATGORIA == 6)
{
	$NC = 'Baldosas Tapizadas';
}
else if($CATGORIA == 7)
{
	$NC = 'Otros';
}

$MES=1;
while($MES <= 12)//////2
{
$CATEGORIA1 =0;	
if($MES == 1)
{
	$NOMMES = $ano.'-01';
}
else if($MES == 2)
{
	$NOMMES = $ano.'-02';
}
else if($MES == 3)
{
	$NOMMES = $ano.'-03';
}
else if($MES == 4)
{
	$NOMMES = $ano.'-04';
}
else if($MES == 5)
{
	$NOMMES = $ano.'-05';
}
else if($MES == 6)
{
	$NOMMES = $ano.'-06';
}
else if($MES == 7)
{
	$NOMMES = $ano.'-07';
}
else if($MES == 8)
{
	$NOMMES = $ano.'-08';
}	
else if($MES == 9)
{
	$NOMMES = $ano.'-09';
}
else if($MES == 10)
{
	$NOMMES = $ano.'-10';
}
else if($MES == 11)
{
	$NOMMES = $ano.'-11';
}
else if($MES == 12)
{
	$NOMMES = $ano.'-12';
}		
	
if($NC == 'Otros')
{
$sql666 = "SELECT  distinct orden_de_compra.FECHA_CONFIRMACION, proyecto.NOMBRE_CLIENTE, actualizaciones.FECHA,oc_producto.ROCHA , orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO,
actualizaciones.CODIGO_ACTUALIZACIONES,actualizaciones.INGRESO as cant,producto.CATEGORIA
FROM orden_de_compra, proyecto, oc_producto , producto, oc_proveedor,actualizaciones,actualizaciones_general
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
AND oc_producto.CANTIDAD_RECIBIDA > '0' and oc_producto.CODIGO_PRODUCTO  = PRODUCTO.CODIGO_PRODUCTO  
AND orden_de_compra.FECHA_CONFIRMACION

AND oc_producto.CODIGO_PRODUCTO = actualizaciones_general.CODIGO_PRODUCTO AND
actualizaciones_general.CODIGO_ACTUALIZACIONES = actualizaciones.CODIGO_ACTUALIZACIONES AND actualizaciones.OC = orden_de_compra.CODIGO_OC AND 
actualizaciones.FECHA LIKE '%".$NOMMES."%' AND not PRODUCTO.CATEGORIA = 'Mueble de Linea' AND not PRODUCTO.CATEGORIA = 'Muebles Especiales' AND not PRODUCTO.CATEGORIA = 'Cajoneras' AND not PRODUCTO.CATEGORIA = 'Superficies Rectas'  AND not PRODUCTO.CATEGORIA = 'Superficies Curvas' AND not PRODUCTO.CATEGORIA = 'Baldosas Laminadas' AND not PRODUCTO.CATEGORIA = 'Baldosas Tapizadas' and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' ";
$result666 = mysql_query($sql666, $conn) or die(mysql_error());
}
else
{
$sql666 = "SELECT  distinct orden_de_compra.FECHA_CONFIRMACION, proyecto.NOMBRE_CLIENTE, actualizaciones.FECHA,oc_producto.ROCHA , orden_de_compra.CODIGO_OC, orden_de_compra.ESTADO,
actualizaciones.CODIGO_ACTUALIZACIONES,actualizaciones.INGRESO as cant,producto.CATEGORIA
FROM orden_de_compra, proyecto, oc_producto , producto ,oc_proveedor,actualizaciones,actualizaciones_general
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
AND oc_producto.CANTIDAD_RECIBIDA > '0' and oc_producto.CODIGO_PRODUCTO  = PRODUCTO.CODIGO_PRODUCTO  
AND orden_de_compra.FECHA_CONFIRMACION

AND oc_producto.CODIGO_PRODUCTO = actualizaciones_general.CODIGO_PRODUCTO AND
actualizaciones_general.CODIGO_ACTUALIZACIONES = actualizaciones.CODIGO_ACTUALIZACIONES AND actualizaciones.OC = orden_de_compra.CODIGO_OC AND 
actualizaciones.FECHA LIKE '%".$NOMMES."%' AND PRODUCTO.CATEGORIA = '".$NC."' and orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80'";
$result666 = mysql_query($sql666, $conn) or die(mysql_error());
}
while($row = mysql_fetch_array($result666))////3
{
    $CATEGORIA1+=$row["cant"];
	
	
if($MES == 1)
{
	$ENERO+=$row['cant'];
}
else if($MES == 2)
{
$FEBRERO+=$row['cant'];
}
else if($MES == 3)
{
$MARZO+=$row['cant'];	
}
else if($MES == 4)
{
$ABRIL+=$row['cant'];
}
else if($MES == 5)
{
$MAYO+=$row['cant'];	
}
else if($MES == 6)
{
$JUNIO+=$row['cant'];
}
else if($MES == 7)
{
$JULIO+=$row['cant'];
}
else if($MES == 8)
{
$AGOSTO+=$row['cant'];	
}
else if($MES == 9)
{
$SEPTIEMBRE+=$row['cant'];		
}
else if($MES == 10)
{
$OCTUBRE+=$row['cant'];
}
else if($MES == 11)
{
$NOVIEMBRE+=$row['cant'];
}
else if($MES == 12)
{
	$DICIEMBRE+=$row['cant'];
}
	
	
	
}

if($CATGORIA == 0 && $MES == 1)
{
echo "<tr><td align='center'>Muebles de Linea</td>";	
}
else if($CATGORIA == 1 && $MES == 1)
{
echo "<tr><td align='center'>Muebles Especiales</td>";	
}
else if($CATGORIA == 2 && $MES == 1)
{
echo "<tr><td align='center'>Cajoneras</td>";	
}
else if($CATGORIA == 3 && $MES == 1)
{
echo "<tr><td align='center'>Superficies Rectas</td>";	
}
else if($CATGORIA == 4 && $MES == 1)
{
echo "<tr><td align='center'>Superficies Curvas</td>";	
}
else if($CATGORIA == 5 && $MES == 1)
{
echo "<tr><td align='center'>Baldosas Laminadas</td>";	
}
else if($CATGORIA == 6 && $MES == 1)
{
echo "<tr><td align='center'>Baldosas Tapizadas</td>";	
}
else if($CATGORIA == 7 && $MES == 1)
{
echo "<tr><td align='center'>Otros</td>";	
}


echo "<td align='center'>".$CATEGORIA1."</td>";
	

///3
$MES++;
}///2
$CATGORIA++;
}///1

echo "<tr><td align='center'>Total</td>";	
echo "<td align='center'>".$ENERO."</td>";	
echo "<td align='center'>".$FEBRERO."</td>";
echo "<td align='center'>".$MARZO."</td>";
echo "<td align='center'>".$ABRIL."</td>";
echo "<td align='center'>".$MAYO."</td>";
echo "<td align='center'>".$JUNIO."</td>";
echo "<td align='center'>".$JULIO."</td>";
echo "<td align='center'>".$AGOSTO."</td>";
echo "<td align='center'>".$SEPTIEMBRE."</td>";

echo "<td align='center'>".$OCTUBRE."</td>";
echo "<td align='center'>".$NOVIEMBRE."</td>";
echo "<td align='center'>".$DICIEMBRE."</td>";
?>
</table>


</center>
</body>

</html>
