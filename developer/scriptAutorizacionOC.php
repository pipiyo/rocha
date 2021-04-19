<?php require_once('Conexion/Conexion.php'); ?>
<?php 

session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$NOMBRE_USUARIO = $_SESSION['NOMBRE_USUARIO'];

if (isset($_GET["ok"])) 
{
$ESTADO = $_GET['estados'];	
$COD_OC = $_GET['a'];	 
mysql_select_db($database_conn, $conn);             
$sql = "UPDATE orden_de_compra SET ESTADO = '".$ESTADO."', AUTORIZADA = '".$NOMBRE_USUARIO ."' WHERE CODIGO_OC = '".$COD_OC."'";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql6="UPDATE servicio set ESTADO = '".$ESTADO."' where CODIGO_OC ='".$COD_OC."' and nombre_servicio = 'OC'"; 
$result6 = mysql_query($sql6, $conn) or die(mysql_error());

header("Location: ListadoDeCompras.php");
}
?>