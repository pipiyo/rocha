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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <LINK REL=StyleSheet HREF="style/estilo.css" TYPE="text/css" MEDIA=screen>
<meta charset="utf-8">
<title>Registro OC</title>
 <link rel="shortcut icon" href="Imagenes/rocha.png">
</head>
<body>
<form action = 'scriptregistrooc.php' method='post' id='formulario'>
<div>

<h3><center>Registro de Cambios</center></h3>

<table  style="border: solid black 1px;" rules="all"  cellspacing=1 cellpadding=2 style="font-color:#FFF; font-size: 8pt"  width="100%">
<thead>
<tr bgcolor="#000000">
<th><center>Codigo OC</center></th>
<th><center>Codigo Usuario</center></th>
<th><center>Nombre Usuario</center></th>
<th><center>Fecha/Hora</center></th>
</tr>
</thead>
<?php
//listado de materiales
////////////////////////////////
$CODIGO_OC = $_GET['CODIGO_OC'];
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT OC_REGISTRO.codigo_usuario, OC_REGISTRO.nombre_usuario, NAP_OC_REGISTRO.codigo_oc, OC_REGISTRO.fecha
FROM oc_registro, nap_oc_registro, orden_de_compra
WHERE oc_registro.codigo = nap_oc_registro.codigo
AND NAP_OC_REGISTRO.codigo_oc = ORDEN_DE_COMPRA.codigo_oc
AND orden_de_compra.codigo_oc =  '".$CODIGO_OC."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {
	$CODIGO_OC = $row["codigo_oc"];
	$COD_USUARIO = $row["codigo_usuario"];
	$NOMBRE_USUARIO = $row["nombre_usuario"];
	$FECHA = $row["fecha"];	

echo "<tbody><tr class='fuente'><td><center> " . 
	 $CODIGO_OC . "</center></td>";
echo "<td><center>" . 
	    ($COD_USUARIO) . "</center></td>";
echo "<td><center>" . 
	    ($NOMBRE_USUARIO) . "</center></td>";	     
 echo "<td><center>" . $FECHA . "</center></td></tr></tbody>";
    }
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</div> <!--datagrid-->
</form>
</body>
</html>