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


$RECLAMOS = $_POST["cod_rcla"];
$AREA_RECL = $_POST["area"];
$AREA_RECL1 =  $_POST["area1"];
$AREA_RECL2 = $_POST["area2"];
$RAZON_RECL =  $_POST["razon"];

mysql_select_db($database_conn, $conn);
$sql = "UPDATE reclamos SET AREA = '".($AREA_RECL). "',AREA1 = '".($AREA_RECL1). "',AREA2 = '".($AREA_RECL2). "',RAZON = '".($RAZON_RECL). "' WHERE CODIGO_RECLAMO = '".($RECLAMOS )."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

	echo '<script language = javascript>
	alert("Modificado")
	self.location = "InformeProyectoReclamos.php?ESTADO=EN PROCESO"
	</script>';
?>