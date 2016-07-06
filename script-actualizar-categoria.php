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
$DESCRIPCION = $_POST['descripcion'];
$CODIGO = $_POST['codigo'];

$sqlA = "SELECT * FROM linea where CODIGO_LINEA = '".$CODIGO."'";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultA))
  {
	$LIMNOM = $row["NOMBRE_LINEA"];
  }
mysql_free_result($resultA);

$sql = "UPDATE categoria SET DESCRIPCION = '".$DESCRIPCION."' WHERE CODIGO = '".$CODIGO."' ";
$result = mysql_query($sql, $conn) or die(mysql_error());

echo '<script language = javascript>
self.location = "mantenedor-categoria.php"
</script>';



?>