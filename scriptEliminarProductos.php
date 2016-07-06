<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
$CODIGO1 = $_GET['txt_EliminarCodigoMateriales'];	
$query_registro = "SELECT * FROM producto WHERE CODIGO_PRODUCTO ='".$CODIGO1."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$CODIGO_PRODUCTO1 = $row["CODIGO_PRODUCTO"];
	$numero++;
  }
mysql_free_result($result1);
  
if($numero != 0)
{
mysql_select_db($database_conn, $conn);	
$CODIGO1 = $_GET['txt_EliminarCodigoMateriales'];	
$sql = "DELETE FROM producto WHERE CODIGO_PRODUCTO ='".$CODIGO1."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
header("Location: Producto.php");
}
else
{
echo '<script language = javascript>
alert("El codigo que ingreso no existe")
self.location = "Producto.php"
</script>';
}



?>