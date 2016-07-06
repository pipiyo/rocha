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

$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];




$contador = $_GET["contador"];
$FECHA= date("Y-m-d");                     
mysql_select_db($database_conn, $conn);
   
		                             
$sql = "INSERT INTO ruta(ESTADO,FECHA) VALUES ('EN PROCESO','".$FECHA."')";
$result = mysql_query($sql, $conn) or die(mysql_error());




///////////////////////////////////////////////////////////////////////////////////
$sqlA = "SELECT * FROM ruta ORDER BY CODIGO_RUTA DESC LIMIT 1";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultA))
  {
	$CODIGO_R = $row["CODIGO_RUTA"];
  }
mysql_free_result($resultA);
///////////////////////////////////////////////////////////////////////////////////


$contador1 = 1;
while ($contador1 <= $contador )
{
if (isset($_GET["a".$contador1]))
{
$CODIGO_SERVICIO= $_GET['a'.$contador1];

$sql01="INSERT INTO servicio_ruta(CODIGO_RUTA,CODIGO_SERVICIO) VALUES('".$CODIGO_R."','".$CODIGO_SERVICIO."')";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());

}
$contador1++;
}


echo '<script language = javascript>
alert("Hoja de ruta realizada")
self.location = "Ruta_entrega.php?CODIGO_RUTA='.$CODIGO_R.'"
</script>';

?>