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

$CODIGO_OC= $_GET['codigo_va'];	
$ESTADO = $_GET['enviado'];
mysql_select_db($database_conn, $conn);
$sql = "UPDATE vale_emision SET ESTADO = '".($ESTADO). "' WHERE COD_VALE = '".($CODIGO_OC)."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

	echo '<script language = javascript>
	alert("Enviado")
	self.location = "ListadoValeEmision.php"
	</script>';
?>