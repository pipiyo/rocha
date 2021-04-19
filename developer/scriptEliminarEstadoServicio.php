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

$CODIGO_RUTA= $_GET['CODIGO_RUTA'];
$CODIGO_SERVICIO= $_GET['codigoServicio'];

$sql1="delete from  servicio_ruta where CODIGO_SERVICIO ='".$CODIGO_SERVICIO."'"; 
$result1 = mysql_query($sql1, $conn) or die(mysql_error());


echo '<script language = javascript>
alert("Eliminado")
self.location =  "Ruta_entrega.php?CODIGO_RUTA='.$CODIGO_RUTA.'";
</script>';
?>