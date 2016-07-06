<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
$RUT = $_GET['txt_rut'];

$query_registro = "SELECT * FROM cliente WHERE RUT_CLIENTE ='".$RUT."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());


 while($row = mysql_fetch_array($result1))
  {
	$ACTIVO = $row["ACTIVO"];
	
  }
mysql_free_result($result1);
  
if($ACTIVO == "NO")
{
	
	


	
	mysql_select_db($database_conn, $conn);	
$sql = "UPDATE cliente SET ACTIVO = 'SI' WHERE RUT_ClIENTE ='".$RUT."'";
$result = mysql_query($sql, $conn) or die(mysql_error());







echo '<script language = javascript>
alert("Cliente ACTIVADO correctamente")

  window.close("DescripcionCliente.php")
  </script>';
	





}
else 
{
	





mysql_select_db($database_conn, $conn);	
$sql = "UPDATE cliente SET ACTIVO = 'NO' WHERE RUT_ClIENTE ='".$RUT."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
header("Location: Cliente.php");








}



?>