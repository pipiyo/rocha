<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

mysql_select_db($database_conn, $conn);
$CODIGO = $_GET['CODIGO_REQUERIMIENTO'];	
$ESTADO = $_GET['ESTADO'];	


$sql = "UPDATE requerimiento SET ESTADO = '".$ESTADO."' WHERE CODIGO_REQUERIMIENTO = '".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

$sql111 = "SELECT * from requerimiento WHERE CODIGO_REQUERIMIENTO = '".$CODIGO."' ";
$result111 = mysql_query($sql111, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result111))
  {

	$OBSERVACIONES = $row["OBSERVACIONES"];
	$DEPARTAMENTO = $row["DEPARTAMENTO"];
	$FECHA = $row["FECHA"];
	$ESTADO1 = $row["ESTADO"];
	$CODIGO_REQUERIMIENTO= $row["CODIGO_REQUERIMIENTO"];
  }

if($ESTADO == "APROBADO")
{
$sql = "INSERT INTO SERVICIO (NOMBRE_SERVICIO,DESCRIPCION,FECHA_INICIO,CODIGO_USUARIO,CODIGO_PROYECTO,ESTADO) VALUES ('Sistema','".$OBSERVACIONES."','".date("Y-m-d")."','1','Sistema-2015','EN PROCESO')";
$result = mysql_query($sql, $conn) or die(mysql_error());
}
header("Location: Requerimiento.php");

?>