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
$SUB= $_POST['subcategoria'];
$CATEGORIA = $_POST['categoria'];

$query_registro = "SELECT * FROM categoria WHERE DESCRIPCION ='".$CATEGORIA."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
	$CODIGO= $row["CODIGO"];
  }
mysql_free_result($result1);


$sql = "INSERT INTO sub_categoria (CODIGO_CATEGORIA,DESCRIPCION) values ('".$CODIGO."','".$SUB."')";
$result = mysql_query($sql, $conn) or die(mysql_error());

echo '<script language = javascript>
javascript:history.go(-2)
</script>';



?>