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

$NOMBRE_USUARIO = $_SESSION['NOMBRE_USUARIO'];
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];	

$CODIGO_PRODUCTO = $_POST['dev-codigo'];
$CODIGO_OC = $_POST['dev-oc'];
$CANTIDAD = $_POST['dev-cantidad'];
$MOTIVO = $_POST['dev-motivo'];


$sql1 = "SELECT count(*) as total from oc_producto where CODIGO_OC = '".$CODIGO_OC ."' and CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO ."'";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$total = $row["total"];
  }
mysql_free_result($result2);
if($total > 0 && isset($_POST['btn-dev'])){
	$sql02="insert into oc_devolucion (codigo_oc, cantidad, motivo,fecha,codigo_producto,user) values ('".$CODIGO_OC ."','".$CANTIDAD."','".$MOTIVO."','".date('Y-m-d')."','".$CODIGO_PRODUCTO."','".$NOMBRE_USUARIO."')";

	$result02 = mysql_query($sql02, $conn) or die(mysql_error());

	echo '<script language = javascript>
	alert("Producto Registrado")
	self.location = "RecibirOC.php?CODIGO_OC='.$CODIGO_OC.'"
	</script>';
}else{
	echo '<script language = javascript>
	alert("Codigo mal ingresado")
	self.location = "RecibirOC.php?CODIGO_OC='.$CODIGO_OC.'"
	</script>';
}
?>