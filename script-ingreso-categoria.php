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
$cat= $_POST['categoria'];


$sql = "INSERT INTO categoria (DESCRIPCION) values ('".$cat."')";
$result = mysql_query($sql, $conn) or die(mysql_error());

echo '<script language = javascript>
javascript:history.go(-2)
</script>';



?>