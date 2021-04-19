<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
$COD= $_GET['COD'];	
  
mysql_select_db($database_conn, $conn);	
$sql = "DELETE FROM horas_extras WHERE CODIGO_HORASE ='".$COD."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
header("Location: EmpleadosHorasExtras.php");




?>