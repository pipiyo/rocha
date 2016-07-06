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
$CODIGO_COMUNA = $_GET['CODIGO_COMUNA'];
$query_registro = "SELECT * FROM comunas where CODIGO_COMUNA = '".$CODIGO_COMUNA."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
	$NOMBRE_COMUNA= $row["NOMBRE_COMUNA"];
	$CODIGO_REGIONES= $row["CODIGO_REGIONES"];
  $CODIGO_REGION1= $row["CODIGO_REGION1"];
  }
mysql_free_result($result1);


$query_registro = "SELECT * FROM regiones WHERE CODIGO_REGIONES ='".$CODIGO_REGIONES."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
	$REGIONES= $row["REGIONES"];
  }
mysql_free_result($result1);

$query_registro = "SELECT * FROM region_1 WHERE CODIGO ='".$CODIGO_REGION1."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
  $REGIONES1= $row["NOMBRE"];
  }
mysql_free_result($result1);
?>

<!DOCTYPE html">
<html>

<head>
  <title>Descripción Comuna V1.0.0</title>
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
<form action="script-actualizar-comuna.php" method="POST">
<div class='formulario'>
<div class='titulo'> <h1> Actualizar Comuna </h1> </div> 
<div class='in1'><input value='<?php echo $NOMBRE_COMUNA ?>' required type='text' name='comuna' class='textbox' placeholder="Comuna"> 
<input type='text' name='codigo' style='display:none;' value='<?php echo $CODIGO_COMUNA ?>'>
 </div> 
<div class='in1a'>

<select  name="provincia" required class='textbox' >
 <option><?php echo $REGIONES ?></option>
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

<select  name="region" class='textbox' >
<option><?php echo $REGIONES1; ?></option>
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

</div> 
<div class='in2'><input type='submit' name='subir' class='textbox-boton' placeholder="Linea">  </div> 
</div>
</form>
</div>

</body>
</html>
