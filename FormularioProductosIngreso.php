<?php require_once('Conexion/Conexion.php');

session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

while($row = mysql_fetch_array($result1))
  {
	 $nombres = $row["nombres"];
	 $apellido = $row["apellido_paterno"];
	 $numero++;
  }
mysql_free_result($result1);

if (isset($_GET["ingresar"])) 
{
  $CODIGO_MATERIALES = $_GET["txt_codigoMateriales"]; 
  $MENSAJE = 'SI'; 
  echo '<script language = javascript>
	alert("Listo")
	window.close("FormularioProductosIngreso.php")
	</script>';
}
?>

<?php
$CODIGO_PRODUCTO = $_GET['CODIGO_PRODUCTO'];

if($MENSAJE = 'SI')
  {
    if (isset($_GET["ingresar"])) 
    {
      $STOCK_INGRESAR = $_GET['txt_cantidadDeProducto'];
      $STOCK_ACTUAL = $_GET['txt_stockActual'];
      $CODIGO = $_GET['txt_codigoMateriales'];
      $ROCHA = $_GET['txt_rocha'];

      $sql = "UPDATE PRODUCTO SET STOCK_ACTUAL = $STOCK_INGRESAR + $STOCK_ACTUAL  WHERE CODIGO_PRODUCTO ='".$CODIGO."'";
      $result = mysql_query($sql, $conn) or die(mysql_error());
      $FECHA = date('Y/m/d');
      $sql1 = "INSERT INTO actualizaciones (VALOR_ANTIGUO,INGRESO,FECHA,USUARIO,NOMBRE_USUARIO,ROCHA,OC) values ('".($STOCK_ACTUAL)."','".($STOCK_INGRESAR)."','".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','".($ROCHA)."','SIN OC')";
      $result1 = mysql_query($sql1, $conn) or die(mysql_error());

      $sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
      $result8 = mysql_query($sql8, $conn) or die(mysql_error());
      while($row = mysql_fetch_array($result8))
      {
	     $CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
      }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_PRODUCTO) values ('".$CODIGO_A."','".$CODIGO."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
  }
  else
  {
    $query_registro = "SELECT * FROM producto WHERE CODIGO_PRODUCTO ='".$CODIGO_PRODUCTO."'";
    $result = mysql_query($query_registro, $conn) or die(mysql_error());
    $numero = 0;
  while($row = mysql_fetch_array($result))
  {
	  $CODIGO_PRODUCTO1 = $row["CODIGO_PRODUCTO"];
	  $DESCRIPCION1 = ($row["DESCRIPCION"]);
	  $STOCK_ACTUAL1 = $row["STOCK_ACTUAL"];
	  $PRECIO1 = $row["PRECIO"];
	  $UNIDAD_DE_MEDIDA1 = $row["UNIDAD_DE_MEDIDA"];
	  $FORMATO1 = $row["FORMATO"];
	  $gestion1 = $row["GESTION"];
  }
  mysql_free_result($result);
  mysql_close($conn);
  }
}
?>

<head>

  <title>Producto Ingreso V1.0.0</title>

  <link rel="StyleSheet" href="Style/bodega.css" type="text/css">
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>

  <script src='js/Bloqueo.php'></script>
  <script src='js/breadcrumbs.php'></script>

  <link rel="styleSheet" href="style/bread.css" type="text/css" >

<script language = javascript>  
function reback()
{
window.close("FormularioProductosIngreso.php");
}
  
$(function(){
$('#txt_rocha').autocomplete({
  source : 'ajaxProyecto.php',
  select : 
	function(event, ui){ }
});
});  

function justNumbers(e)
{
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
  return true; 
  return /\d/.test(String.fromCharCode(keynum));
}
</script>
</head>

<body class="body-formulario-i-e">
<div id='bread'><div id="menu1"></div></div>


<div class="contenedor-formulario">
<div class="contenedor-formulario-tamano">
<form  method="GET"/>

<h1>Ingreso Productos</h1>


<table>
<tr>
<td>Codigo materiales:</td>
<td><input type="text" class="textbox" readonly name = "txt_codigoMateriales" value="<?php echo $CODIGO_PRODUCTO1; ?>"> <br></td>
</tr>

<tr>
<td>Stock actual:</td>
<td><input type="text" class="textbox" readonly name = "txt_stockActual" value="<?php echo $STOCK_ACTUAL1; ?>"> <br></td>
</tr>


<tr>
<td>Ingrese material:</td>
<td><input onKeyPress="return justNumbers(event);" class="textbox"  type="text" name = "txt_cantidadDeProducto" value=""> <br></td>
</tr>

<tr>
<td>ROCHA:</td>
<td><input type="text" class="textbox" name = "txt_rocha" id="txt_rocha" value=""> <br></td>
</tr>

<tr>
<td colspan="2"><input class="textbox-boton"  type="submit" id = "ingresar" name="ingresar" value="Ingresar"> <br></td>
</tr>
</table>

</form>
</div>
</div>
</body>
</html>	