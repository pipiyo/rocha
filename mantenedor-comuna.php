<?php require_once('Conexion/Conexion.php'); ?>
<?php 
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title> Mantenedor Comuna V1.0.0</title>
<meta name="description" content="mantenedor linea" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link rel="shortcut icon" href="Imagenes/rocha.png">
<link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
<link rel="stylesheet" type="text/css" href="Style/style_mantenedores.css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
<script type="text/javascript" src="js/tinybox.js"></script>
<script src='js/Bloqueo.php'></script>
<script src='js/breadcrumbs.php'></script>
<link rel="styleSheet" href="style/bread.css" type="text/css" >

</head>

<body>
<div id='bread'><div id="menu1"></div></div>
<form action="" method="GET">
<div class='contenedor'>
<h1 class='h-linea'> Mantenedor Comuna </h1>
<input type='text' name='codigoc' class='textbox1 form' placeholder="Codigo">

<select  name="nombrec" class='textbox1 form' >
<option>Comuna</option>
<?php 
$query_registro = 
"select * from comunas ORDER BY NOMBRE_COMUNA ASC";
$result2 = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
{
?>
<option value = "<?php echo ($row['NOMBRE_COMUNA']); ?>" > <?php echo ($row['NOMBRE_COMUNA']); ?> </option>
<?php 
} mysql_free_result($result2);
?> 
</select>

<select  name="regionc" class='textbox1 form' >
<option>Provincia</option>
<?php 
$query_registro = 
"select * from regiones ORDER BY regiones ASC";
$result2 = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
{
?>
<option value = "<?php echo ($row['REGIONES']); ?>" > <?php echo ($row['REGIONES']); ?> </option>
<?php 
} mysql_free_result($result2);
?> 
</select>

<select  name="region1c" class='textbox1 form' >
<option>Region</option>
<?php 
$query_registro = 
"select * from region_1 ORDER BY NOMBRE ASC";
$result2 = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
{
?>
<option value = "<?php echo ($row['NOMBRE']); ?>" > <?php echo ($row['NOMBRE']); ?> </option>
<?php 
} mysql_free_result($result2);
?> 
</select>
<input type='submit' value='buscar' name='buscarc' class='textbox_boton1 form1'>


<a alt='imagenes' href='ingreso-comuna.php'>
<img src="Imagenes/nuevo.png"  alt="Exportar a Excel" class='form nuevo'>
</a>

</div>
</form>	


<!-- TABLA LINEA -->
<div class='section'>
<table class='tabla-comuna' rules='all' border='1'>
<?php
if (isset($_GET["buscarc"]))
{
$codigo = $_GET["codigoc"];
$comuna = $_GET["nombrec"];
$provincia = $_GET["regionc"];
$region = $_GET["region1c"];
$query_registro = "select comunas.NOMBRE_COMUNA,comunas.CODIGO_COMUNA,regiones.REGIONES FROM comunas,regiones,region_1 where comunas.CODIGO_REGIONES = regiones.CODIGO_REGIONES  AND comunas.CODIGO_REGION1 = region_1.CODIGO " ;

if($codigo != "")
{
$query_registro .= " and comunas.CODIGO_COMUNA = '".$codigo."'";	
}

if($comuna != "Comuna")
{
$query_registro .= "  and comunas.NOMBRE_COMUNA = '".$comuna."'";	
}

if($provincia != "Provincia")
{
$query_registro .= "  and regiones.REGIONES = '".$provincia."'";	
}
if($region != "Region")
{
$query_registro .= "  and region_1.NOMBRE = '".$region."'";	
}

}
else
{
$query_registro = "select comunas.NOMBRE_COMUNA,comunas.CODIGO_COMUNA,regiones.REGIONES FROM comunas,regiones,region_1 where comunas.CODIGO_REGIONES = regiones.CODIGO_REGIONES AND comunas.CODIGO_REGION1 = region_1.CODIGO";	
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$fila = 0;
 while($row = mysql_fetch_array($result))
  {  
  	$NOMBRE_COMUNA = $row["NOMBRE_COMUNA"];
	$CODIGO_COMUNA = $row["CODIGO_COMUNA"];
	$REGIONES = $row["REGIONES"];
	if($numero == 0)
	{	
	echo"<tr>
	     <th>N°</th> 
		 <th>Comuna</th>
		 <th>Provincia</th>
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
echo  "<tr class=".$color_fila."><td align='center'><a href='descripcion-comuna.php?CODIGO_COMUNA=".$CODIGO_COMUNA."'>".$CODIGO_COMUNA."</a></td>";
echo  "<td align='center'>".$NOMBRE_COMUNA."</td>";
echo  "<td align='center'>".$REGIONES."</td></tr>";
	$fila++;
	$numero--;
  }
?>
</table>
<div>






</body>
</html>
