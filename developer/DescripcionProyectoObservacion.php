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




mysql_select_db($database_conn, $conn);


$CODIGO_PROYECTO = $_GET['CODIGO_PROYECTO'];
$CODIGO_OBSERVACION = $_GET['CODIGO_OBSERVACION'];

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT actualizaciones.CODIGO_ACTUALIZACIONES,actualizaciones.NOMBRE_USUARIO,actualizaciones.OBSERVACIONES, actualizaciones.FECHA,actualizaciones.USUARIO, actualizaciones.RAZON, actualizaciones.AREA FROM actualizaciones_general, 
actualizaciones,proyecto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_GENERAL = proyecto.CODIGO_PROYECTO and proyecto.CODIGO_PROYECTO = '".($CODIGO_PROYECTO)."' and not UBICACION = 'PROYECTO' and actualizaciones.CODIGO_ACTUALIZACIONES ='".$CODIGO_OBSERVACION."'  ORDER BY ACTUALIZACIONES.CODIGO_ACTUALIZACIONES DESC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	$OBSERVACIONES_A = $row["OBSERVACIONES"];
	$FECHA_A = $row["FECHA"];
	$NOMBRE_A = $row["NOMBRE_USUARIO"];
	$AREA = $row["AREA"];
	$RAZON = $row["RAZON"];
	$CODIGO_ACTUALIZACIONES = $row["CODIGO_ACTUALIZACIONES"];
  }
  mysql_free_result($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title> Descripcion Observacion V1.0.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script src="jquery.bpopup-x.x.x.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
   <link rel="shortcut icon" href="Imagenes/rocha.png">

</head>

<body id='body_descripcionServicio'>

<div id='container_descripcionServicio'>
<center>
<div id = 'header_descripcionServicio'>
<h1 id='title_descripcionServicio'>Modificar Observaciones</h1>
</div>
</center>





<div id = 'contenido_descripcionServicio'>

<a id='volverDescripcionserv'  onclick="history.back()" >
<img src="Imagenes/back22.png" style = "border:0px;" alt="Excel"></a>


<form  method="GET" action="scriptActualizarObservacionProyecto.php"/>
<center>
<table id ='formulario_descripcionServicio'>

<tr>
<td width="100">Codigo</td>
<td width="300" align="center"><input class= 'grupo_input_descripcionServicio' type="text" name = "txt_codigo" value="<?php echo $CODIGO_ACTUALIZACIONES ?>">
<input style=" display:none" class= 'grupo_input_descripcionServicio' type="text" name = "txt_codigo_proyecto" value="<?php echo $CODIGO_PROYECTO ?>"><br></td>
</tr>

<tr>
<td >Observación</td>
<td align="center"><textarea rows="5" cols="17" class= 'grupo_input_descripcionServicio' name="txt_observacion"><?php echo $OBSERVACIONES_A ; ?></textarea> <br></td>
</tr>



<tr>
<td width="100">Nombre</td>
<td width="300" align="center"><input readonly="readonly" class= 'grupo_input_descripcionServicio' type="text" name = "txt_nombre" value="<?php echo $NOMBRE_A ?>"><br></td>
</tr>

<tr>
<td >Nombre:</td>
<td align="center"><input readonly="readonly" class= 'grupo_input_descripcionServicio' type="text" id = 'txt_fecha' name = "txt_fecha"  value="<?php echo $FECHA_A; ?>"> <br></td>
</tr>



<tr>
<td >Area:</td>
<td align="center"><select class= 'grupo_input_descripcionServicio' id = "txt_area" name = "txt_area">
  <option><?php echo $AREA; ?></option>
  <option>CLIENTE</option>
  <option>COMERCIAL</option>
  <option>DAM</option>
  <option>PROVEEDOR</option>
  <option>IMPORTACION</option>
  <option>ADQUISICIONES</option>
  <option>DESPACHO</option>
  <option>INSTALACION</option>
  <option>PRODUCCION</option>
  <option>SILLAS</option>
  <option>PLANIFICACION</option>
  <option></option>
  </select> 
</td>
</tr>


<tr>
<td ></td>
<td align="center">
<input class= 'input_buttobdescripcionServicio'  type="submit"  value="Modificar"/> 
</td>
</tr>

</table>
</form>
</div>
</body>
</html>
