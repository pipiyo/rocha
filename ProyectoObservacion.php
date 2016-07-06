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


$CODIGO_PROYECTO = $_GET['CODIGO_PROYECTO'];




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
 <title>Listado Observacion V1.0.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
 <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_ListadoValeEmision.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src="js/jquery.ui.datepicker.js"></script>
 <script language = javascript> 
  
 
 </script>
</head>
<body>
<center>	
   
<h1 id= 'titulo_informes'> Observaciones </h1>




<table class='tabla_observachiones_rocha' border='1'  rules='all'  id="tabla_observachiones_rocha" name="tabla_observachiones_rocha">
<?php



mysql_select_db($database_conn, $conn);
$query_registro = "SELECT actualizaciones.CODIGO_ACTUALIZACIONES,actualizaciones.NOMBRE_USUARIO,actualizaciones.OBSERVACIONES, actualizaciones.FECHA,actualizaciones.USUARIO, actualizaciones.RAZON, actualizaciones.AREA FROM actualizaciones_general, 
actualizaciones,proyecto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_GENERAL = proyecto.CODIGO_PROYECTO and proyecto.CODIGO_PROYECTO = '".($CODIGO_PROYECTO)."' and not UBICACION = 'PROYECTO' ORDER BY ACTUALIZACIONES.CODIGO_ACTUALIZACIONES DESC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 20;
$fila = 1;


 while($row = mysql_fetch_array($result))
  {
	$OBSERVACIONES_A = $row["OBSERVACIONES"];
	$FECHA_A = $row["FECHA"];
	$NOMBRE_A = $row["NOMBRE_USUARIO"];
	$AREA = $row["AREA"];
	$RAZON = $row["RAZON"];
	$CODIGO_ACTUALIZACIONES = $row["CODIGO_ACTUALIZACIONES"];
	
	if($fila == 1)
  {
    $filatr = 'uno';
    $fila++;
  }
  else
  {
    $filatr = 'dos';
    $fila = 1;
  }
		
if($numero1 == 20)
{
echo"
<tr>
<th>Codigo</th>
<th>Observacion</th>
<th>Fecha</th>
<th>Nombre</th>
<th>Area</th>
<th>Eliminar</th>

</tr>";
$numero1 = 0;
  }
	 echo "<tr  class=".$filatr."><td align='center'><a href='DescripcionProyectoObservacion.php?CODIGO_OBSERVACION=".urlencode($CODIGO_ACTUALIZACIONES)."&CODIGO_PROYECTO=".urlencode($CODIGO_PROYECTO)."'>" .  $CODIGO_ACTUALIZACIONES . "</a> </td>";
   echo "<td>" .  $OBSERVACIONES_A . " </td>";
   echo "<td align='center'>" .  $FECHA_A . "</td>";
	 echo "<td align='center'>" . $NOMBRE_A. "</td>";
	 echo "<td align='center'>" . $AREA . "</td>";	
    echo "<td align='center'><a href='script-eliminar-proyecto-observacion.php?CODIGO_OBSERVACION=".urlencode($CODIGO_ACTUALIZACIONES)."&CODIGO_PROYECTO=".urlencode($CODIGO_PROYECTO)."'>X</a></td>"; 
   echo "</tr>"; 
  $numero++;
	$numero1++;
  }

	  
  mysql_free_result($result);
    mysql_close($conn);


?>
</table>
</center>


</body>
</html>
