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
$COMUNA = $_POST['comuna'];
$PROVINCIA = $_POST['provincia'];
$REGION = $_POST['region'];
$CODIGO = $_POST['codigo'];

$query_registro = "SELECT * FROM regiones WHERE REGIONES ='".$PROVINCIA."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
	$CODIGO_REGIONES= $row["CODIGO_REGIONES"];
  }
mysql_free_result($result1);

$query_registro = "SELECT * FROM region_1 WHERE NOMBRE ='".$REGION."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
  $CODIGO1= $row["CODIGO"];
  }
mysql_free_result($result1);


$sql = "UPDATE comunas SET NOMBRE_COMUNA = '".$COMUNA."',CODIGO_REGIONES = '".$CODIGO_REGIONES."',CODIGO_REGION1 = '".$CODIGO1."' WHERE CODIGO_COMUNA = '".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

echo '<script language = javascript>
javascript:history.go(-2)
</script>';



?>