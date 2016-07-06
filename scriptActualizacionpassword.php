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

$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];	
$PASS = $_GET['txt_password'];

$salt = substr(base64_encode(md5('30')), 0, 22);


$salt = strtr($salt, array('+' => '.')); 
 

$hash = crypt($PASS, '$2y$10$' . $salt);



mysql_select_db($database_conn, $conn);
$sql = "UPDATE usuario SET PASS = '".($hash). "' WHERE CODIGO_USUARIO = '".($CODIGO_USUARIO)."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

	echo '<script language = javascript>
	alert("Password fue modificado exitosamente :D")
	self.location = "home.php"
	</script>';

?>