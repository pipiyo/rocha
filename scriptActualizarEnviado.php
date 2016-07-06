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

$CODIGO_OC= $_GET['codigo_oc'];	

if(isset($_GET['enviado']))
{
$ENVIADO = $_GET['enviado'];	
}

else
{
$ENVIADO = 0;
}
mysql_select_db($database_conn, $conn);
$sql = "UPDATE orden_de_compra SET ENVIADO = '".($ENVIADO). "' WHERE CODIGO_OC = '".($CODIGO_OC)."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

	echo '<script language = javascript>
	alert("Enviado")
	self.location = "DescripcionOC1.php?CODIGO_OC='.urlencode($CODIGO_OC).'"
	</script>';
?>