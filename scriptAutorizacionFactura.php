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
$CODIGO_OC= $_GET['codigo_oc'];	
$sql3 = "SELECT * FROM orden_de_compra WHERE CODIGO_OC = '".$CODIGO_OC."'";
$result3 = mysql_query($sql3, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result3))
  {
	$FACTURAS = $row["FACTURAS"];
	$OBSERVACION_FACTURAS= $row["OBSERVACION_FACTURAS"];
  }


$CODIGO_OC= $_GET['codigo_oc'];	
$ENVIADO = $_GET['factu'];
mysql_select_db($database_conn, $conn);
$sql = "UPDATE orden_de_compra SET FACTURAS = '".($ENVIADO). "',OBSERVACION_FACTURAS='".$OBSERVACION_FACTURAS."-".$ENVIADO ."' WHERE CODIGO_OC = '".($CODIGO_OC)."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

	echo '<script language = javascript>
	alert("Enviado")
	self.location = "DescripcionOC1.php?CODIGO_OC='.urlencode($CODIGO_OC).'"
	</script>';
?>