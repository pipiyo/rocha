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
<title> Mantenedor Sub Categoria V1.0.0</title>
<meta name="description" content="mantenedor linea" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link rel="shortcut icon" href="Imagenes/rocha.png">
<link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
<link rel="stylesheet" type="text/css" href="Style/style_mantenedores.css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/tinybox.js"></script>
<script src='js/Bloqueo.php'></script>
<script src='js/breadcrumbs.php'></script>
<link rel="styleSheet" href="style/bread.css" type="text/css" >

</head>

<body>
<div id='bread'><div id="menu1"></div></div>
<form action="" method="GET">
<div class='contenedor'>
<h1 class='h-linea'> Mantenedor Sub Categoria </h1>
<input type='text' name='codigoc' class='textbox1 form' placeholder="Codigo">

<select  name="nombres" class='textbox1 form' >
<option value="sub">Sub Categoria</option>
<?php 
$query_registro = 
"select * from sub_categoria ORDER BY DESCRIPCION ASC";
$result2 = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
{
?>
<option value = "<?php echo ($row['DESCRIPCION']); ?>" > <?php echo ($row['DESCRIPCION']); ?> </option>
<?php 
} mysql_free_result($result2);
?> 
</select>

<select  name="nombrec" class='textbox1 form' >
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
<input type='submit' value='buscar' name='buscarc' class='textbox_boton1 form1'>


<a alt='imagenes' href='ingreso-sub-categoria.php'>
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
$sub= $_GET["nombres"];
$cat = $_GET["nombrec"];
$query_registro = "select categoria.DESCRIPCION AS DESCRIPCION1,sub_categoria.CODIGO,sub_categoria.DESCRIPCION AS DESCRIPCION2 FROM sub_categoria, categoria where categoria.CODIGO = sub_categoria.CODIGO_CATEGORIA";

if($codigo != "")
{
$query_registro .= " and sub_categoria.CODIGO = '".$codigo."'";	
}

if($sub != "sub")
{
$query_registro .= "  and sub_categoria.DESCRIPCION = '".$sub."'";	
}

if($cat != "categoria")
{
$query_registro .= "  and categoria.DESCRIPCION = '".$cat."'";	
}
}
else
{
$query_registro = "select categoria.DESCRIPCION AS DESCRIPCION1,sub_categoria.CODIGO,sub_categoria.DESCRIPCION AS DESCRIPCION2 FROM sub_categoria, categoria where categoria.CODIGO = sub_categoria.CODIGO_CATEGORIA";	
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$fila = 0;
 while($row = mysql_fetch_array($result))
  {  
  	$COD = $row["CODIGO"];
	$DESCRIPCION1 = $row["DESCRIPCION1"];
	$DESCRIPCION2 = $row["DESCRIPCION2"];
	if($numero == 0)
	{	
	echo"<tr>
	     <th>N°</th> 
		 <th>SUB-CATEGORIA</th>
		 <th>CATEGORIA</th>
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
echo  "<tr class=".$color_fila."><td align='center'><a href='descripcion-sub-categoria.php?CODIGO=".$COD."'>".$COD."</a></td>";
echo  "<td align='center'>".$DESCRIPCION2."</td>";
echo  "<td align='center'>".$DESCRIPCION1."</td></tr>";
	$fila++;
	$numero--;
  }
?>
</table>
<div>






</body>
</html>
