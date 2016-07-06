<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
$RUT = $_GET['txt_rut'];	
$query_registro = "SELECT * FROM proveedor WHERE RUT_PROVEEDOR ='".$RUT."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());


 while($row = mysql_fetch_array($result1))
  {
	$ACTIVO = $row["ACTIVO"];
	
  }
mysql_free_result($result1);
  
  
  
  
if($ACTIVO == "NO")
{
	
mysql_select_db($database_conn, $conn);	
$sql = "UPDATE proveedor SET ACTIVO = 'SI' WHERE RUT_PROVEEDOR ='".$RUT."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
header("Location: Proveedores.php");

}
else
{
	

mysql_select_db($database_conn, $conn);	
$sql = "UPDATE proveedor SET ACTIVO = 'NO' WHERE RUT_PROVEEDOR ='".$RUT."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
header("Location: Proveedores.php");


}



?>