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
<title> Mantenedor Recetas V1.0.0</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />

<link rel="shortcut icon" href="Imagenes/rocha.png">
<link rel="stylesheet" type="text/css" href="Style/style_mantenedores.css" />
<link rel="styleSheet" href="style/bread.css" type="text/css">

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/tinybox.js"></script>
<script src='js/breadcrumbs.php'></script>
<script src='js/encabezado-fixed.js'></script>

</head>

<body>
<div class="contenedor1">	
<div id='bread'><div id="menu1"></div></div>
<form action="" method="GET">
<div class='contenedor'>
<h1 class='h-linea'> Mantenedor Recetas</h1>
<input type='text' name='codigo' class='textbox form' placeholder="Codigo">
<input type='text' name='descripcion' class='textbox form' placeholder="Descripción">

<input type='submit' value='buscar' name='buscar' class='textbox_botonr form1'>

</div>
</div>
</form>	


<!-- TABLA LINEA -->
<div class='section'>
<table class='tabla-receta fixed' rules='all' border='1'>
<?php
if (isset($_GET["buscar"]))
{
$codigo = $_GET["codigo"];
$descripcion = $_GET["descripcion"];
$query_registro = "SELECT DISTINCT(`CODIGO_GENERICO_PRODUCTO`), `DESCRIPCION_GENERICO_PRODUCTO`,`GROSOR` FROM `receta`";
if($codigo != "")
{
$query_registro .= " where CODIGO_GENERICO_PRODUCTO = '".$codigo."'";	
}
if($descripcion != "")
{
if($codigo != "")
{	
$query_registro .= " and DESCRIPCION_GENERICO_PRODUCTO = '".$descripcion."'";	
}
else
{
$query_registro .= " where DESCRIPCION_GENERICO_PRODUCTO  = '".$descripcion."'";		
}
}
}
else
{
$query_registro = "SELECT DISTINCT(`CODIGO_GENERICO_PRODUCTO`), `DESCRIPCION_GENERICO_PRODUCTO`,`GROSOR` FROM `receta`";	
}

$query_registro .= "ORDER BY CODIGO_GENERICO_PRODUCTO";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$correlativo = 0;
$fila = 0;
 while($row = mysql_fetch_array($result))
  {  
  	$NOMBRE = $row["DESCRIPCION_GENERICO_PRODUCTO"];
	$CODIGO = $row["CODIGO_GENERICO_PRODUCTO"];
	$GROSOR = $row["GROSOR"];
	if($numero == 0)
	{	
	echo"<thead><tr class='cheader'>
	     <th>Codigo</th> 
		 <th>Descripción</th>
	     </tr></thead>
		 ";
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

if($GROSOR != "")
{
echo  "<tr><td align='center'><a href='descripcion-recetas.php?CODIGO_G=".$CODIGO."&GROSOR=".$GROSOR."'>".$CODIGO ." (".$GROSOR.") </a></td>";
}
else
{
echo  "<tr><td align='center'><a href='descripcion-recetas.php?CODIGO_G=".$CODIGO."&GROSOR=".$GROSOR."'>".$CODIGO ."</a></td>";
}
echo  "<td align='center'>".$NOMBRE."</td></tr>";
	$fila++;
	$numero--;
  }
?>
</table>
</div>
</body>
</html>
