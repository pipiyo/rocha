<?php
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
mysql_select_db($database_conn, $conn);

mysql_select_db($database_conn, $conn);

$NOMBRE_USUARIO = $_SESSION['NOMBRE_USUARIO'];
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];	
	
$fecha = $_POST['fecha-vale'];
$vale = $_POST['codigo-f-vale'];
echo $fecha . " - " . $vale;
$sql="update vale_emision set FECHA_TERMINO = '".$fecha."' where COD_VALE = '".$vale."'";

$result02 = mysql_query($sql, $conn) or die(mysql_error());

echo '<script language = javascript>
	alert("Fecha modificada")
	self.location = "ListadoValeEmision.php"
	</script>';

?>