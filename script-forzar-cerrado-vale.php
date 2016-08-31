<?php 
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn);

$query_registro3 = "select DIFERENCIA,CANTIDAD_ENTREGADA,CODIGO_PRODUCTO,ID, OBSERVACIONES,CANTIDAD_SOLICITADA FROM producto_vale_emision where CODIGO_VALE = '".$_POST['id_vale']."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());

while($row = mysql_fetch_array($result3)){

	$diferencia = ($row["DIFERENCIA"] == "") ? $row["CANTIDAD_SOLICITADA"] : $row["DIFERENCIA"];
	$final = $row["CANTIDAD_SOLICITADA"] - $diferencia ;
	echo $row["CANTIDAD_SOLICITADA"] . " - " . $diferencia  . " = " . $final;
	$sql = "UPDATE producto_vale_emision SET CANTIDAD_SOLICITADA = '".$final."' , DIFERENCIA = '0' WHERE ID = '".$row['ID']."'";
	$result = mysql_query($sql, $conn) or die(mysql_error());  
}
mysql_free_result($result3);

$sql = "UPDATE vale_emision SET DIFERENCIA_TOTAL= '0', ESTADO = 'ENTREGADO' WHERE COD_VALE = '".$_POST['id_vale']."'";
$result = mysql_query($sql, $conn) or die(mysql_error()); 

mysql_close($conn);

echo '<script language = javascript>
alert("Vale Cerrado");
self.location = "ListadoValeEmision.php";
</script>';
?>
