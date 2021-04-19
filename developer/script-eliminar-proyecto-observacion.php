<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$CODIGO_OBSERVACION = $_GET['CODIGO_OBSERVACION'];
$CODIGO_PROYECTO = $_GET['CODIGO_PROYECTO'];

$sql1="delete from  actualizaciones where CODIGO_ACTUALIZACIONES ='".$CODIGO_OBSERVACION."'"; 
$result1 = mysql_query($sql1, $conn) or die(mysql_error());




echo '<script language = javascript>
alert("Eliminado")
self.location =  "ProyectoObservacion.php?CODIGO_PROYECTO='.urlencode($CODIGO_PROYECTO).'";
</script>';

?>