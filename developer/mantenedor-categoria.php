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
<title> Mantenedor categoria V1.0.0</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link rel="shortcut icon" href="Imagenes/rocha.png">
<link rel="stylesheet" type="text/css" href="Style/style_mantenedores.css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/tinybox.js"></script>
<script src='js/breadcrumbs.php'></script>
<link rel="styleSheet" href="style/bread.css" type="text/css" >
</head>

<body>
<div id='bread'><div id="menu1"></div></div>
<form action="" method="GET">
<div class='contenedor'>
<h1 class='h-linea'> Mantenedor Categoria</h1>
<input type='text' name='codigol' class='textbox form' placeholder="Codigo">

<select  name="nombrel" class='textbox form' >
<option value="categoria">Categoria</option>
<?php 
$query_registro = 
"select * from categoria ORDER BY DESCRIPCION ASC";
$result2 = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
{
?>
<option value = "<?php echo ($row['DESCRIPCION']); ?>" > <?php echo ($row['DESCRIPCION']); ?> </option>
<?php 
} mysql_free_result($result2);
?> 
</select>
<input type='submit' value='buscar' name='buscarl' class='textbox_boton form1'>

<a alt='imagenes' href='ingreso-categoria.php'>
<img src="Imagenes/nuevo.png"  alt="Ingreso Producto" class='form1 nuevo'>
</a>

</div>
</form>	


<!-- TABLA LINEA -->
<div class='section'>
<table class='tabla-linea' rules='all' border='1'>
<?php
if (isset($_GET["buscarl"]))
{
$codigo = $_GET["codigol"];
$linea = $_GET["nombrel"];
$query_registro = "select * FROM categoria";
if($codigo != "")
{
$query_registro .= " where CODIGO = '".$codigo."'";	
}
if($linea != "categoria")
{
if($codigo != "")
{	
$query_registro .= " and DESCRIPCION = '".$linea."'";	
}
else
{
$query_registro .= " where DESCRIPCION  = '".$linea."'";		
}
}
}
else
{
$query_registro = "select * FROM categoria";	
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$fila = 0;
 while($row = mysql_fetch_array($result))
  {  
  	$NOMBRE = $row["DESCRIPCION"];
	$CODIGO = $row["CODIGO"];
	if($numero == 0)
	{	
	echo"<tr>
	     <th>N°</th> 
		 <th>Linea</th>
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
echo  "<tr class=".$color_fila."><td align='center'><a href='descripcion-categoria.php?CODIGO=".$CODIGO."'>".$CODIGO ."</a></td>";
echo  "<td align='center'>".$NOMBRE."</td></tr>";
	$fila++;
	$numero--;
  }
?>
</table>
<div>






</body>
</html>
