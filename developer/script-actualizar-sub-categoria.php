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
$SUB = $_POST['sub'];
$CATEGORIA= $_POST['categoria'];
$CODIGO = $_POST['codigo'];

$query_registro = "SELECT * FROM categoria WHERE DESCRIPCION ='".$CATEGORIA."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
	$CODIGO_CATEGORIA= $row["CODIGO"];
  }
mysql_free_result($result1);


$sql = "UPDATE sub_categoria SET DESCRIPCION = '".$SUB."',CODIGO_CATEGORIA = '".$CODIGO_CATEGORIA."' WHERE CODIGO = '".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

echo '<script language = javascript>
javascript:history.go(-2)
</script>';



?>