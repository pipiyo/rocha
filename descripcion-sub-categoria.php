<?php require_once('Conexion/Conexion.php');  ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
mysql_select_db($database_conn, $conn);
$CODIGO = $_GET['CODIGO'];
$query_registro = "SELECT * FROM sub_categoria where CODIGO = '".$CODIGO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
	$SUBCATEG= $row["DESCRIPCION"];
	$CODIGO_CATEGORIA= $row["CODIGO_CATEGORIA"];
  }
mysql_free_result($result1);


$query_registro = "SELECT * FROM categoria WHERE codigo ='".$CODIGO_CATEGORIA."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
	$CATEG= $row["DESCRIPCION"];
  }
mysql_free_result($result1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Descripción Sub Categoria V1.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <meta http-equiv="X-UA-Compatible" content="IE=11" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_ingreso.css" />
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script type="text/javascript" src="js/tinybox.js"></script>
  <script src='js/Bloqueo.php'></script>
  <script src='js/breadcrumbs.php'></script>
   <link rel="styleSheet" href="style/bread.css" type="text/css" >
</head>
<body>
<div id='bread'><div id="menu1"></div></div>
<div class='contenedor'>
<form action="script-actualizar-sub-categoria.php" method="POST">
<div class='formulario'>
<div class='titulo'> <h1> Actualizar Sub Categoria </h1> </div> 
<div class='in1'><input value='<?php echo $SUBCATEG ?>' required type='text' name='sub' class='textbox' placeholder="Sub Categoria"> 
<input type='text' name='codigo' style='display:none;' value='<?php echo $CODIGO ?>'>
 </div> 
<div class='in1a'>

<select  name="categoria" required class='textbox' >
 <option><?php echo $CATEG ?></option>
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
</div> 
<div class='in2'><input type='submit' name='subir' class='textbox-boton' placeholder="Linea">  </div> 
</div>
</form>
</div>

</body>
</html>
