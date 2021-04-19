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
$CODIGO_LINEA = $_GET['CODIGO_LINEA'];
mysql_select_db($database_conn, $conn);


$query_registro = "SELECT * FROM linea WHERE CODIGO_LINEA ='".$CODIGO_LINEA."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
	$NOMBRE_LINEA = $row["NOMBRE_LINEA"];
  }
  mysql_free_result($result1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Descripción Linea V1.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <meta http-equiv="X-UA-Compatible" content="IE=11" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_ingreso.css" />
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script type="text/javascript" src="js/tinybox.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
</head>
<body>
<div id='bread'><div id="menu1"></div></div>
<div class='contenedor'>
<form action="script-actualizar-linea.php" method="POST">
<div class='formulario'>
<div class='titulo'> <h1> Actualizar Linea </h1> </div> 
<div class='in1'><input required type='text' name='linea' value='<?php echo $NOMBRE_LINEA ?>' class='textbox' placeholder="Linea"> 
<input required type='text' name='codigo' style='display:none;' value='<?php echo $CODIGO_LINEA ?>' class='textbox' placeholder="Linea">
 </div> 
<div class='in2'><input type='submit' name='subir' class='textbox-boton' placeholder="Linea">  </div> 
</div>
</form>
</div>

</body>
</html>
